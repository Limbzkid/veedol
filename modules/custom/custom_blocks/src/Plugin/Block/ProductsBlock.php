<?php
  namespace Drupal\custom_blocks\Plugin\Block;

  use Drupal\taxonomy\Entity\Term;
  use Drupal\Core\Block\BlockBase;
  use Drupal\Component\Annotation\Plugin;
  use Drupal\Core\Url;
  use Drupal\Core\Link;
  use Drupal\node\Entity\Node;


  /**
   * Provides a 'Custom' Block
   *
   * @Block(
   *   id = "products_list",
   *   admin_label = @Translation("Products Listing Block"),
   * )
   */
  class ProductsBlock extends BlockBase {

    /**
   *  {@inheritdoc}
   */
    public function build() {
      $tids = array();
      $breadcrumbs = array();
      $category = array();

      $current_path = substr(\Drupal::service('path.current')->getPath(), 1);
      $path_args = explode('/', $current_path);
      $tid = $path_args[2];

      $parents = \Drupal::service('entity_type.manager')->getStorage("taxonomy_term")->loadAllParents($tid);
      $list = [];
      foreach ($parents as $term) {
        array_push($tids, $term->id());
        $breadcrumbs[] = array(
          'name' => $term->label(),
          'alias' => \Drupal::service('path.alias_manager')->getAliasByPath('/taxonomy/term/' . $term->id()),
        );
      }

      $breadcrumbs = array_reverse($breadcrumbs);
      $current = array_pop($breadcrumbs);
      //echo '<pre>'; print_r($current['name']);

      $data = array();

      $parents = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('product_category',0,1,FALSE);
      foreach($parents as $parent) {
        $children = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('product_category',$parent->tid,1,FALSE);
        $level_1 = array();
        if(!empty($children)) {
          foreach($children as $child) {
            $grand_child = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('product_category',$child->tid,1,FALSE);
            $level_2 = array();
            if(!empty($grand_child )) {
              foreach($grand_child as $gchild) {
                $level_2[] = array(
                  'name' => $gchild->name,
                  'alias' => \Drupal::service('path.alias_manager')->getAliasByPath('/taxonomy/term/' . $gchild->tid),
                  'class' => ($gchild->tid == $tid) ? 'current' : '',
                );
              }
            }
            $level_1[] = array(
              'name' => $child->name,
              'alias' => \Drupal::service('path.alias_manager')->getAliasByPath('/taxonomy/term/' . $child->tid),
              'child' => $level_2,
              'class' => in_array($child->tid, $tids)?'open':'',
            );
           }
        }
        $data[] = array(
          'name' => $parent->name,
          'alias' => \Drupal::service('path.alias_manager')->getAliasByPath('/taxonomy/term/' . $parent->tid),
          'child' => $level_1,
          'class' => in_array($parent->tid, $tids)?'open':'',
        );
      }

      $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('product_category',  0,  1,  TRUE);

      foreach($terms as $term) {
        $category[] = array(
            'image' => $term->field_image->target_id ? file_create_url($term->field_image->entity->getFileUri()) : '',
            'alt'   => $term->field_image->alt,
            'title' => $term->field_image->title,
            'name'  => $term->name->value,
            'alias'  => \Drupal::service('path.alias_manager')->getAliasByPath('/taxonomy/term/' . $term->tid->value),
            'class' => (in_array($term->tid->value, $tids)) ? 'active':'',
            'icon'  => $term->field_icon->target_id ? file_create_url($term->field_icon->entity->getFileUri()) : '',
            'icon_alt' => $term->field_icon->alt,
            'icon_title' => $term->field_icon->title,
        );
      }

      $products = array();
      $category_ids = array();

      $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadChildren($tid);
      if($terms) {
        foreach($terms as $term) {
          array_push($category_ids, $term->get('tid')->value);
        }
      } else {
        $category_ids = $tid;
      }

      $tw_logos     = array();
      $enios_logos  = array();

      if($tid != 11) {
        $query = \Drupal::entityQuery('node');
        $query->condition('status', NODE_PUBLISHED)
              ->condition('type', 'products')
              ->condition('field_category', $category_ids, 'IN')
              ->sort('field_category.entity:taxonomy_term.weight', 'ASC')
              ->sort('field_weight', 'ASC');
        $nids = $query->execute();
        $nodes = Node::loadMultiple($nids);

        foreach($nodes as $node) {
          $cat_id = $node->field_category->entity->tid->value;
          $ancestors = \Drupal::service('entity_type.manager')->getStorage("taxonomy_term")->loadAllParents($cat_id);
          $list = [];
          foreach ($ancestors as $term) {
            array_push($list, $term->id());
          }
          if(in_array(2, $list)) {
            $oem = '2';
          } else {
            $oem = '0';
          }



          $options  = ['absolute' => TRUE];
          $products[$node->field_category->entity->name->value][] = array(
            'name' => strtoupper($node->title->value),
            'link' => \Drupal\Core\Url::fromRoute('entity.node.canonical', ['node' => $node->nid->value], $options)->toString(),
            'image' => $node->field_image->target_id ? file_create_url($node->field_image->entity->getFileUri()) : '/themes/veedol/images/product_image.png',
            'alt' => $node->field_image->alt,
            'title' => $node->field_image->title,
            'file' => (!empty($node->field_pdf_upload->target_id)) ? file_create_url($node->field_pdf_upload->entity->getFileUri()) : '',
          );
        }

      } else {
        $oem = '1';

        $term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load(11);
        foreach($term->field_tide_water_logos->entity->field_images as $logo) {
          $tw_logos[] = array(
            'image' => $logo->target_id ? file_create_url($logo->entity->getFileUri()) : '',
            'title' => $logo->title,
            'alt'  => $logo->alt
          );
        }
        foreach($term->field_eneos_logos->entity->field_images as $logo) {
          $enios_logos[] = array(
            'image' => $logo->target_id ? file_create_url($logo->entity->getFileUri()) : '',
            'title' => $logo->title,
            'alt'  => $logo->alt
          );
        }
        $products[] = array(
          'name' => $term->name->value,
          'title1' => $term->field_title_1->value,
          'desc_1' => $term->field_description_1->value,
          'title2' => $term->field_title_2->value,
          'desc_2' => $term->field_description_2->value,
        );
      }

      //echo 'aa<pre>'; print_r($products); exit;
      return [
        '#theme'      => 'block__product_list',
        '#title'      => $this->t('Products'),
        '#data_obj'   => $data,
        '#category'   => $category,
        '#breadcrumb' => $breadcrumbs,
        '#current'    => $current['name'],
        '#products'   => $products,
        '#oem'        => $oem,
        '#tw_logos'   => $tw_logos,
        '#en_logos'   => $enios_logos
      ];
    }


  }

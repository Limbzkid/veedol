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
   *   id = "product_breadcrumb",
   *   admin_label = @Translation("Products Breadcrumb Block"),
   * )
   */
  class ProductBreadcrumbBlock extends BlockBase {

    /**
   *  {@inheritdoc}
   */
    public function build() {
      $breadcrumbs = array();

      $current_path = substr(\Drupal::service('path.current')->getPath(), 1);

      $path_args = explode('/', $current_path);
      $nid = $path_args[1];
      $node = \Drupal\node\Entity\Node::load($nid);

      //$title = '/'.strtolower(str_replace(' ', '-', $node->title->value));

      $root = array(
        'name' => 'Products',
        'alias' => dirname($node->toUrl()->toString())
      );


      $tid = $node->field_category->entity->tid->value;

      $parents = \Drupal::service('entity_type.manager')->getStorage("taxonomy_term")->loadAllParents($tid);

      foreach ($parents as $term) {
        $breadcrumbs[] = array(
          'name' => $term->label(),
          'alias' => \Drupal::service('path.alias_manager')->getAliasByPath('/taxonomy/term/' . $term->id()),
        );
        //$list[$term->id()] = $term->label();
      }


      $breadcrumbs = array_reverse($breadcrumbs);
      array_unshift($breadcrumbs,$root);
      //echo '<pre>'; print_r($breadcrumbs); exit;

      return [
        '#theme'      => 'block__breadcrumb',
        '#title'      => $this->t(''),
        '#breadcrumb' => $breadcrumbs,
        '#title'       => $node->title->value,
      ];
    }

    public function getCacheMaxAge() {
      return 0;
    }
  }

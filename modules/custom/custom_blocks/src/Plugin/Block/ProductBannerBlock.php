<?php
  namespace Drupal\custom_blocks\Plugin\Block;

  use Drupal\taxonomy\Entity\Term;
  use Drupal\Core\Block\BlockBase;
  use Drupal\Component\Annotation\Plugin;
  use Drupal\Core\Annotation\Translation;
  use Drupal\Core\Url;
  use Drupal\Core\Link;
  use Drupal\node\Entity\Node;


  /**
   * Provides a 'Custom' Block
   *
   * @Block(
   *   id = "products_banner",
   *   admin_label = @Translation("Products Banner Block"),
   * )
   */
  class ProductBannerBlock extends BlockBase {

    /**
   *  {@inheritdoc}
   */
    public function build() {
      $data = array();

      $query = \Drupal::entityQuery('node');
      $query->condition('type', 'product_banners');
      $nids = $query->execute();
      $nodes = Node::loadMultiple($nids);

      /*$current_path = substr(\Drupal::service('path.current')->getPath(), 1);
      $path_args = explode('/', $current_path);
      $tid = $path_args[2];

      $term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($tid);
      foreach($term->field_banner as $banner) {
        $data[] = array(
          'image' => ($banner->entity->field_image->target_id) ? file_create_url($banner->entity->field_image->entity->getFileUri()) : '',
          'mobile' => ($banner->entity->field_mobile_image->target_id) ? file_create_url($banner->entity->field_mobile_image->entity->getFileUri()) : '',
          'alt' => $banner->entity->field_image->alt,
          'title' => $banner->entity->field_image->title
        );

      }   */

      foreach($nodes as $node) {
        $data[] = array(
          'image' => ($node->field__banner->entity->field_image->target_id) ? file_create_url($node->field__banner->entity->field_image->entity->getFileUri()) : '',
          'mobile' => ($node->field__banner->entity->field_mobile_image->target_id) ? file_create_url($node->field__banner->entity->field_mobile_image->entity->getFileUri()) : '',
          'alt' => $node->entity->field_image->alt,
          'title' => $node->entity->field_image->title
        );
      }

      //echo '<pre>'; print_r($data); exit;
      return [
        '#theme'      => 'block__product_banner',
        '#title'      => $this->t(''),
        '#data_obj'   => $data,
      ];
    }

  }

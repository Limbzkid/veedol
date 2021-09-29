<?php
  namespace Drupal\custom_blocks\Plugin\Block;

  use Drupal\node\Entity\Node;
  use Drupal\Core\Block\BlockBase;
  use Drupal\Component\Annotation\Plugin;
  use Drupal\Core\Url;
  use Drupal\Core\Link;

  /**
   * Provides a 'Custom' Block
   *
   * @Block(
   *   id = "barnd_heritage",
   *   admin_label = @Translation("Brand Heritage Block"),
   * )
   */
  class BrandHeritage extends BlockBase {

    /**
 *  {@inheritdoc}
 */
    public function build() {
      $data = array();
      $years = array();

      $query = \Drupal::entityQuery('node');
      $query->condition('type', 'brand_heritage');
      $query->condition('status', 1);
      $query->sort('field_date', 'ASC');
      $nids = $query->execute();
      $nodes = Node::loadMultiple($nids);

      foreach($nodes as $node) {
        $year = date('Y', strtotime($node->field_date->value));
        if(!in_array($year, $years)) {
          array_push($years, $year);
        }
        $data[] = array(
          'image' => $node->field_image->target_id ? file_create_url($node->field_image->entity->getFileUri()) : '',
          'title' => $node->title->value,
          'img_alt' => $node->field_image->alt,
          'img_title' => $node->field_image->title,
          'year'  => $year,
          'body'  => $node->body->value
        );
      }

      //echo '<pre>'; print_r($years); exit;

      return [
        '#theme'      => 'block__brand_heritage',
        '#title'      => $this->t('Brand Heritage'),
        '#data_obj'   => $data,
        '#years'      => $years
      ];
    }
  }

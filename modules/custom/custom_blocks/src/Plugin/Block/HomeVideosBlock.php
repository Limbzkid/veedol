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
   *   id = "home_videos",
   *   admin_label = @Translation("Home Videos Block"),
   * )
   */
  class HomeVideosBlock extends BlockBase {

    /**
 *  {@inheritdoc}
 */
    public function build() {
      $data = array();

      $query = \Drupal::entityQuery('node');
      $query->condition('type', 'videos');
      $query->condition('status', 1);
      $query->sort('field_date', 'DESC');
      $query->range(0,3);
      $nids = $query->execute();
      $nodes = Node::loadMultiple($nids);

      foreach($nodes as $node) {
        $str = trim(preg_replace("![^a-z]+!i", "-", $node->title->value), '-');
        $data[] = array(
          'image'     => ($node->field_mobile_image->target_id) ? file_create_url($node->field_mobile_image->entity->getFileUri()) : '',
          'title'     => $node->body->value,
          'video_id'  => $node->field_youtube_video_id->value,
          'img_alt'   => $node->field_mobile_image->alt,
          'img_title' => $node->field_mobile_image->title,
          'id'        => strtolower($str),
        );
      }

      return [
        '#theme'      => 'block__home_videos',
        '#title'      => $this->t('Home Product'),
        '#data_obj'   => $data,
      ];
    }
  }

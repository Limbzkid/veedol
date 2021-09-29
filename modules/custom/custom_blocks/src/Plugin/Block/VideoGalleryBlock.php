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
   *   id = "video_gallery",
   *   admin_label = @Translation("Video Gallery Block"),
   * )
   */
  class VideoGalleryBlock extends BlockBase {

    /**
 *  {@inheritdoc}
 */
    public function build() {
      $data = array();

      $query = \Drupal::entityQuery('node');
      $query->condition('type', 'videos');
      $query->condition('status', 1);
      $query->sort('field_date', 'DESC');
      $nids = $query->execute();
      $nodes = Node::loadMultiple($nids);

      foreach($nodes as $node) {
        $str = trim(preg_replace("![^a-z]+!i", "-", $node->title->value), '-');
        $data[] = array(
          'image' => file_create_url($node->field_image->entity->getFileUri()),
          'title' => empty($node->body->value) ? $node->title->value : $node->body->value,
          'img_alt' => $node->field_image->alt,
          'img_title' => $node->field_image->title,
          'video_id' => $node->field_youtube_video_id->value,
          'id'        => strtolower($str)
        );
      }

      return [
        '#theme'      => 'block__video_gallery',
        '#title'      => $this->t('Video Gallery'),
        '#data_obj'   => $data,
      ];
    }
  }

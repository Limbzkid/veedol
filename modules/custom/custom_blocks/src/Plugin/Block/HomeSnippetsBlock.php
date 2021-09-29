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
   *   id = "home_snippets",
   *   admin_label = @Translation("Home Snippets Block"),
   * )
   */
  class HomeSnippetsBlock extends BlockBase {

    /**
 *  {@inheritdoc}
 */
    public function build() {
      $data = array();

      $query = \Drupal::entityQuery('node');
      $query->condition('type', 'snippets');
      $query->condition('status', 1);
      $query->sort('field_date', 'DESC');
      $query->range(0,3);
      $nids = $query->execute();
      $nodes = Node::loadMultiple($nids);

      foreach($nodes as $node) {
        $str = trim(preg_replace("![^a-z]+!i", "-", $node->title->value), '-');
        $data[] = array(
          'image'     => ($node->field_mobile_image->target_id) ? file_create_url($node->field_mobile_image->entity->getFileUri()) : '',
          'img_alt'   => $node->field_mobile_image->alt,
          'img_title' => $node->field_mobile_image->title,
          'title'     => $node->field_heading->value,
          'id'        => strtolower($str),
          'link'      => $node->field_link->value
        );
      }

      return [
        '#theme'      => 'block__home_snippets',
        '#title'      => $this->t('Home Snippets'),
        '#data_obj'   => $data,
      ];
    }
  }

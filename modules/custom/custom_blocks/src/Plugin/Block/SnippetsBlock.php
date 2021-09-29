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
   *   id = "snippets",
   *   admin_label = @Translation("Snippets Block"),
   * )
   */
  class SnippetsBlock extends BlockBase {

    /**
 *  {@inheritdoc}
 */
    public function build() {
      $data = array();

      $query = \Drupal::entityQuery('node');
      $query->condition('type', 'snippets');
      $query->condition('status', 1);
      $query->sort('field_date', 'DESC');
      $nids = $query->execute();
      $nodes = Node::loadMultiple($nids);

      foreach($nodes as $node) {
        $info_arr = array();
        foreach($node->field_application as $info) {
          array_push($info_arr, $info->value);
        }

        $str = trim(preg_replace("![^a-z]+!i", "-", $node->title->value), '-');
        $data[] = array(
          'title'     => $node->title->value,
          'image'     => file_create_url($node->field_image->entity->getFileUri()),
          'img_alt'   => $node->field_image->alt,
          'img_title' => $node->field_image->title,
          'desc'      => $node->body->value,
          'link_text' => $node->field_link_text->value,
          'link'      => $node->field_link->value,
          'info'      => $info_arr,
          'id'        => strtolower($str)
        );
      }

      //echo '<pre>'; print_r($data); exit;

      return [
        '#theme'      => 'block__snippets',
        '#title'      => $this->t('Snippets'),
        '#data_obj'   => $data,
      ];
    }
  }

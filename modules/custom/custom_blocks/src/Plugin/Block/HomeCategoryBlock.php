<?php
  namespace Drupal\custom_blocks\Plugin\Block;

  use Drupal\taxonomy\Entity\Term;
  use Drupal\Core\Block\BlockBase;
  use Drupal\Component\Annotation\Plugin;
  use Drupal\Core\Url;
  use Drupal\Core\Link;

  /**
   * Provides a 'Custom' Block
   *
   * @Block(
   *   id = "home_category",
   *   admin_label = @Translation("Home Product Category Block"),
   * )
   */
  class HomeCategoryBlock extends BlockBase {

    /**
 *  {@inheritdoc}
 */
    public function build() {

      $terms = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('product_category',  0,  1,  TRUE);

      foreach($terms as $term) {
        $term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($term->tid->value);
        if (!$term->get('path')->isEmpty()) {
            $term_alias = $term->get('path')->alias;
        } else {
          $term_alias = '';
        }
        $data[] = array(
            'image' => $term->field_home_block_image->target_id ? file_create_url($term->field_home_block_image->entity->getFileUri()) : '',
            'name'  => $term->name->value,
            'link'  => $term_alias,
        );
      }

      //echo '<pre>'; print_r($data); exit;
      return [
        '#theme'      => 'block__home_product',
        '#title'      => $this->t('Home Product'),
        '#data_obj'   => $data,
      ];
    }
  }

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
   *   id = "find_lubricant",
   *   admin_label = @Translation("Find Lubricant Block"),
   * )
   */
  class FindLubricantBlock extends BlockBase {

    /**
 *  {@inheritdoc}
 */
    public function build() {
      $category = array();
      $chk_arr  = array();
      $query = \Drupal::entityQuery('taxonomy_term');
      $query->condition('vid', 'lubricant_category');
      $query->sort('weight');
      $tids = $query->execute();
      $terms = Term::loadMultiple($tids);

      foreach($terms as $term) {
          $category[] = array(
            'name' => $term->name->value,
            'tid'  => $term->tid->value
          );
      }
      //echo '<pre>'; print_r($category); exit;
      return [
        '#theme'      => 'block__find_lubricant',
        '#title'      => $this->t('Find Lubricant'),
        '#category'   => $category
      ];
    }
  }

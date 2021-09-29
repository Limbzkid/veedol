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
   *   id = "find_distributors",
   *   admin_label = @Translation("Find Distributors Block"),
   * )
   */
  class FindDistributorsBlock extends BlockBase {

    /**
 *  {@inheritdoc}
 */
    public function build() {

      $node = \Drupal::routeMatch()->getParameter('node');
      if($node->id() == 25) {
        $page = 'distributors';
      } elseif($node->id() == 29) {
        $page = 'depot';
      } elseif($node->id() == 28) {
        $page = 'plant';
      }  elseif($node->id() == 30) {
        $page = 'workshops';
      }

      $region = array();
      $query = \Drupal::entityQuery('taxonomy_term');
      $query->condition('vid', 'distributors');
      $query->sort('weight');
      $tids = $query->execute();
      $terms = Term::loadMultiple($tids);

      foreach($terms as $term) {
        if(!in_array($term->field_regions->value, $region)) {
          array_push($region, $term->field_regions->value);
        }
      }

      //echo '<pre>'; print_r($region); exit;
      return [
        '#theme'      => 'block__find_distributor',
        '#title'      => $this->t('Find Distributor'),
        '#data_obj'   => $region,
        '#page' => $page
      ];
    }
  }

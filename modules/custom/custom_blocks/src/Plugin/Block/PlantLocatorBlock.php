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
   *   id = "plant_locator",
   *   admin_label = @Translation("Plant Locator Block"),
   * )
   */
  class PlantLocatorBlock extends BlockBase {

    /**
 *  {@inheritdoc}
 */
    public function build() {
      $data = array();

      $query = \Drupal::entityQuery('taxonomy_term');
      $query->condition('vid', 'plant');
      $query->sort('weight');
      $tids = $query->execute();
      $terms = Term::loadMultiple($tids);

      foreach($terms as $term) {
        $address = $term->description->value .'<br>'. $term->field_city->value .' - '. $term->field_postal_code->value.'<br>'. $term->field_state->value;
        $data[$term->field_regions->value][] = array(
          'title' => $term->name->value,
          'address' => $address,
          'image' => $term->field_image->target_id ? file_create_url($term->field_image->entity->getFileUri()) : '',
          'img_alt' => $term->field_image->alt,
          'img_title' => $term->field_image->title,
          'contact' => $term->field_mobile->value,
          'email' => $term->field_email->value
        );
      }

      //echo '<pre>'; print_r($data); exit;
      return [
        '#theme'      => 'block__plant_locator',
        '#title'      => $this->t('Plant Locator'),
        '#data_obj'   => $data,
      ];
    }
  }

<?php
  namespace Drupal\custom_blocks\Plugin\Block;

  use Drupal\Core\Block\BlockBase;
  use Drupal\taxonomy\Entity\Term;
  use Drupal\Component\Annotation\Plugin;
  use Drupal\Core\Url;
  use Drupal\Core\Link;
  use Drupal\file\Entity\File;


  /**
   * Provides a 'Custom' Block
   *
   * @Block(
   *   id = "social_media",
   *   admin_label = @Translation("Social Media Block"),
   * )
   */
  class SocialMediaBlock extends BlockBase {

    /**
   *  {@inheritdoc}
   */
    public function build() {
      $data = array();
      $query = \Drupal::entityQuery('taxonomy_term');
      $query->condition('vid', 'social_media');
      $tids = $query->execute();
      $terms = Term::loadMultiple($tids);
      foreach($terms as $term) {

        $data[] = array(
          'name' => $term->name->value,
          'class' => $term->field_class->value,
          'link' => $term->field_link_url->value
        );
      }

      //echo '<pre>'; print_r($data); exit;
      return [
        '#theme'      => 'block__social_media',
        '#title'      => $this->t('Social Media'),
        '#data_obj'   => $data,
      ];
    }
  }

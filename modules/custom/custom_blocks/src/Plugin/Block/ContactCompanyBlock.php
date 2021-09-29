<?php
  namespace Drupal\custom_blocks\Plugin\Block;

  use Drupal\Core\Block\BlockBase;
  use Drupal\Component\Annotation\Plugin;

  /**
   * Provides a 'Custom' Block
   *
   * @Block(
   *   id = "contact-company",
   *   admin_label = @Translation("Contact Company Block"),
   * )
   */
  class ContactCompanyBlock extends BlockBase {

    /**
 *  {@inheritdoc}
 */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('\Drupal\custom_blocks\Form\ContactCompanyForm');

    return [
      '#theme'    => 'block__contact_company',
      '#title'    => $this->t('Contact Us'),
      '#form'     => $form,
    ];
  }

}

<?php
  namespace Drupal\custom_blocks\Plugin\Block;

  use Drupal\Core\Block\BlockBase;
  use Drupal\Component\Annotation\Plugin;

  /**
   * Provides a 'Custom' Block
   *
   * @Block(
   *   id = "contact-us",
   *   admin_label = @Translation("Contact Us Block"),
   * )
   */
  class ContactUsBlock extends BlockBase {

    /**
 *  {@inheritdoc}
 */
  public function build() {
    $form = \Drupal::formBuilder()->getForm('Drupal\custom_blocks\Form\ContactForm');

    /*$mailManager = \Drupal::service('plugin.manager.mail');
    $module = ‘custom_blocks’;
    $key = 'create_article';
    $to = 'limbuzkid@gmail.com';
    $params['message'] = 'This is a test';
    $params['node_title'] = 'aaaa';
    $langcode = \Drupal::currentUser()->getPreferredLangcode();
    $send = true;

    $result = $mailManager->mail($module, $key, $to, $langcode, $params, NULL, $send);
    if ($result['result'] !== true) {
     drupal_set_message(t('There was a problem sending your message and it was not sent.'), 'error');
    }
    else {
     drupal_set_message(t('Your message has been sent.'));
   } */

    return [
      '#theme'    => 'block__contact_us',
      '#title'    => $this->t('Contact Us'),
      '#form'     => $form,
    ];
  }

}

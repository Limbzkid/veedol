<?php
  /**
    * @file
    * Contains \Drupal\custom_blocks\Form\ContactForm.
    */
  namespace Drupal\custom_blocks\Form;

  use Drupal\taxonomy\Entity\Term;
  use Drupal\Core\Ajax\AjaxResponse;
  use Drupal\Core\Ajax\ChangedCommand;
  use Drupal\Core\Ajax\CssCommand;
  use Drupal\Core\Ajax\HtmlCommand;
  use Drupal\Core\Ajax\InvokeCommand;
  use Drupal\Core\Form\FormBase;
  use Drupal\file\Entity\File;
  use Symfony\Component\HttpFoundation;
  use Drupal\Core\Form\FormStateInterface;
  use Symfony\Component\HttpFoundation\Request;


  class ContactForm extends FormBase {
    /**
    * {@inheritdoc}
    */
    public function getFormId() {
      return 'contact_us';
    }

    /**
    * {@inheritdoc}
    */
    public function buildForm(array $form, FormStateInterface $form_state) {
      $query = \Drupal::entityQuery('taxonomy_term');
      $query->condition('vid', 'query_types');
      $query->sort('weight');
      $tids = $query->execute();
      $terms = Term::loadMultiple($tids);

      $options = array(
        '' => 'Query Type*'
      );
      foreach($terms as $term) {
        $options[$term->name->value] = $term->name->value;
      }

      //echo '<pre>'; print_r($options); exit;

      $form['name'] = array(
        '#type' => 'textfield',
        '#maxlength' => 50,
        '#attributes' => array(
            'id' => 'name',
            'class' => ['form-control'],
            'placeholder' => 'Name'
        ),
      );

      $form['email'] = array(
        '#type' => 'textfield',
        '#maxlength' => 100,
        '#attributes' => array(
            'id' => 'email',
            'class' => ['form-control'],
            'placeholder' => 'E-mail Id'
        ),
      );

      $form['phone'] = array(
        '#type' => 'tel',
        '#maxlength' => 10,
        '#attributes' => array(
          'id' => 'phone',
          'class' => ['form-control'],
          'placeholder' => 'Phone'
        ),
      );

      $form['query_type'] = array(
         '#type' => 'select',
         '#options' => $options,
         '#attributes' => array(
           'selected' => 'selected',
             'class' => ['form-control'],
             'id' => 'query_type',
         ),
       );

      $form['description'] = array(
        '#type' => 'textarea',
        '#maxlength' => '250',
        '#attributes' => array(
          'id' => 'description',
          'class' => ['form-control'],
          'placeholder' => 'Description',
        ),
      );



      $form['submit'] = array(
        '#type' => 'button',
        '#value' => 'Submit',
        '#attributes' => array(
            'class' => ['btn btn-primary btn-outline']
        ),
        '#ajax' => array(
          'callback' => '::contactCallback',
          'event' => 'click',
          'progress' => array(
            'type' => 'throbber',
            'message' => 'Please wait',
          ),
        ),
      );

      $form['#theme'] = 'contactFrm';

      return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
      //$message = t('Your information has been successfully submitted.') ;
      //drupal_set_message($message);
    }


    public function contactCallback(array &$form, FormStateInterface $form_state) {

      $error      = false;
      $name_err   = false;
      $mail_err   = false;
      $phome_err  = false;
      $query_err  = false;
      $desc_err   = false;

      $name   = trim($form_state->getValue('name'));
      $mail   = trim($form_state->getValue('email'));
      $phone  = trim($form_state->getValue('phone'));
      $query  = trim($form_state->getValue('query_type'));
      $desc   = trim($form_state->getValue('description'));


      $ajax_response = new AjaxResponse();

      if($name == '') {
        $err_txt = 'Name is required';
        $name_err = true;
        $error = true;
      } else {
        if(!preg_match("/^([a-zA-Z.\']+\s?)*$/", $name)) {
          $err_txt = 'Invalid Name';
          $name_err = true;
          $error = true;
        }
      }
      if($name_err) {
        $ajax_response->addCommand(new HtmlCommand('#contact-us .nameErr', $err_txt));
      } else {
        $ajax_response->addCommand(new HtmlCommand('#contact-us .nameErr', ''));
      }

      if($mail == '') {
        $err_txt = 'Email is required';
        $mail_err = true;
        $error = true;
      } else {
        if (filter_var($mail, FILTER_VALIDATE_EMAIL) === false) {
          $err_txt = 'Invalid Email';
          $mail_err = true;
          $error = true;
        }
      }
      if($mail_err) {
        $ajax_response->addCommand(new HtmlCommand('#contact-us .mailErr', $err_txt));
      } else {
        $ajax_response->addCommand(new HtmlCommand('#contact-us .mailErr', ''));
      }

      if($phone == '') {
        $err_txt = 'Phone number is required';
        $phone_err = true;
        $error = true;
      } else {
        if(!preg_match("/^[56789][0-9]{9}$/", $phone)) {
          $err_txt = 'Invalid Phone Number';
          $phone_err = true;
          $error = true;
        }
      }

      if($phone_err) {
        $ajax_response->addCommand(new HtmlCommand('#contact-us .phoneErr', $err_txt));
      } else {
        $ajax_response->addCommand(new HtmlCommand('#contact-us .phoneErr', ''));
      }

      if($query == '') {
        $err_txt = 'Please select a query type';
        $query_err = true;
        $error = true;
      }

      if($query_err) {
        $ajax_response->addCommand(new HtmlCommand('#contact-us .queryErr', $err_txt));
      } else {
        $ajax_response->addCommand(new HtmlCommand('#contact-us .queryErr', ''));
      }



      if($desc == '') {
        $err_txt = 'Please enter description';
        $desc_err = true;
        $error = true;
      } else {
        if(!preg_match("/^([\w+( \w+).,\-\/\()&@\n\r]+\s?)*$/", $desc)) {
          $err_txt = 'Invalid character in text';
          $desc_err = true;
          $error = true;
        }
      }
      if($desc_err) {

        $ajax_response->addCommand(new HtmlCommand('#contact-us .descErr', $err_txt));
      } else {
        $ajax_response->addCommand(new HtmlCommand('#contact-us .descErr', ''));
      }

      if(!$error) {
        $database = \Drupal::database();
        $result = $database->insert('contact_us')
          ->fields([
            'name'        => $name,
            'email'       => $mail,
            'phone'       => $phone,
            'query'       => $query,
            'description' => $desc,
            'created'     => REQUEST_TIME,
          ])->execute();

        $thank_you = '<div class="form-success">Thank you for the feedback. We\'ll get back to you soon</div>';

        $ajax_response->addCommand(new HtmlCommand('#contact-us', $thank_you));
      } else {

      }

      return $ajax_response;
    }


  }

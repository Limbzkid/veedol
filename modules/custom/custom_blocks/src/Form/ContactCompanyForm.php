<?php
  /**
    * @file
    * Contains \Drupal\custom_blocks\Form\ContactCompanyForm.
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


  class ContactCompanyForm extends FormBase {
    /**
    * {@inheritdoc}
    */
    public function getFormId() {
      return 'company-contact';
    }

    /**
    * {@inheritdoc}
    */
    public function buildForm(array $form, FormStateInterface $form_state) {


      $query = \Drupal::entityQuery('taxonomy_term');
      $query->condition('vid', 'states');
      $tids = $query->execute();
      $terms = Term::loadMultiple($tids);

      $options = array(
        '' => 'Select State'
      );
      foreach($terms as $term) {
        $options[$term->name->value] = $term->name->value;
      }

      $city_options = array(
        '' => 'Select City'
      );

      //echo '<pre>'; print_r($options); exit;

      $form['name'] = array(
        '#type' => 'textfield',
        '#maxlength' => 75,
        '#attributes' => array(
            'id' => 'name',
            'class' => ['form-control'],
            'placeholder' => 'Name*'
        ),
      );

      $form['email'] = array(
        '#type' => 'textfield',
        '#attributes' => array(
            'id' => 'email',
            'class' => ['form-control'],
            'placeholder' => 'E-mail Id*'
        ),
      );

      $form['mobile'] = array(
        '#type' => 'textfield',
        '#maxlength' => 10,
        '#attributes' => array(
            'id' => 'mobile',
            'class' => ['form-control textbox'],
            'placeholder' => 'Mobile No*'
        ),
      );

      $form['company'] = array(
        '#type' => 'textfield',
        '#maxlength' => 75,
        '#attributes' => array(
            'id' => 'company_name',
            'class' => ['form-control textbox'],
            'placeholder' => 'Company Name*'
        ),
      );

      $form['state'] = array(
        '#type' => 'select',
        '#options' => $options,
        '#attributes' => array(
          'selected' => 'selected',
            'class' => ['form-control arrow-filled'],
            'id' => 'state',
        ),
      );

      $form['city'] = array(
        '#type' => 'select',
        '#options' => $city_options,
        '#attributes' => array(
          'selected' => 'selected',
            'class' => ['form-control arrow-filled'],
            'id' => 'city',
        ),
      );

      $form['pincode'] = array(
        '#type' => 'textfield',
        '#maxlength' => 6,
        '#attributes' => array(
            'id' => 'pincode',
            'class' => ['form-control'],
            'placeholder' => 'Pincode*'
        ),
      );

      $form['address'] = array(
        '#type' => 'textarea',
        '#maxlength' => '250',
        '#rows' => 3,
        '#attributes' => array(
          'id' => 'ccomment',
          'class' => ['form-control'],
          'placeholder' => 'Address*',
        ),
      );

      $form['enquiry_details'] = array(
        '#type' => 'textarea',
        '#maxlength' => '250',
        '#rows' => 5,
        '#attributes' => array(
          'id' => 'enquiry_details',
          'class' => ['form-control'],
          'placeholder' => 'Enquiry Details*',
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
            'message' => 'Please wait',
          ),
        ),
      );

      $form['#theme'] = 'contactCompanyFrm';

      return $form;
    }

    public function submitForm(array &$form, FormStateInterface $form_state) {
      //$message = t('Your information has been successfully submitted.') ;
      //drupal_set_message($message);
    }


    public function contactCallback(array &$form, FormStateInterface $form_state) {
      $error    = false;
      $name_err = false;
      $mail_err = false;
      $mob_err  = false;
      $pin_err  = false;
      $cmp_err  = false;
      $state_err = false;
      $city_err = false;
      $addr_err = false;
      $enq_err = false;

      $name      = trim($form_state->getValue('name'));
      $mail      = trim($form_state->getValue('email'));
      $mobile    = trim($form_state->getValue('mobile'));
      $company   = trim($form_state->getValue('company'));
      $pincode   = trim($form_state->getValue('pincode'));
      $address   = trim($form_state->getValue('address'));
      $state     = trim($form_state->getValue('state'));
      $city      = trim($form_state->getValue('city'));
      $enquiry   = trim($form_state->getValue('enquiry_details'));

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
        $ajax_response->addCommand(new HtmlCommand('.nameErr', $err_txt));
      } else {
        $ajax_response->addCommand(new HtmlCommand('.nameErr', ''));
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
        $ajax_response->addCommand(new HtmlCommand('.mailErr', $err_txt));
      } else {
        $ajax_response->addCommand(new HtmlCommand('.mailErr', ''));
      }

      if($mobile == '') {
        $err_txt = 'Phone number is required';
        $mob_err = true;
        $error = true;
      } else {
        if(!preg_match("/^[56789][0-9]{9}$/", $mobile)) {
          $err_txt = 'Invalid Phone Number';
          $mob_err = true;
          $error = true;
        }
      }

      if($mob_err) {
        $ajax_response->addCommand(new HtmlCommand('.mobErr', $err_txt));
      } else {
        $ajax_response->addCommand(new HtmlCommand('.mobErr', ''));
      }

      if($pincode == '') {
        $err_txt = 'Pincode is required';
        $pin_err = true;
        $error = true;
      } else {
        if(!preg_match("/^[1-9][0-9]{5}$/", $pincode)) {
          $err_txt = 'Invalid Pincode';
          $pin_err = true;
          $error = true;
        }
      }

      if($pin_err) {
        $ajax_response->addCommand(new HtmlCommand('.pinErr', $err_txt));
      } else {
        $ajax_response->addCommand(new HtmlCommand('.pinErr', ''));
      }

      if($company == '') {
        $err_txt = 'Company Name is required';
        $cmp_err = true;
        $error = true;
      } else {
        if(!preg_match("/^([\w+( \w+).,\-\/\()&@\n\r]+\s?)*$/", $company)) {
          $err_txt = 'Invalid Company name';
          $cmp_err = true;
          $error = true;
        }
      }

      if($cmp_err) {
        $ajax_response->addCommand(new HtmlCommand('.compErr', $err_txt));
      } else {
        $ajax_response->addCommand(new HtmlCommand('.compErr', ''));
      }

      if($state == '') {
        $err_txt = 'Please select a State';
        $state_err = true;
        $error = true;
      }

      if($state_err) {
        $ajax_response->addCommand(new HtmlCommand('.stateErr', $err_txt));
      } else {
        $ajax_response->addCommand(new HtmlCommand('.stateErr', ''));
      }

      if($city == '') {
        $err_txt = 'Please select a City';
        $city_err = true;
        $error = true;
      }

      if($city_err) {
        $ajax_response->addCommand(new HtmlCommand('.cityErr', $err_txt));
      } else {
        $ajax_response->addCommand(new HtmlCommand('.cityErr', ''));
      }

      if($address == '') {
        $err_txt = 'Address is required';
        $addr_err = true;
        $error = true;
      } else {
        if(!preg_match("/^([\w+( \w+).,\-\/\()&@\n\r]+\s?)*$/", $address)) {
          $err_txt = 'Invalid Address';
          $addr_err = true;
          $error = true;
        }
      }

      if($addr_err) {
        $ajax_response->addCommand(new HtmlCommand('.addrErr', $err_txt));
      } else {
        $ajax_response->addCommand(new HtmlCommand('.addrErr', ''));
      }

      if($enquiry == '') {
        $err_txt = 'Please enter message';
        $enq_err = true;
        $error = true;
      } else {
        if(!preg_match("/^([\w+( \w+).,\-\/\()&@\n\r]+\s?)*$/", $enquiry)) {
          $err_txt = 'Invalid character in text';
          $enq_err = true;
          $error = true;
        }
      }
      if($enq_err) {
        $ajax_response->addCommand(new HtmlCommand('.enqErr', $err_txt));
      } else {
        $ajax_response->addCommand(new HtmlCommand('.enqErr', ''));
      }

      if(!$error) {
        $database = \Drupal::database();
        $result = $database->insert('company_contact')
          ->fields([
            'name'    => $name,
            'email'   => $mail,
            'mobile'  => $mobile,
            'company' => $company,
            'pincode' => $pincode,
            'state'   => $state,
            'city'    => $city,
            'address' => $address,
            'enquiry' => $enquiry,
            'created' => REQUEST_TIME,
          ])->execute();

        $thank_you = '<div class="form-success">Thank you for the feedback. We\'ll get back to you soon</div>';
        $ajax_response->addCommand(new HtmlCommand('#company-contact', $thank_you));

      }

      return $ajax_response;
    }


  }

<?php

/**
  @file
  Contains \Drupal\custom_ajax\Controller\ajaxController.
 */

namespace Drupal\custom_ajax\Controller;

use Drupal\Core\Database\Connection;
use Drupal\node\Entity\Node;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use GuzzleHttp\Client;
use PHPMailer\PHPMailer\Exception;
use Drupal\Core\Url;
use Drupal\Core\Link;
use Drupal\taxonomy\Entity\Term;
use Symfony\Component\HttpFoundation\Request;


class ajaxController extends ControllerBase {


  public function getStates() {
    $arr = array();
    $output = '<option value="" selected>Select </option>';
    $content = '';
    $region = $_POST['region'];
    $vid    = $_POST['vid'];

    $query = \Drupal::entityQuery('taxonomy_term');
    $query->condition('vid', $vid);
    $query->condition('field_regions', $region);
    $query->sort('field_state', 'ASC');
    $tids = $query->execute();
    $terms = Term::loadMultiple($tids);

    foreach ($terms as $term) {
      $state = trim($term->field_state->value);
      if(!in_array(strtolower($state), $arr)) {
        array_push($arr, strtolower($state));
        $output .= '<option value="'.$state.'">'.ucwords(strtolower($state)).'</option>';
      }

      if($vid == 'depot') {
        $address = '';
        if($term->description->value != '') {
          $address .= str_replace("\xc2\xa0",' ',strip_tags($term->description->value));
        }
        // if($term->field_area->value != '') {
        //   $address .= '<br>' . $term->field_area->value;
        // }
        if($term->field_city->value != '') {
          if( $term->field_postal_code->value != '') {
            $address .= '<br>' . $term->field_city->value . ' - ' .  $term->field_postal_code->value;
          } else {
            $address .= '<br>' . $term->field_city->value;
          }

          if($term->field_state->value != '') {
            $address .= '<br>' . $term->field_state->value;
          }
        } else {
          if($term->field_state->value != '') {
            $address .= '<br>' . $term->field_state->value;
          }
        }


        $content .= '<div class="info-box">
                      <div class="info-box-inner">
                          <div class="sub-section-heading">
                              <img src="/themes/veedol/images/icon-address.png" alt="icon" class="icon">
                              <h2 class="heading">'.$term->name->value.'</h2>
                          </div>
                          <ul class="info-wrapper no-bullets">
                              <li>
                                  <i class="icon-contact icon-contact-address"></i>
                                  <div>'.$address .'</div>
                              </li>
                              <li>
                                  <i class="icon-contact icon-contact-phone"></i>
                                  <div>'.$term->field_mobile->value.' </div>
                              </li>';
        if($term->field_email->value) {
          $content .= '<li>
                          <i class="icon-contact icon-contact-email"></i>
                          <div>'.$term->field_email->value.'</div>
                      </li>';
        }
        $content .= '
                </ul>
            </div>
        </div>';
      }

    }

    return new JsonResponse(array('options' => $output, 'content' => $content));
  }

  public function getCities() {
    $arr = array();
    $output = '<option value="" selected>Select </option>';
    $content = '';
    $region = $_POST['region'];
    $state = $_POST['state'];
    $vid    = $_POST['vid'];

    $address = '';

    $query = \Drupal::entityQuery('taxonomy_term');
    $query->condition('vid', $vid);
    $query->condition('field_regions', $region);
    $query->condition('field_state', $state);
    $query->sort('field_city', 'ASC');
    $tids = $query->execute();
    $terms = Term::loadMultiple($tids);

    foreach ($terms as $term) {
      if(!in_array(strtolower($term->field_city->value), $arr) && $term->field_city->value != '') {
        array_push($arr, strtolower($term->field_city->value));
        $output .= '<option value="'.strtolower($term->field_city->value).'">'.ucwords(strtolower($term->field_city->value)).'</option>';
      }

      if($vid == 'depot') {
        $address = '';
        if($term->description->value != '') {
          $address .= str_replace("\xc2\xa0",' ',strip_tags($term->description->value));
        }
        // if($term->field_area->value != '') {
        //   $address .= '<br>' . $term->field_area->value;
        // }
        if($term->field_city->value != '') {
          if( $term->field_postal_code->value != '') {
            $address .= '<br>' . $term->field_city->value . ' - ' .  $term->field_postal_code->value;
          } else {
            $address .= '<br>' . $term->field_city->value;
          }

          if($term->field_state->value != '') {
            $address .= '<br>' . $term->field_state->value;
          }
        } else {
          if($term->field_state->value != '') {
            $address .= '<br>' . $term->field_state->value;
          }
        }

        $content .= '<div class="info-box">
                      <div class="info-box-inner">
                          <div class="sub-section-heading">
                              <img src="/themes/veedol/images/icon-address.png" alt="icon" class="icon">
                              <h2 class="heading">'.$term->name->value.'</h2>
                          </div>
                          <ul class="info-wrapper no-bullets">
                              <li>
                                  <i class="icon-contact icon-contact-address"></i>
                                  <div>'. $address .'</div>
                              </li>
                              <li>
                                  <i class="icon-contact icon-contact-phone"></i>
                                  <div>'.$term->field_mobile->value.' </div>
                              </li>';
        if($term->field_email->value) {
          $content .= '<li>
                          <i class="icon-contact icon-contact-email"></i>
                          <div>'.$term->field_email->value.'</div>
                      </li>';
        }
        $content .= '
                </ul>
            </div>
        </div>';
      }

    }

    return new JsonResponse(array('options' => $output, 'content' => $content));
  }

  public function getOtp() {
    $arr = array();
    $error = false;
    $err = array();
    $output = '';
    $mobile = $_POST['mobile'];
    $region = $_POST['region'];
    $state  = $_POST['state'];
    $city   = $_POST['city'];

    if($mobile == '') {
      $err[] = 'mobile-Mobile number is required';
      $error = true;
    } else {
      if(!preg_match("/^[56789][0-9]{9}$/", $mobile)) {
        $err[] = 'mobile-Invalid Mobile Number';
        $error = true;
      }
    }

    if($state == '') {
      $err[] = 'state-Please select a state';
      $error = true;
    }

    if($city == '') {
      $err[] = 'city-Please select a city';
      $error = true;
    }

    if($region == '') {
      $err[] = 'region-Please select a region';
      $error = true;
    }

    if(!$error) {
      $generator = "1357902468";
      $result = "";
      for ($i = 1; $i <= 4; $i++) {
        $result .= substr($generator, (rand()%(strlen($generator))), 1);
      }
      $output = '<p class="text-center mb-0 mb-md-5">Please enter the OTP</p>
                <form action="">
                    <label for="otp" class="visually-hidden">OTP</label>
                    <div class="otp-input-box">
                        <div class="otp-input-box-inner">
                            <input type="text" name="otp" id="otp" class="form-control input-otp" maxlength="4" value="'.$result.'">
                        </div>
                    </div>
                    <input type="submit" name="submit" id="submit" value="Verify OTP" class="btn btn-primary btn-outline verifyOtp" />
                </form>
                <div class="resend-otp-box">
                    <p>If you have not received please click on the resend OTP below</p>
                    <button class="btn btn-link m-auto resendOtp">Resend OTP</button>
                </div>';
    }



    $_SESSION['otp'] = $result;


    return new JsonResponse(array('err' => $err, 'otp'=> $result, 'markup' => $output));
  }

  public function resendOtp() {
    $arr = array();
    $error = false;
    $err = array();
    $mobile = $_POST['mobile'];
    $region = $_POST['region'];
    $state  = $_POST['state'];
    $city   = $_POST['city'];
    $mesg   = '';


    if($mobile == '') {
      $err[] = 'mobile-Mobile number is required';
      $error = true;
    } else {
      if(!preg_match("/^[56789][0-9]{9}$/", $mobile)) {
        $err[] = 'mobile-Invalid Mobile Number';
        $error = true;
      }
    }

    if($state == '') {
      $err[] = 'state-Please select a state';
      $error = true;
    }

    if($city == '') {
      $err[] = 'city-Please select a city';
      $error = true;
    }

    if($region == '') {
      $err[] = 'region-Please select a region';
      $error = true;
    }

    if(!$error) {
      $generator = "1357902468";
      $result = "";
      for ($i = 1; $i <= 4; $i++) {
        $result .= substr($generator, (rand()%(strlen($generator))), 1);
      }
      //$mesg = 'A 4-digit OTP has been sent your mobile';
      $_SESSION['otp'] = $result;
    }


    return new JsonResponse(array('err' => $err, 'otp'=> $result));
  }

  public function verifyOtp() {
    $err_txt  = '';
    $output   = '';
    $otp      = $_POST['otp'];
    $region   = $_POST['region'];
    $state    = $_POST['state'];
    $city     = $_POST['city'];

    if($_SESSION['otp'] == $otp) {

      $query = \Drupal::entityQuery('taxonomy_term');
      $query->condition('vid', 'distributors');
      $query->condition('field_regions', $region);
      $query->condition('field_state', $state);
      $query->condition('field_city', $city);
      $tids = $query->execute();
      $terms = Term::loadMultiple($tids);

      foreach ($terms as $term) {
        $address = '';
        if($term->description->value) {
          $address .= $term->description->value .'<br>';
        }
        if($term->field_city->value) {
          if($term->field_postal_code->value) {
            $address .= ucwords(strtolower($term->field_city->value)). ' - '. $term->field_postal_code->value;
          } else {
            $address .= ucwords(strtolower($term->field_city->value));
          }
        }
        if($term->field_state->value) {
          $address .= '<br>'. ucwords(strtolower($term->field_state->value));
        }
        $output .= '<div class="info-box">
            <div class="info-box-inner">
                <div class="sub-section-heading">
                    <img src="/themes/veedol/images/icon-address.png" alt="icon" class="icon">
                    <h2 class="heading">'.$term->name->value.'</h2>
                </div>
                <ul class="info-wrapper no-bullets">
                    <li>
                        <i class="icon-contact icon-contact-address"></i>
                        <div>'. $address .'</div>
                    </li>
                    <li>
                        <i class="icon-contact icon-contact-phone"></i>
                        <div>'. $term->field_mobile->value .' </div>
                    </li>';

         $output .= '<li>
                        <i class="icon-contact icon-contact-email"></i>
                        <div>'. $term->field_email->value .'</div>
                    </li>';
         $output .= '</ul>
            </div>
        </div>';
      }

    } else {
      $err_txt = 'OTP does not match';
    }
    return new JsonResponse(array('err' => $err_txt, 'markup' => $output));
  }

  public function getAllCities() {
    $state = $_POST['state'];

    $output = '<option value="" disabled selected>Select*</option>';
    $query = \Drupal::entityQuery('taxonomy_term');
    $query->condition('vid', 'cities');
    $query->condition('field_select_state.entity:taxonomy_term.name', $state);
    $query->sort('name', 'ASC');
    $tids = $query->execute();
    $terms = Term::loadMultiple($tids);

    foreach ($terms as $term) {
      $output .= '<option value="'. $term->name->value .'" >'. ucwords(strtolower($term->name->value)) .'</option>';

    }
    return new JsonResponse(array('markup' => $output));
  }

  public function getData() {
    $arr      = array();
    $content  = '';
    $region   = $_POST['region'];
    $state    = $_POST['state'];
    $city     = $_POST['city'];
    $vid      = $_POST['vid'];

    $query = \Drupal::entityQuery('taxonomy_term');
    $query->condition('vid', $vid);
    $query->condition('field_regions', $region);
    $query->condition('field_state', $state);
    $query->condition('field_city', $city);
    //$query->sort('field_regions');
    $tids = $query->execute();
    $terms = Term::loadMultiple($tids);

    foreach ($terms as $term) {
      $address = '';
      if($term->description->value) {
        $address .= $term->description->value .'<br>';
      }
      if($term->field_city->value) {
        if($term->field_postal_code->value) {
          $address .= ucwords(strtolower($term->field_city->value)). ' - '. $term->field_postal_code->value;
        } else {
          $address .= ucwords(strtolower($term->field_city->value));
        }
      }
      if($term->field_state->value) {
        $address .= '<br>'. ucwords(strtolower($term->field_state->value));
      }
      $content .= '<div class="info-box">
                    <div class="info-box-inner">
                      <div class="sub-section-heading">
                        <img src="/themes/veedol/images/icon-address.png" alt="icon" class="icon">
                        <h2 class="heading">'.$term->name->value.'</h2>
                      </div>
                      <ul class="info-wrapper no-bullets">
                      <li>
                        <i class="icon-contact icon-contact-address"></i>
                        <div>'.$address.'</div>
                      </li>
                      <li>
                        <i class="icon-contact icon-contact-phone"></i>
                        <div>'. $term->field_mobile->value .' </div>
                      </li>';
      if($term->field_email->value) {
        $content .= '<li>
                       <i class="icon-contact icon-contact-email"></i>
                       <div>'. $term->field_email->value .'</div>
                   </li>';
      }

       $content .= '</ul></div></div>';
    }

    return new JsonResponse(array('content' => $content));
  }

  public function getMake() {
    $category = $_POST['cat'];
    $cat = array();
    $options = '<option value="">Select</option>';
    $markup = '';

    $query = \Drupal::entityQuery('taxonomy_term');
    $query->condition('vid', 'make');
    $query->condition('field_category.entity:taxonomy_term.name', $category);
    $query->sort('name', 'ASC');
    $tids = $query->execute();
    $terms = Term::loadMultiple($tids);

    foreach($terms as $make) {
      $options .= '<option value="'. $make->name->value .'" >'. ucwords(strtolower($make->name->value)) .'</option>';
    }

    return new JsonResponse(array('markup' => $markup, 'options' => $options));

  }

  public function getModel() {
    $make = $_POST['make'];
    $cat = array();
    $markup = '';

    $options = '<option value="">Select</option>';

    $query = \Drupal::entityQuery('taxonomy_term');
    $query->condition('vid', 'model');
    $query->condition('field_select_model.entity:taxonomy_term.name', $make);
    $query->sort('name', 'ASC');
    $tids = $query->execute();
    $terms = Term::loadMultiple($tids);

    foreach($terms as $model) {
      $options .= '<option value="'. $model->tid->value .'" >'. $model->name->value .'</option>';
    }



    return new JsonResponse(array('markup' => $markup, 'options' => $options));
  }

  public function getLube() {
    $category = $_POST['cat'];
    $make     = $_POST['make'];
    $tid    = $_POST['model'];

    $markup = '';

    $term = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->load($tid);

    foreach($term->field_products as $prod) {
    //  print_r($prod->entity->nid->value);
      $name = strtoupper($prod->entity->title->value);
      $image = $prod->entity->field_image->target_id ? file_create_url($prod->entity->field_image->entity->getFileUri()) : '/themes/veedol/images/product_image.png';
      $options  = ['absolute' => TRUE];
      $link = \Drupal\Core\Url::fromRoute('entity.node.canonical', ['node' => $prod->entity->nid->value], $options)->toString();

      $markup .= '<div class="lubricant"><div class="lubricant-inner">
                    <div class="sub-section-heading">
                      <img src="/themes/veedol/images/icon-address.png" alt="icon" class="icon">
                      <h2 class="heading">'. $name .'</h2>
                    </div>
                    <div class="info-wrapper">
                      <div class="image-wrapper">
                        <a href="'.$link.'"><img src="'. $image .'" alt="'.$name.'"></a>
                      </div>
                      <div class="details-wrapper">
                        <ul class="model-details">
                          <li><label>Category</label><div>'.$category.'</div></li>
                          <li><label>Make</label><div>'.$make.'</div></li>
                          <li><label>Model</label><div>'.$term->name->value.'</div></li>
                        </ul>
                        <hr>
                        <p>The lubricant recommended is indicative. For exact specifications, please refer to the vehicle manufacturer\'s service manual.</p>
                      </div>
                    </div>
                  </div></div>';
    }

    return new JsonResponse(array('markup' => $markup));
  }

  public function getFinancialResult() {
    $markup = '';
    $year = $_POST['year'];
    $company = $_POST['company'];
    $temp = explode('-', $_POST['page']);
    $nid = $temp[1];

    $options  = ['absolute' => TRUE];
    $url = basename(\Drupal\Core\Url::fromRoute('entity.node.canonical', ['node' => $nid], $options)->toString());
    $page = str_replace('-', ' ', $url);
    $query = \Drupal::entityQuery('node');
    $query->condition('status', NODE_PUBLISHED)
          ->condition('type', 'financial_results')
          ->condition('field_select_page', $page)
          ->condition('field_financial_year.entity:taxonomy_term.name', $year);
    if(!empty($company)) {
      $query->condition('field_subsidiary_companies', $company);
    }
    $nids = $query->execute();
    $nodes = Node::loadMultiple($nids);

    foreach($nodes as $node) {
      if($node->field_pdf_upload->target_id) {
        $file = file_create_url($node->field_pdf_upload->entity->getFileUri());
      } else {
        $file = 'javascript:;';
      }
      $markup .= '<li><a href="'. $file .'" target="_blank">'. $node->title->value .'</a></li>';
    }

    return new JsonResponse(array('markup' => $markup));
  }

  public function getFinancialResultCompany() {
    $markup = '';
    $company = $_POST['company'];
    $year = $_POST['year'];
    $temp = explode('-', $_POST['page']);
    $nid = $temp[1];
    $chk_arr = array();
    $options = '';
    $cur_year = '';

    $_options  = ['absolute' => TRUE];
    $url = basename(\Drupal\Core\Url::fromRoute('entity.node.canonical', ['node' => $nid], $_options)->toString());
    $page = str_replace('-', ' ', $url);
    $query = \Drupal::entityQuery('node');
    $query->condition('status', NODE_PUBLISHED)
          ->condition('type', 'financial_results')
          ->condition('field_select_page', $page)
          ->condition('field_subsidiary_companies', $company);
    if(!empty($year)) {
      //$query->condition('field_financial_year.entity:taxonomy_term.name', $year);
    }
    $query->sort('field_financial_year.entity:taxonomy_term.name', 'DESC');
    $nids = $query->execute();
    $nodes = Node::loadMultiple($nids);

    foreach($nodes as $node) {
      if(!in_array($node->field_financial_year->entity->name->value, $chk_arr)) {
        array_push($chk_arr, $node->field_financial_year->entity->name->value);
        if($cur_year == '') {
          $cur_year = $node->field_financial_year->entity->name->value;
        }
        $options .= '<option value="'.$node->field_financial_year->entity->name->value.'">'.$node->field_financial_year->entity->name->value.'</option>';
      }

      if($cur_year == $node->field_financial_year->entity->name->value ) {
        if($node->field_pdf_upload->target_id) {
          $file = file_create_url($node->field_pdf_upload->entity->getFileUri());
        } else {
          $file = 'javascript:;';
        }
        $markup .= '<li><a href="'. $file .'" target="_blank">'. $node->title->value .'</a></li>';
      }

    }

    return new JsonResponse(array('markup' => $markup, 'options' => $options));
  }

  public function setPageId() {
    $id = $_POST['section'];
    $_SESSION['section_id'] = $id;
    return new JsonResponse('success');
  }

  public function getPageId() {
    $id = $_POST['section'];
    if(isset($_SESSION['section_id'])) {
      $section_id = $_SESSION['section_id'];
      unset($_SESSION['section_id']);
      return new JsonResponse($section_id);
    }

    return new JsonResponse('');
  }

}

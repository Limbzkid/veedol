<?php

/**
  @file
  Contains \Drupal\custom_pages\Controller\customPagesController.
 */

namespace Drupal\custom_pages\Controller;

use Drupal\node\Entity\Node;
use Drupal\taxonomy\Entity\Term;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\JsonResponse;
use GuzzleHttp\Client;
use Drupal\Core\Url;

class customPagesController extends ControllerBase {

  public function admin_page() {
    $build = array(
      '#type' => 'markup',
      '#markup' => '',
    );
    return $build;
  }

  public function contact_form_listing() {
    $base_url = \Drupal::urlGenerator()->generateFromRoute('<front>', [], ['absolute' => TRUE]);
    $htmlContent = '<br><br><hr>';
    $htmlContent .= "<table><thead><tr><th>Sl.No</th><th>Name</th><th>Email</th><th>Phone</th><th>Query</th><th>Description</th><th>Created</th></tr></thead><tbody>";
    $index = 1;
    $query = \Drupal::database()->select('contact_us', 'co');
    $query->fields('co', ['id','name', 'email', 'phone', 'query', 'description', 'created']);
    $query->orderBy('co.created', 'DESC');
    $pager = $query->extend('Drupal\Core\Database\Query\PagerSelectExtender')
          ->limit(50);
    $results = $pager->execute();
    //$users = $query->execute()->fetchAllAssoc('uid');
    foreach($results as $row) {
      $htmlContent .= '<tr>
                        <td>'.$index.'</td>
                        <td>'.ucwords($row->name).'</td>
                        <td>'.$row->email.'</td>
                        <td>'.$row->phone.'</td>
                        <td>'.$row->query.'</td>
                        <td>'.$row->description.'</td>
                        <td>'.date('d/m/Y', $row->created).'</td>

                      </tr>';
        $index++;
    }
    //<td><a href="'.$base_url.'admin/veedol/delete?q='.$row->id.'">Delete</a></td>
    $htmlContent .= '</tbody></table><br><div class="download"><a href="'.$base_url.'admin/veedol/contact-form-listing/download">Download</a></div>';
    $output = array(
        '#markup' => $htmlContent,
    );
    $build['form'] = $this->formBuilder()->getForm('\Drupal\custom_pages\Form\ContactListingFrm');
    $build['result'] = $output;
    $build['pager'] = [
      '#type' => 'pager',
    ];
    return $build;
  }

  public function contact_download() {
    $query = \Drupal::database()->select('contact_us', 'co');
    $query->fields('co', ['name', 'email', 'phone', 'query','description','created']);
    if(isset($_GET['frm'])) {
      $query->condition('co.created', $_GET['frm'], '>=');
    }
    if(isset($_GET['to'])) {
      $query->condition('co.created', $_GET['to'], '<=');
    }
    $query->orderBy('co.created', 'DESC');
    $results = $query->execute();

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=contact_data.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('Name', 'email', 'Phone','Query','Description','Date'));
    foreach($results as $row) {
      $created = date('d/m/Y', $row->created);
      $data = array($row->name,$row->email,$row->phone,$row->query,$row->description,$created);
      fputcsv($output, $data);
    }
    fclose($output);
    exit();
  }

  public function contactCompany_form_listing() {
    $base_url = \Drupal::urlGenerator()->generateFromRoute('<front>', [], ['absolute' => TRUE]);
    $htmlContent = '<br><br><hr>';
    $htmlContent .= "<table><thead><tr><th>Sl.No</th><th>Name</th><th>Email</th><th>Phone</th><th>Company</th><th>Address</th><th>State</th><th>City</th><th>Pincode</th><th>Enquiry</th><th>Created</th></tr></thead><tbody>";
    $index = 1;
    $query = \Drupal::database()->select('company_contact', 'co');
    $query->fields('co', ['id','name', 'email', 'mobile', 'address', 'city', 'state', 'company', 'pincode', 'enquiry', 'created']);
    $query->orderBy('co.created', 'DESC');
    $pager = $query->extend('Drupal\Core\Database\Query\PagerSelectExtender')
          ->limit(50);
    $results = $pager->execute();
    //$users = $query->execute()->fetchAllAssoc('uid');
    foreach($results as $row) {
      $htmlContent .= '<tr>
                        <td>'.$index.'</td>
                        <td>'.ucwords($row->name).'</td>
                        <td>'.$row->email.'</td>
                        <td>'.$row->mobile.'</td>
                        <td>'.$row->company.'</td>
                        <td>'.$row->address.'</td>
                        <td>'.$row->state.'</td>
                        <td>'.$row->city.'</td>
                        <td>'.$row->pincode.'</td>
                        <td>'.$row->enquiry.'</td>
                        <td>'.date('d/m/Y', $row->created).'</td>

                      </tr>';
        $index++;
    }
    //<td><a href="'.$base_url.'admin/veedol/delete?q='.$row->id.'">Delete</a></td>
    $htmlContent .= '</tbody></table><br><div class="download"><a href="'.$base_url.'admin/veedol/contact-company-form-listing/company-download">Download</a></div>';
    $output = array(
        '#markup' => $htmlContent,
    );
    $build['form'] = $this->formBuilder()->getForm('\Drupal\custom_pages\Form\ContactCompanyListingFrm');
    $build['result'] = $output;
    $build['pager'] = [
      '#type' => 'pager',
    ];
    return $build;
  }

  public function contactCompany_download() {
    $query = \Drupal::database()->select('company_contact', 'co');
    $query->fields('co', ['name', 'email', 'mobile', 'address', 'city', 'state', 'company', 'pincode', 'enquiry', 'created']);
    if(isset($_GET['frm'])) {
      $query->condition('co.created', $_GET['frm'], '>=');
    }
    if(isset($_GET['to'])) {
      $query->condition('co.created', $_GET['to'], '<=');
    }
    $query->orderBy('co.created', 'DESC');
    $results = $query->execute();

    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=contact_company_data.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output, array('Name', 'email', 'Phone','Address', 'City', 'State','Pincode','Company','Enquiry','Date'));
    foreach($results as $row) {
      $created = date('d/m/Y', $row->created);
      $data = array($row->name,$row->email,$row->mobile,$row->address,$row->city,$row->state,$row->pincode,$row->company,$row->enquiry,$created);
      fputcsv($output, $data);
    }
    fclose($output);
    exit();
  }

  public function search() {
    $srch_str = $_POST['search'];
    $query = \Drupal::entityQuery('taxonomy_term');
    $query->condition('vid', 'product_category');
    $query->condition('name', $srch_str.'%', 'LIKE');
    $tids = $query->execute();
    $terms = Term::loadMultiple($tids);
    foreach($terms as $term) {
      $output .= '<div class="search-result">
                    <h2 class="heading">'. $term->name->value .'</h2>
                    <p>'. $srch_str .'<p>
                    <a href="/taxonomy/term/'.$term->tid->value.'" class="btn btn-primary btn-sm">Read More</a>
                  </div>';
    }

    $query = \Drupal::database()->select('node_field_data', 'nfd');
    $query->join('node__body', 'nb', 'nb.entity_id = nfd.nid');
    $query->fields('nfd', ['title', 'nid']);
    $query->fields('nb', ['body_value']);
    $query->condition('nfd.title', '%'.$srch_str.'%', 'LIKE');

    $results = $query->execute();
    foreach($results as $row) {
      $body = strip_tags($row->body_value);
      $body = preg_replace('/((\w+\W*){'.(35).'}(\w+))(.*)/', '${1}', $body);
      $output .= '<div class="search-result">
                    <h2 class="heading">'. $row->title.'</h2>
                    <p>'. $body .'...<p>
                    <a href="/node/'.$row->nid.'" class="btn btn-primary btn-sm">Read More</a>
                  </div>';
    }
    $build = array(
      '#type' => 'markup',
      '#markup' => $output,
    );
    return $build;
  }



















}

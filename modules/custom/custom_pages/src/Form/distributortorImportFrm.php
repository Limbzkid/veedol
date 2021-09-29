<?php

  /**
    * @file
    * Contains \Drupal\custom_pages\Form\distributortorImportFrm.
    */
  namespace Drupal\custom_pages\Form;

  use Drupal\Core\Form\FormBase;
  use Drupal\Core\Form\FormStateInterface;
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\IOFactory;
  use PhpOffice\PhpSpreadsheet\Style\Fill;
  use PhpOffice\PhpSpreadsheet\Cell\DataType;
  use PhpOffice\PhpSpreadsheet\Style\Alignment;
  use PhpOffice\PhpSpreadsheet\Style\Border;

  class distributortorImportFrm extends FormBase {

    /**
    * {@inheritdoc}
    */
    public function getFormId() {
      return 'distributor-import';
    }

    /**
    * {@inheritdoc}
    */

    public function buildForm(array $form, FormStateInterface $form_state) {

      $form = array(
        '#attributes' => array('enctype' => 'multipart/form-data'),
      );

      $form['file_upload_details'] = array(
        '#markup' => t('<b>Please note, Existing data will be deleted.</b>'),
      );

      $validators = array(
        'file_validate_extensions' => array('xls xlsx'),
      );
      $form['excel_file'] = array(
        '#type' => 'managed_file',
        '#name' => 'excel_file',
        '#title' => t('Upload Excel File'),
        '#size' => 20,
        '#description' => t('xls and xlsx format only'),
        '#upload_validators' => $validators,
        '#upload_location' => 'public://assets/temp/',
      );

      $form['actions']['#type'] = 'actions';
      $form['actions']['submit'] = array(
        '#type' => 'submit',
        '#value' => $this->t('Import'),
        '#button_type' => 'primary',
      );

      return $form;

    }

    public function submitForm(array &$form, FormStateInterface $form_state) {

      $file = \Drupal::entityTypeManager()->getStorage('file')->load($form_state->getValue('excel_file')[0]);
      $full_path = $file->get('uri')->value;
      $file_name = basename($full_path);

      $inputFileName = \Drupal::service('file_system')->realpath('public://assets/temp/'.$file_name);

		  $spreadsheet = IOFactory::load($inputFileName);

		  $sheetData = $spreadsheet->getActiveSheet();

  		$rows = array();
  		foreach ($sheetData->getRowIterator() as $row) {
  			//echo "<pre>";print_r($row);exit;
  			$cellIterator = $row->getCellIterator();
  			$cellIterator->setIterateOnlyExistingCells(FALSE);
  			$cells = [];
  			foreach ($cellIterator as $cell) {
  				$cells[] = $cell->getValue();
  			}
        $rows[] = $cells;

  		}
      array_shift($rows);

      //echo "<pre>";print_r($rows);exit;
      if(!empty($rows)) {
        $query = \Drupal::database()->delete('distributors');
        $query->execute();
      }


      foreach($rows as $row) {
        $uuid_service = \Drupal::service('uuid');
        $uuid = $uuid_service->generate();
        $database = \Drupal::database();
        $result = $database->insert('distributors')
          ->fields([
            'cid'         => $row[1],
            'region'      => $row[0],
            'trader'      => $row[2],
            'addr'        => $row[3],
            'house_no'    => $row[4],
            'postal_code' => $row[5],
            'state'       => $row[7],
            'city'        => $row[6],
            'email'       => $row[9],
            'mobile'      => $row[8],
          ])->execute();

      }
      if($result) {
        $message = t('Import Succesful.') ;
        drupal_set_message($message);
      }

    }


  }

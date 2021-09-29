<?php
  namespace Drupal\custom_blocks\Plugin\Block;

  use Drupal\taxonomy\Entity\Term;
  use Drupal\Core\Block\BlockBase;
  use Drupal\Component\Annotation\Plugin;
  use Drupal\Core\Annotation\Translation;
  use Drupal\Core\Url;
  use Drupal\Core\Link;
  use Drupal\node\Entity\Node;


  /**
   * Provides a 'Custom' Block
   *
   * @Block(
   *   id = "financial_results",
   *   admin_label = @Translation("Financial Results Block"),
   * )
   */
  class FinancialResultsBlock extends BlockBase {

    /**
   *  {@inheritdoc}
   */
    public function build() {

      $years = array();
      $data = array();
      $current = '';
      $company = array();
      $cur_company = '';

      $node = \Drupal::routeMatch()->getParameter('node');
      $page_nid = $node->id();
      $url = basename(URL::fromRoute('<current>',array(),array('absolute'=>'true'))->toString());
      $page = str_replace('-', ' ', $url);

      $current = '';

      $query = \Drupal::entityQuery('node');
      $query->condition('status', NODE_PUBLISHED)
            ->condition('field_select_page', $page)
            ->condition('type', 'financial_results');
      if($page_nid == 160) {
        $query->sort('field_subsidiary_companies', 'DESC');
      }
      $query->sort('field_financial_year.entity:taxonomy_term.name', 'DESC');
      $nids = $query->execute();
      $nodes = Node::loadMultiple($nids);

      foreach($nodes as $node) {
        $options  = ['absolute' => TRUE];
        if(!in_array($node->field_financial_year->entity->name->value, $years)) {
          array_push($years, $node->field_financial_year->entity->name->value);
          if($current == '') {
            $current = $node->field_financial_year->entity->name->value;
          }

        }
        if($page_nid == 160) {
          array_push($company, $node->field_subsidiary_companies->value);
          if($cur_company == '') {
            $cur_company = $node->field_subsidiary_companies->value;
          }
          if($node->field_financial_year->entity->name->value == $current && $node->field_subsidiary_companies->value == $cur_company) {
            $data[] = array(
              'title' => $node->title->value,
              'file' => $node->field_pdf_upload->target_id ? file_create_url($node->field_pdf_upload->entity->getFileUri()) : '',
            );
          }
        }

        if($node->field_financial_year->entity->name->value == $current && $page_nid != 160) {
          $data[] = array(
            'title' => $node->title->value,
            'file' => $node->field_pdf_upload->target_id ? file_create_url($node->field_pdf_upload->entity->getFileUri()) : '',
          );
        }
      }

      rsort($years);
      //echo '<pre>'; print_r(array_unique($company)); exit;
      return [
        '#theme'      => 'block__financial_results',
        '#title'      => $this->t('Financial Years'),
        '#data_obj'   => $data,
        '#options'   => $years,
        '#company'    => array_unique($company)
      ];
    }

    public function getCacheMaxAge() {
      return 0;
    }
  }

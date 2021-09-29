<?php
  namespace Drupal\custom_blocks\Plugin\Block;

  use Drupal\Core\Block\BlockBase;
  use Drupal\Component\Annotation\Plugin;
  use Drupal\Core\Url;
  use Drupal\Core\Link;
  use Drupal\file\Entity\File;


  /**
   * Provides a 'Custom' Block
   *
   * @Block(
   *   id = "main_menu",
   *   admin_label = @Translation("Main Menu Block"),
   * )
   */
  class MenuBlock extends BlockBase {

    /**
   *  {@inheritdoc}
   */
    public function build() {
      $data = array();
      $top = array();
      $product_mnu = array();

      $service = \Drupal::service('custom_blocks.taxonomy_term_tree');
      $tree = $service->load('product_category');

      $parents = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('product_category',0,1,FALSE);
      foreach($parents as $parent) {
        $children = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('product_category',$parent->tid,1,FALSE);
        $level_1 = array();
        if(!empty($children)) {
          foreach($children as $child) {
            $grand_child = \Drupal::entityTypeManager()->getStorage('taxonomy_term')->loadTree('product_category',$child->tid,1,FALSE);
            $level_2 = array();
            if(!empty($grand_child )) {
              foreach($grand_child as $gchild) {
                $level_2[] = array(
                  'name' => $gchild->name,
                  'alias' => \Drupal::service('path.alias_manager')->getAliasByPath('/taxonomy/term/' . $gchild->tid),
                );
              }
            }
            $level_1[] = array(
              'name' => $child->name,
              'alias' => \Drupal::service('path.alias_manager')->getAliasByPath('/taxonomy/term/' . $child->tid),
              'child' => $level_2,
            );
           }
        }
        $product_mnu[] = array(
          'name' => $parent->name,
          'alias' => \Drupal::service('path.alias_manager')->getAliasByPath('/taxonomy/term/' . $parent->tid),
          'child' => $level_1,
        );
      }


      





      // foreach($tree as $cat) {
      //   $level_1 = array();
      //   if(!empty($cat->children)) {
      //     foreach($cat->children as $children ) {
      //       $level_2 = array();
      //       if(!empty($children->children)) {
      //         foreach($children->children as $child) {
      //           $level_3 = array();
      //           if(!empty($child->children)) {
      //             foreach($child->children as $last_child) {
      //               $level_3[] = array(
      //                 'name' => $last_child->name,
      //                 'alias' => \Drupal::service('path.alias_manager')->getAliasByPath('/taxonomy/term/' . $last_child->tid),
      //               );
      //             }
      //           }
      //           $level_2[] = array(
      //             'name' => $child->name,
      //             'alias' => \Drupal::service('path.alias_manager')->getAliasByPath('/taxonomy/term/' . $child->tid),
      //             'child' => $level_3,
      //           );
      //         }
      //       }
      //       $level_1[] = array(
      //         'name' => $children->name,
      //         'alias' => \Drupal::service('path.alias_manager')->getAliasByPath('/taxonomy/term/' . $children->tid),
      //         'child' => $level_2,
      //       );
      //     }
      //   }
      //   $product_mnu[] = array(
      //     'name' => $cat->name,
      //     'alias' => \Drupal::service('path.alias_manager')->getAliasByPath('/taxonomy/term/' . $cat->tid),
      //     'child' => $level_1,
      //   );
      // }

      $tree = \Drupal::menuTree()->load('main', new \Drupal\Core\Menu\MenuTreeParameters());
      $manipulators = array(
        ['callable' => 'menu.default_tree_manipulators:generateIndexAndSort']
      );
      $tree = \Drupal::menuTree()->transform($tree, $manipulators);
      $is_front = \Drupal::service('path.matcher')->isFrontPage();

      $url = Url::fromRoute('<current>',array())->toString();
      foreach ($tree as $item) {
        $children = array();
        $class = '';
        $link = $item->link->getUrlObject()->toString();

        if($item->link->isEnabled()) {

          if($item->hasChildren) {
            foreach($item->subtree as $child) {
              if($child->link->isEnabled()) {
                if ($child->link instanceof \Drupal\menu_link_content\Plugin\Menu\MenuLinkContent) {
                  $uuid = $child->link->getDerivativeId();
                  $entity = \Drupal::service('entity.repository')->loadEntityByUuid('menu_link_content', $uuid);
                  if($entity->field_upload_pdf->target_id) {
                    $fid = $entity->field_upload_pdf->target_id;
                    $file_object = File::load($fid);
                    $file_uri = file_create_url($file_object->uri->value);
                  } else {
                    $file_uri = '';
                  }
                }

                $last = array();
                if($child->hasChildren) {
                  foreach($child->subtree as $rel) {
                    if($rel->link->isEnabled()) {
                      if ($rel->link instanceof \Drupal\menu_link_content\Plugin\Menu\MenuLinkContent) {
                        $uuid = $rel->link->getDerivativeId();
                        $entity = \Drupal::service('entity.repository')->loadEntityByUuid('menu_link_content', $uuid);
                        if($entity->field_upload_pdf->target_id) {
                          $fid = $entity->field_upload_pdf->target_id;
                          $file_object = File::load($fid);
                          $file_uri = file_create_url($file_object->uri->value);
                        } else {
                          $file_uri = '';
                        }
                      }
                      if($rel->link->getUrlObject()->toString() == '' && $file_uri == '') {
                        $link_url = 'javascript:;';
                      } elseif($file_uri != '') {
                        $link_url = $file_uri;
                      } else {
                        $link_url = $rel->link->getUrlObject()->toString();
                      }



                      $last[] = array(
                        'title' => $rel->link->getTitle(),
                        'link'  => $link_url,
                        'target'  => ($file_uri != '') ? '1' : '0' ,
                      );
                    }
                  }
                  $file_uri = '';
                }

                if($child->link->getUrlObject()->toString() == '' && $file_uri == '') {
                  $link_url = 'javascript:;';
                } elseif($file_uri != '') {
                  $link_url = $file_uri;
                } else {
                  $link_url = $child->link->getUrlObject()->toString();
                }

                $children[] = array(
                  'title' => $child->link->getTitle(),
                  'link'  => $link_url,
                  'target'  => ($file_uri != '') ? '1' : '0' ,
                  'child' => $last
                );
              }
            }

          }
          if($item->link->getTitle() == 'Products') {
            $children = $product_mnu;
          }

          $data[] = array(
            'title' => $item->link->getTitle(),
            'link'  => $link,
            'class' => $class,
            'child' => $children,
            'target' => $item->link->getDescription()
          );
        }
      }

      $tree = \Drupal::menuTree()->load('top-menu', new \Drupal\Core\Menu\MenuTreeParameters());
      $manipulators = array(
        ['callable' => 'menu.default_tree_manipulators:generateIndexAndSort']
      );
      $tree = \Drupal::menuTree()->transform($tree, $manipulators);
      $is_front = \Drupal::service('path.matcher')->isFrontPage();

      $url = Url::fromRoute('<current>',array())->toString();
      foreach ($tree as $item) {
        $class = '';
        $link = $item->link->getUrlObject()->toString();
        if($is_front && $link == '/') {
          $class = 'active';
        }
        if($link == $url) {
          $class = 'active';
        }
        if($item->link->isEnabled()) {
          $top[] = array(
            'title' => $item->link->getTitle(),
            'link'  => $link,
            'class' => $class,
          );
        }
      }


      //echo '<pre>'; print_r($data); exit;
      return [
        '#theme'      => 'block__main_menu',
        '#title'      => $this->t('Main Menu'),
        '#data_obj'   => $data,
        '#top_menu'   => $top,
      ];
    }
  }

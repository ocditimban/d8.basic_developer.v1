<?php

namespace Drupal\hello_ajax\Page;

class HelloAjaxPage {
  public function render() {
    // return array('#markup' => 'This is hello page');
    return array(
      '#theme' => 'hello_ajax_add_page',
      '#content' => 'my content',
      '#attached' => array(
        'library' => array('core/drupal.ajax'),
        'css' => array(drupal_get_path('module', 'hello_ajax') . '/css/hello_ajax.css')
      ),
    );
  }
}

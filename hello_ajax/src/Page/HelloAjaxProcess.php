<?php

namespace Drupal\hello_ajax\Page;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\ReplaceCommand;
use Drupal\Core\Ajax\AppendCommand;
use Drupal\Core\Ajax\AlertCommand;
use Drupal\Core\Ajax\CssCommand;
use Drupal\Core\Ajax\RedirectCommand;

class HelloAjaxProcess {

  public function render() {
    $data = 'Hello Phuong Bui 5';
    $response = new AjaxResponse();
    // $response->addCommand(new ReplaceCommand('#render-at-here', '<div id="render-at-here">' . $data . '</div>'));
    // $response->addCommand(new AppendCommand('#render-at-here', '<div>' . $data . '</div>'));
    // $response->addCommand(new AlertCommand($data));
    $response->addCommand(new CssCommand('#render-at-here', array('color' => 'red')));
    // $response->addCommand(new RedirectCommand('http://google.com.vn'));
    return $response;
  }
}

<?php

/**
 * @file
 * Contains Drupal\hello_block\Controller\DefaultController.
 */

namespace Drupal\hello_block\Controller;

use Drupal\Core\Controller\ControllerBase;

class HelloBlockController extends ControllerBase {

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function hello($name) {
    return "Hello " . $name . " !";
  }
}

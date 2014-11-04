<?php

/**
 * @file
 * Contains Drupal\hello_menu\Controller\DefaultController.
 */

namespace Drupal\hello_menu\Controller;

use Drupal\Core\Controller\ControllerBase;

class DefaultController extends ControllerBase {

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function hello() {
    return "Hello world";
  }
}

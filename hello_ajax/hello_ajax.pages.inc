<?php

use Drupal\Core\Url;

/**
 * Prepares variables for a custom block type creation list templates.
 *
 * Default template: hello-ajax-add-page.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - content: An array of block types.
 *
 */
function template_preprocess_hello_ajax_add_page(&$variables) {
  $variables['content'] = '123456 my content';
  $url = new Url('hello_ajax.link.process');
  $url->setOptions(array('attributes' => array('class' => array('use-ajax'))));
  $variables['link'] = \Drupal::l("My link", $url);
}

<?php

/**
 * @file
 * Contains Drupal\hello_ajax\Form\hello_ajax.
 */

namespace Drupal\hello_ajax\Form;

use Drupal\Core\Url;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class hello_ajax extends ConfigFormBase
{

  /**
   * Drupal\hal\HalSubscriber definition.
   *
   * @var Drupal\hal\HalSubscriber
   */
  protected $hal_subscriber;

  public function __construct() {
  }

  public static function create(ContainerInterface $container) {
    return new static(
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormID() {
    return 'hello_ajax_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('hello_ajax.hello_ajax_form_config');

    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#description' => $this->t(''),
      '#default_value' => $config->get('title'),
      '#ajax' => array(
        'callback' => '::ajaxSample',
        'wrapper' => 'title-replace-id'
      ),
    ];

    $form['title-replace'] = [
      '#type' => 'textfield',
      '#default_value' => $config->get('body'),
      '#prefix' => '<div id="title-replace-id">',
      '#suffix' => '</div>',
    ];

    $form['body'] = [
      '#type' => 'textfield',
      '#title' => $this->t('body'),
      '#description' => $this->t(''),
      '#default_value' => $config->get('body'),
      '#ajax' => array(
        'callback' => '::ajaxSample1',
        'wrapper' => 'body-replace-id'
      ),
    ];


    $form['body-replace'] = [
      '#type' => 'textfield',
      '#default_value' => $config->get('body'),
      '#prefix' => '<div id="body-replace-id">',
      '#suffix' => '</div>',
    ];

    // Dialog behavior applied to a #type => 'link'.
    $form['link'] = array(
      '#type' => 'link',
      '#title' => 'Link 1 (modal)',
      '#url' => Url::fromRoute('hello_ajax.hello_ajax_form'),
      '#attributes' => array(
        'class' => array('use-ajax'),
        'data-accepts' => 'application/vnd.drupal-dialog',
      ),
    );

    return parent::buildForm($form, $form_state);
  }

  public function ajaxSample($form, FormStateInterface $form_state) {
    $title = $form_state->getValue('title');
    $form['title-replace']['#value'] = $title;
    return $form['title-replace'];
  }

  public function ajaxSample1($form, FormStateInterface $form_state) {
    $body = $form_state->getValue('body');
    return '<div id="body-replace-id">' . $body . '</div>';
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    return parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);
    $this->config('hello_ajax.hello_ajax_form_config')
      ->set('title', $form_state->getValue('title'))
      ->set('body', $form_state->getValue('body'))
      ->save();
  }
}

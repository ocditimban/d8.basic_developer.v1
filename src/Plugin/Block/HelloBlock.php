<?php

namespace Drupal\hello_block\Plugin\Block;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Block\BlockPluginInterface;


/**
 * @Block(
 *   id = "hello_block",
 *   admin_label = @Translation("Hello Block"),
 * )
 */
class HelloBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    // get from BlockPluginInterface
    $machine_name = $this->getMachineNameSuggestion();
    return 'abcde';
  }


  /**
   * {@inheritdoc}
   */
  public function access(AccountInterface $account) {
    if (in_array('authenticated', $account->getRoles())) {
      $access = AccessResult::allowed();
    }
    else {
      $access = AccessResult::forbidden();
    }
    return $access->setCacheable(FALSE);
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    //Retrieve existing configuration for this block.
    $config = $this->getConfiguration();
    // Add a form field to the existing block configuration form.
    $form['fax_block_settings'] = array(
      '#type' => 'textfield',
      '#title' => t('Fax number'),
      '#default_value' => isset($config['fax_block_settings']) ? $config['fax_block_settings'] : '',
      '#weight' => 0,
    );
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $fax_block_settings = $form_state->getValue('fax_block_settings');
    $this->setConfigurationValue('fax_block_settings', $fax_block_settings);
  }
}

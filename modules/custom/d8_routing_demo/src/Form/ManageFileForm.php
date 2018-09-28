<?php

namespace Drupal\d8_routing_demo\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class ManageFileForm.
 */
class ManageFileForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'manage_file_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['upload_file'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Upload File'),
      '#description' => $this->t('Upload a file'),
      '#weight' => '0',
      '#upload_validators' => [
        'file_validate_extensions' => ['csv'],
        'd8_routing_demo_validate_csv' => [],
      ]
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#title' => $this->t('Submit'),
      '#weight' => '0',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message("Submitted a file successfully");
    }

  }

}

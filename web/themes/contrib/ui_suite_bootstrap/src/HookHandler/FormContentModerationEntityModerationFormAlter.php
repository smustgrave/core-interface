<?php

declare(strict_types=1);

namespace Drupal\ui_suite_bootstrap\HookHandler;

use Drupal\Core\Form\FormStateInterface;

/**
 * Content moderation entity moderation form.
 */
class FormContentModerationEntityModerationFormAlter {

  /**
   * Moderation state size so that it is not too wide.
   */
  public const SIZE = 15;

  /**
   * Ensure the moderation state is properly aligned.
   *
   * @param array $form
   *   The form structure.
   * @param \Drupal\Core\Form\FormStateInterface $formState
   *   The form state.
   * @param string $form_id
   *   The form ID.
   */
  public function alter(array &$form, FormStateInterface $formState, string $form_id): void {
    if (!isset($form['current']['#markup'], $form['current']['#title'])) {
      return;
    }

    $form['current'] = [
      '#type' => 'textfield',
      '#title' => $form['current']['#title'],
      '#attributes' => [
        'class' => [
          'form-control-plaintext',
        ],
        'readonly' => TRUE,
      ],
      '#value' => $form['current']['#markup'],
      '#size' => static::SIZE,
    ];
  }

}

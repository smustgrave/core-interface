<?php

/**
 * @file
 * Functions to support UI Suite Bootstrap Starterkit theme settings.
 */

declare(strict_types=1);

use Drupal\Core\Form\FormStateInterface;

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function ui_suite_bootstrap_starterkit_split_form_system_theme_settings_alter(array &$form, FormStateInterface $form_state): void {
  // Add this theme CSS into the options.
  if (isset($form['ui_suite_bootstrap']['library']['css_loading']['#options'])) {
    $form['ui_suite_bootstrap']['library']['css_loading']['#options']['ui_suite_bootstrap_starterkit_split/framework'] = \t('Starterkit');
  }
}

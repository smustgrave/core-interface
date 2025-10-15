<?php

declare(strict_types=1);

namespace Drupal\ui_suite_bootstrap_starterkit_split\HookHandler;

use Drupal\Component\Utility\NestedArray;

/**
 * Alter libraries.
 */
class LibraryInfoAlter {

  public const string FRAMEWORK_CSS_LIBRARY = 'ui_suite_bootstrap_starterkit_split/framework';

  public const array DEPENDENCIES_MAPPING = [
    'components.ui_suite_bootstrap--accordion' => [
      'ui_suite_bootstrap_starterkit_split/component_accordion',
    ],
    'components.ui_suite_bootstrap--accordion_item' => [
      'ui_suite_bootstrap_starterkit_split/component_accordion',
    ],
    'components.ui_suite_bootstrap--alert' => [
      'ui_suite_bootstrap_starterkit_split/component_alert',
    ],
    'components.ui_suite_bootstrap--badge' => [
      'ui_suite_bootstrap_starterkit_split/component_badge',
    ],
    'components.ui_suite_bootstrap--breadcrumb' => [
      'ui_suite_bootstrap_starterkit_split/component_breadcrumb',
    ],
    'components.ui_suite_bootstrap--button_group' => [
      'ui_suite_bootstrap_starterkit_split/component_button_group',
    ],
    'components.ui_suite_bootstrap--button_toolbar' => [
      'ui_suite_bootstrap_starterkit_split/component_button_group',
    ],
    'components.ui_suite_bootstrap--card' => [
      'ui_suite_bootstrap_starterkit_split/component_card',
    ],
    'components.ui_suite_bootstrap--card_body' => [
      'ui_suite_bootstrap_starterkit_split/component_card',
    ],
    'components.ui_suite_bootstrap--card_group' => [
      'ui_suite_bootstrap_starterkit_split/component_card',
    ],
    'components.ui_suite_bootstrap--card_overlay' => [
      'ui_suite_bootstrap_starterkit_split/component_card',
    ],
    'components.ui_suite_bootstrap--carousel' => [
      'ui_suite_bootstrap_starterkit_split/component_carousel',
    ],
    'components.ui_suite_bootstrap--carousel_item' => [
      'ui_suite_bootstrap_starterkit_split/component_carousel',
    ],
    'components.ui_suite_bootstrap--close_button' => [
      'ui_suite_bootstrap_starterkit_split/component_close_button',
    ],
    'components.ui_suite_bootstrap--dropdown' => [
      'ui_suite_bootstrap_starterkit_split/component_dropdown',
      'ui_suite_bootstrap_starterkit_split/component_button_group',
    ],
    'components.ui_suite_bootstrap--list_group' => [
      'ui_suite_bootstrap_starterkit_split/component_list_group',
    ],
    'components.ui_suite_bootstrap--list_group_item' => [
      'ui_suite_bootstrap_starterkit_split/component_list_group',
    ],
    'components.ui_suite_bootstrap--modal' => [
      'ui_suite_bootstrap_starterkit_split/component_modal',
    ],
    'components.ui_suite_bootstrap--nav' => [
      'ui_suite_bootstrap_starterkit_split/component_nav',
    ],
    'components.ui_suite_bootstrap--navbar' => [
      'ui_suite_bootstrap_starterkit_split/component_navbar',
    ],
    'components.ui_suite_bootstrap--navbar_nav' => [
      'ui_suite_bootstrap_starterkit_split/component_navbar',
    ],
    'components.ui_suite_bootstrap--offcanvas' => [
      'ui_suite_bootstrap_starterkit_split/component_offcanvas',
    ],
    'components.ui_suite_bootstrap--pagination' => [
      'ui_suite_bootstrap_starterkit_split/component_pagination',
    ],
    'components.ui_suite_bootstrap--progress' => [
      'ui_suite_bootstrap_starterkit_split/component_progress',
    ],
    'components.ui_suite_bootstrap--progress_stacked' => [
      'ui_suite_bootstrap_starterkit_split/component_progress',
    ],
    'components.ui_suite_bootstrap--spinner' => [
      'ui_suite_bootstrap_starterkit_split/component_spinner',
    ],
    'components.ui_suite_bootstrap--table' => [
      'ui_suite_bootstrap_starterkit_split/component_table',
    ],
    'components.ui_suite_bootstrap--table_cell' => [
      'ui_suite_bootstrap_starterkit_split/component_table',
    ],
    'components.ui_suite_bootstrap--table_row' => [
      'ui_suite_bootstrap_starterkit_split/component_table',
    ],
    'components.ui_suite_bootstrap--toast' => [
      'ui_suite_bootstrap_starterkit_split/component_toast',
    ],
    'components.ui_suite_bootstrap--toast_container' => [
      'ui_suite_bootstrap_starterkit_split/component_toast',
    ],
  ];

  /**
   * Alter libraries.
   *
   * @param array $libraries
   *   An associative array of libraries, passed by reference.
   * @param string $extension
   *   Can either be 'core' or the machine name of the extension that registered
   *   the libraries.
   */
  public function alter(array &$libraries, string $extension): void {
    if ($extension != 'core') {
      return;
    }

    $css_library = \theme_get_setting('library.css_loading') ?? '';
    // Attach dynamically to components the split CSS.
    if ($css_library != static::FRAMEWORK_CSS_LIBRARY) {
      return;
    }

    foreach (static::DEPENDENCIES_MAPPING as $library => $dependencies) {
      if (!isset($libraries[$library]) || !\is_array($libraries[$library])) {
        continue;
      }

      $libraries[$library] = NestedArray::mergeDeepArray([$libraries[$library], ['dependencies' => $dependencies]]);
    }
  }

}

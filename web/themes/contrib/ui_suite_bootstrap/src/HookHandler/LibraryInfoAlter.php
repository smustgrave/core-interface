<?php

declare(strict_types=1);

namespace Drupal\ui_suite_bootstrap\HookHandler;

/**
 * Alter libraries.
 */
class LibraryInfoAlter {

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
    if ($extension != 'ui_suite_bootstrap') {
      return;
    }

    if (!isset($libraries['framework'])) {
      return;
    }

    // Would theme_get_settings have side effects if the current theme is not
    // UI Suite Bootstrap or child theme?
    $js_library = \theme_get_setting('library.js_loading') ?? 'ui_suite_bootstrap/framework_js';
    if ($js_library) {
      $libraries['framework']['dependencies'][] = $js_library;
    }

    $css_library = \theme_get_setting('library.css_loading') ?? 'ui_suite_bootstrap/framework_css_bootstrap';
    if ($css_library) {
      $libraries['framework']['dependencies'][] = $css_library;
    }
  }

}

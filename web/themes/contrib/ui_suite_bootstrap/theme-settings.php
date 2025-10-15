<?php

/**
 * @file
 * Functions to support UI Suite Bootstrap theme settings.
 */

declare(strict_types=1);

use Drupal\Core\Form\FormStateInterface;

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function ui_suite_bootstrap_form_system_theme_settings_alter(array &$form, FormStateInterface $form_state): void {
  $form['ui_suite_bootstrap'] = [
    '#type' => 'details',
    '#title' => \t('Bootstrap'),
    '#open' => TRUE,
  ];

  $form['ui_suite_bootstrap']['container'] = [
    '#type' => 'select',
    '#title' => \t('Page container'),
    '#description' => \t('Select an option for <a href=":url">Bootstrap containers</a>.', [
      ':url' => 'https://getbootstrap.com/docs/5.3/layout/containers/',
    ]),
    '#options' => [
      'container' => \t('Container'),
      'container-sm' => \t('Container small'),
      'container-md' => \t('Container medium'),
      'container-lg' => \t('Container large'),
      'container-xl' => \t('Container x-large'),
      'container-xxl' => \t('Container xx-large'),
      'container-fluid' => \t('Container fluid'),
    ],
    '#default_value' => \theme_get_setting('container') ?? 'container',
  ];

  $form['ui_suite_bootstrap']['library'] = [
    '#type' => 'details',
    '#title' => \t('Library'),
    '#tree' => TRUE,
  ];
  $form['ui_suite_bootstrap']['library']['js_loading'] = [
    '#type' => 'select',
    '#title' => \t('JavaScript'),
    '#description' => \t('If left empty, it is assumed that you have custom code or sub-theme altering or extending ui_suite_bootstrap/framework library to load JS your own way.'),
    '#options' => [
      'ui_suite_bootstrap/framework_js' => \t('Local'),
      'ui_suite_bootstrap/framework_js_cdn' => \t('CDN'),
    ],
    '#empty_value' => '',
    '#default_value' => \theme_get_setting('library.js_loading') ?? 'ui_suite_bootstrap/framework_js',
    '#after_build' => [
      'ui_suite_bootstrap_filter_libraries_after_build',
    ],
  ];
  $form['ui_suite_bootstrap']['library']['css_loading'] = [
    '#type' => 'select',
    '#title' => \t('Stylesheet'),
    '#description' => \t('If left empty, it is assumed that you have custom code or sub-theme altering or extending ui_suite_bootstrap/framework library to load CSS your own way.')
    . '<br>'
    . \t('Visit <a href=":url">Bootswatch\'s website</a> to get a preview of the themes.', [
      ':url' => 'https://bootswatch.com',
    ]),
    '#options' => [
      'ui_suite_bootstrap/framework_css_bootstrap' => \t('Bootstrap'),
      'ui_suite_bootstrap/framework_css_cdn_bootstrap' => \t('Bootstrap (CDN)'),
      \t('Bootswatch (local)')->render() => [
        'ui_suite_bootstrap/framework_css_bootswatch_brite' => \t('Brite'),
        'ui_suite_bootstrap/framework_css_bootswatch_cerulean' => \t('Cerulean'),
        'ui_suite_bootstrap/framework_css_bootswatch_cosmo' => \t('Cosmo'),
        'ui_suite_bootstrap/framework_css_bootswatch_cyborg' => \t('Cyborg'),
        'ui_suite_bootstrap/framework_css_bootswatch_darkly' => \t('Darkly'),
        'ui_suite_bootstrap/framework_css_bootswatch_flatly' => \t('Flatly'),
        'ui_suite_bootstrap/framework_css_bootswatch_journal' => \t('Journal'),
        'ui_suite_bootstrap/framework_css_bootswatch_litera' => \t('Litera'),
        'ui_suite_bootstrap/framework_css_bootswatch_lumen' => \t('Lumen'),
        'ui_suite_bootstrap/framework_css_bootswatch_lux' => \t('Lux'),
        'ui_suite_bootstrap/framework_css_bootswatch_materia' => \t('Materia'),
        'ui_suite_bootstrap/framework_css_bootswatch_minty' => \t('Minty'),
        'ui_suite_bootstrap/framework_css_bootswatch_morph' => \t('Morph'),
        'ui_suite_bootstrap/framework_css_bootswatch_pulse' => \t('Pulse'),
        'ui_suite_bootstrap/framework_css_bootswatch_quartz' => \t('Quartz'),
        'ui_suite_bootstrap/framework_css_bootswatch_sandstone' => \t('Sandstone'),
        'ui_suite_bootstrap/framework_css_bootswatch_simplex' => \t('Simplex'),
        'ui_suite_bootstrap/framework_css_bootswatch_sketchy' => \t('Sketchy'),
        'ui_suite_bootstrap/framework_css_bootswatch_slate' => \t('Slate'),
        'ui_suite_bootstrap/framework_css_bootswatch_solar' => \t('Solar'),
        'ui_suite_bootstrap/framework_css_bootswatch_spacelab' => \t('Spacelab'),
        'ui_suite_bootstrap/framework_css_bootswatch_superhero' => \t('Superhero'),
        'ui_suite_bootstrap/framework_css_bootswatch_united' => \t('United'),
        'ui_suite_bootstrap/framework_css_bootswatch_vapor' => \t('Vapor'),
        'ui_suite_bootstrap/framework_css_bootswatch_yeti' => \t('Yeti'),
        'ui_suite_bootstrap/framework_css_bootswatch_zephyr' => \t('Zephyr'),
      ],
      \t('Bootswatch (CDN)')->render() => [
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_brite' => \t('Brite'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_cerulean' => \t('Cerulean'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_cosmo' => \t('Cosmo'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_cyborg' => \t('Cyborg'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_darkly' => \t('Darkly'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_flatly' => \t('Flatly'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_journal' => \t('Journal'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_litera' => \t('Litera'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_lumen' => \t('Lumen'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_lux' => \t('Lux'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_materia' => \t('Materia'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_minty' => \t('Minty'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_morph' => \t('Morph'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_pulse' => \t('Pulse'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_quartz' => \t('Quartz'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_sandstone' => \t('Sandstone'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_simplex' => \t('Simplex'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_sketchy' => \t('Sketchy'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_slate' => \t('Slate'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_solar' => \t('Solar'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_spacelab' => \t('Spacelab'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_superhero' => \t('Superhero'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_united' => \t('United'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_vapor' => \t('Vapor'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_yeti' => \t('Yeti'),
        'ui_suite_bootstrap/framework_css_cdn_bootswatch_zephyr' => \t('Zephyr'),
      ],
    ],
    '#empty_value' => '',
    '#default_value' => \theme_get_setting('library.css_loading') ?? 'ui_suite_bootstrap/framework_css_bootstrap',
    '#after_build' => [
      'ui_suite_bootstrap_filter_libraries_after_build',
    ],
  ];

  $form['#submit'][] = 'ui_suite_bootstrap_form_system_theme_settings_submit';
}

/**
 * Submit callback.
 *
 * @param array $form
 *   The form structure.
 * @param \Drupal\Core\Form\FormStateInterface $form_state
 *   The form state.
 */
function ui_suite_bootstrap_form_system_theme_settings_submit(array &$form, FormStateInterface $form_state): void {
  /** @var string $config_key */
  $config_key = $form_state->getValue('config_key');
  $theme_config = \Drupal::configFactory()->get($config_key);

  $checked_keys = [
    'library.js_loading' => ['library', 'js_loading'],
    'library.css_loading' => ['library', 'css_loading'],
  ];

  foreach ($checked_keys as $config_path => $form_path) {
    if ($theme_config->get($config_path) != $form_state->getValue($form_path)) {
      \Drupal::service('library.discovery')->clear();
      return;
    }
  }
}

/**
 * Remove invalid libraries from select options.
 *
 * @param array{"#options": array} $element
 *   The form element.
 * @param \Drupal\Core\Form\FormStateInterface $form_state
 *   The form state.
 *
 * @return array
 *   The modified element.
 */
function ui_suite_bootstrap_filter_libraries_after_build(array $element, FormStateInterface $form_state): array {
  $element['#options'] = \ui_suite_bootstrap_clear_libraries($element['#options']);
  return $element;
}

/**
 * Filter invalid libraries.
 *
 * @param array $options
 *   The options to filter.
 *
 * @return array
 *   The changed options.
 */
function ui_suite_bootstrap_clear_libraries(array $options): array {
  /** @var \Drupal\Core\Asset\LibraryDiscoveryInterface $library_discovery */
  $library_discovery = \Drupal::service('library.discovery');
  foreach ($options as $option => $value) {
    if (\is_array($value)) {
      $options[$option] = \ui_suite_bootstrap_clear_libraries($value);
      if (empty($options[$option])) {
        unset($options[$option]);
      }
      continue;
    }

    $library_name = \explode('/', $option);
    if (!isset($library_name[1])) {
      continue;
    }
    $library = $library_discovery->getLibraryByName($library_name[0], $library_name[1]);
    // @phpstan-ignore-next-line
    if ($library && !\ui_suite_bootstrap_is_library_valid($library)) {
      unset($options[$option]);
    }
  }

  return $options;
}

/**
 * Check if a library files are accessible.
 *
 * @param array{js?: array{array{type: string, data: string}}, css?: array{array{type: string, data: string}}, dependencies?: string[]} $library
 *   A library definition.
 *
 * @return bool
 *   TRUE if the library files are accessible.
 *
 * @see https://www.drupal.org/project/drupal/issues/2231385
 */
function ui_suite_bootstrap_is_library_valid(array $library): bool {
  if (\array_key_exists('js', $library)) {
    foreach ($library['js'] as $js) {
      if ($js['type'] == 'file') {
        if (!\file_exists(DRUPAL_ROOT . '/' . $js['data'])) {
          return FALSE;
        }
      }
    }
  }

  if (\array_key_exists('css', $library)) {
    foreach ($library['css'] as $css) {
      if ($css['type'] == 'file') {
        if (!\file_exists(DRUPAL_ROOT . '/' . $css['data'])) {
          return FALSE;
        }
      }
    }
  }

  if (\array_key_exists('dependencies', $library)) {
    foreach ($library['dependencies'] as $dependency) {
      $parts = \explode('/', $dependency, (int) 2);
      $dependencyLibrary = \Drupal::service('library.discovery')->getLibraryByName($parts[0], $parts[1]);
      // @phpstan-ignore-next-line
      if ($dependencyLibrary && !\ui_suite_bootstrap_is_library_valid($dependencyLibrary)) {
        return FALSE;
      }
    }
  }

  return TRUE;
}

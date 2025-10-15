<?php

declare(strict_types=1);

namespace Drupal\ui_suite_bootstrap\HookHandler;

use Drupal\ui_suite_bootstrap\Utility\Bootstrap;

/**
 * Add button style to local actions.
 */
class PreprocessMenuLocalAction {

  /**
   * Add button style to local actions.
   *
   * @param array $variables
   *   The preprocessed variables.
   */
  public function preprocess(array &$variables): void {
    /** @var array{title: string, url: \Drupal\Core\Url, localized_options?: array} $link */
    $link = $variables['element']['#link'];
    $link += [
      'title' => '',
      'localized_options' => [],
    ];
    $options = $link['localized_options'];

    // Turn link into a mini-button and colorize based on title.
    $class = Bootstrap::cssClassFromString($link['title'], 'outline-dark');
    if (!isset($options['attributes']['class'])) {
      $options['attributes']['class'] = [];
    }
    $string = \is_string($options['attributes']['class']);
    if ($string) {
      // @phpstan-ignore-next-line
      $options['attributes']['class'] = \explode(' ', $options['attributes']['class']);
    }
    $options['attributes']['class'][] = 'btn';
    $options['attributes']['class'][] = 'btn-sm';
    $options['attributes']['class'][] = 'btn-' . $class;
    if ($string) {
      // @phpstan-ignore-next-line
      $options['attributes']['class'] = \implode(' ', $options['attributes']['class']);
    }

    $variables['link'] = [
      '#type' => 'link',
      '#title' => $link['title'],
      '#options' => $options,
      '#url' => $link['url'],
      // @phpstan-ignore-next-line
      '#icon' => Bootstrap::iconFromString($link['title']),
    ];
  }

}

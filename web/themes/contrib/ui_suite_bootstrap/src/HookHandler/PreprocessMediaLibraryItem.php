<?php

declare(strict_types=1);

namespace Drupal\ui_suite_bootstrap\HookHandler;

use Drupal\ui_suite_bootstrap\Utility\Bootstrap;
use Drupal\ui_suite_bootstrap\Utility\Element;

/**
 * Add icons in media library.
 */
class PreprocessMediaLibraryItem {

  /**
   * Ensure the remove button is the first element.
   */
  public const REMOVE_BUTTON_WEIGHT = -10;

  /**
   * Ensure the edit link is after the remove button.
   */
  public const EDIT_LINK_WEIGHT = -5;

  /**
   * Add icons in media library item.
   *
   * @param array $variables
   *   The preprocessed variables.
   */
  public function preprocess(array &$variables): void {
    $this->preprocessRemoveButton($variables);
    $this->preprocessEditLink($variables);
  }

  /**
   * Add icon on remove button.
   *
   * @param array $variables
   *   The preprocessed variables.
   */
  protected function preprocessRemoveButton(array &$variables): void {
    if (!isset($variables['content']['remove_button'])) {
      return;
    }

    // @phpstan-ignore-next-line
    $element = Element::create($variables['content']['remove_button']);
    $element->setIcon(Bootstrap::icon('trash', 'bootstrap', [
      'size' => '16px',
      'alt' => $element->getProperty('value'),
    ]));
    $element->setProperty('icon_position', 'icon_only');
    $element->addClass([
      'btn-sm',
      'media-library-remove-button',
    ]);
    $element->setProperty('weight', static::REMOVE_BUTTON_WEIGHT);
  }

  /**
   * Add icon and button style on edit link.
   *
   * @param array $variables
   *   The preprocessed variables.
   */
  protected function preprocessEditLink(array &$variables): void {
    if (!isset($variables['content']['media_edit'])) {
      return;
    }

    // @phpstan-ignore-next-line
    $element = Element::create($variables['content']['media_edit']);
    $element->setIcon(Bootstrap::icon('pencil-fill', 'bootstrap', [
      'size' => '16px',
    ]));
    $element->setProperty('icon_position', 'icon_only');
    $element->addClass([
      'btn',
      'btn-sm',
      'btn-success',
    ]);
    $element->setProperty('weight', static::EDIT_LINK_WEIGHT);
  }

}

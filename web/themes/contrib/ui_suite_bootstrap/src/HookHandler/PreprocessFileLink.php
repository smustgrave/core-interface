<?php

declare(strict_types=1);

namespace Drupal\ui_suite_bootstrap\HookHandler;

use Drupal\file\FileInterface;
use Drupal\file\IconMimeTypes;
use Drupal\ui_suite_bootstrap\Utility\Bootstrap;
use Drupal\ui_suite_bootstrap\Utility\Element;

/**
 * Pre-processes variables for the "file_link" theme hook.
 */
class PreprocessFileLink {

  /**
   * Preprocess file link.
   *
   * @param array $variables
   *   The variables to preprocess.
   */
  public function preprocess(array &$variables): void {
    $file = ($variables['file'] instanceof FileInterface) ? $variables['file'] : NULL;
    if (!$file instanceof FileInterface) {
      return;
    }
    $mime_type = $file->getMimeType();
    if ($mime_type === NULL) {
      return;
    }

    // Retrieve the generic mime type from core (mislabeled as "icon_class").
    $generic_mime_type = IconMimeTypes::getIconClass($mime_type);

    // Map the generic mime types to an icon and state.
    $mime_map = [
      'application-pdf' => 'file-earmark-pdf-fill',
      'application-x-executable' => 'file-earmark-binary-fill',
      'audio' => 'headphones',
      'image' => 'image',
      'package-x-generic' => 'file-earmark-zip-fill',
      'text' => 'file-earmark-text-fill',
      'text-html' => 'file-earmark-code-fill',
      'text-x-script' => 'file-earmark-code-fill',
      'video' => 'film',
      'x-office-document' => 'file-earmark-text-fill',
      'x-office-presentation' => 'file-earmark-easel-fill',
      'x-office-spreadsheet' => 'file-earmark-spreadsheet-fill',
    ];

    $icon = $mime_map[$generic_mime_type] ?? 'file-earmark-fill';
    // @phpstan-ignore-next-line
    $link = Element::create($variables['link']);
    $link->setIcon(Bootstrap::icon($icon));
  }

}

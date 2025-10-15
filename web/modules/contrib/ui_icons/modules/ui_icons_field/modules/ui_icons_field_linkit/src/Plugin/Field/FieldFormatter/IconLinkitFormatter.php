<?php

declare(strict_types=1);

namespace Drupal\ui_icons_field_linkit\Plugin\Field\FieldFormatter;

use Drupal\Core\Entity\EntityDisplayRepositoryInterface;
use Drupal\Core\Field\Attribute\FieldFormatter;
use Drupal\Core\Render\RendererInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\Core\Theme\Icon\Plugin\IconPackManagerInterface;
use Drupal\link\Plugin\Field\FieldFormatter\LinkFormatter;
use Drupal\ui_icons_field\IconLinkFormatterTrait;
use Drupal\ui_icons_field\IconFieldHelpers;
use Drupal\ui_icons_field\IconFieldTrait;
use Drupal\linkit\Plugin\Field\FieldFormatter\LinkitFormatter;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * A field formatter for displaying icon in link field content.
 */
#[FieldFormatter(
  id: 'icon_linkit_formatter',
  label: new TranslatableMarkup('Linkit icon'),
  field_types: [
    'link',
  ],
)]
class IconLinkitFormatter extends LinkitFormatter {

  use IconFieldTrait, IconLinkFormatterTrait;

  /**
   * The icon pack manager.
   *
   * @var \Drupal\Core\Theme\Icon\Plugin\IconPackManagerInterface
   */
  protected IconPackManagerInterface $pluginManagerIconPack;

  /**
   * The entity display repository.
   *
   * @var \Drupal\Core\Entity\EntityDisplayRepositoryInterface
   */
  protected EntityDisplayRepositoryInterface $entityDisplayRepository;

  /**
   * The renderer service.
   *
   * @var \Drupal\Core\Render\RendererInterface
   */
  protected RendererInterface $renderer;

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition,): static {
    $instance = parent::create($container, $configuration, $plugin_id, $plugin_definition);
    $instance->pluginManagerIconPack = $container->get('plugin.manager.icon_pack');
    $instance->entityDisplayRepository = $container->get('entity_display.repository');
    $instance->renderer = $container->get('renderer');
    return $instance;
  }

  /**
   * Validation callback for extractor settings element.
   *
   * @param array $element
   *   The element being processed.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   * @param array $complete_form
   *   The complete form structure.
   *
   * @see \Drupal\ui_icons_field\IconLinkFormatterTrait::settingsForm
   */
  public function validateSettings(array $element, FormStateInterface $form_state, &$complete_form): void {
    $filtered_values = IconFieldHelpers::validateSettings($element, $form_state->getValues());

    // Clean unwanted values from link formatter.
    foreach (array_keys(LinkFormatter::defaultSettings()) as $key) {
      unset($filtered_values[$key]);
    }
    // Clean unwanted values from linkit formatter.
    foreach (array_keys(LinkitFormatter::defaultSettings()) as $key) {
      unset($filtered_values[$key]);
    }

    // Set the value for the element in the form state to be saved.
    $form_state->setValueForElement($element, $filtered_values);
  }

}

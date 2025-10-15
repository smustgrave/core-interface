<?php

declare(strict_types=1);

namespace Drupal\ui_styles;

use Drupal\Component\Plugin\Exception\PluginException;
use Drupal\Component\Transliteration\TransliterationInterface;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Extension\ThemeHandlerInterface;
use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Plugin\Discovery\ContainerDerivativeDiscoveryDecorator;
use Drupal\Core\Plugin\Discovery\YamlDiscovery;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\ui_styles\Definition\StyleDefinition;
use Drupal\ui_styles\Render\Element;
use Drupal\ui_styles\Source\SourceInterface;
use Drupal\ui_styles\Source\SourcePluginManagerInterface;

/**
 * Provides the default style plugin manager.
 *
 * @method \Drupal\ui_styles\Definition\StyleDefinition|null getDefinition($plugin_id, $exception_on_invalid = TRUE)
 * @method \Drupal\ui_styles\Definition\StyleDefinition[] getDefinitions()
 */
class StylePluginManager extends DefaultPluginManager implements StylePluginManagerInterface {

  use StringTranslationTrait;
  use MachineNameTrait;

  /**
   * The theme handler.
   *
   * @var \Drupal\Core\Extension\ThemeHandlerInterface
   */
  protected ThemeHandlerInterface $themeHandler;

  /**
   * The Source plugin manager.
   *
   * @var \Drupal\ui_styles\Source\SourcePluginManagerInterface
   */
  protected SourcePluginManagerInterface $sourcePluginManager;

  /**
   * Constructor.
   *
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler.
   * @param \Drupal\Core\Extension\ThemeHandlerInterface $theme_handler
   *   The theme handler.
   * @param \Drupal\Component\Transliteration\TransliterationInterface $transliteration
   *   The transliteration service.
   * @param \Drupal\ui_styles\Source\SourcePluginManagerInterface $source_plugin_manager
   *   The source plugin manager.
   */
  public function __construct(
    CacheBackendInterface $cache_backend,
    ModuleHandlerInterface $module_handler,
    ThemeHandlerInterface $theme_handler,
    TransliterationInterface $transliteration,
    SourcePluginManagerInterface $source_plugin_manager,
  ) {
    $this->setCacheBackend($cache_backend, 'ui_styles', ['ui_styles']);
    $this->alterInfo('ui_styles_styles');
    $this->moduleHandler = $module_handler;
    $this->themeHandler = $theme_handler;
    $this->transliteration = $transliteration;
    $this->sourcePluginManager = $source_plugin_manager;

    // Set defaults in the constructor to be able to use string translation.
    $this->defaults = [
      'id' => '',
      'enabled' => TRUE,
      'label' => '',
      'description' => '',
      'category' => $this->t('Other'),
      'options' => [],
      'empty_option' => $this->t('- None -'),
      'previewed_with' => [],
      'previewed_as' => 'inside',
      'icon' => '',
      'weight' => 0,
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function getDiscovery() {
    $this->discovery = new YamlDiscovery('ui_styles', $this->moduleHandler->getModuleDirectories() + $this->themeHandler->getThemeDirectories());
    $this->discovery->addTranslatableProperty('label', 'label_context');
    $this->discovery->addTranslatableProperty('description', 'description_context');
    $this->discovery->addTranslatableProperty('category', 'category_context');
    $this->discovery->addTranslatableProperty('empty_option', 'empty_option_context');
    $this->discovery = new ContainerDerivativeDiscoveryDecorator($this->discovery);
    return $this->discovery;
  }

  /**
   * {@inheritdoc}
   */
  public function getCategories() {
    // Fetch all categories from definitions and remove duplicates.
    $categories = \array_unique(\array_values(\array_map(static function (StyleDefinition $definition) {
      return $definition->getCategory();
    }, $this->getDefinitions())));
    \natcasesort($categories);
    // @phpstan-ignore-next-line
    return $categories;
  }

  /**
   * {@inheritdoc}
   *
   * @phpstan-ignore-next-line
   */
  public function getSortedDefinitions(?array $definitions = NULL): array {
    $definitions = $definitions ?? $this->getDefinitions();

    \uasort($definitions, static function (StyleDefinition $item1, StyleDefinition $item2) {
      // Sort by weight.
      $weight = $item1->getWeight() <=> $item2->getWeight();
      if ($weight != 0) {
        return $weight;
      }

      // Sort by category.
      $category1 = $item1->getCategory();
      if ($category1 instanceof TranslatableMarkup) {
        $category1 = $category1->render();
      }
      $category2 = $item2->getCategory();
      if ($category2 instanceof TranslatableMarkup) {
        $category2 = $category2->render();
      }
      if ($category1 != $category2) {
        return \strnatcasecmp($category1, $category2);
      }

      // Sort by label ignoring parenthesis.
      $label1 = $item1->getLabel();
      if ($label1 instanceof TranslatableMarkup) {
        $label1 = $label1->render();
      }
      $label2 = $item2->getLabel();
      if ($label2 instanceof TranslatableMarkup) {
        $label2 = $label2->render();
      }
      // Ignore parenthesis.
      $label1 = \str_replace(['(', ')'], '', $label1);
      $label2 = \str_replace(['(', ')'], '', $label2);
      if ($label1 != $label2) {
        return \strnatcasecmp($label1, $label2);
      }

      // Sort by plugin ID.
      // In case the plugin ID starts with an underscore.
      $id1 = \str_replace('_', '', $item1->id());
      $id2 = \str_replace('_', '', $item2->id());
      return \strnatcasecmp($id1, $id2);
    });

    return $definitions;
  }

  /**
   * {@inheritdoc}
   */
  public function getGroupedDefinitions(?array $definitions = NULL): array {
    $definitions = $this->getSortedDefinitions($definitions ?? $this->getDefinitions());
    $grouped_definitions = [];
    foreach ($definitions as $id => $definition) {
      $grouped_definitions[(string) $definition->getCategory()][$id] = $definition;
    }
    return $grouped_definitions;
  }

  /**
   * {@inheritdoc}
   *
   * @phpstan-ignore-next-line
   */
  protected function alterDefinitions(&$definitions) {
    /** @var \Drupal\ui_styles\Definition\StyleDefinition[] $definitions */
    foreach ($definitions as $definition_key => $definition) {
      if (!$definition->isEnabled()) {
        unset($definitions[$definition_key]);
      }
    }

    parent::alterDefinitions($definitions);
  }

  /**
   * {@inheritdoc}
   *
   * @phpstan-ignore-next-line
   */
  public function processDefinition(&$definition, $plugin_id): void {
    /** @var string $plugin_id */
    // Call parent first to set defaults while still manipulating an array.
    // Otherwise, as there is currently no derivative system among CSS variable
    // plugins, there is no deriver or class attributes.
    parent::processDefinition($definition, $plugin_id);
    /** @var array<string, mixed> $definition */

    if (empty($definition['id'])) {
      throw new PluginException(\sprintf('Style plugin property (%s) definition "id" is required.', $plugin_id));
    }

    $definition = new StyleDefinition($definition);
    // Makes links titles translatable.
    $links = \array_map(static function ($link) {
      // phpcs:ignore Drupal.Semantics.FunctionT.NotLiteralString
      $link['title'] = new TranslatableMarkup($link['title'], [], ['context' => 'ui_styles']);
      return $link;
    }, $definition->getLinks());
    $definition->setLinks($links);
  }

  /**
   * {@inheritdoc}
   *
   * @phpstan-ignore-next-line
   */
  protected function providerExists($provider): bool {
    /** @var string $provider */
    return $this->moduleHandler->moduleExists($provider) || $this->themeHandler->themeExists($provider);
  }

  /**
   * {@inheritdoc}
   *
   * @SuppressWarnings("PHPMD.ErrorControlOperator")
   */
  public function alterForm(array $form, array $selected = [], string $extra = '', string $theme = ''): array {
    @\trigger_error('StylePluginManagerInterface::alterForm() is deprecated in ui_styles:8.x-1.14 and is removed in ui_styles:2.0.0. See https://www.drupal.org/node/3500750', \E_USER_DEPRECATED);
    if (!empty($theme)) {
      $grouped_plugin_definitions = $this->getDefinitionsForTheme($theme);
    }
    else {
      $grouped_plugin_definitions = $this->getGroupedDefinitions();
    }

    if (empty($grouped_plugin_definitions)) {
      return $form;
    }
    $multiple_groups = TRUE;
    if (\count($grouped_plugin_definitions) == 1) {
      $multiple_groups = FALSE;
    }
    $suffix = ' <sup>(<mark>' . $this->t('applied') . '</mark>)</sup>';
    $global_used = $extra;
    foreach ($grouped_plugin_definitions as $group_plugin_definitions) {
      $group_used = FALSE;
      $group_key = '';
      foreach ($group_plugin_definitions as $definition) {
        // Get applicable source plugin.
        $style_type_plugin = $this->sourcePluginManager->getApplicableSourcePlugin($definition);
        if (!$style_type_plugin instanceof SourceInterface) {
          continue;
        }
        $id = $definition->id();
        $element_name = 'ui_styles_' . $id;
        $plugin_element = $style_type_plugin->getWidgetForm($definition, $selected[$id] ?? '');

        // Check if current style is used.
        $used = FALSE;
        if (!empty($plugin_element['#default_value'])) {
          $global_used = TRUE;
          $group_used = TRUE;
          $used = TRUE;
        }

        // Create group if it does not exist yet.
        if ($multiple_groups && $definition->hasCategory()) {
          $group_key = $this->getMachineName($definition->getCategory());
          if (!isset($form[$group_key])) {
            $form[$group_key] = [
              '#type' => 'details',
              '#title' => $definition->getCategory(),
              '#open' => FALSE,
            ];
          }

          $form[$group_key][$element_name] = $plugin_element;
          if ($used) {
            // @phpstan-ignore-next-line
            $form[$group_key][$element_name]['#title'] .= $suffix;
          }
        }
        else {
          $form[$element_name] = $plugin_element;
          if ($used) {
            // @phpstan-ignore-next-line
            $form[$element_name]['#title'] .= $suffix;
          }
        }
      }

      if (!empty($group_key) && $group_used && isset($form[$group_key]['#title'])) {
        // @phpstan-ignore-next-line
        $form[$group_key]['#title'] .= $suffix;
      }
    }
    $form['_ui_styles_extra'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Extra classes'),
      '#description' => $this->t('You can add many values using spaces as separators.'),
      '#default_value' => $extra ?: '',
    ];

    if ($global_used && !empty($form['#title'])) {
      // @phpstan-ignore-next-line
      $form['#title'] .= $suffix;
    }

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function addClasses(array $element, array $selected = [], string $extra = ''): array {
    // Set styles classes.
    $extra = \explode(' ', $extra);
    $styles = \array_merge(\array_values($selected), $extra);
    $styles = \array_unique(\array_filter($styles));

    if (\count($styles) === 0) {
      return $element;
    }

    return $this->addClassesToAcceptingOrWrap($element, $styles);
  }

  /**
   * Add classes to an element.
   *
   * Tries to add classes to elements accepting attributes.
   * Searches for elements in the tree, siblings are all considered.
   * Stops drilling a tree branch when targets are found.
   *
   * @param array $element
   *   Render element.
   * @param array $classes
   *   Styles classes.
   *
   * @return array
   *   Render array with modified children or a wrapper.
   */
  protected function addClassesToAcceptingOrWrap(array $element, array $classes): array {
    // We expect meaningless wrappers to have children. So we try to add classes
    // deeper into the rendering tree.
    if (Element::isMeaninglessWrapper($element)) {
      foreach (Element::children($element) as $key) {
        // @phpstan-ignore-next-line
        $element[$key] = $this->addClassesToAcceptingOrWrap($element[$key], $classes);
      }
      return $element;
    }
    // Try to find elements to add classes.
    $candidates = Element::findFirstAcceptingAttributes($element);
    if (empty($candidates)) {
      // If there is no place to inject, create a wrapper.
      $candidates[] = &$element;
    }
    // Apply classes to all candidates.
    foreach ($candidates as &$candidate) {
      Element::wrapElementIfNotAcceptingAttributes($candidate);
      $attr_property = $this->getElementAttributesProperty($candidate);
      $candidate = Element::addClasses($candidate, $classes, $attr_property);
    }
    return $element;
  }

  /**
   * {@inheritdoc}
   */
  public function getDefinitionsForTheme(string $theme): array {
    $themes = $this->themeHandler->listInfo();
    // Create a list which includes the current theme and all its base themes.
    if (isset($themes[$theme]->base_themes) && \is_array($themes[$theme]->base_themes)) {
      $theme_keys = \array_keys($themes[$theme]->base_themes);
      $theme_keys[] = $theme;
    }
    else {
      $theme_keys = [$theme];
    }

    $definitions = $this->getDefinitions();
    foreach ($definitions as $definition_key => $definition) {
      if ($this->moduleHandler->moduleExists($definition->getProvider())
        || \in_array($definition->getProvider(), $theme_keys, TRUE)) {
        continue;
      }

      unset($definitions[$definition_key]);
    }

    return $this->getGroupedDefinitions($definitions);
  }

  /**
   * Returns element attributes property.
   */
  protected function getElementAttributesProperty(array $element): string {
    if (\array_key_exists('#theme', $element)
      // @phpstan-ignore-next-line
      && \in_array($element['#theme'], $this::THEME_WITH_ITEM_ATTRIBUTES, TRUE)
    ) {
      return '#item_attributes';
    }
    return '#attributes';
  }

}

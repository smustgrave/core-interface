<?php

declare(strict_types=1);

namespace Drupal\ui_styles_entity_status\HookHandler;

use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\Display\EntityViewDisplayInterface;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityPublishedInterface;
use Drupal\Core\Template\AttributeHelper;
use Drupal\layout_builder\Entity\LayoutEntityDisplayInterface;
use Drupal\ui_styles\SectionStorageTrait;
use Drupal\ui_styles\StylePluginManagerInterface;
use Drupal\ui_styles_entity_status\UiStylesEntityStatusInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Add classes to entity view build array.
 */
class EntityView implements ContainerInjectionInterface {

  use SectionStorageTrait;

  public function __construct(
    protected StylePluginManagerInterface $stylesManager,
  ) {}

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container): static {
    return new static(
      $container->get('plugin.manager.ui_styles')
    );
  }

  /**
   * Add classes to entity view build array.
   *
   * @param array &$build
   *   A renderable array representing the entity content. The module may add
   *   elements to $build prior to rendering. The structure of $build is a
   *   renderable array as expected by
   *   \Drupal\Core\Render\RendererInterface::render().
   * @param \Drupal\Core\Entity\EntityInterface $entity
   *   The entity object.
   * @param \Drupal\Core\Entity\Display\EntityViewDisplayInterface $display
   *   The entity view display holding the display options configured for the
   *   entity components.
   * @param string $view_mode
   *   The view mode the entity is rendered in.
   */
  public function alter(array &$build, EntityInterface $entity, EntityViewDisplayInterface $display, string $view_mode): void {
    if (!$entity instanceof ContentEntityInterface) {
      return;
    }

    if (!$entity instanceof EntityPublishedInterface) {
      return;
    }

    if ($entity->isPublished()) {
      return;
    }

    /** @var array $settings */
    $settings = \theme_get_setting(UiStylesEntityStatusInterface::UNPUBLISHED_CLASSES_THEME_SETTING_KEY) ?? [];
    if (empty($settings)) {
      return;
    }

    /** @var array $selected */
    $selected = $settings['selected'] ?? [];
    /** @var string $extra */
    $extra = $settings['extra'] ?? '';
    $extra_array = \explode(' ', $extra);
    $styles = \array_merge($selected, $extra_array);
    $styles = \array_unique(\array_filter($styles));

    $build['#attributes'] = $build['#attributes'] ?? [];
    $build['#attributes'] = AttributeHelper::mergeCollections(
      // @phpstan-ignore-next-line
      $build['#attributes'],
      [
        'class' => $styles,
      ]
    );

    // Layout Builder display.
    if ($display instanceof LayoutEntityDisplayInterface && $display->isLayoutBuilderEnabled()) {
      $storage = $this->getDisplaySectionStorage($entity, $display, $view_mode);
      if ($storage == NULL) {
        return;
      }

      $layout_builder = &$build['_layout_builder'];
      foreach ($storage->getSections() as $delta => $section) {
        if (!isset($layout_builder[$delta])
          || !\is_array($layout_builder[$delta])
        ) {
          continue;
        }

        $layout_builder[$delta] = $this->stylesManager->addClasses($layout_builder[$delta], $selected, $extra);
      }
    }
  }

}

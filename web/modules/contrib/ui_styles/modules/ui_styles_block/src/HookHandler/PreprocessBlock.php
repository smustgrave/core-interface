<?php

declare(strict_types=1);

namespace Drupal\ui_styles_block\HookHandler;

use Drupal\Core\DependencyInjection\ContainerInjectionInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Template\AttributeHelper;
use Drupal\block\BlockInterface;
use Drupal\ui_styles\StylePluginManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Add classes to block.
 */
class PreprocessBlock implements ContainerInjectionInterface {

  public function __construct(
    protected EntityTypeManagerInterface $entityTypeManager,
    protected StylePluginManagerInterface $stylesManager,
  ) {}

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container): static {
    return new static(
      $container->get('entity_type.manager'),
      $container->get('plugin.manager.ui_styles')
    );
  }

  /**
   * Inject UI Styles classes.
   *
   * @param array $variables
   *   The preprocessed variables.
   */
  public function preprocess(array &$variables): void {
    // Blocks coming from page manager widget do not have id. If there is no
    // Block ID, skip that.
    if (empty($variables['elements']['#id'])) {
      return;
    }

    // Load the block by ID.
    $block = $this->entityTypeManager->getStorage('block')
      // @phpstan-ignore-next-line
      ->load($variables['elements']['#id']);

    // If there is no block with this ID, skip.
    if (!($block instanceof BlockInterface)) {
      return;
    }

    $this->addClassesOnBlock($block, $variables);
  }

  /**
   * Add classes on block.
   *
   * @param \Drupal\block\BlockInterface $block
   *   The block being preprocessed.
   * @param array $variables
   *   The variables being preprocessed.
   */
  protected function addClassesOnBlock(BlockInterface $block, array &$variables): void {
    $styles = $block->getThirdPartySettings('ui_styles');

    foreach ($this->getHandledAttributes() as $config_key => $attribute_name) {
      if (!isset($styles[$config_key])) {
        continue;
      }

      /** @var array $selected */
      $selected = $styles[$config_key]['selected'] ?? [];
      /** @var string $extra */
      $extra = $styles[$config_key]['extra'] ?? '';

      $extra = \explode(' ', $extra);
      $classes = \array_merge($selected, $extra);
      $classes = \array_unique(\array_filter($classes));

      $variables[$attribute_name] = AttributeHelper::mergeCollections(
        // @phpstan-ignore-next-line
        $variables[$attribute_name],
        [
          'class' => $classes,
        ]
      );
    }

    // Special case for content.
    // As default block template does not use the content_attributes, inject
    // classes to the block content.
    /** @var array $selected */
    $selected = $styles['content']['selected'] ?? [];
    /** @var string $extra */
    $extra = $styles['content']['extra'] ?? '';
    if (\is_array($variables['content'])) {
      $variables['content'] = $this->stylesManager->addClasses($variables['content'], $selected, $extra);
    }
  }

  /**
   * The list of currently handled attributes.
   *
   * @return array
   *   The list of handled attributes keyed by entry in configuration.
   */
  protected function getHandledAttributes(): array {
    return [
      'block' => 'attributes',
      'title' => 'title_attributes',
    ];
  }

}

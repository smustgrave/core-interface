<?php

namespace Drupal\m4032404\Form;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Config\TypedConfigManagerInterface;
use Drupal\Core\DependencyInjection\AutowireTrait;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\ConfigTarget;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Form\RedundantEditableConfigNamesTrait;
use Drupal\Core\Routing\RouteBuilderInterface;

/**
 * Provides the 403 to 404 module configuration form.
 *
 * @package Drupal\m4032404\Form
 */
class M4032404Form extends ConfigFormBase {

  use AutowireTrait;
  use RedundantEditableConfigNamesTrait;

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'm4032404_config_form';
  }

  /**
   * Constructs a new M4032404Form object.
   */
  public function __construct(
    ConfigFactoryInterface $config_factory,
    TypedConfigManagerInterface $typedConfigManager,
    protected RouteBuilderInterface $routeBuilder,
  ) {
    parent::__construct($config_factory, $typedConfigManager);
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['admin_only'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enforce on Admin Only'),
      '#description' => $this->t('Enforce the 403 to 404 behavior only on admin paths'),
      '#config_target' => 'm4032404.settings:admin_only',
    ];

    $form['pages'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Pages'),
      '#description' => $this->t("Specify pages by using their paths. Enter one path per line. The '*' character is a wildcard. An example path is %user-wildcard for every user page. %front is the front page.", [
        '%user-wildcard' => '/user/*',
        '%front' => '<front>',
      ]),
      '#config_target' => new ConfigTarget(
        'm4032404.settings',
        'pages',
        // Converts config value to a form value.
        fn($value) => is_array($value) ? implode("\n", $value) : [],
        // Converts form value to a config value.
        fn($value) => array_filter(
          array_map('trim', explode("\n", trim($value)))
        ),
      ),
    ];

    $form['negate'] = [
      '#type' => 'radios',
      '#title_display' => 'invisible',
      '#options' => [
        $this->t('Redirect the above paths to 404'),
        $this->t('Do not redirect the above paths to 404'),
      ],
      '#config_target' => new ConfigTarget(
        'm4032404.settings',
        'negate',
        fn($value) => (int) $value,
        fn($value) => $value == 0 ? FALSE : TRUE,
      ),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->routeBuilder->rebuild();

    parent::submitForm($form, $form_state);
  }

}

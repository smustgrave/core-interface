<?php

declare(strict_types=1);

namespace Drupal\Tests\m4032404\Kernel;

use Drupal\KernelTests\KernelTestBase;

/**
 * Tests module updates are working.
 *
 * @group m4032404
 */
class M4032404UpdateTest extends KernelTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'm4032404',
  ];

  /**
   * {@inheritdoc}
   */
  protected function getConfigSchemaExclusions(): array {
    // Bad config will be saved as part of this test.
    return ['m4032404.settings'];
  }

  /**
   * {@inheritdoc}
   */
  protected function setUp() : void {
    parent::setUp();

    // Load the .install file of the module.
    \Drupal::moduleHandler()->loadInclude('m4032404', 'install', 'm4032404');
  }

  /**
   * Test hook update on deprecated config from #3358555.
   *
   * @dataProvider providerTestUpdateDeprecatedConfig
   */
  public function testUpdateDeprecatedConfig(
    array $install_config,
    array $expected_config,
    string $expected_output,
  ): void {

    // Install the config and confirm it is as expected.
    $installed = $this->config('m4032404.settings')->setData($install_config);
    $installed->save();
    $before = $this->config('m4032404.settings')->getRawData();
    $this->assertSame($install_config, $before);

    // Run the update.
    $sandbox['#finished'] = 1;
    $output = m4032404_update_8002($sandbox);

    // Confirm expected results.
    $after = $this->config('m4032404.settings')->getRawData();
    $this->assertSame($expected_config, $after);
    $this->assertSame($expected_output, (string) $output);
  }

  /**
   * Provide test data to check update is working.
   *
   * @return \Generator
   *   An array with keys install_config, expected_config, expected_output.
   */
  public static function providerTestUpdateDeprecatedConfig(): \Generator {
    // Config is freshly installed.
    yield [
      'install_config' => [
        'admin_only' => FALSE,
        'pages' => [],
        'negate' => TRUE,
      ],
      'expected_config' => [
        'admin_only' => FALSE,
        'pages' => [],
        'negate' => TRUE,
      ],
      'expected_output' => 'No deprecated configuration found.',
    ];

    // Config has config from alpha6 patched in.
    yield [
      'install_config' => [
        'admin_only' => FALSE,
        'pages' => [],
        'disabled' => TRUE,
      ],
      'expected_config' => [
        'admin_only' => FALSE,
        'pages' => [],
        'negate' => TRUE,
      ],
      'expected_output' => 'Configuration updated successfully.',
    ];

    // Item disabled is FALSE.
    yield [
      'install_config' => [
        'admin_only' => FALSE,
        'pages' => [],
        'disabled' => FALSE,
      ],
      'expected_config' => [
        'admin_only' => FALSE,
        'pages' => [],
        'negate' => FALSE,
      ],
      'expected_output' => 'Configuration updated successfully.',
    ];
  }

  /**
   * Test hook update on missing config from #3358555.
   *
   * @dataProvider providerTestUpdateMissingConfig
   */
  public function testUpdateMissingConfig(
    array $install_config,
    array $expected_config,
    string $expected_output,
  ): void {

    // Install the config and confirm it is as expected.
    $installed = $this->config('m4032404.settings')->setData($install_config);
    $installed->save();
    $before = $this->config('m4032404.settings')->getRawData();
    $this->assertSame($install_config, $before);

    // Run the update.
    $sandbox['#finished'] = 1;
    $output = m4032404_update_10001($sandbox);

    // Confirm expected results.
    $after = $this->config('m4032404.settings')->getRawData();
    $this->assertSame($expected_config, $after);
    $this->assertSame($expected_output, (string) $output);
  }

  /**
   * Provide test data to check update for missing config is working.
   *
   * @return \Generator
   *   An array with keys install_config, expected_config, expected_output.
   */
  public static function providerTestUpdateMissingConfig(): \Generator {
    // Config is broken and needs to be fixed.
    yield [
      'install_config' => [
        'admin_only' => FALSE,
      ],
      'expected_config' => [
        'admin_only' => FALSE,
        'pages' => [],
        'negate' => TRUE,
      ],
      'expected_output' => 'Configuration updated successfully.',
    ];

    // Config is missing one value, and needs a partial fix only on missing.
    yield [
      'install_config' => [
        'admin_only' => FALSE,
        'pages' => ['/user/*', '/admin/*'],
      ],
      'expected_config' => [
        'admin_only' => FALSE,
        'pages' => ['/user/*', '/admin/*'],
        'negate' => TRUE,
      ],
      'expected_output' => 'Configuration updated successfully.',
    ];

    // Config already has values and does not need to be fixed.
    yield [
      'install_config' => [
        'admin_only' => FALSE,
        'pages' => ['/user/*', '/admin/*'],
        'negate' => TRUE,
      ],
      'expected_config' => [
        'admin_only' => FALSE,
        'pages' => ['/user/*', '/admin/*'],
        'negate' => TRUE,
      ],
      'expected_output' => 'No changes to configuration needed.',
    ];
  }

}

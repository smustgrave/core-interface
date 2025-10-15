<?php

declare(strict_types=1);

namespace Drupal\Tests\m4032404\Kernel;

use Drupal\Tests\migrate_drupal\Kernel\d7\MigrateDrupal7TestBase;

/**
 * Tests m4032404 config migration.
 *
 * @group m4032404
 */
class M4032404MigrationTest extends MigrateDrupal7TestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'm4032404',
  ];

  /**
   * {@inheritdoc}
   */
  protected function getFixtureFilePath() {
    return implode(DIRECTORY_SEPARATOR, [
      \Drupal::service('extension.list.module')->getPath('m4032404'),
      'tests',
      'fixtures',
      'drupal7.php',
    ]);
  }

  /**
   * Asserts that m4032404 configuration is migrated.
   */
  public function testMailSystemMigration() {
    $expected_config = [
      'admin_only' => TRUE,
    ];
    $config_before = $this->config('m4032404.settings')->getRawData();
    $this->assertSame([], $config_before);
    $this->executeMigration('d7_m4032404_migrate');
    $config_after = $this->config('m4032404.settings')->getRawData();
    $this->assertSame($expected_config, $config_after);
  }

}

<?php

declare(strict_types=1);

namespace Drupal\Tests\m4032404\Functional;

use Drupal\Tests\BrowserTestBase;
use Drupal\user\Entity\Role;

/**
 * Tests the functionality of the m4032404 module updates beyond kernel tests.
 *
 * @group m4032404
 */
class M4032404FuncUpdateTest extends BrowserTestBase {

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['user', 'm4032404'];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * Privileged user account.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $privilegedUser;

  /**
   * Normal user account.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $normalUser;

  /**
   * {@inheritdoc}
   */
  public function setUp(): void {
    parent::setUp();

    // Load the .install file of the module.
    \Drupal::moduleHandler()->loadInclude('m4032404', 'install', 'm4032404');
  }

  /**
   * Test that update 10002 works to fix permissions on roles.
   *
   * @param array $create_roles
   *   Roles to create for this test, with callback and permissions.
   * @param array $before
   *   Expected results before running update.
   * @param array $after
   *   Expected results after running update.
   * @param string $output
   *   Expected output from the update function.
   *
   * @dataProvider providerTestUpdate10002
   */
  public function testUpdate10002(
    array $create_roles,
    array $before,
    array $after,
    string $output,
  ): void {
    // Create roles.
    $rids = [];
    $index = 0;
    $indexed_before = [];
    $indexed_after = [];
    foreach ($create_roles as $role_details) {
      $rid = $this
        ->{$role_details['callback']}($role_details['perms'] ?? NULL);
      $rids[] = $rid;

      // Setup expected answers keyed by rid.
      $indexed_before[$rid] = $before[$index];
      $indexed_after[$rid] = $after[$index];
      $index++;
    }

    // Check that each of the roles has the expected state before update.
    $roles = Role::loadMultiple();
    foreach ($rids as $rid) {
      $role = $roles[$rid];
      $this->assertSame(
        $indexed_before[$rid],
        $role->hasPermission('administer 403 to 404 settings'),
        'Role does not have expected starting permission.'
      );
    }

    // Run the update.
    $sandbox['#finished'] = 1;
    $update_output = m4032404_update_10002($sandbox);
    $this->assertEquals($output, $update_output);

    // Confirm expected result afterwards. Must be loaded again after changes.
    $roles = Role::loadMultiple();
    foreach ($rids as $rid) {
      $role = $roles[$rid];
      $this->assertSame(
        $indexed_after[$rid],
        $role->hasPermission('administer 403 to 404 settings'),
        'Role does not have expected post-update permission.'
      );
    }
  }

  /**
   * Provide test date to check role updates is working.
   *
   * @return \Generator
   *   Test cases of roles to create, expected responses and output of update.
   */
  public static function providerTestUpdate10002(): \Generator {
    yield [
      'create_roles' => [
        [
          'callback' => 'createRole',
          'perms' => ['access content'],
        ],
        [
          'callback' => 'createRole',
          'perms' => ['administer site configuration'],
        ],
        [
          'callback' => 'createAdminRole',
        ],
      ],
      'before' => [
        FALSE,
        FALSE,
        TRUE,
      ],
      'after' => [
        FALSE,
        TRUE,
        TRUE,
      ],
      'output' => 'Granted permission to 2 role(s).',
    ];
  }

}

<?php

declare(strict_types=1);

namespace Drupal\Tests\m4032404\Functional;

use Drupal\Tests\BrowserTestBase;

/**
 * Tests the functionality of the m4032404 module.
 *
 * @group m4032404
 */
class M4032404TestCaseTest extends BrowserTestBase {

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
   * Normal admin account without access to 403 to 404 settings page.
   *
   * @var \Drupal\user\UserInterface
   */
  protected $normalAdminUser;

  /**
   * {@inheritdoc}
   */
  protected static $modules = ['m4032404'];

  /**
   * {@inheritdoc}
   */
  public function setUp(): void {
    parent::setUp();

    // Create a privileged user.
    $this->privilegedUser = $this->drupalCreateUser([
      'administer 403 to 404 settings',
    ]);

    $this->normalUser = $this->drupalCreateUser();

    // Create a user with old admin permission.
    $this->normalAdminUser = $this->drupalCreateUser([
      'administer site configuration',
    ]);
  }

  /**
   * Tests 404 Not Found response when hitting /admin.
   */
  public function testM4032404Test404() {
    $this->drupalLogin($this->normalUser);

    // Anonymous users get a 404 instead of a 403.
    $this->drupalGet('admin');
    $this->assertSession()->statusCodeEquals(404);

    // User gets a 404 instead of a 403 on non-admin paths.
    $this->drupalGet('user/1');
    $this->assertSession()->statusCodeEquals(404);

    // Set admin-only.
    $this->config('m4032404.settings')->set('admin_only', TRUE)->save();

    // User gets a 403 on non-admin paths when admin-only is configured.
    $this->drupalGet('user/1');
    $this->assertSession()->statusCodeEquals(403);

    // Path should 404 when it is included in configuration and redirecting is
    // enabled.
    $this->config('m4032404.settings')
      ->set('admin_only', FALSE)
      ->set('pages', ['/admin'])
      ->set('negate', FALSE)
      ->save();

    $this->drupalGet('admin');
    $this->assertSession()->statusCodeEquals(404);

    // Path should 403 when it is excluded in configuration and redirecting is
    // enabled.
    $this->config('m4032404.settings')
      ->set('admin_only', FALSE)
      ->set('pages', [''])
      ->set('negate', FALSE)
      ->save();

    $this->drupalGet('admin');
    $this->assertSession()->statusCodeEquals(403);

    // Path should 403 when it is included in configuration and redirecting is
    // disabled.
    $this->config('m4032404.settings')
      ->set('admin_only', FALSE)
      ->set('pages', ['/admin'])
      ->set('negate', TRUE)
      ->save();

    $this->drupalGet('admin');
    $this->assertSession()->statusCodeEquals(403);

    // Path should 404 when it is excluded in configuration and redirecting is
    // disabled.
    $this->config('m4032404.settings')
      ->set('admin_only', FALSE)
      ->set('pages', [''])
      ->set('negate', TRUE)
      ->save();

    $this->drupalGet('admin');
    $this->assertSession()->statusCodeEquals(404);
  }

  /**
   * Test admin form loads and sets config values.
   */
  public function testAdminForm(): void {
    // Normal user cannot access admin settings.
    $this->drupalLogin($this->normalUser);
    $this->drupalGet('/admin/config/system/m4032404');
    $this->assertSession()->statusCodeEquals(404);

    // Admin with "administer site configuration" cannot access admin settings.
    $this->drupalLogin($this->normalAdminUser);
    $this->drupalGet('/admin/config/system/m4032404');
    $this->assertSession()->statusCodeEquals(404);

    // Admin with access to the settings form.
    $this->drupalLogin($this->privilegedUser);
    $this->drupalGet('/admin/config/system/m4032404');
    $this->assertSession()->statusCodeEquals(200);

    $this->submitForm([
      'admin_only' => '1',
      'pages' => implode("\r\n", ['test-page', 'other-page']),
      'negate' => '1',
    ], 'Save configuration');
    $this->assertSession()->statusCodeEquals(200);

    $raw_config = $this->config('m4032404.settings')->getRawData();
    unset($raw_config['_core']);
    $this->assertSame([
      'admin_only' => TRUE,
      'pages' => [
        'test-page',
        'other-page',
      ],
      'negate' => TRUE,
    ], $raw_config);

    $this->submitForm([
      'admin_only' => '0',
      'pages' => implode("\r\n", []),
      'negate' => '0',
    ], 'Save configuration');
    $this->assertSession()->statusCodeEquals(200);

    $raw_config = $this->config('m4032404.settings')->getRawData();
    unset($raw_config['_core']);
    $this->assertSame([
      'admin_only' => FALSE,
      'pages' => [],
      'negate' => FALSE,
    ], $raw_config);
  }

}

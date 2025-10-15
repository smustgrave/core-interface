<?php

declare(strict_types=1);

namespace Drupal\Tests\m4032404\Unit\EventSubscriber;

use Drupal\Core\Path\PathMatcher;
use Drupal\Tests\UnitTestCase;
use Drupal\m4032404\EventSubscriber\M4032404EventSubscriber;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\Routing\Route;

/**
 * Tests for M4032404EventSubscriber.
 *
 * @coversDefaultClass \Drupal\m4032404\EventSubscriber\M4032404EventSubscriber
 *
 * @group m4032404
 */
class M4032404EventSubscriberTest extends UnitTestCase {

  /**
   * The admin context.
   *
   * @var \PHPUnit\Framework\MockObject\MockObject|\Drupal\Core\Routing\AdminContext
   */
  protected $adminContext;

  /**
   * The current user.
   *
   * @var \PHPUnit\Framework\MockObject\MockObject|\Drupal\Core\Session\AccountProxy
   */
  protected $currentUser;

  /**
   * The config factory.
   *
   * @var \PHPUnit\Framework\MockObject\MockBuilder|\Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * The Symphony kernel for building events.
   *
   * @var \Symfony\Component\HttpKernel\HttpKernelInterface
   */
  protected $kernel;

  /**
   * The path matcher service.
   *
   * @var \Drupal\Core\Path\PathMatcherInterface
   */
  protected $pathMatcher;

  /**
   * The route match service.
   *
   * @var \PHPUnit\Framework\MockObject\MockBuilder|\Drupal\Core\Routing\RouteMatchInterface
   */
  protected $routeMatch;

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    $this->adminContext = $this
      ->createMock('\Drupal\Core\Routing\AdminContext');
    $this->currentUser = $this->createMock('\Drupal\Core\Session\AccountProxy');
    $this->routeMatch = $this->createMock('\Drupal\Core\Routing\RouteMatch');

    // Path matcher must be real.
    $config_factory_stub = $this->getConfigFactoryStub([
      'system.site' => [
        'page.front' => '/dummy',
      ],
    ]);
    $this->pathMatcher = new PathMatcher(
      $config_factory_stub,
      $this->routeMatch
    );

    $this->kernel = $this
      ->createMock('\Symfony\Component\HttpKernel\HttpKernelInterface');
  }

  /**
   * Test cases for ::testEventSubscriber.
   *
   * @return \Generator
   *   Each test case in turn.
   */
  public static function eventSubscriberDataProvider(): \Generator {
    // #0: Default case of a 403 into a 404. Formerly ::testHandleAll().
    yield [
      'route_info' => ['path' => '/irrelevant'],
      'config' => [
        'admin_only' => FALSE,
        'pages' => [],
        'negate' => FALSE,
      ],
      'is_admin_route' => FALSE,
      'exception_class' => NotFoundHttpException::class,
    ];

    // #1: Only convert 403 into 404 for admin routes, on admin route.
    // Formerly ::testAdminOnlySuccess().
    yield [
      'route_info' => ['path' => '/irrelevant'],
      'config' => [
        'admin_only' => TRUE,
        'pages' => [],
        'negate' => FALSE,
      ],
      'is_admin_route' => TRUE,
      'exception_class' => NotFoundHttpException::class,
    ];

    // #2: Only convert 403 into 404 for admin routes, on normal route.
    // Formerly ::testAdminOnlyFailure().
    yield [
      'route_info' => ['path' => '/irrelevant'],
      'config' => [
        'admin_only' => TRUE,
        'pages' => [],
        'negate' => FALSE,
      ],
      'is_admin_route' => FALSE,
      'exception_class' => AccessDeniedHttpException::class,
    ];

    // #3: Paths with csrf token requirement with fallback route must be
    // exempted. Formerly ::testCsrfRouteBypass().
    yield [
      'route_info' => [
        'path' => '/irrelevant',
        'defaults' => [],
        'requirements' => ['_csrf_token' => 'TRUE'],
        'options' => ['_csrf_confirm_form_route' => '/irrelevant/confirm'],
      ],
      'config' => [
        'admin_only' => TRUE,
        'pages' => [],
        'negate' => FALSE,
      ],
      'is_admin_route' => FALSE,
      'exception_class' => AccessDeniedHttpException::class,
    ];

    // #4: Filtered path included should 404.
    yield [
      'route_info' => ['path' => '/admin-path'],
      'config' => [
        'admin_only' => FALSE,
        'pages' => ['/admin-path'],
        'negate' => FALSE,
      ],
      'is_admin_route' => TRUE,
      'exception_class' => NotFoundHttpException::class,
    ];

    // #5: Non-filtered path should 403.
    yield [
      'route_info' => ['path' => '/admin-path'],
      'config' => [
        'admin_only' => FALSE,
        'pages' => ['/other-path'],
        'negate' => FALSE,
      ],
      'is_admin_route' => TRUE,
      'exception_class' => AccessDeniedHttpException::class,
    ];

    // #6: Negated filtered path should 403.
    yield [
      'route_info' => ['path' => '/admin-path'],
      'config' => [
        'admin_only' => FALSE,
        'pages' => ['/admin-path'],
        'negate' => TRUE,
      ],
      'is_admin_route' => TRUE,
      'exception_class' => AccessDeniedHttpException::class,
    ];

    // #7: Negated missed path should 404.
    yield [
      'route_info' => ['path' => '/admin-path'],
      'config' => [
        'admin_only' => FALSE,
        'pages' => ['/other-path'],
        'negate' => TRUE,
      ],
      'is_admin_route' => TRUE,
      'exception_class' => NotFoundHttpException::class,
    ];

    // #8: Negated with empty path should 404.
    yield [
      'route_info' => ['path' => '/admin-path'],
      'config' => [
        'admin_only' => FALSE,
        'pages' => [''],
        'negate' => TRUE,
      ],
      'is_admin_route' => TRUE,
      'exception_class' => NotFoundHttpException::class,
    ];

    // #9: This should be the same as above.
    yield [
      'route_info' => ['path' => '/admin-path'],
      'config' => [
        'admin_only' => FALSE,
        'pages' => [],
        'negate' => TRUE,
      ],
      'is_admin_route' => TRUE,
      'exception_class' => NotFoundHttpException::class,
    ];
  }

  /**
   * Test event handling in a number of configuration and request states.
   *
   * @param array $route_info
   *   Route path and other options for testing.
   * @param array $config
   *   Module configuration to use.
   * @param bool $is_admin_route
   *   If the path should be set as an admin route.
   * @param string $exception_class
   *   Expected exception class.
   *
   * @dataProvider eventSubscriberDataProvider
   *
   * @covers ::onAccessDeniedException
   */
  public function testEventSubscriber(
    array $route_info,
    array $config,
    bool $is_admin_route,
    string $exception_class,
  ): void {
    $this->configFactory = $this->getConfigFactoryStub([
      'm4032404.settings' => $config,
    ]);

    $this->adminContext->method('isAdminRoute')
      ->willReturn($is_admin_route);

    $route = new Route(
      $route_info['path'],
      $route_info['defaults'] ?? [],
      $route_info['requirements'] ?? [],
      $route_info['options'] ?? [],
    );
    $this->routeMatch->method('getRouteObject')
      ->willReturn($route);

    $subscriber = new M4032404EventSubscriber(
      $this->configFactory,
      $this->adminContext,
      $this->currentUser,
      $this->pathMatcher,
      $this->routeMatch
    );

    // Create event using the correct path.
    $request = Request::create($route_info['path']);
    $event = new ExceptionEvent(
      $this->kernel,
      $request,
      HttpKernelInterface::MAIN_REQUEST,
      new AccessDeniedHttpException()
    );

    $subscriber->onAccessDeniedException($event);

    $e = $event->getThrowable();

    $this->assertTrue($e instanceof $exception_class);
  }

}

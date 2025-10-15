<?php

namespace Drupal\m4032404\EventSubscriber;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Path\PathMatcherInterface;
use Drupal\Core\Routing\AdminContext;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Session\AccountProxyInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Provides a subscriber to set the properly exception.
 */
class M4032404EventSubscriber implements EventSubscriberInterface {

  /**
   * The settings config for this module.
   *
   * @var \Drupal\Core\Config\ImmutableConfig
   */
  protected $config;

  /**
   * Constructs a new m4032404EventSubscriber object.
   */
  public function __construct(
    protected ConfigFactoryInterface $configFactory,
    protected AdminContext $adminContext,
    protected AccountProxyInterface $currentUser,
    protected PathMatcherInterface $pathMatcher,
    protected RouteMatchInterface $routeMatch,
  ) {
    $this->config = $this->configFactory->get('m4032404.settings');
  }

  /**
   * Set the properly exception for event.
   *
   * @param \Symfony\Component\HttpKernel\Event\ExceptionEvent $event
   *   The response for exception event.
   */
  public function onAccessDeniedException(ExceptionEvent $event) {
    if ($event->getThrowable() instanceof AccessDeniedHttpException) {

      // This will be handled by CsrfExceptionSubscriber.
      $route = $this->routeMatch->getRouteObject();
      if ($route->hasRequirement('_csrf_token')
          && !empty($route->getOption('_csrf_confirm_form_route'))
      ) {
        return;
      }

      $admin_only = $this->config->get('admin_only');
      $is_admin = $this->adminContext->isAdminRoute();
      $path = $event->getRequest()->getPathInfo();

      if ((!$admin_only || $is_admin)
          && !$this->currentUser->hasPermission('access 403 page')
          && $this->pathIncluded($path)
      ) {
        $event->setThrowable(new NotFoundHttpException());
      }
    }
  }

  /**
   * Check if path is affected by configuration.
   *
   * @param string $current_path
   *   The path to check.
   *
   * @return bool
   *   True if path should be redirected.
   */
  private function pathIncluded($current_path) {
    $paths = $this->config->get('pages') ?? [];
    $negate = $this->config->get('negate') ?? FALSE;

    // If paths is empty, this test should be ignored and default to pass.
    if (empty($paths)) {
      return TRUE;
    }

    $found = array_reduce($paths, function ($found, $path) use ($current_path) {
      return $found || $this->pathMatcher->matchPath($current_path, $path);
    }, FALSE);

    return ($found && !$negate) || (!$found && $negate);
  }

  /**
   * Registers the methods in this class that should be listeners.
   *
   * @return array
   *   An array of event listener definitions.
   */
  public static function getSubscribedEvents() {
    $events[KernelEvents::EXCEPTION][] = ['onAccessDeniedException', 50];
    return $events;
  }

}

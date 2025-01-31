<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Iconic\Core\Modules;

use Iconic\Core\Modules\Router\RouterInitializer;
use Iconic\Core\Modules\Interface\LazyInterface;
use Iconic\Core\Modules\Debug\Debugbar;
use Vision\Modules\ServiceProvider;
use Vision\Modules\Requirements;
use Vision\Modules\Container;
use Vision\Modules\Loader;
use Vision\Modules\Router;

abstract class RegisterModule implements LazyInterface
{
    protected $controller = '';
    protected $method = 'index';
    protected $params = [];

    /**
     * Application lifecycle state counter.
     *
     * @var int $lifecycle
     */
    private static int $lifecycle = 0;

    /**
     * CoreApplication constructor.
     */
    public function __construct()
    {
        // Prevent multiple re-initializations
        if (self::$lifecycle > 0) {
            if ((self::$instance instanceof static) && !($this->run instanceof Router)) {
                $this->run = self::$instance->run;
            }
            return;
        }

        // Initialize requirement, Debugbar for debugging and enhance front security
        Debugbar::init();
        Requirements::MinVersion();

        // Load project and router
        Loader::ProjectLoader();

        // Register Services
        ServiceProvider::register();

        // Set up Router
        RouterInitializer::initialize();

        // Initialize router and set controller and method
        RouterInitializer::initRouter($this->controller, $this->method, $this->params);

        $this->onInitialized();
        $this->onCreate();
        self::$lifecycle = 1;
    }

    /**
     * Mengambil instance Database hanya saat diperlukan
     */
    public function getDatabase()
    {
        return Container::get('database');
    }

    /**
     * Singleton instance of the CoreApplication.
     *
     * @var self|null $instance
     */
    private static ?self $instance = null;

    /**
     * Instance of the Router class.
     *
     * @var Router|null $router
     */
    public ?Router $run = null;

    /**
     * CoreApplication destruct.
     */
    public function __destruct()
    {
        if (self::$lifecycle > 1) {
            return;
        }

        self::$lifecycle = 2;
        $this->onDestroy();
    }

    /**
     * Lifecycle onCreate hook.
     */
    protected function onCreate(): void {}

    /**
     * Lifecycle onDestroy hook.
     */
    protected function onDestroy(): void
    {
        gc_collect_cycles();
    }

    /**
     * Retrieve the singleton instance of the application.
     *
     * @return static
     */
    public static function getInstance(): static
    {
        if (!self::$instance instanceof self) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    /**
     * Set the singleton instance to a new application instance.
     *
     * @param RegisterModule $app
     *
     * @return static
     */
    public static function setInstance(RegisterModule $app): static
    {
        if ((self::$instance instanceof static) && !($app->run instanceof Router)) {
            $app->run = self::$instance->run;
        }

        self::$instance = $app;
        return self::$instance;
    }


    /**
     * Trigger an application event or lifecycle hook.
     *
     * @param string $event
     * @param mixed ...$arguments
     *
     * @return void
     */
    public final function __on(string $event, mixed ...$arguments): void
    {
        $this->{$event}(...$arguments);
    }

    /**
     * Lifecycle onInitialized hook: Triggered once during initialization.
     * Override in subclasses for custom logic.
     *
     * @return void
     */
    protected function onInitialized(): void {}

    /**
     * Lifecycle onStart hook: Triggered when the application starts handling a request.
     *
     * @param array<string,mixed> $info
     */
    protected function onStart(array $info): void {}

    /**
     * Lifecycle onFinish hook: Triggered after a request is handled.
     *
     * @param array<string,mixed> $info
     */
    protected function onFinish(array $info): void {}
}

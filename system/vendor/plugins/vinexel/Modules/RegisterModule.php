<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Vinexel\Modules;

use \Vinexel\Modules\Router\RouterInitializer;
use \Vinexel\Modules\Interface\LazyInterface;
use \Vinexel\Modules\Debug\Debugbar;
use \Vision\Modules\ServiceProvider;
use \Vision\Modules\Requirements;
use \Vision\Modules\Container;
use \Vision\Modules\Loader;
use \Vision\Modules\Router;

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
     * Application constructor.
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

        // Initialize requirement
        Debugbar::init();
        Requirements::MinVersion();

        // Load project and router
        Loader::ProjectLoader();

        // Register Services
        ServiceProvider::register();

        // Set up Router
        RouterInitializer::initialize();

        // Initialize router, set controller and method
        RouterInitializer::initRouter($this->controller, $this->method, $this->params);

        $this->onCreate();
        self::$lifecycle = 1;
    }

    /**
     * Get Database instance just only if needed
     */
    public function getDatabase()
    {
        return Container::get('database');
    }

    /**
     * Singleton instance of the Application.
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
     * Application destruct.
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
}

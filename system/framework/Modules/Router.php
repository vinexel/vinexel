<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Vision\Modules;

use Vinexel\Modules\Router\Router as BaseRouter;

class Router
{
    /**
     * Set the default namespace for controllers.
     *
     * @param string $namespace
     * @return void
     */
    public static function setNamespace($namespace)
    {
        BaseRouter::setNamespace($namespace);
    }

    /**
     * Set the default namespace for models.
     *
     * @param string $namespace
     * @return void
     */
    public static function setModelNamespace($namespace)
    {
        BaseRouter::setModelNamespace($namespace);
    }

    /**
     * Register a new route with the given HTTP method, URI, and action.
     *
     * @param string $method
     * @param string $uri
     * @param callable|array|string $action
     * @param array $middleware
     * @return void
     */
    public static function add($method, $uri, $action, $middleware = [])
    {
        BaseRouter::add($method, $uri, $action, $middleware);
    }

    /**
     * Create a group of routes that share attributes such as prefix or middleware.
     *
     * @param array $attributes
     * @param callable $callback
     * @return void
     */
    public static function group($attributes, callable $callback)
    {
        BaseRouter::group($attributes, $callback);
    }

    /**
     * Dispatch the current request to the matched route.
     *
     * This method executes the route action corresponding to
     * the current request URI and HTTP method.
     *
     * @return void
     */
    public static function dispatch()
    {
        // If BaseRouter::dispatch() takes no parameters, call it directly.
        BaseRouter::dispatch();
    }

    /**
     * Retrieve a model instance or perform model binding for the route.
     *
     * @param string $model
     * @return mixed
     */
    public static function models($model)
    {
        return BaseRouter::models($model);
    }

    /**
     * Send a JSON response with the given data and status code.
     *
     * @param mixed $data
     * @param int $status
     * @return void
     */
    public static function json($data, $status = 200)
    {
        BaseRouter::json($data, $status);
    }
}

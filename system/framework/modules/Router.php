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
     * Set namespace untuk controller.
     *
     * @param string $namespace
     */
    public static function setNamespace($namespace)
    {
        BaseRouter::setNamespace($namespace);
    }

    /**
     * Set namespace untuk model.
     *
     * @param string $namespace
     */
    public static function setModelNamespace($namespace)
    {
        BaseRouter::setModelNamespace($namespace);
    }

    /**
     * Tambahkan route baru.
     *
     * @param string $method
     * @param string $uri
     * @param callable|string $action
     * @param array $middleware
     */
    public static function add($method, $uri, $action, $middleware = [])
    {
        BaseRouter::add($method, $uri, $action, $middleware);
    }

    /**
     * Tambahkan grup rute.
     *
     * @param array $attributes
     * @param callable $callback
     */
    public static function group($attributes, callable $callback)
    {
        BaseRouter::group($attributes, $callback);
    }

    /**
     * Jalankan routing.
     *
     * @param string $defaultController
     * @param string $defaultMethod
     * @param array $defaultParams
     */
    public static function dispatch($defaultController = 'app\\' . PROJECT_NAME . '\\Controllers\\HomeController', $defaultMethod = 'index', $defaultParams = [])
    {
        BaseRouter::dispatch($defaultController, $defaultMethod, $defaultParams);
    }

    /**
     * Ambil model secara dinamis.
     *
     * @param string $model
     * @return mixed
     */
    public static function models($model)
    {
        return BaseRouter::models($model);
    }

    /**
     * Kembalikan respons dalam format JSON.
     *
     * @param array|object $data
     * @param int $status
     */
    public static function json($data, $status = 200)
    {
        BaseRouter::json($data, $status);
    }
}

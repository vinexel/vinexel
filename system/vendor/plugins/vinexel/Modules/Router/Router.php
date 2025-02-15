<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Vinexel\Modules\Router;

use \Vinexel\Modules\Container\Container;
use \Vision\Modules\Config;

class Router
{
    protected static $routes = [];
    protected static $namespace = '';
    protected static $modelNamespace = '';
    protected static $middleware = [];
    protected static $routeGroups = [];

    /**
     * Set namespace for controller
     */
    public static function setNamespace($namespace)
    {
        self::$namespace = rtrim($namespace, '\\') . '\\';
    }

    /**
     * Set namespace for model
     */
    public static function setModelNamespace($namespace)
    {
        self::$modelNamespace = rtrim($namespace, '\\') . '\\';
    }

    /**
     * Menambahkan route baru
     */
    public static function add($method, $uri, $action, $middleware = [])
    {
        $method = strtoupper($method);
        $route = compact('method', 'uri', 'action');
        $route['middleware'] = array_merge(self::$middleware, $middleware);
        self::$routes[] = $route;
    }

    /**
     * Menambahkan grup rute
     */
    public static function group($attributes, callable $callback)
    {
        $previousMiddleware = self::$middleware;
        if (isset($attributes['namespace'])) {
            self::setNamespace($attributes['namespace']);
        }
        if (isset($attributes['middleware'])) {
            self::$middleware = array_merge(self::$middleware, (array) $attributes['middleware']);
        }

        $callback(); // Run callback

        self::$middleware = $previousMiddleware; // Kembalikan middleware sebelumnya
    }

    public static function dispatch()
    {
        $requestUri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Jika request menuju API backend Golang, redirect langsung
        if (strpos($requestUri, '/api/v1/') === 0) {
            self::proxyToGoBackend();
            return;
        }

        $requestMethod = $_SERVER['REQUEST_METHOD'];

        foreach (self::$routes as $route) {
            if ($route['method'] === $requestMethod && preg_match(self::convertToRegex($route['uri']), $requestUri, $matches)) {
                array_shift($matches);

                foreach ($route['middleware'] as $middleware) {
                    if (!self::handleMiddleware($middleware, $matches)) {
                        return;
                    }
                }

                return self::callAction($route['action'], $matches);
            }
        }

        return self::handle404($requestUri);
    }

    /**
     * Meneruskan request API ke backend Golang
     */
    protected static function proxyToGoBackend()
    {
        $goBackendUrl = Config::get('API_URL') . $_SERVER['REQUEST_URI'];
        $response = file_get_contents($goBackendUrl);

        if ($response !== false) {
            header('Content-Type: application/json');
            echo $response;
        } else {
            http_response_code(502);
            echo json_encode(["error" => "Bad Gateway: Failed to connect to Golang backend"]);
        }
        exit;
    }


    /**
     * Mengonversi URI menjadi regex
     */
    protected static function convertToRegex($uri)
    {
        // Mengubah parameter {parameter} menjadi regex
        $uri = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)', $uri);
        return '#^' . rtrim($uri, '/') . '/?$#';
    }

    /**
     * Memanggil action yang terkait dengan route
     */
    protected static function callAction($action, $params)
    {
        if (is_callable($action)) {
            return call_user_func_array($action, $params);
        }

        list($controller, $method) = explode('@', $action);
        $controller = self::$namespace . $controller;

        if (!class_exists($controller)) {
            return self::sendServerError("Controller '$controller' not found");
        }

        $controllerInstance = new $controller;

        if (!method_exists($controllerInstance, $method)) {
            return self::sendServerError("Method '$method' in controller '$controller' not found");
        }

        return call_user_func_array([$controllerInstance, $method], $params);
    }

    /**
     * Menangani middleware
     */
    protected static function handleMiddleware($middleware, $params)
    {
        if (is_callable($middleware)) {
            return call_user_func($middleware, ...$params);
        }

        return true; // Jika middleware tidak ada, lanjutkan
    }

    /**
     * Menangani error 404
     */
    protected static function handle404($requestUri)
    {
        http_response_code(404);
        echo "404 Not Found: The requested URL '$requestUri' was not found on this server.";
    }

    /**
     * Menangani error 500 Internal Server Error
     */
    protected static function sendServerError($message)
    {
        http_response_code(500);
        echo $message;
    }

    /**
     * Mengambil model secara dinamis menggunakan namespace model yang sudah diset
     */
    public static function models($model)
    {
        $modelClass = self::$modelNamespace . ucfirst($model);
        return Container::get($modelClass);
    }

    /**
     * Mengembalikan respons dalam format JSON
     */
    public static function json($data, $status = 200)
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}

<?php

/**
 * Vision Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Iconic\Core\Modules\Router;

use Vision\Modules\Router;

class RouterInitializer
{
    /**
     * Mengatur namespace dan inisialisasi router
     */
    public static function initialize()
    {
        Router::setNamespace('\\' . PROJECT_NAME . '\\Controllers\\');
        Router::setModelNamespace('\\' . PROJECT_NAME . '\\Models\\');
    }

    /**
     * Mengarahkan router ke controller yang sesuai
     */
    public static function initRouter($controller, $method, $params)
    {
        Router::dispatch($controller, $method, $params);
    }
}

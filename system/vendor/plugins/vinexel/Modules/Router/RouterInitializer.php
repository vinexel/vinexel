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

use \Vision\Modules\Router;

class RouterInitializer
{
    /**
     * Mengatur namespace dan inisialisasi router
     */
    public static function initialize()
    {
        Router::setNamespace('\\' . PROJECT_NAME . '\\' . ucfirst('controllers') . '\\');
        Router::setModelNamespace('\\' . PROJECT_NAME . '\\' . ucfirst('models') . '\\');
    }

    /**
     * Mengarahkan router ke controller yang sesuai
     */
    public static function initRouter($controller, $method, $params)
    {
        Router::dispatch($controller, $method, $params);
    }
}

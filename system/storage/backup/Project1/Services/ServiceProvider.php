<?php

/**
 * Vinexel Framework
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Project1\Services;

use \Vision\Modules\Container;
use \Deeper\Libraries\Session;

class ServiceProvider
{
    /**
     * Register all internal service specific for isolated project.
     */
    public static function register()
    {
        Container::singleton('session', function () {
            return new Session();
        });
    }
}

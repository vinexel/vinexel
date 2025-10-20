<?php

namespace Dashkit\Libraries\Service;

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

<?php

/**
 * Vinexel Framework Bootstrapping.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license Envato License
 */

namespace Iconic\Bootstrap;

use \Vision\Application;

final class Transmitter
{
    /**
     * Initializes the HTTP environment for web application, 
     * sets up error handler, finish bootstrapping process and return application object.
     *
     * @return Application Return the application instance.
     */
    public static function http(): Application
    {
        self::init();
        return Application::getInstance();
    }

    /**
     * Initializes the HTTP environment for web application error handler 
     * and finish bootstrapping process.
     *
     * @return void
     */
    public static function init(): void
    {
        self::run();
        self::finish();
    }

    /**
     * Performs the initial setup tasks required for the application to run.
     * Load all necessary files, setting timezone and execution limits, and configuring script behavior.
     * 
     * @return void
     * @ignore
     */
    public static function run(): void
    {
        require_once
            dirname(__DIR__, 2)
            . DIRECTORY_SEPARATOR
            . 'plugins'
            . DIRECTORY_SEPARATOR
            . 'vinexel'
            . DIRECTORY_SEPARATOR
            . 'vision-serve'
            . DIRECTORY_SEPARATOR
            . 'core'
            . DIRECTORY_SEPARATOR
            . ucfirst('modules')
            . DIRECTORY_SEPARATOR
            . ucfirst('globals')
            . DIRECTORY_SEPARATOR
            . ucfirst('initialize')
            . DIRECTORY_SEPARATOR
            . 'Constants.php';
        require_once
            dirname(__DIR__, 2)
            . DIRECTORY_SEPARATOR
            . 'plugins'
            . DIRECTORY_SEPARATOR
            . 'vinexel'
            . DIRECTORY_SEPARATOR
            . 'vision-serve'
            . DIRECTORY_SEPARATOR
            . 'core'
            . DIRECTORY_SEPARATOR
            . ucfirst('modules')
            . DIRECTORY_SEPARATOR
            . ucfirst('globals')
            . DIRECTORY_SEPARATOR
            . ucfirst('initialize')
            . DIRECTORY_SEPARATOR
            . 'Headers.php';
    }

    /**
     * Completes the bootstrapping process.
     *
     * This private method requires autoload plugins and additional features,
     * and defines the IS_UP constant indicating (no composer error), if not already defined.
     */
    private static function finish(): void
    {
        require_once
            dirname(__DIR__, 2)
            . DIRECTORY_SEPARATOR
            . 'plugins'
            . DIRECTORY_SEPARATOR
            . 'autoload.php';
        require_once
            dirname(__DIR__, 2)
            . DIRECTORY_SEPARATOR
            . 'plugins'
            . DIRECTORY_SEPARATOR
            . 'vinexel'
            . DIRECTORY_SEPARATOR
            . 'vision-serve'
            . DIRECTORY_SEPARATOR
            . 'core'
            . DIRECTORY_SEPARATOR
            . ucfirst('modules')
            . DIRECTORY_SEPARATOR
            . ucfirst('globals')
            . DIRECTORY_SEPARATOR
            . ucfirst('initialize')
            . DIRECTORY_SEPARATOR
            . 'Features.php';
    }
}
Transmitter::run();

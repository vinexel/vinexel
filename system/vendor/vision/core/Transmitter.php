<?php

/**
 * Vinexel Framework Bootstrapping.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Iconic\Core;

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
        // Foundation::initialize();
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
            __DIR__
            . DIRECTORY_SEPARATOR
            . 'modules'
            . DIRECTORY_SEPARATOR
            . 'globals'
            . DIRECTORY_SEPARATOR
            . 'initialize'
            . DIRECTORY_SEPARATOR
            . 'constants.php';
        require_once
            __DIR__
            . DIRECTORY_SEPARATOR
            . 'modules'
            . DIRECTORY_SEPARATOR
            . 'globals'
            . DIRECTORY_SEPARATOR
            . 'initialize'
            . DIRECTORY_SEPARATOR
            . 'functions.php';
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
            __DIR__
            . DIRECTORY_SEPARATOR
            . 'modules'
            . DIRECTORY_SEPARATOR
            . 'globals'
            . DIRECTORY_SEPARATOR
            . 'initialize'
            . DIRECTORY_SEPARATOR
            . 'features.php';
        defined('IS_UP') || define('IS_UP', true);
    }
}
Transmitter::run();

<?php

declare(strict_types=1);
/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

define(
    'VI',
    'MalScan by &rsaquo; VisionIconic'
);

define(
    'MS0',
    'title'
);

define(
    'MS1',
    'Dashboard'
);

define(
    'MS2',
    'index'
);


/**
 * @var string
 */
defined('REQUIRED_PHP_VERSION') || define('REQUIRED_PHP_VERSION', '8.2');

/**
 * @var string
 */
defined('VINEXEL_VERSION') || define('VINEXEL_VERSION', '1.0.0');

define('VISION_DIR', dirname(__DIR__, 7));

define(
    'RESTRICTION',
    '<script>' .
        file_get_contents(
            VISION_DIR
                . DIRECTORY_SEPARATOR
                . 'system'
                . DIRECTORY_SEPARATOR
                . 'vendor'
                . DIRECTORY_SEPARATOR
                . 'plugins'
                . DIRECTORY_SEPARATOR
                . 'vinexel'
                . DIRECTORY_SEPARATOR
                . ucfirst('fragments')
                . DIRECTORY_SEPARATOR
                . ucfirst('resources')
                . DIRECTORY_SEPARATOR
                . 'js'
                . DIRECTORY_SEPARATOR
                . 'Restrict.js'
        )
        . '</script>'
);

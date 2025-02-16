<?php

/**
 * Vinexel Framework
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

use \Vision\Modules\Config;

/**
 * Set the value for production and remove value from .env file for security.
 */

define('APP_URL', Config::get('APP_URL') ?? '');
define('API_URL', Config::get('API_URL') ?? '');

define('DB_DRIVER', Config::get('DB_DRIVER') ?? '');
define('DB_HOST', Config::get('DB_HOST') ?? '');
define('DB_NAME', Config::get('DB_NAME') ?? '');
define('DB_USER', Config::get('DB_USER') ?? '');
define('DB_PASSWORD', Config::get('DB_PASSWORD') ?? '');

define('MALSCAN_PIN', Config::get('MALSCAN_PIN') ?? '1234');

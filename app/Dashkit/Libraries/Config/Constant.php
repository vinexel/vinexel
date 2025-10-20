<?php

use \Vision\Modules\Config;

/**
 * Set the value for production and remove value from .env file for security.
 */

define('APP_URL', Config::get('APP_URL') ?? '127.0.0.1:8000');
define('API_URL', Config::get('API_URL') ?? '127.0.0.1:9000');

define('LOGIN_STATUS', 'login');
define('USER_ROLE', 'user');
define('USER_STATUS_ACTIVE', '1');

define('DB_DRIVER', Config::get('DB_DRIVER') ?? 'MySQL');
define('DB_HOST', Config::get('DB_HOST') ?? 'localhost');
define('DB_NAME', Config::get('DB_NAME') ?? '');
define('DB_USERNAME', Config::get('DB_USERNAME') ?? 'root');
define('DB_PASSWORD', Config::get('DB_PASSWORD') ?? '');

define('MALSCAN_PIN', Config::get('MALSCAN_PIN') ?? '1234');

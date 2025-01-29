<?php

/**
 * Vision Framework
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Iconic\Core\Modules\Config;

use Exception;

class Config
{
    private static $envData = [];

    public static function loadEnv($filePath)
    {
        if (!file_exists($filePath)) {
            throw new Exception('Environment file not found.');
        }

        $envData = [];
        $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            if (strpos(trim($line), '#') === 0) {
                continue;
            }

            if (strpos($line, '=') !== false) {
                list($key, $value) = explode('=', $line, 2);

                $key = trim($key);
                $value = trim($value);
                $value = trim($value, '"');

                $envData[$key] = $value;
            }
        }

        if (empty($envData)) {
            throw new Exception('Error parsing environment file. Please check the syntax.');
        }

        self::$envData = $envData;
    }

    public static function get($key, $default = null)
    {
        return isset(self::$envData[$key]) ? self::$envData[$key] : $default;
    }

    public static function all()
    {
        return self::$envData;
    }
}

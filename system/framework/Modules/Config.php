<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license Envato License
 */

namespace Vision\Modules;

use \Vinexel\Modules\Config\Config as ConfigModule;
use Exception;

class Config
{
    private static $isLoaded = false;

    /**
     * Load .env file and save configuration
     *
     * @param string $filePath
     * @throws Exception
     */
    public static function loadEnv($filePath)
    {
        if (self::$isLoaded) {
            return; // Skip if loaded
        }

        // if (!file_exists($filePath)) {
        //     die("Environment file not found at: $filePath");
        // }

        try {
            ConfigModule::loadEnv($filePath);
            self::$isLoaded = true;
        } catch (Exception $e) {
            // die("Error loading environment file: " . $e->getMessage());
        }
    }

    /**
     * Mendapatkan nilai konfigurasi berdasarkan key
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        return ConfigModule::get($key, $default);
    }

    /**
     * Mendapatkan semua data konfigurasi
     *
     * @return array
     */
    public static function all()
    {
        return ConfigModule::all();
    }
}

$envFilePath =
    VISION_DIR .
    DIRECTORY_SEPARATOR .
    strtolower('app') .
    DIRECTORY_SEPARATOR .
    PROJECT_NAME .
    DIRECTORY_SEPARATOR .
    strtolower('.env');
Config::loadEnv($envFilePath);

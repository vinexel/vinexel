<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Vinexel\Modules\Debug;

use \Vision\Modules\Config;
use \Vision\Modules\Restrictions;

class Debugbar
{
    protected static $enabled = false;

    protected static $dbQueryCount = 0;
    protected static $dbQueryTime = 0;

    public static function init()
    {
        $debugValue = Config::get('APP_DEBUG', 'false');
        self::$enabled = strtolower($debugValue) === 'true';

        error_log("Debugbar status: " . (self::$enabled ? "Enabled" : "Disabled"));
    }


    public static function isEnabled()
    {
        return self::$enabled;
    }


    public static function render()
    {
        if (!self::$enabled) {
            $restrict = new Restrictions();
            $restrict->append();
            return;
        }
        $html = self::getHtmlContent();
        if ($html) {
            $html = str_replace('{{loaded_at}}', date('H:i:s'), $html);
            $html = str_replace('{{memory_usage}}', round(memory_get_usage() / 1024 / 1024, 2), $html);
            $html = str_replace('{{request_time}}', round((microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']) * 1000, 2), $html);
            $html = str_replace('{{total_page_size}}', self::getTotalPageSize(), $html);
            $html = str_replace('{{http_status_code}}', http_response_code(), $html);
            $html = str_replace('{{page_load_time}}', round((microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']) * 1000, 2), $html);
            $html = str_replace('{{memory_usage_analysis}}', round(memory_get_usage() / 1024 / 1024, 2), $html);
            $html = str_replace('{{db_queries}}', self::$dbQueryCount, $html);
            $html = str_replace('{{db_query_time}}', self::$dbQueryTime, $html);
            $html = str_replace('{{total_page_size_analysis}}', self::getTotalPageSize(), $html);
            $html = str_replace('{{server_response_time}}', round((microtime(true) - $_SERVER['REQUEST_TIME_FLOAT']) * 1000, 2), $html);
            $html = str_replace('{{custom_data}}', self::getCustomData(), $html); // Ambil data kustom

            // echo $html;
        }
    }

    private static function getHtmlContent()
    {
        $filePath = __DIR__ . '/view/debugbar.rapid';
        return file_exists($filePath) ? file_get_contents($filePath) : null;
    }

    public static function log($message)
    {
        if (!self::$enabled) {
            return;
        }
        echo '<script>console.log(' . json_encode($message) . ');</script>';
    }

    public static function addDatabaseQuery($queryTime)
    {
        self::$dbQueryCount++;
        self::$dbQueryTime += $queryTime;
    }

    private static function getTotalPageSize()
    {
        $totalSize = 0;
        if (isset($_SERVER['REQUEST_URI'])) {
            $totalSize += strlen(ob_get_contents()) / 1024;
        }
        return round($totalSize, 2);
    }

    private static function getCustomData()
    {
        $customData = [];

        if (session_status() === PHP_SESSION_ACTIVE) {
            $customData['active_sessions'] = count($_SESSION);
        } else {
            $customData['active_sessions'] = 0;
        }

        if (isset($_SESSION['user'])) {
            $customData['user_id'] = $_SESSION['user']['id'];
            $customData['user_name'] = $_SESSION['user']['name'];
        } else {
            $customData['user_id'] = 'Tidak ada pengguna yang terautentikasi';
            $customData['user_name'] = 'Tidak ada pengguna yang terautentikasi';
        }

        $customData['php_version'] = phpversion();
        $customData['server_software'] = $_SERVER['SERVER_SOFTWARE'];
        $customData['client_ip'] = $_SERVER['REMOTE_ADDR'];

        return json_encode($customData, JSON_PRETTY_PRINT);
    }
}

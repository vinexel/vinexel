<?php

/**
 * Vinexel Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

use \Vision\Modules\Config;

$maintenanceMode = strtolower(Config::get('MAINTENANCE_MODE', 'false'));

if ($maintenanceMode === '1' || $maintenanceMode === 'true') {

    header('HTTP/1.1 503 Service Unavailable');
    header('Status: 503 Service Unavailable');
    header('Retry-After: 3600');

    $maintenanceViewPath =
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
        . 'view'
        . DIRECTORY_SEPARATOR
        . 'maintenance.rapid';

    if (file_exists($maintenanceViewPath)) {
        include $maintenanceViewPath;
    } else {
        echo "<h1>Site is under maintenance</h1>";
        echo "<p>Please try again later!</p>";
    }
    exit();
}

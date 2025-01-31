<?php

/**
 * Vision Framework.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

use Vision\Modules\Config;

$maintenanceMode = strtolower(Config::get('MAINTENANCE_MODE', 'false'));

if ($maintenanceMode === '1' || $maintenanceMode === 'true') {
    $projectRoutesPath =
        VISION_DIR
        . DIRECTORY_SEPARATOR
        . "vendor"
        . DIRECTORY_SEPARATOR
        . "vision"
        . DIRECTORY_SEPARATOR
        . "fragment"
        . DIRECTORY_SEPARATOR
        . "gateway"
        . DIRECTORY_SEPARATOR
        . "maintenance.php";

    if (file_exists($projectRoutesPath)) {
        require $projectRoutesPath;
    } else {
        header("HTTP/1.1 404 Not Found");
        echo "Maintenance mode aktif, tetapi file maintenance.php tidak ditemukan.";
    }
    exit();
}

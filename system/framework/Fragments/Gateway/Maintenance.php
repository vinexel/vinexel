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
    $projectRoutesPath =
        VISION_DIR
        . DIRECTORY_SEPARATOR
        . "system"
        . DIRECTORY_SEPARATOR
        . "vendor"
        . DIRECTORY_SEPARATOR
        . "plugins"
        . DIRECTORY_SEPARATOR
        . "vinexel"
        . DIRECTORY_SEPARATOR
        . "vision-serve"
        . DIRECTORY_SEPARATOR
        . 'core'
        . DIRECTORY_SEPARATOR
        . ucfirst("modules")
        . DIRECTORY_SEPARATOR
        . ucfirst("config")
        . DIRECTORY_SEPARATOR
        . "Maintenance.php";

    if (file_exists($projectRoutesPath)) {
        require $projectRoutesPath;
    } else {
        header("HTTP/1.1 404 Not Found");
        echo "Maintenance mode is active, but Maintenance file not found at" . $projectRoutesPath;
    }
    exit();
}

<?php

/**
 * Vinexel Framework
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Vinexel\Modules\Interface;

use \Deeper\Libraries\Session;
use \System\Projects;

Session::start();

/**
 * Marker interface for lazily initialized project, required and additional files function.
 */

interface LazyInterface {}

$urlDomain = $_SERVER['HTTP_HOST'];
$projects = new Projects();

try {
    $project = $projects->getProjectName($urlDomain);
    define('PROJECT_NAME', ucfirst(strtolower($project)));
} catch (\Exception $e) {
    $this->handleException($e);
}

$requiredFiles = [
    DIRECTORY_SEPARATOR
        . 'system'
        . DIRECTORY_SEPARATOR
        . 'framework'
        . DIRECTORY_SEPARATOR
        . ucfirst('fragments')
        . DIRECTORY_SEPARATOR
        . ucfirst('config')
        . DIRECTORY_SEPARATOR
        . 'Globals.php',
    DIRECTORY_SEPARATOR
        . 'app'
        . DIRECTORY_SEPARATOR
        . PROJECT_NAME
        . DIRECTORY_SEPARATOR
        . 'routes.php',
    DIRECTORY_SEPARATOR
        . 'system'
        . DIRECTORY_SEPARATOR
        . 'vendor'
        . DIRECTORY_SEPARATOR
        . 'plugins'
        . DIRECTORY_SEPARATOR
        . 'vinexel'
        . DIRECTORY_SEPARATOR
        . ucfirst('modules')
        . DIRECTORY_SEPARATOR
        . ucfirst('debug')
        . DIRECTORY_SEPARATOR
        . 'Debug.php',
];

$additionalFiles = [
    DIRECTORY_SEPARATOR
        . 'app'
        . DIRECTORY_SEPARATOR
        . PROJECT_NAME
        . DIRECTORY_SEPARATOR
        . ucfirst('config')
        . DIRECTORY_SEPARATOR
        . 'Define.php',
    DIRECTORY_SEPARATOR
        . 'app'
        . DIRECTORY_SEPARATOR
        . PROJECT_NAME
        . DIRECTORY_SEPARATOR
        . ucfirst('services')
        . DIRECTORY_SEPARATOR
        . 'Request.php',
    DIRECTORY_SEPARATOR
        . 'system'
        . DIRECTORY_SEPARATOR
        . 'framework'
        . DIRECTORY_SEPARATOR
        . ucfirst('fragments')
        . DIRECTORY_SEPARATOR
        . ucfirst('gateway')
        . DIRECTORY_SEPARATOR
        . 'Maintenance.php',
];

foreach ($requiredFiles as $filePath) {
    $fullPath = VISION_DIR . $filePath;
    if (file_exists($fullPath)) {
        require_once $fullPath;
    } else {
        die("Error: Required file not found: {$filePath}");
    }
}

foreach ($additionalFiles as $filePath) {
    $fullPath = VISION_DIR . $filePath;
    if (file_exists($fullPath)) {
        require_once $fullPath;
    }
}

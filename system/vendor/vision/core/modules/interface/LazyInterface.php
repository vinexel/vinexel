<?php

/**
 * Vinexel Framework
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

namespace Iconic\Core\Modules\Interface;

use Deeper\Libraries\Session;
use System\Projects;

Session::start();

/**
 * Marker interface for lazily initialized objects.
 * 
 * Implementing this interface allows classes to support lazy initialization 
 * while ensuring compatibility with type casting for original object types.
 *
 * Classes implementing this interface indicate they can be treated as lazy 
 * objects, helping IDEs recognize and suggest the original class methods 
 * when type-hinted alongside `LazyInterface`.
 */

$urlDomain = $_SERVER['HTTP_HOST'];
$projects = new Projects();

try {
    $project = $projects->getProjectName($urlDomain);
    define('PROJECT_NAME', $project);
} catch (\Exception $e) {
    $this->handleException($e);
}

interface LazyInterface
{
    // Marker interface with no methods.
}

$requiredFiles = [
    DIRECTORY_SEPARATOR
        . 'system'
        . DIRECTORY_SEPARATOR
        . 'framework'
        . DIRECTORY_SEPARATOR
        . 'fragment'
        . DIRECTORY_SEPARATOR
        . 'config'
        . DIRECTORY_SEPARATOR
        . 'globals.php',
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
        . 'vision'
        . DIRECTORY_SEPARATOR
        . 'core'
        . DIRECTORY_SEPARATOR
        . 'modules'
        . DIRECTORY_SEPARATOR
        . 'debug'
        . DIRECTORY_SEPARATOR
        . 'Debug.php',
];

$additionalFiles = [
    DIRECTORY_SEPARATOR
        . 'app'
        . DIRECTORY_SEPARATOR
        . PROJECT_NAME
        . DIRECTORY_SEPARATOR
        . 'config'
        . DIRECTORY_SEPARATOR
        . 'Define.php',
    DIRECTORY_SEPARATOR
        . 'app'
        . DIRECTORY_SEPARATOR
        . PROJECT_NAME
        . DIRECTORY_SEPARATOR
        . 'services'
        . DIRECTORY_SEPARATOR
        . 'Request.php',
    DIRECTORY_SEPARATOR
        . 'system'
        . DIRECTORY_SEPARATOR
        . 'framework'
        . DIRECTORY_SEPARATOR
        . 'fragment'
        . DIRECTORY_SEPARATOR
        . 'maintenance'
        . DIRECTORY_SEPARATOR
        . 'index.php',
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

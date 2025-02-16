<?php

/**
 * Vinexel Framework Index front app starter.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

use \Iconic\Bootstrap\Transmitter;

ob_start();
define('VISION_START', microtime(true));

$file = dirname(__DIR__)
    . DIRECTORY_SEPARATOR
    . 'system'
    . DIRECTORY_SEPARATOR
    . 'vendor'
    . DIRECTORY_SEPARATOR
    . 'vision'
    . DIRECTORY_SEPARATOR
    . 'Iconic.php';
if (file_exists($file)) {
    require_once $file;
} else {
    die("Error: Required main file not found: {$file}");
}

Transmitter::http()->run;
ob_end_flush();

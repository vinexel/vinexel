<?php

/**
 * Vinexel Framework Index front app starter.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga (ICONIC GROUP)
 * @license MIT License
 */

use \Iconic\Bootstrap\Transmitter;

date_default_timezone_set('Asia/Jakarta');

ob_start();
define('VISION_START', microtime(true));

$file = dirname(__DIR__)
    . DIRECTORY_SEPARATOR
    . strtolower('system')
    . DIRECTORY_SEPARATOR
    . strtolower('vendor')
    . DIRECTORY_SEPARATOR
    . strtolower('vision')
    . DIRECTORY_SEPARATOR
    . 'Iconic.php';
if (file_exists($file)) {
    require_once $file;
} else {
    die("Error: Required main file not found: {$file}");
}

Transmitter::http()->run;
ob_end_flush();

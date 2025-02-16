<?php

/**
 * Vinexel Framework Autoload Function.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

spl_autoload_register(function ($class) {
    $prefixes = [
        'Iconic\\'  => __DIR__ . DIRECTORY_SEPARATOR,
        'Deeper\\'  => dirname(__DIR__, 1)
            . DIRECTORY_SEPARATOR
            . strtolower('plugins')
            . DIRECTORY_SEPARATOR
            . strtolower('vinexel')
            . DIRECTORY_SEPARATOR
            . strtolower('vision-serve')
            . DIRECTORY_SEPARATOR
            . strtolower('core')
            . DIRECTORY_SEPARATOR
            . ucfirst('fragments')
            . DIRECTORY_SEPARATOR
            . ucfirst('kit')
            . DIRECTORY_SEPARATOR
            . ucfirst('deeper')
            . DIRECTORY_SEPARATOR,
    ];

    foreach ($prefixes as $prefix => $base_dir) {
        $len = strlen($prefix);
        if (strncmp($prefix, $class, $len) !== 0) {
            continue;
        }

        $relative_class = substr($class, $len);
        $file = $base_dir . str_replace('\\', DIRECTORY_SEPARATOR, $relative_class) . '.php';

        if (file_exists($file)) {
            // echo $file;
            require $file;
            return;
        } else {
            die("File $file not found at Iconic loader.");
        }
    }
});

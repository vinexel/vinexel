<?php

/**
 * Vision Framework Autoload Function.
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

spl_autoload_register(function ($class) {
    $prefixes = [
        'Iconic\\'  => __DIR__ . DIRECTORY_SEPARATOR,
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
            die("File $file not found.");
        }
    }
});

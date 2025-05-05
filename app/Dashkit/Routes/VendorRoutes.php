<?php

return array(
    'vendor_routes' => [
        '/laravel'             => '/laravel',
    ],
    'vendor_path' => VISION_DIR
        . DIRECTORY_SEPARATOR
        . strtolower("app")
        . DIRECTORY_SEPARATOR
        . PROJECT_NAME
        . DIRECTORY_SEPARATOR
        . ucfirst("vendor")
        . DIRECTORY_SEPARATOR
        . strtolower("public")
        . DIRECTORY_SEPARATOR
        . "index.php"
);

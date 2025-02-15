<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

function setCorsHeaders()
{
    header("X-Frame-Options: DENY");
    header("X-XSS-Protection: 1; mode=block");
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        header("HTTP/1.1 200 OK");
        exit();
    }
}

setCorsHeaders();

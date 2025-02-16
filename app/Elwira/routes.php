<?php

/**
 * Vinexel Framework
 *
 * @package Vision
 * @author Elwira Perdana
 * @copyright (c) PT Iconic Wira Niaga
 * @license MIT License
 */

use \Vision\Modules\Router;

// Add your routes
Router::add('GET', '/', 'HomeController@index');
Router::add('GET', '/tentang', 'HomeController@tentang');

// Example EN routes
$enRoutes = [
    '/en' => 'HomeController@english',
    '/about' => 'HomeController@about',
];

foreach ($enRoutes as $path => $action) {
    Router::add('GET', $path, $action);
}

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
Router::add('GET', '/en', 'HomeController@english');
Router::add('GET', '/about', 'HomeController@about');

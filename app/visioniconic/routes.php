<?php

use Vision\Modules\Router;

// Definisikan rute
Router::add('GET', '/', 'HomeController@index');
Router::add('GET', '/about', 'HomeController@about');

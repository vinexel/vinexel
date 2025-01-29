<?php

use Vision\Modules\Router;

// Definisikan rute
Router::add('GET', '/', 'HomeController@index');
Router::add('GET', '/kontak', 'HomeController@contact');
Router::add('GET', '/portofolio-detail-flymetrade', 'HomeController@detailFlymetrade');
Router::add('GET', '/ai', 'HomeController@AI');
Router::add('GET', '/peluang-karir', 'HomeController@career');
Router::add('GET', '/ui-ux', 'HomeController@careeruiux');

Router::add('POST', '/api/chat/message', 'ChatbotController@handleMessage');

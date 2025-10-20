<?php

use Vision\Modules\Router;

// HOME VIEW ROUTES
$homeRoutes = [
    '/' => ['HomeController@index', 'home'],
    '/about' => ['HomeController@aboutUs', 'about'],
    '/contact' => ['HomeController@contactUs', 'contact'],
    '/pricing' => ['HomeController@pricing', 'pricing'],

    // ROUTES WITH SUB-FOLDER CONTROLLER
    '/signin' => ['Auth\\AuthController@signin', 'signin'],
    '/signup' => ['Auth\\AuthController@signup', 'signup'],
    '/verify' => ['Auth\\AuthController@verify', 'verify'],
    '/change-password' => ['Auth\\AuthController@changePassword', 'change-password'],
    '/forgot-password' => ['Auth\\AuthController@forgotPassword', 'forgot-password'],
    '/dashboard' => ['Dashboard\\UserController@dashboard', 'dashboard'],
    '/profile' => ['Dashboard\\UserController@profile', 'profile'],
    '/setting' => ['Dashboard\\UserController@setting', 'setting'],
    '/signout' => ['Dashboard\\UserController@signout', 'signout'],
];

foreach ($homeRoutes as $path => $action) {
    $routeName = $action[1]; // Saving route name
    Router::add('GET', $path, $action[0], $routeName);
}


// AUTH PROCESS ROUTES (with prefix /auth)
Router::group(['prefix' => 'auth'], function () {
    $postRoutes = [
        '/verify' => ['Auth\\VerifyController@VerifyProcess', 'auth.verify'],
        '/signin' => ['Auth\\SigninController@SigninProcess', 'auth.signin'],
        '/signup' => ['Auth\\SignupController@SignupProcess', 'auth.signup'],
        '/change-password' => ['Auth\\PasswordController@ChangePasswordProcess', 'auth.change-password'],
        '/forgot-password' => ['Auth\\PasswordController@ForgotPasswordProcess', 'auth.forgot-password'],
    ];

    foreach ($postRoutes as $path => $action) {
        Router::add('POST', $path, $action[0], $action[1]);
    }
});

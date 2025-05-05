<?php

namespace Dashkit\Libraries\Helper;

use Deeper\Libraries\Session;

/**
 * This is dynamic functions with isolated autoload project
 * Can't use for global.
 */

class Functions
{
    /**
     * Assets path.
     */
    public static function asset($path)
    {
        return '/static/dashkit/' . ltrim($path, '/');
    }

    public static function getUserEmail()
    {
        return Session::get('user_session_email');
    }

    public static function getUserData()
    {
        return [
            'email' => Session::get('user_session_email'),
            'name' => Session::get('user_session_name'),
            'role' => Session::get('user_role'),
            // Add more...
        ];
    }
}

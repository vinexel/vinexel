<?php

namespace Dashkit\Libraries\Trait;

use Deeper\Libraries\Session;

trait Restriction
{
    private function isLogin()
    {
        if (Session::get('login_status') == LOGIN_STATUS) {
            $referer = $_SERVER['HTTP_REFERER'] ?? '/dashboard'; // fallback to path
            return transfer($referer);
        }
    }
}

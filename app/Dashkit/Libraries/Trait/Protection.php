<?php

namespace Dashkit\Libraries\Trait;

use Deeper\Libraries\Flasher;
use Deeper\Libraries\Session;

trait Protection
{
    private function checkLoginAccess()
    {
        if (Session::get('login_status') !== LOGIN_STATUS) {
            Flasher::setFlash("Access Denied", "You don't have permission to access this page, please login!", "danger", "bootstrap");
            return transfer("/signin");
        }
    }
}

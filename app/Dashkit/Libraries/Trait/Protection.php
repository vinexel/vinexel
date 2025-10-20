<?php

namespace Dashkit\Libraries\Trait;

use Deeper\Libraries\Flasher;
use Deeper\Libraries\Session;

/**
 * Trait Protection
 *
 * Provides authentication and access control checks
 * for controllers that require user login validation.
 */
trait Protection
{
    /**
     * Verify user login access.
     *
     * If the current session does not match the required
     * login status, this method will flash an error message
     * and redirect the user to the login page.
     *
     * Example:
     * ```php
     * $this->checkLoginAccess();
     * ```
     */
    private function checkLoginAccess()
    {
        if (Session::get('login_status') !== LOGIN_STATUS) {
            Flasher::setFlash("Access Denied", "You don't have permission to access this page, please login!", "danger", "bootstrap");
            return transfer("/signin");
        }
    }
}

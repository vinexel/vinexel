<?php

namespace Dashkit\Libraries\Trait;

use Deeper\Libraries\Session;

/**
 * Trait Restriction
 *
 * Prevents logged-in users from accessing guest-only routes
 * such as sign-in or registration pages.
 */
trait Restriction
{
    /**
     * Restrict access for authenticated users.
     *
     * If the user is already logged in, they will be redirected
     * to the previous page (HTTP_REFERER) or the dashboard as fallback.
     *
     * Example usage:
     * ```php
     * $this->isLogin();
     * ```
     */
    private function isLogin()
    {
        if (Session::get('login_status') == LOGIN_STATUS) {
            $referer = $_SERVER['HTTP_REFERER'] ?? '/dashboard'; // fallback to path
            return transfer($referer);
        }
    }
}

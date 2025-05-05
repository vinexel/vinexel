<?php

namespace Dashkit\Controllers\Auth;

use Deeper\Libraries\Session;
use Dashkit\Libraries\Trait\Restriction;
use Dashkit\Controllers\BaseController;

class AuthController extends BaseController
{
    use Restriction;

    public function __construct()
    {
        parent::__construct();
    }

    public function signin() // Login View
    {
        $this->isLogin();
        try {
            $data = [
                'title' => 'Login Page',
            ];
            $this->render('pages.auth.signin', 'layouts.auth', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function signup() // Register View
    {
        $this->isLogin();
        try {
            $data = [
                'title' => 'Register Account',
                'role' => 'user',
            ];
            $this->render('pages.auth.signup', 'layouts.auth', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function Verify() // Verification View
    {
        try {
            $data = [
                'title' => 'Verification',
                'role' => 'user',
                'verification_code' => Session::get("verification_code"),
            ];
            $this->render('pages.auth.verify', 'layouts.auth', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function ChangePassword() // Change Password View
    {
        try {
            $data = [
                'title' => 'Change Password',
                'role' => 'user',
                'user_session_email' => Session::get("user_session_email"),
            ];
            $this->render('pages.auth.change-password', 'layouts.auth', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function ForgotPassword() // Forgot Password View
    {
        try {
            $data = [
                'title' => 'Forgot Password',
                'role' => 'user',
                'user_session_email' => Session::get("user_session_email"),
            ];
            $this->render('pages.auth.forgot-password', 'layouts.auth', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }
}

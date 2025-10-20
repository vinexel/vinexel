<?php

namespace Dashkit\Controllers\Dashboard;

use Deeper\Libraries\Session;
use Dashkit\Libraries\Trait\Protection;
use Dashkit\Controllers\BaseController;

class UserController extends BaseController
{
    use Protection;

    public function dashboard() // Dashboard View
    {
        $this->checkLoginAccess();
        try {
            switch (Session::get('user_role')) {
                case 'superadmin':
                    $data = [
                        'title' => 'Superadmin Dashboard',
                        'role' => 'Superadmin',
                        'user_session_name' => Session::get("user_session_name"),
                        'user_session_email' => Session::get("user_session_email"),
                        'user_session_photo' => Session::get("user_session_photo"),
                    ];
                    $this->render('pages.dashboard.index', 'layouts.dashboard', $data);
                    break;
                case 'admin':
                    $data = [
                        'title' => 'Admin Dashboard',
                        'role' => 'Admin',
                        'user_session_name' => Session::get("user_session_name"),
                        'user_session_email' => Session::get("user_session_email"),
                        'user_session_photo' => Session::get("user_session_photo"),
                    ];
                    $this->render('pages.dashboard.index', 'layouts.dashboard', $data);
                    break;
                default:
                    $data = [
                        'title' => 'User Dashboard',
                        'role' => 'User',
                        'user_session_name' => Session::get("user_session_name"),
                        'user_session_email' => Session::get("user_session_email"),
                        'user_session_photo' => Session::get("user_session_photo"),
                    ];
                    $this->render('pages.dashboard.index', 'layouts.dashboard', $data);
            }
            exit();
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function profile() // Dashboard View
    {
        $this->checkLoginAccess();
        try {
            $data = $this->getData('Profile | Dashkit', [
                'description' => 'This site builth with powerfull Vinexel.',
                'author' => 'Artisans Developer',
                'role' => 'User',
                'user_session_name' => Session::get("user_session_name"),
                'user_session_email' => Session::get("user_session_email"),
                'user_session_phone' => Session::get("user_session_phone"),
                'user_session_photo' => Session::get("user_session_photo"),
            ]);
            $this->render('pages.dashboard.profile', 'layouts.dashboard', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function setting() // Setting View
    {
        $this->checkLoginAccess();
        try {
            $data = $this->getData('Profile | Dashkit', [
                'description' => 'This site builth with powerfull Vinexel.',
                'author' => 'Artisans Developer',
                'role' => 'User',
                'user_session_name' => Session::get("user_session_name"),
                'user_session_email' => Session::get("user_session_email"),
                'user_session_phone' => Session::get("user_session_phone"),
                'user_session_photo' => Session::get("user_session_photo"),
            ]);
            $this->render('pages.dashboard.setting', 'layouts.dashboard', $data);
        } catch (\Throwable $e) {
            $this->handleException($e);
        }
    }

    public function Signout() // Out
    {
        // use remove or unset
        Session::remove('user_session_email');
        Session::remove('user_session_name');
        Session::remove('user_session_id');
        Session::destroy();

        return transfer("/");
    }
}

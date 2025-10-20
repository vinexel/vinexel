<?php

namespace Dashkit\Controllers\Auth;

use Deeper\Libraries\Flasher;
use Deeper\Libraries\Session;
use Dashkit\Controllers\BaseController;

class SigninController extends BaseController
{
    public function SigninProcess()
    {
        if (isset($_POST['submit'])) {
            $user_email = filter_var($_POST['user_email'], FILTER_SANITIZE_EMAIL);
            $user_password = $_POST['user_password'];

            if ($user_email === '' || $user_password === '') {
                Flasher::setFlash('Form', 'must be completed.', 'warning');
                return transfer("/signin");
            }

            $user = $this->authModel->findUserByEmail($user_email);

            if (!$user) {
                Flasher::setFlash(__('message.account'), __('message.not_found'), 'warning');
                return transfer("/signin");
            }

            if ($user['user_status'] !== USER_STATUS_ACTIVE) {
                Flasher::setFlash('Your account', 'is not active yet, please contact admin.', 'danger');
                return transfer("/signin");
            }

            if (!password_verify($user_password, $user['user_password'])) {
                Flasher::setFlash('Password', 'tou entered is incorrect.', 'danger');
                return transfer("/signin");
            }

            // Jika semuanya lolos
            Session::set('user_session_email', $user_email);
            Session::set('user_session_id', $user['user_id']);
            Session::set('user_session_name', $user['user_name']);
            Session::set('user_session_phone', $user['user_phone']);
            Session::set('user_session_address', $user['user_address']);
            Session::set('user_session_photo', $user['user_photo']);
            Session::set('user_role', $user['user_role']);
            Session::set('created_at', $user['created_at']);
            Session::set('login_status', 'login');
            session_regenerate_id(true);

            switch ($user['user_role']) {
                case 'superadmin':
                    Flasher::setFlash('Superadmin.', 'Welcome to dashboard management.', 'primary');
                    return transfer("/dashboard");
                    break;
                case 'admin':
                    Flasher::setFlash('Administrator.', 'Welcome to dashboard management.', 'primary');
                    return transfer("/dashboard");
                    break;
                default:
                    Flasher::setFlash('User.', 'Welcome to dashboard management.', 'primary');
                    return transfer("/dashboard");
            }
            exit();
        }
    }
}

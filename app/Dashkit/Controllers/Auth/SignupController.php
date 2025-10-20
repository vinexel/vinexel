<?php

namespace Dashkit\Controllers\Auth;

use Deeper\Libraries\Flasher;
use Deeper\Libraries\Session;
use Dashkit\Controllers\BaseController;

class SignupController extends BaseController
{
    public function SignupProcess()
    {
        if (!isset($_POST['submit'])) return;

        $name = $_POST['user_name'];
        $email = $_POST['user_email'];
        $phone = $_POST['user_phone'];
        $pin = $_POST['user_pin'];
        $password = $_POST['user_password'];
        $confirm_password = $_POST['confirm_password'];

        if ($name === '' || $email === '' || $phone === '' || $password === '' || $confirm_password === '') {
            Flasher::setFlash('Form', 'needs to be filled in completely.', 'warning');
            return transfer("/signup");
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Flasher::setFlash('Email', 'is invalid.', 'warning');
            return transfer("/signup");
        }

        if ($this->authModel->isEmailExist($email)) {
            Flasher::setFlash('Email', 'is already registered.', 'warning');
            return transfer("/signup");
        }

        if ($password !== $confirm_password) {
            Flasher::setFlash('Password', 'does not match.', 'warning');
            return transfer("/signup");
        }

        if (strlen($password) < 6 || $password === '123456' || $password === 'abcdef') {
            Flasher::setFlash('Password', 'is not secure.', 'warning');
            return transfer("/signup");
        }

        if (!is_numeric($pin) || strlen($pin) !== 4) {
            Flasher::setFlash('PIN', 'must be 4 digits.', 'warning');
            return transfer("/signup");
        }

        if (strlen($phone) < 10 || $phone === '1234567890') {
            Flasher::setFlash('Telephone', 'is invalid.', 'warning');
            return transfer("/signup");
        }

        $status = md5(rand(0, 1000));
        Session::set('verification_code', $status);


        $success = $this->authModel->registerUser([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'pin' => $pin,
            'role' => USER_ROLE,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'status' => $status,
            'photo' => 'default_profile.png'
        ]);

        if ($success) {
            Flasher::setFlash('Registration', "success. Verification code: <br>$status", 'success');
            return transfer("/verify?user_email=$email&code=$status");
        } else {
            Flasher::setFlash('Registration', 'failed.', 'danger');
            return transfer("/signup");
        }
    }
}

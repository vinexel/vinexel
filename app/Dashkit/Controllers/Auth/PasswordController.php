<?php

namespace Dashkit\Controllers\Auth;

use Deeper\Libraries\Flasher;
use Dashkit\Controllers\BaseController;
use PDOException;

class PasswordController extends BaseController
{
    public function ChangePasswordProcess()
    {
        if (isset($_POST['submit'])) {
            $user_email = $_POST['user_email'];
            $current_password = $_POST['current_password'];
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];

            if ($user_email == '' || $current_password == '' || $new_password == '' || $confirm_password == '') {
                Flasher::setFlash('Form', 'needs to be filled in completely.', 'warning');
                header("Location: /change-password");
                exit();
            }

            try {
                $user = $this->authModel->findUserByEmail($user_email);

                if (!$user) {
                    Flasher::setFlash('Email', 'not found.', 'warning');
                } elseif (!password_verify($current_password, $user['user_password'])) {
                    Flasher::setFlash('Current Password', 'does not match.', 'warning');
                } elseif ($new_password !== $confirm_password) {
                    Flasher::setFlash('New Password & Confirm Password', 'does not match.', 'warning');
                } elseif (strlen($new_password) < 6) {
                    Flasher::setFlash('New Password', 'minimum 6 characters.', 'warning');
                } elseif ($new_password == '123456' || $new_password == 'abcdef') {
                    Flasher::setFlash('Password', 'should not be too easy to guess.', 'warning');
                } else {
                    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->userModel->updatePasswordByEmail($user_email, $hashed_password);
                    Flasher::setFlash('Change Password', 'Success.', 'success');
                }
                header("Location: /change-password");
                exit();
            } catch (PDOException $e) {
                die('Error: ' . $e->getMessage());
            }
        }
    }

    public function ForgotPasswordProcess()
    {
        if (isset($_POST['submit'])) {
            $user_email = $_POST['user_email'];
            $user_pin = $_POST['user_pin'];
            $new_password = $_POST['new_password'];
            $confirm_password = $_POST['confirm_password'];

            if ($user_email == '' || $user_pin == '' || $new_password == '' || $confirm_password == '') {
                Flasher::setFlash('Form', 'needs to be filled in completely.', 'warning');
                header("Location: /forgot-password");
                exit();
            }

            try {
                $user = $this->userModel->getUserByPin($user_pin);

                if (!$user) {
                    Flasher::setFlash('PIN', 'not found.', 'warning');
                } elseif ($user['user_email'] !== $user_email) {
                    Flasher::setFlash('Email', 'does not match PIN.', 'warning');
                } elseif ($new_password !== $confirm_password) {
                    Flasher::setFlash('New Password & Confirm Password', 'does not match.', 'warning');
                } elseif (strlen($new_password) < 6) {
                    Flasher::setFlash('New Password', 'minimum 6 characters.', 'warning');
                } elseif ($new_password == '123456' || $new_password == 'abcdef') {
                    Flasher::setFlash('Password', 'should not be too easy to guess.', 'warning');
                } else {
                    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                    $this->userModel->updatePasswordByEmailAndPin($user_email, $user_pin, $hashed_password);
                    Flasher::setFlash('Change Password', 'Success.', 'success');
                    return transfer("/auth-signin");
                    exit();
                }

                header("Location: /forgot-password");
                exit();
            } catch (PDOException $e) {
                die('Error: ' . $e->getMessage());
            }
        }
    }
}

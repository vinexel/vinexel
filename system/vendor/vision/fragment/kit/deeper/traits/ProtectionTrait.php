<?php

namespace Deeper\Traits;

use Deeper\Libraries\Flasher;
use Deeper\Libraries\Session;

trait ProtectionTrait
{
    public function generateToken()
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    public function validateToken($token)
    {
        if (!isset($token) || $token !== Session::get('csrf_token')) {
            throw new \Exception('Invalid CSRF Token');
        }
    }

    private function checkToken()
    {
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== Session::get('csrf_token')) {
            Flasher::setFlash('Invalid CSRF Token', 'Possible CSRF attack.', 'danger');
            return true; // CSRF invalid
        }
        return false; // CSRF valid
    }
}

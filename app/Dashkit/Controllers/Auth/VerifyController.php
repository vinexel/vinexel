<?php

namespace Dashkit\Controllers\Auth;

use Deeper\Libraries\Flasher;
use Deeper\Libraries\Session;
use Dashkit\Models\AuthModel;
use Dashkit\Controllers\BaseController;
use PDOException;

class VerifyController extends BaseController
{
    private $authModel;

    public function __construct()
    {
        parent::__construct();
        $this->authModel = new AuthModel();
    }

    public function VerifyProcess()
    {
        if (isset($_POST['submit'])) {
            $code = $_POST['code'];

            if (!is_string($code)) {
                Flasher::setFlash('Verification', 'failed, input data type is invalid.', 'warning');
                return transfer("/verify");
                exit();
            }

            try {
                $user = $this->authModel->verifyCode($code);

                if ($user) {
                    $this->authModel->activateUser($code);
                    // unset($_SESSION['verification_code']);
                    Session::remove('verification_code');


                    Flasher::setFlash('Account', 'is active, plase login.', 'success');
                    return transfer("/signin");
                    exit();
                } else {
                    Flasher::setFlash('Verification', 'failed, please enter the correct answer.', 'warning');
                    return transfer("/signin");
                    exit();
                }
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
    }
}

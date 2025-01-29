<?php

use Vision\Modules\Config;

include "config.php";

$config = include 'config.php';

if ($config['username'] == '' && $config['password'] == '') {
    echo '<meta http-equiv="refresh" content="0; url=malscan-install" />';
    exit();
}

@session_start();

if (isset($_SESSION['sec-username'])) {
    $uname = $_SESSION['sec-username'];
    if ($uname == $config['username']) {
        echo '<meta http-equiv="refresh" content="0; url=malscan" />';
        exit;
    }
}

$error = "No";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <title><?php echo $data['title'] ?></title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.4.18/css/AdminLTE.min.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png">
</head>

<body class="hold-transition login-page bg-black">

    <div class="login-box">
        <div class="login-logo">
            <a href="/"><i class="fa fa-search"></i> <span class="text-danger">Mal</span><strong class="text-success">Scan</strong> for better living</a>
        </div>
        <div class="login-box-body bg-black">
            <?php
            if (isset($_POST['signin'])) {
                $username = htmlspecialchars(strip_tags($_POST['username']));
                $password = hash('sha256', $_POST['password']);
                $pin = htmlspecialchars(strip_tags($_POST['pin']));
                if ($username == $config['username'] && $password == $config['password'] && $pin == Config::get('MALSCAN_PIN')) {
                    $_SESSION['sec-username'] = $username;
                    echo '<meta http-equiv="refresh" content="0;url=malscan">';
                } else {
                    echo '<br />
		<div class="callout callout-danger">
              <i class="fa fa-exclamation-circle"></i> The entered <strong>Username</strong> or <strong>Password</strong> or <strong>Pin</strong> is incorrect.
        </div>';
                    $error = "Yes";
                }
            }
            ?>
            <form action="" method="post">
                <div class="form-group has-feedback <?php
                                                    if ($error == "Yes") {
                                                        echo 'has-error';
                                                    }
                                                    ?>">
                    <input type="username" name="username" class="form-control" placeholder="Username" <?php
                                                                                                        if ($error == "Yes") {
                                                                                                            echo 'autofocus';
                                                                                                        }
                                                                                                        ?> required>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" name="pin" class="form-control" placeholder="Enter Pin" required>
                    <span class="glyphicon glyphicon-open form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" name="signin" class="btn btn-danger btn-block btn-flat btn-lg"><i class="fa fa-sign-in"></i>
                            &nbsp;Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
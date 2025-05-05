<?php
namespace Dashkit\Libraries\Helper;

class InstallForms
{
    public static function installFormFields()
    {
        return [
            'email' => 'email_address',
            'username' => 'admin_username',
            'password' => 'admin_password',
        ];
    }
}

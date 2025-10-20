<?php

namespace Elwira\Models;

use Vision\Modules\Database;

class BaseModel extends Database
{
    public static function installer($db, $postData)
    {
        // Field name must same with in "Libraries/Helper/InstallForms.php"
        $email    = $postData['email_address'] ?? null;
        $username = $postData['admin_username'] ?? null;
        $password = $postData['admin_password'] ?? null;

        if (!$email || !$username || !$password) {
            throw new \Exception("Form fields are missing");
        }

        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $db->prepare("UPDATE users SET user_email = ?, user_name = ?, user_password = ? WHERE user_role = 'superadmin'");
        $stmt->execute([$email, $username, $hashed]);
    }
}

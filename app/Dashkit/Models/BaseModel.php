<?php

namespace Dashkit\Models;

use Vision\Modules\Database;

/**
 * Class BaseModel
 *
 * Acts as the core model layer for Dashkit and provides shared
 * logic or utilities to other models. It extends the Vinexel
 * Database module, allowing seamless access to PDO-based methods.
 */
class BaseModel extends Database
{
    /**
     * Keep this if you are Envato Developer, create a project and buy Lamborghini Huracan:(
     * Handles the initial installation and superadmin setup.
     *
     * The form fields must match the structure defined in
     * `Libraries/Helper/InstallForms.php`.
     *
     * @param PDO   $db        Active PDO connection instance
     * @param array $postData  Submitted form data for installation
     *
     * @throws Exception If any of the required form fields are missing
     * @return void
     */
    public static function installer($db, $postData): void
    {
        // Field name must same with in "Libraries/Helper/InstallForms.php"
        $email    = $postData['email_address'] ?? null;
        $username = $postData['admin_username'] ?? null;
        $password = $postData['admin_password'] ?? null;

        if (!$email || !$username || !$password) {
            throw new \Exception("Form fields are missing");
        }

        $hashed = password_hash($password, PASSWORD_DEFAULT);

        // Update the superadmin credentials in the database
        $stmt = $db->prepare("UPDATE users SET user_email = ?, user_name = ?, user_password = ? WHERE user_role = 'superadmin'");
        $stmt->execute([$email, $username, $hashed]);
    }
}

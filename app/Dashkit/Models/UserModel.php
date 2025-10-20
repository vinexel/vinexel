<?php

namespace Dashkit\Models;

/**
 * UserModel
 *
 * Handles all user-related database interactions.
 * Extends BaseModel which provides PDO query handling and database connection.
 *
 */
class UserModel extends BaseModel
{
    /**
     * Retrieve a user by their PIN.
     *
     * @param string $pin The user PIN.
     * @return array|null The user data if found, otherwise null.
     */
    public function getUserByPin($pin): ?array
    {
        $this->query("SELECT * FROM users WHERE user_pin = :pin");
        $this->bind(':pin', $pin);
        return $this->single();
    }

    /**
     * Update user password based on email address.
     *
     * @param string $email The user's email.
     * @param string $password The new hashed password.
     * @return bool True on success, false on failure.
     */
    public function updatePasswordByEmail($email, $password): bool
    {
        $this->query("UPDATE users SET user_password = :password WHERE user_email = :email");
        $this->bind(':password', $password);
        $this->bind(':email', $email);
        return $this->execute();
    }

    /**
     * Update user password based on email and PIN verification.
     *
     * @param string $email The user's email.
     * @param string $pin The user's security PIN.
     * @param string $password The new hashed password.
     * @return bool True on success, false on failure.
     */
    public function updatePasswordByEmailAndPin($email, $pin, $password): bool
    {
        $this->query("UPDATE users SET user_password = :password WHERE user_email = :email AND user_pin = :pin");
        $this->bind(':password', $password);
        $this->bind(':email', $email);
        $this->bind(':pin', $pin);
        return $this->execute();
    }
}

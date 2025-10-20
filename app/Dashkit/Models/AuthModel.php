<?php

namespace Dashkit\Models;

use PDOException;

/**
 * Class AuthModel
 *
 * Handles all authentication-related operations, including user lookup,
 * registration, email verification, and activation.
 */
class AuthModel extends BaseModel
{
    /**
     * Retrieve user details by email.
     *
     * @param string $email
     * @return array|null Returns user data if found, otherwise null.
     */
    public function findUserByEmail($email): ?array
    {
        try {
            $this->query("SELECT * FROM users WHERE user_email = :email");
            $this->bind(':email', $email);
            return $this->single();
        } catch (PDOException $e) {
            return null;
        }
    }

    /**
     * Check if an email address already exists in the system.
     *
     * @param string $email
     * @return bool
     */
    public function isEmailExist($email): bool
    {
        try {
            $this->query("SELECT user_email FROM users WHERE user_email = :email");
            $this->bind(':email', $email);
            $this->execute();
            return $this->rowCount() > 0;
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Register a new user account.
     *
     * Expected array structure:
     * [
     *     'name'     => string,
     *     'email'    => string,
     *     'phone'    => string|null,
     *     'password' => string,
     *     'pin'      => string|null,
     *     'role'     => string,
     *     'status'   => string|int,
     *     'photo'    => string|null
     * ]
     *
     * @param array $data
     * @return bool True on success, false on failure.
     */

    public function registerUser($data): bool
    {
        try {
            $this->query("
                INSERT INTO users (
                    user_name, user_email, user_phone, user_password, 
                    user_pin, user_role, user_status, user_photo
                ) VALUES (
                    :user_name, :user_email, :user_phone, :user_password, 
                    :user_pin, :user_role, :user_status, :user_photo
                )
            ");
            $this->bind(':user_name', $data['name']);
            $this->bind(':user_email', $data['email']);
            $this->bind(':user_phone', $data['phone']);
            $this->bind(':user_password', $data['password']);
            $this->bind(':user_pin', $data['pin']);
            $this->bind(':user_role', $data['role']);
            $this->bind(':user_status', $data['status']);
            $this->bind(':user_photo', $data['photo']);
            return $this->execute();
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Verify user registration or activation code.
     *
     * @param string $code
     * @return array|null
     * @throws PDOException
     */
    public function verifyCode(string $code): ?array
    {
        try {
            $this->query("SELECT * FROM users WHERE user_status = :code");
            $this->bind(':code', $code);
            return $this->single();
        } catch (PDOException $e) {
            throw new PDOException("Verifikasi gagal: " . $e->getMessage());
        }
    }

    /**
     * Activate a user account using the given verification code.
     *
     * @param string $code
     * @return bool
     * @throws PDOException
     */
    public function activateUser(string $code): bool
    {
        try {
            $this->query("UPDATE users SET user_status = " . USER_STATUS_ACTIVE . " WHERE user_status = :code");
            $this->bind(':code', $code);
            $this->execute();
            return true;
        } catch (PDOException $e) {
            throw new PDOException("Aktivasi gagal: " . $e->getMessage());
        }
    }
}

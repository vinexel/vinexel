<?php

namespace Dashkit\Models;

use PDOException;

class AuthModel extends BaseModel
{
    public function findUserByEmail($email)
    {
        try {
            $this->query("SELECT * FROM users WHERE user_email = :email");
            $this->bind(':email', $email);
            return $this->single();
        } catch (PDOException $e) {
            return null;
        }
    }

    public function isEmailExist($email)
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

    public function registerUser($data)
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

    public function verifyCode(string $code)
    {
        try {
            $this->query("SELECT * FROM users WHERE user_status = :code");
            $this->bind(':code', $code);
            return $this->single();
        } catch (PDOException $e) {
            throw new PDOException("Verifikasi gagal: " . $e->getMessage());
        }
    }

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

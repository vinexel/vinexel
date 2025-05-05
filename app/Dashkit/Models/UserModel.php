<?php

namespace Dashkit\Models;

class UserModel extends BaseModel
{
    public function getUserByPin($pin)
    {
        $this->query("SELECT * FROM users WHERE user_pin = :pin");
        $this->bind(':pin', $pin);
        return $this->single();
    }

    public function updatePasswordByEmail($email, $password)
    {
        $this->query("UPDATE users SET user_password = :password WHERE user_email = :email");
        $this->bind(':password', $password);
        $this->bind(':email', $email);
        return $this->execute();
    }

    public function updatePasswordByEmailAndPin($email, $pin, $password)
    {
        $this->query("UPDATE users SET user_password = :password WHERE user_email = :email AND user_pin = :pin");
        $this->bind(':password', $password);
        $this->bind(':email', $email);
        $this->bind(':pin', $pin);
        return $this->execute();
    }
}

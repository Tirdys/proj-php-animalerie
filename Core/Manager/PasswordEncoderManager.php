<?php

namespace Core\Manager;

class PasswordEncoderManager
{
    public function passwordEncode($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function passwordVerify($password, $encryptPassword)
    {
        return password_verify($password, $encryptPassword);
    }
}
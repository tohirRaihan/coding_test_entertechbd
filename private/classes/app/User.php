<?php

namespace App;

use Database\Database;

class User extends Database
{
    public static function login($email, $password)
    {
        $sql = "SELECT * FROM `users` WHERE `email` = ? AND `password` = ? LIMIT 1";
        return parent::getRow($sql, [$email, $password]);
    }

    public static function register($name, $email, $password)
    {
        $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES (?,?,?)";
        return parent::insertRow($sql, [$name, $email, $password]);
    }
}
// Create a new user to instantiate a Connection
$user = new User;

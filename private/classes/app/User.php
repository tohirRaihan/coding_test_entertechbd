<?php

namespace App;

use Database\Database;
use Database\Session;

class User extends Database
{
    public static function login($email, $password)
    {
        $sql = "SELECT * FROM `users` WHERE `email` = ? AND `password` = ? LIMIT 1";
        return parent::getRow($sql, [$email, $password]);
    }

    public static function logout()
    {
        Session::clearSession();
        redirect_to(url_for('dashboard/login.php'));
        die;
    }

    public static function register($name, $email, $location, $password)
    {
        $sql = "INSERT INTO `users`(`name`, `email`, `location`, `password`) VALUES (?,?,?,?)";
        return parent::insertRow($sql, [$name, $email, $location, $password]);
    }

    // check if a user exists with an email
    public static function checkUser($email)
    {
        $sql = "SELECT * FROM `users` WHERE `email` = ? LIMIT 1";
        return parent::getRow($sql, [$email]);
    }

    public static function findUser($id)
    {
        $sql = "SELECT * FROM `users` WHERE `id` = ? LIMIT 1";
        return parent::getRow($sql, [$id]);
    }

    public static function auth()
    {
        if (Session::getSessionData('user_logged')) {
            return true;
        } else {
            redirect_to(url_for('dashboard/login.php'));
            die;
        }
    }

    public static function isAdmin($id)
    {
        if ($id) {
            # code...
            $user = self::findUser($id);
            if ((int)$user['role'] === 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
// Create a new user to instantiate a Connection
$user = new User;

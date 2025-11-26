<?php

namespace Services;

use Models\Users;
use Services\UsersService;

class AuthService
{
    public static function login($username, $password) : void {
        $usersService = new UsersService();

        $user = $usersService->getUserByUsername($username);

        if ($user == null) {
            return;
        }

        if ($user->getPassword() == $password) {
            $_SESSION['userUID'] = $user->getId();
            $_SESSION['timeout'] = time();
        }
    }

    public static function logout() : void {
        unset($_SESSION['userUID']);
        unset($_SESSION['timeout']);
    }

    private static function getHash($password) : string {
        return password_hash($password, PASSWORD_DEFAULT);
    }
    
}
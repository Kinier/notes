<?php
namespace App\Middleware;

class AuthMiddleware{
    /**
     * @param string $location page to redirect if no user rights
     */
    public static function isUser(string $location)
    {
        if (!key_exists($_SESSION['user']['id'])){
            header("Location: $location");
            die();
        }
    }
}
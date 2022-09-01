<?php
namespace App\Middleware;

class AuthMiddleware{
    /**
     * @param string $location page to redirect if no user rights
     */
    public static function isUser(string $location)
    {
        if (!isset($_SESSION['user'])){
            header("Location: $location");
            die();
        }
    }
}
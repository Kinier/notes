<?php

namespace App\Controllers;

use App\Helpers\Response;

class UserController{
    public static function profile()
    {
        Response::page('/profile');
    }


    public static function register()
    {
        Response::page('register');
    }



    public static function login()
    {
        Response::page('login');
    }

}
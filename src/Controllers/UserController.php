<?php

namespace App\Controllers;

use App\Helpers\Response;

class UserController{
    public static function profilePage()
    {
        Response::page('/profile');
    }


    public static function registerPage()
    {
        Response::page('register');
    }



    public static function loginPage()
    {
        Response::page('login');
    }

}
<?php

namespace App\Controllers;

use App\Helpers\Response;

class ErrorController{
    public static function noPage()
    {
        Response::errorPage('404');
    }
}
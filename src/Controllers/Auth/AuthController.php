<?php


namespace App\Controllers\Auth;

use App\Config\Database;
use App\Helpers\Response;

class AuthController
{
    public static function register()
    {

        $data = json_decode(file_get_contents('php://input'), true);

        $email = $data['email'];
        $password = $data['password'];

        $db = new Database();
        $connection = $db->connect();
        $statementObject = $connection->prepare(
            "INSERT INTO `user`(`password`, `email`) VALUES (?,?)"
        );
        $result = $statementObject->execute([$password, $email]);
        if ($result){
            $_SESSION['user']['email'] = $email;
            $_SESSION['user']['password'] = $password;
            $_SESSION['user']['id'] = $connection->lastInsertId();

            Response::jsonOK();
        }else{
//            Response::page('login',['errors'=>['server'=>'user with such parameters already exist']]);
            Response::jsonError();
        }

    }

    public static function login()
    {
        $data = json_decode(file_get_contents('php://input'), true);


        $email = $data['email'];
        $password = $data['password'];

        $db = new Database();
        $connection = $db->connect();
        $statementObject = $connection->prepare(
            "SELECT * FROM `user` WHERE email=? AND password=?"
        );
        $statementObject->execute([$email, $password]);
        $user = $statementObject->fetch();
        if ($user){
            $_SESSION['user']['email'] = $user['email'];
            $_SESSION['user']['password'] = $user['password'];
            $_SESSION['user']['id'] = $user['id'];
            Response::jsonOK();
        }else{
            Response::jsonError();
        }

    }


    public static function logout()
    {
        session_destroy();
        header("Location: /login");
        die();
    }
}
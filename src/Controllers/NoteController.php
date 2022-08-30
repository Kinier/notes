<?php

namespace App\Controllers;
use App\Helpers\Response;
use App\Config\Database;
use PDO;

class NoteController{


    public static function create(){

    }

    public static function index()
    {
        $db = new Database();
        $connection = $db->connect();
        $statementObject = $connection->prepare("SELECT * FROM note"); // FIXME WHERE user_id = `$_SESSION[userId]`
        $statementObject->execute();
        $notes = $statementObject->fetchAll();
        Response::page('index', ["notes"=>$notes]);
    }


}
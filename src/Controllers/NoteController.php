<?php

namespace App\Controllers;
use App\Helpers\Response;
use App\Config\Database;
use PDO;

class NoteController{


    public static function create(){
        $data = json_decode(file_get_contents('php://input'), true);

        $title = nl2br(($data['title']));
        $text = nl2br(($data['text']));
        $userId = $_SESSION['user']['id'];

        $db = new Database();
        $connection = $db->connect();
        $statementObject = $connection->prepare("INSERT INTO `note`(`title`, `text`, `user_id`) VALUES (?,?,?)"); // FIXME WHERE user_id = `$_SESSION[userId]`
        $result = $statementObject->execute([$title, $text, $userId]);
        if ($result){
            Response::jsonOK();
        }else{
            Response::jsonError();
        }
    }

    public static function index()
    {

        $userId = $_SESSION['user']['id'];
        $db = new Database();
        $connection = $db->connect();
        $statementObject = $connection->prepare("SELECT * FROM note WHERE user_id = ?"); // FIXME WHERE user_id = `$_SESSION[userId]`
        $statementObject->execute([$userId]);
        $notes = $statementObject->fetchAll();
        Response::page('index', ["notes"=>$notes]);
    }

    public static function createPage()
    {
        Response::page('note');
    }

    public static function notePreviewPage()
    {
        $noteId = $_GET['id'];
        $userId = $_SESSION['user']['id'];

        $db = new Database();
        $connection = $db->connect();
        $statementObject = $connection->prepare("SELECT * FROM note WHERE id = ? and user_id = ?"); // FIXME WHERE user_id = `$_SESSION[userId]`
        $statementObject->execute([$noteId, $userId]);
        $note = $statementObject->fetch();

        Response::page("preview", ['note'=>$note]);
    }

}
<?php

namespace App\Controllers;
use App\Helpers\Response;
use App\Config\Database;
use App\Models\NoteModel;

use PDO;

class NoteController{


    public static function create(){
        $data = json_decode(file_get_contents('php://input'), true);

        $title = nl2br(($data['title']));
        $text = nl2br(($data['text']));
        $userId = $_SESSION['user']['id'];

        $db = new Database();
        $connection = $db->connect();
        $noteModel = new NoteModel($connection);
        $result = $noteModel->createNote($title, $text, $userId);
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
        $noteModel = new NoteModel($connection);
        $notes = $noteModel->getAllNotesByUserId($userId);
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
        $noteModel = new NoteModel($connection);
        $note = $noteModel->getUserNoteById($userId, $noteId);

        Response::page("preview", ['note'=>$note]);
    }

    public static function deleteNote()
    {
        $noteId = $_GET['id'];
        $userId = $_SESSION['user']['id'];

        $db = new Database();
        $connection = $db->connect();
        $noteModel = new NoteModel($connection);
        $result = $noteModel->deleteNoteById($noteId, $userId);
        if ($result) {
            Response::redirect("/");
        }
        
    }

}
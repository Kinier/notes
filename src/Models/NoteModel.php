<?php

namespace App\Models;
use PDO;
class NoteModel{
    private PDO $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function createNote($title, $text, $userId): bool
    {
        $statementObject = $this->connection->prepare("INSERT INTO `note`(`title`, `text`, `user_id`) VALUES (?,?,?)");
        $result = $statementObject->execute([$title, $text, $userId]);
        return $result;
    }

    public function getAllNotesByUserId($userId)
    {
        $statementObject = $this->connection->prepare("SELECT * FROM note WHERE user_id = ?");
        $statementObject->execute([$userId]);
        $notes = $statementObject->fetchAll();
        return $notes;
    }

    public function getUserNoteById($userId, $noteId)
    {
        $statementObject = $this->connection->prepare("SELECT * FROM note WHERE id = ? and user_id = ?");
        $statementObject->execute([$noteId, $userId]);
        $note = $statementObject->fetch();
        return $note;
    }

    public function deleteNoteById($noteId, $userId){
        $statementObject = $this->connection->prepare("DELETE FROM `note` WHERE `id` = ? AND `user_id` = ?");
        $result = $statementObject->execute([$noteId, $userId]);
        return $result;
    }
}
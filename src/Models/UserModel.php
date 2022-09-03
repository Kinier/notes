<?php

namespace App\Models;
use PDO;

class UserModel{
    private PDO $connection;

    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function createUser($email, $password): bool
    {
        $statementObject = $this->connection->prepare(
            "INSERT INTO `user`(`password`, `email`) VALUES (?,?)"
        );
        $result = $statementObject->execute([$password, $email]);

        return $result;
    }

    public function getUserByEmail($email)
    {
        $statementObject = $this->connection->prepare(
            "SELECT * FROM `user` WHERE email=?"
        );
        $statementObject->execute([$email]);
        $user = $statementObject->fetch();
        return $user;
    }
}
<?php

namespace App\Config;

use PDO;

class Database
{
    public string $location;
    public string $name;
    public string $user;
    public string $password;
    public string $charset;

    public function __construct()
    {
        $this->location = 'localhost';
        $this->name = 'notes';
        $this->user = 'root';
        $this->password = 'pipapipa123';
        $this->charset = 'utf8';

    }


    /**
     * @return PDO connection
     */
    public function connect(): PDO
    {


        $dsn = "mysql:host=$this->location;dbname=$this->name;charset=$this->charset";


        return new PDO($dsn, $this->user, $this->password);
    }


}


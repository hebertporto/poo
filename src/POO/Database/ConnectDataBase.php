<?php

namespace POO\Database;


class ConnectDataBase {

    private $conn;

    private $host;
    private $dbname;
    private $user;
    private $password;
    private $database;

    public function __construct($host, $dbname, $user, $password, $database = 'mysql')
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
    }

    public function connectDb()
    {
        try {
            $this->conn = new \PDO("{$this->database}:host={$this->host};dbname={$this->dbname}", $this->user, $this->password);
        } catch (PDOException $e) {
            print "Falha na Conexão - Error: " . $e->getMessage() . "<br/>";
            die();
        }

        return $this->conn;
    }

    public function disconnectDb()
    {
        $this->conn = null;
    }
} 
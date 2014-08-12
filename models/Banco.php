<?php

class Banco {

    private $database = 'mysql';
    private $host = 'localhost';
    private $usuario = 'root';
    private $senha = 'root';
    private $dbname = 'code';

    public function __construct()
    {
        try {
            $conexao = new \PDO($this->database . ":host=" . $this->host . ";dbname=" . $this->dbname , $this->usuario, $this->senha);
        } catch( \PDOException $e) {
            die("Erro código: " . $e->getCode(). ": " . $e->getMessage());
        };
        return $conexao;
    }

} 
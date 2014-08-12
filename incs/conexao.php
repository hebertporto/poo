<?php

$config['database'] = 'mysql';
$config['host'] = 'localhost';
$config['usuario'] = 'root';
$config['senha'] = 'root';
$config['dbname'] = 'code';

try {
    $conexao = new \PDO($config['database'] . ":host=" . $config['host'] . ";dbname=" . $config['dbname'] ,$config['usuario'], $config['senha']);
} catch( \PDOException $e) {
    die("Erro código: " . $e->getCode(). ": " . $e->getMessage());
};
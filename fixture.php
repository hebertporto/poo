<?php

require_once('incs/conexao.php');

/**
 * Tabela: Cliente
 * id: int
 * nome: varchar
 * data_nascimento: varchar
 * cpf: varchar
 * telefone: varchar
 * email: varchar
 */

$sql = "CREATE TABLE IF NOT EXISTS cliente (
  id int(10) NOT NULL AUTO_INCREMENT,
  nome varchar(128) COLLATE utf8_swedish_ci NOT NULL,
  data_nascimento varchar(32) COLLATE utf8_swedish_ci NOT NULL,
  cpf varchar(32) COLLATE utf8_swedish_ci NOT NULL,
  telefone varchar(32) COLLATE utf8_swedish_ci NOT NULL,
  email varchar(32) COLLATE utf8_swedish_ci NOT NULL,
  PRIMARY KEY (id)
)";

$stmt = $conexao->prepare($sql);
$stmt->execute();

# Resetar a Tabela
$sql = "TRUNCATE TABLE cliente";
$stmt = $conexao->prepare($sql);
$stmt->execute();
<?php

class Cliente {

    public $nome;
    public $data_nascimento;
    public $cpf;
    public $telefone;
    public $email;

    public function __construct($nome, $data_nascimento, $cpf, $telefone, $email)
    {
        $this->nome = $nome;
        $this->data_nascimento = $data_nascimento;
        $this->cpf = $cpf;
        $this->telefone = $telefone;
        $this->email = $email;
    }

}
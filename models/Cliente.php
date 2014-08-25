<?php

require_once('interfaces/ClienteClassificacao.php');
require_once('interfaces/ClienteEndereco.php');

class Cliente implements ClienteClassificacao, ClienteEndereco {

    protected  $nome;
    protected  $data_nascimento;
    protected  $cpf;
    protected  $telefone;
    protected  $email;


    protected  $classificacao;
    protected  $enderecoCobranca;



    public function setEnderecoCobranca($enderecoCobranca)
    {
        $this->$enderecoCobranca = $enderecoCobranca;
        return $this;
    }
    public function getEnderecoCobranca()
    {
        return $this->enderecoCobranca;
    }
    public function hasEnderecoCobranca()
    {
        return $this->getEnderecoCobranca();
    }
    public function setClassificacao($classificacao)
    {
        $this->classificacao = $classificacao;
        return $this;
    }
    public function getClassificacao()
    {
        return $this->classificacao * 4;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $data_nascimento
     */
    public function setDataNascimento($data_nascimento)
    {
        $this->data_nascimento = $data_nascimento;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataNascimento()
    {
        return $this->data_nascimento;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }


}
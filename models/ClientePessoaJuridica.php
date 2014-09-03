<?php

require_once('interfaces/ClienteClassificacao.php');
require_once('interfaces/ClienteEndereco.php');

class ClientePessoaJuridica implements ClienteClassificacao, ClienteEndereco
{
    protected $razaoSocial;
    protected $cnpj;
    protected $telefoneComercial;
    protected $enderecoEmpresa;

    private $classificacao;
    private $enderecoCobranca;


    public function getNome()
    {
        return $this->razaoSocial;
    }
    /**
     * @param mixed $enderecoCobranca
     */
    public function setEnderecoCobranca($endereco)
    {
        $this->enderecoCobranca = $endereco;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnderecoCobranca()
    {
        return $this->enderecoCobranca;
    }

    public function hasEnderecoCobranca()
    {
        if(isset($this->enderecoCobranca))
            return TRUE;
        else
            return FALSE;
    }

    /**
     * @param mixed $classificao
     */
    public function setClassificacao($classificao)
    {
        $this->classificacao = $classificao;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClassificacao()
    {
        return $this->classificacao * 4;
    }

    /**
     * @param mixed $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * @param mixed $enderecoEmpresa
     */
    public function setEnderecoEmpresa($enderecoEmpresa)
    {
        $this->enderecoEmpresa = $enderecoEmpresa;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnderecoEmpresa()
    {
        return $this->enderecoEmpresa;
    }

    /**
     * @param mixed $nomeEmpresa
     */
    public function setRazaoSocial($razaoSocial)
    {
        $this->razaoSocial = $razaoSocial;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRazaoSocial()
    {
        return $this->razaoSocial;
    }

    /**
     * @param mixed $telefoneComercial
     */
    public function setTelefoneComercial($telefoneComercial)
    {
        $this->telefoneComercial = $telefoneComercial;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelefoneComercial()
    {
        return $this->telefoneComercial;
    }



}
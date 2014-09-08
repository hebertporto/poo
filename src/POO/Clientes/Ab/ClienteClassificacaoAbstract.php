<?php

namespace POO\Clientes\Ab;


abstract class ClienteClassificacaoAbstract {

    protected  $classificacao;

    public final function setClassificacao($classificao)
    {
        $this->classificacao = $classificao;
        return $this;
    }
    public function getClassificacao()
    {
        return $this->classificacao * 4;
    }
} 
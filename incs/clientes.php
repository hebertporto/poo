<?php

require_once('models/Cliente.php');
require_once('models/ClientePessoaJuridica.php');

$cliente0 = new Cliente();
$cliente0->setNome('Arnaldo Ronaldo')
    ->setDataNascimento('25/09/2014')
    ->setCpf('556.656.988-88')
    ->setTelefone('(27)3536-5555')
    ->setEmail('meuemail@emaildoido.com')
    ->setClassificacao(2)
    ->setEnderecoCobranca('Av. Bla Bla, N 800');

$cliente1 = new Cliente();
$cliente1->setNome('Bernado José Ronaldo')
    ->setDataNascimento('25/09/2014')
    ->setCpf('556.656.988-88')
    ->setTelefone('(27)3536-5555')
    ->setEmail('meuemail@emaildoido.com')
    ->setClassificacao(3)
    ->setEnderecoCobranca('Av. Bla Bla, N 800');;

$cliente2 = new Cliente();
$cliente2->setNome('Zilmar Silva')
    ->setDataNascimento('25/09/2014')
    ->setCpf('556.656.988-88')
    ->setTelefone('(27)3536-5555')
    ->setEmail('meuemail@emaildoido.com')
    ->setClassificacao(5);

$cliente3 = new Cliente();
$cliente3->setNome('Denilson Silva')
    ->setDataNascimento('25/09/2014')
    ->setCpf('556.656.988-88')
    ->setTelefone('(27)3536-5555')
    ->setEmail('meuemail@emaildoido.com')
    ->setClassificacao(1);




function abc($obj1, $obj2) {
    if ($obj1->getNome() < $obj2->getNome()) {
        return -1;
    } elseif ($obj1->getNome() > $obj2->getNome()) {
        return +1;
    }
    return 0;
}

function cba($obj1, $obj2) {
    if ($obj1->getNome() < $obj2->getNome()) {
        return +1;
    } elseif ($obj1->getNome() > $obj2->getNome()) {
        return -1;
    }
    return 0;
}

$clientes = array();
$clientes = [$cliente0, $cliente1, $cliente2, $cliente3];

$select = 'padrao';
if(isset($_GET['ordem']) AND $_GET['ordem'] != '')
{
    if($_GET['ordem'] == 'crescente')
    {
        usort($clientes, 'abc');
        $select = 'crescente';
    }
    elseif ($_GET['ordem'] == 'decrescente')
    {
        usort($clientes, 'cba');
        $select = 'decrescente';
    }
}


?>

<div class="row">
    <div class="col-md-6">
        <h2>Clientes e Associados <small class="muted">Balance Team Company</small></h2>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-6">
        <h4><span class="glyphicon glyphicon-file"></span> Listagem de Clientes Cadastrados </h4>
            <?php
            foreach($clientes as $c)
            {
                echo "<div>";
                    echo "<span class='info text-success' style='font-size: 110%; margin-left: 20px'>" . $c->getNome() . " </span>";
                if($c instanceof ClientePessoaJuridica)
                    echo '<span class="text-danger text-uppercase">Pessoa Juridica</span>';
                else
                    echo '<span class="text-danger text-uppercase">Pessoa Fisica</span>';

                echo "<div style='margin-left:35px; display: none;'>" .
                        "<strong>Data de Nascimento: </strong>" . $c->getDataNascimento() . '<br >' .
                        "<strong>CPF: </strong>" . $c->getCpf() . '<br >' .
                        "<strong>Telefone: </strong>" . $c->getTelefone() . '<br >' .
                        "<strong>E-mail: </strong>" . $c->getEmail() . '<br >' .
                        "<strong>End.  Cobrança: </strong>". $c->getEnderecoCobranca() .
                        "<br ><div class='star' data-average='". $c->getClassificacao() . "' data-id='2'></div>".
                      "</div>";
                echo "</div>";
                echo "<div class='clearfix'></div>";
            }
            ?>
    </div>
    <div class="col-md-6">
        <form method="get" action="" >
            <label for="ordem" >Ordenar por: </label>
            <select name="ordem" style="margin-top: 13px;">
                <option <?php if($select == "padrao") echo "selected"; ?> value="">Padrão</option>
                <option <?php if($select == "crescente") echo "selected"; ?> value="crescente">Crescente</option>
                <option <?php if($select == "decrescente") echo "selected"; ?> value="decrescente">Decrescente</option>
            </select>
            <button type="submit" >Enviar</button>
        </form>
    </div>
</div>
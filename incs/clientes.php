<?php
require_once('models/Cliente.php');

$cliente0 = new Cliente();
$cliente0->nome = 'José Ronaldo';
$cliente0->data_nascimento = '25/09/2014';
$cliente0->cpf = '556.656.988-88';
$cliente0->telefone = '(27)3536-5555';
$cliente0->email = 'meuemail@emaildoido.com';

$cliente1 = new Cliente();
$cliente1->nome = 'Pedro Silva';
$cliente1->data_nascimento = '25/09/2014';
$cliente1->cpf = '556.656.988-88';
$cliente1->telefone = '(27)3536-5555';
$cliente1->email = 'meuemail@emaildoido.com';

$cliente2 = new Cliente();
$cliente2->nome = 'Samuel Costa';
$cliente2->data_nascimento = '25/09/2014';
$cliente2->cpf = '556.656.988-88';
$cliente2->telefone = '(27)3536-5555';
$cliente2->email = 'meuemail@emaildoido.com';

$cliente3 = new Cliente();
$cliente3->nome = 'Renan Costa';
$cliente3->data_nascimento = '25/09/2014';
$cliente3->cpf = '556.656.988-88';
$cliente3->telefone = '(27)3536-5555';
$cliente3->email = 'meuemail@emaildoido.com';

$cliente4 = new Cliente();
$cliente4->nome = 'Priscila Souza';
$cliente4->data_nascimento = '25/09/2014';
$cliente4->cpf = '556.656.988-88';
$cliente4->telefone = '(27)3536-5555';
$cliente4->email = 'meuemail@emaildoido.com';

$cliente5 = new Cliente();
$cliente5->nome = 'Thyara Santos';
$cliente5->data_nascimento = '25/09/2014';
$cliente5->cpf = '556.656.988-88';
$cliente5->telefone = '(27)3536-5555';
$cliente5->email = 'meuemail@emaildoido.com';

$cliente6 = new Cliente();
$cliente6->nome = 'Wesley Code Education';
$cliente6->data_nascimento = '25/09/2014';
$cliente6->cpf = '556.656.988-88';
$cliente6->telefone = '(27)3536-5555';
$cliente6->email = 'meuemail@emaildoido.com';

$cliente7 = new Cliente();
$cliente7->nome = 'Filho do PHP';
$cliente7->data_nascimento = '25/09/2014';
$cliente7->cpf = '556.656.988-88';
$cliente7->telefone = '(27)3536-5555';
$cliente7->email = 'meuemail@emaildoido.com';

$cliente8 = new Cliente();
$cliente8->nome = 'Andrea Fortunado';
$cliente8->data_nascimento = '25/09/2014';
$cliente8->cpf = '556.656.988-88';
$cliente8->telefone = '(27)3536-5555';
$cliente8->email = 'meuemail@emaildoido.com';

$cliente9 = new Cliente();
$cliente9->nome = 'Camila Grande';
$cliente9->data_nascimento = '25/09/2014';
$cliente9->cpf = '556.656.988-88';
$cliente9->telefone = '(27)3536-5555';
$cliente9->email = 'meuemail@emaildoido.com';




function abc($obj1, $obj2) {
    if ($obj1->nome < $obj2->nome) {
        return -1;
    } elseif ($obj1->nome > $obj2->nome) {
        return +1;
    }
    return 0;
}

function cba($obj1, $obj2) {
    if ($obj1->nome < $obj2->nome) {
        return +1;
    } elseif ($obj1->nome > $obj2->nome) {
        return -1;
    }
    return 0;
}

$clientes = array();
$clientes = [$cliente0, $cliente1, $cliente2, $cliente3, $cliente4, $cliente5, $cliente6, $cliente7, $cliente8, $cliente9];

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
    <div class="col-md-4">
        <h4><span class="glyphicon glyphicon-file"></span> Listagem de Clientes Cadastrados </h4>
            <?php
            foreach($clientes as $c)
            {
                echo "<div>";
                    echo "<span class='info text-success' style='font-size: 110%; margin-left: 20px'>" . $c->nome . " </span>";
                    echo "<div style='margin-left:35px; display: none;'>" .
                        "<strong>Data de Nascimento: </strong>" . $c->data_nascimento . '<br >' .
                        "<strong>CPF: </strong>" . $c->cpf . '<br >' .
                        "<strong>Telefone: </strong>" . $c->telefone . '<br >' .
                        "<strong>E-mail: </strong>" . $c->email . '<br >' .
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
<?php

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

$conn = new \POO\Database\ConnectDataBase('localhost', 'poo', 'root', '');
$db = $conn->connectDb();

$ClienteFixture = new \POO\Fixtures\Cliente\ClienteFixture($db);

$ClienteFixture->createTables();
$ClienteFixture->truncateTables();
$ClienteFixture->insert();

$stmt = $db->prepare("SELECT * FROM pessoafisica");
$stmt->execute();

$pessoaFisica = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt = $db->prepare("SELECT * FROM pessoajuridica");
$stmt->execute();

$pessoaJuridica = $stmt->fetchAll(PDO::FETCH_ASSOC);

$clientes = array();

foreach ($pessoaFisica as $p)
{
    $clientes[] = $p;
}

foreach ($pessoaJuridica as $p)
{
    $clientes[] = $p;
}

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
                if(!isset($c['nome']))
                    $c['nome'] = $c['razaoSocial'];

                echo "<div>";
                    echo "<span class='info text-success' style='font-size: 110%; margin-left: 20px'>" . $c['nome'] . " </span>";
                if(isset($c['razaoSocial']))
                {
                    echo '<span class="text-danger text-uppercase">Pessoa Juridica</span>';
                    echo"<div style='margin-left:35px; display: none;'>" .
                        "<strong>CNPJ: </strong>" . $c['cnpj'] . '<br >' .
                        "<strong>Telefone: </strong>" . $c['telefoneComercial'] . '<br >' .
                        "<strong>Endereço: </strong> " . $c['enderecoEmpresa'];
                    if($c['enderecoCobranca'])
                         echo"<br ><strong>End.  Cobrança: </strong>". $c['enderecoCobranca'];

                     echo "<br ><div class='star' data-average='". $c['classificacao'] . "' data-id='2'></div>".
                          "</div>";
                }
                else
                {
                    echo '<span class="text-danger text-uppercase">Pessoa Fisica</span>'.
                            "<div style='margin-left:35px; display: none;'>" .
                            "<strong>Data de Nascimento: </strong>" . $c['data_nascimento'] . '<br >' .
                            "<strong>CPF: </strong>" . $c['cpf'] . '<br >' .
                            "<strong>Telefone: </strong>" . $c['telefone'] . '<br >' .
                            "<strong>E-mail: </strong>" . $c['email'];
                    if($c['enderecoCobranca'])
                        echo"<br ><strong>End.  Cobrança: </strong>". $c['enderecoCobranca'];

                     echo "<br ><div class='star' data-average='". $c['classificacao']. "' data-id='2'></div>".
                          "</div>";
                 }
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
<?php
require_once('models/Cliente.php');

$clientes = array();
for($i = 0; $i < 10; $i++)
{
    $clientes[$i] = new Cliente();
    $clientes[$i]->nome = 'Robervaldo Ladrão de Chocolate';
    $clientes[$i]->data_nascimento = '20/00/2001';
    $clientes[$i]->cpf = '666.666.555-88';
    $clientes[$i]->telefone = '(27) 3000-8899';
    $clientes[$i]->email = 'roberval@salveseuchocolate.com';


    echo  $clientes[$i]->nome . $i . '<br />';
}
?>

<div class="row">
    <div class="col-md-12">
        <h2>Clientes e Associados <small class="muted">Balance Team Company</small></h2>
    </div>
    <div class="col-md-4">
        <h4><span class="glyphicon glyphicon-search"></span> Listagem de Clientes Cadastrados</h4>
    </div>
</div>


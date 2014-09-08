<?php
/**
 * Created by PhpStorm.
 * User: desk
 * Date: 08/09/14
 * Time: 14:31
 */

namespace POO\Fixtures\Cliente;

use \POO\Clientes\Ab\ClienteAbstract as Cliente;
use \POO\Clientes\PessoaFisica as PessoaFisica;

class FillClienteFixture {

    private $db;
    protected $cliente;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function persist(Cliente $cliente)
    {
        $this->cliente = $cliente;
        try {
                $this->db->beginTransaction();

                if($this->cliente instanceof PessoaFisica){
                    $stmt = $this->db->prepare("INSERT INTO pessoafisica (nome, data_nascimento, cpf, telefone, email, endereco, enderecoCobranca, classificacao)
                                                VALUES (:nome, :data_nascimento, :cpf, :telefone, :email, :endereco, :enderecoCobranca, :classificacao)");
                    $stmt->bindValue(':nome', $cliente->getNome());
                    $stmt->bindValue(':data_nascimento', $cliente->getDataNascimento());
                    $stmt->bindValue(':cpf', $cliente->getCpf());
                    $stmt->bindValue(':telefone', $cliente->getTelefone());
                    $stmt->bindValue(':email', $cliente->getEmail());
                    $stmt->bindValue(':endereco', $cliente->getEndereco());
                    $stmt->bindValue(':enderecoCobranca', $cliente->getEnderecoCobranca());
                    $stmt->bindValue(':classificacao', $cliente->getClassificacao());
                    $stmt->execute();
                }
                else
                {
                    $stmt = $this->db->prepare("INSERT INTO pessoajuridica (razaoSocial, cnpj, telefoneComercial, enderecoEmpresa, enderecoCobranca, classificacao)
                                                VALUES (:razaoSocial, :cnpj, :telefoneComercial, :enderecoEmpresa, :enderecoCobranca, :classificacao)");
                    $stmt->bindValue(':razaoSocial', $cliente->getRazaoSocial());
                    $stmt->bindValue(':cnpj', $cliente->getCnpj());
                    $stmt->bindValue(':telefoneComercial', $cliente->getTelefoneComercial());
                    $stmt->bindValue(':enderecoEmpresa', $cliente->getEnderecoEmpresa());
                    $stmt->bindValue(':enderecoCobranca', $cliente->getEnderecoCobranca());
                    $stmt->bindValue(':classificacao', $cliente->getClassificacao());
                    $stmt->execute();
                }
            }
        catch(\PDOException $e){
            die('Erro: '. $e->getMessage());
        }
    }

    public function flush()
    {
        try {
            $this->db->commit();
        } catch (\PDOException $e) {
            die("Erro: " . $e->getMessage());
        }

        return true;
    }
} 
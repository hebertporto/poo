<?php

namespace POO\Fixtures\Cliente;


class ClienteFixture {

    private $db;

    protected $clientes;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function truncateTables()
    {
        try {
            $sql = "TRUNCATE TABLE pessoafisica";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();

            $sql = "TRUNCATE TABLE pessoajuridica";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
        }
        catch(\PDOException $e){
            die('Erro: '. $e->getMessage());
        }
    }

    public function createTables()
    {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS `pessoafisica` (
                      `id` int(10) NOT NULL AUTO_INCREMENT,
                      `nome` varchar(64) NOT NULL,
                      `data_nascimento` varchar(15) NOT NULL,
                      `cpf` varchar(15) NOT NULL,
                      `telefone` varchar(35) NOT NULL,
                      `email` varchar(64) NOT NULL,
                      `endereco` varchar(128) DEFAULT NULL,
                      `enderecoCobranca` varchar(128) DEFAULT NULL,
                      `classificacao` int(1) NOT NULL,
                      PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;";
            $stmt = $this->db->prepare($sql);
            $stmt->execute();

            $sql = "CREATE TABLE IF NOT EXISTS `pessoajuridica` (
                      `id` int(10) NOT NULL AUTO_INCREMENT,
                      `razaoSocial` varchar(256) NOT NULL,
                      `cnpj` varchar(32) NOT NULL,
                      `telefoneComercial` varchar(25) NOT NULL,
                      `enderecoEmpresa` varchar(128) NOT NULL,
                      `enderecoCobranca` varchar(128) DEFAULT NULL,
                      `classificacao` int(1) NOT NULL,
                      PRIMARY KEY (`id`)
                    ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;";

            $stmt = $this->db->prepare($sql);
            $stmt->execute();
        }
        catch(\PDOException $e){
            die('Erro: '. $e->getMessage());
        }

    }

    public function insert()
    {
        $fillClienteFixture = new FillClienteFixture($this->db);

        $cliente = new \POO\Clientes\PessoaFisica();
        $cliente->setNome('Arnaldo Ronaldo')
            ->setDataNascimento('25/09/2014')
            ->setCpf('556.656.988-88')
            ->setTelefone('(27)3536-5555')
            ->setEmail('meuemail@emaildoido.com')
            ->setClassificacao(2)
            ->setEndereco('Rua das Programadores...');

        $fillClienteFixture->persist($cliente);
        $fillClienteFixture->flush();

        $cliente = new \POO\Clientes\PessoaFisica();
        $cliente->setNome('Zezerus Jose Ronaldo')
            ->setDataNascimento('25/09/2014')
            ->setCpf('556.656.988-88')
            ->setTelefone('(27)3536-5555')
            ->setEmail('meuemail@emaildoido.com')
            ->setClassificacao(3)
            ->setEndereco('Rua  Code Ocupadas...')
            ->setEnderecoCobranca('Av. Bla Bla, N 3333');;

        $fillClienteFixture->persist($cliente);
        $fillClienteFixture->flush();

        $cliente = new \POO\Clientes\PessoaFisica();
        $cliente->setNome('Carlos Martins')
            ->setDataNascimento('25/09/2014')
            ->setCpf('556.656.988-88')
            ->setTelefone('(27)3536-5555')
            ->setEmail('meuemail@emaildoido.com')
            ->setClassificacao(1)
            ->setEndereco('Passarela Carros...');

        $fillClienteFixture->persist($cliente);
        $fillClienteFixture->flush();

        $cliente = new \POO\Clientes\PessoaFisica();
        $cliente->setNome('Tiago Simples')
            ->setDataNascimento('25/09/2014')
            ->setCpf('556.656.988-88')
            ->setTelefone('(27)3536-5555')
            ->setEmail('meuemail@emaildoido.com')
            ->setClassificacao(5)
            ->setEndereco('Av. Pessoas Ocupadas...')
            ->setEnderecoCobranca('Viela. Correria, N 2563');;

        $fillClienteFixture->persist($cliente);
        $fillClienteFixture->flush();

        $cliente = new \POO\Clientes\PessoaJuridica();
        $cliente->setCnpj('323.565.0002-56')
            ->setRazaoSocial('Imobiliaria  LTDA')
            ->setEnderecoEmpresa('Av. Samba do Povo')
            ->setTelefoneComercial('27-8898-5555')
            ->setClassificacao(2);

        $fillClienteFixture->persist($cliente);
        $fillClienteFixture->flush();

        $cliente = new \POO\Clientes\PessoaJuridica();
        $cliente->setCnpj('323.565.0002-56')
            ->setRazaoSocial('Padaria do Ze LTDA')
            ->setEnderecoEmpresa('Av. Navegacao')
            ->setTelefoneComercial('27-8898-5555')
            ->setClassificacao(5)->setEnderecoCobranca('Rua das Cartas, 500');

        $fillClienteFixture->persist($cliente);
        $fillClienteFixture->flush();

        $cliente = new \POO\Clientes\PessoaJuridica();
        $cliente->setCnpj('323.565.0002-56')
            ->setRazaoSocial('Shopping  LTDA')
            ->setEnderecoEmpresa('Av. Show ')
            ->setTelefoneComercial('27-8898-5555')
            ->setClassificacao(3);

        $fillClienteFixture->persist($cliente);
        $fillClienteFixture->flush();

        $cliente = new \POO\Clientes\PessoaJuridica();
        $cliente->setCnpj('323.565.0002-56')
            ->setRazaoSocial('Lan House da Maria')
            ->setEnderecoEmpresa('Av. Negocio')
            ->setTelefoneComercial('27-8898-5555')
            ->setClassificacao(1)->setEnderecoCobranca('Rua das Cartas, 500');

        $fillClienteFixture->persist($cliente);
        $fillClienteFixture->flush();
    }
}
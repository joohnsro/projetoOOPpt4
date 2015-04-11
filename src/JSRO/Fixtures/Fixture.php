<?php

namespace JSRO\Fixtures;

use JSRO\ClienteAbstract;
use JSRO\Clientes\ClienteFisico;
use JSRO\Clientes\ClienteJuridico;

class Fixture
{

    public $pdo;

    public function __construct()
    {

        try {

            $config = array("host" => "localhost", "dbname" => "poo", "user" => "root", "password" => "");
            $this->pdo = new \PDO("mysql:host={$config['host']}; dbname={$config['dbname']}", $config['user'], $config['password']);
            return $this->pdo;

        }
        catch(\PDOException $e) {

            echo $e->getMessage() . '\n';
            echo $e->getTraceAsString() . '\n';
            return false;

        }

    }

    public function persist(ClienteAbstract $cliente)
    {

        // Insere clientes de teste a tabela clientes
        $query = "Insert into clientes (nome, documento, endereco, enderecoCobranca, email, classificacao, tipo)
                                values (:nome, :documento, :endereco, :enderecoCobranca, :email, :classificacao, :tipo)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue("nome", $cliente->getNome());

        if($cliente->getTipo() == "Físico"){
            $stmt->bindValue("documento", $cliente->getCpf());
        } else {
            $stmt->bindValue("documento", $cliente->getCnpj());
        }

        $stmt->bindValue("endereco", $cliente->getEndereco());
        $stmt->bindValue("enderecoCobranca", $cliente->getEnderecoCobranca());
        $stmt->bindValue("email", $cliente->getEmail());
        $stmt->bindValue("classificacao", $cliente->getClassificacao());
        $stmt->bindValue("tipo", $cliente->getTipo());
        return $stmt->execute();

    }

    public function persistTable()
    {

        // Apaga tabela clientes se existir
        $query = "DROP TABLE IF EXISTS clientes;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        // Cria tabela clientes
        $query = "CREATE TABLE clientes (
                id INT (11) AUTO_INCREMENT PRIMARY KEY,
                nome VARCHAR (255) NOT NULL,
                email VARCHAR (255) NOT NULL,
                documento VARCHAR (255) NOT NULL,
                endereco VARCHAR (255) NOT NULL,
                enderecoCobranca VARCHAR (255) NULL,
                classificacao INT (2) NOT NULL,
                tipo VARCHAR (255) NOT NULL);
                ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

    }

    public function flush()
    {

        $this->persistTable();

        $cliente1 = new ClienteFisico();
        $cliente2 = new ClienteFisico();
        $cliente3 = new ClienteJuridico();
        $cliente4 = new ClienteJuridico();
        $cliente5 = new ClienteJuridico();
        $cliente6 = new ClienteFisico();
        $cliente7 = new ClienteFisico();
        $cliente8 = new ClienteFisico();
        $cliente9 = new ClienteJuridico();
        $cliente10 = new ClienteFisico();
        $clientes = array($cliente1, $cliente2, $cliente3, $cliente4, $cliente5, $cliente6, $cliente7, $cliente8, $cliente9, $cliente10);

        $clientes[0]
            ->setNome("Jonathan")
            ->setCpf("123.456.678-90")
            ->setEndereco("Rua Tal, 1")
            ->setEnderecoCobranca("")
            ->setEmail("jonathan@jonathan.com")
            ->setClassificacao(5)
            ->setTipo("Físico")
        ;

        $clientes[1]
            ->setNome("João")
            ->setCpf("123.123.112-90")
            ->setEndereco("Rua Tal, 2")
            ->setEnderecoCobranca("")
            ->setEmail("joao@joao.com")
            ->setClassificacao(4)
            ->setTipo("Físico")
        ;

        $clientes[2]
            ->setNome("Maria")
            ->setCnpj("124.236.578-90")
            ->setEndereco("Rua Tal, 3")
            ->setEnderecoCobranca("")
            ->setEmail("maria@maria.com")
            ->setClassificacao(2)
            ->setTipo("Jurídico")
        ;
        $clientes[3]
            ->setNome("José")
            ->setCnpj("127.416.618-90")
            ->setEndereco("Rua Tal, 4")
            ->setEnderecoCobranca("")
            ->setEmail("jose@jose.com")
            ->setClassificacao(4)
            ->setTipo("Jurídico")
        ;

        $clientes[4]
            ->setNome("Fátima")
            ->setCnpj("128.126.678-90")
            ->setEndereco("Rua Tal, 5")
            ->setEnderecoCobranca("")
            ->setEmail("fatima@fatima.com")
            ->setClassificacao(1)
            ->setTipo("Jurídico")
        ;
        $clientes[5]
            ->setNome("Romualdo")
            ->setCpf("125.096.875-90")
            ->setEndereco("Rua Tal, 6")
            ->setEnderecoCobranca("")
            ->setEmail("romualdo@romualdo.com")
            ->setClassificacao(5)
            ->setTipo("Físico")
        ;
        $clientes[6]
            ->setNome("Josefina")
            ->setCpf("120.356.474-90")
            ->setEndereco("Rua Tal, 7")
            ->setEnderecoCobranca("Rua do Pagamento, 12")
            ->setEmail("josefina@josefina.com")
            ->setClassificacao(3)
            ->setTipo("Físico")
        ;
        $clientes[7]
            ->setNome("Leonardo")
            ->setCpf("121.415.078-90")
            ->setEndereco("Rua Tal, 8")
            ->setEnderecoCobranca("")
            ->setEmail("leonardo@leonardo.com")
            ->setClassificacao(2)
            ->setTipo("Físico")
        ;
        $clientes[8]
            ->setNome("Teresa")
            ->setCnpj("125.472.572-90")
            ->setEndereco("Rua Tal, 9")
            ->setEnderecoCobranca("Rua do Pagamento, 12")
            ->setEmail("teresa@teresa.com")
            ->setClassificacao(4)
            ->setTipo("Jurídico")
        ;
        $clientes[9]
            ->setNome("Renato")
            ->setCpf("128.412.671-90")
            ->setEndereco("Rua Tal, 10")
            ->setEnderecoCobranca("Rua do Pagamento, 12")
            ->setEmail("renato@renato.com")
            ->setClassificacao(1)
            ->setTipo("Físico")
        ;

        foreach($clientes as $cliente){
            $this->persist($cliente);
        }

    }

} 
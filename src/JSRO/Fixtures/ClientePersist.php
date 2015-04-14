<?php

namespace JSRO\Fixtures;

use JSRO\ClienteAbstract;

class ClientePersist
{

    private $data = array();
    private $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function persist(ClienteAbstract $cliente)
    {
        $this->data[] = $cliente;
    }

    public function flush()
    {

        foreach($this->data as $cliente)
        {

            $sql = "Insert into clientes (nome, documento, email, endereco, enderecoCobranca, classificacao, tipo)
                    values (:nome, :documento, :email, :endereco, :enderecoCobranca, :classificacao, :tipo)";

            $stmt = $this->pdo->prepare($sql);

            $documento = ($cliente->getTipo() == "Físico") ? $cliente->getCpf() : $cliente->getCnpj();

            $stmt->bindValue("nome", $cliente->getNome());
            $stmt->bindValue("documento", $documento);
            $stmt->bindValue("email", $cliente->getEmail());
            $stmt->bindValue("endereco", $cliente->getEndereco());
            $stmt->bindValue("enderecoCobranca", $cliente->getEnderecoCobranca());
            $stmt->bindValue("classificacao", $cliente->getClassificacao());
            $stmt->bindValue("tipo", $cliente->getTipo());

            $stmt->execute();

        }

    }

} 
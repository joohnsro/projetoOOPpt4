<?php

namespace JSRO\Clientes;

use JSRO\Interfaces\ClassificacaoInterface;
use JSRO\Interfaces\EnderecoCobrancaInterface;

abstract class ClienteAbstract implements ClassificacaoInterface, EnderecoCobrancaInterface
{

    protected $nome;
    protected $endereco;
    protected $email;
    protected $classificacao;
    protected $tipo;
    protected $enderecoCobranca;

    public function setEnderecoCobranca($dado)
    {
        $this->enderecoCobranca = $dado;
        return $this;
    }


    public function getEnderecoCobranca()
    {
        return $this->enderecoCobranca;
    }


    public function setTipo($dado)
    {
        $this->tipo = $dado;
        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setClassificacao($dado)
    {
        $this->classificacao = $dado;
        return $this;
    }

    public function getClassificacao()
    {
        return $this->classificacao;
    }

    public function setEmail($dado)
    {
        $this->email = $dado;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEndereco($dado)
    {
        $this->endereco = $dado;
        return $this;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setNome($dado)
    {
        $this->nome = $dado;
        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

}
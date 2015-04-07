<?php

require_once "Cliente.php";
require_once "ClienteFisicoInterface.php";
require_once "EnderecoCobrancaInterface.php";

class ClienteFisico extends Cliente implements ClienteFisicoInterface, EnderecoCobrancaInterface
{

    protected $cpf;
    protected $enderecoCobranca;

    /**
     * @param mixed $enderecoCobranca
     */
    public function setEnderecoCobrança($enderecoCobranca)
    {
        $this->enderecoCobranca = $enderecoCobranca;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEnderecoCobranca()
    {
        return $this->enderecoCobranca;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

}
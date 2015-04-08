<?php

require_once "Cliente.php";
require_once "Interfaces/ClienteJuridicoInterface.php";

class ClienteJuridico extends Cliente implements ClienteJuridicoInterface
{

    protected $cnpj;

    /**
     * @param mixed $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

}
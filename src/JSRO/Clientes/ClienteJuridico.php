<?php

namespace JSRO\Clientes;

use JSRO\ClienteAbstract;
use JSRO\Interfaces\ClienteJuridicoInterface;

class ClienteJuridico extends ClienteAbstract implements ClienteJuridicoInterface
{

    protected $cnpj;

    public function setCnpj($dado)
    {
        $this->cnpj = $dado;
        return $this;
    }

    public function getCnpj()
    {
        return $this->cnpj;
    }

}
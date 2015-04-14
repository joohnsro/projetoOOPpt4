<?php

namespace JSRO\Clientes;

use JSRO\Interfaces\ClienteFisicoInterface;

class ClienteFisico extends ClienteAbstract implements ClienteFisicoInterface
{

    protected $cpf;

    public function setCpf($data)
    {
        $this->cpf = $data;
        return $this;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

}
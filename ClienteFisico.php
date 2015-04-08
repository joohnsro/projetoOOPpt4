<?php

require_once "Cliente.php";
require_once "src/JSRO/Interfaces/ClienteFisicoInterface.php";

class ClienteFisico extends Cliente implements ClienteFisicoInterface
{

    protected $cpf;

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
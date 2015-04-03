<?php

class Cliente
{
    public $nome;
    public $cpf;
    public $endereco;
    public $email;

    public function __construct($nome, $cpf, $endereco, $email)
    {

        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->endereco = $endereco;
        $this->email = $email;

    }

}
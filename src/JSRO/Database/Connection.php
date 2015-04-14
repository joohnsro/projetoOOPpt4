<?php

namespace JSRO\Database;


class Connection
{

    private $pdo;

    private $config = array(
        "host" => "localhost",
        "dbname" => "poo",
        "user" => "root",
        "password" => ""
    );

    public function __construct()
    {

        try {

            $this->pdo = new \PDO("mysql:host={$this->config["host"]};dbname={$this->config["dbname"]}", $this->config["user"], $this->config["password"]);
            return $this;

        } catch (\PDOException $e){

            return $e->getMessage() . "\n" . $e->getTraceAsString();

        }

    }

    public function getPdo()
    {
        return $this->pdo;
    }

} 
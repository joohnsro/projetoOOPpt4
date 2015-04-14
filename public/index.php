<?php

require_once __DIR__ . "/../autoload.php";

$con = new \JSRO\Database\Connection();

if(isset($_GET["order"]) && $_GET["order"] == "desc"){
    $query = "Select * from clientes order by id desc";
} else {
    $query = "Select * from clientes order by id asc";
}

$stmt = $con->getPdo()->prepare($query);
$stmt->execute();

$clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once __DIR__ . "/../src/JSRO/Views/index.php";
?>
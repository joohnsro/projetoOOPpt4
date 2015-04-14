<?php

define('CLASS_DIR', '../../');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

$con = new JSRO\Connection();

$dp = new JSRO\Fixtures\ClientePersist($con->getPdo());

$cliente1 = new JSRO\Clientes\ClienteFisico();
$cliente2 = new JSRO\Clientes\ClienteFisico();
$cliente3 = new JSRO\Clientes\ClienteJuridico();
$cliente4 = new JSRO\Clientes\ClienteJuridico();
$cliente5 = new JSRO\Clientes\ClienteJuridico();
$cliente6 = new JSRO\Clientes\ClienteFisico();
$cliente7 = new JSRO\Clientes\ClienteFisico();
$cliente8 = new JSRO\Clientes\ClienteFisico();
$cliente9 = new JSRO\Clientes\ClienteJuridico();
$cliente10 = new JSRO\Clientes\ClienteFisico();

$cliente1
    ->setNome("Jonathan")
    ->setCpf("123.456.678-90")
    ->setEndereco("Rua Tal, 1")
    ->setEnderecoCobranca("")
    ->setEmail("jonathan@jonathan.com")
    ->setClassificacao(5)
    ->setTipo("Físico")
;

$cliente2
    ->setNome("João")
    ->setCpf("123.123.112-90")
    ->setEndereco("Rua Tal, 2")
    ->setEnderecoCobranca("")
    ->setEmail("joao@joao.com")
    ->setClassificacao(4)
    ->setTipo("Físico")
;

$cliente3
    ->setNome("Maria")
    ->setCnpj("124.236.578-90")
    ->setEndereco("Rua Tal, 3")
    ->setEnderecoCobranca("")
    ->setEmail("maria@maria.com")
    ->setClassificacao(2)
    ->setTipo("Jurídico")
;
$cliente4
    ->setNome("José")
    ->setCnpj("127.416.618-90")
    ->setEndereco("Rua Tal, 4")
    ->setEnderecoCobranca("")
    ->setEmail("jose@jose.com")
    ->setClassificacao(4)
    ->setTipo("Jurídico")
;

$cliente5
    ->setNome("Fátima")
    ->setCnpj("128.126.678-90")
    ->setEndereco("Rua Tal, 5")
    ->setEnderecoCobranca("")
    ->setEmail("fatima@fatima.com")
    ->setClassificacao(1)
    ->setTipo("Jurídico")
;
$cliente6
    ->setNome("Romualdo")
    ->setCpf("125.096.875-90")
    ->setEndereco("Rua Tal, 6")
    ->setEnderecoCobranca("")
    ->setEmail("romualdo@romualdo.com")
    ->setClassificacao(5)
    ->setTipo("Físico")
;
$cliente7
    ->setNome("Josefina")
    ->setCpf("120.356.474-90")
    ->setEndereco("Rua Tal, 7")
    ->setEnderecoCobranca("Rua do Pagamento, 12")
    ->setEmail("josefina@josefina.com")
    ->setClassificacao(3)
    ->setTipo("Físico")
;
$cliente8
    ->setNome("Leonardo")
    ->setCpf("121.415.078-90")
    ->setEndereco("Rua Tal, 8")
    ->setEnderecoCobranca("")
    ->setEmail("leonardo@leonardo.com")
    ->setClassificacao(2)
    ->setTipo("Físico")
;
$cliente9
    ->setNome("Teresa")
    ->setCnpj("125.472.572-90")
    ->setEndereco("Rua Tal, 9")
    ->setEnderecoCobranca("Rua do Pagamento, 12")
    ->setEmail("teresa@teresa.com")
    ->setClassificacao(4)
    ->setTipo("Jurídico")
;
$cliente10
    ->setNome("Renato")
    ->setCpf("128.412.671-90")
    ->setEndereco("Rua Tal, 10")
    ->setEnderecoCobranca("Rua do Pagamento, 12")
    ->setEmail("renato@renato.com")
    ->setClassificacao(1)
    ->setTipo("Físico")
;

$dp->persist($cliente1);
$dp->persist($cliente2);
$dp->persist($cliente3);
$dp->persist($cliente4);
$dp->persist($cliente5);
$dp->persist($cliente6);
$dp->persist($cliente7);
$dp->persist($cliente8);
$dp->persist($cliente9);
$dp->persist($cliente10);

$dp->flush();
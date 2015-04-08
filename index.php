<?php
require_once "ClienteFisico.php";
require_once "ClienteJuridico.php";
require_once "FormClienteFisico.php";
require_once "FormClienteJuridico.php";
require_once "FormEnderecoCobranca.php";

$cliente1 = new ClienteFisico();
$cliente2 = new ClienteFisico();
$cliente3 = new ClienteJuridico();
$cliente4 = new ClienteJuridico();
$cliente5 = new ClienteJuridico();
$cliente6 = new ClienteFisico();
$cliente7 = new ClienteFisico();
$cliente8 = new ClienteFisico();
$cliente9 = new ClienteJuridico();
$cliente10 = new ClienteFisico();
$clientes = array($cliente1, $cliente2, $cliente3, $cliente4, $cliente5, $cliente6, $cliente7, $cliente8, $cliente9, $cliente10);


$clientes[0]
    ->setNome("Jonathan")
    ->setCpf("123.456.678-90")
    ->setEndereco("Rua Tal, 1")
    ->setEmail("jonathan@jonathan.com")
    ->setClassificacao(5)
    ->setTipo("Físico")
;

$clientes[1]
    ->setNome("João")
    ->setCpf("123.123.112-90")
    ->setEndereco("Rua Tal, 2")
    ->setEmail("joao@joao.com")
    ->setClassificacao(4)
    ->setTipo("Físico")
;

$clientes[2]
    ->setNome("Maria")
    ->setCnpj("124.236.578-90")
    ->setEndereco("Rua Tal, 3")
    ->setEmail("maria@maria.com")
    ->setClassificacao(2)
    ->setTipo("Jurídico")
;
$clientes[3]
    ->setNome("José")
    ->setCnpj("127.416.618-90")
    ->setEndereco("Rua Tal, 4")
    ->setEmail("jose@jose.com")
    ->setClassificacao(4)
    ->setTipo("Jurídico")
;

$clientes[4]
    ->setNome("Fátima")
    ->setCnpj("128.126.678-90")
    ->setEndereco("Rua Tal, 5")
    ->setEmail("fatima@fatima.com")
    ->setClassificacao(1)
    ->setTipo("Jurídico")
;
$clientes[5]
    ->setNome("Romualdo")
    ->setCpf("125.096.875-90")
    ->setEndereco("Rua Tal, 6")
    ->setEmail("romualdo@romualdo.com")
    ->setClassificacao(5)
    ->setTipo("Físico")
;
$clientes[6]
    ->setNome("Josefina")
    ->setCpf("120.356.474-90")
    ->setEndereco("Rua Tal, 7")
    ->setEmail("josefina@josefina.com")
    ->setClassificacao(3)
    ->setTipo("Físico")
;
$clientes[7]
    ->setNome("Leonardo")
    ->setCpf("121.415.078-90")
    ->setEndereco("Rua Tal, 8")
    ->setEmail("leonardo@leonardo.com")
    ->setClassificacao(2)
    ->setTipo("Físico")
;
$clientes[8]
    ->setNome("Teresa")
    ->setCnpj("125.472.572-90")
    ->setEndereco("Rua Tal, 9")
    ->setEmail("teresa@teresa.com")
    ->setClassificacao(4)
    ->setTipo("Jurídico")
;
$clientes[9]
    ->setNome("Renato")
    ->setCpf("128.412.671-90")
    ->setEndereco("Rua Tal, 10")
    ->setEmail("renato@renato.com")
    ->setClassificacao(1)
    ->setTipo("Físico")
;

if(isset($_GET["order"]) && $_GET["order"] == "desc"){
    $clientes = array_reverse($clientes, true);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Projeto OOP - Code Education</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">

    <div class="row">
        <div class="col-md-offset-1 col-md-10 col-xs-12">

            <div class="jumbotron">
                <h1>Lista de clientes</h1>
            </div>

            <table class="table table-bordered">
                <thead>
                    <th colspan="3">
                        <a href="?order=<?php echo (isset($_GET["order"]) && $_GET["order"] == "desc") ? "asc" : "desc"; ?>">
                            Ordenar <span class="glyphicon glyphicon-arrow-<?php echo (isset($_GET["order"]) && $_GET["order"] == "desc") ? "up" : "down"; ?>"></span>
                        </a>
                    </th>
                </thead>
                <?php
                foreach($clientes as $cliente){
                    $num = (isset($num)) ? $num += 1 : $num = 1;
                ?>
                    <tr id="cliente<?php echo $num; ?>" class="cliente">
                        <td colspan="2">
                            <?php echo $cliente->getNome(); ?>
                        </td>
                        <td>
                            <?php echo ($cliente->getTipo() == "Físico") ? "Pessoa Física" : "Pessoa Jurídica"; ?>
                        </td>
                    </tr>
                    <tr id="clienteData" class="cliente<?php echo $num; ?> hide">
                        <td colspan="3">
                            <?php
                            if($cliente->getTipo() == "Físico"){

                                $arg = [
                                    "nome" => $cliente->getNome(),
                                    "cpf" => $cliente->getCpf(),
                                    "endereco" => $cliente->getEndereco(),
                                    "email" =>  $cliente->getEmail(),
                                    "classificacao" =>  $cliente->getClassificacao(),
                                    "tipo" => $cliente->getTipo()
                                ];

                                $form = new FormClienteFisico();
                                $form->formUpdateClienteFisico($arg);

                            } else {

                                $arg = [
                                    "nome" => $cliente->getNome(),
                                    "cnpj" => $cliente->getCnpj(),
                                    "endereco" => $cliente->getEndereco(),
                                    "email" =>  $cliente->getEmail(),
                                    "classificacao" =>  $cliente->getClassificacao(),
                                    "tipo" => $cliente->getTipo()
                                ];

                                $form = new FormClienteJuridico();
                                $form->formUpdateClienteJuridico($arg);

                            }
                            echo '<hr style="border:1px dashed #999999;" />';
                            $form = new FormEnderecoCobranca();
                            $form->formInsertEnderecoCobranca();
                            ?>
                        </td>
                    </tr>
                <?php
                }
                ?>

            </table>

            <hr>



        </div>
    </div>

    <hr>
    <p class="text-center">
        Todos os direitos reservados -
        <?php
        date_default_timezone_set("America/Sao_Paulo");
        echo date("Y"); ?>
    </p>

</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $(".cliente").click(function(){

            var id = $(this).attr("id");

            if( $(this).hasClass("hover") ){

                $(this).removeClass("hover");
                $("#clienteData." + id).removeClass("hover").addClass("hide");

            } else {

                if( $(".cliente.hover").length > 0 ){

                    $(".cliente.hover").removeClass("hover");
                    $("#clienteData.hover").removeClass("hover").addClass("hide");

                }

                $(this).addClass("hover");
                $("#clienteData." + id).removeClass("hide").addClass("hover");
            }

        });
    });
</script>
</body>
</html>
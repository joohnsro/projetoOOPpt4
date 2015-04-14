<?php

define('CLASS_DIR', '../src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();

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

                $con = new \JSRO\Connection();

                if(isset($_GET["order"]) && $_GET["order"] == "desc"){
                    $query = "Select * from clientes order by id desc";
                } else {
                    $query = "Select * from clientes order by id asc";
                }

                $stmt = $con->getPdo()->prepare($query);
                $stmt->execute();

                $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach($clientes as $cliente){

                    $num = (isset($num)) ? $num += 1 : $num = 1;
                ?>
                    <tr id="cliente<?php echo $num; ?>" class="cliente">
                        <td colspan="2">
                            <?php echo $cliente["nome"]; ?>
                        </td>
                        <td>
                            <?php echo ($cliente["tipo"] == "Físico") ? "Pessoa Física" : "Pessoa Jurídica"; ?>
                        </td>
                    </tr>
                    <tr id="clienteData" class="cliente<?php echo $num; ?> hide">
                        <td colspan="3">

                            <?php
                            if($cliente["tipo"] == "Físico"){

                                $arg = [
                                    "nome" => $cliente["nome"],
                                    "cpf" => $cliente["documento"],
                                    "endereco" => $cliente["endereco"],
                                    "email" =>  $cliente["email"],
                                    "classificacao" =>  $cliente["classificacao"],
                                    "tipo" => $cliente["tipo"]
                                ];

                                $form = new JSRO\Formularios\FormClienteFisico();
                                $form->formUpdateClienteFisico($arg);

                            } else {

                                $arg = [
                                    "nome" => $cliente["nome"],
                                    "cnpj" => $cliente["documento"],
                                    "endereco" => $cliente["endereco"],
                                    "email" =>  $cliente["email"],
                                    "classificacao" =>  $cliente["classificacao"],
                                    "tipo" => $cliente["tipo"]
                                ];

                                $form = new JSRO\Formularios\FormClienteJuridico();
                                $form->formUpdateClienteJuridico($arg);

                            }

                            echo '<hr style="border:1px dashed #999999;" />';

                            $arg = [ "enderecoCobranca" => $cliente["enderecoCobranca"] ];
                            $form = new JSRO\Formularios\FormEnderecoCobranca();
                            $form->formUpdateEnderecoCobranca($arg);
                            ?>

                        </td>
                    </tr>
                <?php
                }
                ?>

            </table>

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
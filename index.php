<?php
require_once "Cliente.php";

$clientes[] = new Cliente("Jonathan", "123.456.678-90", "Rua Tal, 1", "jonathan@jonathan.com");
$clientes[] = new Cliente("João", "123.123.112-90", "Rua Tal, 2", "joao@joao.com");
$clientes[] = new Cliente("Maria", "124.236.578-90", "Rua Tal, 3", "maria@maria.com");
$clientes[] = new Cliente("José", "127.416.618-90", "Rua Tal, 4", "jose@jose.com");
$clientes[] = new Cliente("Fátima", "128.126.678-90", "Rua Tal, 5", "fatima@fatima.com");
$clientes[] = new Cliente("Romualdo", "125.096.875-90", "Rua Tal, 6", "romualdo@romualdo.com");
$clientes[] = new Cliente("Josefina", "120.356.474-90", "Rua Tal, 7", "josefina@josefina.com");
$clientes[] = new Cliente("Leonardo", "121.415.078-90", "Rua Tal, 8", "leonardo@leonardo.com");
$clientes[] = new Cliente("Teresa", "125.472.572-90", "Rua Tal, 9", "teresa@teresa.com");
$clientes[] = new Cliente("Renato", "128.412.671-90", "Rua Tal, 10", "renato@renato.com");

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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style type="text/css">
        body {
            padding-top: 30px;
        }
        .cliente {
            font-weight: bold;
            cursor: pointer;
        }
        .hide {
            display: none;
        }
        .cliente.hover {
            background-color: #efefef;
            border-top:2px solid #dddddd;
        }
        #clienteData.hover {
            background-color: #dddddd;
            border-bottom: 2px solid#cccccc;
        }
        th {
            background-color: #333333;
            color: #ffffff;
        }
        th a, th a:link, th a:hover {
            color: #ffffff;
        }
    </style>
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
                        <td colspan="3">
                            <?php echo $cliente->nome; ?>
                        </td>
                    </tr>
                    <tr id="clienteData" class="cliente<?php echo $num; ?> hide">
                        <td>
                            <strong>Cpf:</strong> <?php echo $cliente->cpf; ?>
                        </td>
                        <td>
                            <strong>Email:</strong> <?php echo $cliente->email; ?>
                        </td>
                        <td>
                            <strong>Endereço:</strong> <?php echo $cliente->endereco; ?>
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
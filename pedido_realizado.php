<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>

        <?php
            // Cargando las hojas de estilo
            require_once ("includes/includes_estilos.php");
        ?>

        <style>
            .cont-pedido-realizado{
                padding-top: 100px;
            }
            .pedido-realizado{
                background: #ced2d6;
                display:flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
            }
            .pedido-realizado i{
                font-size: 5rem;
                color: #0ef043;
            }
        </style>
    </head>
    <body>
        <?php
            require_once "partials/header.php";
        ?>

        <!-- Sección principal -->
        <main>
            <div class="cont-pedido-realizado section-responsive">
                <div class="pedido-realizado"> 
                    <i class="icon-checkmark-circled"></i>
                    <h3> Se realizó su pedido con éxito </h3><br>
                    <small> Verifique su medios de contacto para recibir la información</small><br>
                    <a href="index.php" class="btn btn-primary">Aceptar</a> <br>
                </div>
            </div>
        </main>
        

        <?php
            // Cargando el footeer
            require_once "partials/footer.php";
            // Cargando los Scripts
            require_once ("includes/includes_script.php");
        ?>
    </body>
</html>
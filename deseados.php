<?php
    require_once ("processes/process_carrito.php");
    require_once ("processes/lista_deseados.php");
    if(empty($_SESSION["cuenta"])){
        header("Location: ingresar.php");
    }

    $listaDeseados = obtenerListaDeseados($_SESSION["cuenta"]["id_usuario"]);
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista de deseados </title>

        <?php
            // Cargando las hojas de estilo
            require_once ("includes/includes_estilos.php");
        ?>
        <link rel="stylesheet" href="assets/css/lista_deseados.css">
    </head>
    <body>
        <?php
            require_once "partials/header.php";
        ?>

        <!-- Banner -->
        <section class="section-banner-productos">
            <div class="cont-banner section-responsive">
                <h2> Lista de deseados </h2>
            </div>
        </section>
        
        <!-- Contenido principal -->
        <main>
            <section class="section-lista-deseados section-responsive">
                <h3> Lista de productos deseados </h3>
                <div class="cont-lista-deseados">

                    <?php foreach($listaDeseados as $lista): ?>

                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <div class="col-md-4 img-des">
                                <img src="data:image/jpg;base64,<?=base64_encode($lista[5]);?>" 
                                    class="card-img" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"> <?= $lista[2]; ?> </h5>
                                    <p> <b> $ <?= $lista[3]; ?></b></p>
                                    <p class="card-text"> <?= $lista[4]; ?> </p>
                                    <form action="" method="post" class="form-deseados">
                                        <a href="producto_detalles.php?item=<?= $lista[1]; ?>" 
                                            class="btn btn-primary btn-sm">Detalles</a>
                                        <input type="hidden" name="id-producto" value="<?= $lista[0]; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm" name="btn-deseados" 
                                            value="eliminar">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php endforeach ?>
                </div>
            </section>
            <!-- Botón de ir hacia arriba-->
            <div class="ir-arriba">
                <i class="icon-chevron-up"></i>
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
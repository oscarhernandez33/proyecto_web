<?php   
    session_start();
    if(empty($_SESSION["cuenta-admin"])){
        header ("Location: admin-login.php");
    }

    require_once ("../processes/Process_productos.php");
    $objProducto = new Process_productos("../");

    $mensaje = "";
    if(isset($_POST["eliminar"])){
        $id = $_GET["id"];
        $objProducto-> borrarProductos($id);
        header("Location: productos.php");
    }

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Dashboard - Mary´s Love </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
            integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/admin/admin-general.css">
        <link rel="stylesheet" href="../assets/css/admin/partials-admin.css">
        <link rel="stylesheet" href="../assets/iconos/styles.css">
        <link rel="stylesheet" href="../assets/css/admin/admin.css">
    </head>

    <body>
            <?php 
                require_once ("header-admin.php"); 
                require_once ("menu.php");
            ?>

        <!-- Encabezado de la seccion -->
        <section class="encabezado encabezado-productos">
            <h2> Productos de la página </h2>
        </section>

        <!-- Contenido Principal -->
        <main>
            <?php if($mensaje=="Se agrego el producto correctamente"): ?>
            <div class="alert alert-success" role="alert">
                <?= $mensaje; ?> <a href="productos.php">Recargar</a>
            </div>
            <?php endif ?>
            <div class="cont-box cont-productos">
                <b> Eliminar Producto</b> 
                <div class="cont-eliminar">
                    <form class="eliminar" method="post">
                        <h3> ¿Deseas eliminar el producto? </h3>
                        <div class="cont-btn">
                            <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
                            <a href="productos.php" class="btn btn-secondary"> Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <?php require_once("script_dependecia.php"); ?>
    </body>

</html>
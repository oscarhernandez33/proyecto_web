<?php   
    session_start();
    if(empty($_SESSION["cuenta-admin"])){
        header ("Location: admin-login.php");
    }

    // Clase con los procesos de los pedidos
    require_once ("../processes/pedido.php");
    $objPedido= new Pedido("../");

    $listaPedidos = $objPedido->obtenerPedidos();

    $mensaje = "";
    if(isset($_POST["agregar"])){
        
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Productos - Mary´s Love </title>
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
                <b> Lista de pedidos </b> 
                <!--- Tabla de productos -->    
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Nombre Usuario</th>
                                <th scope="col">Correo</>
                                <th scope="col">Telefono</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Cantidad Productos</th>
                                <th scope="col">Total</th>
                                <th scope="col"> Acciones </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($listaPedidos as $pedidos):?>
                            <tr>
                                <td> <?= $pedidos[2]; ?> </td>
                                <td><?= $pedidos[3]; ?></td>
                                <td><?= $pedidos[4]; ?></td>
                                <td><?= $pedidos[5]; ?></td>
                                <td><?= $pedidos[6]; ?></td>
                                <td><?= $pedidos[7]; ?></td>
                                <td>
                                    <a href="editar_productos.php?id=<?= $pedidos[0]; ?>" 
                                        class="btn btn-primary btn-sm">Detalle</a>
                                    <a href="eliminar_productos.php?id=<?= $pedidos[0]; ?>" 
                                        class="btn btn-danger btn-sm"> <i class="icon-trash-b"></i></a>
                                </td>
                            </tr>
                        <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
        <?php require_once("script_dependecia.php"); ?>
    </body>

</html>
<?php

    //Clase de los pedidos de los productos
    require_once ("processes/pedido.php");
    $objPedido = new Pedido("");

    // Calculando las cantidades
    session_start();

    if(empty($_SESSION["carrito"])){
        header("Location: errors/page_not_found.php");
    }

    $cantidadProductosCarrito = 0;
    $Total = 0;
    foreach ($_SESSION["carrito"] as $indice=>$producto){
        $cantidadProductosCarrito+=$producto["cantidad"];
        $Total+=($producto["precio"]*$producto["cantidad"]); 
    }

    if(isset($_POST["agregar"])){
        $nombre = $_POST["nombre"];
        $email = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $clavePedido = mt_rand(10000000,90000000);

        // Llammar método para insertar pedido
        $objPedido->insertarPedido($nombre,$clavePedido,$email,$telefono,$cantidadProductosCarrito, $Total);
        // Llamar método para insertar el detalle del pedido
        foreach ($_SESSION["carrito"] as $indice=>$producto){
            $objPedido->insertarDetalle($clavePedido,$producto["nombre"],$producto["precio"],$producto["cantidad"],$producto["imagen"]);
        }

        unset($_SESSION["carrito"]);
        header("Location: pedido_realizado.php");
    }
?>

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
        <link rel="stylesheet" href="assets/css/pedido.css">
    </head>
    <body>
        <?php
            require_once "partials/header.php";
        ?>
        
        <!-- Sección principal -->
        <main>
            <section class="section-pedido section-responsive">
                <h2 class="text-center"> Procesar pedido </h2>
                <div class="cont-datos-procesar">
                    <b> Datos del usuario </b> <br><br>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Introduzca su nombre </label>
                            <input type="text" class="form-control" placeholder="Nombre" name="nombre">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1"> Introduzca un correo de contacto </label>
                            <input type="email" class="form-control" placeholder="Correo de Contacto" name="correo">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1"> Introduzca un telefono de contacto</label>
                            <input type="tel" class="form-control" placeholder="Teléfono de contacto" name="telefono">
                            <small> A estos medios se le hará llegar la información del pago</small>
                        </div>

                        <div class="info-pedido">
                            <b> Datos del pedido </b> <br><br>
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i = 0;
                                        foreach($_SESSION["carrito"] as $indice=>$producto): ?>
                                    <tr>
                                        <th scope="row"><?= $i+=1; ?></th>
                                        <td><img src="data:image/jpg;base64,<?=base64_encode($producto["imagen"]);?>" width="40px"></td>
                                        <td><?= $producto["nombre"];?></td>
                                        <td><?= $producto["cantidad"];?></td>
                                    </tr>
                                    <?php endforeach ?>
                                    <tr>
                                        <th scope="row" colspan="4">Total: <?= $Total;?></th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <button type="submit" class="btn btn-primary" name="agregar"> Enviar el pedido</button>
                    </form>
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
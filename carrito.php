<?php
    require_once ("global/config.php");
    require_once ("processes/process_carrito.php");
    require_once ("processes/Process_productos.php");
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Carrito</title>

        <?php
            // Cargando las hojas de estilo
            require_once ("includes/includes_estilos.php");
        ?>
        <link rel="stylesheet" href="assets/css/carrito.css">
    </head>
    <body>
        <?php
            require_once "partials/header.php";
        ?>

        <!-- Sección principal -->
        <main>
            <!--Sección carrito de compras -->
            <section class="section-carrito section-responsive">
                <h2 class="text-center"> Contenido Carrito </h2>

                <?php if(!empty($_SESSION["carrito"])){ ?>

                <div class="cont-carrito">
                    <div class="cont-tabla-carrito">
                        <div class="tabla-carrito table-responsive">
                            <table class="table" table-bordered>
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center" scope="col">Producto</th>
                                        <th class="text-center" scope="col">Precio/U</th>
                                        <th class="text-center" scope="col">Cantidad</th>
                                        <th class="text-center" scope="col">Total</th>
                                        <th class="text-center"> Acciones </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $cantidadProductosCarrito = 0;
                                        $subTotal = 0;
                                        // Mostrar los productos del carrito de la variable de sesión 
                                        foreach ($_SESSION["carrito"] as $indice=>$producto):
                                            $cantidadProductosCarrito+=$producto["cantidad"];
                                            $subTotal+=($producto["precio"]*$producto["cantidad"]); 
                                    ?>
                                    <tr>
                                        <td class="text-center"> <img src="data:image/jpg;base64,
                                            <?=base64_encode($producto["imagen"]);?>" width="50px"> </td>
                                        <td class="text-center"><?= "$".$producto["precio"];?></td>
                                        <td class="text-center">
                                            
                                            <select name="" id="lista-cantidad" idProducto="<?= openssl_encrypt(
                                                $producto["id"],COD,KEY);?>">
                                            <?php 
                                                $pro = new Process_productos("");
                                                // obteniendo la cantidad total del producto
                                                $productoInfo = $pro -> obtenerProducto($producto["id"]);
                                                
                                                for($i=1; $i<=$productoInfo[5];$i++): ?>
                                                <option value="<?=$i;?>" <?= $i==$producto["cantidad"]?"selected":""; ?> >
                                                    <?= $i; ?></option>
                                            <?php endfor?>
                                            </select>
                                        </td>
                                        <td class="text-center"><?= "$".$producto["precio"]*$producto["cantidad"];?></td>
                                        <td class="text-center">
                                            <form action="" method="post">
                                                <input type="hidden" name="id" value="<?= openssl_encrypt(
                                                    $producto["id"],COD,KEY);?>">
                                                <button type="submit" class="btn btn-danger" name="btn-action"
                                                value="eliminar">Borar</button>
                                            </form>
                                        </td>
                                    </tr>
                                    
                                    <?php endforeach?>                            
                                </tbody>
                                <small><i class="mensaje-deslizar">  </i></small>
                            </table>
                            
                        </div>
                    </div>
                    <!-- Procesar los datos del carrito -->
                    <div class="cont-procesar-carrito">
                        <div class="procesar-carrito">
                            <p class="titulo-datos-carrito"> Datos Carrito</p>
                            <div class="contenido-procesar-pedido">
                                <p class="text-center"> <b> Total de productos: </b> <?= $cantidadProductosCarrito;?></p>
                                <p class="total-carrito text-center"> Precio del pedido: $<?= $subTotal; ?> MX</p>
                            </div>
                            <div class="carrito-action">
                                <form action="" method="post">
                                    <button type="submit" class="btn-action btna1"name="btn-action" value="vaciar"> 
                                        Vaciar carrito</button>
                                </form>
                                <a href="procesar_pedido.php"> <button class="btn-action btna2">Procear pedido</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }else{ ?>
                <div class="carrito-vacio">
                    <i class="icon-shopping-cart-outline"></i>
                    <p> El carrito esta vacio </p> 
                    <a href="Productos.php" class="btn btn-primary"> Ir a comprar </a>
                </div>
                <?php }?>
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
        <script src="assets/js/ajax.js"></script>
    </body>
</html>
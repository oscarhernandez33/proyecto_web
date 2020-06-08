<?php
    require_once ("global/config.php");
    require_once ("processes/process_carrito.php");
    require_once ("processes/lista_deseados.php");
    require_once ("processes/comentarios.php");
    if(!$_GET){ // Si no viene parametro por la url mandar a la página de error
        require_once ("errors/page_not_found.php");
        exit;
    }
    $idProducto = $_GET["item"]; // Obtener el id del producto
        
    require_once ("processes/Process_productos.php"); // Mandar llamar los procesos de los productos
    $pro = new Process_productos("");

    /* Validar la URl
    $cantidad_productos = count($pro->obtenerProductos(""));
    if($idProducto > $cantidad_productos || $idProducto<=0){
        require_once ("errors/page_not_found.php");
        exit;
    }*/

    // Obteniendo los datos del producto

    $DatosProducto = $pro->obtenerProducto($idProducto);  // Mandar el id y obtener los datos

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
        <link rel="stylesheet" href="assets/css/detalle_productos.css">
    </head>
    <body>
        <?php
            require_once "partials/header.php";
        ?>

        <main>
            <!-- Sección detalles del producto -->
            <section class="section-responsive section-detalle-producto">
                <div class="cont-detalle">
                    <h2 class="text-center"> Detalles del producto</h2>
                    <div class="detalle-producto">
                        <div class="cont-imagen">
                            <div class="caja-imagen">
                                <img src="data:image/jpg;base64,<?=base64_encode($DatosProducto[6]);?>">
                            </div>
                        </div>
                        <div class="cont-descripcion">
                            <h3> <?= $DatosProducto[1]; ?> </h3>
                            <p class="item-descripcion precio"> <b>Precio: </b><?= "$".$DatosProducto[2]; ?> </p>
                            <p class="item-descripcion"> <b> Categoria: </b><?= $DatosProducto[4]; ?> </p>
                            <p class="item-descripcion">
                                <b>Descripcion: </b> </br>
                                <?= $DatosProducto[3]; ?>
                            </p>
                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= openssl_encrypt($DatosProducto[0],COD,KEY);?>">
                                <button class="agreagar-carrito" name="btn-action" value="agregar"> 
                                    <i class="icon-shopping-cart-outline"> </i> Agregar al carrito </button>
                            </form>

                            <form action="" method="post">
                                <input type="hidden" name="id" value="<?= $DatosProducto[0]; ?>">
                                <button type="submit" class="agregar-deseados" name="btn-deseados" value="agregar"> 
                                    <i class="icon-heart-o"> </i> Agregar a lista de deseados </button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Contenido adicional -->
            <section class="section-contenido-adicional section-responsive">
                <div class="cont-contenido-adicional">
                    <!-- Contenedor comentarios-->
                    <div class="cont-comentarios">
                        <h4> Comentarios del producto </h4>
                        <?php if(!empty($_SESSION["cuenta"])):?>
                        <div class="redactar-comentario">
                            <form action="" method="post">
                                <input type="hidden" name="id_producto" value="<?= $DatosProducto[0]; ?>">
                                <textarea cols="30" name="comentario" rows="10" placeholder="Escribe un cometario sobre el producto" required></textarea>
                                <button type="submit" name="btn-comentario" value="agregar">Comentar</button>
                            </form>
                        </div>
                        <?php else:?>
                            <h6> Ingrese sesión para agregar un comentario.</h6>
                        <?php endif ?>
                        <br>
                        <!-- Lista de cometarios -->
                        <?php
                            $listaComentarios = obtenerComentarios();
                            foreach($listaComentarios as $comentarioItem):
                        ?>
                        <div class="cont-comentario">
                            <div class="comentario">
                                <p class="usuario"> 
                                    <b class="com-user"> <?=$comentarioItem[4];?> </b> 
                                    <small class="fecha-comentario"> <?= $comentarioItem[2];?> </small> 
                                    <br>
                                    <?= $comentarioItem[1];?>
                                </p>
                                
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                    <!-- Contenedor sugerencias -->
                    <div class="cont-sugerencias">
                        <div class="sugerencias">
                            <h4> Te puede Interesar </h4>
                            <?php
                                $condicion = "WHERE Categoria = '".$DatosProducto[4]."'";
                                $listaSugerencias = $pro-> obtenerProductosLimit(4,0,$condicion);

                                foreach ($listaSugerencias as $sugerencia):
                                    if(!($sugerencia[0] == $DatosProducto[0])){
                            ?>
                            <div class="card mb-3" style="max-width: 310px;">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="data:image/jpg;base64,<?=base64_encode($DatosProducto[6]);?>" 
                                            class="card-img">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $sugerencia[1]; ?></h5>
                                            <p class="card-text"> <?= "$ ".$sugerencia[2]; ?> </p>
                                        </div>
                                    </div>
                                </div>
                                <a href="producto_detalles.php?item=<?= $sugerencia[0]; ?>" class="btn btn-secondary btn-sm"> 
                                    Ver detalles </a>
                            </div>
                            <?php } endforeach?>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Botón de ir hacia arriba-->
            <div class="ir-arriba">
                <i class="icon-chevron-up"></i>
            </div>
        </main>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Producto añadido con exito </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Se añadió el producto al carrito de compras
                </div>
                <div class="modal-footer">
                    <a href="productos.php" class="btn btn-secondary">Seguir Comprando </a>
                    <a href="carrito.php" class="btn btn-primary"><i class="icon-shopping-cart-outline"></i>
                        Ver carrito</a>
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> <i class="icon-checkmark-circled"></i>
                        Producto añadido con exito </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Se añadió el producto a la lista de deseados
                </div>
                <div class="modal-footer">
                    <a href="productos.php" class="btn btn-secondary">Seguir navegando </a>
                    <a href="deseados.php" class="btn btn-danger"><i class="icon-heart-o"></i>
                        Ver Lista</a>
                </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> <i class="icon-warning-alt"> </i>
                            Mensaje</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        El producto ya se encuentra en la lista de deseados
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> <i class="icon-warning-alt"> </i>
                            Mensaje</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Inicia sesión para agregar a la lista de deseados
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-secondary">Cerrar</button>
                        <a href="ingresar.php" class="btn btn-primary"> Ingresar </a>
                    </div>
                </div>
            </div>
        </div>
                                        
        <?php
            // Cargando el footeer
            require_once "partials/footer.php";
            // Cargando los Scripts
            require_once ("includes/includes_script.php");
        ?>

        <?php if($mensaje2=="show"): ?>
        <script>
            $(document).ready(function()
            {
                $("#exampleModal").modal("show");
            });
        </script>
        <?php endif ?>
        <?php if($mensaje3=="show"): ?>
        <script>
            $(document).ready(function()
            {
                $("#exampleModal3").modal("show");
            });
        </script>
        <?php endif ?>
        <?php if($mensaje3=="error"): ?>
        <script>
            $(document).ready(function()
            {
                $("#exampleModal4").modal("show");
            });
        </script>
        <?php endif ?>
        <?php if($mensaje3=="No hay sesion"): ?>
        <script>
            $(document).ready(function()
            {
                $("#exampleModal5").modal("show");
            });
        </script>
        <?php endif ?>

    </body>
</html>
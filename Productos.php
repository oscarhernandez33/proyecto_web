<?php
    require_once ("global/config.php");
    require_once ("processes/process_carrito.php");
    require_once ("processes/lista_deseados.php");
    // Proceso de productos
    require_once ("processes/Process_productos.php");
    $pro = new Process_productos(""); // Instanciar la clase para ejecutar los procesos

    //Establecer una URl Para la paginación
    if(!$_GET){
        header("Location:Productos.php?pagina=1&category=all");
    }
    if($_GET['pagina']<=0){
        header("Location:Productos.php?pagina=1&category=all");
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Productos</title>

        <?php
            // Cargando las hojas de estilo
            require_once ("includes/includes_estilos.php");
        ?>
        <link rel="stylesheet" href="assets/css/productos.css">
    </head>
    <body>
      
        <?php
            // Cargando le header
            require_once "partials/header.php";
        ?>
        <!-- Banner -->
        <section class="section-banner-productos">
            <div class="cont-banner section-responsive">
                <h2> Productos </h2>
            </div>
        </section>
        <!-- Contenido principal -->
        <main>
            <div class="cont-tienda section-responsive">
                <div class="cont-categorias">
                    <div class="titulo-categorias" id="titulo-categorias">
                        <h4> Categorías </h4> <i class="icon-plus"></i>
                    </div>
                    <div class="cont-lista-categorias ocultar-categoria">
                        <ul class="lista-categorias">
                            <li> <a href="Productos.php?pagina=1&category=all"> 
                                Todos los productos </a> </li>
                            <li> <a href="Productos.php?pagina=1&category=Peluches"> Peluches </a> </li>
                        </ul>
                    </div>
                </div>
                <div class="cont-productos">
                    <!-- Mensaje -->
                    <div class="alert alert-primary" role="alert">
                        Mensaje <?= $mensaje;?>
                    </div>
                    <div class="lista-productos">
                        <?php
                            // Categoria de productos
                            $categoria = $_GET["category"];
                            $condicion = "";
                            if($categoria != "all"){
                                $condicion = "WHERE Categoria = '".$_GET["category"]."'";
                            }

                            // Cargar la lista de productos
                            $productosPorPagina = 9; // Cantidad de productos a mostrar en una página
                            // Intervalo inicial
                            $intervaloInicio = ($_GET['pagina']-1)*$productosPorPagina;
                            // Obtener productos por limite
                            $productosLimite = $pro->obtenerProductosLimit($productosPorPagina,$intervaloInicio,$condicion); 
                            
                            foreach ($productosLimite as $producto):
                        ?>
                        <div class="card" style="width: 18rem;" category="<?= $producto[4]; ?>">
                            <img src="data:image/jpg;base64,<?=base64_encode($producto[6]);?>" class="card-image">
                            <div class="card-body">
                                <h5 class="card-title"> <?= $producto[1]; ?></h5>
                                <p class="card-text">
                                        <?= "$".$producto[2]; ?> 
                                </p>
                                <form action="" method="post" class="form-deseados">
                                    <input type="hidden" name="id" value="<?= $producto[0]; ?>">
                                    <button type="submit" name="btn-deseados" value="agregar"> 
                                        <i class="icon-heart-o"> </i> </button>
                                </form>
                                
                                <form action="" method="post">
                                    <input type="hidden" name="id" value="<?= openssl_encrypt($producto[0],COD,KEY);?>">
                                    <button type="submit" class="btn btn-outline-danger" 
                                        name="btn-action" value="agregar"  
                                        data-toggle="modal" data-target="#exampleModal"> 
                                        <i class="icon-shopping-cart-outline"> </i>Agregar 
                                    </button>
                                    <a href="producto_detalles.php?item=<?= $producto[0]; ?>" class="btn btn-info">
                                        Ver datelles</a>
                                </form>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                    <ul class="pagination">
                        <li class="page-item <?= $_GET['pagina']<=1?'disabled':'';?>">
                            <a class="page-link" href="Productos.php?pagina=<?=($_GET["pagina"]-1)."&category=".$categoria;?>"> 
                                Anterior </a>
                        </li>
                        
                        <?php
                            // Paginar los productos
                            $numeroPaginas = $pro->paginarProductos($productosPorPagina,$condicion);

                            for($i=0; $i<$numeroPaginas; $i++):
                        ?>

                        <li class="page-item <?= $_GET['pagina']==$i+1 ? 'active': ''; ?>"><a class="page-link" 
                        href="Productos.php?pagina=<?= ($i+1)."&category=".$categoria;?>"> <?= $i+1; ?></a></li>

                        <?php endfor ?>
                        <li class="page-item <?= $_GET['pagina']>=$numeroPaginas?'disabled':'';?>">
                            <a class="page-link" href="Productos.php?pagina=<?=($_GET["pagina"]+1)."&category=".$categoria;?>"> 
                                Siguiente </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Botón de ir hacia arriba-->
            <div class="ir-arriba">
                <i class="icon-chevron-up"></i>
            </div>
        </main>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"> <i class="icon-warning-alt"> </i>
                            Advertencia</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        La cantidad sobrepasa el stock del producto
                    </div>
                    <div class="modal-footer">
                        <button type="button" data-dismiss="modal" class="btn btn-primary">Cerrar</button>
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
            require_once "includes/includes_script.php";
        ?>
        <script src="assets/js/productos.js"></script>
        
        <?php if($mensaje2=="show"): ?>
        <script>
            $(document).ready(function()
            {
                $("#exampleModal").modal("show");
            });
        </script>
        <?php endif ?>
        <?php if($mensaje2=="error"): ?>
        <script>
            $(document).ready(function()
            {
                $("#exampleModal2").modal("show");
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
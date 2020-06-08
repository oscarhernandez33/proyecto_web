<?php
    require_once ("processes/process_carrito.php");
    if(!$_POST){
        require_once ("errors/page_not_found.php");
        exit;
    }
    $buscar = $_POST["search"];

    require_once "processes/Process_productos.php";
    $pro = new Process_productos(""); // Instanciar la clase para ejecutar los procesos de productos

    $datosBusqueda = $pro->buscarProductos($buscar);

    if(count($datosBusqueda)==0){
        $mensaje = "No se encontraron resultados";
    }
    else{
        $mensaje="Resultados para '".$buscar."'";
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
        <link rel="stylesheet" href="assets/css/productos.css">
    </head>
    <body>
        <?php
            require_once "partials/header.php";
        ?>
        
        <!-- Contenido principal -->
        <main>
            <!-- Sección resultado de busqueda -->
            <section class="section-resultados-busqueda section-responsive">
                <h2 class="text-center">  <?= $mensaje; ?> </h2>
                <div class="cont-resultados-busqueda">
                    <?php foreach ($datosBusqueda as $producto): ?>
                        <div class="card" style="width: 18rem;" category="<?= $producto[4]; ?>">
                            <img src="data:image/jpg;base64,<?=base64_encode($producto[6]);?>"
                            class="card-img-top" alt="..." width="20px">
                            <div class="card-body">
                                <h5 class="card-title"> <?= $producto[1]; ?></h5>
                                <p class="card-text">
                                    <?= "$".$producto[2]; ?>
                                    <i class="icon-heart-o"> </i>
                                </p>
                                <button type="button" class="btn btn-outline-danger"> 
                                    <i class="icon-shopping-cart-outline"> </i>Agregar </button>
                                <a href="producto_detalles.php?item=<?= $producto[0]; ?>" class="btn btn-info">
                                    Ver datelles</a>
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


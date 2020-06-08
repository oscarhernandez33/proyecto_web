<!-- Estructura del header -->

<?php
    $cantidadCarrito = 0;
    if(!empty($_SESSION["carrito"])){
        foreach ($_SESSION["carrito"] as $indice=>$producto){
            $cantidadCarrito+=$producto["cantidad"];
        }
    }
?>

<header>
    <nav class="menu">
        <div class="contenedor">
            <div class="fila justify-content alinear-items">
                <!-- Titulo -->
                <div class="logo">
                    <a href="index.php" class="titulo"> Mary´s Love </a>
                </div>

                <div class="buscador-responsive">
                    <i class="icon-search-1"></i>
                </div>

                <div class="carrito-responsive">
                    <a href="carrito.php">
                        <i class="icon-shopping-cart-outline"></i> <span class="cantidad-carrito-responsive">
                        <?= $cantidadCarrito;?> </span>
                    </a>
                </div>

                <!-- Botón de menu-->
                <button class="menu-nav-toggle">
                    <span></span>
                </button>

                <!-- Buscador -->
                <div class="cont-buscador">
                    <form action="search.php" method="post">
                        <div class="buscador">
                            <div class="cont-buscar">
                                <input type="search" name="search" placeholder="Buscar productos" required>
                            </div>
                            <div class="cont-btn-buscar">
                                <button type="submit" class="btn-buscar"> <i class="icon-search-1"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Menu -->
                <div class="menu-nav">
                    <ul>
                        <li class="item"><a href="Index.php"> Inicio </a></li>
                        <li class="dropdown item">
                            <a href="#" class="toggle-submenu"> Tienda <i class="icon-down-open-mini"></i> </a>
                            <!-- Submenu 1 -->
                            <ul class="sub-menu">
                                <li><a href="Productos.php"> Todos los productos </a></li>
                                <li><a href="#"> Ofertas </a></li>
                            </ul>
                        </li>
                        <li class="dropdown item">
                            <a href="#" class="toggle-submenu"> Conocenos <i class="icon-down-open-mini"></i> </a>
                            <!-- Submenu 2 -->
                            <ul class="sub-menu">
                                <li><a href="Acerca_nosotros.php"> Acerca de nosotros </a></li>
                                <li><a href="Contacto.php"> Contacto </a></li>
                            </ul>
                        </li>
                        <?php 
                            if(empty($_SESSION["cuenta"])):
                        ?>
                        <li class="ingresar"><a href="ingresar.php"> Ingresar </a></li>
                        <?php else: ?>
                        <!-- <li class="ingresar"><a href="#"> aaa </a></li> -->
                        <li class="dropdown">
                            <a href="#" class="toggle-submenu"> <i class="icon-user"></i> Tu Cuenta 
                                <i class="icon-down-open-mini"></i> </a>
                            <!-- Submenu 2 -->
                            <ul class="sub-menu">
                                <li><a href="mi_cuenta.php"> <i class="icon-user"></i> 
                                    <?= $_SESSION["cuenta"]["usuario"]; ?></a></li>
                                <li><a href="deseados.php"> <i class="icon-heart-o"></i> Lista de deseados</a></li>
                                <li><a href="processes/cerrar_sesion.php"> <i class="icon-log-out"></i> Cerrar sesión 
                                    </a></li>
                            </ul>
                        </li>
                        <?php endif ?>
                        <li class="carrito"><a href="carrito.php"> <i class="icon-shopping-cart-outline"></i> <span>
                        <?= $cantidadCarrito;?> </span> Carrito </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</header>
<!-- Fin Header -->
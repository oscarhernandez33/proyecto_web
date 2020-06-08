<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>

        <?php
            require_once ("includes/includes_estilos.php");
        ?>
        <link rel="stylesheet" href="assets/css/index.css">
        <link rel="stylesheet" href="assets/css/banner.css">
    </head>
    <body>
        <?php
            require_once ("processes/process_carrito.php");
            require_once "partials/header.php";
        ?>

        <!-- Estructura del banner -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <!-- Slider -->
            <div class="carousel-inner">
                <div class="carousel-item active parallax1" style="background-image: url('Assets/img/img_banner11.jpg');">
                    <div class="carousel-caption">
                        <h2 class="banner-titulo" id="Titulo"> Mary´s Love</h2>
                        <h3 class="banner-subtitulo" id="subtitulo"> Regalos de corazón </p>
                    </div>
                </div>
                <div class="carousel-item parallax2" style="background-image: url('Assets/img/img_banner2.jpg');">
                    <div class="carousel-caption">
                        <h2 class="banner-titulo"> Titulo 2</h2>
                        <h3 class="banner-subtitulo"> Subtitulo 2 </p>
                    </div>
                </div>
                <div class="carousel-item parallax3" style="background-image: url('Assets/img/img_banner3.jpg');">
                    <div class="carousel-caption">
                        <h2 class="banner-titulo"> Titulo 3</h2>
                        <h3 class="banner-subtitulo"> Subtitulo 3 </p>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        
        <!-- Contenido Principal-->
        <main>
            <!-- Información de la página -->
            <section class="section-informacion section-responsive">
                <div class="cont">
                    <h3 class="titulo-animado"> Información de la página </h3>
                    <div class="line"></div>
                </div>

                <div class="page-info">
                    <p>
                        Aquí encontrarás todo tipo de artículos para todas las personas que quieran conseguir un 
                        buen regalo, detalles, disfraces, a las personas que requieran del servicio de entrega de 
                        regalo y poder ver productos sin salir de casa.
                    </p>
                </div>
                <div class="cont-cajas-productos">
                    <div class="caja caja1" id="caja1">
                        <img src="Assets/img/Iconos/icono-peluche.png" alt="" width="60px">
                        <p> Peluches </p>
                    </div>
                    <div class="caja caja2" id="caja2">
                        <img src="Assets/img/Iconos/icono-regalo2.png" alt="" width="60px">
                        <p> Regalos </p>
                    </div>
                    <div class="caja caja3" id="caja3">
                        <img src="Assets/img/Iconos/icono-gorrito.png" alt="" width="60px">
                        <p> Artículos Festivos </p>
                    </div>
                </div>
                <div class="cont-btn-ver-productos">
                    <a href="Productos.php">Ver todos los productos </a>
                </div>  
            </section>
            
            <!-- Separador de contenidos -->
            <section>
                <div class="cont-separador">
                    <div class="separador section-responsive">
                        <div class="separador-texto">
                            <h3 id="texto-separador">Productos de Calidad</h3>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Información de los productos -->
            <section class="cajas-informacion section-responsive">
                <div class="cont">
                    <h3 class="titulo-animado2"> Los Mejores Artículos de regalo</h3>
                    <div class="line"></div>
                </div>
    
                <!-- Contenido en cajas-->
                <div class="section-boxes">
                    <div class="boxes">
                        <div class="box box1" id="box1">
                            <h4>Los mejores regalos</h4>
                            <p>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem reprehenderit magnam 
                                consequatur eligendi. Facilis vero ullam quaerat aut vitae, tempore nulla facere eos 
                                incidunt perferendis at. Suscipit cumque rerum vero?
                            </p>
                        </div>
                        <div class="box box2" id="box2">
                            <h4>Artículos de temporada</h4>
                            <p>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem reprehenderit magnam 
                                consequatur eligendi. Facilis vero ullam quaerat aut vitae, tempore nulla facere eos 
                                incidunt perferendis at. Suscipit cumque rerum vero?
                            </p>
                        </div>
                        <div class="box box3" id="box3">
                            <h4>Disposición de envío</h4>
                            <p>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem reprehenderit magnam 
                                consequatur eligendi. Facilis vero ullam quaerat aut vitae, tempore nulla facere eos 
                                incidunt perferendis at. Suscipit cumque rerum vero?
                            </p>
                        </div>
                        <div class="bg"></div>
                    </div>
                </div>
                <div class="cont-btn-conoce-mas">
                    <a href="Acerca_nosotros.php">Conoce más </a>
                </div>     
            </section>

            <!-- Sección con imagen parallax -->
            <section class="section-parallax">
                <div class="cont-parallax parallax4">
                    <div class="fondo-linear-gradient">
                        <div class="cont-texto-parallax section-responsive">
                            <div class="texto-parallax">
                                <h4 id="Titulo-Parallax"> Ofrecemos regalos de todo tipo y para todo tipo de ocaciones</h4>
                                <p id="text-parallax"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia fugiat nemo officia
                                     aliquid veritatis id veniam beatae in molestiae, labore distinctio dignissimos 
                                     inventore ea assumenda sequi error illo quasi accusantium?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Botón de ir hacia arriba-->
            <div class="ir-arriba">
                <i class="icon-chevron-up"></i>
            </div>
        </main>

        <?php
            require_once "partials/footer.php";
            require_once "includes/includes_script.php";
        ?>
        <script src="assets/js/animaciones/animaciones-index.js"></script>
        <script src="assets/js/parallax.js"></script>
    </body>
</html>
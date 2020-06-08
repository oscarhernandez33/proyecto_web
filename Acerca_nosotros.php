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
        <link rel="stylesheet" href="assets/css/nosotros.css">
    </head>
    <body>
        <?php
            require_once ("processes/process_carrito.php");
            require_once "partials/header.php";
        ?>
        
         <!-- Banner de la sección -->
         <section class="banner-acerca-nosotros">
            <div class="cont-banner parallax">
                <div class="fondo-imagen">
                    <div class="titulo-banner section-responsive">
                        <h2 id="titulo-banner"> Acerca de nosotros </h2>
                    </div>
                </div>
            </div>
            <!--<div class="wave" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" 
                style="height: 100%; width: 100%;"><path d="M-3.67,105.09 C149.99,150.00 364.84,42.92 500.84,126.80 
                L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: red;"></path></svg></div> -->
        </section>

        <!-- Contenido principal -->
        <main>
            <section class="section-nosotros section-responsive">
                <div class="titulo-section titulo-nosotros">
                    <h3 id="nosotros"> Nosotros </h3>
                    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, beatae laborum, 
                        saepe deserunt ab voluptatem totam, reprehenderit consequatur distinctio harum optio.
                        Praesentium repudiandae facere non blanditiis placeat fugiat quia quae?
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, beatae laborum, 
                        saepe deserunt ab voluptatem totam, reprehenderit consequatur distinctio harum optio.
                        Praesentium repudiandae facere non blanditiis placeat fugiat quia quae?
                    </p>
                </div>
            </section>

            <section class="section-que-hacemos section-responsive">
                <div class="titulo-section titulo-que-hacemos">
                    <h3 id="que-hacemos"> ¿Qué hacemos? </h3>
                    <p> Nos dedicamos a la venta y envíos de regalos de todo tipo y para todo tipo de de ocaciones 
                        especiales: artículos festivos de temporada, disfraces, etc.
                    </p>
                </div>
                <div class="cont-que-hacemos">
                    <div class="img-que-hacemos" id="img-que-hacemos"> </div>
                    <div class="cont-descrip" id="cont-descrip">
                        <article class="parrafo1">
                            <h5> Nuestros productos </h5>
                            <p> Ofrecemos diversos productos para todo tipo de obsequios, de varios precios y con pedidio
                                de anticipación.
                            </p>
                        </article>
                        <article class="parrafo2">
                            <h5> Articulos de temporarda </h5>
                            <p> La venta de regalos es a lo largo de todo año, además los productos se actualizan en las 
                                diferentes fechas de festividades a lo largo del año.
                            </p>
                        </article>
                    </div>    
                </div>
            </section>

            <section class="section-separador">
                <div class="fondo-separador"></div>
            </section>

            <section class="section-objetivo section-responsive">
                <div class="titulo-section titulo-objetivo">
                    <h3 id="objetivo"> Objetivo </h3>
                    <p> 
                        Nuestro objetivo es proporcionar productos de calidad para todas la personas que necesiten 
                        un regalo, otorgando servicio a domicilio para la comodidad de los clientes.
                    </p>
                </div>
                <div class="cont-cajas-objetivo">
                    <div class="caja-objetivo caja-objetivo1" id="caja-objetivo1">
                        <img src="Assets/img/Iconos/icono-calidad.png" alt="" width="110px">
                        <p> Calidad </p>
                    </div>
                    <div class="caja-objetivo caja-objetivo2" id="caja-objetivo2">
                        <img src="Assets/img/Iconos/icono-comodidad.png" alt="" width="110px">
                        <p> Comodidad </p>
                    </div>
                    <div class="caja-objetivo caja-objetivo3" id="caja-objetivo3">
                        <img src="Assets/img/Iconos/icono-rapidez.png" alt="" width="110px">
                        <p> Rapidez </p>
                    </div>
                </div>
            </section>

            <!-- Seccción de preguntas frecuentes -->
            <section class="section-preguntas-frecuentes">
                <div class="cont-preguntas-frecuentes section-responsive">
                    <div class="titulo-preguntas-frecuentes">
                        <h4> Preguntas Frecuentes </h4>
                    </div>
                    <div class="cont-acordeon">
                        <div class="item-acordeon" id="pregunta1">
                            <div class="acordeon-link" href="">
                                Pregunta 1
                                <i class="icon-plus"></i>
                            </div>
                            <div class="respuesta">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti iste deserunt 
                                    voluptatem accusamus nemo ratione, accusantium, totam obcaecati officia eligendi, 
                                    sit iure. Laborum culpa nisi, atque ab blanditiis sequi eius.
                                </p>
                            </div>
                        </div>
                        <div class="item-acordeon" id="pregunta2">
                            <div class="acordeon-link" href="">
                                Pregunta 2
                                <i class="icon-plus"></i>
                            </div>
                            <div class="respuesta">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti iste deserunt 
                                    voluptatem accusamus nemo ratione, accusantium, totam obcaecati officia eligendi, 
                                    sit iure. Laborum culpa nisi, atque ab blanditiis sequi eius.
                                </p>
                            </div>
                        </div>
                        <div class="item-acordeon" id="pregunta3">
                            <div class="acordeon-link" href>
                                Pregunta 3
                                <i class="icon-plus"></i>
                            </div>
                            <div class="respuesta">
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti iste deserunt 
                                    voluptatem accusamus nemo ratione, accusantium, totam obcaecati officia eligendi, 
                                    sit iure. Laborum culpa nisi, atque ab blanditiis sequi eius.
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
            // Cargando el footeer
            require_once "partials/footer.php";
            // Cargando los Scripts
            require_once "includes/includes_script.php";
        ?>
        <script src="assets/js/animaciones/animaciones_nosotros.js"></script>
    </body>
</html>
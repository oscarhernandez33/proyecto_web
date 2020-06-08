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
        <link rel="stylesheet" href="assets/css/contacto.css">
    </head>

    <body>
        <?php
            require_once ("processes/process_carrito.php");
            require_once "partials/header.php";
        ?>

        <!-- Banner de la sección -->
        <section class="banner-contacto">
            <div class="cont-banner parallax">
                <div class="fondo-imagen">
                    <div class="titulo-banner section-responsive">
                        <h2 id="titulo-banner"> Contáctanos </h2>
                    </div>
                </div>
            </div>
            <!--<div class="wave" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" 
                    style="height: 100%; width: 100%;"><path d="M-3.67,105.09 C149.99,150.00 364.84,42.92 500.84,126.80 
                    L500.00,150.00 L0.00,150.00 Z" style="stroke: none; fill: red;"></path></svg></div> -->
        </section>

        <!-- Contenido principal -->
        <main>
            <!-- Sección medios de contacto -->
            <section class="section-medios-contacto section-responsive">
                <h3 id="titulo-animado"> Medios de Contacto </h3>
                <div class="medios-contacto">
                    <div class="cont-medios cont-telefono" id="cont-medios">
                        <div class="cont-icono telefono-icono" id="cont-icono">
                            <i class="icon-phone"></i>
                        </div>
                        <div class="cont-texto telefono-text" id="cont-text">
                            <h4>Teléfono</h4>
                            <p>4779891023</p>
                        </div>
                    </div>
                    <div class="cont-medios cont-correo" id="cont-medios2">
                        <div class="cont-icono email-icono" id="cont-icono2">
                            <i class="icon-email-mail-streamline"></i>
                        </div>
                        <div class="cont-texto email-text" id="cont-text2">
                            <h4> Correo </h4>
                            <p> correo@gmail.com </p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Separador redes sociales -->
            <section class="section-separador-redes">
                <div class="cont-redes-sociales section-responsive">
                    <div class="cont-icono cont-icono-facebook" id="icono-facebook">
                        <a href=""> <i class="icon-facebook"></i> </a>
                    </div>
                    <div class="cont-icono cont-icono-twiter" id="icono-twiter">
                        <a href=""> <i class="icon-social-twitter"></i> </a>
                    </div>
                    <div class="cont-icono cont-icono-instagram" id="icono-instagram">
                        <a href=""> <i class="icon-instagrem"></i> </a>
                    </div>
                </div>
            </section>

            <!-- Sección del formulario de contacto -->
            <section class="section-enviar-mensaje">
                <h3 id="titulo-form"> Enviar Mensaje </h3>
                <div class="cont-enviar-mensaje section-responsive">
                    <form action="" class="form-enviar-mensaje">
                        <input type="text" class="input" placeholder="Nombre">
                        <input type="email" class="input" placeholder="Correo electrónico">
                        <input type="text" class="input" placeholder="Asunto">
                        <textarea name="" id="" cols="20" rows=5 class="input" placeholder="Mensaje"></textarea>
                        <input type="submit" class="input-btn" value="Enviar">
                    </form>
                </div>
            </section>

            <!-- Botón de ir hacia arriba-->
            <div class="ir-arriba">
                <i class="icon-chevron-up"></i>
            </div>

            <!-- Footer -->
            <footer>
                <div class="forma" id="forma"></div>
                <br>
                <div class="cont-footer">
                    <div class="fin-footer section-responsive">
                        <a href=""> Terminos y condiciones</a>
                        <a href=""> Política de privacidad</a>
                        <a href="" class="lc"> Información sobre pedidos</a>
                    </div>
                    <div class="creditos">
                        <p> ©2020 - Derechos reservados </p>
                    </div>
                </div>
            </footer>
        </main>
        <script src="assets/js/jquery-3.4.1.min.js"></script>
        <script src="assets/js/script.js"></script>
        <script src="assets/js/menu.js"></script>
        <script src="assets/js/animaciones/animaciones generales.js"></script>
        <script src="assets/js/animaciones/animaciones_contacto.js"></script>
    </body>
</html>
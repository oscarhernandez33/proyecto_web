<?php 
    require_once ("processes/login.php");
    require_once ("processes/process_carrito.php");

    $log = new Login(); // Instanciando la clase del login
    $mensaje = "";

    if(!empty($_POST["email"]) || !empty($_POST["password"])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        $buscarUsuario = $log->validarSesion($email,$password);
        if($buscarUsuario){
            //session_start();

            $datosUsuario = $log->obtenerDatosUsuario($email);

            $_SESSION["cuenta"] = array(
                "id_usuario"=>$datosUsuario[0],
                "usuario"=>$datosUsuario[1],
                "email"=>$datosUsuario[2],
                "password"=>$datosUsuario[3]
            );
            header("Location: Index.php");
        }
        else{
            $mensaje = "fallo sesion";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Ingresar </title>

        <?php
            // Cargando las hojas de estilo
            require_once ("includes/includes_estilos.php");
        ?>
        <link rel="stylesheet" href="assets/css/login.css">
    </head>
    <body>
        <?php
            require_once "partials/header.php";
        ?>
        
        <!-- Sección principal -->
        <main>
            <section class="section-login section-responsive">
                <?php if ($mensaje == "fallo sesion"):?>
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        Correo o contraseña incorrectos
                    </div>
                <?php endif ?>
                <div class="cont-login">
                    <div class="login">
                        <h3 class="text-center">Ingresar</h3>
                        <form action="" method="post" class="form-login">
                            <input type="email" name="email" class="input-email" placeholder="Correo Electrónico">
                            <input type="password" name="password" placeholder="Contraseña">
                            <br><button type="submit"> Ingresar</button>
                        </form>
                        <a href="crear_cuenta.php"> Crear una cuenta </a>
                        <a href=""> ¿Olvidaste tu contraseña? </a>
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
            require_once ("includes/includes_script.php");
        ?>
    </body>
</html>
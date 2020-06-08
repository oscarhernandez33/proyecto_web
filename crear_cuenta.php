<?php
    require_once ("processes/login.php");
    require_once ("processes/process_carrito.php");

    $log = new Login(); // Instanciando la clase del login
    $mensaje = "";
    if(!empty($_POST)){
        $nombre = $_POST["nombre"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $insertarUsuario = $log->insertarUsuario($nombre,$email,$password);
        if(!$insertarUsuario){
            $mensaje = "El correo ya esta registrado";
        }
        else{

            $datosUsuario = $log->obtenerDatosUsuario($email);

            $_SESSION["cuenta"] = array(
                "id_usuario"=>$datosUsuario[0],
                "usuario"=>$datosUsuario[1],
                "email"=>$datosUsuario[2],
                "password"=>$datosUsuario[3]
            );
            header("Location: index.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Registrarse </title>

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
                <?php if ($mensaje == "El correo ya esta registrado"):?>
                    <div class="alert alert-danger" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        El correo ya esta registrado
                    </div>
                <?php endif ?>
                <div class="cont-login">
                    <div class="login">
                        <h3 class="text-center">Registrarse</h3>
                        <form action="" method="post" class="form-login">
                            <input type="text" name="nombre" class="input-email" placeholder="Nombre de usuario" required>
                            <input type="email" name="email" class="input-email" placeholder="Correo Electrónico" required>
                            <input type="password" name="password" placeholder="Contraseña" required>
                            <br><button type="submit"> Registrarse </button>
                        </form>
                        <a href="ingresar.php"> ¿Ya tienes cuenta? Inicia Sesión </a>
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
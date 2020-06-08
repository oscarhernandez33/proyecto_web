<?php
    require_once ("processes/process_carrito.php");
    require_once ("processes/lista_deseados.php");
    require_once ("processes/login.php");

    $cuenta = new Login();
    if(empty($_SESSION["cuenta"])){
        header("Location: ingresar.php");
    }
    $mensaje = "";
    if(!empty($_POST["btn-edit"])){
        switch($_POST["btn-edit"]){
            case "actualizar_nombre":
                $usuario = $_POST["input-nombre"];
                $cuenta->actualizarUsuario($usuario, $_SESSION["cuenta"]["id_usuario"]);
                $mensaje = "nombre actualizado";
            break;
            case "actualizar_pass":
                $passActual = $_POST["input-pass_actual"];
                $newPass = $_POST["input-new-pass"];

                if($cuenta->actualizarPassword($passActual,$newPass,$_SESSION["cuenta"]["email"], $_SESSION["cuenta"]["id_usuario"])){
                    $mensaje = "contraseña actualizada";
                }
                else{
                    $mensaje = "contraseña no actualizada";
                }
            break;
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Mi cuenta </title>

        <?php
            // Cargando las hojas de estilo
            require_once ("includes/includes_estilos.php");
        ?>
        <link rel="stylesheet" href="assets/css/cuenta.css">
    </head>
    <body>
        <?php
            require_once "partials/header.php";
        ?>

        <!-- Banner -->
        <section class="section-banner-productos">
            <div class="cont-banner section-responsive">
                <h2> Mi cuenta </h2>
            </div>
        </section>
        
        <!-- Contenido principal -->
        <main>
            <!-- Sección datos de la cuenta -->
            <section class="section-datos-cuenta section-responsive">
                <h3 class="text-center"> Datos de la cuenta </h3>
                <?php if($mensaje == "nombre actualizado"): ?>
                <div class="alert alert-primary" role="alert">
                    El nombre ha sido actualizado 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif ?>
                <?php if($mensaje == "contraseña actualizada"): ?>
                <div class="alert alert-primary" role="alert">
                    La contraseña ha sido actualizada
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif ?>
                <?php if($mensaje == "contraseña no actualizada"): ?>
                <div class="alert alert-danger" role="alert">
                    La contraseña ingresada es incorrecta
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif ?>
                <div class="cont-datos-cuenta">
                    <form action="" method="post">
                        <div class="box-data edit-user">
                            <i class="icon-user"></i>
                            <label>Nombre de usuario</label>
                            <input type="text" name="input-nombre" value="<?= $_SESSION["cuenta"]["usuario"];?>">
                            <button type="submit" name="btn-edit" value="actualizar_nombre">Actualizar nombre</button>
                        </div>
                    </form>
                    <form action="" method="post">
                        <div class="box-data edit-password">
                            <i class="icon-lock"></i>
                            <label>Actualizar Contraseña</label>
                            <input type="password" name="input-pass_actual" placeholder="Contraseña Actual">
                            <input type="password" name="input-new-pass" placeholder="Contraseña nueva">
                            <button type="submit" name="btn-edit" value="actualizar_pass">Actualizar contraseña</button>
                        </div>
                    </form>
                    <div class="box-data box-deseados">
                        <i class="icon-heart-o"></i>
                        <label>Productos en lista de deseados</label>
                        <p> 5 </p>
                        <a href="deseados.php"> Ver lista de deseados</a>
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
<?php   
    session_start();
    if(empty($_SESSION["cuenta-admin"])){
        header ("Location: admin-login.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Dashboard - Mary´s Love </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
            integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/admin/admin-general.css">
        <link rel="stylesheet" href="../assets/css/admin/partials-admin.css">
        <link rel="stylesheet" href="../assets/iconos/styles.css">
    </head>
    <body>

        <?php 
            require_once ("header-admin.php"); 
            require_once ("menu.php");
        ?>

        <!-- Contenido Principla -->
        <main>
            <h2> Bienvenido al sistema</h2>
        </main>
        <?php require_once("script_dependecia.php"); ?>
    </body>
</html>
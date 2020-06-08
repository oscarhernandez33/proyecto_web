<?php
    session_start();
    unset($_SESSION["cuenta-admin"]); //Elimiando la sesión
    header("Location: admin-login.php");
?>
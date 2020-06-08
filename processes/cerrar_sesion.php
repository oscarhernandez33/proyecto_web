<?php
    session_start();
    unset($_SESSION["cuenta"]);

    header("Location: ../Index.php");
?>
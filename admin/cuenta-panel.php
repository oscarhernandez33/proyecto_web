<?php
    // ===== Script para los procesos de las cuentas del panel de administración =====
    
    require_once ("../database/Conexion.php");

    // Ingresar 
    $mensaje = "";
    if(isset($_POST["btn-ingresar"])){
        if(!empty($_POST["nombre"]) || !empty($_POST["password"])){
            $con = new Conexion();
            $nombreUsuario = $con->caracteresValidos($_POST["nombre"]);
            $password = $con->caracteresValidos($_POST["password"]);

            if(ingresarPanelControl($nombreUsuario,$password)){
                $datosUsuario = obtenerDatos($nombreUsuario);
                session_start();
                $_SESSION["cuenta-admin"] = array(
                    "id-usuario"=>$datosUsuario[0],
                    "nombre_usuario"=>$nombreUsuario,
                    "password"=>$password
                );
                header("Location: dashboard.php");
            }
            else{
                $mensaje = "Datos incorrectos";
            }

        }
    }

    // Método para ingresar al panel de control
    function ingresarPanelControl($nombreUsuario, $password){
        $con = new Conexion();
        $band = false;

        $sql = "SELECT *FROM Usuarios";

        $datosUsuarios = $con->consulta($sql); 
        foreach($datosUsuarios as $indice=>$datos){
            if($datos[1] == $nombreUsuario && $datos[3]==$password){
                $band = true;
            }
        }
        return $band;
    }

    // Ingresar un usuario Administrador 
    function insertarUsuarioAdmin($nombreUsuario, $password){
        $sql = "";
    }

    // Obtener los datos del usuario administrador ingresado
    function obtenerDatos($nombreUsuario){
        $con = new Conexion();
        $sql = "SELECT *FROM Usuarios WHERE Nombre_Usuario = '$nombreUsuario'";
        $datos = $con->consulta($sql);
        return $datos[0];
    }
?>
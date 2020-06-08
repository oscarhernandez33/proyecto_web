<?php 

    require_once ("database/conexion.php");

    if(isset($_POST["btn-comentario"])){
        switch($_POST["btn-comentario"]){
            case "agregar":
                $idProducto = $_POST["id_producto"];
                $comentario = $_POST["comentario"];
                $idUsuario = $_SESSION["cuenta"]["id_usuario"];

                insertarComentario($idProducto, $comentario, $idUsuario);

            break;
        }
    }

    // Insertar un comentario de un producto en la base de datos
    function insertarComentario($idProducto, $comentario, $idUsuario){
        $con = new Conexion();
        $dia = date("d");
        $mes = date("m");
        $year = date("Y");
        $fecha = $dia."/".$mes."/".$year;

        $sql = "INSERT INTO Comentarios VALUES(NULL,'$comentario','$fecha',$idProducto,$idUsuario)";
        $con->consultaActualizacion($sql);
    }

    // Obtener la lista de comentarios
    function obtenerComentarios(){
        $con = new Conexion();

        $sql = "SELECT c.id_comentario, c.Contenido, c.Fecha, u.id_usuario, u.Nombre_Usuario FROM Comentarios c 
            INNER JOIN Usuarios u ON c.id_usuario = u.id_usuario WHERE id_producto = ".$_GET["item"];

        return $con->consulta($sql);
    }
?>
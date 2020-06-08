<?php
    require_once ("database/conexion.php");
    $mensaje3 = "";
    if(isset($_POST["btn-deseados"])){
        if(!empty($_SESSION["cuenta"])){
            switch($_POST["btn-deseados"]){
                case "agregar":
                    $idProducto = $_POST["id"];
                    $idUsuario = $_SESSION["cuenta"]["id_usuario"];
                    if(!insertarProductosDeseados($idProducto,$idUsuario)){
                        $mensaje3 = "show";
                    }
                    else{
                        $mensaje3 = "error";
                    }
                break;
                case "eliminar":
                    $id = $_POST["id-producto"];

                    eliminarListaDeseados($id, $_SESSION["cuenta"]["id_usuario"]);
                break;
            }
        }
        else{
            $mensaje3="No hay sesion";
        }
    }

    // Insertar los productos en la lista de deseados
    function insertarProductosDeseados($idProducto, $idUsuario){
        $con = new Conexion();
        $band = false;
        if(buscarProducto($idProducto, $idUsuario)>0){
            $band = true;
        }
        else{
            $sql = "INSERT INTO Deseados VALUES(NULL,'$idProducto',$idUsuario)";
    
            $con->consultaActualizacion($sql);
        }
        return $band;
    }

    // Buscar productos en la lista de deseados
    function buscarProducto($idProducto, $idUsuario){
        $con = new Conexion();

        $sql = "SELECT *FROM Deseados WHERE id_producto='$idProducto' AND id_usuario='$idUsuario'";
        $datos = $con->consulta($sql);
        return count($datos);
    }

    // Obtener la lista de deseados del usuario logeado 
    function obtenerListaDeseados($idUsuario){
        $con = new Conexion();

        $sql = "SELECT d.id_deseados, p.id_producto, p.Nombre, p.Precio,  p.Descripcion, p.Imagen FROM Deseados d 
            INNER JOIN Productos p ON d.id_producto = p.id_producto WHERE d.id_usuario = '$idUsuario'";
        $listaDeseados = $con->consulta($sql);
        return $listaDeseados;
    }

    // Eliminar de la lista de deseadoso
    function eliminarListaDeseados($idLista, $idUsuario){
        $con = new Conexion();
        $sql = "DELETE FROM Deseados WHERE id_deseados= '$idLista' AND id_usuario = '$idUsuario'";

        $con->consultaActualizacion($sql);
    }

?>
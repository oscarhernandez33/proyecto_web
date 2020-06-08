<?php
    require_once ("../global/config.php");
    require_once ("Process_productos.php");
    
    $mensaje = ""; //Respuesta del servidor

    session_start();
    if(isset($_POST)){
        $var = $_POST["id"];
        $cantidadProductoCarrito = $_POST["cantidadProducto"];
        
        if(is_numeric(openssl_decrypt($_POST["id"],COD,KEY))){
            $id_producto = openssl_decrypt($_POST["id"],COD,KEY);
            $mensaje.="is numeric";

            $pro = new Process_productos("../"); //Procesos productos

            // Obtener los datos del producto
            $infoProducto = $pro -> obtenerProducto($id_producto);

            $nombre = $infoProducto[1];
            $precio = $infoProducto[2];
            $imagen = $infoProducto[6];

            // Array de remplazo
            $arrayRemplazo = array(
                "id"=>$id_producto,
                "nombre"=>$nombre,
                "precio"=>$precio,
                "cantidad"=>$cantidadProductoCarrito,
                "imagen"=>$imagen
            );

            foreach($_SESSION["carrito"] as $indice=>$producto){
                // Comprobar si los id son iguales
                if($producto["id"]==$id_producto){
                    $_SESSION["carrito"][$indice] = $arrayRemplazo;
                }
            }
            $mensaje.="todo bien";
        }
        echo $mensaje;

    }
?>

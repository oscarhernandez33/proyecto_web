<?php
    require_once "processes/Process_productos.php";
    session_start(); // Inicializar variables de sesión
    $pro = new Process_productos(""); //Procesos productos

    $mensaje = "";
    $mensaje2= "";

    if(isset($_POST["btn-action"])){
        switch ($_POST["btn-action"]) {
            case 'agregar':

                // Validando que el dato enviado sea correcto 
                if(is_numeric(openssl_decrypt($_POST["id"],COD,KEY))){
                    $id_producto = openssl_decrypt($_POST["id"],COD,KEY);

                    // Obtener los datos del producto
                    $infoProducto = $pro -> obtenerProducto($id_producto);

                    $nombre = $infoProducto[1];
                    $precio = $infoProducto[2];
                    $cantidad = 1;
                    $imagen = $infoProducto[6];
                }
                else{
                    $mensaje.= "id incorrecto";
                    die();
                }
                
                // Ingresar productos en un array del carrito de compras
                $mensaje2 = "show";
                if(!isset($_SESSION["carrito"])){
                    $producto = array(
                        "id"=>$id_producto,
                        "nombre"=>$nombre,
                        "precio"=>$precio,
                        "cantidad"=>$cantidad,
                        "imagen"=>$imagen
                    );
                    $_SESSION["carrito"][0]=$producto;
                }
                else{
                    $cantidadProductos = count($_SESSION["carrito"]); // Obtener la cantidad de productos en el carrito
                    $cantidadProducto=0;
                    $band=false;
                    foreach($_SESSION["carrito"] as $indice=>$producto){
                        // Comprobar si los id son iguales
                        if($producto["id"]==$id_producto){
                            $band=true;
                            $cantidadProducto = $cantidad+$producto["cantidad"]; // Sumar cantidad del producto

                            $infoProducto = $pro -> obtenerProducto($id_producto);

                            $cantidadActual = $infoProducto[5];
                            if($cantidadProducto<=$cantidadActual){
                                // Array de reemplazo
                                $arrayRemplazo = array(
                                    "id"=>$id_producto,
                                    "nombre"=>$nombre,
                                    "precio"=>$precio,
                                    "cantidad"=>$cantidadProducto,
                                    "imagen"=>$imagen
                                );
                                $_SESSION["carrito"][$indice] = $arrayRemplazo;
                            }
                            else{
                                $mensaje2 = "error";
                            }
                        }
                    }
                    if(!$band){
                        $producto = array(
                            "id"=>$id_producto,
                            "nombre"=>$nombre,
                            "precio"=>$precio,
                            "cantidad"=>$cantidad,
                            "imagen"=>$imagen
                        );
                        $_SESSION["carrito"][$cantidadProductos]=$producto;
                    }
                }
                $mensaje = print_r($_SESSION,true);
            break;
            case "eliminar":
                // Validando que el dato enviado sea correcto 
                if(is_numeric(openssl_decrypt($_POST["id"],COD,KEY))){
                    $id_producto = openssl_decrypt($_POST["id"],COD,KEY);

                    // Recorriendo los elmentos de la variable de sesión carrito
                    foreach($_SESSION["carrito"] as $indice=>$producto){
                        // Validar si los id son iguales o no para borrar
                        if($producto["id"]==$id_producto){
                            unset($_SESSION["carrito"][$indice]); // Borrando el elemento del array
                        }
                    }
                }
                else{
                    $mensaje.= "id incorrecto";
                    die();
                }
            break;
            case "vaciar":
                unset($_SESSION["carrito"]);
            break;
        }
    }
?>
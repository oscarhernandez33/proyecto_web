<?php
    // Clase de pedidos de los productos
    class Pedido{

        private $con; // Variable de conexion

        public function __construct($dir){
            require_once $dir."database/Conexion.php";
            $this->con = new Conexion(); // Instanciando la conexion
        }

        // Insertar pedido en la base de datos
        public function insertarPedido($nombre,$clavePedido,$email,$telefono,$cantidadProductosCarrito, $Total){
            $fecha = date("d")."/".date("m")."/".date("Y");

            $sql = "INSERT INTO Pedidos VALUES(NULL,'$clavePedido','$nombre','$email','$telefono','$fecha','$cantidadProductosCarrito','$Total')";
            $this->con->consultaActualizacion($sql);
        }

        // Insertar el detalle del pedido
        public function insertarDetalle($clavePedido,$nombreProducto,$precioProducto,$cantidadProducto,$imgProducto){
            $datos = $this->obtenerPedido($clavePedido);   
            
            $idPedido = $datos[0];

            $sql = "INSERT INTO Detalle_Pedido VALUES(NULL,$idPedido,'$nombreProducto','$precioProducto','$cantidadProducto')";
            $this->con->consultaActualizacion($sql);
        }

        // Obtener un sólo pedido
        public function obtenerPedido($clavePedido){
            $sql = "SELECT *FROM Pedidos WHERE Clave = '$clavePedido'";

            $datos = $this->con->consulta($sql);
            return $datos[0];
        } 

        // Obtener todos los pedidos
        public function obtenerPedidos(){
            $sql = "SELECT *FROM Pedidos";

            $datos = $this->con->consulta($sql);
            return $datos;
        } 
    }
?>
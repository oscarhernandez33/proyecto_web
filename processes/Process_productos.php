<?php

    class Process_productos{
        
        private $con; 

        // Constructor de la clase
        public function __construct($dir){
            require_once $dir."database/Conexion.php";
            $this->con = new Conexion(); // Instanciando la conexion
        }

        public function insertarProducto($sql){
            $this->con->consultaActualizacion($sql);
        }

        // Obteniendo todos los productos
        public function obtenerProductos($condicion){ 
            $sql = "SELECT *FROM Productos ".$condicion."";
            $productos = $this->con->consulta($sql);
            return $productos;
        }

        // Obtener un sólo producto por ID
        public function obtenerProducto($id){
            $sql = "SELECT *FROM Productos WHERE id_producto= ".$id."";
            $productos = $this->con->consulta($sql);
            $producto = $productos[0];
            return $producto;
        }

        // Calcular cantidades para la paginación de productos
        public function paginarProductos($productosPorPagina, $condicion){
            $cantidadProductos =count($this->obtenerProductos($condicion)); // Obteniendo el número de productos
            $numeroPaginas = ceil($cantidadProductos/$productosPorPagina);
            return $numeroPaginas;
        }

        // Obtener productos por intervalos para la paginación
        public function obtenerProductosLimit($productosPorPagina, $intervaloInicio, $condicion){
            $intervaloDeInicio = "".$intervaloInicio; // Convertir a String
            $sql = "SELECT *FROM Productos ".$condicion." LIMIT ".$intervaloDeInicio.",".$productosPorPagina."";

            $productosLimite = $this->con->consulta($sql);
            return $productosLimite;
        }

        // Buscar productos
        public function buscarProductos($busqueda){
            $sql = "SELECT *FROM Productos WHERE Nombre LIKE '%".$busqueda."%' 
            OR Descripcion LIKE '%".$busqueda."%' OR Categoria LIKE '%".$busqueda."%'";
            
            $resultadoBusqueda = $this->con->consulta($sql);
            return $resultadoBusqueda;
        }

        //Editar Producto
        public function editarProducto($sql){
            $this->con->consultaActualizacion($sql);
        }

        //Borrar Productos
        public function borrarProductos($id){
            $this->borrarProductoRelacion($id);
            $sql = "DELETE FROM Productos WHERE id_producto = '$id'";
            $this->con->consultaActualizacion($sql);
        }

        // Borrar el id del producto en las tablas foraneas
        public function borrarProductoRelacion($id){
            $sql1 = "DELETE FROM Deseados WHERE id_producto = '$id'";
            $sql2 = "DELETE FROM Comentarios WHERE id_producto = '$id'";    
            
            $this->con->consultaActualizacion($sql1);
            $this->con->consultaActualizacion($sql2);
        }

        // Obtener categorias de productos
        public function obtenerCategorias(){
            $sql = "SELECT *FROM Categoria";
            $categorias = $this->con->consulta($sql);
            return $categorias;
        }
    }
?>
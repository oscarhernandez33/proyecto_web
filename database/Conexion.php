<?php

    class Conexion{

        // Variables de conexión a la base de datos
        private $connection;
        private $host = "localhost";
        private $user = "root";
        private $password = "";
        private $database = "tienda";

        public function __construct(){
            $this->connection = new mysqli($this->host,$this->user,$this->password,$this->database);

            if(!$this->connection){
                echo "error al conectarse en la base de datos";
            }
        }

        // Función que ejecuta consultas con retorno
        public function consulta($sql){
            $datos = $this->connection->query($sql);
            return $datos->fetch_all(); // retornando todos los registros
        }

        // Funcion que ejecuta consultas con actualización
        public function consultaActualizacion($sql){
            $this->connection->query($sql);
        }

        public function caracteresValidos($dato){
            return $this->connection->real_escape_string($dato);
        }

        public function cerrarConexion(){
            $this->connection->close();
        }
    }

?>
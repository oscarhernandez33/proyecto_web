<?php

    class Login{
        
        private $con; // variable de conexión

        public function __construct(){
            require_once "database/Conexion.php";
            $this->con = new Conexion(); // Instanciando la conexion
        }

        // Función que inserta un usuario en la base de datos
        public function insertarUsuario($nombre, $email, $password){
            $band = false;
            $password_cifrado = password_hash($password, PASSWORD_DEFAULT); // Encriptando contraseña
            $sql = "INSERT INTO Usuarios VALUES (NULL,'$nombre','$email','$password_cifrado')";

            if(!$this->buscarUsuario($email)){
                $this->con->consultaActualizacion($sql);
                $band = true;
            }
            return $band;
        }

        // Obtener datos Usuario
        public function obtenerDatosUsuario($email){
            $sql = "SELECT *FROM Usuarios WHERE Email = '$email'";
            $datos = $this->con->consulta($sql);
            $datosUsuario = $datos[0];
            return $datosUsuario;
        }

        // Buscando un usuario por medio del email
        public function buscarUsuario($email){
            $band = false;

            $sql = "SELECT *FROM Usuarios";

            $datosUsuarios = $this->con->consulta($sql); 
            foreach($datosUsuarios as $indice=>$datos){
                if($datos[2] == $email){
                    $band = true;
                }
            }
            return $band;
        }

        // Función que valida la sesión para ingresar
        public function validarSesion($email, $password){
            $band = false;
            
            $sql = "SELECT *FROM Usuarios";

            $datosUsuarios = $this->con->consulta($sql); 
            foreach($datosUsuarios as $indice=>$datos){
                if($datos[2] == $email && password_verify($password, $datos[3])){
                    $band = true;
                }
            }
            return $band;
        }

        // Actualizar usuario
        public function actualizarUsuario($usuario, $idUsuario){
            $sql = "UPDATE Usuarios SET Nombre_Usuario = '$usuario' WHERE id_usuario = ".$idUsuario;
            $this->con->consultaActualizacion($sql);
            $_SESSION["cuenta"]["usuario"] = $usuario;
        }

        // Actualizar contraseña
        public function actualizarPassword($passActual, $newPass, $email, $idUsuario){
            $band = false;
            if($this->validarSesion($email, $passActual)){
                $band = true;
                $newPassCifrado =  password_hash($newPass, PASSWORD_DEFAULT); // Encriptando contraseña

                $sql = "UPDATE Usuarios SET Pass = '$newPassCifrado' WHERE id_usuario = ".$idUsuario;
                $this->con->consultaActualizacion($sql);
            }
            return $band;
        } 
    }

?>
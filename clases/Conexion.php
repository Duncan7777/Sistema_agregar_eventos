<?php
    class Conexion {
        public $servidor = 'localhost';
        public $usuario = 'root';
        public $password = '12345';
        public $database = 'sei';
        public $port = 3306;

        public function conectar() {
            return mysqli_connect(
                $this->servidor,
                $this->usuario,
                $this->password,
                $this->database,
                $this->port
            );
        }
    }

?>
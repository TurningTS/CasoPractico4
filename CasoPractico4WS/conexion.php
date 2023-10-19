<?php
    class Conexion extends PDO {
        private $hostBD = 'localhost';
        private $nombreBD ='lugar';
        private $usuarioBD = 'root';
        private $passBD = '';
        public function __construct()
        {
            try {
                parent::__construct('mysql:host='.$this->hostBD.';dbname='.$this->nombreBD.
                ';charset=UTF8',$this->usuarioBD,$this->passBD,
                array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            } catch (Exception $th) {
                echo 'error:'.$th->getMessage();
                exit;
            }
        }
    }
?>
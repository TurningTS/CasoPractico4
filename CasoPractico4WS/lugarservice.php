<?php
    class Restaurante{
        //Create
        public function InsertarRestaurante($nombre,$cocina,$precio,$calificacion){
            include 'conexion.php';
            $conectar = new Conexion();
            $consulta = $conectar->prepare("INSERT INTO restaurante
            (Nombre,Cocina,Precio,Calificacion)Values(:nombre,:cocina,:precio,:calificacion)");
            $consulta->bindParam(":nombre",$nombre,PDO::PARAM_STR);
            $consulta->bindParam(":cocina",$cocina,PDO::PARAM_STR);
            $consulta->bindParam(":precio",$precio,PDO::PARAM_STR);
            $consulta->bindParam(":calificacion",$calificacion,PDO::PARAM_STR);
            $consulta->execute();
            return 1;
        }
        //Read
        public function ObtenerRestaurantes($valor){
            include 'conexion.php';
            $conectar = new Conexion();
            if($valor == "todos"){
                $consulta = $conectar->prepare("SELECT * FROM restaurante");
                $consulta->execute();
                $consulta->setFetchMode(PDO::FETCH_ASSOC);
                return $consulta->fetchAll();
            }
            $consulta = $conectar->prepare("SELECT * FROM restaurante WHERE Id=:id");
            $consulta->bindParam(":id",$valor,PDO::PARAM_STR);
            $consulta->execute();
            $consulta->setFetchMode(PDO::FETCH_ASSOC);
            return $consulta->fetchAll();
        }
        //Update
        public function ModificarRestaurante($id,$nombre,$cocina,$precio,$calificacion){
            include 'conexion.php';
            $conectar = new Conexion();
            $consulta = $conectar->prepare("UPDATE restaurante SET Nombre=:nombre, 
            Cocina=:cocina, Precio=:precio, Calificacion=:calificacion WHERE Id=:id");
            $consulta->bindParam(":id",$id,PDO::PARAM_STR);
            $consulta->bindParam(":nombre",$nombre,PDO::PARAM_STR);
            $consulta->bindParam(":cocina",$cocina,PDO::PARAM_STR);
            $consulta->bindParam(":precio",$precio,PDO::PARAM_STR);
            $consulta->bindParam(":calificacion",$calificacion,PDO::PARAM_STR);
            $consulta->execute();
            return 1;
        }
        //Delete
        public function EliminarRestaurante($id){
            include 'conexion.php';
            $conectar = new Conexion();
            $consulta = $conectar->prepare("DELETE FROM restaurante WHERE Id=:id");
            $consulta->bindParam(":id",$id,PDO::PARAM_STR);
            $consulta->execute();
            return 1;
        }
    }
    try {
        $server = new SoapServer(
            null,
            ['uri'=>'http://localhost/SW/CasoPractico4WS/lugarservice.php',]
        );
        $server->setClass('Restaurante');
        $server->handle();
    } catch(SoapFault $e) {
        echo 'Error: '.$e->getMessage();
        exit;
    }
?>
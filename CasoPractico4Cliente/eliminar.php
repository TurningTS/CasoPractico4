<?php
    $id =$_GET['id'];
    $cliente = new SoapClient(
        null,array(
            'location'=>'https://casopractico4equipo4.000webhostapp.com/lugarservice.php',
            'uri'=>'https://casopractico4equipo4.000webhostapp.com/lugarservice.php',
            'trace'=>1
        )
    );
    try {
        $respuesta = $cliente-> __soapCall("EliminarRestaurante",[$id]);
        if($respuesta==1){
            header("Location: index.php?success= Restaurante eliminado exitosamente");
            exit();
        }
        else {
            header("Location: index.php?error= Error");
            exit();
        }
    } catch (SoapFault $e) {
        echo $e->getMessage();
    }
?>
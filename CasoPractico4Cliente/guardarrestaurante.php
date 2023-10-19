<?php
    $nombre=$_POST['nombre'];
    $cocina=$_POST['cocina'];
    $precio=$_POST['precio'];
    $calificacion=$_POST['calificacion'];
    if (empty($nombre) || empty($cocina) || empty($precio) || empty($calificacion)){
        header("Location: index.php?error= Rellene todos los campos solicitados");
        exit();
    }
    $cliente = new SoapClient(
        null,array(
            'location'=>'https://casopractico4equipo4.000webhostapp.com/lugarservice.php',
            'uri'=>'https://casopractico4equipo4.000webhostapp.com/lugarservice.php',
            'trace'=>1
        )
    );
    try {
        $respuesta = $cliente-> __soapCall("InsertarRestaurante",[$nombre,$cocina,$precio,$calificacion]);
        if($respuesta==1){
            header("Location: index.php?success= Registro exitoso");
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
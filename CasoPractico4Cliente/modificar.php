<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <title>Aplicación CRUD</title>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark fs-3 mb-4" style="color: white; font-size:large">
        <div>Aplicación CRUD</div>
        <div>Equipo 4</div>
    </nav>
    <div class="container">
        <div class="mb-3">
            <h3>Modificar Restaurante</h3>
            <p class="text-muted">Modifique los apartados necesarios</p>
        </div>
        <div class="container d-flex justify-content-center">
            <form action="modificarrestaurante.php" method="post" style="width: 75vw;">
                <?php
                    $id = $_GET['id']; 
                    $cliente = new SoapClient(
                        null,array(
                            'location'=>'https://casopractico4equipo4.000webhostapp.com/lugarservice.php',
                            'uri'=>'https://casopractico4equipo4.000webhostapp.com/lugarservice.php',
                            'trace'=>1
                        )
                    );
                    try {
                        $respuesta = $cliente-> __soapCall("ObtenerRestaurantes",[$id]);
                        $result=json_encode($respuesta,true);
                        $datos=json_decode($result,true);
                        foreach ($datos as $item) {
                            ?>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label" style="font-weight:bold;">Id: </label>
                                    <input type="text" class="form-control" name="id"
                                    value="<?php echo $item['Id'] ?>" readonly>
                                </div>
                                <div class="col"></div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label" style="font-weight:bold;">Nombre: </label>
                                    <input type="text" class="form-control" name="nombre"
                                    value="<?php echo $item['Nombre'] ?>">
                                </div>
                                <div class="col">
                                    <label class="form-label" style="font-weight:bold;">Cocina: </label>
                                    <input type="text" class="form-control" name="cocina"
                                    value="<?php echo $item['Cocina'] ?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-label" style="font-weight:bold;">Precio: </label>
                                    <input type="text" class="form-control" name="precio"
                                    value="<?php echo $item['Precio'] ?>">
                                </div>
                                <div class="col">
                                    <label class="form-label" style="font-weight:bold;">Calificacion: </label>
                                    <input type="text" class="form-control" name="calificacion"
                                    value="<?php echo $item['Calificacion'] ?>">
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-info">Guardar</button>
                                <a href="index.php" class="btn btn-danger">Regresar</a>
                            </div> 
                            <?php
                        }
                    } catch (Exception $th) {
                        echo 'Error: '.$th->getMessage();
                    }
                ?>
            </form>
        </div>
    </div>
</body>
</html>
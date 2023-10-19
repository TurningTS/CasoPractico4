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
        <?php if(isset($_GET['success'])){ ?>
            <p class="alert alert-success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
        <?php if(isset($_GET['error'])){?>
            <p class="alert alert-danger"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <a href="nuevorestaurante.php" class="btn btn-dark mb-3">Nuevo Restaurante</a>
        <table class="table text-center">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cocina</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Calificación</th>
                    <th scope="col">Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $cliente = new SoapClient(
                        null,array(
                            'location'=>'https://casopractico4equipo4.000webhostapp.com/lugarservice.php',
                            'uri'=>'https://casopractico4equipo4.000webhostapp.com/lugarservice.php',
                            'trace'=>1
                        )
                    );
                    try {
                        $respuesta = $cliente-> __soapCall("ObtenerRestaurantes",["todos"]);
                        $result=json_encode($respuesta,true);
                        $datos=json_decode($result,true);
                        foreach ($datos as $item) {
                            echo '<tr>';
                            echo '<th scope="row">'.$item['Id'].'</td>';
                            echo '<td>'.$item['Nombre'].'</td>';
                            echo '<td>'.$item['Cocina'].'</td>';
                            echo '<td>'.$item['Precio'].'</td>';
                            echo '<td>'.$item['Calificacion'].'</td>';
                            ?>
                            <td>
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                        <a href="modificar.php?id=<?php echo $item['Id'] ?>" class="link-dark">
                                            <img src="svg/pencil.svg"></a>
                                        </div>
                                        <div class="col">
                                        <a href="eliminar.php?id=<?php echo $item['Id'] ?>" class="link-dark" 
                                        onclick="return confirm('¿Deseas eliminar el restaurante?')">
                                        <img src="svg/trash.svg"></a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <?php 
                            echo '</tr>';
                        }
                    } catch (Exception $th) {
                        echo 'Error: '.$th->getMessage();
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
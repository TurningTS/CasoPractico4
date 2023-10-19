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
            <h3>Nuevo Restaurante</h3>
            <p class="text-muted">Llene los siguientes apartados</p>
        </div>
        <div class="container d-flex justify-content-center">
            <form action="guardarrestaurante.php" method="post" style="width: 75vw;">
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label" style="font-weight:bold;">Nombre: </label>
                        <input type="text" class="form-control" name="nombre" placeholder="Chilis">
                    </div>
                    <div class="col">
                        <label class="form-label" style="font-weight:bold;">Cocina: </label>
                        <input type="text" class="form-control" name="cocina" placeholder="Estadounidense">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label class="form-label" style="font-weight:bold;">Precio: </label>
                        <input type="text" class="form-control" name="precio" placeholder="$$">
                    </div>
                    <div class="col">
                        <label class="form-label" style="font-weight:bold;">Calificacion: </label>
                        <input type="text" class="form-control" name="calificacion" placeholder="5.0">
                    </div>
                </div>
                <div>
                    <button type="submit" class="btn btn-info">Guardar</button>
                    <a href="index.php" class="btn btn-danger">Regresar</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
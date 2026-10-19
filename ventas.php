<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine Ciudad - Iniciar Venta</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">
    <div class="container mt-5">
        <a href="index.html" class="btn btn-outline-light mb-3">Inicio</a>

        <h1>Iniciar Venta</h1>

        <form method="post">
            <div class="mb-3">
                <label>Fecha venta</label>
                <input type="date" name="fecha" class="form-control">
            </div>

            <div class="mb-3">
                <label>Medio de pago</label>
                <input type="text" name="pago" class="form-control">
            </div>

            <div class="mb-3">
                <label>Total venta</label>
                <input type="number" name="total" class="form-control">
            </div>

            <input type="submit" name="agregar" value="Guardar" class="btn btn-success">
        </form>

        <?php
        // Conexión a la base 
        if (isset($_POST["agregar"])) {

            $nombre_bd = "cine_ciudad";
            $servidor = "localhost";
            $usuario = "root";
            $contraseña = "";

            $Fecha_venta = $_POST["fecha"];
            $Medio_pago = $_POST["pago"];
            $Total_venta = $_POST["total"];

            $conexion = mysqli_connect($servidor, $usuario, $contraseña, $nombre_bd);

            $sql = "INSERT INTO `ventas`(`fecha_venta`, `medio_pago`, `total_venta`) 
                    VALUES ('$Fecha_venta','$Medio_pago','$Total_venta')";

            $resultado = mysqli_query($conexion, $sql);

            if ($resultado == "true") {
                echo "<div class='alert alert-success mt-3'>Se ha iniciado la venta correctamente.</div>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Error de conexión o al guardar los datos.</div>";
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

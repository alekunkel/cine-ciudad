<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Clientes</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">
    <div class="container mt-5">
        <a href="index.html" class="btn btn-outline-light mb-3">Inicio</a>

        <h1>Eliminar Clientes</h1>

        <form method="post">
            <div class="mb-3">
                <label for="codigo">ID del Cliente</label>
                <input type="text" name="codigo" class="form-control" required>
            </div>
            <input type="submit" name="eliminar" value="Eliminar" class="btn btn-danger">
        </form>

        <?php
        // Conexión a la base de datos y eliminación
        if (isset($_POST["eliminar"])) {
            $nombre_bd = "cine_ciudad";
            $servidor = "localhost";
            $usuario = "root";
            $contraseña = "";

            $codigo = $_POST["codigo"];

            $conexion = mysqli_connect($servidor, $usuario, $contraseña, $nombre_bd);
            $sql = "DELETE FROM `clientes` WHERE id_cliente = $codigo";

            $resultado = mysqli_query($conexion, $sql);

            if ($resultado == "true") {
                echo "<div class='alert alert-success mt-3'>Cliente eliminado correctamente.</div>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Error al eliminar el cliente o conexión fallida.</div>";
            }
        }
        ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Productos</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">
    <div class="container mt-5">
        <a href="index.html" class="btn btn-outline-light mb-3">Inicio</a>

        <h1>Listado de Productos</h1>

        <div class="table-responsive">
            <table class="table table-bordered table-hover table-dark">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Sección</th>
                        <th>Precio</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    // Conexión a la base 
                    $nombre_bd = "cine_ciudad";
                    $servidor = "localhost";
                    $usuario = "root";
                    $contraseña = "";

                    $conexion = mysqli_connect($servidor, $usuario, $contraseña, $nombre_bd);
                    $sql = "SELECT * FROM `productos`";

                    $resultado = mysqli_query($conexion, $sql);

                    while ($datos = mysqli_fetch_row($resultado)) {
                        echo "<tr>";
                        foreach ($datos as $dato) {
                            echo "<td>" . htmlspecialchars($dato) . "</td>";
                        }
                        echo "</tr>";
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

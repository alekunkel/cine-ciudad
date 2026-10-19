<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Productos</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">

    <div class="container mt-5">
        <a href="index.html" class="btn btn-outline-light mb-3">Inicio</a>

        <h1>Modificar Productos</h1>

        <form method="post">
            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control">
            </div>

            <div class="mb-3">
                <label>Sección</label>
                <input type="text" name="seccion" class="form-control">
            </div>

            <div class="mb-3">
                <label>Precio</label>
                <input type="number" name="precio" class="form-control">
            </div>

            <div class="mb-3">
                <label>Stock</label>
                <input type="number" name="stock" class="form-control">
            </div>

            <input type="submit" name="modificar" value="Modificar" class="btn btn-warning">
        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Conexión a la base 
if (isset($_POST["modificar"])) {

    $nombre_bd = "cine_ciudad";
    $servidor = "localhost";
    $usuario = "root";
    $contraseña = "";

    $Nombre = $_POST["nombre"];
    $Seccion = $_POST["seccion"];
    $Precio = $_POST["precio"];
    $Stock = $_POST["stock"];
    $Codigo = $_POST["id"];

    $conexion = mysqli_connect($servidor, $usuario, $contraseña, $nombre_bd);

    $sql = "UPDATE `productos` SET `nombre`='$Nombre', `seccion`='$Seccion', `precio`='$Precio', `stock`='$Stock' WHERE id_producto = '$Codigo'";

    $resultado = mysqli_query($conexion, $sql);

    if ($resultado == "true") {
        echo "<div class='alert alert-success text-center mt-3'>Se han modificado correctamente los datos.</div>";
    } else {
        echo "<div class='alert alert-danger text-center mt-3'>Error de conexión.</div>";
    }
}
?>

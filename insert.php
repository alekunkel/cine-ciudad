<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine Ciudad</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white">

    <div class="container mt-5">
        <a href="index.html" class="btn btn-outline-light mb-3">Inicio</a>

        <h1>Agregar Clientes</h1>

        <form method="post">
            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control">
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="text" name="email" class="form-control">
            </div>

            <div class="mb-3">
                <label>Teléfono</label>
                <input type="number" name="telefono" class="form-control">
            </div>

            <div class="mb-3">
                <label>Fecha de Registro</label>
                <input type="date" name="fecha" class="form-control">
            </div>

            <input type="submit" name="agregar" value="Guardar" class="btn btn-success">
        </form>

        <br>

        <?php
        // Conexión a la base
        if(isset($_POST["agregar"])){
            $nombre_bd = "cine_ciudad";
            $servidor = "localhost";
            $usuario = "root";
            $contraseña = "";

            $Nombre = $_POST["nombre"];
            $Email = $_POST["email"];
            $Telefono = $_POST["telefono"];
            $Fecha_registro = $_POST["fecha"];

            $conexion = mysqli_connect($servidor, $usuario, $contraseña, $nombre_bd);
            $sql = "INSERT INTO `clientes`(`nombre`, `email`, `telefono`, `fecha_registro`) 
                    VALUES ('$Nombre','$Email','$Telefono','$Fecha_registro')";

            $resultado = mysqli_query($conexion, $sql);

            if($resultado == "true"){
                echo "<div class='alert alert-success mt-3'>Se han agregado correctamente los clientes.</div>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Error de conexión.</div>";
            }
        }
        ?>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

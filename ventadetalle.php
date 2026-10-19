<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cine Ciudad - detalle de venta</title>
</head>
<body>
     <a href="index.html">inicio</a>
    <h1>detalle venta</h1>
    <form method="post">
        <label for="">Fecha venta</label>
        <input type="date" name="fecha"><br>
        <label for="">producto</label>
        <input type="text" name="producto"><br>
        <label for="">cliente</label>
        <input type="text" name="cliente"><br>
        <label for="">medio de pago</label>
        <input type="text" name="pago"><br>
        <label for="">Precio</label>
        <input type="number" name="precio"><br>
        <label for="">cantidad</label>
        <input type="number" name="cantidad"><br>
        <label for="">total de la venta</label>
        <input type="number" name="total"><br>
        <input type="submit" name="agregar" value="Guardar">
    </form>

<?php

//conexion a la base 
if(isset($_POST["agregar"])){

    $nombre_bd = "cine_ciudad";
    $servidor = "localhost";
    $usuario = "root";
    $contraseña = "";

$Fecha_venta = $_POST["fecha"];
$Producto = $_POST["producto"];
$Cliente = $_POST["cliente"];
$Medio_pago= $_POST["pago"];
$Precio = $_POST["precio"];
$Cantidad = $_POST["cantidad"];
$Total_venta = $_POST["total"];

$conexion = mysqli_connect($servidor,$usuario,$contraseña,$nombre_bd);
    $sql = "SELECT dv.id_detalle, v.fecha_venta , p.nombre AS PRODUCTO,  c.nombre AS CLIENTE, v.medio_pago, dv.precio_unitario, dv.cantidad, v.total_venta FROM detalle_ventas dv
    INNER JOIN ventas v ON v.id_venta = dv.id_venta
    INNER JOIN productos p ON p.id_producto= dv.id_producto
    INNER JOIN clientes c ON c.id_cliente = v.id_cliente ORDER BY dv.id_detalle ASC";

$resultado = mysqli_query($conexion,$sql);

if($resultado=="true"){
    echo "<tr>";
    echo "<td>" . $datos[0] . "<br>" . "</td>";
    echo "<td>" . $datos[1] . "<br>" . "</td>";
    echo "<td>" . $datos[2] . "<br>" . "</td>";
    echo "<td>" . $datos[3] . "<br>". "</td>";
    echo "<td>" . $datos[4] . "<br>". "</td>";
    echo "<td>" . $datos[5] . "<br>". "</td>";
    echo "<td>" . $datos[6] . "<br>". "</td>";
    echo "<td>" . $datos[7] . "<br>". "</td>";
    echo "</tr>";
}else{
    echo "error de conexion";
}

}
?>

<?php
include("../config/conexion.php");

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

mysqli_query($conexion, 
"INSERT INTO clientes (nombre, telefono, correo)
VALUES ('$nombre','$telefono','$correo')");

header("Location: index.php");

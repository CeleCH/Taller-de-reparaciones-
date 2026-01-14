
<?php
include("../config/conexion.php");

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];

mysqli_query($conexion,
"UPDATE clientes SET
 nombre='$nombre',
 telefono='$telefono',
 correo='$correo'
 WHERE id=$id");

header("Location: index.php");

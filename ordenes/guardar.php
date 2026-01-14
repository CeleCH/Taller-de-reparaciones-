
<?php
include("../config/conexion.php");

$cliente_id = $_POST['cliente_id'];
$problema = $_POST['problema'];

mysqli_query($conexion,
"INSERT INTO ordenes (cliente_id, problema)
VALUES ('$cliente_id','$problema')");

header("Location: index.php");

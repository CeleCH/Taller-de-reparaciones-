
<?php
include("../config/conexion.php");

$id = $_GET['id'];
$estado = $_GET['estado'];

mysqli_query($conexion,
"UPDATE ordenes SET estado='$estado' WHERE id=$id");

header("Location: index.php");

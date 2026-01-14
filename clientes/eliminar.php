
<?php
include("../config/conexion.php");

$id = $_GET['id'];

mysqli_query($conexion, "DELETE FROM clientes WHERE id=$id");

header("Location: index.php");

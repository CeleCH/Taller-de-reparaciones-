
<?php
include("../config/conexion.php");

$orden_id = $_POST['orden_id'];
$tecnico_id = $_POST['tecnico_id'];

mysqli_query($conexion,
"UPDATE ordenes SET tecnico_id=$tecnico_id WHERE id=$orden_id");

header("Location: index.php");

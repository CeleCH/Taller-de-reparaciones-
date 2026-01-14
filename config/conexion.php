
<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "taller_db";

$conexion = mysqli_connect($host, $user, $pass, $db);

if(!$conexion){
    die("Error de conexión");
}
?>

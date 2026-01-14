
<?php
session_start();
include("../config/conexion.php");

$email = $_POST['email'];
$pass  = $_POST['password'];

$sql = "SELECT * FROM usuarios WHERE email='$email' AND estado=1";
$res = mysqli_query($conexion, $sql);
$user = mysqli_fetch_assoc($res);

if($user && password_verify($pass, $user['password'])){
    $_SESSION['usuario'] = $user;
    header("Location: ../dashboard/index.php");
} else {
    echo "Correo o contraseña incorrectos";
}

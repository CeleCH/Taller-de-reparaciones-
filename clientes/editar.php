
<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: ../login/login.php");
    exit;
}

include("../config/conexion.php");

$id = $_GET['id'];
$cliente = mysqli_query($conexion, "SELECT * FROM clientes WHERE id=$id");
$data = mysqli_fetch_assoc($cliente);
?>

<!DOCTYPE html>
<html>
<head>
<title>Editar Cliente</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h3>Editar Cliente</h3>

  <form action="actualizar.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

    <input class="form-control mb-2" name="nombre" value="<?php echo $data['nombre']; ?>" required>
    <input class="form-control mb-2" name="telefono" value="<?php echo $data['telefono']; ?>">
    <input class="form-control mb-2" name="correo" value="<?php echo $data['correo']; ?>">

    <button class="btn btn-warning">Actualizar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>

</body>
</html>

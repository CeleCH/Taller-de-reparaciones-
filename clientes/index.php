
<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: ../login/login.php");
    exit;
}
include("../config/conexion.php");

$clientes = mysqli_query($conexion, "SELECT * FROM clientes");
?>

<!DOCTYPE html>
<html>
<head>
<title>Clientes</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h3>Clientes</h3>
  <a href="../dashboard/index.php" class="btn btn-secondary mb-3">
  ← Volver al Dashboard
</a>


  <a href="crear.php" class="btn btn-primary mb-3">+ Nuevo Cliente</a>

  <table class="table table-bordered">
    <tr>
      <th>Nombre</th>
      <th>Teléfono</th>
      <th>Correo</th>
      <th>Acciones</th>
    </tr>

    <?php while($c = mysqli_fetch_assoc($clientes)) { ?>
    <tr>
      <td><?php echo $c['nombre']; ?></td>
      <td><?php echo $c['telefono']; ?></td>
      <td><?php echo $c['correo']; ?></td>
      <td>
        <a href="editar.php?id=<?php echo $c['id']; ?>" class="btn btn-sm btn-warning">
        Editar
        </a>

        
        <a href="eliminar.php?id=<?php echo $c['id']; ?>" 
   class="btn btn-sm btn-danger"
   onclick="return confirm('¿Seguro que deseas eliminar este cliente?');">
      Eliminar
    </a>

      </td>
    </tr>
    <?php } ?>

  </table>
</div>

</body>
</html>

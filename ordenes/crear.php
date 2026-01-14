
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
<title>Nueva Orden</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h3>Nueva Orden de Reparación</h3>

  <form action="guardar.php" method="POST">

    <label>Cliente</label>
    <select name="cliente_id" class="form-control mb-2" required>
      <option value="">Seleccione cliente</option>
      <?php while($c = mysqli_fetch_assoc($clientes)) { ?>
        <option value="<?php echo $c['id']; ?>">
          <?php echo $c['nombre']; ?>
        </option>
      <?php } ?>
    </select>

    <label>Problema</label>
    <textarea name="problema" class="form-control mb-2" required></textarea>

    <button class="btn btn-success">Guardar Orden</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>

  </form>
</div>

</body>
</html>


<?php
include("../config/conexion.php");

$id = $_GET['id'];

$orden = mysqli_fetch_assoc(
  mysqli_query($conexion, "SELECT * FROM ordenes WHERE id=$id")
);

$tecnicos = mysqli_query($conexion, "SELECT * FROM tecnicos");
?>

<!DOCTYPE html>
<html>
<head>
<title>Asignar Técnico</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h3>Asignar Técnico</h3>

  <form action="guardar_tecnico.php" method="POST">
    <input type="hidden" name="orden_id" value="<?php echo $id; ?>">

    <label>Técnico</label>
    <select name="tecnico_id" class="form-control mb-3" required>
      <option value="">Seleccione técnico</option>
      <?php while($t = mysqli_fetch_assoc($tecnicos)) { ?>
        <option value="<?php echo $t['id']; ?>">
          <?php echo $t['nombre']; ?>
        </option>
      <?php } ?>
    </select>

    <button class="btn btn-success">Asignar</button>
    <a href="index.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>

</body>
</html>


<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: ../login/login.php");
    exit;
}

include("../config/conexion.php");

$reporte = mysqli_query($conexion, "
SELECT estado, COUNT(*) AS total
FROM ordenes
GROUP BY estado
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Reporte por Estado</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h3>Órdenes por Estado</h3>

  <table class="table table-bordered">
    <tr>
      <th>Estado</th>
      <th>Total</th>
    </tr>

    <?php while($r = mysqli_fetch_assoc($reporte)) { ?>
    <tr>
      <td><?php echo $r['estado']; ?></td>
      <td><?php echo $r['total']; ?></td>
    </tr>
    <?php } ?>
  </table>

  <a href="../dashboard.php" class="btn btn-secondary">Volver</a>
</div>

</body>
</html>

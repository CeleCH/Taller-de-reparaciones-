
<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: ../login/login.php");
    exit;
}

include("../config/conexion.php");

$reporte = mysqli_query($conexion, "
SELECT DATE(fecha_ingreso) AS fecha, COUNT(*) AS total
FROM ordenes
GROUP BY DATE(fecha_ingreso)
ORDER BY fecha DESC
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Reporte por Fecha</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h3>Órdenes por Fecha</h3>

  <table class="table table-bordered">
    <tr>
      <th>Fecha</th>
      <th>Total de Órdenes</th>
    </tr>

    <?php while($r = mysqli_fetch_assoc($reporte)) { ?>
    <tr>
      <td><?php echo $r['fecha']; ?></td>
      <td><?php echo $r['total']; ?></td>
    </tr>
    <?php } ?>
  </table>

  <a href="../dashboard.php" class="btn btn-secondary">Volver</a>
</div>

</body>
</html>

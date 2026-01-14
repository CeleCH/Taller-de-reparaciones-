<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: ../login/login.php");
    exit;
}
?>

<?php
include("../config/conexion.php");

$totalOrdenes = mysqli_fetch_assoc(
  mysqli_query($conexion, "SELECT COUNT(*) total FROM ordenes")
)['total'];

$totalClientes = mysqli_fetch_assoc(
  mysqli_query($conexion, "SELECT COUNT(*) total FROM clientes")
)['total'];

$totalIngresos = 0;


$recibido = mysqli_fetch_assoc(
  mysqli_query($conexion, "SELECT COUNT(*) total FROM ordenes WHERE estado='recibido'")
)['total'];

$reparacion = mysqli_fetch_assoc(
  mysqli_query($conexion, "SELECT COUNT(*) total FROM ordenes WHERE estado='en reparacion'")
)['total'];

$listo = mysqli_fetch_assoc(
  mysqli_query($conexion, "SELECT COUNT(*) total FROM ordenes WHERE estado='listo'")
)['total'];



?>



<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


</head>
<body>

<nav class="navbar navbar-dark bg-dark px-3">
  <span class="navbar-brand">Sistema Taller</span>
  <span class="text-white">
    <?php echo $_SESSION['usuario']['nombre']; ?>
  </span>
</nav>


<div class="container-fluid mt-3">
  <div class="row">

    <!-- SIDEBAR -->
    <div class="col-md-3">
      <div class="list-group shadow-sm rounded">
        <a href="#" class="list-group-item list-group-item-action active">
  <i class="bi bi-speedometer2 me-2"></i> Dashboard
</a>

        <a href="../clientes/index.php" class="list-group-item list-group-item-action">
  <i class="bi bi-people me-2"></i> Clientes
</a>

        <a href="../ordenes/index.php" class="list-group-item list-group-item-action">
  <i class="bi bi-tools me-2"></i> Órdenes
</a>

        <a href="#" class="list-group-item list-group-item-action">
  <i class="bi bi-cash-coin me-2"></i> Pagos
</a>

        <a href="../login/logout.php" class="list-group-item list-group-item-action text-danger">
  <i class="bi bi-box-arrow-right me-2"></i> Salir
</a>

      </div>
    </div>

    <!-- CONTENIDO -->
    <div class="col-md-9">
     <h3>Dashboard</h3>
<p>Rol: <?php echo $_SESSION['usuario']['rol']; ?></p>

<div class="row mt-4">

  <div class="col-md-4">
    <div class="card text-bg-primary">
      <div class="card-body">
        <h5 class="card-title">Órdenes</h5>
        <p class="card-text fs-3"><?php echo $totalOrdenes; ?></p>

      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card text-bg-success">
      <div class="card-body">
        <h5 class="card-title">Clientes</h5>
        <p class="card-text fs-3"><?php echo $totalClientes; ?></p>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card text-bg-warning">
      <div class="card-body">
        <h5 class="card-title">Ingresos</h5>
        <p class="card-text fs-3">S/ <?php echo number_format($totalIngresos, 2); ?></p>
      </div>
    </div>
  </div>

</div>

<div class="row mt-5">
  <div class="col-md-8">
    <div class="card shadow-sm">
      <div class="card-body">
        <h5 class="card-title">Órdenes por estado</h5>
        <canvas id="graficoEstados"></canvas>
      </div>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('graficoEstados');

new Chart(ctx, {
  type: 'bar',
  data: {
    labels: ['Recibido', 'En reparación', 'Listo'],
    datasets: [{
      label: 'Cantidad de órdenes',
      data: [
        <?php echo $recibido; ?>,
        <?php echo $reparacion; ?>,
        <?php echo $listo; ?>
      ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});
</script>


</body>
</html>

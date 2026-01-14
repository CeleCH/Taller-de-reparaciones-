
<?php
session_start();
if(!isset($_SESSION['usuario'])){
    header("Location: ../login/login.php");
    exit;
}
include("../config/conexion.php");

$ordenes = mysqli_query($conexion, "
SELECT o.*, 
       c.nombre AS cliente,
       t.nombre AS tecnico
FROM ordenes o
JOIN clientes c ON o.cliente_id = c.id
LEFT JOIN tecnicos t ON o.tecnico_id = t.id
");

?>

<!DOCTYPE html>
<html>
<head>
<title>Órdenes</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h3>Órdenes de Reparación</h3>
  <a href="crear.php" class="btn btn-primary mb-3">
  + Nueva Orden
</a>


  <table class="table table-bordered">
    <tr>
       <th>Cliente</th>
      <th>Problema</th>
      <th>Estado</th>
      <th>Fecha</th>
      <th>Acciones</th>
      <th>Técnico</th>

    </tr>

    <?php while($o = mysqli_fetch_assoc($ordenes)) { ?>
    <tr>
      <td><?php echo $o['cliente']; ?></td>
      <td><?php echo $o['problema']; ?></td>
      <td>
  <?php echo $o['tecnico'] ?? 'Sin asignar'; ?>
</td>

      <td>
  <?php
  $estado = $o['estado'];

   if($estado == 'Recibido'){
  echo "<span class='badge bg-warning text-dark'>Recibido</span>";
}
elseif($estado == 'En reparación'){
  echo "<span class='badge bg-primary'>En reparación</span>";
}
elseif($estado == 'Listo'){
  echo "<span class='badge bg-success'>Listo</span>";
}
?>
</td>
     
      <td><?php echo $o['fecha_ingreso']; ?></td>
      <td>
  <a href="estado.php?id=<?php echo $o['id']; ?>&estado=En reparación"
     class="btn btn-warning btn-sm">
     En reparación
  </a>

  <a href="estado.php?id=<?php echo $o['id']; ?>&estado=Listo"
     class="btn btn-success btn-sm">
     Listo
  </a>
   
   <a href="ver.php?id=<?php echo $o['id']; ?>"
   class="btn btn-info btn-sm mb-1">
   Ver detalle
</a>


  <a href="asignar.php?id=<?php echo $o['id']; ?>"
   class="btn btn-dark btn-sm mt-1">
   Asignar técnico
</a>

</td>

    </tr>
    <?php } ?>

  </table>
</div>

</body>
</html>

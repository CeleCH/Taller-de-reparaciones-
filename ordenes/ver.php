
<?php
include("../config/conexion.php");

$id = $_GET['id'];

$orden = mysqli_fetch_assoc(
  mysqli_query($conexion, "
    SELECT o.*,
           c.nombre AS cliente,
           t.nombre AS tecnico
    FROM ordenes o
    JOIN clientes c ON o.cliente_id = c.id
    LEFT JOIN tecnicos t ON o.tecnico_id = t.id
    WHERE o.id = $id
  ")
);
?>

<!DOCTYPE html>
<html>
<head>
<title>Detalle de Orden</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h3>Detalle de la Orden</h3>

  <ul class="list-group">
    <li class="list-group-item"><b>Cliente:</b> <?php echo $orden['cliente']; ?></li>
    <li class="list-group-item"><b>Técnico:</b> <?php echo $orden['tecnico'] ?? 'Sin asignar'; ?></li>
    <li class="list-group-item"><b>Problema:</b> <?php echo $orden['problema']; ?></li>
    <li class="list-group-item"><b>Estado:</b> <?php echo $orden['estado']; ?></li>
    <li class="list-group-item"><b>Fecha:</b> <?php echo $orden['fecha_ingreso']; ?></li>
  </ul>

  <a href="index.php" class="btn btn-secondary mt-3">Volver</a>
  <a href="pdf.php?id=<?php echo $orden['id']; ?>"
   class="btn btn-danger mt-2">
   Generar PDF
</a>

</div>

</body>
</html>

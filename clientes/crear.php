
<!DOCTYPE html>
<html>
<head>
<title>Nuevo Cliente</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
  <h3>Nuevo Cliente</h3>

  <form action="guardar.php" method="POST">
    <input class="form-control mb-2" name="nombre" placeholder="Nombre" required>
    <input class="form-control mb-2" name="telefono" placeholder="Teléfono">
    <input class="form-control mb-2" name="correo" placeholder="Correo">
    <button class="btn btn-success">Guardar</button>
  </form>
</div>

</body>
</html>

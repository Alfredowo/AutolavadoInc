<!DOCTYPE html>
<html>

<head>
  <title>Autolavado</title>
  <meta charset="utf=8">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/normalize.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Kreon:wght@300..700&display=swap" rel="stylesheet">
  <script src="dist/js/bootstrap.min.js"></script>
  <script src="jquery/jquery.min.js"></script>
</head>
<body>
  <ul class="header">

    <li><a class="buttonss" href="vehiculos">Vehiculos</a></li>
    <li><a class="buttonss" href="pagarempleados">Pagar a empleados</a></li>
    <li><a class="buttonss" href="empleados">Empleados</a></li>

    <li><a href="#" class="buttonss"> Ver reportes ▼ </a>
      <ul class="dropdown">
        <li><a href="empleadodia" class="options">Empleado del día</a></li>
        <li><a href="clientesatendidos" class="options">Clientes atendidos</a></li>
        <li><a href="pagos" class="options">Pagos Diarios</a></li>
      </ul>
    </li>

    <li><a class="buttonss cerrar" href="home">Cerrar Sesión</a></li>

  </ul>
  <div><?php echo $view_content; ?></div>
</body>
</html>
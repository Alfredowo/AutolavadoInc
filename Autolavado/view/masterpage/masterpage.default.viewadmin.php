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
  <header class="header">
  <div class="contenedor contenido-header">
    <nav class="menu">
        <a class="buttonss" href="vehiculos">Vehiculos</a>
        <a class="buttonss" href="pagarempleados">Pagar a empleados</a>
        <a class="buttonss" href="empleados">Empleados</a>
        <div class="select-container">
            <select class="buttonss select-custom" onchange="window.location.href=this.value">
                <option class="options" value="#" selected disabled hidden>Registros</option>
                <option class="options" value="empleadodia">Empleado del día</option>
                <option class="options" value="clientesatendidos">Clientes atendidos</option>
                <option class="options" value="pagos">Pagos Diarios</option>
            </select>
        </div>
        <a class="exit buttonss" href="home">Cerrar Sesión</a>
    </nav>
</div>

    </div>
    </header>
  </div>
  <div><?php echo $view_content; ?></div>
</body>
</html>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
</head>
<body>
  <div>
    <nav>
      <a href="vehiculos">Vehiculos</a>
      <a href="pagarempleados">Pagar a empleados</a>
      <a href="empleados">Registrar Empleados</a>
      <a href="">Informes</a>
      <a href="home">Cerrar Sesion</a>
    </nav>
  </div>
  <div><?php echo $view_content; ?></div>
</body>
</html>
<?php 
	session_start();
	require 'config.php';
	require 'libreria/pagos.php';
	$pe = new Pagos();
	$p['res'] = '';
	$p['res']=$pe->Mostrar('%');
	if (isset($_POST['empleado'])) {
		$dc = Pagos::PagarEmpleado($_POST['empleado']);
		$e = Pagos::ObtenerE($_POST['empleado']);
		$pe->Insertar($e[0],$dc[1],$dc[3]);
	}
	ViewA('pagarempleados',$p);
 ?>
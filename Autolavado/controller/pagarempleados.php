<?php 
	session_start();
	require 'config.php';
	require 'libreria/pagos.php';
	$pe = new Pagos();
	$p['result'] = '';
	$p['res']=$pe->Mostrar('%');
	if (isset($_POST['empleado'])) {
		$dc = Pagos::PagarEmpleado($_POST['empleado']);
		$e = Pagos::ObtenerE($_POST['empleado']);
		$pe->Insertar($e[0], $_POST['fecha'], $dc[3]);
		Pagos::EliminarPagaEstimada($e[0], $_POST['fecha']);
		$p['result'] = '<div style="    background-color: #39B154;" class="centrar">Pago correcto</div>';		
	}
	$p['res']=$pe->Mostrar('%');
	ViewA('pagarempleados',$p);

?>
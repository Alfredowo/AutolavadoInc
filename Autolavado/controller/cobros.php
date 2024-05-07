<?php
	session_start();
	require 'config.php';
	require 'libreria/login.php';
	require 'libreria/cobros.php';
	require 'libreria/Icobro.php';
	require 'libreria/auto.php';
	require 'libreria/camioneta.php';
	require 'libreria/tractocamion.php';
	require 'libreria/factory.php';
	$l = new login();
	$c = new Cobros();
	$p['res'] = '';

	if (isset($_POST['username']))
	{
		$dc = login::Verificar($_POST['username']);
		$v = login::Vehiculo('%');
		if ($_POST['username'] == $dc[1] && $_POST['password'] == $dc[2]) {
			if ($dc[3] == 'Empleado') {
				$p['res'] = array(
					'usuario' => $dc[1],
					'ide' => $dc[0],
					'vehiculo' => $v,
				);
				View('cobros',$p);
			}
			elseif ($dc[3] == 'Admin') {
				ViewA('principal',$p);
			}
		}
		else 
		{
			$er = login::MensajeError();
			$p = array();
			ViewLogin('login',$p);
		}
	}
	
	if (isset($_POST['empleado'])) {
		if (isset($_POST['vehiculos'])) {
			$f = login::ObtenerV($_POST['vehiculos']);
			$tipo = Factory::Elegirvehiculo($f[1]);
			$total = $tipo->CalcularCobro($_POST['cantidad'], $f[3]);
			$m = login::Mensaje($total);
			$c->Insertar($_POST['cliente'],$_POST['empleado'],$_POST['vehiculos'],$_POST['cantidad'], $_POST['fecha'],$total);
			$dc = login::Obtener($_POST['empleado']);
			$v = login::Vehiculo('%');
			$p['res'] = array(
				'usuario' => $dc[1],
				'ide' => $dc[0],
				'vehiculo' => $v,
			);
			View('cobros',$p);
		}
		
	}
?>

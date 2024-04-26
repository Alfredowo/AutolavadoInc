<?php 
	session_start();
	require 'config.php';
    require 'libreria/empleadodia.php';

	$empleados = new Empleados();
	$p['resultado'] = $empleados->Mostrar('%');
	
	ViewA('empleadodia',$p);
 ?>

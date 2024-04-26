<?php 
	session_start();
	require 'config.php';
    require 'libreria/empleados.php';

	$empleados = new Empleados();
	$p['resultado'] = $empleados->Mostrar('%');
	
	ViewA('empleados',$p);
 ?>


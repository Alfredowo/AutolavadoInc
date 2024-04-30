<?php 
	session_start();
	require 'config.php';
	require 'libreria/vehiculo.php';
	require 'libreria/Icobro.php';
	require 'libreria/auto.php';
	require 'libreria/camioneta.php';
	require 'libreria/tractocamion.php';
	require 'libreria/factory.php';
	$v = new Vehiculos();
	$p['resultado'] = '';
	$p['resultado']=$v->Mostrar('%');
	ViewA('vehiculos',$p);
 ?>
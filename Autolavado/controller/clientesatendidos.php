<?php 
	session_start();
	require 'config.php';
	require 'libreria/clientesatendidos.php';
	$ca = new Clientesatendidos();
	$p['resultado'] = '';
	$p['resultado']=$ca->Mostrar('%');
	ViewA('clientesatendidos',$p);
 ?>
<?php 
	session_start();
	require 'config.php';
    require 'libreria/pagos.php';

	$pagos = new Pagos();
	$p['resultado'] = $pagos->MostrarPagos('%');
	
	ViewA('pagos',$p);
 ?>
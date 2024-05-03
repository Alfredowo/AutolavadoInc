<?php 
	session_start();
	require 'config.php';
	require 'libreria/Icobro.php';
	require 'libreria/auto.php';
	require 'libreria/camioneta.php';
	require 'libreria/tractocamion.php';
	require 'libreria/factory.php';
	$p = array();
    ViewA('prueba',$p);
	// View('',$p);
?>
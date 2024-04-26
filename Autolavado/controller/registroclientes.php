<?php 
    session_start();
    require 'config.php';
    require 'libreria/cobros.php';

    $cobros = new Cobros();

    //guardar
	if(isset($_POST['txtCliente'], '1', '1', $_POST['txtCantidad'], $_POST['txtFecha'], '21'))
	{
		$c->Insertar($_POST['txtCliente'], $_POST['txtCantidad'], $_POST['txtFecha']);
		$p['resultado'] = '<div class="centrar">Registro correcto</div>';
	}

    ViewA('cobros', $p);
?>


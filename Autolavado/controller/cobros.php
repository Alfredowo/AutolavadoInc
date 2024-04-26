<?php 
    session_start();
    require 'config.php';
    require 'libreria/cobros.php';

    $c = new Cobros();

    //guardar
	if(isset($_POST['txtCliente'], $_POST['txtCantidad'], $_POST['txtFecha']))
	{
		$c->Insertar($_POST['txtCliente'], 1, 1, $_POST['txtCantidad'], $_POST['txtFecha'], 12);
		$p['resultado'] = '<div class="centrar">Registro correcto</div>';
	}

    ViewA('cobros', $p);
?>


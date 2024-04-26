<?php 
	session_start();
	require 'config.php';
    require 'libreria/empleados.php';

	$c = new Empleados();
	$p['resultado'] = '';

    //guardar
	if(isset($_POST['txtNombre'], $_POST['txtPass']))
	{
		$c->Insertar($_POST['txtNombre'], $_POST['txtPass']);
		$p['resultado'] = '<div class="centrar">Registro correcto</div>';
	}

	ViewA('addempleado', $p);
 ?>



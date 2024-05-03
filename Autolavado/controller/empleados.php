<?php 
	session_start();
	require 'config.php';
    require 'libreria/empleados.php';

	$empleados = new Empleados();
	$p['resultado'] = $empleados->Mostrar('%');
	/*
	$p['result'] = '';

	//guardar
	if(isset($_POST['txtNombre'], $_POST['txtPass']))
	{
		if($_POST['txtPass'] == $_POST['txtPassConfirm'])
		{
			$c->Insertar($_POST['txtNombre'], $_POST['txtPass']);
			$p['result'] = '<div class="centrar">Registro correcto</div>';
		}
		else
		{
			$p['result'] = '<div class="centrar">Error, las contraseñas no coinciden</div>';
		}
	}*/
	
	ViewA('empleados',$p);
 ?>


<?php 
	session_start();
	require 'config.php';
    require 'libreria/empleados.php';
	

	$c = new Empleados();
	$p['result'] = '';

    //guardar
	if(isset($_POST['txtNombre'], $_POST['txtPass']))
	{
		if($_POST['txtPass'] == $_POST['txtPassConfirm'])
		{
			$c->Insertar($_POST['txtNombre'], $_POST['txtPass']);
			$p['result'] = '<div style="background-color: #39B154;" class="centrar">Registro correcto</div>';
			header("refresh:2; url=empleados");
		}
		else
		{
			$p['result'] = '<div style="background-color: #b13939; class="centrar">Error, las contraseñas no coinciden</div>';
		}
	}
	ViewA('addempleado', $p);
 ?>



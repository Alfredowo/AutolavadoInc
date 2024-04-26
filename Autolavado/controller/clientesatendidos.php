<?php 
    session_start();
    require 'config.php';
    require 'libreria/cobros.php';

    $cobros = new Cobros();

    //mostrar
    $p['resultado'] = $cobros->Mostrar('%');

    ViewA('clientesatendidos', $p);
?>


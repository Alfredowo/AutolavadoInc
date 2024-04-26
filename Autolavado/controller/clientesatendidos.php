<?php 
    session_start();
    require 'config.php';
    require 'libreria/cobros.php';

    // Crear una instancia de la clase Cobros
    $cobros = new Cobros();

    // Llamar al método Mostrar() en la instancia $cobros
    $p['resultado'] = $cobros->Mostrar('%');

    ViewA('clientesatendidos', $p);
?>


<?php

    $auto = Factory::Elegirvehiculo('Auto');
    $camioneta = Factory::Elegirvehiculo('Camioneta');
    $tracto = Factory::Elegirvehiculo('Tracto camion');
?>
<div>Bienvenido</div>
<?php
    echo $auto->CalcularCobro(1);
    echo ' ';
    echo $camioneta->CalcularCobro(2);
    echo ' ';
    echo $tracto->CalcularCobro(3);
?>

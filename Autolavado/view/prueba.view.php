<?php

    $auto = Factory::Elegirvehiculo('Auto');
    $camioneta = Factory::Elegirvehiculo('Camioneta');
    $tracto = Factory::Elegirvehiculo('Tracto camion');
?>
<div>Bienvenido</div>
<?php
    echo $auto->CalcularCobro(1,15);
    echo ' ';
    echo $camioneta->CalcularCobro(2,15);
    echo ' ';
    echo $tracto->CalcularCobro(3,15);
?>

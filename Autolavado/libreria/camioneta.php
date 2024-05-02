<?php
    class Camioneta implements Icobro
    {
        function CalcularCobro($cantidad, $costo)
        {
            return $cantidad * $costo;
        }
    }
?>
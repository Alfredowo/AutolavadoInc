<?php
    class Auto implements Icobro
    {
        function CalcularCobro($cantidad, $costo)
        {
            return $cantidad * $costo;
        }
    }
?>
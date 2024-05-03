<?php
    class Camioneta implements Icobro
    {
        function CalcularCobro($cantidad)
        {
            return $cantidad * 7;
        }
    }
?>
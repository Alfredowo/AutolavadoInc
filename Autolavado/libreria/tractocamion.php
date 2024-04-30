<?php
    class Tractocamion implements Icobro
    {
        function CalcularCobro($cantidad, $costo)
        {
            return $cantidad * $costo;
        }
    }
?>
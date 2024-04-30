<?php
    class Tractocamion implements Icobro
    {
        function CalcularCobro($cantidad)
        {
            return $cantidad * 8;
        }
    }
?>
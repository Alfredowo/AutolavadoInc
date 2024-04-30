<?php
    class Empleadodia
    {
        function Mostrar()
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select * from empleadodeldia where");
        }
    }
?>
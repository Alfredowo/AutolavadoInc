<?php
    class Cobros
    {
        
        function Insertar($cli, $empleado, $vehiculo, $cantidad, $fecha, $total)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("insert into cobros values(null,?,?,?,?,?,?)");
            $q->bind_param('siidss', $cli, $empleado, $vehiculo, $cantidad, $fecha, $total);
            $q->execute();
            $q->close();
        }
    }
?>
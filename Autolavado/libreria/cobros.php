<?php
    class Cobros
    {
        function Insertar($cliente, $fkempleado, $fkvehiculo, $cantidad, $fecha, $total)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("insert into cobros values(null,?,?,?,?,STR_TO_DATE(?, '%Y-%m-%d'),?)");
            $fechapro = date('Y-m-d', strtotime($fecha));
            $q->bind_param('ssssss', $cliente, $fkempleado, $fkvehiculo, $cantidad, $fechapro, $total);
            $q->execute();
            $q->close();
        }
        function Mostrar($fill)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare('select * from vista_clientes_atendidos where turno like ?');
            $q->bind_param('s',$fill);
            $q->execute();
            $rs = $q->get_result();
            $q->close();
            return $rs;
        }
    }
?>
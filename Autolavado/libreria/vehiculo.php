<?php
    class Vehiculos
    {
        function Mostrar($fill)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare('select * from vehiculos where id like ?');
            $q->bind_param('s',$fill);
            $q->execute();
            $rs = $q->get_result();
            $q->close();
            return $rs;
        }
    }
?>
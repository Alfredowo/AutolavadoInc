<?php
    class Empleados
    {
        function Insertar($fecha, $nombre, $autosLavados, $total)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("insert into empleadoDelDia values(null,STR_TO_DATE(?, '%Y-%m-%d %H:%i:%s'),?,?,?)");
            $fechapro = date('Y-m-d H:i:s', strtotime($fecha));
            $q->bind_param('sssss', $fechapro, $nombre, $autosLavados, $total);
            $q->execute();
            $q->close();
        }
        function Borrar($id)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("delete from empleadoDelDia where id=?");
            $q->bind_param('i',$id);
            $q->execute();
            $q->close();
        }
        function Mostrar($fill)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare('select * from vista_empleado_del_dia where fecha like ?');
            $q->bind_param('s',$fill);
            $q->execute();
            $rs = $q->get_result();
            $q->close();
            return $rs;
        }
    }
?>
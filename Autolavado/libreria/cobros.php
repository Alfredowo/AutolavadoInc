<?php
    class Cobros
    {
        function Insertar($cliente, $fkempleado, $fkvehiculo, $cantidad, $fecha, $total)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("insert into cobros values(null,?,?,?,?,STR_TO_DATE(?, '%Y-%m-%d %H:%i:%s'),?)");
            $fechapro = date('Y-m-d H:i:s', strtotime($fecha));
            $q->bind_param('ssssss', $cliente, $fkempleado, $fkvehiculo, $cantidad, $fechapro, $total);
            $q->execute();
            $q->close();
        }
        function Borrar($id)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("delete from cobros where id=?");
            $q->bind_param('i',$id);
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
        /*
        public function Editar($id, $nombre, $tc, $cobro)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("update cobros set cliente=?, tipocobro=?, cobro=? where id=?");
            $q->bind_param('ssd', $nombre, $tc, $cobro, $id);
            $q->execute();
            $q->close();
        }*/
    }
?>
<?php
    class Vehiculos
    {
        function Insertar($nombre,$tc,$costo)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("insert into vehiculos values(null,?,?,?)");
            $q->bind_param('ssd',$nombre,$tc,$costo);
            $q->execute();
            $q->close();
        }
        function Borrar($id)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("delete from vehiculos where id=?");
            $q->bind_param('i',$id);
            $q->execute();
            $q->close();
        }
        function Mostrar($fill)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare('select * from vehiculos where nombre like ?');
            $q->bind_param('s',$fill);
            $q->execute();
            $rs = $q->get_result();
            // $q->bind_result($id,$nombre, $tc, $costo);
            // $rs = array();
            // while ($q->fetch())
            // {
                // $rs[] = array(
                //     'nombre' => $nombre,
                //     'tc' => $tc,
                //     'costo' => $costo
                // );
            //}
            $q->close();
            return $rs;
        }
        public function Editar($id, $nombre, $tc, $cobro)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("update vehiculos set nombre=?, tipocobro=?, cobro=? where id=?");
            $q->bind_param('ssd', $nombre, $tc, $cobro, $id);
            $q->execute();
            $q->close();
        }
    }
?>
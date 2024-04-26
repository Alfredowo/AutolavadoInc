<?php
    class Empleados
    {
        function Insertar($nombre, $pass)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("insert into usuarios values(null,?,?,'Empleado')");
            $q->bind_param('ssd', $nombre, $pass);
            $q->execute();
            $q->close();
        }
        function Borrar($id)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("delete from usuarios where id=?");
            $q->bind_param('i',$id);
            $q->execute();
            $q->close();
        }
        function Mostrar($fill)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare('select * from usuarios where id like ?');
            $q->bind_param('s',$fill);
            $q->execute();
            $rs = $q->get_result();
            $q->close();
            return $rs;
        }
        public function Editar($id, $nombre, $pass)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("update usuarios set nombre=?, pass=? where id=?");
            $q->bind_param('ssd', $nombre, $pass, $id);
            $q->execute();
            $q->close();
        }
    }
?>
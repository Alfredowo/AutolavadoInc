<?php
    class Pagos
    {
        function MostrarPagos($fill)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->prepare("select * from vista_pagos where empleado like ?");
            $q->bind_param('s',$fill);
            $q->execute();
            $rs = $q->get_result();
            $q->close();
            return $rs;
        }
        
        function Mostrar($fill)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->prepare("select * from vista_paga_estimada where empleado like ?");
            $q->bind_param('s',$fill);
            $q->execute();
            $rs = $q->get_result();
            $q->close();
            return $rs;
        }
        public static function PagarEmpleado($empleado)
        {
            // $usuario_encontrado = false;
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select * from vista_paga_estimada where empleado = ?");
            $q->bind_param('s', $empleado);
            $q->execute();
            $q->bind_result($empleado, $fecha, $totalxDia, $pagaEstimada);
            $q->fetch();
            $q->close();
            return array($empleado, $fecha, $totalxDia, $pagaEstimada);
        }
        public static function ObtenerE($empleado)
        {
            // $usuario_encontrado = false;
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("select * from usuarios where nombre = ?");
            $q->bind_param('s', $empleado);
            $q->execute();
            $q->bind_result($id,$nombre,$pass, $permisos);
            $q->fetch();
            $q->close();
            return array($id,$nombre,$pass, $permisos);
        }
        function Insertar($empleado,$fecha,$paga)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->stmt_init();
            $q->prepare("insert into pagos values(null,?,?,?)");
            $q->bind_param('isd',$empleado,$fecha,$paga);
            $q->execute();
            $q->close();
        }
        public static function EliminarPagaEstimada($empleado, $fecha)
        {
            $con = new mysqli(s,u,p,bd);
            $con->set_charset("utf8");
            $q = $con->prepare("DELETE FROM pagaEstimada WHERE fkempleado = ? AND fecha = ?");
            $q->bind_param('ss', $empleado, $fecha);
            $q->execute();
            $q->close();
        }


    }
?>
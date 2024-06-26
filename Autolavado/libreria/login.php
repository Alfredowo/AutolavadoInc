<?php
class login
{
    public static function Verificar($usuario)
    {
        // $usuario_encontrado = false;
        $con = new mysqli(s,u,p,bd);
        $con->set_charset("utf8");
        $q = $con->stmt_init();
        $q->prepare("select * from usuarios where nombre=?");
        $q->bind_param('s', $usuario);
        $q->execute();
        $q->bind_result($id,$nombre,$pass, $permiso);
        $q->fetch();
        $q->close();
        return array($id,$nombre,$pass, $permiso);
    }
    public static function Obtener($id)
    {
        // $usuario_encontrado = false;
        $con = new mysqli(s,u,p,bd);
        $con->set_charset("utf8");
        $q = $con->stmt_init();
        $q->prepare("select * from usuarios where id=?");
        $q->bind_param('s', $id);
        $q->execute();
        $q->bind_result($id,$nombre,$pass, $permiso);
        $q->fetch();
        $q->close();
        return array($id,$nombre,$pass, $permiso);
    }
    public static function ObtenerV($id)
    {
        // $usuario_encontrado = false;
        $con = new mysqli(s,u,p,bd);
        $con->set_charset("utf8");
        $q = $con->stmt_init();
        $q->prepare("select * from vehiculos where id=?");
        $q->bind_param('s', $id);
        $q->execute();
        $q->bind_result($id,$nombre,$tipocobro, $costo);
        $q->fetch();
        $q->close();
        return array($id,$nombre,$tipocobro, $costo);
    }
    public static function Vehiculo($fill)
    {
        // $usuario_encontrado = false;
        $con = new mysqli(s,u,p,bd);
        $con->set_charset("utf8");
        $q = $con->stmt_init();
        $q->prepare('select * from vehiculos where nombre like ?');
        $q->bind_param('s',$fill);
        $q->execute();
        $rs = $q->get_result();
        $q->close();
        return $rs;
    }
    public static function Mensaje($total)
    {?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script><input type="hidden">
	    <script>Swal.fire({
            title: 'El costo total es',
            text: '$<?php echo $total ?>',
            icon: 'info',
            width: '30%',
            padding: '1rem'
        });</script>
     <?php
    }
    public static function MensajeError()
    {?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script><input type="hidden">
		<script src="dist/js/sweetAlert.js"></script>
     <?php
    }
}

?>
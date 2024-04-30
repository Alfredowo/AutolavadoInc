<?php
class login 
{
    
    function Logear($usuario, $contra)
    {
        $usuario_encontrado = false;
        $con = new mysqli(s,u,p,bd);
        $con->set_charset("utf8");
        $q = $con->stmt_init();
        $q->prepare('select * from usuarios where nombre like ?');
        $q->bind_param('s',$usuario);
        $q->execute();
        $rs = $q->get_result();
        foreach ($rs as $resu) {
            if ($resu['nombre'] == $usuario && $resu['pass'] == $contra) {
                $usuario_encontrado = true;
                if ($resu['permisos'] == 'Empleado') {
                    header("Location: cobros");
                }
                elseif ($resu['permisos'] == 'Admin') {
                    header("Location: vehiculos");
                }
                exit();
            }
        }
        if (!$usuario_encontrado) {
            echo "<script>alert('Usuario o contraseña incorrectos');</script>";
        }
    }
}

?>



<?php
class loginw 
{
    
    function Logear($usuario, $contra)
    {
        $usuario_encontrado = false;
        $con = new mysqli(s,u,p,bd);
        $con->set_charset("utf8");
        $q = $con->stmt_init();
        $q->prepare('select * from usuarios where nombre like ?');
        $q->bind_param('s',$usuario);
        $q->execute();
        $rs = $q->get_result();
        foreach ($rs as $resu) {
            if ($resu['nombre'] == $usuario && $resu['pass'] == $contra) {
                $usuario_encontrado = true;
                if ($resu['permisos'] == 'Empleado') {
                    $u['usuarios'] = '';
                    $ide = $resu['id'];
                    $name = $resu['nombre']; 
                    $u['usuario'] = array(
                        'id' => $ide,
                        'nombre' => $name
                    );
                    View('cobros', $u);
                }
                elseif ($resu['permisos'] == 'Admin') {
                    header("Location: vehiculos");
                }
                exit();
            }
        }
        if (!$usuario_encontrado) {
            echo "<script>alert('Usuario o contraseña incorrectos');</script>";
        }
    }
}




class login4
{
    
    function Logear($usuario, $contra)
    {
        $usuario_encontrado = false;
        $con = new mysqli(s,u,p,bd);
        $con->set_charset("utf8");
        $q = $con->stmt_init();
        $q->prepare('select * from usuarios where nombre like ?');
        $q->bind_param('s',$usuario);
        $q->execute();
        $rs = $q->get_result();
        foreach ($rs as $resu) {
            if ($resu['nombre'] == $usuario && $resu['pass'] == $contra) {
                $usuario_encontrado = true;
                if ($resu['permisos'] == 'Empleado') {
                    $u['varios'] = '';
                    $ide = $resu['id'];
                    $name = $resu['nombre']; 
                    $u['varios'] = array(
                        'id' => $ide,
                        'nombre' => $name,
                        'Mostrar' => $this->Mostrar('%')
                    );
                    View('cobros', $u);
                }
                elseif ($resu['permisos'] == 'Admin') {
                    header("Location: vehiculos");
                }
                exit();
            }
        }
        if (!$usuario_encontrado) {
            echo "<script>alert('Usuario o contraseña incorrectos');</script>";
        }
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
        $q->close();
        return $rs;
    }
}
?>
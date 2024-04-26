<h1>Empleados</h1>
<div>
    <form action="addempleado" method="GET">
        <input type="submit" value="Nuevo">
    </form>

    <table>
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Contraseña</td>
                <td>Permisos</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultado as $res) {?>
                <tr>
                    <td><?php echo $res['nombre'] ?></td>
                    <td><?php echo $res['pass'] ?></td>
                    <td><?php echo $res['permisos'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
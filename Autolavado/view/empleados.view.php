<h1>Empleados</h1>
<div>
    <form action="addepleados" method="GET">
        <input type="submit" value="Nuevo">
    </form>

    <table>
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Usuario</td>
                <td>Contraseña</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultado as $res) {?>
                <tr>
                    <td><?php echo $res['nombre'] ?></td>
                    <td><?php echo $res['pass'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
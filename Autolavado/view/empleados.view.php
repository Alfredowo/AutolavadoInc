<h1 class="">Empleados</h1>
<div class="table-container">
    <form action="addempleado" method="GET">
        <input class="buttonss" type="submit" value="Registrar Nuevo">
    </form>
    <br>
    <table class="table">
        <thead>
            <tr>
                <td class="tabletitulos">Nombre</td>
                <td class="tabletitulos">Contraseña</td>
                <td class="tabletitulos">Usuario</td>
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
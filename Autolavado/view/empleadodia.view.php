<h1>Reporte de Empleado del Día</h1>

<div>
    <form action="imprimir" method="get">
        <input type="submit" value="Imprimir">
    </form>

    <table>
        <thead>
            <tr>
                <td>Fecha</td>
                <td>Empleado</td>
                <td>Autos Lavados</td>
                <td>Dinero Generado</td>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($resultado as $res) {?>
                <tr>
                    <td><?php echo $res['fecha'] ?></td>
                    <td><?php echo $res['nombre'] ?></td>
                    <td><?php echo $res['autosLavados'] ?></td>
                    <td><?php echo $res['total'] ?></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>

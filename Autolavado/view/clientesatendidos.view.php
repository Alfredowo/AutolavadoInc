<h1>Reporte de Clientes Atendidos</h1>

<div>
    <form action="imprimir" method="get">
        <input type="submit" value="Imprimir">
    </form>

    <!-- Tabla que mostrara los clientes que fueron atendidos -->
    <table>
        <thead>
            <tr>
                <td>Turno</td>
                <td>Cliente</td>
                <td>Empleado</td>
                <td>Vehiculo</td>
                <td>Cantidad</td>
                <td>Fecha</td>
                <td>Total</td>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($resultado as $res) {?>
                <tr>
                    <td><?php echo $res['turno'] ?></td>
                    <td><?php echo $res['cliente'] ?></td>
                    <td><?php echo $res['atendio'] ?></td>
                    <td><?php echo $res['vehiculo'] ?></td>
                    <td><?php echo $res['cantidad'] ?></td>
                    <td><?php echo $res['fecha'] ?></td>
                    <td><?php echo $res['total'] ?></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>

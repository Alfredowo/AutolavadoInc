<h1>Pagar a Empleados</h1>
<div class="col-6">
    <?php echo $result; ?>
</div>                    
<div>
    <table>
        <thead>
            <tr>
                <td>Empleado</td>
                <td>Fecha</td>
                <td>Total X Día</td>
                <td>Paga Estimada</td>
                <td>Acciones</td>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($res as $empleado) {?>
                <tr>
                    <td><?php echo $empleado['empleado']?></td>
                    <td><?php echo $empleado['fecha']?></td>
                    <td><?php echo $empleado['totalxDia']?></td>
                    <td><?php echo $empleado['PagaEstimada']?></td>
                    <td>
                        <form action="pagarempleados" method="post">
                            <button>Pagar</button>
                            <input type="hidden" name="empleado" value="<?php echo $empleado['empleado']?>">
                        </form>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>

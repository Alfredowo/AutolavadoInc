<h1 class="titulochido">Pagar a Empleados</h1>
<div class="table-container">
    <div class="col-6">
        <?php echo $result; ?>
    </div>
<div>
    <table class="table" id="tablaPagos">
        <thead>
            <tr>
                <td class="tabletitulos">Empleado</td>
                <td class="tabletitulos">Fecha</td>
                <td class="tabletitulos">Total X Día</td>
                <td class="tabletitulos">Paga Estimada</td>
                <td class="tabletitulos">Acciones</td>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($res as $empleado) { ?>
                <tr>
                    <td><?php echo $empleado['empleado'] ?></td>
                    <td><?php echo $empleado['fecha'] ?></td>
                    <td><?php echo $empleado['totalxDia'] ?></td>
                    <td><?php echo $empleado['pagaEstimada'] ?></td>
                    <td>
                        <form id="formPagar" action="pagarempleados" method="post">
                            <button class="butonpago">Pagar</button>
                            <input type="hidden" name="empleado" value="<?php echo $empleado['empleado'] ?>">
                            <input type="hidden" name="fecha" value="<?php echo $empleado['fecha'] ?>">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
 

<div id="mitabla">
    <h1 class="">Vehiculos</h1>
    <div class="table-container">
        <table class="table"id="tabla-vehiculos">
            <thead>
                <tr>
                    <td class="tabletitulos">Nombre</td>
                    <td class="tabletitulos">Tipo de cobro</td>
                    <td class="tabletitulos">Precio</td>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($resultado as $res) {?>
                    <tr>
                        <td><?php echo $res['nombre'] ?></td>
                        <td><?php echo $res['tipocobro'] ?></td>
                        <td><?php echo $res['costo'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>



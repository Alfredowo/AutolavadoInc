<h1>Vehiculos</h1>
<div>
    <table>
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Tipo de cobro</td>
                <td>Precio</td>
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
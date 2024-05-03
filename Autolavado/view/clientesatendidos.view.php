<h1 class="titulochido">Reporte de Clientes Atendidos</h1>
<div class="table-container">
<a class="butonimprimir"href="javascript:genPDF()">Generar</a>
    <!-- <input type="text" id="h1"> -->
<br><br>
    <!-- Tabla que mostrara los clientes que fueron atendidos -->
    <table class="table" id="tabla_clientes">
        <thead>
            <tr>
                <td class="tabletitulos">Cliente</td>
                <td class="tabletitulos">Turno</td>
                <td class="tabletitulos">Empleado</td>
                <td class="tabletitulos">Vehiculo</td>
                <td class="tabletitulos">Cantidad</td>
                <td class="tabletitulos">Fecha</td>
                <td class="tabletitulos">Total</td>
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

<script type="text/javascript" src="jspdf.min.js"></script>
<script type="text/javascript">
    function genPDF() {
            var doc = new jsPDF();
            var tabla = document.getElementById('tabla_clientes');
            var rows = tabla.getElementsByTagName('tr');
            
            // Iniciar posición de Y
            var y = 20;
            
            // Dibujar encabezado de tabla
            doc.text('Clientes Atendidos', 10, y);
            y += 10; // Incrementar posición Y para separar el título de la tabla
            
            var colCount = tabla.rows[0].cells.length;
            for (var i = 0; i < rows.length; i++) {
                var rowData = [];
                for (var j = 0; j < colCount; j++) {
                    var cellData = rows[i].cells[j].innerText;
                    rowData.push(cellData);
                }
                
                // Dibujar fila de la tabla
                for (var k = 0; k < rowData.length; k++) {
                    doc.text(8 + k * 30, y, rowData[k]);
                }
                y += 10; // Incrementar posición Y para la siguiente fila
            }
            
            doc.save('tabla_clientes.pdf');
    }
</script>

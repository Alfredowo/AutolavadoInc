<h1 class="">Reporte de Empleado del Día</h1>
<div class="table-container">
    <table class="table"id="tabla_empleadodia">
    <a class="butonimprimir" href="javascript:genPDF()">Generar</a>
    <!-- <input type="text" id="h1"> -->
    <br><br>
        <thead>
            <tr>
                <td class="tabletitulos">Fecha</td>
                <td class="tabletitulos">Empleado</td>
                <td class="tabletitulos">Autos Lavados</td>
                <td class="tabletitulos">Dinero Generado</td>
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
<script type="text/javascript" src="jspdf.min.js"></script>
<script type="text/javascript">
        function genPDF() {
            var doc = new jsPDF();
            var tabla = document.getElementById('tabla_empleadodia');
            var rows = tabla.getElementsByTagName('tr');
            
            // Iniciar posición de Y
            var y = 20;
            
            // Dibujar encabezado de tabla
            doc.text('Empleado del Día', 10, y);
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
                    doc.text(10 + k * 50, y, rowData[k]);
                }
                y += 10; // Incrementar posición Y para la siguiente fila
            }
            
            doc.save('tabla_empleadodia.pdf');
        }
</script>
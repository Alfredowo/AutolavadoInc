<h1 class="titulochido">Reporte de Pagos Diarios</h1>
<div class="table-container">
<a class="butonimprimir"href="javascript:genPDF()">Generar</a>
    <!-- <input type="text" id="h1"> -->
    <br><br>
    <table class="table" id="tabla-Pagos">
        <thead>
            <tr>
                <td class="tabletitulos">Empleado</td>
                <td class="tabletitulos">Día</td>
                <td class="tabletitulos">Pago</td>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($resultado as $res) {?>
                <tr>
                    <td><?php echo $res['empleado'] ?></td>
                    <td><?php echo $res['fecha'] ?></td>
                    <td><?php echo $res['paga'] ?></td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<script type="text/javascript" src="jspdf.min.js"></script>
<script type="text/javascript">
        function genPDF() {
            var doc = new jsPDF();
            var tabla = document.getElementById('tabla-Pagos');
            var rows = tabla.getElementsByTagName('tr');
            
            // Iniciar posición de Y
            var y = 20;
            
            // Dibujar encabezado de tabla
            doc.text('Pagos Diarios', 10, y);
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
            
            doc.save('tabla_pagos.pdf');
        }
</script>

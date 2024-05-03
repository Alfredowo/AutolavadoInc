<label class="lbl" for="empleado">Empleado: </label> <?php echo $res['usuario']?>
<?php

    $ve = Factory::Elegirvehiculo('Auto');
?>
<main>
    <h1 class="titulochido">Registro Clientes Antendidos</h1>
    <input type="hidden" id="empleado" name="empleado" placeholder="<?php echo $res['usuario']?>" readonly>
    <input type="hidden" id="empleado_id" name="empleado" value="<?php echo $res['ide']?>">
    <form class="form"action="cobros" method="post">
        <fieldset>

            <input type="hidden" id="empleado" name="empleado" placeholder="<?php echo $res['usuario']?>" readonly>
            <input type="hidden" id="empleado_id" name="empleado" value="<?php echo $res['ide']?>">

            <label for="cliente">Cliente</label>
            <input type="text" placeholder="Nombre Cliente" id="cliente" name="cliente">
            
            <label for="vehiculos">Tipo de Vehiculo</label>
            <select id="vehiculos" name="vehiculos">
                <option value="" disabled selected>-- Selecciona el vehiculo --</option>
                <?php
                    $resultados = $res['vehiculo'];
                    foreach ($resultados as $vehiculo) {?>
                        <option value="<?php echo $vehiculo['id']?>"><?php echo $vehiculo['nombre']?></option>
                    
                <?php }?>
            </select>

            <label for="cantidad">Cantidad</label>
            <input type="number" placeholder="Cantidad" id="cantidad" min="0" name="cantidad">

            <label for="fecha">Fecha</label>
            <input type="date" id="fecha" name="fecha">

            <!-- <label for="total">Total</label>
            <input type="number" placeholder="Total" id="total" min="1" step="0.1" name="total"> -->
        </fieldset>
        <button class="buttonss" type="submit">Aceptar</button>
    </form>
</main>
<!-- Script para enviar la selección -->
<!-- <script>
    function enviarSeleccion(select) {
        var textoSeleccionado = select.options[select.selectedIndex].textContent;
        // Redirigir a la página PHP con el texto seleccionado como parámetro de consulta
        window.location.href = "cobros?textoSeleccionado=" + encodeURIComponent(textoSeleccionado);
    }
</script> -->

<!-- <script>
    // Obtener referencia al select y al input
    var select = document.getElementById("vehiculos");
    var input = document.getElementById("textoSeleccionado");

    // Agregar un event listener para el evento de cambio en el select
    select.addEventListener("change", function() {
        // Obtener el índice de la opción seleccionada
        var indiceSeleccionado = select.selectedIndex;

        // Obtener el texto de la opción seleccionada
        var textoSeleccionado = select.options[indiceSeleccionado].textContent;
        input.value = textoSeleccionado;
        sessionStorage.setItem('textoSeleccionado');
    });
    
</script> -->
<!-- Script 1 -->
<!-- <script>
    // Almacenar la variable en sessionStorage
    sessionStorage.setItem('variableCompartida', 'Hola desde el Script 1');
</script> -->

<!-- Script 2 -->
<!-- <script>
    // Acceder a la variable desde sessionStorage
    var variableCompartida = sessionStorage.getItem('textoSeleccionado');
    console.log(variableCompartida);
</script> -->
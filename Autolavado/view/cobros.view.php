<main>
    <h1>Registro Clientes Antendidos</h1>
    <form action="cobros" method="post">
        <fieldset>
            <label for="cliente">Cliente</label>
            <input type="text" placeholder="Nombre Cliente" id="cliente" name="txtCliente">

            <label for="vehiculos">Tipo de Vehiculo</label>
            <select id="vehiculos">
                <option value="" disabled selected>-- Seleciona el vehiculo --</option>
                <option value="Automovil">Automovil</option>
                <option value="Camioneta">Camioneta</option>
                <option value="Tracto camión">Tracto camión</option>
            </select>

            <label for="cantidad">Cantidad</label>
            <input type="number" placeholder="Cantidad" id="cantidad" min="0" name="txtCantidad">

            <label for="fecha">Fecha</label>
            <input type="datetime-local" id="fecha" name="txtFecha">
        </fieldset>
        <button type="submit">Aceptar</button>
    </form>
</main>
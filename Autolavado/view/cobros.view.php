<main>
    <h1 class="titulochido">Registro Clientes Antendidos</h1>
    <form action="">
        <fieldset>
            <label for="empleado">Empleado</label>
            <input type="text" placeholder="Jusepe" id="empleado">

            <label for="cliente">Cliente</label>
            <input type="text" placeholder="Nombre Cliente" id="cliente">

            <label for="vehiculos">Tipo de Vehiculo</label>
            <select id="vehiculos">
                <option value="" disabled selected>-- Seleciona el vehiculo --</option>
                <option value="Automovil">Automovil</option>
                <option value="Camioneta">Camioneta</option>
                <option value="Tracto camión">Tracto camión</option>
            </select>

            <label for="cantidad">Cantidad</label>
            <input type="number" placeholder="Cantidad" id="cantidad" min="0">

            <label for="fecha">Fecha</label>
            <input type="date" id="fecha">
        </fieldset>
        <input type="submit" value="Aceptar">
    </form>
</main>
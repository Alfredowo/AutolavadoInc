<main>
    <div class="">
        <div class="">
            <div class="">
                <h1>Registrar Empleado</h1>
                <form action="empleados" method="post">

                    <div class="">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="txtNombre" id="nombre" required>
                    </div>
        
                    <div class="">
                        <label for="password">Contraseña</label>
                        <input type="password" name="txtPass" id="password" required>
                    </div>

                    <div class="">
                        <input type="password" name="password_confirmation" id="password_confirmation" required>
                        <label for="password_confirmation">Repetir Contraseña</label>
                    </div>
        
                    <button type="submit" class="">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</main>
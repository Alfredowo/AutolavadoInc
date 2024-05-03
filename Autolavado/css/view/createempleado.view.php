<main>
    <div class="">
        <div class="">
            <div class="">
                <h1>Registrar Empleado</h1>
                <form action="empleados" method="post">

                    <div class="">
                        <input type="text" name="nombre" id="nombre" required>
                        <label for="nombre">Nombre</label>
                    </div>

                    <div class="">
                        <input type="text" name="username" id="username" required>
                        <label for="username">Usuario</label>
                    </div>
        
                    <div class="">
                        <input type="password" name="password" id="password" required>
                        <label for="password">Contraseña</label>
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
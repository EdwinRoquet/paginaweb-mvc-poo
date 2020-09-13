<main class="contenedor seccion contenido-centrado">
        <h2 class="fw-300 centrar-texto">Registrate para iniciar sesión</h2>

        <form class="contacto" method="post">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu Nombre" required>

                <label for="email">E-mail: </label>
                <input type="email" id="email"  name="email" placeholder="Tu Correo electrónico" required>
                
                <label for="contrasena">Contraseña: </label>
                <input type="password" id="contrasena"  name="contrasena" placeholder="Tu Correo electrónico" required>    
            </fieldset>
            <?php
               $usuario = UsuarioControlador::ctrRegistro();
               if ($usuario == "ok") {
                echo "<script> 
                   alert('Te has registrado exitosamente');
                </script>";
            }
            ?>

            <input type="submit" value="Enviar" class="boton boton-verde">

        </form>
    </main>
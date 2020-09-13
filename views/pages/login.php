<main class="contenedor seccion contenido-centrado">
        <h2 class="fw-300 centrar-texto">Iniciar sesión</h2>

        <form class="contacto" method="post">
            <fieldset>
               
               <label for="email">E-mail: </label>
                <input type="email" id="email"  name="email" placeholder="Tu Correo electrónico" required>
                
                <label for="contrasena">Contraseña: </label>
                <input type="password" id="contrasena"  name="contrasena" placeholder="Tu Correo electrónico" required>
            
            </fieldset>
            <?php
               //Forma en que se instancia la clase de un método estático
               $login = new UsuarioControlador();
               $login->ctrLogin();
            ?>

            <input type="submit" value="Enviar" class="boton boton-verde">

        </form>
    </main>
 

    

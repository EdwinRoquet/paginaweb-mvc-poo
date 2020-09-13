<h1 class="fw-300 centrar-texto">Contacto</h1>
    <main class="contenedor seccion contenido-centrado">
        <h2 class="fw-300 centrar-texto">Llena el formulario de Contacto</h2>

        <form class="contacto" method="post">
            <fieldset>
                <legend>Información Personal</legend>
                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Tu titulo" required>

                <label for="correo">E-mail: </label>
                <input type="correo" id="correo" name="correo" placeholder="Tu Correo electrónico" required>

                <label for="numero">Teléfono:</label>
                <input type="tel" id="numero" name="numero" placeholder="Tu Teléfono" required>

                <label for="mensaje">Mensaje: </label>
                <textarea  id="mensaje" name="texto"></textarea>

            </fieldset>
            <?php
               $usuario = ContactoControlador::ctrRegistro();
               if ($usuario == "ok") {
                echo "<script> 
                   alert('Has enviado tu mensaje exitosamente');
                </script>";
            }
            ?>

      
            <input type="submit" value="Enviar" class="boton boton-verde">

        </form>
    </main>
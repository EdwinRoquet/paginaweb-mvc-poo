<?php

if (!isset($_SESSION['validarIngreso'])) {
    echo "<script> window.location = 'index.php?page=login';</script>";
    return;
}

 
?>


<h1 class="fw-300 centrar-texto">Panel de administración</h1>

    <main class="contenedor seccion ">
      <div>
          <a class="boton boton-verde" href="index.php?page=blo-admin">Blog</a>
          <?php 
         if ($_SESSION['rol'] == "administrador"){ ?>
         <a class="boton boton-verde" href="index.php?page=paq-admin">Paquetes</a>
         <a class="boton boton-verde" href="index.php?page=con-admin">Contacto</a>
         <?php }?>
      </div>

      <hr class="border">
      <section>

      <?php 

        //Solo puede acceder el administrador
    if ($_SESSION['rol'] == "administrador"){

        $user = UsuarioControlador::ctrMostarRegistro(null, null);
      
      ?>
      <h2 class="fw-300 centrar-texto">Usuarios</h2>

        <div class="flex-container">
            <div class="caja1" >
            <form class="contacto" method="post">
            <fieldset>
               
               <label for="nombre">Nombre: </label>
                <input type="nombre" id="nombre"  name="nombre" placeholder="Tu nombre" required>

               <label for="email">E-mail: </label>
                <input type="email" id="email"  name="email" placeholder="Tu Correo electrónico" required>

                
                    <label for="rol">Rol</label>
                    <select id="rol"  name="rol">
                        <option value=""> -Seleccione-</option>
                        <option value="usuario">Usuario</option>
                        <option value="administrador">Administrador</option>
                    </select>
                
                <label for="contrasena">Contraseña: </label>
                <input type="password" id="contrasena"  name="contrasena" placeholder="Tu Correo electrónico" required>
            
            </fieldset>
            <?php
            //    Forma en que se instancia la clase de un método estático
               $usuario =  UsuarioControlador::ctrRegistro();

               if ($usuario == "ok") {
                   echo '<script>
                     location.href ="index.php?page=admin";
                        </script>';
               }
            ?>

            <input type="submit" value="Enviar" class="boton boton-verde">

        </form>
            </div>
            <div class="caja2">
            <table style="width: 100%;">
                <thead>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Accion</th>
                </thead>
                <tbody>
               
                <?php
                foreach($user as $key => $value):
                ?>
                 <tr>
                    <td><?php echo ($key+1); ?></td>
                    <td><?php echo $value['nombre']; ?></td>
                    <td><?php echo $value['rol']; ?></td>
                    <td><?php echo $value['correo']; ?></td>
                    <td>
                         
                         <form method="post">
                         <input type="hidden" value="<?php echo $value['id']; ?>" name="id"> 
                         <button type="submit" class=" boton  boton-rojo">Eliminar</button>
                             <?php
                                 $eliminar = new UsuarioControlador();
                                 $eliminar->ctrEliminarRegistro();
                             ?>
                           </form>
                         
                  
        
                    </td>
                </tr>
                <?php
                 endforeach
                ?>
                </tbody>
            </table>

            </div>
        </div>




      </section>
   <?php   } else {

       echo '  <div style="height: 300px;"></div>';
   } ?>
       
    </main>

  <script></script>
<?php

if (!isset($_SESSION['validarIngreso'])) {
    echo "<script> window.location = 'index.php?page=login';</script>";
    return;
}

 
?>


<h1 class="fw-300 centrar-texto">Panel de administración</h1>

    <main class="contenedor seccion ">

      <section>

      <?php 

  

        $blog = BlogControlador::ctrMostarRegistro(null, null);
      
      ?>
      <h2 class="fw-300 centrar-texto">Blog</h2>

        <div class="flex-container">
            <div class="caja1" >
            <form class="contacto" method="post" enctype="multipart/form-data">
            <fieldset>
               
             <label for="titulo">Titulo: </label>
             <input type="text" id="titulo"  name="titulo" placeholder="Tu titulo" required>

             <label for="autor">Autor: </label>
             <input type="text" id="autor"  name="autor" placeholder="Nombre del autor" required>
               
            <label for="texto">Información: </label>
            <textarea  id="texto" name="texto"></textarea>
            
            <label for="texto">Imagen: </label>
            <input type="file" name="imagen" id="imagen">
                        
            </fieldset>
            <?php
            //    Forma en que se instancia la clase de un método estático
               $blogNew =  BlogControlador::ctrRegistroBlog();

               if ($blogNew == "ok") {
                   echo '<script>
                     location.href ="index.php?page=blo-admin";
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
                    <th>Titulo</th>
                    <th>Información</th>
                    <th>Imagen</th>
                    <th>Autor</th>
                    <th>Accion</th>
                </thead>
                <tbody>
               
                <?php
                foreach($blog as $key => $value):
                ?>
                 <tr>
                    <td><?php echo ($key+1); ?></td>
                    <td><?php echo $value['titulo']; ?></td>
                    <td><?php echo $value['texto']; ?></td>
                    <td>
                        <img src="<?php echo $value['img']; ?>" width="100px">
                    </td>
                    <td><?php echo $value['autor']; ?></td>
                    <td>
                           <a href="index.php?page=blo-editar&id=<?php echo $value['id'];?>" class="boton boton-amarillo"> Editar</a>
                      
                           <form method="post">
                            <input type="hidden" value="<?php echo $value['img']; ?>" name="imageneliminar"> 
                            <input type="hidden" value="<?php echo $value['id']; ?>" name="id_eliminar"> 
                            <button type="submit" class=" boton  boton-rojo">Eliminar</button>
                             <?php
                                 $eliminar = new BlogControlador();
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

       
    </main>
<?php



$blog = PaqueteControlador::ctrMostarRegistro('id', $_GET['id']);

?>






<h1 class="fw-300 centrar-texto">Paquete</h1>
    <main class="contenedor seccion contenido-centrado">
        <h2 class="fw-300 centrar-texto">Editar Paquete</h2>

        <form class="contacto" method="post" enctype="multipart/form-data">
            <fieldset>
               
            <label for="titulo">Titulo: </label>
            <input type="text" id="titulo"  name="titulo" placeholder="Tu titulo" required value="<?php echo $blog["titulo"];?>">
             
            <label for="precio">Precio: </label>
            <input type="text" id="precio"  name="precio" placeholder="Tu precio" required value="<?php echo $blog["precio"];?>">
               
            <label for="texto">Información: </label>
            <textarea  id="texto" name="texto"> <?php echo $blog["texto"];?> </textarea>
            
            <label for="texto">Imagen Actual: </label>
            <img src="<?php echo $blog["img"];?>" alt="" width="100px">
            <input type="hidden" name="imagenActual" value="<?php echo $blog["img"];?>" id="imagen">
            
            <label for="texto">Imagen: </label>
            <input type="file" name="imagen" id="imagen">
            
            <input type="hidden" name="id" value="<?php echo $blog["id"];?>">
            </fieldset> 
            <?php
                $blogUpdate = PaqueteControlador::ctrActualizarRegistro();
                if ($blogUpdate  == "ok") {
                    echo '<script>
                      location.href ="index.php?page=paq-admin";
                         </script>';
                }
            ?>

      
            <input type="submit" value="Enviar" class="boton boton-verde">

        </form>
    </main>
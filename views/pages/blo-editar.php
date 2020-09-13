<?php



$blog = BlogControlador::ctrMostarRegistro('id', $_GET['id']);

?>






<h1 class="fw-300 centrar-texto">Blog</h1>
    <main class="contenedor seccion contenido-centrado">
        <h2 class="fw-300 centrar-texto">Editar un blog</h2>

        <form class="contacto" method="post" enctype="multipart/form-data">
            <fieldset>
               
             <label for="titulo">Titulo: </label>
             <input type="text" id="titulo"  name="titulo" placeholder="Tu titulo" required value="<?php echo $blog["titulo"];?>">

             <label for="autor">Autor: </label>
             <input type="text" id="autor"  name="autor" placeholder="Nombre del autor" required value="<?php echo $blog["autor"];?>">
               
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
                $blogUpdate = BlogControlador::ctrActualizarRegistro();
                if ($blogUpdate  == "ok") {
                    echo '<script>
                      location.href ="index.php?page=blo-admin";
                         </script>';
                }
            ?>

      
            <input type="submit" value="Enviar" class="boton boton-verde">

        </form>
    </main>
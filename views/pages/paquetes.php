<main class="seccion contenedor">
        <h2 class="fw-300 centrar-texto">Paquetes Turistiscos</h2>

        <div class="contenedor-anuncios">
            <?php
              $paq  = PaqueteControlador::ctrMostarRegistro(null, null);       
              foreach($paq as $key => $value):         
            ?>         
        <div class="anuncio">
                <img src="<?php echo $value['img']; ?>" alt="Anuncio casa con alberca" width="100%" height="200px">
                <div class="contenido-anuncio">
                    <h3><?php echo $value['titulo']; ?></h3>
                    <p><?php echo substr( $value['texto'], 0, -20); ?></p>
                    <p class="precio">$ <?php echo $value['precio']; ?></p>
               

                    <a href="index.php?page=contacto" class="boton boton-amarillo d-block">Contacto</a>
                </div>
            </div>

            <?php
                 endforeach
            ?>
        </div>
    </main>
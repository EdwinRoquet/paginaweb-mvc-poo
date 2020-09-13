<main class="contenedor seccion contenido-centrado">
        <h1 class="fw-300 centrar-texto">Nuestro Blog</h1>
        <?php 

        $blog = BlogControlador::ctrMostarRegistro(null, null);
        foreach($blog as $key => $value):

        ?>

        <article class="entrada-blog">
            <div class="imagen">
                <img src="<?php echo $value['img']; ?>" alt="Entrada de blog">
            </div>
            <div class="texto-entrada">
                <a href="entrada.html">
                    <h4><?php echo $value['titulo']; ?></h4>
                </a>
                <p>Escrito por: <span> <?php echo $value['autor']; ?> </span> </p>
                <p><?php echo $value['texto']; ?></p>
            </div>
        </article>
        <?php
          endforeach
        ?>
    </main>
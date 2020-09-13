<section class="contenedor seccion">
        <h2 class="fw-300 centrar-texto">Más Sobre Nosotros</h2>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="views/img/icono1.svg" alt="Icono Seguridad">
                <h3>Seguridad</h3>
                <p>Disfruta de tus vacaciones sin preocuparte de la seguridad, nosotros te cuidamos mientras vacacionas.</p>
            </div>

            <div class="icono">
                <img src="views/img/icono2.svg" alt="Icono Mejor Precio">
                <h3>El Mejor Precio</h3>
                <p>Quasi quibusdam, quos deserunt, recusandae iusto dolorem voluptatibus quaerat veritatis consectetur culpa sit dignissimos maiores iure id, magnam non voluptatum molestiae doloremque.</p>
            </div>

            <div class="icono">
                <img src="views/img/icono3.svg" alt="Icono a Tiempo">
                <h3>Opten más...</h3>
                <p>Quasi quibusdam, quos deserunt, recusandae iusto dolorem voluptatibus quaerat veritatis consectetur culpa sit dignissimos maiores iure id, magnam non voluptatum molestiae doloremque.</p>
            </div>
        </div>
    </section>

    <main class="seccion contenedor">
        <h2 class="fw-300 centrar-texto">Paquetes turisticos</h2>

        <div class="contenedor-anuncios">
        <?php
              $paq  = PaqueteControlador::ctrMostarRegistroTres();       
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

        <div class="ver-todas">
            <a href="index.php?page=paquetes" class="boton boton-verde">Ver Todas</a>
        </div>
    </main>

    <section class="imagen-contacto">
        <div class="contenedor contenido-contacto">
            <h2>Encuentra el viaje de tus Sueños</h2>
            <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo a la brevedad</p>
            <a href="index.php?page=contacto" class="boton boton-amarillo">Contactános</a>
        </div>
    </section>

    <div class="seccion-inferior contenedor seccion">
        <section class="blog">
            <h3 class="centrar-texto fw-300"> Blog</h3>
            <?php 

            $blog = BlogControlador::ctrMostarRegistroDos();
            foreach($blog as $key => $value):
            
            ?>
            
            <article class="entrada-blog">
                <div class="imagen">
                    <img src="<?php echo $value['img']; ?>" alt="Entrada de blog" width="250px">
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
        
        </section>

        <section class="testimoniales">
            <h3 class="centrar-texto fw-300">Testimoniales</h3>
            <div class="testimonial">
                
                <blockquote>
                    El personal se comportó de una excelente forma, muy buena atención y los paquetes ofrecidos tiene muy buen precio.
                </blockquote>
                <p>- Leonado Dicaprio</p>
            </div>
        </section>

    </div>
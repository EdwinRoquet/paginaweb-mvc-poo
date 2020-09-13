<header class="site-header <?php echo !isset($_GET['page']) || $_GET['page'] == 'inicio' ? 'inicio' : ''   ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.php?page=inicio" class="text-logo">
                   Xcaret Travel
                </a>

                <div class="mobile-menu">
                    <a href="#navegacion">
                        <img src="views/img/barras.svg" alt="Icono Menu">
                    </a>
                </div>

                <nav id="navegacion" class="navegacion">
                    <a href="index.php?page=paquetes">Paquetes</a>
                    <a href="index.php?page=blog">Blog</a>
                    <a href="index.php?page=contacto" class="menu">Contacto</a>
                   
                    <?php
                     if (isset($_SESSION['validarIngreso']) != "ok") {
         
                       
                       echo '<a href="index.php?page=login">Iniciar Sesión</a> ';
                       echo '<a href="index.php?page=registrarse">Registrarse</a>';          
                   }else{
         
                     echo '<a href="index.php?page=admin">Admin</a>';        
                     echo '<a href="#">'. $_SESSION['nombre'] .'</a>';        
                     echo '<a href="index.php?page=logout">Cerrar Sesión</a>';        
         
         
                    }
                 
                  ?>
                    
                  
                </nav>
            </div>

            <?php 
                echo !isset($_GET['page']) || $_GET['page'] == 'inicio' ? "<h1>Visita lugares magicos y explora lugares icreibles</h1>" : '' ;   
            ?>
        
            

        </div> <!-- contenedor -->
</header>


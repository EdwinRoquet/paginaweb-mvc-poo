
<?php include 'views/includes/header.php';?>

<?php include 'views/includes/navigation.php';?>

    <!-- Conenido -->
<div class="container-fluid">
    <div class="container py-5">
     
    <?php
      //Sistema de rutas permitidas en la pagina
      if(isset($_GET["page"])){

         if($_GET["page"] == "contacto"    || 
            $_GET["page"] == "login"       || 
            $_GET["page"] == "paquetes"    || 
            $_GET["page"] == "blog"        || 
            $_GET["page"] == "inicio"      || 
            $_GET["page"] == "admin"       || 
            $_GET["page"] == "paq-admin"   || 
            $_GET["page"] == "paq-editar"  || 
            $_GET["page"] == "blo-admin"   || 
            $_GET["page"] == "blo-editar"  || 
            $_GET["page"] == "con-admin"   || 
            $_GET["page"] == "login"       || 
            $_GET["page"] == "registrarse" || 
            $_GET["page"] == "logout"){

             include "pages/". $_GET["page"].".php";
            }else{
                include "pages/404.php";
            }

      }else{
          include "pages/inicio.php";
      }
    ?>

</div>
</div>

<?php include 'views/includes/footer.php';  ?>

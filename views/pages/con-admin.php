<?php

if (!isset($_SESSION['validarIngreso'])) {
    echo "<script> window.location = 'index.php?page=login';</script>";
    return;
}else{
    if ($_SESSION['rol'] != "administrador"){
        echo "<script> window.location = 'index.php?page=inicio';</script>";
        return;
    }
}
 
?>

<h1 class="fw-300 centrar-texto">Administración de contactos</h1>
    <main class="contenedor seccion contenido-centrado" >
        <h2 class="fw-300 centrar-texto">Tabla de contactos</h2>
        
        <table style="width: 100%;">
            <thead>
                <th>#</th>
                <th>Asunto</th>
                <th>Mensaje</th>
                <th>Correo</th>
                <th>Numero</th>
                <th>Acción</th>
            </thead>
            <tbody>
                <?php
                   $user = ContactoControlador::ctrMostarRegistro(null, null);
                
                ?>
              
              <?php
                foreach($user as $key => $value):
                ?>
                 <tr>
                    <td><?php echo ($key+1); ?></td>
                    <td><?php echo $value['titulo']; ?></td>
                    <td><?php echo $value['texto']; ?></td>
                    <td><?php echo $value['numero']; ?></td>
                    <td><?php echo $value['correo']; ?></td>
                    <td>
                         
                         <form method="post">
                         <input type="hidden" value="<?php echo $value['id']; ?>" name="id"> 
                         <button type="submit" class=" boton  boton-rojo">Eliminar</button>
                             <?php
                                 $eliminar = new ContactoControlador();
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
    
    </main>
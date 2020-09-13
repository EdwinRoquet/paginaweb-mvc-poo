<?php

class ContactoControlador {

  
  //Metedo para registrar contacto
 static  public function ctrRegistro(){
   if(isset($_POST["titulo"])){
   
    
    $table = "contacto";
 
    $data = array(
        'titulo' => $_POST['titulo'],
        'texto' => $_POST['texto'],
        'numero' => $_POST['numero'],
        'correo' => $_POST['correo'],
    );
    $resultado = ModeloContacto::mdlRegistro($table, $data);
    return $resultado;
  }

}

//mostrar

static public function ctrMostarRegistro( $item, $value){

    $table = "contacto";
    $result = ModeloUsuario::mdlMostrarRegistro($table, $item, $value);
    return $result;
    
}


//Eliminar

public function ctrEliminarRegistro(){
  
  if(isset($_POST["id"])){

    $table = "contacto";

    $value =  $_POST["id"];

    $result = ModeloUsuario::mdlEliminarRegistro($table, $value);

    if ($result == "ok") {

      echo "<script> 
      alert('Eliminacion exitosa');
      location.href ='index.php?page=con-admin';
      </script>";

    }

  }


}


}
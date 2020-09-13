<?php

class BlogControlador {

  
  //Metedo para registrar usuarios
 static public function ctrRegistroBlog(){

    if(isset($_POST["titulo"])){


        $table = "blog";
        
        $ruta = "";

      if(isset($_FILES["imagen"]["tmp_name"])){
      
          list($ancho, $alto) = getimagesize($_FILES["imagen"]["tmp_name"]);
      
          $nuevoAncho = 500;
          $nuevoAlto = 500;
      
          /*=============================================
          CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
          =============================================*/
      
          $directorio = "views/img/blog/".$_POST["titulo"];
      
          mkdir($directorio, 0755);
      
          /*=============================================
          DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
          =============================================*/

         if($_FILES["imagen"]["type"] == "image/jpeg"){
     
             /*=============================================
             GUARDAMOS LA IMAGEN EN EL DIRECTORIO
             =============================================*/
     
             $aleatorio = mt_rand(100,999);
     
             $ruta = "views/img/blog/".$_POST["titulo"]."/".$aleatorio.".jpg";
     
             $origen = imagecreatefromjpeg($_FILES["imagen"]["tmp_name"]);						
     
             $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
     
             imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
     
             imagejpeg($destino, $ruta);
     
         }
     
         if($_FILES["imagen"]["type"] == "image/png"){
     
             /*=============================================
             GUARDAMOS LA IMAGEN EN EL DIRECTORIO
             =============================================*/
     
             $aleatorio = mt_rand(100,999);
     
             $ruta = "views/img/blog/".$_POST["titulo"]."/".$aleatorio.".png";
     
             $origen = imagecreatefrompng($_FILES["imagen"]["tmp_name"]);						
     
             $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
     
             imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
     
             imagepng($destino, $ruta);
     
         }
     
     }
     

        $data = array(
            "titulo" => $_POST["titulo"],
            "texto" => $_POST["texto"],
            "img" => $ruta,
            "autor" => $_POST["autor"],
        );

        $resultado = ModeloBlog::mdlRegistro($table, $data);

        return $resultado;

    }

}

// mostrar

static public function ctrMostarRegistro( $item, $value){

    $table = "blog";
    $result = ModeloBlog::mdlMostrarRegistro($table, $item, $value);
    return $result;
    
}
static public function ctrMostarRegistroDos(){

    $table = "blog";
    $result = ModeloBlog::mdlMostrarDos($table);
    return $result;
    
}
// mostrar


static public function ctrActualizarRegistro(){

  if (isset($_POST["titulo"])) {
    

    $ruta = $_POST["imagenActual"];
    $table = "blog";
   
   

    if(isset($_FILES["imagen"]["tmp_name"]) && !empty($_FILES["imagen"]["tmp_name"])){

   list($ancho, $alto) = getimagesize($_FILES["imagen"]["tmp_name"]);

   $nuevoAncho = 500;
   $nuevoAlto = 500;

   /*=============================================
   CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
   =============================================*/

   $directorio = "views/img/blog/".$_POST["titulo"];

   /*=============================================
   PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
   =============================================*/

   if(!empty($_POST["imagenActual"])){

     unlink($_POST["imagenActual"]);

   }else{

     mkdir($directorio, 0755);	
   
   }
   
   /*=============================================
   DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
   =============================================*/

   if($_FILES["imagen"]["type"] == "image/jpeg"){

     /*=============================================
     GUARDAMOS LA IMAGEN EN EL DIRECTORIO
     =============================================*/

     $aleatorio = mt_rand(100,999);

     $ruta = "views/img/blog/".$_POST["titulo"]."/".$aleatorio.".jpg";

     $origen = imagecreatefromjpeg($_FILES["imagen"]["tmp_name"]);						

     $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

     imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

     imagejpeg($destino, $ruta);

   }

   if($_FILES["imagen"]["type"] == "image/png"){

     /*=============================================
     GUARDAMOS LA IMAGEN EN EL DIRECTORIO
     =============================================*/

     $aleatorio = mt_rand(100,999);

     $ruta = "views/img/blog/".$_POST["titulo"]."/".$aleatorio.".png";

     $origen = imagecreatefrompng($_FILES["imagen"]["tmp_name"]);						

     $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

     imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

     imagepng($destino, $ruta);

   }

 }

 $data = array(
  "id" => $_POST["id"],
  "titulo" => $_POST["titulo"],
  "texto" => $_POST["texto"],
  "img" => $ruta,
  "autor" => $_POST["autor"],
 );
 
 $resultado = ModeloBlog::mdlEditarRegistro($table, $data);
 
 return $resultado;
 


  }
  
}




// Eliminar

public function ctrEliminarRegistro(){
  
  if(isset($_POST["id_eliminar"])){
    // echo $_POST["id_eliminar"];
    // return

    $table = "blog";

    unlink($_POST["imageneliminar"]);

    $value =  $_POST["id_eliminar"];

    $resultado = ModeloBlog::mdlEliminarRegistro($table, $value);

    if ($resultado == "ok") {

      echo "<script> 
         alert('Eliminacion exitosa');
         location.href ='index.php?page=blo-admin';
      </script>";

    }

  }


}


}




<?php

class UsuarioControlador {

  
  //Metedo para registrar usuarios
 static  public function ctrRegistro(){
   if(isset($_POST["nombre"])){
   
    
    $table = "usuarios";
    //Encriptar contraseña
		$opciones = [
			'cost' => 12,
		];
    $encriptar  =	password_hash($_POST['contrasena'], PASSWORD_BCRYPT, $opciones);
    
    // $usuario = (isset($_POST['rol']) == '') ? 'usuario' : 'administrador';

    if(isset($_POST['rol']) == ''){
      $usuario = 'usuario'; 
    }else{

      if ($_POST['rol'] == "usuario" ) {
        $usuario = 'usuario';
      }
      if($_POST['rol'] == "administrador" ) {
        $usuario = 'administrador';

    }
  }
        

        $data = array(
            'nombre' => $_POST['nombre'],
            'rol' => $usuario,
            'correo' => $_POST['email'],
            'contrasena' => $encriptar ,
        );
        $resultado = ModeloUsuario::mdlRegistro($table, $data);
        return $resultado;
    }

}

//mostrar

static public function ctrMostarRegistro( $item, $value){

    $table = "usuarios";
    $result = ModeloUsuario::mdlMostrarRegistro($table, $item, $value);
    return $result;
    
}


public function ctrLogin(){
    if (isset($_POST['email'])) {
        
        $table = "usuarios";
        $item  = "correo";
        $value = $_POST['email'];

    
     $resultado = ModeloUsuario::mdlMostrarRegistro($table, $item, $value);
     
     if ($resultado['correo'] == $_POST['email'] && password_verify($_POST['contrasena'], $resultado['contrasena']) ) {
        
       $_SESSION['validarIngreso'] = 'ok';
       $_SESSION['nombre'] = $resultado['nombre'];
       $_SESSION['correo'] = $resultado['correo'];
       $_SESSION['rol'] = $resultado['rol'];


        echo "<script> 
            alert('Ingreso exitoso');
            location.href ='index.php?page=admin';
            </script>";
            
          } else {
            echo "<script> 
            location.href ='index.php?page=login';
            alert('Usuario o Contraseña incorrectos');
            
        </script>";
  
     }
     
    }
}
  

//Eliminar

public function ctrEliminarRegistro(){
  
  if(isset($_POST["id"])){

    $table = "usuarios";

    $value =  $_POST["id"];

    $result = ModeloUsuario::mdlEliminarRegistro($table, $value);

    if ($result == "ok") {

      echo "<script> 
      alert('Eliminacion exitosa');
      location.href ='index.php?page=admin';
      </script>";

    }

  }


}


}
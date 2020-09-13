<?php
require_once "conexion.php";

class ModeloContacto {

    // registry

   static public function mdlRegistro($table, $data) {
    #Statment/ declaracion    

    $stmt = Connection::connect()->prepare("INSERT INTO $table (titulo, texto, numero, correo) VALUES (:titulo, :texto, :numero, :correo )");

    $stmt->bindParam(":titulo",  $data["titulo"],PDO::PARAM_STR);
    $stmt->bindParam(":texto",   $data["texto"],PDO::PARAM_STR);
    $stmt->bindParam(":correo",   $data["correo"],PDO::PARAM_STR);
    $stmt->bindParam(":numero",$data["numero"],PDO::PARAM_STR);

    if ($stmt->execute()) {
      return "ok";
    }else{
      print_r(Connection::connect()->errorCode());  
    }


    $stmt->closeCursor();
    $stmt-> NULL;

   }


   static public function mdlMostrarRegistro($table ,$item, $value){
    if($item != null){

			$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Connection::connect()->prepare("SELECT * FROM $table");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}
  
  }

  

   static public function mdlEliminarRegistro($table, $data){

    $stmt = Connection::connect()->prepare("DELETE FROM $table WHERE id = :id ");

    $stmt->bindParam(":id", $data,PDO::PARAM_INT);

    if ($stmt->execute()) {
      return "ok";
    }else{
      print_r(Connection::connect()->errorCode());  
    }


    $stmt->closeCursor();
    // $stmt-> null;
   }


}
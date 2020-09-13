<?php

class Connection {

    static public function connect(){
      #PDO ("nombre del servidor; nombre de la base de datos","usuario","contraseña")
      $link = new PDO("mysql:host=localhost;
      dbname=turismo",
      "root",
      "");
      
      $link ->exec("set names utf8");

      return $link;
    }

}
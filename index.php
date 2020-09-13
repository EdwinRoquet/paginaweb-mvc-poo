<?php

require_once "controllers/templeteControlador.php";
require_once "controllers/PaqueteControlador.php";
require_once "controllers/UsuarioControlador.php";
require_once "controllers/ContactoControlador.php";
require_once "controllers/BlogControlador.php";



require_once "models/ModeloPaquete.php";
require_once "models/ModeloUsuario.php";
require_once "models/ModeloContacto.php";
require_once "models/ModeloBlog.php";

$templete = new ControllerTemplete();

$templete-> ctrBingTemplete();
<?php


require "controladores/plantilla.controlador.php";
require "controladores/ruta.controlador.php";

require_once "backoffice/controladores/usuarios.controlador.php";
require_once "backoffice/modelos/usuarios.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();
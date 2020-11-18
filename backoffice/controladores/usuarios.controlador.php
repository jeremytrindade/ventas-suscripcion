<?php

Class ControladorUsuarios{

	/*=============================================
	Registro de usuarios
	=============================================*/

	public function ctrRegistroUsuario(){



		if(isset($_POST["registroNombre"])){

			$ruta = ControladorRuta::ctrRuta();

			if(preg_match('/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["registroNombre"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["registroEmail"]) &&
			    preg_match('/^[a-zA-Z0-9]+$/', $_POST["registroPassword"])){

				$encriptar = crypt($_POST["registroPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$encriptarEmail = md5($_POST["registroEmail"]);

				$tabla = "usuarios";
				$datos = array("perfil" => "usuario",
							   "nombre" => $_POST["registroNombre"],
							   "email" => $_POST["registroEmail"],
							   "password" => $encriptar,
							   "suscripcion" => 0,
							   "verificacion" => 0,
							   "email_encriptado" => $encriptarEmail,
							   "patrocinador" => $_POST["patrocinador"]); 

				$respuesta = ModeloUsuarios::mdlRegistroUsuario($tabla, $datos);

			}else{

				echo "No se permiten caracteres especiales en ninguno de los campos!";
			}}}}
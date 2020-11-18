<?php

require_once "conexion.php";

Class ModeloUsuarios{

	/*============================================
	=            Registro de usuarios            =
	============================================*/

	static public function mdlRegistroUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(perfil, nombre, email, password, suscripcion, verificacion, email_encriptado, patrocinador) VALUES (:perfil, :nombre, :email, :password, :suscripcion, :verificacion, :email_encriptado, :patrocinador)"); //termino muito ussado para conexao de db

		$stmt->binParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
		$stmt->binParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->binParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->binParam(":password", $datos["password"], PDO::PARAM_STR);
		$stmt->binParam(":suscripcion", $datos["suscripcion"], PDO::PARAM_STR);
		$stmt->binParam(":verificacion", $datos["verificacion"], PDO::PARAM_STR);
		$stmt->binParam(":email_encriptado", $datos["email_encriptado"], PDO::PARAM_STR);
		$stmt->binParam(":patrocinador", $datos["patrocinador"], PDO::PARAM_STR);//lançar parametro

		if($stmt->execute()){

			return "ok";
		}else{
			return print_r(Connexion::conectar()->errorInfo());
		}

		$stmt->close();//por segurança
		$stmt = null;//por segurança
	}	
}
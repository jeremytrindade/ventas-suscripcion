<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=ventas-suscripcion",
						"root",
						"root"); // PDO para fazer uma conexão mais segura a 

		$link->exec("set name utf8");

		return $link;

	}
	
}
<?php

require_once "conexion.php";

class ModeloHijoTrabajador{

	

	/*=============================================
	MOSTRAR CATEGORIAS
	=============================================*/

	static public function mdlMostrarMostrarHijoTrabajador($tabla1, $tabla2, $id_trabajador, $item){
 
		$stmt = Conexion::conectar()->prepare("SELECT $tabla1.trabajadores, $tabla2.hijos FROM $tabla1 INNER JOIN $tabla2 ON $tabla1.id_trabajador = $tabla2.$item WHERE $item = :$item");
 
		$stmt -> bindParam(":".$item, $idTrabajador, PDO::PARAM_STR);
 
		$stmt -> execute();
 
		return $stmt -> fetchAll();
 
		$stmt -> close();
 
		$stmt = null;


	

}
}


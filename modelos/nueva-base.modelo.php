<?php

require_once "conexion.php";

class ModeloNuevaBase{

	/*=============================================
	MOSTRAR CAMBIOS APOYO DE TRRANSPORTE
	=============================================*/

	static public function mdl_MostrarNuevaBase($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}



	


	/*=============================================
	REGISTRO NUEVO APOYO DE TRANSPORTE
	=============================================*/

	static public function mdl_CrearNuevaBase($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_trabajador, nombre_completo, tipo_empleado, nueva_base, f_registro_NuevaBase, capturista_nuevabase) VALUES (:id_trabajador, :nombre_completo, :tipo_empleado, :nueva_base, :f_registro_NuevaBase, :capturista_nuevabase )");

		$stmt->bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);

		$stmt->bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);

		$stmt->bindParam(":tipo_empleado", $datos["tipo_empleado"], PDO::PARAM_STR);

		$stmt->bindParam(":nueva_base", $datos["nueva_base"], PDO::PARAM_STR);

		$stmt->bindParam(":f_registro_NuevaBase", $datos["f_registro_NuevaBase"], PDO::PARAM_STR);

		$stmt->bindParam(":capturista_nuevabase", $datos["capturista_nuevabase"], PDO::PARAM_STR);
		
		
	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	


	/*============================================================
	EDITAR MODULO CAMBIO DE CATEGORIA
	=============================================================*/
	
	static public function mdl_EditarNuevaBase($tabla, $datos){

		 $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_trabajador = :id_trabajador, nueva_base = :nueva_base, f_registro_NuevaBase = :f_registro_NuevaBase, capturista_nuevabase = :capturista_nuevabase  WHERE id_nuevabase = :id_nuevabase");

			$stmt-> bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);
			$stmt-> bindParam(":nueva_base", $datos["nueva_base"], PDO::PARAM_STR);
			$stmt-> bindParam(":f_registro_NuevaBase", $datos["f_registro_NuevaBase"], PDO::PARAM_STR);
			$stmt-> bindParam(":capturista_nuevabase", $datos["capturista_nuevabase"], PDO::PARAM_STR);
			$stmt-> bindParam(":id_nuevabase", $datos["id_nuevabase"], PDO::PARAM_INT);
			
			


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}



}//FIN DE LA CLASE


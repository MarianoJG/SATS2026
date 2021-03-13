<?php

require_once "conexion.php";

class ModeloComplemento{

	/*=============================================
	MOSTRAR CAMBIOS APOYO DE TRRANSPORTE
	=============================================*/

	static public function mdl_MostrarComplemento($tabla, $item, $valor){

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

	static public function mdl_CrearComplemento($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_trabajador, nombre_completo, tipo_empleado, complemento, monto_complemento, f_registro_complemento, capturista_complemento) VALUES (:id_trabajador, :nombre_completo, :tipo_empleado, :complemento, :monto_complemento, :f_registro_complemento, :capturista_complemento )");

		$stmt->bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);

		$stmt->bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);

		$stmt->bindParam(":tipo_empleado", $datos["tipo_empleado"], PDO::PARAM_STR);

		$stmt->bindParam(":complemento", $datos["complemento"], PDO::PARAM_STR);
		
		$stmt->bindParam(":monto_complemento", $datos["monto_complemento"], PDO::PARAM_STR);

		$stmt->bindParam(":f_registro_complemento", $datos["f_registro_complemento"], PDO::PARAM_STR);

		$stmt->bindParam(":capturista_complemento", $datos["capturista_complemento"], PDO::PARAM_STR);
		
		
	

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
	
	static public function mdl_EditarComplemento($tabla, $datos){

		 $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_trabajador = :id_trabajador, nombre_completo = :nombre_completo, tipo_empleado = :tipo_empleado, complemento = :complemento, monto_complemento = :monto_complemento, f_registro_complemento = :f_registro_complemento, capturista_complemento = :capturista_complemento  WHERE id_complemento = :id_complemento");

			$stmt-> bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);
			$stmt-> bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);
			$stmt-> bindParam(":tipo_empleado", $datos["tipo_empleado"], PDO::PARAM_STR);
			$stmt-> bindParam(":complemento", $datos["complemento"], PDO::PARAM_STR);
			$stmt-> bindParam(":monto_complemento", $datos["monto_complemento"], PDO::PARAM_STR);
			$stmt-> bindParam(":f_registro_complemento", $datos["f_registro_complemento"], PDO::PARAM_STR);
			$stmt-> bindParam(":capturista_complemento", $datos["capturista_complemento"], PDO::PARAM_STR);
			$stmt-> bindParam(":id_complemento", $datos["id_complemento"], PDO::PARAM_INT);
			
			


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	

	





}//FIN DE LA CLASE


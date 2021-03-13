<?php

require_once "conexion.php";

class ModeloApoyoTransporte{

	/*=============================================
	MOSTRAR CAMBIOS APOYO DE TRRANSPORTE
	=============================================*/

	static public function mdl_MostrarApoyoTransporte($tabla, $item, $valor){

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

	static public function mdl_CrearApoyoTransporte($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_trabajador, nombre_completo, tipo_empleado, apoyo_transporte, monto_transporte, f_registro_AT, capturista_transporte) VALUES (:id_trabajador, :nombre_completo, :tipo_empleado, :apoyo_transporte, :monto_transporte, :f_registro_AT, :capturista_transporte )");

		$stmt->bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);

		$stmt->bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);

		$stmt->bindParam(":tipo_empleado", $datos["tipo_empleado"], PDO::PARAM_STR);

		$stmt->bindParam(":apoyo_transporte", $datos["apoyo_transporte"], PDO::PARAM_STR);
		
		$stmt->bindParam(":monto_transporte", $datos["monto_transporte"], PDO::PARAM_STR);

		$stmt->bindParam(":f_registro_AT", $datos["f_registro_AT"], PDO::PARAM_STR);

		$stmt->bindParam(":capturista_transporte", $datos["capturista_transporte"], PDO::PARAM_STR);
		
		
	

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
	
	static public function mdl_EditarApoyoTransporte($tabla, $datos){

		 $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_trabajador = :id_trabajador, nombre_completo = :nombre_completo, tipo_empleado = :tipo_empleado, apoyo_transporte = :apoyo_transporte, monto_transporte = :monto_transporte, f_registro_AT = :f_registro_AT, capturista_transporte = :capturista_transporte  WHERE id_transporte = :id_transporte");

			$stmt-> bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);
			$stmt-> bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);
			$stmt-> bindParam(":tipo_empleado", $datos["tipo_empleado"], PDO::PARAM_STR);
			$stmt-> bindParam(":apoyo_transporte", $datos["apoyo_transporte"], PDO::PARAM_STR);
			$stmt-> bindParam(":monto_transporte", $datos["monto_transporte"], PDO::PARAM_STR);
			$stmt-> bindParam(":f_registro_AT", $datos["f_registro_AT"], PDO::PARAM_STR);
			$stmt-> bindParam(":capturista_transporte", $datos["capturista_transporte"], PDO::PARAM_STR);
			$stmt-> bindParam(":id_transporte", $datos["id_transporte"], PDO::PARAM_INT);
			
			


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	

	





}//FIN DE LA CLASE


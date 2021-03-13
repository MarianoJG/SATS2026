<?php

require_once "conexion.php";

class ModeloCambioAdscripcion{

	/*=============================================
	MOSTRAR CAMBIO DE CATEGORIA
	=============================================*/

	static public function mdl_MostrarCambioAdscripcion($tabla, $item, $valor){

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
	REGISTRO NUEVO CAMBIO DE CATEGORIA
	=============================================*/

	static public function mdl_CrearCambioAdscripcion($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_trabajador, nombre_completo, tipo_empleado, adscripcion_actual, adscripcion_nuevo, f_registro_cadsc, capturista_cadsc, id_departamento) VALUES (:id_trabajador, :nombre_completo, :tipo_empleado, :adscripcion_actual, :adscripcion_nuevo, :f_registro_cadsc, :capturista_cadsc, :id_departamento )");

		$stmt->bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);

		$stmt->bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);

		$stmt->bindParam(":tipo_empleado", $datos["tipo_empleado"], PDO::PARAM_STR);

		$stmt->bindParam(":adscripcion_actual", $datos["adscripcion_actual"], PDO::PARAM_STR);
		
		$stmt->bindParam(":adscripcion_nuevo", $datos["adscripcion_nuevo"], PDO::PARAM_STR);

		$stmt->bindParam(":f_registro_cadsc", $datos["f_registro_cadsc"], PDO::PARAM_STR);

		$stmt->bindParam(":capturista_cadsc", $datos["capturista_cadsc"], PDO::PARAM_STR);

		$stmt->bindParam(":id_departamento", $datos["id_departamento"], PDO::PARAM_STR);
		
		
	

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
	
	static public function mdl_EditarCambioAdscripcion($tabla, $datos){

		 $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_trabajador = :id_trabajador, nombre_completo = :nombre_completo, tipo_empleado = :tipo_empleado, adscripcion_nuevo = :adscripcion_nuevo, f_registro_cadsc = :f_registro_cadsc, id_departamento = :id_departamento, id_c_adscripcion = :id_c_adscripcion, capturista_cadsc = :capturista_cadsc  WHERE id_c_adscripcion = :id_c_adscripcion");

			$stmt-> bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);
			$stmt-> bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);
			$stmt-> bindParam(":tipo_empleado", $datos["tipo_empleado"], PDO::PARAM_STR);
			$stmt-> bindParam(":adscripcion_nuevo", $datos["adscripcion_nuevo"], PDO::PARAM_STR);
			
			
			$stmt-> bindParam(":f_registro_cadsc", $datos["f_registro_cadsc"], PDO::PARAM_STR);
			$stmt-> bindParam(":id_departamento", $datos["id_departamento"], PDO::PARAM_STR);
			$stmt-> bindParam(":id_c_adscripcion", $datos["id_c_adscripcion"], PDO::PARAM_INT);
			$stmt-> bindParam(":capturista_cadsc", $datos["capturista_cadsc"], PDO::PARAM_STR);
			
			


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*============================================================
	ACTUALIZACION DEL CAMPO "DEPARTAMENTO" EN REGISTRO TRABAJADORES AL MOMENTO DE REGISTRAR UN CAMBIO DE ADSCRIPCION EN ESCALAFON-CAMBIO-ADSCRIPCION
	=============================================================*/
	

	static public function mdlActualizarCampoDepartamento($tabla2, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 SET departamento = :departamento WHERE id_trabajador = :id_trabajador");


		$stmt -> bindParam(":departamento", $datos["departamento"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_INT);
	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	




}//FIN DE LA CLASE


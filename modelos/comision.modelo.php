<?php

require_once "conexion.php";

class ModeloComision{

	/*=============================================
	MOSTRAR COMISIONES
	=============================================*/

	static public function mdl_MostrarComision($tabla, $item, $valor){

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
	REGISTRO NUEVA COMISION
	=============================================*/

	static public function mdl_CrearComision($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_trabajador, nombre_completo, tipo_empleado, adscripcion_actual, tipo_movimiento, f_registro_comision, capturista_comision, adscripcion_comision, id_departamento) VALUES (:id_trabajador, :nombre_completo, :tipo_empleado, :adscripcion_actual, :tipo_movimiento, :f_registro_comision, :capturista_comision,  :adscripcion_comision, :id_comision )");

		$stmt->bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);

		$stmt->bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);

		$stmt->bindParam(":tipo_empleado", $datos["tipo_empleado"], PDO::PARAM_STR);

		$stmt->bindParam(":adscripcion_actual", $datos["adscripcion_actual"], PDO::PARAM_STR);
		
		$stmt->bindParam(":tipo_movimiento", $datos["tipo_movimiento"], PDO::PARAM_STR);

		$stmt->bindParam(":f_registro_comision", $datos["f_registro_comision"], PDO::PARAM_STR);

		$stmt->bindParam(":capturista_comision", $datos["capturista_comision"], PDO::PARAM_STR);

		$stmt->bindParam(":adscripcion_comision", $datos["adscripcion_comision"], PDO::PARAM_STR);

		$stmt->bindParam(":id_comision", $datos["id_comision"], PDO::PARAM_STR);
		
		
	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	


	/*============================================================
	EDITAR MODULO DE COMISION
	=============================================================*/
	
	static public function mdl_EditarComision($tabla, $datos){

		  $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_trabajador = :id_trabajador, nombre_completo = :nombre_completo, tipo_empleado = :tipo_empleado, adscripcion_actual = :adscripcion_actual, tipo_movimiento = :tipo_movimiento, f_registro_comision = :f_registro_comision, capturista_comision = :capturista_comision , adscripcion_comision = :adscripcion_comision, id_comision = :id_comision WHERE id_comision = :id_comision");

			$stmt-> bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);
			$stmt-> bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);
			$stmt-> bindParam(":tipo_empleado", $datos["tipo_empleado"], PDO::PARAM_STR);
			$stmt-> bindParam(":adscripcion_actual", $datos["adscripcion_actual"], PDO::PARAM_STR);			
			$stmt-> bindParam(":tipo_movimiento", $datos["tipo_movimiento"], PDO::PARAM_STR);
			$stmt-> bindParam(":f_registro_comision", $datos["f_registro_comision"], PDO::PARAM_STR);
			$stmt-> bindParam(":id_comision", $datos["id_comision"], PDO::PARAM_INT);
			$stmt-> bindParam(":capturista_comision", $datos["capturista_comision"], PDO::PARAM_STR);
			$stmt-> bindParam(":adscripcion_comision", $datos["adscripcion_comision"], PDO::PARAM_STR);
			$stmt-> bindParam(":id_comision", $datos["id_comision"], PDO::PARAM_STR);

			
		
			


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


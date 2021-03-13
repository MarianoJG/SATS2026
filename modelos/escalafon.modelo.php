<?php

require_once "conexion.php";

class ModeloEscalafon{

	/*=============================================
	MOSTRAR CAMBIOS DE CATEGORIA
	=============================================*/

	static public function mdl_MostrarCambioCategoria($tabla, $item, $valor){

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
	REGISTRO NUEVO ESCALAFON-CATEGORIA
	=============================================*/

	static public function mdl_CrearCambioCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_trabajador, cambio_categoria, monto_cc, f_registro_cc, capturista_esc) VALUES (:id_trabajador,:cambio_categoria, :monto_cc, :f_registro_cc, :capturista_esc )");

		$stmt->bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);

		$stmt->bindParam(":cambio_categoria", $datos["cambio_categoria"], PDO::PARAM_STR);
		
		$stmt->bindParam(":monto_cc", $datos["monto_cc"], PDO::PARAM_STR);

		$stmt->bindParam(":f_registro_cc", $datos["f_registro_cc"], PDO::PARAM_STR);

		$stmt->bindParam(":capturista_esc", $datos["capturista_esc"], PDO::PARAM_STR);
		
	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*============================================================
	ACTUALIZACION DEL CAMPO "CATEGORIA" EN REGISTRO TRABAJADORES AL MOMENTO DE REGISTRAR UN ASCENSO EN ESCALAFON-CAMBIO-CATEGORIA
	=============================================================*/
	

	static public function mdlActualizarCampoCategoria($tabla2, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 SET categoria = :categoria WHERE id_trabajador = :id_trabajador");


		$stmt -> bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		// $stmt->bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);
		// $stmt -> bindParam(":f_nacimiento", $datos["f_nacimiento"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_INT);
		//$stmt->bindParam(":nom_capturistaH", $datos["nom_capturistaH"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}



	/*============================================================
	ACTUALIZACION DEL CAMPO "TIPO EMPLEADO" EN REGISTRO TRABAJADORES AL MOMENTO DE ASIGNAR UNA NUEVA BASE SINDICAL EN ESCALAFON-NUEVA-BASE
	=============================================================*/
	

	static public function mdlActualizarCampoTipoEmpleado($tabla2, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla2 SET tipo_empleado = :tipo_empleado WHERE id_trabajador = :id_trabajador");


		$stmt -> bindParam(":tipo_empleado", $datos["tipo_empleado"], PDO::PARAM_STR);
		// $stmt->bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);
		// $stmt -> bindParam(":f_nacimiento", $datos["f_nacimiento"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_INT);
		//$stmt->bindParam(":nom_capturistaH", $datos["nom_capturistaH"], PDO::PARAM_STR);

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
	

	static public function mdlEditarCambioCategoria($tabla, $datos){

		 $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_trabajador = :id_trabajador, cambio_categoria = :cambio_categoria, monto_cc = :monto_cc, f_registro_cc = :f_registro_cc, capturista_esc = :capturista_esc  WHERE id_escalafon = :id_escalafon");
		
		$stmt->bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);
		$stmt -> bindParam(":cambio_categoria", $datos["cambio_categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":monto_cc", $datos["monto_cc"], PDO::PARAM_STR);
		$stmt -> bindParam(":f_registro_cc", $datos["f_registro_cc"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_escalafon", $datos["id_escalafon"], PDO::PARAM_INT);
		$stmt->bindParam(":capturista_esc", $datos["capturista_esc"], PDO::PARAM_STR);




		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}



	// static public function mdlEditarUltimoRegistroCambioCategoria($tabla, $datos){

	
	// 		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_trabajador = :id_trabajador, cambio_categoria = :cambio_categoria, monto_cc = :monto_cc, f_registro_cc = :f_registro_cc, capturista_esc = :capturista_esc , id_escalafon = :id_escalafon  WHERE id_trabajador=(SELECT MAX(id_escalafon)");
		
	// 	$stmt->bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);
	// 	$stmt -> bindParam(":cambio_categoria", $datos["cambio_categoria"], PDO::PARAM_STR);
	// 	$stmt->bindParam(":monto_cc", $datos["monto_cc"], PDO::PARAM_STR);
	// 	$stmt -> bindParam(":f_registro_cc", $datos["f_registro_cc"], PDO::PARAM_STR);
	// 	$stmt -> bindParam(":id_escalafon", $datos["id_escalafon"], PDO::PARAM_INT);
	// 	$stmt->bindParam(":capturista_esc", $datos["capturista_esc"], PDO::PARAM_STR);




	// 	if($stmt->execute()){

	// 		return "ok";

	// 	}else{

	// 		return "error";
		
	// 	}

	// 	$stmt->close();
	// 	$stmt = null;

	// }





}//FIN DE LA CLASE


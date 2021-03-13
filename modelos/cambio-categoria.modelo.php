<?php

require_once "conexion.php";

class ModeloCambioCategoria{

	/*=============================================
	MOSTRAR CAMBIO DE CATEGORIA
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
	REGISTRO NUEVO CAMBIO DE CATEGORIA
	=============================================*/

	static public function mdl_CrearCambioCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_trabajador, nombre_completo, tipo_empleado, cambio_categoria, monto_cc, f_registro_cc, capturista_cc, id_categoria) VALUES (:id_trabajador, :nombre_completo, :tipo_empleado, :cambio_categoria, :monto_cc, :f_registro_cc, :capturista_cc, :id_categoria )");

		$stmt->bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);

		$stmt->bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);

		$stmt->bindParam(":tipo_empleado", $datos["tipo_empleado"], PDO::PARAM_STR);

		$stmt->bindParam(":cambio_categoria", $datos["cambio_categoria"], PDO::PARAM_STR);
		
		$stmt->bindParam(":monto_cc", $datos["monto_cc"], PDO::PARAM_STR);

		$stmt->bindParam(":f_registro_cc", $datos["f_registro_cc"], PDO::PARAM_STR);

		$stmt->bindParam(":capturista_cc", $datos["capturista_cc"], PDO::PARAM_STR);

		$stmt->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_STR);
		
		
	

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
	
	static public function mdl_EditarCambioCategoria($tabla, $datos){

		 $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_trabajador = :id_trabajador, nombre_completo = :nombre_completo, tipo_empleado = :tipo_empleado, cambio_categoria = :cambio_categoria, monto_cc = :monto_cc, f_registro_cc = :f_registro_cc, id_categoria = :id_categoria, id_c_categoria = :id_c_categoria, capturista_cc = :capturista_cc  WHERE id_c_categoria = :id_c_categoria");

			$stmt-> bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);
			$stmt-> bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);
			$stmt-> bindParam(":tipo_empleado", $datos["tipo_empleado"], PDO::PARAM_STR);
			$stmt-> bindParam(":cambio_categoria", $datos["cambio_categoria"], PDO::PARAM_STR);
			
			$stmt-> bindParam(":monto_cc", $datos["monto_cc"], PDO::PARAM_STR);
			$stmt-> bindParam(":f_registro_cc", $datos["f_registro_cc"], PDO::PARAM_STR);
			$stmt-> bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_STR);
			$stmt-> bindParam(":id_c_categoria", $datos["id_c_categoria"], PDO::PARAM_INT);
			$stmt-> bindParam(":capturista_cc", $datos["capturista_cc"], PDO::PARAM_STR);
			
			


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


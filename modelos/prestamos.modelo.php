<?php

require_once "conexion.php";

class ModeloPrestamos{

/*=============================================
MOSTRAR PRESTAMOS
=============================================*/

static public function mdlMostrarPrestamos($tabla, $item, $valor){

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
MOSTRAR PRESTAMOS
=============================================*/

static public function mdlMostrarTipoPrestamo($tabla, $item, $valor){

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
REGISTRO NUEVO PRESTAMO
=============================================*/

static public function mdlCrearPrestamo($tabla, $datos){

	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_trabajador, nombre_completo, tipo_empleado, tipo_prestamo, monto_tp, f_registro_tp, capturista_tp, id_tipo_prestamo, estatus_prestamo) VALUES (:id_trabajador, :nombre_completo, :tipo_empleado, :tipo_prestamo, :monto_tp, :f_registro_tp, :capturista_tp, :id_tipo_prestamo, :estatus_prestamo )");

	$stmt->bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);

	$stmt->bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);

	$stmt->bindParam(":tipo_empleado", $datos["tipo_empleado"], PDO::PARAM_STR);

	$stmt->bindParam(":tipo_prestamo", $datos["tipo_prestamo"], PDO::PARAM_STR);
	
	$stmt->bindParam(":monto_tp", $datos["monto_tp"], PDO::PARAM_STR);

	$stmt->bindParam(":f_registro_tp", $datos["f_registro_tp"], PDO::PARAM_STR);

	$stmt->bindParam(":capturista_tp", $datos["capturista_tp"], PDO::PARAM_STR);

	$stmt->bindParam(":id_tipo_prestamo", $datos["id_tipo_prestamo"], PDO::PARAM_STR);

	$stmt->bindParam(":estatus_prestamo", $datos["estatus_prestamo"], PDO::PARAM_STR);
	
	


	if($stmt->execute()){

		return "ok";

	}else{

		return "error";
	
	}

	$stmt->close();
	$stmt = null;

}





/*============================================================
EDITAR MODULO PRESTAMOS
=============================================================*/

static public function mdlEditarPrestamo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_trabajador = :id_trabajador, nombre_completo = :nombre_completo,tipo_empleado = :tipo_empleado, tipo_prestamo = :tipo_prestamo, monto_tp = :monto_tp, f_registro_tp = :f_registro_tp, id_tipo_prestamo = :id_tipo_prestamo, id_finanzas_prestamo = :id_finanzas_prestamo, capturista_tp = :capturista_tp, estatus_prestamo = :estatus_prestamo  WHERE id_finanzas_prestamo = :id_finanzas_prestamo");

			$stmt-> bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);
			$stmt-> bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);
			$stmt-> bindParam(":tipo_empleado", $datos["tipo_empleado"], PDO::PARAM_STR);
			$stmt-> bindParam(":tipo_prestamo", $datos["tipo_prestamo"], PDO::PARAM_STR);
			
			$stmt-> bindParam(":monto_tp", $datos["monto_tp"], PDO::PARAM_STR);
			$stmt-> bindParam(":f_registro_tp", $datos["f_registro_tp"], PDO::PARAM_STR);
			$stmt-> bindParam(":id_tipo_prestamo", $datos["id_tipo_prestamo"], PDO::PARAM_STR);
			$stmt-> bindParam(":id_finanzas_prestamo", $datos["id_finanzas_prestamo"], PDO::PARAM_INT);
			$stmt-> bindParam(":capturista_tp", $datos["capturista_tp"], PDO::PARAM_STR);
			$stmt-> bindParam(":estatus_prestamo", $datos["estatus_prestamo"], PDO::PARAM_STR);
		
		


	if($stmt->execute()){

		return "ok";

	}else{

		return "error";
	
	}

	$stmt->close();
	$stmt = null;

}


/*============================================================
EDITAR APLICAR PRESTAMOS
=============================================================*/

static public function mdlEditarAplicarPrestamo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_trabajador = :id_trabajador, nombre_completo = :nombre_completo,tipo_empleado = :tipo_empleado, tipo_prestamo = :tipo_prestamo, monto_tp = :monto_tp, f_aplicacion = :f_aplicacion, id_tipo_prestamo = :id_tipo_prestamo, id_finanzas_prestamo = :id_finanzas_prestamo,  capturista_aplica_prestamo = :capturista_aplica_prestamo, estatus_prestamo = :estatus_prestamo  WHERE id_finanzas_prestamo = :id_finanzas_prestamo");

			$stmt-> bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);
			$stmt-> bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);
			$stmt-> bindParam(":tipo_empleado", $datos["tipo_empleado"], PDO::PARAM_STR);
			$stmt-> bindParam(":tipo_prestamo", $datos["tipo_prestamo"], PDO::PARAM_STR);
			$stmt-> bindParam(":monto_tp", $datos["monto_tp"], PDO::PARAM_STR);
			$stmt-> bindParam(":f_aplicacion", $datos["f_aplicacion"], PDO::PARAM_STR);
			$stmt-> bindParam(":id_tipo_prestamo", $datos["id_tipo_prestamo"], PDO::PARAM_STR);
			$stmt-> bindParam(":id_finanzas_prestamo", $datos["id_finanzas_prestamo"], PDO::PARAM_INT);
			$stmt-> bindParam(":capturista_aplica_prestamo", $datos["capturista_aplica_prestamo"], PDO::PARAM_STR);
			$stmt-> bindParam(":estatus_prestamo", $datos["estatus_prestamo"], PDO::PARAM_STR);
		
		


	if($stmt->execute()){

		return "ok";

	}else{

		return "error";
	
	}

	$stmt->close();
	$stmt = null;

}


/*============================================================
	ENTREGAR PRESTAMOS
=============================================================*/

static public function mdlEditarEntregarPrestamo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_trabajador = :id_trabajador, nombre_completo = :nombre_completo,tipo_empleado = :tipo_empleado, tipo_prestamo = :tipo_prestamo, monto_tp = :monto_tp, f_entrega = :f_entrega, /* id_tipo_prestamo = :id_tipo_prestamo, */ id_finanzas_prestamo = :id_finanzas_prestamo,  capturista_entrega_prestamo = :capturista_entrega_prestamo, estatus_prestamo = :estatus_prestamo  WHERE id_finanzas_prestamo = :id_finanzas_prestamo");

			$stmt-> bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);
			$stmt-> bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);
			$stmt-> bindParam(":tipo_empleado", $datos["tipo_empleado"], PDO::PARAM_STR);
			$stmt-> bindParam(":tipo_prestamo", $datos["tipo_prestamo"], PDO::PARAM_STR);
			$stmt-> bindParam(":monto_tp", $datos["monto_tp"], PDO::PARAM_STR);
			$stmt-> bindParam(":f_entrega", $datos["f_entrega"], PDO::PARAM_STR);
			/* $stmt-> bindParam(":id_tipo_prestamo", $datos["id_tipo_prestamo"], PDO::PARAM_STR); */
			$stmt-> bindParam(":id_finanzas_prestamo", $datos["id_finanzas_prestamo"], PDO::PARAM_INT);
			$stmt-> bindParam(":capturista_entrega_prestamo", $datos["capturista_entrega_prestamo"], PDO::PARAM_STR);
			$stmt-> bindParam(":estatus_prestamo", $datos["estatus_prestamo"], PDO::PARAM_STR);
		
		


	if($stmt->execute()){

		return "ok";

	}else{

		return "error";
	
	}

	$stmt->close();
	$stmt = null;

}



/*============================================================
	CANCELAR PRESTAMOS
=============================================================*/

static public function mdlEditarCancelarPrestamo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET  id_trabajador = :id_trabajador, nombre_completo = :nombre_completo,tipo_empleado = :tipo_empleado, tipo_prestamo = :tipo_prestamo, monto_tp = :monto_tp, f_cancelacion = :f_cancelacion, /* id_tipo_prestamo = :id_tipo_prestamo, */ id_finanzas_prestamo = :id_finanzas_prestamo,  capturista_cancela_prestamo = :capturista_cancela_prestamo, cancelar_motivo = :cancelar_motivo, estatus_prestamo = :estatus_prestamo  WHERE id_finanzas_prestamo = :id_finanzas_prestamo");

			$stmt-> bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);
			$stmt-> bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);
			$stmt-> bindParam(":tipo_empleado", $datos["tipo_empleado"], PDO::PARAM_STR);
			$stmt-> bindParam(":tipo_prestamo", $datos["tipo_prestamo"], PDO::PARAM_STR);
			$stmt-> bindParam(":monto_tp", $datos["monto_tp"], PDO::PARAM_STR);
			$stmt-> bindParam(":f_cancelacion", $datos["f_cancelacion"], PDO::PARAM_STR);
			/* $stmt-> bindParam(":id_tipo_prestamo", $datos["id_tipo_prestamo"], PDO::PARAM_STR); */
			$stmt-> bindParam(":id_finanzas_prestamo", $datos["id_finanzas_prestamo"], PDO::PARAM_INT);
			$stmt-> bindParam(":capturista_cancela_prestamo", $datos["capturista_cancela_prestamo"], PDO::PARAM_STR);
			$stmt-> bindParam(":cancelar_motivo", $datos["cancelar_motivo"], PDO::PARAM_STR);
			$stmt-> bindParam(":estatus_prestamo", $datos["estatus_prestamo"], PDO::PARAM_STR);
		
		


	if($stmt->execute()){

		return "ok";

	}else{

		return "error";
	
	}

	$stmt->close();
	$stmt = null;

}






}//FIN DE LA CLASE


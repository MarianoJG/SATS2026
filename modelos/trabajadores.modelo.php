<?php

require_once "conexion.php";

class ModeloTrabajadores{

	/*=============================================
	MOSTRAR TRABAJADORES
	=============================================*/

	static public function mdlMostrarTrabajadores($tabla, $item, $valor){

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
	MOSTRAR TIPO TRABAJADORES = SINDICALIZADOS
	=============================================*/

	static public function mdlMostrarTrabajadoresTipoSindicalizados($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE tipo_empleado='Sindicalizado'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	MOSTRAR TIPO TRABAJADORES = CONFIANZA Y EVENTUALES
	=============================================*/

	static public function mdlMostrarTrabajadoresTipoConfianzaEventual($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE tipo_empleado='Confianza' or tipo_empleado='Eventual'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}






	/*=============================================
	MOSTRAR TOTAL DE TRABAJADORES SINDICALIZADOS
	=============================================*/

	static public function mdlMostrarTrabajadoresSindicalizados($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT tipo_empleado FROM $tabla WHERE tipo_empleado='Sindicalizado'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}


	
	/*=============================================
	MOSTRAR TOTAL DE TRABAJADORES CONFIANZA
	=============================================*/

	static public function mdlMostrarTrabajadoresConfianza($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT tipo_empleado FROM $tabla WHERE tipo_empleado='Confianza'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}




	/*=============================================
	MOSTRAR TOTAL DE TRABAJADORES EVENTUALES
	=============================================*/

	static public function mdlMostrarTrabajadoresEventuales($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT tipo_empleado FROM $tabla WHERE tipo_empleado='Eventual'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	MOSTRAR TOTAL DE TRABAJADORES JUBILADOS
	=============================================*/

	static public function mdlMostrarTrabajadoresJubilados($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT tipo_empleado FROM $tabla WHERE tipo_empleado='Jubilado'");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}

	



	/*=============================================
	REGISTRO TRABAJADOR
	=============================================*/

	static public function mdlIngresarTrabajador($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nom_capturista, num_empleado, nombres, a_paterno, a_materno, sexo, edo_civil, f_nacimiento, fotot, f_ingreso, tipo_empleado, categoria, departamento, escolaridad, municipioestado, colonia, calle_numero, telefono, email) VALUES (:nom_capturista, :num_empleado, :nombres, :a_paterno, :a_materno, :sexo, :edo_civil, :f_nacimiento,  :fotot, :f_ingreso,  :tipo_empleado, :categoria, :departamento, :escolaridad, :municipioestado, :colonia, :calle_numero, :telefono, :email )");

		$stmt->bindParam(":nom_capturista", $datos["nom_capturista"], PDO::PARAM_STR);
		$stmt->bindParam(":num_empleado", $datos["num_empleado"], PDO::PARAM_STR);
		$stmt->bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":a_paterno", $datos["a_paterno"], PDO::PARAM_STR);
		$stmt->bindParam(":a_materno", $datos["a_materno"], PDO::PARAM_STR);
		$stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
		$stmt->bindParam(":edo_civil", $datos["edo_civil"], PDO::PARAM_STR);
		$stmt->bindParam(":f_nacimiento", $datos["f_nacimiento"], PDO::PARAM_STR);
		
		$stmt->bindParam(":fotot", $datos["fotot"], PDO::PARAM_STR);
		$stmt->bindParam(":f_ingreso", $datos["f_ingreso"], PDO::PARAM_STR);
		
		$stmt->bindParam(":tipo_empleado", $datos["tipo_empleado"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":departamento", $datos["departamento"], PDO::PARAM_STR);
		$stmt->bindParam(":escolaridad", $datos["escolaridad"], PDO::PARAM_STR);
		$stmt->bindParam(":municipioestado", $datos["municipioestado"], PDO::PARAM_STR);
		$stmt->bindParam(":colonia", $datos["colonia"], PDO::PARAM_STR);
		$stmt->bindParam(":calle_numero", $datos["calle_numero"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);




		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}

	

	/*=============================================
	EDITAR TRABAJADOR
	=============================================*/

	static public function mdlEditarTrabajador($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nom_capturista = :nom_capturista, num_empleado = :num_empleado, nombres = :nombres, a_paterno = :a_paterno, a_materno = :a_materno, sexo = :sexo, edo_civil = :edo_civil, f_nacimiento = :f_nacimiento,  fotot = :fotot, f_ingreso = :f_ingreso,  tipo_empleado = :tipo_empleado, categoria = :categoria, departamento = :departamento, escolaridad = :escolaridad, municipioestado = :municipioestado, colonia = :colonia, calle_numero = :calle_numero, telefono = :telefono, email = :email WHERE num_empleado = :num_empleado");
			
			$stmt -> bindParam(":nom_capturista", $datos["nom_capturista"], PDO::PARAM_STR);
			$stmt -> bindParam(":num_empleado", $datos["num_empleado"], PDO::PARAM_STR);
			$stmt -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
			$stmt -> bindParam(":a_paterno", $datos["a_paterno"], PDO::PARAM_STR);
			$stmt -> bindParam(":a_materno", $datos["a_materno"], PDO::PARAM_STR);
			$stmt -> bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
			$stmt -> bindParam(":edo_civil", $datos["edo_civil"], PDO::PARAM_STR);
			$stmt -> bindParam(":f_nacimiento", $datos["f_nacimiento"], PDO::PARAM_STR);
			$stmt -> bindParam(":fotot", $datos["fotot"], PDO::PARAM_STR);
			$stmt -> bindParam(":f_ingreso", $datos["f_ingreso"], PDO::PARAM_STR);
			$stmt -> bindParam(":municipioestado", $datos["municipioestado"], PDO::PARAM_STR);
			$stmt -> bindParam(":tipo_empleado", $datos["tipo_empleado"], PDO::PARAM_STR);
			$stmt -> bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
			$stmt -> bindParam(":departamento", $datos["departamento"], PDO::PARAM_STR);
			$stmt -> bindParam(":escolaridad", $datos["escolaridad"], PDO::PARAM_STR);
			$stmt -> bindParam(":colonia", $datos["colonia"], PDO::PARAM_STR);
			$stmt -> bindParam(":calle_numero", $datos["calle_numero"], PDO::PARAM_STR);
			$stmt -> bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
			$stmt -> bindParam(":email", $datos["email"], PDO::PARAM_STR);
			



		if($stmt -> execute()){
			
			return "ok";
			
		}else{
			
			return "error";	
			
		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	ACTUALIZAR TRABAJADOR
	=============================================*/

	static public function mdlActualizarTrabajador($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


	/*=============================================
	BORRAR TRABAJADOR
	=============================================*/

	static public function mdlBorrarTrabajador($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


}


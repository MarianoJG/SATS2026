<?php

require_once "conexion.php";

class ModeloHijos{

	/*=============================================
	MOSTRAR HIJOS
	=============================================*/

	static public function mdlMostrarHijos($tabla, $item, $valor){

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
	REGISTRO HIJO
	=============================================*/

	static public function mdlCrearHijo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_trabajador, nombre_completo, f_nacimiento, nom_capturistaH) VALUES (:id_trabajador,:nombre_completo, :f_nacimiento, :nom_capturistaH )");

		$stmt->bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);

		$stmt->bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);
		
		$stmt->bindParam(":f_nacimiento", $datos["f_nacimiento"], PDO::PARAM_STR);

		$stmt->bindParam(":nom_capturistaH", $datos["nom_capturistaH"], PDO::PARAM_STR);
		
	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	EDITAR HIJO
	=============================================*/

	static public function mdlEditarHijo($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_completo = :nombre_completo, id_trabajador = :id_trabajador, f_nacimiento = :f_nacimiento, nom_capturistaH = :nom_capturistaH  WHERE id_hijo = :id_hijo");


		$stmt -> bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);
		$stmt->bindParam(":id_trabajador", $datos["id_trabajador"], PDO::PARAM_STR);
		$stmt -> bindParam(":f_nacimiento", $datos["f_nacimiento"], PDO::PARAM_STR);
		$stmt -> bindParam(":id_hijo", $datos["id_hijo"], PDO::PARAM_INT);
		$stmt->bindParam(":nom_capturistaH", $datos["nom_capturistaH"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}


	/*=============================================
	REGISTRO HIJO
	=============================================

	static public function mdlCrearHijo($tabla, $datos){

		 $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_completo, f_nacimiento) "
                . "VALUES (:nombre_completo, :f_nacimiento)");

		$stmt->bindParam(":nombre_completo", $datos["nombre_completo"], PDO::PARAM_STR);
		
		$stmt->bindParam(":f_nacimiento", $datos["f_nacimiento"], PDO::PARAM_STR);
		
	

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}*/

	

	/*=============================================
	EDITAR TRABAJADOR
	=============================================

	static public function mdlEditarTrabajador($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET num_empleado = :num_empleado, nombres = :nombres, a_paterno = :a_paterno, a_materno = :a_materno, sexo = :sexo, edo_civil = :edo_civil, f_nacimiento = :f_nacimiento,  fotot = :fotot, f_ingreso = :f_ingreso,  tipo_empleado = :tipo_empleado, categoria = :categoria, departamento = :departamento, escolaridad = :escolaridad, colonia = :colonia, calle_numero = :calle_numero, telefono = :telefono, email = :email WHERE num_empleado = :num_empleado");
			
			$stmt -> bindParam(":num_empleado", $datos["num_empleado"], PDO::PARAM_STR);
			$stmt -> bindParam(":nombres", $datos["nombres"], PDO::PARAM_STR);
			$stmt -> bindParam(":a_paterno", $datos["a_paterno"], PDO::PARAM_STR);
			$stmt -> bindParam(":a_materno", $datos["a_materno"], PDO::PARAM_STR);
			$stmt -> bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
			$stmt -> bindParam(":edo_civil", $datos["edo_civil"], PDO::PARAM_STR);
			$stmt -> bindParam(":f_nacimiento", $datos["f_nacimiento"], PDO::PARAM_STR);
			
			$stmt -> bindParam(":fotot", $datos["fotot"], PDO::PARAM_STR);
			$stmt -> bindParam(":f_ingreso", $datos["f_ingreso"], PDO::PARAM_STR);
			
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

	}*/


	/*=============================================
	ACTUALIZAR TRABAJADOR
	=============================================*/

	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

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


<?php

class ControladorTrabajadores{

/*=============================================
REGISTRAR TRABAJADORES 
=============================================*/

static public function ctrCrearTrabajador(){

	if(isset($_POST["nuevoNumEmpleado"])){

		if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNumEmpleado"]) &&
			preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombreTrabajador"])&&
			preg_match('/^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellidoPaterno"])&&
			//preg_match('/^[.a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApellidoMaterno"])&&
			preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoSexo"])&&
			preg_match('/^[(?P<nombre>\w+)a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoEdoCivil"])){


			/*=============================================
			VALIDAR IMAGEN
			=============================================*/

			$ruta = "";

			if(isset($_FILES["nuevaFotoT"]["tmp_name"])){

				list($ancho, $alto) = getimagesize($_FILES["nuevaFotoT"]["tmp_name"]);

				$nuevoAncho = 200;
				$nuevoAlto = 250;

				/*=============================================
				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
				=============================================*/

				$directorio = "vistas/img/trabajadores/".$_POST["nuevoNumEmpleado"];

				mkdir($directorio, 0755);

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/

				if($_FILES["nuevaFotoT"]["type"] == "image/jpeg"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$aleatorio = mt_rand(100,999);

					$ruta = "vistas/img/trabajadores/".$_POST["nuevoNumEmpleado"]."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["nuevaFotoT"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);

				}

				if($_FILES["nuevaFotoT"]["type"] == "image/png"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$aleatorio = mt_rand(100,999);

					$ruta = "vistas/img/trabajadores/".$_POST["nuevaFotoT"]."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["nuevaFotoT"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);

				}

			}

			

			$tabla = "trabajadores";

			$datos = array(

							"num_empleado"    => ucwords($_POST["nuevoNumEmpleado"]),
							"nombres"         => ucwords($_POST["nuevoNombreTrabajador"]),
							"a_paterno"       => ucwords($_POST["nuevoApellidoPaterno"]),
							"a_materno"       => ucwords($_POST["nuevoApellidoMaterno"]),
							"sexo"            => $_POST["nuevoSexo"],
							"edo_civil"       => $_POST["nuevoEdoCivil"],
							"f_nacimiento"    => $_POST["nuevoFechaNac"],
							//"edad_actual"   => $_POST["nuevoEdadActual"],
							"fotot"           =>$ruta,
							"f_ingreso"       => $_POST["nuevoFechaIngreso"],
							//"antiguedad"    => $_POST["nuevoAntiguedad"],
							"tipo_empleado"   => $_POST["nuevoTipoEmpleado"],
							"categoria"       => $_POST["nuevoCategoria"],
							"departamento"    => $_POST["nuevoDepartamento"],
							"escolaridad"     => $_POST["nuevoEscolaridad"],
							"municipioestado" => ucwords($_POST["nuevoMunicipioEstado"]),
							"colonia"         => $_POST["nuevoColonia"],
							"calle_numero"    => ucwords($_POST["nuevoDireccion"]),
							"telefono"        => $_POST["nuevoTelefono"],
							"email"           => $_POST["nuevoEmail"],
							"nom_capturista"  => $_POST["capturista"]

						);
															

			$respuesta = ModeloTrabajadores::mdlIngresarTrabajador($tabla, $datos);

			if($respuesta == "ok"){

				echo
				'<script type="text/javascript">
						$(document).ready(function() {
							swal({ 
							position: "top-end",
							title: "Excelente..",
							text: "Trabajador Registrado Con Exito!",
							type: "success",
							showConfirmButton: false,
							timer: 1500

						}).then(function() {
						// Redirect the user
						//window.location.href = "registro-trabajadores";
						})
						},200);
					</script>';
			}


		}else{

			echo'<script>

				swal({
						type: "error",
						title: "¡Oops!",
						text: "¡el trabajador no puede ir vacía o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
						if (result.value) {

						window.location = "registro-trabajadores";

						}
					})

			</script>';

		}

	

	}
			

}

/*=============================================
MOSTRAR TRABAJADORES
=============================================*/

static public function ctrMostrarTrabajadores($item, $valor){

	$tabla = "trabajadores";



	$respuesta = ModeloTrabajadores::mdlMostrarTrabajadores($tabla, $item, $valor);

	return $respuesta;

}



/*=============================================
LISTAR TIPO DE  TRABAJADORES= SINDICALIZADOS
=============================================*/

static public function ctrMostrarTrabajadoresTipoSindicalizados($item,  $valor){

	$tabla = "trabajadores";


	$respuesta = ModeloTrabajadores::mdlMostrarTrabajadoresTipoSindicalizados($tabla, $item, $valor);

	return $respuesta;

}


/*=============================================
LISTAR TIPO DE  TRABAJADORES= CONFIANZA Y EVENTUALES
=============================================*/

static public function ctrMostrarTrabajadoresTipoConfianzaEventual($item,  $valor){

	$tabla = "trabajadores";


	$respuesta = ModeloTrabajadores::mdlMostrarTrabajadoresTipoConfianzaEventual($tabla, $item, $valor);

	return $respuesta;

}



/*=============================================
MOSTRAR TOTAL DE TRABAJADORES SINDICALIZADOS
=============================================*/

static public function ctrMostrarTrabajadoresSindicalizados($item,  $valor){

	$tabla = "trabajadores";


	$respuesta = ModeloTrabajadores::mdlMostrarTrabajadoresSindicalizados($tabla, $item, $valor);

	return $respuesta;

}

/*=============================================
MOSTRAR TOTAL DE TRABAJADORES CONFIANZA
=============================================*/

static public function ctrMostrarTrabajadoresConfianza($item,  $valor){

	$tabla = "trabajadores";
	

	$respuesta = ModeloTrabajadores::mdlMostrarTrabajadoresConfianza($tabla, $item, $valor);

	return $respuesta;

}


/*=============================================
MOSTRAR TOTAL DE TRABAJADORES EVENTUALES
=============================================*/

static public function ctrMostrarTrabajadoresEventuales($item,  $valor){

	$tabla = "trabajadores";
	

	$respuesta = ModeloTrabajadores::mdlMostrarTrabajadoresEventuales($tabla, $item, $valor);

	return $respuesta;

}


/*=============================================
MOSTRAR TOTAL DE TRABAJADORES JUBILADOS
=============================================*/

static public function ctrMostrarTrabajadoresJubilados($item,  $valor){

	$tabla = "trabajadores";
	

	$respuesta = ModeloTrabajadores::mdlMostrarTrabajadoresJubilados($tabla, $item, $valor);

	return $respuesta;

}





/*=============================================
EDITAR TRABAJADORES
=============================================*/

static public function ctrEditarTrabajador(){

	if(isset($_POST["editarNumEmpleado"])){

		if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombreTrabajador"])){

			/*=============================================
			VALIDAR IMAGEN
			=============================================*/

			$ruta = $_POST["fotoActual"];

			if(isset($_FILES["editarFotoT"]["tmp_name"]) && !empty($_FILES["editarFotoT"]["tmp_name"])){

				list($ancho, $alto) = getimagesize($_FILES["editarFotoT"]["tmp_name"]);

				$nuevoAncho = 200;
				$nuevoAlto = 250;

				/*=============================================
				CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
				=============================================*/

				$directorio = "vistas/img/trabajadores/".$_POST["editarNumEmpleado"];

				/*=============================================
				PRIMERO PREGUNTAMOS SI EXISTE OTRA IMAGEN EN LA BD
				=============================================*/

				if(!empty($_POST["fotoActual"])){

					unlink($_POST["fotoActual"]);

				}else{

					mkdir($directorio, 0755);

				}	

				/*=============================================
				DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
				=============================================*/

				if($_FILES["editarFotoT"]["type"] == "image/jpeg"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$aleatorio = mt_rand(100,999);

					$ruta = "vistas/img/trabajadores/".$_POST["editarNumEmpleado"]."/".$aleatorio.".jpg";

					$origen = imagecreatefromjpeg($_FILES["editarFotoT"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagejpeg($destino, $ruta);

				}

				if($_FILES["editarFotoT"]["type"] == "image/png"){

					/*=============================================
					GUARDAMOS LA IMAGEN EN EL DIRECTORIO
					=============================================*/

					$aleatorio = mt_rand(100,999);

					$ruta = "vistas/img/trabajadores/".$_POST["editarNumEmpleado"]."/".$aleatorio.".png";

					$origen = imagecreatefrompng($_FILES["editarFotoT"]["tmp_name"]);						

					$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

					imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

					imagepng($destino, $ruta);

				}

			}

			$tabla = "trabajadores";

			

			$datos = array(
							
							"num_empleado"       => ucwords($_POST["editarNumEmpleado"]),
							"nombres"            => ucwords($_POST["editarNombreTrabajador"]),
							"a_paterno"          => ucwords($_POST["editarApellidoPaterno"]),
							"a_materno"          => ucwords($_POST["editarApellidoMaterno"]),
							"sexo"               => $_POST["editarSexo"],
							"edo_civil"          => $_POST["editarEdoCivil"],
							"f_nacimiento"       => $_POST["editarFechaNac"],
										//"edad_actual"      => $_POST["editarEdadActual"],
							"fotot"              =>$ruta,
							"f_ingreso"          => $_POST["editarFechaIngreso"],
										//"antiguedad"       => $_POST["editarAntiguedad"],
							"tipo_empleado"      => $_POST["editarTipoEmpleado"],
							"categoria"          => $_POST["editarCategoria"],
							"departamento"       => $_POST["editarDepartamento"],
							"escolaridad"        => $_POST["editarEscolaridad"],
							"municipioestado" 	 => ucwords($_POST["editarMunicipioEstado"]),
							"colonia"            => $_POST["editarColonia"],
							"calle_numero"       => ucwords($_POST["editarDireccion"]),
							"telefono"           => $_POST["editarTelefono"],
							"email"              => $_POST["editarEmail"],
							"nom_capturista"     => $_POST["editarCapturista"],

						);

			$respuesta = ModeloTrabajadores::mdlEditarTrabajador($tabla, $datos);

			if($respuesta == "ok"){

				echo

					'<script type="text/javascript">
						$(document).ready(function() {
							swal({ 
							position: "top-end",
							title: "Excelente..",
							text: "Trabajador Actualizado Con Exito!",
							type: "success",
							showConfirmButton: false,
							timer: 1500

						}).then(function() {
						// Redirect the user
						//window.location.href = "registro-trabajadores";
						})
						},200);
					</script>';
						

			}


		}else{

			echo'<script>

				swal({
						type: "error",
						title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
						if (result.value) {

						window.location = "registro-trabajadores";

						}
					})

			</script>';

		}

	}

}








/*=============================================
BORRAR CATEGORIA
=============================================*/

static public function ctrBorrarCategoria(){

	if(isset($_GET["idCategoria"])){

		$tabla ="Categorias";
		$datos = $_GET["idCategoria"];

		$respuesta = ModeloCategorias::mdlBorrarCategoria($tabla, $datos);

		if($respuesta == "ok"){

			echo'<script>

				swal({
						type: "success",
						title: "La categoría ha sido borrada correctamente",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
						}).then(function(result){
								if (result.value) {

								window.location = "categorias";

								}
							})

				</script>';
		}
	}
	
}

}





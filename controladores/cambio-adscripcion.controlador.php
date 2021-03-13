<?php

class Controlador_CambioAdscripcion{

	/*=============================================
	CREAR Cambio de Adscripcion
	=============================================*/

	 static public function ctr_CrearCambioAdscripcion(){

		if(isset($_POST["nuevoCambioAdscripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCambioAdscripcion"]) &&
					
					preg_match('/^[a-zA-Z0-9]+$/', $_POST["trabajadorId"])

		){
			
		   
				$tabla = "escalafon_cambio_adscripcion";
		
				$datos = array(

								"id_trabajador"      => $_POST["trabajadorId"],
								"nombre_completo"    => ucwords($_POST["nomTrabajador"]),
								"tipo_empleado"      => ucwords($_POST["tipoEmpleado"]),	
								"adscripcion_actual" => $_POST["Adscripcion_actual"],
								"adscripcion_nuevo"  => $_POST["nuevoCambioAdscripcion"],
								"f_registro_cadsc"   => $_POST["nuevoFechaCambioAdscripcion"],
								"capturista_cadsc"   => $_POST["Capturista-CambioAdscripcion"], 
								"id_departamento"    => $_POST["departamentoId"]
								
							);

				$respuesta = ModeloCambioAdscripcion::mdl_CrearCambioAdscripcion($tabla, $datos);
		
			
				//Actualiza el campo DEPARTAMENTO en la tabla de trabajadores (registro-trabajdores.php)
				$tabla2 = "trabajadores";
		
				$datos = array(
								"id_trabajador" => $_POST["trabajadorId"],	
								"departamento"     => $_POST["nuevoCambioAdscripcion"]
								// "monto_cc"         => $_POST["MontoCC"],
								// "f_registro_cc"    => $_POST["nuevoFechaCC"],
								// "capturista_esc"   => $_POST["Capturista-Escalafon"]
								
							);

				$respuesta2 = ModeloCambioAdscripcion::mdlActualizarCampoDepartamento($tabla2, $datos);
			
				if($respuesta && $respuesta2 == "ok"){

					echo
					'<script type="text/javascript">
							$(document).ready(function() {
								swal({ 
								position: "top-end",
								title: "Excelente..",
								text: "Cambio de Adscripcion Registrado Con Exito!",
								type: "success",
								showConfirmButton: false,
								timer: 1500

							}).then(function() {
							// Redirect the user
							window.location.href = "escalafon-cambio-adscripcion";
							})
							},200);
						</script>';

				}


			}else{

				echo'<script type="text/javascript">
							$(document).ready(function() {
								swal({ 
								position: "center",
								title: "Error!..",
								text: "Numero de Empleado Vacio!",
								type: "error",
								showConfirmButton: true,
								timer: 1500

							}).then(function() {
							// Redirect the user
							window.location.href = "escalafon-cambio-adscripcion";
							})
							},1000);
						</script>';

			}


		}


	}



	/*=============================================
	EDITAR Cambio de Categoría
	=============================================*/	

 static public function ctr_EditarCambioAdscripcion(){


		if(isset($_POST["editarCambioAdscripcion"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCambioAdscripcion"])){

					
		   
				$tabla = "escalafon_cambio_adscripcion";
		
				$datos = array(

								"id_trabajador"     => $_POST["EditartrabajadorId"],
								"nombre_completo"   => ucwords($_POST["EditarnomTrabajador"]),
								"tipo_empleado"     => ucwords($_POST["EditartipoEmpleado"]),	
								"adscripcion_nuevo" => $_POST["editarCambioAdscripcion"],
								//"adscripcion_nuevo" => $_POST["editarCambioAdscripcion"],
								"f_registro_cadsc"  => $_POST["EditarnuevoFechaCambioAdscripcion"],
								"capturista_cadsc"  => $_POST["Capturista-EditarCambioAdscripcion"], 
								"id_departamento"   => $_POST["EditardepartamentoId"],
								"id_c_adscripcion"  =>$_POST["idCambioAdscripcion"]
								
								
							);
			
				$respuesta = ModeloCambioAdscripcion::mdl_EditarCambioAdscripcion($tabla, $datos);


				$tabla2 = "trabajadores";
		
				$datos = array(

								"id_trabajador" => $_POST["EditartrabajadorId"],
								
								"departamento"  =>$_POST["editarCambioAdscripcion"]
								
								
							);
			
				$respuesta2 =  ModeloCambioAdscripcion::mdlActualizarCampoDepartamento($tabla2, $datos);
			
				if($respuesta && $respuesta2 == "ok"){

					echo
					'<script type="text/javascript">
							$(document).ready(function() {
								swal({ 
								position: "top-end",
								title: "Excelente..",
								text: "Cambio de Adscripcion Actualizado Con Exito!",
								type: "success",
								showConfirmButton: false,
								timer: 1500

							}).then(function() {
							// Redirect the user
							window.location.href = "escalafon-cambio-adscripcion";
							})
							},200);
						</script>';

				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El campo categoria no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "escalafon-cambio-adscripcion";

						}

					});
				

				</script>';

			}


		}


	}
	


/*=============================================
  MOSTRAR Cambio de Categoría (CUALQUIER TIPO DE TRABAJADOR)
  =============================================*/

  static public function ctr_MostrarCambioAdscripcion($item, $valor){

    $tabla = "escalafon_cambio_adscripcion";

    $respuesta = ModeloCambioAdscripcion::mdl_MostrarCambioAdscripcion($tabla, $item, $valor);

    return $respuesta;
  
  }
}

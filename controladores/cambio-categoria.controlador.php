<?php

class Controlador_CambioCategoria{

	/*=============================================
	CREAR Cambio de Categoría
	=============================================*/

	 static public function ctr_CrearCambioCategoria(){

		if(isset($_POST["nuevoCambioCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCambioCategoria"]) &&
					
					preg_match('/^[a-zA-Z0-9]+$/', $_POST["trabajadorId"])

		){
			
		   
				$tabla = "escalafon_cambio_categoria";
		
				$datos = array(

								"id_trabajador"    => $_POST["trabajadorId"],
								"nombre_completo"  => ucwords($_POST["nomTrabajador"]),
								"tipo_empleado"    => ucwords($_POST["tipoEmpleado"]),	
								"cambio_categoria" => ucwords($_POST["nuevoCambioCategoria"]),
								// "id_categoria"     => $_POST["categoriaId"],
								"monto_cc"         => $_POST["MontoCambioCategoria"],
								"f_registro_cc"    => $_POST["nuevoFechaCambioCategoria"],
								"capturista_cc"    => $_POST["Capturista-CambioCategoria"], 
								"id_categoria"    => $_POST["categoriaId"]
								
							);

				$respuesta = ModeloCambioCategoria::mdl_CrearCambioCategoria($tabla, $datos);
		
			
				//Actualiza el campo CATEGORIA en la tabla de trabajadores (registro-trabajdores.php)
				$tabla2 = "trabajadores";
		
				$datos = array(
								"id_trabajador" => $_POST["trabajadorId"],	
								"categoria"     => ucwords($_POST["nuevoCambioCategoria"])
								// "monto_cc"         => $_POST["MontoCC"],
								// "f_registro_cc"    => $_POST["nuevoFechaCC"],
								// "capturista_esc"   => $_POST["Capturista-Escalafon"]
								
							);

				$respuesta2 = ModeloCambioCategoria::mdlActualizarCampoCategoria($tabla2, $datos);
			
				if($respuesta && $respuesta2 == "ok"){

					echo
					'<script type="text/javascript">
							$(document).ready(function() {
								swal({ 
								position: "top-end",
								title: "Excelente..",
								text: "Cambio de Categoría Registrado Con Exito!",
								type: "success",
								showConfirmButton: false,
								timer: 1500

							}).then(function() {
							// Redirect the user
							window.location.href = "escalafon-cambio-categoria";
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
							window.location.href = "escalafon-cambio-categoria";
							})
							},1000);
						</script>';

			}


		}


	}



	/*=============================================
	EDITAR Cambio de Categoría
	=============================================*/	

 static public function ctr_EditarCambioCategoria(){


		if(isset($_POST["EditarCambioCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarCambioCategoria"])){

					
		   
				$tabla = "escalafon_cambio_categoria";
		
				$datos = array(

								"id_trabajador"         => $_POST["EditartrabajadorId"],
								"nombre_completo"       => ucwords($_POST["EditarnomTrabajador"]),
								"tipo_empleado"         => ucwords($_POST["EditartipoEmpleado"]),
								"cambio_categoria"      => ucwords($_POST["EditarCambioCategoria"]),
								"monto_cc"      => $_POST["EditarMontoCambioCategoria"],
								"f_registro_cc"         => $_POST["EditarFechaCambioCategoria"],
								"id_categoria"         =>$_POST["EditarcategoriaId"],
								"id_c_categoria"         =>$_POST["idCambioCategoria"],
								"capturista_cc" => $_POST["Capturista-EditarCambioCategoria"]
								
								
							);
			
				$respuesta = ModeloCambioCategoria::mdl_EditarCambioCategoria($tabla, $datos);
			
				if($respuesta == "ok"){

					echo
					'<script type="text/javascript">
							$(document).ready(function() {
								swal({ 
								position: "top-end",
								title: "Excelente..",
								text: "Cambio de Categoría Actualizado Con Exito!",
								type: "success",
								showConfirmButton: false,
								timer: 1500

							}).then(function() {
							// Redirect the user
							window.location.href = "escalafon-cambio-categoria";
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
						
							window.location = "escalafon-cambio-categoria";

						}

					});
				

				</script>';

			}


		}


	}
	


/*=============================================
  MOSTRAR Cambio de Categoría (CUALQUIER TIPO DE TRABAJADOR)
  =============================================*/

  static public function ctr_MostrarCambioCategoria($item, $valor){

    $tabla = "escalafon_cambio_categoria";

    $respuesta = ModeloCambioCategoria::mdl_MostrarCambioCategoria($tabla, $item, $valor);

    return $respuesta;
  
  }
}

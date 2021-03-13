<?php

class Controlador_Comision{

	/*=============================================
	CREAR Comision
	=============================================*/

	 static public function ctr_CrearComision(){

		if(isset($_POST["Tipo_Movimiento_Comision"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["Tipo_Movimiento_Comision"]) &&
					
					preg_match('/^[a-zA-Z0-9]+$/', $_POST["trabajadorId"])

		){
			
		   
				$tabla = "escalafon_comision";
		
				$datos = array(

								"id_trabajador"        => $_POST["trabajadorId"],
								"nombre_completo"      => ucwords($_POST["nomTrabajador"]),
								"tipo_empleado"        => ucwords($_POST["tipoEmpleado"]),
								
								"adscripcion_actual"   => $_POST["Adscripcion_actual"],
								
								"tipo_movimiento"      => $_POST["Tipo_Movimiento_Comision"],
								"f_registro_comision"  => $_POST["nuevoFechaComision"],
								"capturista_comision"  => $_POST["Capturista-Comision"], 
								"adscripcion_comision" => $_POST["nuevaComision"],
								
								"id_comision"          => $_POST["departamentoId"]
								
							);

				$respuesta = ModeloComision::mdl_CrearComision($tabla, $datos);
		
			
			
				if($respuesta == "ok"){

					echo
					'<script type="text/javascript">
							$(document).ready(function() {
								swal({ 
								position: "top-end",
								title: "Excelente..",
								text: "Comision Registrada Con Exito!",
								type: "success",
								showConfirmButton: false,
								timer: 1500

							}).then(function() {
							// Redirect the user
							window.location.href = "escalafon-comision";
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
							window.location.href = "escalafon-comision";
							})
							},1000);
						</script>';

			}


		}


	}



	/*=============================================
	EDITAR COMISION
	=============================================*/	

 static public function ctr_EditarComision(){


		if(isset($_POST["editar_Tipo_Movimiento_Comision"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editar_Tipo_Movimiento_Comision"])){

					
		   
				$tabla = "escalafon_comision";
		
				$datos = array(
								
								"id_trabajador"        => $_POST["EditartrabajadorId"],
								"nombre_completo"      => ucwords($_POST["EditarnomTrabajador"]),
								"tipo_empleado"        => ucwords($_POST["EditartipoEmpleado"]),
								"adscripcion_actual"   => $_POST["EditarAdscripcion_actual"],

								"tipo_movimiento"      => $_POST["editar_Tipo_Movimiento_Comision"],
								"f_registro_comision"  => $_POST["EditarFechaComision"],
								"capturista_comision"  => $_POST["Capturista-EditarComision"],
								"adscripcion_comision" =>$_POST["Editar-nuevaComision"],

								"id_departamento"          => $_POST["EditardepartamentoId"],
								"id_comision"          => $_POST["idComision"]


								
								
									
								
							);
			
				$respuesta = ModeloComision::mdl_EditarComision($tabla, $datos);


				
			
				if($respuesta == "ok"){

					echo
					'<script type="text/javascript">
							$(document).ready(function() {
								swal({ 
								position: "top-end",
								title: "Excelente..",
								text: "Registro de Comision, Actualizado Con Exito!",
								type: "success",
								showConfirmButton: false,
								timer: 1500

							}).then(function() {
							// Redirect the user
							window.location.href = "escalafon-comision";
							})
							},200);
						</script>';

				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El tipo de movimiento no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "escalafon-comision";

						}

					});
				

				</script>';

			}


		}


	}
	


/*=============================================
  MOSTRAR Cambio de Categoría (CUALQUIER TIPO DE TRABAJADOR)
  =============================================*/

  static public function ctr_MostrarComision($item, $valor){

    $tabla = "escalafon_comision";

    $respuesta = ModeloComision::mdl_MostrarComision($tabla, $item, $valor);

    return $respuesta;
  
  }
}

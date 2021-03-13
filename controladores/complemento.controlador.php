<?php

class Controlador_Complemento{

	/*=============================================
	CREAR APOYO DE TRANSPORTE
	=============================================*/

	 static public function ctr_CrearComplemento(){

		if(isset($_POST["nuevoComplemento"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoComplemento"]) &&
					preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["buscaTrabajador"])&&
					preg_match('/^[a-zA-Z0-9]+$/', $_POST["trabajadorId"])

		){
			
		   
				$tabla = "escalafon_complemento";
		
				$datos = array(
								
								"id_trabajador"          => $_POST["trabajadorId"],
								"nombre_completo"        => ucwords($_POST["nomTrabajador"]),
								"tipo_empleado"          => ucwords($_POST["tipoEmpleado"]),	
								"complemento"            => ucwords($_POST["nuevoComplemento"]),
								"monto_complemento"      => $_POST["MontoComplemento"],
								"f_registro_complemento" => $_POST["nuevoFechaComplemento"],
								"capturista_complemento" => $_POST["Capturista-Complemento"]
								
							);

				$respuesta = ModeloComplemento::mdl_CrearComplemento($tabla, $datos);
		
			
				if($respuesta == "ok"){

					echo
					'<script type="text/javascript">
							$(document).ready(function() {
								swal({ 
								position: "top-end",
								title: "Excelente..",
								text: "Complemento Registrado Con Exito!",
								type: "success",
								showConfirmButton: false,
								timer: 1500

							}).then(function() {
							// Redirect the user
							window.location.href = "escalafon-complemento";
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
							window.location.href = "escalafon-complemento";
							})
							},1000);
						</script>';

			}


		}


	}



	/*=============================================
	EDITAR APOYO DE TRANSPORTE
	=============================================*/	

 static public function ctr_EditarComplemento(){


		if(isset($_POST["EditarComplemento"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarComplemento"])){

					
		   
				$tabla = "escalafon_complemento";
		
				$datos = array(
					
								"id_trabajador"          => $_POST["EditartrabajadorId"],
								"nombre_completo"        => ucwords($_POST["EditarnomTrabajador"]),
								"tipo_empleado"          => ucwords($_POST["EditartipoEmpleado"]),	
								"complemento"            => ucwords($_POST["EditarComplemento"]),
								"monto_complemento"      => $_POST["EditarMontoComplemento"],
								"f_registro_complemento" => $_POST["EditarFechaComplemento"],
								"id_complemento"         =>$_POST["idComplemento"],
								"capturista_complemento" => $_POST["Capturista-EditarComplemento"]
								
							);
			
				$respuesta = ModeloComplemento::mdl_EditarComplemento($tabla, $datos);
			
				if($respuesta == "ok"){

					echo
					'<script type="text/javascript">
							$(document).ready(function() {
								swal({ 
								position: "top-end",
								title: "Excelente..",
								text: "Complemento Actualizado Con Exito!",
								type: "success",
								showConfirmButton: false,
								timer: 1500

							}).then(function() {
							// Redirect the user
							window.location.href = "escalafon-complemento";
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
						
							window.location = "escalafon-complemento";

						}

					});
				

				</script>';

			}


		}


	}
	



/*=============================================
  MOSTRAR APOYO DE TRANSPORTE (CUALQUIER TIPO DE TRABAJADOR)
  =============================================*/

  static public function ctr_MostrarComplemento($item, $valor){

    $tabla = "escalafon_complemento";

    $respuesta = ModeloComplemento::mdl_MostrarComplemento($tabla, $item, $valor);

    return $respuesta;
  
  }
}

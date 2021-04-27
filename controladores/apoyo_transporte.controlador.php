<?php

class Controlador_ApoyoTransporte{

	/*=============================================
	CREAR APOYO DE TRANSPORTE
	=============================================*/

	static public function ctr_CrearApoyoTransporte(){

		if(isset($_POST["nuevoApoyoTransporte"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoApoyoTransporte"]) &&
					preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["buscaTrabajador"])&&
					preg_match('/^[a-zA-Z0-9]+$/', $_POST["trabajadorId"])

		){
			
		
				$tabla = "escalafon_apoyo_transporte";
		
				$datos = array(

								"id_trabajador"         => $_POST["trabajadorId"],
								"nombre_completo"       => ucwords($_POST["nomTrabajador"]),
								"tipo_empleado"        => ucwords($_POST["tipoEmpleado"]),	
								"apoyo_transporte"      => ucwords($_POST["nuevoApoyoTransporte"]),
								"monto_transporte"      => $_POST["MontoApoyoTransporte"],
								"f_registro_AT"         => $_POST["nuevoFechaAPoyoTransporte"],
								"capturista_transporte" => $_POST["Capturista-Apoyotransporte"]
								
							);

				$respuesta = ModeloApoyoTransporte::mdl_CrearApoyoTransporte($tabla, $datos);
		
			
				if($respuesta == "ok"){

					echo
					'<script type="text/javascript">
							$(document).ready(function() {
								swal({ 
								position: "top-end",
								title: "Excelente..",
								text: "Apoyo de Transporte Registrado Con Exito!",
								type: "success",
								showConfirmButton: false,
								timer: 1500

							}).then(function() {
							// Redirect the user
							//window.location.href = "escalafon-apoyo-transporte";
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
							window.location.href = "escalafon-apoyo-transporte";
							})
							},1000);
						</script>';

			}


		}


	}



	/*=============================================
	EDITAR APOYO DE TRANSPORTE
	=============================================*/	

 static public function ctr_EditarApoyoTransporte(){


		if(isset($_POST["EditarApoyoTransporte"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarApoyoTransporte"])){

					
		   
				$tabla = "escalafon_apoyo_transporte";
		
				$datos = array(
					
								"id_trabajador"         => $_POST["EditartrabajadorId"],
								"nombre_completo"       => ucwords($_POST["EditarnomTrabajador"]),
								"tipo_empleado"         => ucwords($_POST["EditartipoEmpleado"]),	
								"apoyo_transporte"      => ucwords($_POST["EditarApoyoTransporte"]),
								"monto_transporte"      => $_POST["EditarMontoApoyoTransporte"],
								"f_registro_AT"         => $_POST["EditarFechaAPoyoTransporte"],
								"id_transporte"         =>$_POST["idApoyoTransporte"],
								"capturista_transporte" => $_POST["Capturista-EditarApoyotransporte"]
								
							);
			
				$respuesta = ModeloApoyoTransporte::mdl_EditarApoyoTransporte($tabla, $datos);
			
				if($respuesta == "ok"){

					echo
					'<script type="text/javascript">
							$(document).ready(function() {
								swal({ 
								position: "top-end",
								title: "Excelente..",
								text: "Apoyo de Transporte Actualizado Con Exito!",
								type: "success",
								showConfirmButton: false,
								timer: 1500

							}).then(function() {
							// Redirect the user
							//window.location.href = "escalafon-apoyo-transporte";
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
  MOSTRAR APOYO DE TRANSPORTE (CUALQUIER TIPO DE TRABAJADOR)
  =============================================*/

  static public function ctr_MostrarApoyoTransporte($item, $valor){

    $tabla = "escalafon_apoyo_transporte";

    $respuesta = ModeloApoyoTransporte::mdl_MostrarApoyoTransporte($tabla, $item, $valor);

    return $respuesta;
  
  }
}

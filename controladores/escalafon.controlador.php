<?php

class Controlador_Escalafon{

	/*=============================================
	CREAR CAMBIO DE CATEGORIA
	=============================================*/

	static public function ctr_CrearCambioCategoria(){

		if(isset($_POST["nuevoCCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCCategoria"])){
			
			
		
				$tabla = "escalafon_cambio_categoria";
		
				$datos = array(
								"id_trabajador"    => $_POST["trabajadorId"],	
								"cambio_categoria" => ucwords($_POST["nuevoCCategoria"]),
								"monto_cc"         => $_POST["MontoCC"],
								"f_registro_cc"    => $_POST["nuevoFechaCC"],
								"capturista_esc"   => $_POST["Capturista-Escalafon"]
								
							);

				$respuesta = ModeloEscalafon::mdl_CrearCambioCategoria($tabla, $datos);


				//Actualiza el campo CATEGORIA en la tabla de trabajadores (registro-trabajdores.php)
				$tabla2 = "trabajadores";
		
				$datos = array(
								"id_trabajador" => $_POST["trabajadorId"],	
								"categoria"     => ucwords($_POST["nuevoCCategoria"])
								// "monto_cc"         => $_POST["MontoCC"],
								// "f_registro_cc"    => $_POST["nuevoFechaCC"],
								// "capturista_esc"   => $_POST["Capturista-Escalafon"]
								
							);

				$respuesta2 = ModeloEscalafon::mdlActualizarCampoCategoria($tabla2, $datos);
			
				if($respuesta && $respuesta2 == "ok"){

					echo
					'<script type="text/javascript">
							$(document).ready(function() {
								swal({ 
								position: "top-end",
								title: "Excelente..",
								text: "Cambio Categoria Registrado Con Exito!",
								type: "success",
								showConfirmButton: false,
								timer: 1500

							}).then(function() {
							// Redirect the user
							//window.location.href = "escalafon-cambio-categoria";
							})
							},200);
						</script>';

				}


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El campo Categoria no puede ir vacío o llevar caracteres especiales!",
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
	EDITAR CAMBIO DE CATEGORIA
	=============================================*/	

	static public function ctrEditarCambioCategoria(){

		if(isset($_POST["EditarCCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarCCategoria"])){
			
			
		
				$tabla = "escalafon_cambio_categoria";
		
				$datos = array(
								"id_trabajador"    => $_POST["EditarTrabajadorId"],
								"cambio_categoria" => ucwords($_POST["EditarCCategoria"]),
								"monto_cc"         => $_POST["EditarMontoCC"],
								"f_registro_cc"    => $_POST["EditarFechaCC"],
								"id_escalafon"     =>$_POST["idEscalafonCC"],
								"capturista_esc"   => $_POST["Editar-Capturista-Escalafon"]
											
							);
			
				$respuesta = ModeloEscalafon::mdlEditarCambioCategoria($tabla, $datos);
			
				if($respuesta == "ok"){

					echo
					'<script type="text/javascript">
							$(document).ready(function() {
								swal({ 
								position: "top-end",
								title: "Excelente..",
								text: "Cambio Categoria Actualizada Con Exito!",
								type: "success",
								showConfirmButton: false,
								timer: 1500

							}).then(function() {
							// Redirect the user
							//window.location.href = "escalafon-cambio-categoria";
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
MOSTRAR ESCALAFON CAMBIO DE CATEGORIA
=============================================*/

static public function ctr_MostrarCambioCategoria($item, $valor){

    $tabla = "escalafon_cambio_categoria";

    $respuesta = ModeloEscalafon::mdl_MostrarCambioCategoria($tabla, $item, $valor);

    return $respuesta;

}
}

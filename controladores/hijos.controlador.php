<?php

class ControladorHijos{

	/*=============================================
	CREAR HIJOS
	=============================================*/

	 static public function ctrCrearHijo(){

		if(isset($_POST["nuevoNomHijo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNomHijo"])){
			
			
		   
				$tabla = "hijos";
		
				$datos = array(
								"id_trabajador" => $_POST["trabajadorId"],	
								"nombre_completo"   => ucwords($_POST["nuevoNomHijo"]),
								"f_nacimiento" => $_POST["nuevoFechaNacH"],
								"nom_capturistaH"  => $_POST["CapturistaH"]
								
							);

				$respuesta = ModeloHijos::mdlCrearHijo($tabla, $datos);
			
				if($respuesta == "ok"){

					echo
					'<script type="text/javascript">
							$(document).ready(function() {
								swal({ 
								position: "top-end",
								title: "Excelente..",
								text: "Hijo Registrado Con Exito!",
								type: "success",
								showConfirmButton: false,
								timer: 1500

							}).then(function() {
							// Redirect the user
							window.location.href = "registro-hijos";
							})
							},70);
						</script>';

				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El campo hijos no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "registro-hijos";

						}

					});
				

				</script>';

			}


		}


	}


	/*=============================================
	EDITAR HIJOS
	=============================================*/

	 static public function ctrEditarHijo(){

		if(isset($_POST["EditarnuevoNomHijo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarnuevoNomHijo"])){
			
			
		   
				$tabla = "hijos";
		
				$datos = array(
								"id_trabajador" => $_POST["EditartrabajadorId"],
								"nombre_completo"   => ucwords($_POST["EditarnuevoNomHijo"]),
								"f_nacimiento" => $_POST["EditarnuevoFechaNacH"],
								"id_hijo"=>$_POST["idHijo"],
								"nom_capturistaH"  => $_POST["editarCapturistaH"]
								
								
							);
			


				$respuesta = ModeloHijos::mdlEditarHijo($tabla, $datos);
			
				if($respuesta == "ok"){

					echo
					'<script type="text/javascript">
							$(document).ready(function() {
								swal({ 
								position: "top-end",
								title: "Excelente..",
								text: "Hijo Actualizado Con Exito!",
								type: "success",
								showConfirmButton: false,
								timer: 1500

							}).then(function() {
							// Redirect the user
							window.location.href = "registro-hijos";
							})
							},70);
						</script>';

				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El campo hijos no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "registro-hijos";

						}

					});
				

				</script>';

			}


		}


	}


	


/*=============================================
  MOSTRAR HIJOS
  =============================================*/

  static public function ctrMostrarHijos($item, $valor){

    $tabla = "hijos";

    $respuesta = ModeloHijos::mdlMostrarHijos($tabla, $item, $valor);

    return $respuesta;
  
  }
}
	
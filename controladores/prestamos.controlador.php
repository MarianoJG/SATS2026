<?php

class ControladorPrestamos{

/*=============================================
CREAR Cambio de Categoría
=============================================*/

	static public function ctrCrearPrestamo(){

	if(isset($_POST["nuevoPrestamo"])){

		if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoPrestamo"]) &&
				
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["trabajadorId"])

	){
		
			$tabla = "finanzas_prestamos";
	
			$datos = array(

							"id_trabajador"    => $_POST["trabajadorId"],
							"nombre_completo"  => ucwords($_POST["nomTrabajador"]),
							"tipo_empleado"    => ucwords($_POST["tipoEmpleado"]),	
							"tipo_prestamo" => ucwords($_POST["nuevoPrestamo"]),
							"monto_tp"         => $_POST["MontoPrestamo"],
							"f_registro_tp"    => $_POST["nuevoFechaPrestamo"],
							"capturista_tp"    => $_POST["Capturista-Prestamo"], 
							"id_tipo_prestamo"    => $_POST["prestamoId"],
							"estatus_prestamo"    => $_POST["nuevoEstatus"]
							
						);

			$respuesta = ModeloPrestamos::mdlCrearPrestamo($tabla, $datos);
			
			if($respuesta == "ok"){
				
				echo
				'<script type="text/javascript">
						$(document).ready(function() {
							swal({ 
							position: "center",
							title: "Excelente..",
							text: "Prestamo Autorizado Con Exito!",
							type: "success",
							showConfirmButton: false,
							timer: 1500

						}).then(function() {
						
						window.location.href = "finanzas-prestamos";
						})
						},3000);
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
						window.location.href = "finanzas-prestamos";
						})
						},1000);
					</script>';
		}
	}
}



/*=============================================
EDITAR PRESTAMO
=============================================*/	

static public function ctrEditarPrestamo(){


	if(isset($_POST["EditarPrestamo"])){

		if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarPrestamo"])){

			$tabla = "finanzas_prestamos";
	
			$datos = array(

							"id_trabajador"        => $_POST["EditartrabajadorId"],
							"nombre_completo"      => ucwords($_POST["EditarnomTrabajador"]),
							"tipo_empleado"        => ucwords($_POST["EditartipoEmpleado"]),
							"tipo_prestamo"        => ucwords($_POST["EditarPrestamo"]),
							"monto_tp"             => $_POST["EditarMontoPrestamo"],
							"f_registro_tp"        => $_POST["EditarFechaPrestamo"],
							"id_tipo_prestamo"     => $_POST["EditarprestamoId"],
							"id_finanzas_prestamo" => $_POST["EditaridPrestamo"],
							"capturista_tp"        => $_POST["Capturista-EditarPrestamo"],
							"estatus_prestamo"     => $_POST["EditarEstatus"]
							
						);
		
			$respuesta = ModeloPrestamos::mdlEditarPrestamo($tabla, $datos);
		
			if($respuesta == "ok"){

				echo
				'<script type="text/javascript">
						$(document).ready(function() {
							swal({ 
							position: "center",
							title: "Excelente..",
							text: "Prestamo Actualizado Con Exito!",
							type: "success",
							showConfirmButton: false,
							timer: 1500

						}).then(function() {
						// Redirect the user
						window.location.href = "finanzas-prestamos";
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
					
						window.location = "finanzas-prestamos";

					}

				});

			</script>';
		}
	}
}


/*=============================================
EDITAR APLICAR PRESTAMO
=============================================*/	

static public function ctrEditarAplicarPrestamo(){


	if(isset($_POST["EditarAplicarPrestamo"])){

		if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarAplicarPrestamo"])){

			$tabla = "finanzas_prestamos";
	
			$datos = array(

							"id_trabajador"              => $_POST["EditarAplicarTrabajadorId"],
							"nombre_completo"            => ucwords($_POST["EditarAplicarnomTrabajador"]),
							"tipo_empleado"              => ucwords($_POST["EditarAplicartipoEmpleado"]),
							"tipo_prestamo"              => ucwords($_POST["EditarAplicarPrestamo"]),
							"monto_tp"                   => $_POST["EditarAplicarMontoPrestamo"],
							"f_registro_tp"              => $_POST["EditarAplicarFechaPrestamo"],
							"id_tipo_prestamo"           => $_POST["EditarAplicarprestamoId"],
							"id_finanzas_prestamo"       => $_POST["EditarAplicaridPrestamo"],
							// "capturista_tp"              => $_POST["Capturista-AplicarPrestamo"],
							"capturista_aplica_prestamo" => $_POST["CapturistaEditarAplicaPrestamo"],
							"estatus_prestamo"           => $_POST["EditarAplicarEstatus"]
							
							
						);
		
			$respuesta = ModeloPrestamos::mdlEditarAplicarPrestamo($tabla, $datos);
		
			if($respuesta == "ok"){

				echo
				'<script type="text/javascript">
						$(document).ready(function() {
							swal({ 
							position: "center",
							title: "Excelente..",
							text: "Prestamo Aplicado Con Exito!",
							type: "success",
							showConfirmButton: false,
							timer: 1500

						}).then(function() {
						// Redirect the user
						window.location.href = "finanzas-prestamos";
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
					
						window.location = "finanzas-prestamos";
					}
				});

			</script>';
		}
	}
}



/*=============================================
EDITAR APLICAR PRESTAMO
=============================================*/	

static public function ctrEditarEntregarPrestamo(){


	if(isset($_POST["EditarEntregarPrestamo"])){

		if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarEntregarPrestamo"])){

			$tabla = "finanzas_prestamos";
	
			$datos = array(

							"id_trabajador"              => $_POST["EditarEntregarTrabajadorId"],
							"nombre_completo"            => ucwords($_POST["EditarEntregarnomTrabajador"]),
							"tipo_empleado"              => ucwords($_POST["EditarEntregartipoEmpleado"]),

							"tipo_prestamo"              => ucwords($_POST["EditarEntregarPrestamo"]),
							"monto_tp"                   => $_POST["EditarEntregarMontoPrestamo"],
							"f_entrega"              => $_POST["EditarEntregarFechaPrestamo"],
							/* "id_tipo_prestamo"           => $_POST["EditarEntregarprestamoId"], */
							"id_finanzas_prestamo"       => $_POST["EditarEntregaridPrestamo"],
							"capturista_entrega_prestamo" => $_POST["CapturistaEditarEntregarPrestamo"],
							"estatus_prestamo"           => $_POST["EditarEntregarEstatus"]
							
							
						);
		
			$respuesta = ModeloPrestamos::mdlEditarEntregarPrestamo($tabla, $datos);
		
			if($respuesta == "ok"){

				echo
				'<script type="text/javascript">
						$(document).ready(function() {
							swal({ 
							position: "center",
							title: "Excelente..",
							text: "Prestamo Entregado Con Exito!",
							type: "success",
							showConfirmButton: false,
							timer: 1500

						}).then(function() {
						// Redirect the user
						window.location.href = "finanzas-prestamos";
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
					
						window.location = "finanzas-prestamos";
					}
				});

			</script>';
		}
	}
}



/*=============================================
EDITAR APLICAR PRESTAMO
=============================================*/	

static public function ctrCancelarPrestamo(){


	if(isset($_POST["nuevoCancelarMotivo"])){

		if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCancelarMotivo"])){

			$tabla = "finanzas_prestamos";
	
			$datos = array(

							"id_trabajador"              => $_POST["EditarCancelarTrabajadorId"],
							"nombre_completo"            => ucwords($_POST["EditarCancelarnomTrabajador"]),
							"tipo_empleado"              => ucwords($_POST["EditarCancelartipoEmpleado"]),

							"tipo_prestamo"              => ucwords($_POST["EditarCancelarPrestamo"]),
							"monto_tp"                   => $_POST["EditarCancelarMontoPrestamo"],
							"f_cancelacion"              => $_POST["EditarCancelarFechaPrestamo"],
							/* "id_tipo_prestamo"           => $_POST["EditarCancelarprestamoId"], */
							"id_finanzas_prestamo"       => $_POST["EditarCancelaridPrestamo"],
							"capturista_cancela_prestamo" => $_POST["CapturistaCancelarEntregarPrestamo"],
							"cancelar_motivo"              => ucwords($_POST["nuevoCancelarMotivo"]),
							"estatus_prestamo"           => $_POST["EditarCancelarEstatus"]
							
							
						);
		
			$respuesta = ModeloPrestamos::mdlEditarCancelarPrestamo($tabla, $datos);
		
			if($respuesta == "ok"){

				echo
				'<script type="text/javascript">
						$(document).ready(function() {
							swal({ 
							position: "center",
							title: "Excelente..",
							text: "Prestamo Entregado Con Exito!",
							type: "success",
							showConfirmButton: false,
							timer: 1500

						}).then(function() {
						// Redirect the user
						window.location.href = "finanzas-prestamos";
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
					
						window.location = "finanzas-prestamos";
					}
				});

			</script>';
		}
	}
}



/*=============================================
MOSTRAR LOS PRESTAMOS EN LA TABLA FINANZAS PRESTAMOS
=============================================*/

static public function ctrMostrarPrestamos($item, $valor){

$tabla = "finanzas_prestamos";

$respuesta = ModeloPrestamos::mdlMostrarPrestamos($tabla, $item, $valor);

return $respuesta;

}

/*=============================================
MOSTRAR LOS TIPOS DE PRESTAMOS EN LA TABLA TIPO PRESTAMOS
=============================================*/

static public function ctrMostrarTipoPrestamo($item, $valor){

$tabla = "tipo_prestamos";

$respuesta = ModeloPrestamos::mdlMostrarTipoPrestamo($tabla, $item, $valor);

return $respuesta;

}



}

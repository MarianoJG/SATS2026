<?php

class Controlador_NuevaBase{

/*=============================================
CREAR APOYO DE TRANSPORTE
=============================================*/

	static public function ctr_CrearNuevaBase(){

	if(isset($_POST["nuevoNuevaBase"])){

		if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNuevaBase"]) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["trabajadorId"])
	){
		
		
		
			$tabla = "nueva_base";
	
			$datos = array(
							"id_trabajador"        => $_POST["trabajadorId"],	
							"nombre_completo"      => ucwords($_POST["nomTrabajador"]),
							"nueva_base"           => ucwords($_POST["nuevoNuevaBase"]),
							"tipo_empleado"        => ucwords($_POST["nuevoTipoEmpleado_Sindicalizado"]),
							"f_registro_NuevaBase" => $_POST["nuevoFechaNuevaBase"],
							"capturista_nuevabase" => $_POST["Capturista-NuevaBase"]
							
						);

			$respuesta = ModeloNuevaBase::mdl_CrearNuevaBase($tabla, $datos);


			//Actualiza el campo TIPO EMPLEADO en la tabla de trabajadores (registro-trabajdores.php)
			$tabla2 = "trabajadores";
	
			$datos = array(
							"id_trabajador" => $_POST["trabajadorId"],	
							"tipo_empleado"     => ucwords($_POST["nuevoTipoEmpleado_Sindicalizado"])
							// "monto_cc"         => $_POST["MontoCC"],
							// "f_registro_cc"    => $_POST["nuevoFechaCC"],
							// "capturista_esc"   => $_POST["Capturista-Escalafon"]
							
						);

			$respuesta2 = ModeloEscalafon::mdlActualizarCampoTipoEmpleado($tabla2, $datos);
		
			if($respuesta && $respuesta2 == "ok"){

				echo
				'<script type="text/javascript">
						$(document).ready(function() {
							swal({ 
							position: "top-end",
							title: "Excelente..",
							text: "Nueva Base Registrada Con Exito!",
							type: "success",
							showConfirmButton: false,
							timer: 1500

						}).then(function() {
						// Redirect the user
						//window.location.href = "nuevas-bases";
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
						window.location.href = "nuevas-bases";
						})
						},1000);
					</script>';

		}


	}


}



/*=============================================
EDITAR NUEVAS BASES
=============================================*/	

static public function ctr_EditarNuevaBase(){

	if(isset($_POST["EditarNuevaBase"])){

		if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["EditarNuevaBase"])&&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST["EditartrabajadorId"])
	){
		
		
		
			$tabla = "nueva_base";
	
			$datos = array(
							"id_trabajador"        => $_POST["EditartrabajadorId"],
							"nombre_completo"      => ucwords($_POST["EditarnomTrabajador"]),	
							"nueva_base"           => ucwords($_POST["EditarNuevaBase"]),
							"f_registro_NuevaBase" => $_POST["EditarFechaNuevaBase"],
							"id_nuevabase"        =>$_POST["idNuevaBase"],
							"capturista_nuevabase" => $_POST["Capturista-EditarNuevaBase"]
							
						);
		
			$respuesta = ModeloNuevaBase::mdl_EditarNuevaBase($tabla, $datos);
		
			if($respuesta == "ok"){

				echo
				'<script type="text/javascript">
						$(document).ready(function() {
							swal({ 
							position: "top-end",
							title: "Excelente..",
							text: "Nueva Base Actualizada Con Exito!",
							type: "success",
							showConfirmButton: false,
							timer: 1500

						}).then(function() {
						// Redirect the user
						//window.location.href = "nuevas-bases";
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
						window.location.href = "nuevas-bases";
						})
						},1000);
					</script>';


		}


	}


}




/*=============================================
MOSTRAR APOYO DE TRANSPORTE (CUALQUIER TIPO DE TRABAJADOR)
=============================================*/

static public function ctr_MostrarNuevaBase($item, $valor){

$tabla = "nueva_base";

$respuesta = ModeloNuevaBase::mdl_MostrarNuevaBase($tabla, $item, $valor);

return $respuesta;

}
}

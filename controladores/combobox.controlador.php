<?php

class ControladorCombobox{


	/*=============================================
	MOSTRAR COMBO CATEGORIAS
	=============================================*/

	static public function ctrMostrarComboCategorias($item, $valor){

		$tabla = "categorias";

		$respuesta = ModeloCombobox::mdlMostrarComboCategorias($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR COMBO DEPARTAMENTOS
	=============================================*/

	static public function ctrMostrarComboDepartamentos($item, $valor){

		$tabla = "departamento";

		$respuesta = ModeloCombobox::mdlMostrarComboDepartamentos($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR COMBO ESCOLARIDAD
	=============================================*/

	static public function ctrMostrarComboEscolaridad($item, $valor){

		$tabla = "escolaridad";

		$respuesta = ModeloCombobox::mdlMostrarComboEscolaridad($tabla, $item, $valor);

		return $respuesta;
	
	}

	/*=============================================
	MOSTRAR COMBO COLONIAS
	=============================================*/

	static public function ctrMostrarComboColonias($item, $valor){

		$tabla = "colonias";

		$respuesta = ModeloCombobox::mdlMostrarComboColonias($tabla, $item, $valor);

		return $respuesta;
	
	}


	

	/*=============================================
	EDITAR CATEGORIA
	=============================================

	static public function ctrEditarCategoria(){

		if(isset($_POST["editarCategoria"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCategoria"])){

				$tabla = "categorias";

				$datos = array("categoria"=>$_POST["editarCategoria"],
							   "id"=>$_POST["idCategoria"]);

				$respuesta = ModeloCategorias::mdlEditarCategoria($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "La categoría ha sido cambiada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "categorias";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La categoría no puede ir vacía o llevar caracteres especiales!",
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

	}*/

	
}

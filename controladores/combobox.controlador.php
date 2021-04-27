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
	MOSTRAR COMBO TIPO PRESTAMOS
	=============================================*/

	/* static public function ctrMostrarComboTipoPrestamos($item, $valor){

		$tabla = "tipo_prestamos";

		$respuesta = ModeloCombobox::mdlMostrarComboTipoPrestamos($tabla, $item, $valor);

		return $respuesta;
	
	} */

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


	
	
}

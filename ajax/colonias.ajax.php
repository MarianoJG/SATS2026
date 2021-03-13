<?php

require_once "../controladores/colonias.controlador.php";
require_once "../modelos/colonias.modelo.php";

class AjaxColonias{

	/*=============================================
	EDITAR COLONIAS
	=============================================*/	

	public $idColonia;

	public function ajaxEditarColonia(){

		$item = "id_colonia";
		$valor = $this->idColonia;

		$respuesta = ControladorColonias::ctrMostrarColonias($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idColonia"])){

	$colonia = new AjaxColonias();
	$colonia -> idColonia = $_POST["idColonia"];
	$colonia -> ajaxEditarColonia();
}

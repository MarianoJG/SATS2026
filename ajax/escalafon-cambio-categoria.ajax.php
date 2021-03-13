<?php

require_once "../controladores/trabajadores.controlador.php";
require_once "../modelos/trabajadores.modelo.php";

require_once "../controladores/escalafon.controlador.php";
require_once "../modelos/escalafon.modelo.php";

class AjaxEscalafonCC{

	/*=============================================
	EDITAR HIJOS
	=============================================*/	

	public $idEscalafonCC;

	public function ajaxEditarCcategoria(){

		$item = "id_escalafon";
		$valor = $this->idEscalafonCC;

		$respuesta = Controlador_Escalafon::ctr_MostrarCambioCategoria($item, $valor);

		echo json_encode($respuesta);

	}


	/*=============================================
	VALIDAR NO REPETIR CATEGORIA
	=============================================*/	

	public $validarCategoria;

	public function ajaxValidarCategoria(){

		$item = "cambio_categoria";
		$valor = $this->validarCategoria;

		$respuesta = Controlador_Escalafon::ctr_MostrarCambioCategoria($item, $valor);

		echo json_encode($respuesta);

	}

	

	

	/*=============================================
	BUSCAR TRABAJADOR
	=============================================*/	

	public $buscarTrabajador;

	public function ajaxBuscarTrabajador(){

		$item = "num_empleado";
		$valor = $this->buscarTrabajador;

		$respuesta = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
				OBJETOS
=============================================*/

/*=============================================
EDITAR CAMBIO DE CATEGORIA EN ESCALAFON
=============================================*/
if(isset($_POST["idEscalafonCC"])){

	$EditarCambioCategoria = new AjaxEscalafonCC();
	$EditarCambioCategoria -> idEscalafonCC = $_POST["idEscalafonCC"];
	$EditarCambioCategoria -> ajaxEditarCcategoria();

}





/*=============================================
BUSCAR TRABAJADOR OBJETO
=============================================*/

if(isset( $_POST["buscarTrabajador"])){

	$buscarTrabajador = new AjaxEscalafonCC();
	$buscarTrabajador -> buscarTrabajador = $_POST["buscarTrabajador"];
	$buscarTrabajador -> ajaxBuscarTrabajador();

}

/*=============================================
VALIDAR NO REPETIR CATEGORIA
=============================================*/

if(isset( $_POST["validarCategoria"])){

	$valCategoria = new AjaxEscalafonCC();
	$valCategoria -> validarCategoria = $_POST["validarCategoria"];
	$valCategoria -> ajaxValidarCategoria();

}




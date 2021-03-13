<?php

require_once "../controladores/trabajadores.controlador.php";
require_once "../modelos/trabajadores.modelo.php";

require_once "../controladores/apoyo_transporte.controlador.php";
require_once "../modelos/apoyo_transporte.modelo.php";

class AjaxApoyoTransporte{

	/*=============================================
	EDITAR APOYO TRANSPORTE
	=============================================*/	

	public $idApoyoTransporte;

	public function ajaxEditarApoyoTransporte(){

		$item = "id_transporte";
		$valor = $this->idApoyoTransporte;

		$respuesta = Controlador_ApoyoTransporte::ctr_MostrarApoyoTransporte($item, $valor);

		echo json_encode($respuesta);

	}


	/*=============================================
	VALIDAR NO REPETIR TRABAJADOR
	=============================================*/	

	public $validarTrabajador;

	public function ajaxValidarTrabajador(){

		$item = "id_trabajador";
		$valor = $this->validarTrabajador;

		$respuesta = Controlador_ApoyoTransporte::ctr_MostrarApoyoTransporte($item, $valor);

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
EDITAR APOYO TRANSPORTE
=============================================*/
if(isset($_POST["idApoyoTransporte"])){

	$EditarApoyoTransporte = new AjaxApoyoTransporte();
	$EditarApoyoTransporte -> idApoyoTransporte = $_POST["idApoyoTransporte"];
	$EditarApoyoTransporte -> ajaxEditarApoyoTransporte();

}





/*=============================================
BUSCAR TRABAJADOR OBJETO
=============================================*/

if(isset( $_POST["buscarTrabajador"])){

	$buscarTrabajador = new AjaxApoyoTransporte();
	$buscarTrabajador -> buscarTrabajador = $_POST["buscarTrabajador"];
	$buscarTrabajador -> ajaxBuscarTrabajador();

}

/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset( $_POST["validarTrabajador"])){

	$valTrabajador = new AjaxApoyoTransporte();
	$valTrabajador -> validarTrabajador = $_POST["validarTrabajador"];
	$valTrabajador -> ajaxValidarTrabajador();

}



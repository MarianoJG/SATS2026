<?php

require_once "../controladores/trabajadores.controlador.php";
require_once "../modelos/trabajadores.modelo.php";

require_once "../controladores/nueva-base.controlador.php";
require_once "../modelos/nueva-base.modelo.php";

class AjaxNuevaBase{

	/*=============================================
	EDITAR APOYO TRANSPORTE
	=============================================*/	

	public $idNuevaBase;

	public function ajaxEditarNuevaBase(){

		$item = "id_nuevabase";
		$valor = $this->idNuevaBase;

		$respuesta = Controlador_NuevaBase::ctr_MostrarNuevaBase($item, $valor);

		echo json_encode($respuesta);

	}


	/*=============================================
	VALIDAR NO REPETIR TRABAJADOR
	=============================================*/	

	public $validarTrabajador;

	public function ajaxValidarTrabajador(){

		$item = "id_trabajador";
		$valor = $this->validarTrabajador;

		$respuesta = Controlador_NuevaBase::ctr_MostrarNuevaBase($item, $valor);

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
if(isset($_POST["idNuevaBase"])){

	$EditarNuevaBase = new AjaxNuevaBase();
	$EditarNuevaBase -> idNuevaBase = $_POST["idNuevaBase"];
	$EditarNuevaBase -> ajaxEditarNuevaBase();

}





/*=============================================
BUSCAR TRABAJADOR OBJETO
=============================================*/

if(isset( $_POST["buscarTrabajador"])){

	$buscarTrabajador = new AjaxNuevaBase();
	$buscarTrabajador -> buscarTrabajador = $_POST["buscarTrabajador"];
	$buscarTrabajador -> ajaxBuscarTrabajador();

}

/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset( $_POST["validarTrabajador"])){

	$valTrabajador = new AjaxNuevaBase();
	$valTrabajador -> validarTrabajador = $_POST["validarTrabajador"];
	$valTrabajador -> ajaxValidarTrabajador();

}



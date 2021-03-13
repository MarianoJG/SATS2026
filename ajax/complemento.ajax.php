<?php

require_once "../controladores/trabajadores.controlador.php";
require_once "../modelos/trabajadores.modelo.php";

require_once "../controladores/complemento.controlador.php";
require_once "../modelos/complemento.modelo.php";

class AjaxComplemento{

	/*=============================================
	EDITAR APOYO COMPLEMENTO
	=============================================*/	

	public $idComplemento;

	public function ajaxEditarComplemento(){

		$item = "id_complemento";
		$valor = $this->idComplemento;

		$respuesta = Controlador_Complemento::ctr_MostrarComplemento($item, $valor);

		echo json_encode($respuesta);

	}


	/*=============================================
	VALIDAR NO REPETIR TRABAJADOR
	=============================================*/	

	public $validarTrabajador;

	public function ajaxValidarTrabajador(){

		$item = "id_trabajador";
		$valor = $this->validarTrabajador;

		$respuesta = Controlador_Complemento::ctr_MostrarComplemento($item, $valor);

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
if(isset($_POST["idComplemento"])){

	$EditarComplemento = new AjaxComplemento();
	$EditarComplemento -> idComplemento = $_POST["idComplemento"];
	$EditarComplemento -> ajaxEditarComplemento();

}





/*=============================================
BUSCAR TRABAJADOR OBJETO
=============================================*/

if(isset( $_POST["buscarTrabajador"])){

	$buscarTrabajador = new AjaxComplemento();
	$buscarTrabajador -> buscarTrabajador = $_POST["buscarTrabajador"];
	$buscarTrabajador -> ajaxBuscarTrabajador();

}

/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset( $_POST["validarTrabajador"])){

	$valTrabajador = new AjaxComplemento();
	$valTrabajador -> validarTrabajador = $_POST["validarTrabajador"];
	$valTrabajador -> ajaxValidarTrabajador();

}



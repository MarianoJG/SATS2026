<?php

require_once "../controladores/trabajadores.controlador.php";
require_once "../modelos/trabajadores.modelo.php";

class AjaxTrabajadores{

	/*=============================================
	EDITAR TRABAJADOR
	=============================================*/	

	public $idTrabajador;

	public function ajaxEditarTrabajador(){

		$item = "id_trabajador";
		$valor = $this->idTrabajador;

		$respuesta = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor);

		echo json_encode($respuesta);

	}

	

	

	/*=============================================
	VALIDAR NO REPETIR TRABAJADOR
	=============================================*/	

	public $validarTrabajador;

	public function ajaxValidarTrabajador(){

		$item = "num_empleado";
		$valor = $this->validarTrabajador;

		$respuesta = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor);

		echo json_encode($respuesta);

	}

}

/*=============================================
				OBJETOS
=============================================*/

/*=============================================
EDITAR TRABAJADOR
=============================================*/
if(isset($_POST["idTrabajador"])){

	$editar = new AjaxTrabajadores();
	$editar -> idTrabajador = $_POST["idTrabajador"];
	$editar -> ajaxEditarTrabajador();

}





/*=============================================
VALIDAR NO REPETIR USUARIO
=============================================*/

if(isset( $_POST["validarTrabajador"])){

	$valTrabajador = new AjaxTrabajadores();
	$valTrabajador -> validarTrabajador = $_POST["validarTrabajador"];
	$valTrabajador -> ajaxValidarTrabajador();

}




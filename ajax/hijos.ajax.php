<?php

require_once "../controladores/trabajadores.controlador.php";
require_once "../modelos/trabajadores.modelo.php";
require_once "../controladores/hijos.controlador.php";
require_once "../modelos/hijos.modelo.php";

class AjaxHijos{

	/*=============================================
	EDITAR HIJOS
	=============================================*/	

	public $idHijo;

	public function ajaxEditarHijo(){

		$item = "id_hijo";
		$valor = $this->idHijo;

		$respuesta = ControladorHijos::ctrMostrarHijos($item, $valor);

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
EDITAR TRABAJADOR
=============================================*/
if(isset($_POST["idHijo"])){

	$hijo = new AjaxHijos();
	$hijo -> idHijo = $_POST["idHijo"];
	$hijo -> ajaxEditarHijo();

}





/*=============================================
BUSCAR TRABAJADOR OBJETO
=============================================*/

if(isset( $_POST["buscarTrabajador"])){

	$buscarTrabajador = new AjaxHijos();
	$buscarTrabajador -> buscarTrabajador = $_POST["buscarTrabajador"];
	$buscarTrabajador -> ajaxBuscarTrabajador();

}




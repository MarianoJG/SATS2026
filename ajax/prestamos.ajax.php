<?php

/* require_once "../controladores/trabajadores.controlador.php";
require_once "../modelos/trabajadores.modelo.php";

require_once "../controladores/combobox.controlador.php";
require_once "../modelos/combobox.modelo.php"; */

require_once "../controladores/prestamos.controlador.php";
require_once "../modelos/prestamos.modelo.php";

class AjaxPrestamos{

  /*=============================================
  EDITAR CAMBIO DE CATEGORIA
  =============================================*/ 

  public $idPrestamo;

  public function ajaxEditarPrestamo(){

    $item = "id_finanzas_prestamo";
    $valor = $this->idPrestamo;

    $respuesta = ControladorPrestamos::ctrMostrarPrestamos($item, $valor);

    echo json_encode($respuesta);

  }


  /*=============================================
  BUSCAR PRESTAMO
  =============================================*/ 

  public $buscarPrestamo;

  public function ajaxBuscarPrestamo(){

    $item = "prestamo";
    $valor = $this->buscarPrestamo;

    $respuesta = ControladorPrestamos::ctrMostrarTipoPrestamo($item, $valor);

    echo json_encode($respuesta);

  }


  

}

/*=============================================
        OBJETOS
=============================================*/

/*=============================================
EDITAR PRESTAMO
=============================================*/
if(isset($_POST["idPrestamo"])){

  $EditarPrestamo = new AjaxPrestamos();
  $EditarPrestamo -> idPrestamo = $_POST["idPrestamo"];
  $EditarPrestamo -> ajaxEditarPrestamo();

}


/*=============================================
BUSCAR PRESTAMO OBJETO
=============================================*/

if(isset( $_POST["buscarPrestamo"])){

  $buscarPrestamo = new AjaxPrestamos();
  $buscarPrestamo -> buscarPrestamo = $_POST["buscarPrestamo"];
  $buscarPrestamo -> ajaxBuscarPrestamo();

}





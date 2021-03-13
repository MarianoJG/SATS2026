<?php

require_once "../controladores/combobox.controlador.php";
require_once "../modelos/combobox.modelo.php";

require_once "../controladores/cambio-adscripcion.controlador.php";
require_once "../modelos/cambio-adscripcion.modelo.php";

class AjaxCambioAdscripcion{


  /*=============================================
  EDITAR CAMBIO DE CATEGORIA
  =============================================*/ 

  public $idCambioAdscripcion;

  public function ajaxEditarCambioCategoria(){

    $item = "id_c_adscripcion";
    $valor = $this->idCambioAdscripcion;

    $respuesta = Controlador_CambioAdscripcion::ctr_MostrarCambioAdscripcion($item, $valor);

    echo json_encode($respuesta);

  }



  /*=============================================
  BUSCAR CATEGORIA
  =============================================*/ 

  public $buscardepartamento;

  public function ajaxBuscarDepartamento(){

    $item = "departamento";
    $valor = $this->buscardepartamento;

    $respuesta = ControladorCombobox::ctrMostrarComboDepartamentos($item, $valor);

    echo json_encode($respuesta);

  }


  

}



/*=============================================
        OBJETOS
=============================================*/

/*=============================================
EDITAR CAMBIO DE CATEGORIA
=============================================*/
if(isset($_POST["idCambioAdscripcion"])){

  $EditarCambioCategoria = new AjaxCambioAdscripcion();
  $EditarCambioCategoria -> idCambioAdscripcion = $_POST["idCambioAdscripcion"];
  $EditarCambioCategoria -> ajaxEditarCambioCategoria();

}



/*=============================================
BUSCAR CATEGORIA OBJETO
=============================================*/

if(isset( $_POST["buscardepartamento"])){

  $buscardepartamento = new AjaxCambioAdscripcion();
  $buscardepartamento -> buscardepartamento = $_POST["buscardepartamento"];
  $buscardepartamento -> ajaxBuscarDepartamento();

}





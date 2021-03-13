<?php

require_once "../controladores/trabajadores.controlador.php";
require_once "../modelos/trabajadores.modelo.php";

require_once "../controladores/combobox.controlador.php";
require_once "../modelos/combobox.modelo.php";

require_once "../controladores/cambio-categoria.controlador.php";
require_once "../modelos/cambio-categoria.modelo.php";

class AjaxCambioCategoria{

  /*=============================================
  EDITAR CAMBIO DE CATEGORIA
  =============================================*/ 

  public $idCambioCategoria;

  public function ajaxEditarCambioCategoria(){

    $item = "id_c_categoria";
    $valor = $this->idCambioCategoria;

    $respuesta = Controlador_CambioCategoria::ctr_MostrarCambioCategoria($item, $valor);

    echo json_encode($respuesta);

  }



  /*=============================================
  VALIDAR NO REPETIR TRABAJADOR
  ============================================= */

  public $validarTrabajador;

  public function ajaxValidarTrabajador(){

    $item = "id_trabajador";
    $valor = $this->validarTrabajador;

    $respuesta = Controlador_CambioCategoria::ctr_MostrarCambioCategoria($item, $valor);

    echo json_encode($respuesta);

  }



  /*=============================================
  VALIDAR NO REPETIR CATEGORIA
  =============================================*/ 

  public $validarCategoria;

  public function ajaxValidarCategoria(){

    $item = "id_categoria";
    $valor = $this->validarCategoria;

    $respuesta = Controlador_CambioCategoria::ctr_MostrarCambioCategoria($item, $valor);

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


  /*=============================================
  BUSCAR CATEGORIA
  =============================================*/ 

  public $buscarCategoria;

  public function ajaxBuscarCategoria(){

    $item = "categoria";
    $valor = $this->buscarCategoria;

    $respuesta = ControladorCombobox::ctrMostrarComboCategorias($item, $valor);

    echo json_encode($respuesta);

  }


  

}

/*=============================================
        OBJETOS
=============================================*/

/*=============================================
EDITAR CAMBIO DE CATEGORIA
=============================================*/
if(isset($_POST["idCambioCategoria"])){

  $EditarCambioCategoria = new AjaxCambioCategoria();
  $EditarCambioCategoria -> idCambioCategoria = $_POST["idCambioCategoria"];
  $EditarCambioCategoria -> ajaxEditarCambioCategoria();

}



/*=============================================
BUSCAR TRABAJADOR OBJETO
=============================================*/

if(isset( $_POST["buscarTrabajador"])){

  $buscarTrabajador = new AjaxCambioCategoria();
  $buscarTrabajador -> buscarTrabajador = $_POST["buscarTrabajador"];
  $buscarTrabajador -> ajaxBuscarTrabajador();

}


/*=============================================
BUSCAR CATEGORIA OBJETO
=============================================*/

if(isset( $_POST["buscarCategoria"])){

  $buscarCategoria = new AjaxCambioCategoria();
  $buscarCategoria -> buscarCategoria = $_POST["buscarCategoria"];
  $buscarCategoria -> ajaxBuscarCategoria();

}

/*=============================================
VALIDAR NO REPETIR TRABAJADOR
=============================================*/

if(isset( $_POST["validarTrabajador"])){

  $valTrabajador = new AjaxCambioCategoria();
  $valTrabajador -> validarTrabajador = $_POST["validarTrabajador"];
  $valTrabajador -> ajaxValidarTrabajador();

}


/*=============================================
VALIDAR NO REPETIR CATEGORIA EN UN USUARIO
=============================================*/

if(isset( $_POST["validarCategoria"])){

  $valCategoria = new AjaxCambioCategoria();
  $valCategoria -> validarCategoria = $_POST["validarCategoria"];
  $valCategoria -> ajaxValidarCategoria();

}



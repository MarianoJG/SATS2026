<?php

require_once "../controladores/combobox.controlador.php";
require_once "../modelos/combobox.modelo.php";

require_once "../controladores/comision.controlador.php";
require_once "../modelos/comision.modelo.php";

class AjaxCambioComision{


  /*=============================================
  EDITAR COMISION
  =============================================*/ 

  public $idCambioComision;

  public function ajaxEditarCambioComision(){

    $item = "id_comision";
    $valor = $this->idCambioComision;

    $respuesta = Controlador_Comision::ctr_MostrarComision($item, $valor);

    echo json_encode($respuesta);

  }



  /*=============================================
  BUSCAR DEPARTAMENTO
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
EDITAR COMISION
=============================================*/
if(isset($_POST["idCambioComision"])){

  $EditarCambioComision = new AjaxCambioComision();
  $EditarCambioComision -> idCambioComision = $_POST["idCambioComision"];
  $EditarCambioComision -> ajaxEditarCambioComision();

}



/*=============================================
BUSCAR CATEGORIA OBJETO
=============================================*/

if(isset( $_POST["buscardepartamento"])){

  $buscardepartamento = new AjaxCambioComision();
  $buscardepartamento -> buscardepartamento = $_POST["buscardepartamento"];
  $buscardepartamento -> ajaxBuscarDepartamento();

}





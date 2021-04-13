<?php 

require_once "../controladores/hijos.controlador.php";
require_once "../controladores/trabajadores.controlador.php";

require_once "../modelos/hijos.modelo.php";
require_once "../modelos/trabajadores.modelo.php";



class TablaHijos {

/*MOSTRAR LA TABLA DE TRABAJADORES */

  public function mostrarTablaHijos()
  {

    
    $item = null;
    $valor = null;
    

    $hijos = ControladorHijos::ctrMostrarHijos($item, $valor);  

    if(count($hijos) == 0){

      echo '{"data": []}';

      return;
    }
    

    $datosJson = '{
    "data": [';

    for($i = 0; $i < count($hijos); $i++){

      
      /*=============================================
    TRAEMOS LA CATEGORÍA
      =============================================*/

      $item = "id_trabajador";
      $valor = $hijos[$i]["id_trabajador"];

      $trabajadores = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor); 

      if (is_array($trabajadores) && $trabajadores["id_trabajador"]) {

          /*=============================================
                TRAEMOS LAS ACCIONES
          ============================================= */


          $botonEditar ="<div class='btn-group'><span data-toggle='modal' data-target='#modalEditarHijo'><button class='btn btn-info btnEditarHijo' idHijo='".$hijos[$i]["id_hijo"]."' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil-square-o'></i></button></span></div>";

    
          $datosJson .='[
          "'.$hijos[$i]["id_hijo"].'",
          "'.$hijos[$i]["nombre_completo"].'",
          "'.$hijos[$i]["f_nacimiento"].'",
          "'.$trabajadores["nombres"].' '.$trabajadores["a_paterno"].' '.$trabajadores["a_materno"].'",
          "'.$trabajadores["num_empleado"].'",
          "'.$trabajadores["departamento"].'",
          "'.$botonEditar.'"
        ],';
      } /* fin array */
    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson .=   '] 

    }';
  
  echo $datosJson;

}

}




/**
ACTIVAR TABLA DE TRABAJADORES
*/

$activarHijos = new TablaHijos();
$activarHijos -> mostrarTablaHijos();



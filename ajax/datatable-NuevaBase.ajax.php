<?php 

require_once "../controladores/nueva-base.controlador.php";
require_once "../controladores/trabajadores.controlador.php";

require_once "../modelos/nueva-base.modelo.php";
require_once "../modelos/trabajadores.modelo.php";



class TablaNuevasBases {

  /**
 MOSTRAR LA TABLA DE MOVIMIENTOS DE ESCALAFON 
 */

   public function mostrarTablaNuevasBases()
    {
  
     $item = null;
      $valor = null;     

      $nuevabase = Controlador_NuevaBase::ctr_MostrarNuevaBase($item, $valor);  

      if(count($nuevabase) == 0){

        echo '{"data": []}';

        return;
      }
     

      $datosJson = '{
      "data": [';

      for($i = 0; $i < count($nuevabase); $i++){    

        $item = "id_trabajador";
        $valor = $nuevabase[$i]["id_trabajador"];

        $trabajadores = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor); 

        /*=============================================
      TRAEMOS LAS ACCIONES
        ============================================= */

          $botonEditar ="<div class='btn-group'><span data-toggle='modal' data-target='#modalEditarNuevaBase'><button class='btn btn-info btnEditar-NuevaBase' idnuevabase='".$nuevabase[$i]["id_nuevabase"]."' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil-square-o'></i></button></span></div>";

     
        $datosJson .='[
            "'.$nuevabase[$i]["id_nuevabase"].'",
            "'.$trabajadores["num_empleado"].'",
            "'.$trabajadores["nombres"].' '.$trabajadores["a_paterno"].' '.$trabajadores["a_materno"].'",
            "'.$trabajadores["departamento"].'",
            "'.$nuevabase[$i]["nueva_base"].'",
            "'.$nuevabase[$i]["tipo_empleado"].'",
            "'.$nuevabase[$i]["f_registro_NuevaBase"].'",
            "'.$botonEditar.'"
          ],';

      }

      $datosJson = substr($datosJson, 0, -1);

     $datosJson .=   '] 

     }';
    
    echo $datosJson;

  }

}



/**
 ACTIVAR TABLA DE ESCALAFON CAMBIO DE CATEGORIA
 */

$activarnuevabase = new TablaNuevasBases();
$activarnuevabase -> mostrarTablaNuevasBases();



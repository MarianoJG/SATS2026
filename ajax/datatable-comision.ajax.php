<?php 

require_once "../controladores/comision.controlador.php";
require_once "../controladores/trabajadores.controlador.php";

require_once "../modelos/comision.modelo.php";
require_once "../modelos/trabajadores.modelo.php";



class TablaComision {

  /**
 MOSTRAR LA TABLA DE MOVIMIENTOS DE ESCALAFON 
 */

   public function mostrarTablaComision()
    {
  
     $item = null;
      $valor = null;     

      $asignacomision = Controlador_Comision::ctr_MostrarComision($item, $valor);  

      if(count($asignacomision) == 0){

        echo '{"data": []}';

        return;
      }
     

      $datosJson = '{
      "data": [';

      for($i = 0; $i < count($asignacomision); $i++){    

        $item = "id_trabajador";
        $valor = $asignacomision[$i]["id_trabajador"];

        $trabajadores = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor); 

        /*=============================================
      TRAEMOS LAS ACCIONES
        ============================================= */


          $botonEditar ="<div class='btn-group'><span data-toggle='modal' data-target='#modalEditarComision'><button class='btn btn-info btnEditar-Comision' idCambioComision='".$asignacomision[$i]["id_comision"]."' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil-square-o'></i></button></span></div>";

     
        $datosJson .='[
            "'.$asignacomision[$i]["id_comision"].'",
            "'.$trabajadores["num_empleado"].'",
            "'.$trabajadores["nombres"].' '.$trabajadores["a_paterno"].' '.$trabajadores["a_materno"].'",
            "'.$asignacomision[$i]["adscripcion_actual"].'",
            "'.$asignacomision[$i]["tipo_movimiento"].'",
            "'.$asignacomision[$i]["adscripcion_comision"].'",
            "'.$asignacomision[$i]["f_registro_comision"].'",
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

$activarasignacomision = new TablaComision();
$activarasignacomision -> mostrarTablaComision();



<?php 

require_once "../controladores/cambio-adscripcion.controlador.php";
require_once "../controladores/trabajadores.controlador.php";

require_once "../modelos/cambio-adscripcion.modelo.php";
require_once "../modelos/trabajadores.modelo.php";



class TablaCambioAdscripcion {

  /**
 MOSTRAR LA TABLA DE MOVIMIENTOS DE ESCALAFON 
 */

   public function mostrarTablaCambioAdscripcion()
    {
  
     $item = null;
      $valor = null;     

      $cambioadscripcion = Controlador_CambioAdscripcion::ctr_MostrarCambioAdscripcion($item, $valor);  

      if(count($cambioadscripcion) == 0){

        echo '{"data": []}';

        return;
      }
     

      $datosJson = '{
      "data": [';

      for($i = 0; $i < count($cambioadscripcion); $i++){    

        $item = "id_trabajador";
        $valor = $cambioadscripcion[$i]["id_trabajador"];

        $trabajadores = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor); 

        /*=============================================
      TRAEMOS LAS ACCIONES
        ============================================= */


          $botonEditar ="<div class='btn-group'><span data-toggle='modal' data-target='#modalEditarCambioAdscripcion'><button class='btn btn-info btnEditar-CambioAdscripcion' idcambioadscripcion='".$cambioadscripcion[$i]["id_c_adscripcion"]."' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil-square-o'></i></button></span></div>";

     
        $datosJson .='[
            "'.$cambioadscripcion[$i]["id_c_adscripcion"].'",
            "'.$trabajadores["num_empleado"].'",
            "'.$trabajadores["nombres"].' '.$trabajadores["a_paterno"].' '.$trabajadores["a_materno"].'",
            "'.$cambioadscripcion[$i]["adscripcion_actual"].'",
            "'.$cambioadscripcion[$i]["adscripcion_nuevo"].'",
            "'.$cambioadscripcion[$i]["f_registro_cadsc"].'",
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

$activarcambioadscripcion = new TablaCambioAdscripcion();
$activarcambioadscripcion -> mostrarTablaCambioAdscripcion();



<?php 

require_once "../controladores/apoyo_transporte.controlador.php";
require_once "../controladores/trabajadores.controlador.php";

require_once "../modelos/apoyo_transporte.modelo.php";
require_once "../modelos/trabajadores.modelo.php";



class TablaApoyoTransporte {

  /**
 MOSTRAR LA TABLA DE MOVIMIENTOS DE ESCALAFON 
 */

   public function mostrarTablaApoyoTransporte()
    {
  
     $item = null;
      $valor = null;     

      $apoyotransporte = Controlador_ApoyoTransporte::ctr_MostrarApoyoTransporte($item, $valor);  

      if(count($apoyotransporte) == 0){

        echo '{"data": []}';

        return;
      }
     

      $datosJson = '{
      "data": [';

      for($i = 0; $i < count($apoyotransporte); $i++){    

        $item = "id_trabajador";
        $valor = $apoyotransporte[$i]["id_trabajador"];

        $trabajadores = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor); 

        /*=============================================
      TRAEMOS LAS ACCIONES
        ============================================= */

          $botonEditar ="<div class='btn-group'><span data-toggle='modal' data-target='#modalEditarApoyoTransporte'><button class='btn btn-info btnEditar-ApoyoTransporte' idApoyoTransporte='".$apoyotransporte[$i]["id_transporte"]."' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil-square-o'></i></button></span></div>";

     
        $datosJson .='[
            "'.$apoyotransporte[$i]["id_transporte"].'",
            "'.$trabajadores["num_empleado"].'",
            "'.$trabajadores["nombres"].' '.$trabajadores["a_paterno"].' '.$trabajadores["a_materno"].'",
            "'.$trabajadores["departamento"].'",
            "'.$apoyotransporte[$i]["apoyo_transporte"].'",
            "'."$".''.number_format($apoyotransporte[$i]["monto_transporte"],2).'",
            "'.$apoyotransporte[$i]["f_registro_AT"].'",
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

$activarapoyotransporte = new TablaApoyoTransporte();
$activarapoyotransporte -> mostrarTablaApoyoTransporte();



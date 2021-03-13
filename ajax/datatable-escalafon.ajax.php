<?php 

require_once "../controladores/escalafon.controlador.php";
require_once "../controladores/trabajadores.controlador.php";

require_once "../modelos/escalafon.modelo.php";
require_once "../modelos/trabajadores.modelo.php";



class TablaEscalafonCambioCategoria {

  /**
 MOSTRAR LA TABLA DE MOVIMIENTOS DE ESCALAFON 
 */

   public function mostrarTablaEscalafonCambioCategoria()
    {
  
     $item = null;
      $valor = null;     

      $escalafon_CC = Controlador_Escalafon::ctr_MostrarCambioCategoria($item, $valor);  

      if(count($escalafon_CC) == 0){

        echo '{"data": []}';

        return;
      }
     

      $datosJson = '{
      "data": [';

      for($i = 0; $i < count($escalafon_CC); $i++){    

        $item = "id_trabajador";
        $valor = $escalafon_CC[$i]["id_trabajador"];

        $trabajadores = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor); 

        /*=============================================
      TRAEMOS LAS ACCIONES
        ============================================= */

          $botonEditar ="<div class='btn-group'><span data-toggle='modal' data-target='#modalEditarCcategoria'><button class='btn btn-info btnEditar-Ccategoria' idEscalafonCC='".$escalafon_CC[$i]["id_escalafon"]."' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil-square-o'></i></button></span></div>";

     
        $datosJson .='[
            "'.$escalafon_CC[$i]["id_escalafon"].'",
            "'.$trabajadores["num_empleado"].'",
            "'.$trabajadores["nombres"].' '.$trabajadores["a_paterno"].' '.$trabajadores["a_materno"].'",
            "'.$trabajadores["departamento"].'",
            "'.$escalafon_CC[$i]["cambio_categoria"].'",
            "'."$".''.number_format($escalafon_CC[$i]["monto_cc"],2).'",
            "'.$escalafon_CC[$i]["f_registro_cc"].'",
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

$activarEscalafon_CC = new TablaEscalafonCambioCategoria();
$activarEscalafon_CC -> mostrarTablaEscalafonCambioCategoria();


 
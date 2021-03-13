<?php 

require_once "../controladores/complemento.controlador.php";
require_once "../controladores/trabajadores.controlador.php";

require_once "../modelos/complemento.modelo.php";
require_once "../modelos/trabajadores.modelo.php";



class TablaComplemento {

  /**
 MOSTRAR LA TABLA DE MOVIMIENTOS DE ESCALAFON 
 */

   public function mostrarTablaComplemento()
    {
  
     $item = null;
      $valor = null;     

      $complemento = Controlador_Complemento::ctr_MostrarComplemento($item, $valor);  

      if(count($complemento) == 0){

        echo '{"data": []}';

        return;
      }
     

      $datosJson = '{
      "data": [';

      for($i = 0; $i < count($complemento); $i++){    

        $item = "id_trabajador";
        $valor = $complemento[$i]["id_trabajador"];

        $trabajadores = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor); 

        /*=============================================
      TRAEMOS LAS ACCIONES
        ============================================= */

          $botonEditar ="<div class='btn-group'><span data-toggle='modal' data-target='#modalEditarComplemento'><button class='btn btn-info btnEditar-Complemento' idComplemento='".$complemento[$i]["id_complemento"]."' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil-square-o'></i></button></span></div>";

     
        $datosJson .='[
            "'.$complemento[$i]["id_complemento"].'",
            "'.$trabajadores["num_empleado"].'",
            "'.$trabajadores["nombres"].' '.$trabajadores["a_paterno"].' '.$trabajadores["a_materno"].'",
            "'.$trabajadores["departamento"].'",
            "'.$complemento[$i]["complemento"].'",
            "'."$".''.number_format($complemento[$i]["monto_complemento"],2).'",
            "'.$complemento[$i]["f_registro_complemento"].'",
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

$activarcomplemento = new Tablacomplemento();
$activarcomplemento -> mostrarTablaComplemento();



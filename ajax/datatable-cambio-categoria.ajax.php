<?php 

require_once "../controladores/cambio-categoria.controlador.php";
require_once "../controladores/trabajadores.controlador.php";

require_once "../modelos/cambio-categoria.modelo.php";
require_once "../modelos/trabajadores.modelo.php";



class TablaCambioCategoria {

  /**
 MOSTRAR LA TABLA DE MOVIMIENTOS DE ESCALAFON 
 */

   public function mostrarTablaCambioCategoria()
    {
  
     $item = null;
      $valor = null;     

      $cambiocategoria = Controlador_CambioCategoria::ctr_MostrarCambioCategoria($item, $valor);  

      if(count($cambiocategoria) == 0){

        echo '{"data": []}';

        return;
      }
     

      $datosJson = '{
      "data": [';

      for($i = 0; $i < count($cambiocategoria); $i++){    

        $item = "id_trabajador";
        $valor = $cambiocategoria[$i]["id_trabajador"];

        $trabajadores = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor); 

        /*=============================================
      TRAEMOS LAS ACCIONES
        ============================================= */


          $botonEditar ="<div class='btn-group'><span data-toggle='modal' data-target='#modalEditarCambioCategoria'><button class='btn btn-info btnEditar-CambioCategoria' idCambioCategoria='".$cambiocategoria[$i]["id_c_categoria"]."' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil-square-o'></i></button></span></div>";

     
        $datosJson .='[
            "'.$cambiocategoria[$i]["id_c_categoria"].'",
            "'.$trabajadores["num_empleado"].'",
            "'.$trabajadores["nombres"].' '.$trabajadores["a_paterno"].' '.$trabajadores["a_materno"].'",
            "'.$trabajadores["departamento"].'",
            "'.$cambiocategoria[$i]["cambio_categoria"].'",
            "'."$".''.number_format($cambiocategoria[$i]["monto_cc"],2).'",
            "'.$cambiocategoria[$i]["f_registro_cc"].'",
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

$activarcambiocategoria = new TablaCambioCategoria();
$activarcambiocategoria -> mostrarTablaCambioCategoria();



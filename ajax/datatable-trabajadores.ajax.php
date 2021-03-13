<?php 

// require_once "../controladores/hijos.controlador.php";
require_once "../controladores/trabajadores.controlador.php";

//require_once "../modelos/hijos.modelo.php";
require_once "../modelos/trabajadores.modelo.php";





class TablaTrabajadores {

  /**
 MOSTRAR LA TABLA DE TRABAJADORES 
 */

	 public function mostrarTablaTrabajadores()
	 	{

     $item = null;
     $valor = null;


     $trabajadores = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor);

      $datosJson = '{
      "data": [';

      for($i = 0; $i < count($trabajadores); $i++){

        /*=============================================
      TRAEMOS LA IMAGEN
        =============================================*/ 

        $imagen = "<img src='".$trabajadores[$i]["fotot"]."' class='img-thumbnail' width='40px'>";

        /*=============================================
      TRAEMOS LA CATEGORÍA
        =============================================

        $item = "id";
        $valor = $trabajadores[$i]["id_categoria"];

        $categorias = ControladorCategorias::ctrMostrarCategorias($item, $valor);*/ 

        /*=============================================
      STOCK
        =============================================

        if($trabajadores[$i]["stock"] <= 10){

          $stock = "<button class='btn btn-danger'>".$trabajadores[$i]["stock"]."</button>";

        }else if($trabajadores[$i]["stock"] > 11 && $trabajadores[$i]["stock"] <= 15){

          $stock = "<button class='btn btn-warning'>".$trabajadores[$i]["stock"]."</button>";

        }else{

          $stock = "<button class='btn btn-success'>".$trabajadores[$i]["stock"]."</button>";

        }*/ 

        /*=============================================
      TRAEMOS LAS ACCIONES
        ============================================= */

        if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Capturista" ) {

           $botonEditar ="<div class='btn-group'><span data-toggle='modal' data-target='#modalEditarTrabajador'><button class='btn btn-info btnEditarTrabajador' idTrabajador='".$trabajadores[$i]["id_trabajador"]."' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil-square-o'></i></button></span></div>";

           $botonImprimir ="<div class='btn-group'></div><div class='btn-group'></div>";//boton imprimir oculto

        }


        if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Admin Escalafon" ) {

           $botonEditar ="<div class='btn-group'><button class='btn btn-info  disabled'  aria-pressed='false'  data-toggle='tooltip' data-placement='top' title=' Editar'><i class='fa fa-pencil-square-o'></i></button></span></div>";//boton Desactivado

           $botonImprimir ="<div class='btn-group'></div><div class='btn-group'></div>";//boton imprimir oculto


        }


         if(isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Admin Actas y Acuerdos" ) {

           $botonEditar ="<div class='btn-group'><button class='btn btn-info  disabled'  aria-pressed='false'  data-toggle='tooltip' data-placement='top' title=' Editar'><i class='fa fa-pencil-square-o'></i></button></span></div>";//boton Desactivado

           $botonImprimir ="<div class='btn-group'></div><div class='btn-group'></div>";//boton imprimir oculto


        }




        else{

          $botonEditar ="<div class='btn-group'><span data-toggle='modal' data-target='#modalEditarTrabajador'><button class='btn btn-info btnEditarTrabajador' idTrabajador='".$trabajadores[$i]["id_trabajador"]."' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil-square-o'></i></button></span></div>";

           $botonImprimir ="<div class='btn-group'></div><div class='btn-group'><span ><button class='btn btn-outline-primary btnPrintTrabajador' idTrabajador='".$trabajadores[$i]["id_trabajador"]."' data-toggle='tooltip' data-placement='top' title='Imprimir'><i class='fa fa-print'></i></button></span></div>";

        }

      
     
        $datosJson .='[
            "'.$trabajadores[$i]["id_trabajador"].'",
            "'.$trabajadores[$i]["num_empleado"].'",
            "'.$trabajadores[$i]["nombres"].'",
            "'.$trabajadores[$i]["a_paterno"].'",
            "'.$trabajadores[$i]["a_materno"].'",
            "'.$imagen.'",
            "'.$trabajadores[$i]["tipo_empleado"].'",
            "'.$trabajadores[$i]["categoria"].'",
            "'.$trabajadores[$i]["departamento"].'",
            "'.$botonEditar.' '.$botonImprimir.'"
          ],';

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

$activarTrabajadores = new TablaTrabajadores();
$activarTrabajadores -> mostrarTablaTrabajadores();



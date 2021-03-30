<?php 


require_once "../controladores/prestamos.controlador.php";
require_once "../controladores/trabajadores.controlador.php";


require_once "../modelos/prestamos.modelo.php";
require_once "../modelos/trabajadores.modelo.php";



class TablaPrestamos {

/**
MOSTRAR LA TABLA DE MOVIMIENTOS DE PRESTAMOS 
*/

public function mostrarTablaPrestamos()
{

$item = null;
$valor = null;     

$mostrarTipoPrestamo = ControladorPrestamos::ctrMostrarPrestamos($item, $valor);  


if(count($mostrarTipoPrestamo) == 0){

echo '{"data": []}';

return;
}


$datosJson = '{
"data": [';

for ($i = 0; $i < count($mostrarTipoPrestamo); $i++) {
    $item = "id_trabajador";
    $valor = $mostrarTipoPrestamo[$i]["id_trabajador"];

    $trabajadores = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor);


    if (is_array($trabajadores) && $trabajadores["id_trabajador"]) {


/*=============================================
                    ESTATUS
        ============================================= */

        if ($mostrarTipoPrestamo[$i]["estatus_prestamo"] == 'Autorizado') {
            $estatusprestamo = "<span class='btn btn-warning btn-sm'><i class='fa fa-spinner fa-spin' aria-hidden='true'></i> &nbsp;" .$mostrarTipoPrestamo[$i]["estatus_prestamo"]."</span>";
        }
        else if  ($mostrarTipoPrestamo[$i]["estatus_prestamo"] == 'Aplicado') {
            $estatusprestamo = "<span class='btn btn-info btn-sm'><i class='fa fa-flag-checkered' aria-hidden='true'></i> &nbsp;" .$mostrarTipoPrestamo[$i]["estatus_prestamo"]."</span>";
        }
        
        else {
            $estatusprestamo ="<span class='btn btn-success btn-sm'><i class='fa fa-check' aria-hidden='true'></i>&nbsp;&nbsp;".$mostrarTipoPrestamo[$i]["estatus_prestamo"]."</span>";
        }


        /*=============================================
                        ESTATUS ASIGNADO POR
            ============================================= */
        if ($mostrarTipoPrestamo[$i]["capturista_tp"] != " " && $mostrarTipoPrestamo[$i]["estatus_prestamo"]== "Autorizado") {
            $capturistaPrestamo = "<span >  " .$mostrarTipoPrestamo[$i]["capturista_tp"]."</span>";
        }
        else if ($mostrarTipoPrestamo[$i]["capturista_aplica_prestamo"] != " " && $mostrarTipoPrestamo[$i]["estatus_prestamo"]== "Aplicado") {
            $capturistaPrestamo = "<span >  " .$mostrarTipoPrestamo[$i]["capturista_aplica_prestamo"]."</span>";
        }
        else {
            $capturistaPrestamo = "<span >  " .$mostrarTipoPrestamo[$i]["capturista_entrega_prestamo"]."</span>";
        }


        /*=============================================
                        CAPTURISTA
            ============================================= */

        /* if ($mostrarTipoPrestamo[$i]["estatus_prestamo"] == 'Autorizado') {
            $capturaprestamo = "<span class='right badge badge-info'> <i class='fa fa-flag' aria-hidden='true'></i> &nbsp;&nbsp; " .$mostrarTipoPrestamo[$i]["estatus_prestamo"]."</span>";
        } else {
            $capturaprestamo ="<span class='right badge badge-success'><i class='fa fa-check' aria-hidden='true'></i>&nbsp;&nbsp;".$mostrarTipoPrestamo[$i]["estatus_prestamo"]."</span>";
        } */



        /*=============================================
                    TIPO DE SOLICITUD
        ============================================= */

        if ($mostrarTipoPrestamo[$i]["tipo_prestamo"] == 'Vivienda') {
            $tipo_prestamo = "<span class='badge badge-pill badge-orange'>&nbsp;".$mostrarTipoPrestamo[$i]["tipo_prestamo"]."&nbsp;</span>";
        }
        elseif ($mostrarTipoPrestamo[$i]["tipo_prestamo"] == 'Caja Chica') {
            $tipo_prestamo = "<span class='badge badge-pill badge-purple'>&nbsp;".$mostrarTipoPrestamo[$i]["tipo_prestamo"]."&nbsp;</span>";
        }
        elseif ($mostrarTipoPrestamo[$i]["tipo_prestamo"] == 'Caja Grande') {
            $tipo_prestamo = "<span class='badge badge-pill badge-primary'> ".$mostrarTipoPrestamo[$i]["tipo_prestamo"]."</span>";
        }
        elseif ($mostrarTipoPrestamo[$i]["tipo_prestamo"] == 'Caja 150') {
            $tipo_prestamo = "<span class='badge badge-pill badge-secondary'> ".$mostrarTipoPrestamo[$i]["tipo_prestamo"]."</span>";
        }
        elseif ($mostrarTipoPrestamo[$i]["tipo_prestamo"] == 'Directo') {
            $tipo_prestamo = "<span class='badge badge-pill badge-success'>".$mostrarTipoPrestamo[$i]["tipo_prestamo"]."&nbsp; </span>";
        }
        // otros
        else {
            $tipo_prestamo = "<span class='badge badge-pill badge-secondary'>".$mostrarTipoPrestamo[$i]["tipo_prestamo"]."</span>";
        }


    

        /*=============================================
        TRAEMOS LAS ACCIONES
        ============================================= */


    if (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Administrador" ||  $_GET["perfilOculto"] == "Secretario General" ||  $_GET["perfilOculto"] == "Admin Finanzas" ||  $_GET["perfilOculto"] == "Personal Finanzas") {


        if ($mostrarTipoPrestamo[$i]["estatus_prestamo"] == 'Autorizado') {
            
            $botonEditar =$botonEditar ="<div class='btn-group'><span data-toggle='modal' data-target='#modalEditarPrestamo'><button class='btn btn-warning btnEditar-Prestamo' idPrestamo='".$mostrarTipoPrestamo[$i]["id_finanzas_prestamo"]."' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil'></i></button></span></div>";

            $botonAplicar =$botonAplicar ="<div class='btn-group'><span data-toggle='modal' data-target='#modalAplicarPrestamo'><button class='btn btn-info btnEditarAplicar-Prestamo' idPrestamo='".$mostrarTipoPrestamo[$i]["id_finanzas_prestamo"]."' data-toggle='tooltip' data-placement='top' title='Aplicar'><i class='fa fa-check-square-o'></i></button></span></div>";

            $botonEntregar ="<div class='btn-group'></div><div class='btn-group'></div>";

            $botonEntregado ="<div class='btn-group'></div><div class='btn-group'></div>";
        }

        if ($mostrarTipoPrestamo[$i]["estatus_prestamo"] == 'Aplicado') {

            $botonEditar ="<div class='btn-group'></div><div class='btn-group'></div>";

            $botonAplicar ="<div class='btn-group'></div><div class='btn-group'></div>";

            $botonEntregar ="<div class='btn-group'><span data-toggle='modal' data-target='#modalEntregarPrestamo'><button class='btn btn-success btnEditarEntregar-Prestamo' idPrestamo='".$mostrarTipoPrestamo[$i]["id_finanzas_prestamo"]."' data-toggle='tooltip' data-placement='top' title='Entregar'><i class='fa fa-arrow-right'></i></button></span></div>";

            $botonEntregado ="<div class='btn-group'></div><div class='btn-group'></div>";
        }
        

        if ($mostrarTipoPrestamo[$i]["estatus_prestamo"] == 'Entregado') {

            $botonEditar ="<div class='btn-group'></div><div class='btn-group'></div>";

            $botonAplicar ="<div class='btn-group'></div><div class='btn-group'></div>";

            $botonEntregar ="<div class='btn-group'></div><div class='btn-group'></div>";

            $botonEntregado ="<span  class='btn btn-success btn-sm'><i class='fa fa-clock-o' aria-hidden='true'>&nbsp;&nbsp;</i>&nbsp;&nbsp;".$mostrarTipoPrestamo[$i]["f_entrega"]."</span>";

            
        }



        

        

        
    

    $datosJson .='[
    "'.$mostrarTipoPrestamo[$i]["id_finanzas_prestamo"].'",
    "'.$trabajadores["num_empleado"].'",
    "'.$trabajadores["nombres"].' '.$trabajadores["a_paterno"].' '.$trabajadores["a_materno"].'",
    "'.$trabajadores["departamento"].'",
    "&nbsp;'.$tipo_prestamo.'",
    "'."$".''.number_format($mostrarTipoPrestamo[$i]["monto_tp"], 2).'",
    "'.$estatusprestamo.'<br><span><em><small>'.$capturistaPrestamo.' </small></em></span>",
    "'.$mostrarTipoPrestamo[$i]["f_registro_tp"].'",
    "'.$botonEditar.' '.$botonAplicar.' '.$botonEntregar.' '.$botonEntregado.'"
    ],';
    } 
}
} /* class prestamos */

$datosJson = substr($datosJson, 0, -1);

$datosJson .=   '] 

}';

echo $datosJson;

}

}




/**
ACTIVAR TABLA DE ESCALAFON CAMBIO DE CATEGORIA
*/

$activarmostrarTipoPrestamo = new TablaPrestamos();
$activarmostrarTipoPrestamo -> mostrarTablaPrestamos();



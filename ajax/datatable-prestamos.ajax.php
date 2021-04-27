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
   /*  $item = "id_trabajador";
    $valor = $mostrarTipoPrestamo[$i]["id_trabajador"];

    $trabajadores = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor);


    if (is_array($trabajadores) && $trabajadores["id_trabajador"]) { */


        /*=============================================
                    ESTATUS
        ============================================= */

        if ($mostrarTipoPrestamo[$i]["estatus_prestamo"] == 'Autorizado') {

            $estatusprestamo = "<span class='btn btn-warning btn-sm'><i class='fa fa-check-square'  style='color:#28a745;' aria-hidden='true'&nbsp;></i>&nbsp; ".$mostrarTipoPrestamo[$i]["estatus_prestamo"]."</span><pre><span class='badge badge-light mt-1'>".$mostrarTipoPrestamo[$i]["f_registro_tp"]."</span>";
        }
        elseif ($mostrarTipoPrestamo[$i]["estatus_prestamo"] == 'Aplicado') {

            $estatusprestamo = "<span class='btn btn-info btn-sm '><i class='fa fa-flag' aria-hidden='true'></i>&nbsp; ".$mostrarTipoPrestamo[$i]["estatus_prestamo"]."</span><pre><span class='badge badge-light mt-1'>".$mostrarTipoPrestamo[$i]["f_aplicacion"]."</span>";
        }
        elseif ($mostrarTipoPrestamo[$i]["estatus_prestamo"] == 'Cancelado') {

            $estatusprestamo = "<span class='btn btn-danger btn-sm data-toggle='tooltip' data-placement='bottom' title='".$mostrarTipoPrestamo[$i]["cancelar_motivo"]."' '><i class='fa fa-times' aria-hidden='true'></i>&nbsp; ".$mostrarTipoPrestamo[$i]["estatus_prestamo"]."</span><pre><span class='badge badge-light mt-1'>".$mostrarTipoPrestamo[$i]["f_cancelacion"]."</span>";
        } 
        else {
            $estatusprestamo = "<span class='btn btn-success btn-sm'><i class='fa fa-check' style='color:#e52d27;' aria-hidden='true'></i> ".$mostrarTipoPrestamo[$i]["estatus_prestamo"]."</span><pre><span class='badge badge-secondary mt-1'>".$mostrarTipoPrestamo[$i]["f_entrega"]."</span>";
        }

        
        /*=============================================
        ESTATUS ASIGNADO POR SEPARADO AUTORIZO/APLICO/ENTREGO
            ============================================= */

        //   AUTORIZO PRESTAMO
        if ($mostrarTipoPrestamo[$i]["capturista_tp"] != " " && $mostrarTipoPrestamo[$i]["estatus_prestamo"]=="Autorizado") {
            $Autorizo = "<span> <i class='fa fa-check-square-o'style='color:#28a745;'></i>&nbsp;" .$mostrarTipoPrestamo[$i]["capturista_tp"]."</span>";
        } else {
            $Autorizo = "<span> <i class='fa fa-check-square-o'style='color:#28a745;'></i>&nbsp;" .$mostrarTipoPrestamo[$i]["capturista_tp"]."</span>";
        }


        //   APLICO PRESTAMO
        if ($mostrarTipoPrestamo[$i]["capturista_aplica_prestamo"] == '') {
            $Aplico ="<span ></span>";
        } elseif ($mostrarTipoPrestamo[$i]["capturista_aplica_prestamo"] != " ") {
            $Aplico ="<span> <i class='fa fa-flag' style='color:#17a2b8;'></i>&nbsp;" .$mostrarTipoPrestamo[$i]["capturista_aplica_prestamo"]."</span>";
        }


        //   ENTREGO PRESTAMO
        if ($mostrarTipoPrestamo[$i]["capturista_entrega_prestamo"] == '') {
            $Entrego = "<span > </span>";
        } elseif ($mostrarTipoPrestamo[$i]["capturista_entrega_prestamo"] != " ") {
            $Entrego = "&nbsp;<span ><i class='fa fa-check' style='color:#dc3545;'></i>&nbsp;" .$mostrarTipoPrestamo[$i]["capturista_entrega_prestamo"]."</span>";
        }

        //  CANCELO PRESTAMO
        if ($mostrarTipoPrestamo[$i]["capturista_cancela_prestamo"] == '') {
            $Cancelo = "<span > </span>";
        } elseif ($mostrarTipoPrestamo[$i]["capturista_cancela_prestamo"] != " ") {
            $Cancelo = "&nbsp;<span ><i class='fa fa-times' style='color:#dc3545;'></i>&nbsp;" .$mostrarTipoPrestamo[$i]["capturista_cancela_prestamo"]."</span>";
        }
    



        /*=============================================
                    TIPO DE SOLICITUD
        ============================================= */

        if ($mostrarTipoPrestamo[$i]["tipo_prestamo"] == 'Vivienda') {
            $tipo_prestamo = "<span class='badge2 badge-orange'>&nbsp; ".$mostrarTipoPrestamo[$i]["tipo_prestamo"]."</span>";
        } elseif ($mostrarTipoPrestamo[$i]["tipo_prestamo"] == 'Caja Chica') {
            $tipo_prestamo = "<span class='badge2 badge-secondary'>&nbsp;".$mostrarTipoPrestamo[$i]["tipo_prestamo"]."</span>";
        } elseif ($mostrarTipoPrestamo[$i]["tipo_prestamo"] == 'Caja Grande') {
            $tipo_prestamo = "<span class='badge2 badge-purple'> ".$mostrarTipoPrestamo[$i]["tipo_prestamo"]."</span>";
        } elseif ($mostrarTipoPrestamo[$i]["tipo_prestamo"] == 'Caja 150') {
            $tipo_prestamo = "<span class='badge2 badge-primary'>&nbsp; ".$mostrarTipoPrestamo[$i]["tipo_prestamo"]."</span>";
        } elseif ($mostrarTipoPrestamo[$i]["tipo_prestamo"] == 'Directo') {
            $tipo_prestamo = "<span class='badge2 badge-success'>&nbsp;</i>".$mostrarTipoPrestamo[$i]["tipo_prestamo"]."</span>&nbsp; </span>";
        }
        // otros
        else {
            $tipo_prestamo = "<span class='badge2 badge-pink'>&nbsp;".$mostrarTipoPrestamo[$i]["tipo_prestamo"]."</span>";
        }


    

        /*=============================================
                    EMPIEZA ESTATUS AUTORIZADO
            ============================================= */

        /* if (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Administrador" || $_GET["perfilOculto"] == "Admin Finanzas" || $_GET["perfilOculto"] == "Secretario General" ||  $_GET["perfilOculto"] == "Personal Finanzas") { */

            if (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Administrador" ||  $_GET["perfilOculto"] == "Admin Finanzas" ||  $_GET["perfilOculto"] == "Secretario General" && $mostrarTipoPrestamo[$i]["estatus_prestamo"] == 'Autorizado') {
                $botonEditar = "<div class='btn-group'><span data-toggle='modal' data-target='#modalEditarPrestamo'><button class='btn btn-warning btnEditar-Prestamo' idPrestamo='".$mostrarTipoPrestamo[$i]["id_finanzas_prestamo"]."' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil'style='color:#28a745;'></i></button></span></div>";

                $botonAplicar = "<div class='btn-group'><span data-toggle='modal' data-target='#modalAplicarPrestamo'><button class='btn btn-info btnEditarAplicar-Prestamo' idPrestamo='".$mostrarTipoPrestamo[$i]["id_finanzas_prestamo"]."' data-toggle='tooltip' data-placement='top' title='Aplicar'><i class='fa fa-check-square-o'></i></button></span></div>";

                $botonCancelado ="<div class='btn-group'><span data-toggle='modal' data-target='#modalCancelarPrestamo'><button class='btn btn-danger btnEditarCancelar-Prestamo' idPrestamo='".$mostrarTipoPrestamo[$i]["id_finanzas_prestamo"]."' data-toggle='tooltip' data-placement='top' title='Cancelar'><i class='fa fa-times'></i></button></span></div>";

                $botonEntregar ="<div class='btn-group'></div>";

                $botonEntregado ="<div class='btn-group'></div>";
            }

            if (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Secretario General"  && $mostrarTipoPrestamo[$i]["estatus_prestamo"] == 'Autorizado') {
                $botonEditar = "<div class='btn-group'><span data-toggle='modal' data-target='#modalEditarPrestamo'><button class='btn btn-warning btnEditar-Prestamo' idPrestamo='".$mostrarTipoPrestamo[$i]["id_finanzas_prestamo"]."' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil'></i></button></span></div>";

                $botonAplicar = "<div class='btn-group'><span ><button class='btn btn-info  disabled'  data-toggle='tooltip' data-placement='top' title='Aplicar'><i class='fa fa-check-square-o'></i></button></span></div>";

                $botonCancelado ="<div class='btn-group'><span data-toggle='modal' data-target='#modalCancelarPrestamo'><button class='btn btn-danger btnEditarCancelar-Prestamo' idPrestamo='".$mostrarTipoPrestamo[$i]["id_finanzas_prestamo"]."' data-toggle='tooltip' data-placement='top' title='Cancelar'><i class='fa fa-times'></i></button></span></div>";

                $botonEntregar ="<div class='btn-group'></div>";

                $botonEntregado ="<div class='btn-group'></div>";
            }

            if (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Personal Finanzas"  && $mostrarTipoPrestamo[$i]["estatus_prestamo"] == 'Autorizado') {
                $botonEditar = "<div class='btn-group'><span><button class='btn btn-warning disabled' data-toggle='tooltip' data-placement='top' title='Editar'><i class='fa fa-pencil'></i></button></span></div>";

                $botonAplicar = "<div class='btn-group'><span><button class='btn btn-info disabled' data-toggle='tooltip' data-placement='top' title='Aplicar'><i class='fa fa-check-square-o'></i></button></span></div>";

                $botonCancelado ="<div class='btn-group'><span'><button class='btn btn-danger disabled' data-toggle='tooltip' data-placement='top' title='Cancelar'><i class='fa fa-times'></i></button></span></div>";

                $botonEntregar ="<div class='btn-group'></div>";

                $botonEntregado ="<div class='btn-group'></div>";
            }

            /*=============================================
                    TERMINA ESTATUS AUTORIZADO
            ============================================= */



            /*=============================================
                    EMPIEZA ESTATUS APLICADO
            ============================================= */

            if (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Administrador"  && $mostrarTipoPrestamo[$i]["estatus_prestamo"] == 'Aplicado') {
                $botonEditar = "<div class='btn-group'></div>";

                $botonAplicar ="<div class='btn-group'></div>";

                $botonCancelado ="<div class='btn-group'></div>";

                $botonEntregar ="<div class='btn-group'><span data-toggle='modal' data-target='#modalEntregarPrestamo'><button class='btn btn-success btnEditarEntregar-Prestamo' idPrestamo='".$mostrarTipoPrestamo[$i]["id_finanzas_prestamo"]."' data-toggle='tooltip' data-placement='top' title='Entregar'><i class='fa fa-arrow-right'></i></button></span></div>";

                $botonEntregado ="<div class='btn-group'></div>";
            } elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Admin Finanzas"  && $mostrarTipoPrestamo[$i]["estatus_prestamo"] == 'Aplicado') {
                $botonEditar = "<div class='btn-group'></div>";

                $botonAplicar ="<div class='btn-group'></div>";

                $botonCancelado ="<div class='btn-group'></div>";

                $botonEntregar ="<div class='btn-group'><span data-toggle='modal' data-target='#modalEntregarPrestamo'><button class='btn btn-success btnEditarEntregar-Prestamo' idPrestamo='".$mostrarTipoPrestamo[$i]["id_finanzas_prestamo"]."' data-toggle='tooltip' data-placement='top' title='Entregar'><i class='fa fa-arrow-right'></i></button></span></div>";

                $botonEntregado ="<div class='btn-group'></div>";
            } elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Secretario General"  && $mostrarTipoPrestamo[$i]["estatus_prestamo"] == 'Aplicado') {
                $botonEditar = "<div class='btn-group'></div>";

                $botonAplicar ="<div class='btn-group'></div>";

                $botonCancelado ="<div class='btn-group'></div>";

                $botonEntregar ="<div class='btn-group'><span><button class='btn btn-success disabled'  data-toggle='tooltip' data-placement='top' title='Entregar'><i class='fa fa-arrow-right'></i></button></span></div>";

                $botonEntregado ="<div class='btn-group'></div>";
            } elseif (isset($_GET["perfilOculto"]) && $_GET["perfilOculto"] == "Personal Finanzas" && $mostrarTipoPrestamo[$i]["estatus_prestamo"] == 'Aplicado') {
                $botonEditar ="<div class='btn-group'></div>";

                $botonAplicar ="<div class='btn-group'></div>";

                $botonCancelado ="<div class='btn-group'></div>";

                $botonEntregar ="<div class='btn-group'><span data-toggle='modal' data-target='#modalEntregarPrestamo'><button class='btn btn-success btnEditarEntregar-Prestamo' idPrestamo='".$mostrarTipoPrestamo[$i]["id_finanzas_prestamo"]."' data-toggle='tooltip' data-placement='top' title='Entregar'><i class='fa fa-arrow-right'></i></button></span></div>";

                $botonEntregado ="<div class='btn-group'></div>";
            }

            /*=============================================
                    TERMINA ESTATUS APLICADO
            ============================================= */

            /*=============================================
                    EMPIEZA ESTATUS CANCELADO
            ============================================= */
        
            if ($mostrarTipoPrestamo[$i]["estatus_prestamo"] == 'Cancelado') {
                $botonEditar ="<div class='btn-group'></div>";

                $botonAplicar ="<div class='btn-group'></div>";

                $botonCancelado ="<div class='btn-group'></div>";

                $botonEntregar ="<div class='btn-group'></div>";

                $botonEntregado ="<div class='text-secondary'><span><i class='fa fa-handshake-o fa-lg' style='color:#28a745;'  aria-hidden='true'></i>&nbsp; <strong>Cerrado</strong></span></div>";
            }

            /*=============================================
                    TERMINA ESTATUS CANCELADO
            ============================================= */

            /*=============================================
                    EMPIEZA ESTATUS ENTREGADO
            ============================================= */
        
            if ($mostrarTipoPrestamo[$i]["estatus_prestamo"] == 'Entregado') {
                $botonEditar ="<div class='btn-group'></div>";

                $botonAplicar ="<div class='btn-group'></div>";

                $botonCancelado ="<div class='btn-group'></div>";

                $botonEntregar ="<div class='btn-group'></div>";

                $botonEntregado ="<div class='text-secondary'><span><i class='fa fa-handshake-o fa-lg' style='color:#28a745;'  aria-hidden='true'></i>&nbsp; <strong>Cerrado</strong></span></div>";
            }
       /*  } */

        /*=============================================
                TERMINA ESTATUS ENTREGADO
        ============================================= */
            

        $datosJson .='[
    "'.$mostrarTipoPrestamo[$i]["id_finanzas_prestamo"].'",
    "'.$mostrarTipoPrestamo[$i]["num_empleado"].'",
    "'.$mostrarTipoPrestamo[$i]["nombre_completo"].'",
    "'.$mostrarTipoPrestamo[$i]["departamento"].'",
    "'.$tipo_prestamo.'",
    "'."$".''.number_format($mostrarTipoPrestamo[$i]["monto_tp"], 2).'",
    "'.$estatusprestamo.'",
    "<pre><span><em>'.$Autorizo.'</em></span><br><span><em>'.$Aplico.'</em></span><br><span><em>'.$Entrego.'</em></span></span><br><span><em>'.$Cancelo.'</em></span>",
    "'.$mostrarTipoPrestamo[$i]["f_registro_tp"].'",
    "'.$botonEditar.' '.$botonAplicar.' '.$botonCancelado.' '.$botonEntregar.' '.$botonEntregado.'"
    ],';
    /* } */
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



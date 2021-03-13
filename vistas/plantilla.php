<?php 

session_start();

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">




  <title>SATS | STASAC</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- App favicon -->
  <link rel="shortcut icon" href="vistas/dist/img/ico-sats-y.ico">

  <!--=====================================
  =           Plugins CSS          =
  ======================================-->


  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/plugins/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->

   <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/plugins/ionicons-version-3/css/ionicons.min.css">

  
   <link rel="stylesheet" href="vistas/plugins/datatables.net/css/bootstrap.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/adminlte.css">

  <!-- Form Validation -->
  <link rel="stylesheet" href="vistas/plugins/formvalidation/dist/css/formValidation.css">
 <!--  <link rel="stylesheet" href="vistas/plugins/formvalidation/src/css/framework/bootstrap.css"> -->

  <!-- Select2 -->
  <link rel="stylesheet" href="vistas/plugins/select2/dist/css/select2.min.css">

  <link rel="stylesheet" href="vistas/plugins/select2/dist/css/select2-bootstrap4.min.css">

  
  <!-- Data tables -->
  <link rel="stylesheet" type="text/css" href="vistas/plugins/datatables.net/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="vistas/plugins/datatables.net/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="vistas/plugins/datatables.net/css/buttons.bootstrap4.min.css">

      
  <!-- iCheck -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
 <!--  <link rel="stylesheet" href="vistas/plugins/morris/morris.css"> -->
  <!-- jvectormap -->
 <!--  <link rel="stylesheet" href="vistas/plugins/jvectormap/jquery-jvectormap-1.2.2.css"> -->
  <!-- Date Picker -->
 <!--  <link rel="stylesheet" href="vistas/plugins/datepicker/datepicker3.css"> -->
  <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/plugins/daterangepicker/daterangepicker-bs3.css">
  <!-- TempusDominus -->
  <link rel="stylesheet" href="vistas/plugins/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="vistas/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- floating labels -->
   <link rel="stylesheet" href="vistas/dist/css/floating-labels.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">



  <!--=====================================
  =           Plugins JS         =
  ======================================-->
   <!-- <script src="vistas/plugins/bootstrap-sweetalert/sweetalert.js"></script> -->
  <!-- jQuery -->
<script src="vistas/plugins/jquery/jquery.min.js"></script>

<!-- jQuery Number -->
  <script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script>

  <!-- jQuery Number Divider -->
  <script src="vistas/plugins/jqueryNumberDivider/number-divider.min.js"></script>

  

   

<!-- <script src="vistas/plugins/jquery/jquery-3.3.1.js"></script> -->
<!-- jQuery UI 1.11.4 -->

 <script src="vistas/plugins/sweetalert2/sweetalert22.all.min.js"></script>


<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script> -->
 <script src="vistas/plugins/ui/1.12.1/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>


<!-- inputMask -->
<script src="vistas/plugins/input-mask/jquery.inputmask.js"></script>
<script src="vistas/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="vistas/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="vistas/plugins/input-mask/jquery.inputmask.numeric.extensions.js"></script>
<script src="vistas/plugins/input-mask/jquery.inputmask.phone.extensions.js"></script>



<!-- Select2 -->

<script src="vistas/plugins/select2/dist/js/popper.min.js"></script>
<script src="vistas/plugins/select2/dist/js/select2.min.js"></script>
<script src="vistas/plugins/select2/dist/js/i18n/es.js"></script>




<!-- Formvalidation -->
<script src="vistas/plugins/formvalidation/dist/js/formValidation.min.js"></script>
<script src="vistas/plugins/formvalidation/dist/js/framework/bootstrap4.min.js"></script>


<!-- jquery data table min -->
<script src="vistas/plugins/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="vistas/plugins/datatables.net/js/dataTables.bootstrap4.min.js"></script>

<script src="vistas/plugins/datatables.net/js/dataTables.responsive.min.js"></script>

<script src="vistas/plugins/datatables.net/js/responsive.bootstrap4.min.js"></script>

<script src="vistas/plugins/jquery-loading-overlay-master/src/loadingoverlay.js"></script>


<script src="vistas/plugins/datatables.net/buttons/dataTables.buttons.min.js"></script>
<script src="vistas/plugins/datatables.net/buttons/buttons.bootstrap4.min.js"></script>
<script src="vistas/plugins/datatables.net/buttons/jszip.min.js"></script>
<script src="vistas/plugins/datatables.net/buttons/pdfmake.min.js"></script>
<script src="vistas/plugins/datatables.net/buttons/vfs_fonts.js"></script>
<script src="vistas/plugins/datatables.net/buttons/buttons.html5.min.js"></script>
<script src="vistas/plugins/datatables.net/buttons/buttons.print.min.js"></script>
<script src="vistas/plugins/datatables.net/buttons/buttons.colVis.min.js"></script>



<!-- Bootstrap 4 -->
<script src="vistas/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!--FusionCharts -->
<script src="vistas/plugins/fcharts/js/fusioncharts.js"></script>
<script src="vistas/plugins/fcharts/js/fusioncharts.charts.js"></script>
<script src="vistas/plugins/fcharts/js/themes/fusioncharts.theme.ocean.js"></script>
<script src="vistas/plugins/fcharts/js/themes/fusioncharts.theme.zune.js"></script>
<script src="vistas/plugins/fcharts/js/themes/fusioncharts.theme.carbon.js"></script>
<script src="vistas/plugins/fcharts/js/themes/fusioncharts.theme.fint.js"></script>




<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<!-- <script src="vistas/plugins/morris/morris.min.js"></script> -->
<!-- Sparkline -->
<script src="vistas/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<!-- <script src="vistas/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="vistas/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="vistas/plugins/knob/jquery.knob.js"></script>


<script src="vistas/plugins/moment/moment.js/v2.17.0/moment.js"></script>

<!-- <script type="text/javascript" src="vistas/plugins/moment/moment.js/2.22.2/moment-with-locales.min.js"></script> -->
<!-- <script type="text/javascript" src="vistas/plugins/moment/moment-timezone/0.5.21/moment-timezone-with-data-2012-2022.min.js"></script> -->


<!-- daterangepicker -->
<script src="vistas/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<!-- <script src="vistas/plugins/datepicker/bootstrap-datepicker.js"></script> -->
<!-- Bootstrap WYSIHTML5 -->
<script src="vistas/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="vistas/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="vistas/plugins/fastclick/fastclick.js"></script>
<!-- TempusDominus -->
<script src="vistas/plugins/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>


<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="vistas/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->

     
  
</head>

<!--=====================================
  =          Cuerpo Documento         =
  ======================================-->
<!-- <body class="hold-transition sidebar-mini bg-accpunt-pages" style="height: auto;"> -->
 
  

  <?php

  if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

   echo '<div class="wrapper">';

 /*=============================================
  =           ruta/salir          =
  =============================================*/
if (isset($_GET["ruta"])) {
  if($_GET["ruta"] == "salir")
  {
     include "modulos/".$_GET["ruta"].".php";

   }
}

  /*=============================================
  =            Cabecera/Header           =
  =============================================*/
  include "modulos/menu-lateral.php";
  include "modulos/header.php";
  

  /*=============================================
  =            Contenido          =
  =============================================*/

    if(isset($_GET["ruta"])){

        if($_GET["ruta"] == "inicio" ||
        $_GET["ruta"]    == "usuarios" ||
        $_GET["ruta"]    == "registro-trabajadores" ||
        $_GET["ruta"]    == "expediente" ||
        $_GET["ruta"]    == "registro-hijos" ||
        $_GET["ruta"]    == "listado-trabajadores" ||
        $_GET["ruta"]    == "reportes" ||
        $_GET["ruta"]    == "graficas" ||
        $_GET["ruta"]    == "escalafon-listado-movimientos" || 
        $_GET["ruta"]    == "escalafon-cambio-categoria" ||
        $_GET["ruta"]    == "escalafon-cambio-adscripcion" ||
        $_GET["ruta"]    == "escalafon-apoyo-transporte" ||
        $_GET["ruta"]    == "escalafon-complemento" ||
        $_GET["ruta"]    == "escalafon-comision" ||
        $_GET["ruta"]    == "escalafon-reportes" ||
        $_GET["ruta"]    == "escalafon-graficas" ||
        $_GET["ruta"]    == "nuevas-bases" ||
        $_GET["ruta"]    == "actas-acuerdos" ||
        $_GET["ruta"]    == "finanzas-prestamos" ||
        $_GET["ruta"]    == "finanzas-listado-trabajadores" ||
        $_GET["ruta"]    == "finanzas-reportes" ||
        $_GET["ruta"]    == "finanzas-graficas" ||
        $_GET["ruta"]    == "prom-financiera-registro-movimientos" ||
        $_GET["ruta"]    == "prom-financiera-listado-trabajadores" ||
        $_GET["ruta"]    == "prom-financiera-reportes" ||
        $_GET["ruta"]    == "prom-financiera-graficas" ||
        $_GET["ruta"]    == "educacion-registro-movimientos" ||
        $_GET["ruta"]    == "educacion-listado-trabajadores" ||
        $_GET["ruta"]    == "educacion-reportes" ||
        $_GET["ruta"]    == "educacion-graficas" ){

        include "modulos/".$_GET["ruta"].".php";

          /*=============================================
          =            menu-lateral           =
          =============================================*/

          

      }else{

        include "modulos/404.php";

      }

    }else{

      include "modulos/inicio.php";

    }

 /*=============================================
    FOOTER
    =============================================*/


  include "modulos/footer.php";

  

    }else{

    include "modulos/login.php";

  }

  ?>
  
 
<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/trabajadores.js"></script>
<script src="vistas/js/combobox.js"></script>
<script src="vistas/js/hijos.js"></script>
<script src="vistas/js/apoyo_transporte.js"></script>
<script src="vistas/js/nueva_base.js"></script>
<script src="vistas/js/complemento.js"></script>
<script src="vistas/js/cambio-categoria.js"></script>
<script src="vistas/js/cambio-adscripcion.js"></script>
<script src="vistas/js/comision.js"></script>





<!--
</body> -->
</html>

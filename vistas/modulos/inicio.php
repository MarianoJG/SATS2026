 <?php

$item = null;
$valor = null;

// $orden = "id";

// $ventas = ControladorVentas::ctrSumaTotalVentas();

$trabajadores = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor);
$totalTrabajadores = count($trabajadores);


?>

<body class="hold-transition sidebar-mini bg-p2-pages" style="height: auto;">


 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
         <div class="row mt-5 pt-2">

          <div class="col-sm-4">
            <h1 class="m-0 text-dark">Tablero <small>/ Total de Registros</small> <span><small class="badge badge-secondary"><i class="ion-android-laptop"></i> <?php echo number_format($totalTrabajadores); ?></small></span></h1>
          </div><!-- /.col -->

           <div class="col-sm-4 pt-3">
            <h1 class="m-0 text-dark mx-auto">Indicadores por modulo </h1>
          </div><!-- /.col -->

          <div class="col-sm-4">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Tablero</li>
            </ol>
          </div><!-- /.col -->

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content pt-3">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

          <?php 

          include 'inicio/cajas-superiores.php';

           ?>


          
          
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class ="row">

          <div class =" col-md-6 pt-3">

            <div id    ="chart-1" align="center">

             <?php
              
              include "reportes/grafico-departamentos.php";
              
              ?> 
              
            </div>


          </div>

          <div class =" col-md-6 pt-3">

            <div id    ="chart-2" align="center">

             <?php
              
              include "reportes/grafico-PorcentajeHombreMujer.php";
              
              ?> 
              
            </div>


          </div>

        </div>
       <!--/ROW -->

       
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
         
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
         
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  </body>
  
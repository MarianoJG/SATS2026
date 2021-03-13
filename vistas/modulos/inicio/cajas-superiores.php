  <?php

$item = null;
$valor = null;

// $orden = "id";

// $ventas = ControladorVentas::ctrSumaTotalVentas();

$sindicalizados = ControladorTrabajadores::ctrMostrarTrabajadoresSindicalizados($item, $valor);
$totalSindicalizados = count($sindicalizados);

$confianza = ControladorTrabajadores::ctrMostrarTrabajadoresConfianza($item, $valor);
$totalConfianza = count($confianza);

$eventuales = ControladorTrabajadores::ctrMostrarTrabajadoresEventuales($item, $valor);
$totalEventuales = count($eventuales);

$jubilados = ControladorTrabajadores::ctrMostrarTrabajadoresJubilados($item, $valor);
$totalJubilados = count($jubilados);

$nuevasbasesasginadas = Controlador_NuevaBase::ctr_MostrarNuevaBase($item, $valor);
$totalnuevasbasesasginadas = count($nuevasbasesasginadas);

$aTransporte = Controlador_ApoyoTransporte::ctr_MostrarApoyoTransporte($item, $valor);
$totalaTransporte = count($aTransporte);




?>




  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3><?php echo number_format($totalSindicalizados); ?></h3>

        <p>Trabajadores Sindicalizados</p>
      </div>
      <div class="icon">
        <i class="ion-ios-people"></i>
      </div>
      <a href="registro-trabajadores" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->


  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3><?php echo number_format($totalConfianza); ?><!-- <sup style="font-size: 20px">%</sup> --></h3>

        <p>Trabajadores de Confianza</p>
      </div>
      <div class="icon">
        <i class="ion-ios-person-outline"></i>
      </div>
      <a href="registro-trabajadores" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->


  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3><?php echo number_format($totalEventuales); ?></h3>

        <p>Trabajadores Eventuales</p>
      </div>
      <div class="icon">
        <i class="ion-md-walk"></i>
      </div>
      <a href="registro-trabajadores" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->


  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3><?php echo number_format($totalJubilados); ?></h3>

        <p>Trabajadores Jubilados</p>
      </div>
      <div class="icon">
        <i class="ion-ios-people-outline"></i>
      </div>
      <a href="registro-trabajadores" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
    </div>
  </div>

 

  <!-- /.info-box-content NUEVAS BASES ASIGNADAS -->
  <div class="col-md-3 col-sm-6 col-12">
     <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3><?php echo number_format($totalaTransporte); ?></h3>

        <p>Apoyo de Transporte </p>
      </div>
      <div class="icon">
        <i class="ion-md-bus"></i>
      </div>
      <a href="escalafon-apoyo-transporte" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
    </div>

  </div>
  <!-- /.col -->


   <!-- /.info-box-content NUEVAS BASES ASIGNADAS -->
  <div class="col-md-3 col-sm-6 col-12">
     <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3><?php echo number_format($totalnuevasbasesasginadas); ?></h3>

        <p>Nuevas Bases Asignadas </p>
      </div>
      <div class="icon">
        <i class="ion-md-ribbon"></i>
      </div>
      <a href="nuevas-bases" class="small-box-footer">Mas info <i class="fa fa-arrow-circle-right"></i></a>
    </div>

  </div>
  <!-- /.col -->



  



  




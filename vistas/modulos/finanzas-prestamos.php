<style type="text/css">
  .fv-form-bootstrap4 .fv-control-feedback {
    width: 0px;
    height: 38px;
    line-height: 38px;
    right: -1px;
  }
</style>

<body class="hold-transition sidebar-mini bg-p2-pages" style="height: auto;">

  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mt-5 pt-2">
          <div class="col-sm-6 pl-3">
            <h1><span><i class="fa fa-credit-card" aria-hidden="true"></i></span>&nbsp;&nbsp;Finanzas - Préstamos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Finanzas</li>
              <li class="breadcrumb-item active">Préstamos</li>
            </ol>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column  buttom-->
          <div class="pl-3">

            <?php
        /* PERMISO PARA VER BOTON AGREGAR SOLO ADMINISTRADOR, SECRETARIO GENERAL Y ADMIN FINANZAS */

        if($_SESSION["perfil"] == "Administrador"  || $_SESSION["perfil"] == "Secretario General" || $_SESSION["perfil"] == "Admin Finanzas")
          {

            echo '<button type="button" class="btn btn-primary btnAgregarPrestamo" data-toggle="modal" data-target="#modalAgregarPrestamo"><i class="fa fa-plus nav-icon"></i>&nbsp;
          Agregar Registro
        </button>
                  ';
        }
        
        ?>

          </div>

        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

    <section class="account-content">
      <div class="card-body">
        <table class="table TablaPrestamos display table-hover table-striped table-bordered dt-responsive "
          style="width:100%">
          <thead>
            <tr>

              <th>Id</th>
              <th>#Empleado</th>
              <th>Nombre del Trabajador</th>
              <th>Adscripción</th>
              <th>Tipo de Préstamo </th>
              <th>Monto </th>
              <th>Estatus </th>
              <th>Capturista</th>
              <th>Fecha de Registro</th>
              <th>Acciones</th>

            </tr>
          </thead>

        </table>
        <input type="hidden" class="form-control is-invalid" value="<?php echo $_SESSION['perfil']; ?>"
          id="perfilOculto" readonly>
      </div>

    </section>
  </div>
  <!-- content-wrapper -->

  <!--=====================================
MODAL AGREGAR PRESTAMO
======================================-->

  <div class="modal fade bd-example-modal-lg" id="modalAgregarPrestamo" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

        <!--=====================================
CABEZA DEL MODAL PRESTAMO
======================================-->

        <div class="modal-header modal-header-primary">

          <h5 class="modal-title text-ligth" id="exampleModalLabel"><i class="fa fa-plus-circle fa-lg"
              aria-hidden="true"></i>&nbsp; Agregar - Nuevo Préstamo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!--=====================================
CUERPO DEL MODAL PRESTAMO
======================================-->

        <div class="modal-body  modal-lg">

          <div class="card-header  ">

            <form method="post" name="registrationForm-Prestamos" id="registrationForm-Prestamos"
              enctype="multipart/form-data">

              <!--AQUI-->

              <!--SECCION 1-->

              <div class="form-group card-body callout callout-success ">

                <div class="row seccion1">

                  <div class=" col-md-3  ">

                    <!-- ENTRADA PARA EL CAPTURISTA DE REGISTROS -->
                    <input type="hidden" name="Capturista-Prestamo" value="<?php  echo $_SESSION["nombre"]; ?>"
                      class="form-control is-invalid" readonly="">

                    <!-- ENTRADA PARA BUSCAR Y CAPTURAR TRABAJADOR -->
                    <div class="form-group ">
                      <label for="buscaTrabajador">Buscar:</label>

                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-search "></i></span>
                        </div>

                        <select class="form-control  " name="buscaTrabajador" id="buscaTrabajador" required="">
                          <option value=""># Empleado</option>

                          <?php

                          $item = null;
                          $valor = null;

                          $mostrarTrabajador = ControladorTrabajadores::ctrMostrarTrabajadoresTipoSindicalizados($item, $valor);

                          foreach ($mostrarTrabajador as $key => $value) {

                            echo '<option value="'.$value["id_trabajador"].'">'.$value["num_empleado"].'</option>';
                          }

                          ?>

                        </select>

                      </div>
                    </div>

                    <input type="hidden" name="trabajadorId" id="trabajadorId" class="form-control is-invalid"
                      readonly="">
                  </div>

                  <!-- ENTRADA PARA MOSTRAR NOMBRE DEL TRABAJADOR -->
                  <div class=" col-md-6 pl-3">
                    <div class="form-group  ">
                      <label for="nomTrabajador">Empleado:</label>

                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-user "></i></span>
                        </div>
                        <input type="text" name="nomTrabajador" id="nomTrabajador" class="form-control"
                          placeholder="Empleado" readonly="">

                      </div>
                    </div>

                  </div>

                  <!-- ENTRADA PARA MOSTRAR TIPO DE EMPLEADO DEL TRABAJADOR -->
                  <div class=" col-md-3  ">
                    <div class="form-group  ">
                      <label for="tipoEmpleado">Tipo Empleado:</label>

                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-id-card-o "></i></span>
                        </div>
                        <input type="text" name="tipoEmpleado" id="tipoEmpleado" class="form-control" placeholder="Tipo"
                          readonly="">

                      </div>
                    </div>
                  </div>

                </div>
                <!--en row-->

              </div>

              <!--ENTRADA PARA AGREGAR NUEVO TIPO DE PRESTAMO-->
              <!--SECCION 2-->

              <div class="form-group card-body callout callout-warning mt-5 OcultarSeccion2">
                <div class="row seccion2">

                  <!-- ENTRADA PARA SELECCIONAR TIPO DE CATEGORIA -->
                  <div class=" col-md-5  ">

                    <div class="form-group  ">
                      <label for="nuevoPrestamo">Tipo de Préstamo:</label>
                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-search "></i></span>
                        </div>

                        <select class="form-control  " name="nuevoPrestamo" id="nuevoPrestamo" required="">
                          <option value="">Seleccionar...</option>

                          <?php

                  $item = null;
                  $valor = null;

                  $mostrarTipoPrestamo = ControladorPrestamos::ctrMostrarTipoPrestamo($item, $valor);

                  foreach ($mostrarTipoPrestamo as $key => $value) {

                    echo '<option value="'.$value["prestamo"].'">'.$value["prestamo"].'</option>';
                  }

                  ?>

                        </select>

                      </div>
                    </div>
                    <input type="hidden" name="prestamoId" id="prestamoId" class="form-control is-invalid" readonly=""
                      placeholder="prestamoId">

                  </div>

                  <!--ENTRADA PARA AGREGAR MONTO CAMBIO DE CATEGORIA-->

                  <div class=" col-md-3 pl-4  ">
                    <div class="form-group  ">
                      <label for="nuevoMontoPrestamo">Monto:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ion ion-logo-usd"></i></span>
                        </div>
                        <input class="form-control" type="text" name="nuevoMontoPrestamo" id="nuevoMontoPrestamo"
                          autocomplete="off" placeholder="0,000.00">

                      </div>
                    </div>
                    <input class="form-control is-invalid" type="hidden" name="MontoPrestamo" id="MontoPrestamo"
                      autocomplete="off" readonly="">
                  </div>

                  <!--ENTRADA PARA AGREGAR FECHA DE REGISTRO EN APOYO DE TRANSPORTE-->

                  <div class="col-md-4  ">
                    <div class="form-group   ">
                      <label for="nuevoFechaPrestamo">Fecha de Registro:</label>

                      <div class="input-group date" id="nuevoFechaPrestamo" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#nuevoFechaPrestamo"
                          name="nuevoFechaPrestamo" id="nuevoFechaPrestamo" readonly="" />
                        <div class="input-group-append" data-target="#nuevoFechaPrestamo" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>

                    </div>
                    <!--/form-group-->
                  </div>

                  <div class="col-md-5">

                    <div class="form-group  ">
                      <label for="nuevoEstatus">Estatus:</label>
                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-check-square-o "></i></span>
                        </div>

                        <select class="form-control  " name="nuevoEstatus" id="nuevoEstatus">
                          <option value="">Seleccionar...</option>
                          <option value="Autorizado">Autorizado</option>
                          <!-- <option value="Aplicado" >Aplicar Préstamo</option> -->

                        </select>

                      </div>
                    </div>

                  </div>
                  <!-- /col-md-5 -->

                </div>
              </div>

              <!--=====================================
        PIE DEL MODAL
        ======================================-->

              <div class="modal-footer">

                <!--   <button type="button" id="CancelarRegrescar-ApoyoTransporte" class="btn btn-outline-info " data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Refrescar</button> -->

                <button type="button" id="CancelarAgregar-Prestamo" class="btn btn-outline-danger "
                  data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancelar</button>

                <button type="submit" id="btnGuardar" class="btn btn-outline-success"><i class="fa fa-check"
                    aria-hidden="true"></i>&nbsp;Agregar</button>
              </div>

              <?php 

          $CrearNuevoPrestamo = new ControladorPrestamos();
          $CrearNuevoPrestamo -> ctrCrearPrestamo();

          ?>

            </form>

          </div>
          <!-- Fin card-header -->
        </div>
        <!-- Fin modal-body  modal-lg -->
      </div>
      <!-- modal-content -->
    </div>
    <!-- "modal-dialog modal-lg -->
  </div>
  <!-- "modal fade bd-example-modal-lg -->

  <!--=====================================
MODAL EDITAR PRESTAMO
======================================-->

  <div class="modal fade bd-example-modal-lg" id="modalEditarPrestamo" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

        <!--=====================================
CABEZA DEL MODAL EDITAR PRESTAMO
======================================-->

        <div class="modal-header modal-header-primary">

          <h5 class="modal-title text-ligth" id="exampleModalLabel"><i class="fa fa-pencil-square-o fa-lg"
              aria-hidden="true"></i>&nbsp; Editar - Tipo de Préstamo &nbsp;&nbsp; </h5>

          <div class="form-group  ">

            <div class="input-group  input-group-sm  ">

              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-barcode"></i></span>
              </div>

              <input type="text" name="BarCodePrestamoEditarId" id="BarCodePrestamoEditarId" class="form-control"
                size="1" readonly="">

            </div>

          </div>
          <!--/form-group -->

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!--=====================================
CUERPO DEL MODAL EDITAR PRESTAMO
======================================-->

        <div class="modal-body  modal-lg">

          <div class="card-header  ">

            <form method="post" name="registrationForm-EditarPrestamo" id="registrationForm-EditarPrestamo"
              enctype="multipart/form-data">

              <!--AQUI-->

              <div class="form-group card-body callout callout-warning ">

                <div class="row seccion1">

                  <div class=" col-md-3  ">

                    <!-- ENTRADA PARA EDITAR EL CAPTURISTA DE REGISTROS -->
                    <input type="hidden" name="Capturista-EditarPrestamo" value="<?php  echo $_SESSION["nombre"]; ?>"
                      class="form-control is-invalid" readonly="">

                    <!-- ENTRADA PARA BUSCAR Y CAPTURAR TRABAJADOR -->
                    <div class="form-group  ">
                      <label for="EditarbuscaTrabajador">Buscar:</label>

                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-search "></i></span>
                        </div>

                        <select class="form-control  " name="EditarbuscaTrabajador" id="EditarbuscaTrabajador">
                          <option value=""># Empleado</option>

                          <?php

                      $item = null;
                      $valor = null;

                      $mostrarTrabajador = ControladorTrabajadores::ctrMostrarTrabajadoresTipoSindicalizados($item, $valor);

                      foreach ($mostrarTrabajador as $key => $value) {

                        echo '<option value="'.$value["id_trabajador"].'">'.$value["num_empleado"].'</option>';
                      }

                      ?>

                        </select>

                        </select>

                      </div>
                    </div>
                    <input type="hidden" name="EditartrabajadorId" id="EditartrabajadorId"
                      class="form-control is-invalid" readonly="">
                  </div>

                  <!-- ENTRADA PARA MOSTRAR NOMBRE DEL TRABAJADOR -->
                  <div class=" col-md-6 pl-3">
                    <div class="form-group  ">
                      <label for="EditarnomTrabajador">Empleado:</label>

                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-user "></i></span>
                        </div>
                        <input type="text" name="EditarnomTrabajador" id="EditarnomTrabajador" class="form-control"
                          placeholder="Empleado" readonly="">

                      </div>
                    </div>
                  </div>

                  <!-- ENTRADA PARA MOSTRAR TIPO DE EMPLEADO DEL TRABAJADOR -->
                  <div class=" col-md-3  ">
                    <div class="form-group  ">
                      <label for="EditartipoEmpleado">Tipo Empleado:</label>

                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-id-card-o "></i></span>
                        </div>
                        <input type="text" name="EditartipoEmpleado" id="EditartipoEmpleado" class="form-control"
                          placeholder="Tipo" readonly="">

                      </div>
                    </div>
                  </div>

                </div>
                <!--en row-->

              </div>

              <!--ENTRADA PARA EDITAR TIPO DE PRESTAMO-->

              <div class="form-group card-body callout callout-warning mt-5 OcultarSeccion2">

                <div class="row ">

                  <!-- ENTRADA PARA SELECCIONAR TIPO DE PRESTAMO -->
                  <div class=" col-md-5  ">

                    <div class="form-group  ">
                      <label for="buscarEditarPrestamo">Tipo de Préstamo:</label>
                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-search "></i></span>
                        </div>

                        <select class="form-control  " name="buscarEditarPrestamo" id="buscarEditarPrestamo"
                          required="">
                          <option value="">Seleccionar...</option>

                          <?php

                  $item = null;
                  $valor = null;

                  $mostrarTipoPrestamo = ControladorPrestamos::ctrMostrarTipoPrestamo($item, $valor);

                  foreach ($mostrarTipoPrestamo as $key => $value) {

                    echo '<option value="'.$value["prestamo"].'">'.$value["prestamo"].'</option>';
                  }
                  
                  ?>

                        </select>

                      </div>
                    </div>

                    <input type="hidden" name="EditarPrestamo" id="EditarPrestamo" class="form-control is-invalid"
                      required="" readonly="">
                    <input type="hidden" name="EditarprestamoId" id="EditarprestamoId" class="form-control is-invalid"
                      readonly="">

                  </div>

                  <!--ENTRADA PARA EDITAR MONTO-->

                  <div class=" col-md-3 pl-4  ">
                    <div class="form-group  ">
                      <label for="EditarnuevoMontoPrestamo">Monto:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ion ion-logo-usd"></i></span>
                        </div>
                        <input class="form-control" type="text" name="EditarnuevoMontoPrestamo"
                          id="EditarnuevoMontoPrestamo" autocomplete="off" placeholder="0,000.00">

                      </div>
                    </div>
                    <input class="form-control is-invalid" type="hidden" name="EditarMontoPrestamo"
                      id="EditarMontoPrestamo" autocomplete="off" readonly="" required>
                  </div>

                  <!--ENTRADA PARA EDITAR FECHA DE REGISTRO -->

                  <div class=" col-md-4  ">
                    <div class="form-group   ">
                      <label for="EditarFechaPrestamo">Fecha de Registro:</label>

                      <div class="input-group date" id="EditarFechaPrestamo" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#EditarFechaPrestamo"
                          name="EditarFechaPrestamo" id="EditarFechaPrestamo" readonly="" />
                        <div class="input-group-append" data-target="#EditarFechaPrestamo" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>

                    </div>
                    <!--/form-group-->
                    <input class="form-control is-invalid" type="hidden" name="EditaridPrestamo" id="EditaridPrestamo"
                      readonly="" required>
                  </div>

                  <!--ENTRADA PARA EDITAR ESTATUS DE PRESTAMO-->
                  <div class="col-md-5">
                    <div class="form-group  ">

                      <label for="EditarEstatus">Estatus:</label>
                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-check-square-o "></i></span>
                        </div>

                        <select class="form-control  " name="EditarEstatus" id="EditarEstatus" required="">
                          <option value="">Seleccionar...</option>
                          <option value="Autorizado">Autorizado</option>
                          <!-- <option value="Aplicado" >Aplicar Préstamo</option> -->
                        </select>

                      </div>
                      <!-- class="input-group" -->
                    </div>
                    <!-- class="form-group" -->
                  </div>
                  <!-- /"col-md-5" -->

                </div>
              </div>

              <!--=====================================
        PIE DEL MODAL
        ======================================-->

              <div class="modal-footer">
                <button type="button" id="CancelarEditar-Prestamos" class="btn btn-outline-danger "
                  data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancelar</button>

                <button type="submit" id="btnActualizarEditar" class="btn btn-outline-success"><i class="fa fa-refresh"
                    aria-hidden="true"></i>&nbsp;Actualizar</button>
              </div>

              <?php 

        $EditarPrestamo = new ControladorPrestamos();
        $EditarPrestamo -> ctrEditarPrestamo();

        ?>

            </form>

          </div>
          <!-- /fin card-header -->
        </div>
        <!-- /fin modal-body  modal-lg-->
      </div>
      <!-- /fin modal-content-->
    </div>
    <!-- /fin modal-dialog modal-lg-->
  </div>
  <!-- /finmodal fade bd-example-modal-lg-->

  <!--=====================================
MODAL APLICAR PRESTAMO 
======================================-->
  <div class="modal fade bd-example-modal-lg" id="modalAplicarPrestamo" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

        <!--=====================================
CABEZA DEL MODAL APLICAR PRESTAMO
======================================-->

        <div class="modal-header modal-header-info">

          <h5 class="modal-title text-ligth" id="exampleModalLabel"><i class="fa fa-check-square-o fa-lg"
              aria-hidden="true"></i>&nbsp; Aplicar - Préstamo &nbsp;</h5>

          <div class="form-group  ">
            <div class="input-group  input-group-sm  ">

              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-barcode"></i></span>
              </div>

              <input type="text" name="BarCodePrestamoAplicarId" id="BarCodePrestamoAplicarId" class="form-control"
                size="1" readonly="">

            </div>
          </div>
          <!--/form-group -->

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!--=====================================
CUERPO DEL MODAL APLICAR PRESTAMO
======================================-->

        <div class="modal-body  modal-lg">

          <div class="card-header  ">

            <form method="post" name="registrationForm-AplicarPrestamo" id="registrationForm-AplicarPrestamo"
              enctype="multipart/form-data">

              <!--AQUI-->

              <div class="form-group card-body callout callout-info ">

                <div class="row seccion1">

                  <div class=" col-md-3  ">

                    <!-- ENTRADA PARA BUSCAR Y CAPTURAR TRABAJADOR -->
                    <div class="form-group  ">
                      <label for="EditarAplicarbuscaTrabajador">Buscar:</label>

                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-search "></i></span>
                        </div>

                        <select class="form-control  " name="EditarAplicarbuscaTrabajador"
                          id="EditarAplicarbuscaTrabajador" disabled>
                          <option value=""># Empleado</option>

                          <?php

                      $item = null;
                      $valor = null;

                      $mostrarTrabajador = ControladorTrabajadores::ctrMostrarTrabajadoresTipoSindicalizados($item, $valor);

                      foreach ($mostrarTrabajador as $key => $value) {

                        echo '<option value="'.$value["id_trabajador"].'">'.$value["num_empleado"].'</option>';
                      }

                      ?>

                        </select>

                        </select>

                      </div>
                    </div>
                    <input type="hidden" name="EditarAplicarTrabajadorId" id="EditarAplicarTrabajadorId"
                      class="form-control form-control is-invalid" readonly="">
                  </div>

                  <!-- ENTRADA PARA MOSTRAR NOMBRE DEL TRABAJADOR -->
                  <div class=" col-md-6 pl-3">
                    <div class="form-group  ">
                      <label for="EditarAplicarnomTrabajador">Empleado:</label>

                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-user "></i></span>
                        </div>
                        <input type="text" name="EditarAplicarnomTrabajador" id="EditarAplicarnomTrabajador"
                          class="form-control" placeholder="Empleado" readonly="">

                      </div>
                    </div>
                  </div>

                  <!-- ENTRADA PARA MOSTRAR TIPO DE EMPLEADO DEL TRABAJADOR -->
                  <div class=" col-md-3  ">
                    <div class="form-group  ">
                      <label for="EditarAplicartipoEmpleado">Tipo Empleado:</label>

                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-id-card-o "></i></span>
                        </div>
                        <input type="text" name="EditarAplicartipoEmpleado" id="EditarAplicartipoEmpleado"
                          class="form-control" placeholder="Tipo" readonly="">

                      </div>
                    </div>
                  </div>

                </div>
                <!--en row-->

              </div>

              <!--ENTRADA PARA EDITAR TIPO DE PRESTAMO-->

              <div class="form-group card-body callout callout-warning mt-5 OcultarSeccion2">

                <div class="row ">

                  <!-- ENTRADA PARA SELECCIONAR TIPO DE CATEGORIA -->
                  <div class=" col-md-5  ">

                    <div class="form-group  ">
                      <label for="buscarEditarAplicarPrestamo">Tipo de Préstamo:</label>
                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-search "></i></span>
                        </div>

                        <select class="form-control  " name="buscarEditarAplicarPrestamo"
                          id="buscarEditarAplicarPrestamo" required="" disabled>
                          <option value="">Tipo de Préstamo</option>

                          <?php

                  $item = null;
                  $valor = null;

                  $mostrarTipoPrestamo = ControladorPrestamos::ctrMostrarTipoPrestamo($item, $valor);

                  foreach ($mostrarTipoPrestamo as $key => $value) {

                    echo '<option value="'.$value["prestamo"].'">'.$value["prestamo"].'</option>';
                  }
                  
                  ?>

                        </select>

                      </div>
                    </div>

                    <input type="hidden" name="EditarAplicarPrestamo" id="EditarAplicarPrestamo"
                      class="form-control form-control is-invalid" readonly="" placeholder="EditarAplicarPrestamo"
                      required>
                    <input type="hidden" name="EditarAplicarprestamoId" id="EditarAplicarprestamoId"
                      class="form-control form-control is-invalid" readonly="" placeholder="EditarAplicarprestamoId"
                      required>

                  </div>

                  <!--ENTRADA PARA EDITAR MONTO -->

                  <div class=" col-md-3 pl-4  ">
                    <div class="form-group  ">
                      <label for="EditarAplicarnuevoMontoPrestamo">Monto:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ion ion-logo-usd"></i></span>
                        </div>
                        <input class="form-control" type="text" name="EditarAplicarnuevoMontoPrestamo"
                          id="EditarAplicarnuevoMontoPrestamo" autocomplete="off" placeholder="0,000.00" readonly="">

                      </div>
                    </div>
                    <input class="form-control is-invalid" type="hidden" name="EditarAplicarMontoPrestamo"
                      id="EditarAplicarMontoPrestamo" autocomplete="off" required readonly=""
                      placeholder="EditarAplicarMontoPrestamo">
                  </div>

                  <!--ENTRADA PARA EDITAR FECHA DE REGISTRO -->

                  <div class=" col-md-4  ">
                    <div class="form-group   ">
                      <label for="EditarAplicarFechaPrestamo">Fecha de Aplicación:</label>

                      <div class="input-group date" id="EditarAplicarFechaPrestamo" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input"
                          data-target="#EditarAplicarFechaPrestamo" name="EditarAplicarFechaPrestamo"
                          id="EditarAplicarFechaPrestamo" readonly="" />
                        <div class="input-group-append" data-target="#EditarAplicarFechaPrestamo"
                          data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>

                    </div>
                    <!--/form-group-->
                    <input class="form-control is-invalid" type="hidden" name="EditarAplicaridPrestamo"
                      id="EditarAplicaridPrestamo" required placeholder="EditarAplicaridPrestamo" readonly="">
                  </div>
                  <input type="hidden" name="CapturistaEditarAplicaPrestamo" value="<?php  echo $_SESSION["nombre"]; ?>"
                    class="form-control is-invalid" required readonly="CapturistaEditarAplicaPrestamo">

                  <!--ENTRADA PARA EDITAR ESTATUS DE PRESTAMO-->
                  <div class="col-md-5">
                    <div class="form-group  ">

                      <label for="EditarAplicarEstatus">Estatus:</label>
                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-check-square-o "></i></span>
                        </div>

                        <select class="form-control  " name="EditarAplicarEstatus" id="EditarAplicarEstatus"
                          required="">
                          <option value="">Seleccionar...</option>
                          <!-- <option value="Autorizado" >Autorizado</option> -->
                          <option value="Aplicado">Aplicar Préstamo</option>
                        </select>

                      </div>
                      <!-- class="input-group" -->
                    </div>
                    <!-- class="form-group" -->
                  </div>
                  <!-- /"col-md-5" -->

                </div>
              </div>

              <!--=====================================
        PIE DEL MODAL
        ======================================-->

              <div class="modal-footer">
                <button type="button" id="CancelarEditarAplicar-Prestamos" class="btn btn-outline-danger "
                  data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancelar</button>

                <button type="submit" id="btnActualizarAplicar" class="btn btn-outline-success"><i class="fa fa-check"
                    aria-hidden="true"></i>&nbsp;Aplicar</button>
              </div>

              <?php 

        $EditarAplicarPrestamo = new ControladorPrestamos();
        $EditarAplicarPrestamo -> ctrEditarAplicarPrestamo();

        ?>

            </form>

          </div>
          <!-- /fin card-header -->
        </div>
        <!-- /fin modal-body  modal-lg-->
      </div>
      <!-- /fin modal-content-->
    </div>
    <!-- /fin modal-dialog modal-lg-->
  </div>
  <!-- /finmodal fade bd-example-modal-lg-->

<!--=====================================
MODAL ENTREGAR PRESTAMO
======================================-->

  <div class="modal fade bd-example-modal-lg" id="modalEntregarPrestamo" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

<!--=====================================
CABEZA DEL MODAL ENTREGAR PRESTAMO
======================================-->

        <div class="modal-header modal-header-success">

          <h5 class="modal-title text-ligth" id="exampleModalLabel"><i class="fa fa-arrow-right"
              aria-hidden="true"></i>&nbsp; Entregar - Préstamo &nbsp;</h5>

          <div class="form-group  ">
            <div class="input-group  input-group-sm  ">

              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-barcode"></i></span>
              </div>

              <input type="text" name="BarCodePrestamoEntregarId" id="BarCodePrestamoEntregarId" class="form-control"
                size="1" readonly="">

            </div>
          </div>
          <!--/form-group -->

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <!--=====================================
CUERPO DEL MODAL ENTREGAR PRESTAMO
======================================-->
        <div class="modal-body  modal-lg">

          <div class="card-header  ">

            <form method="post" name="registrationForm-EntregarPrestamo" id="registrationForm-EntregarPrestamo"
              enctype="multipart/form-data">

              <!--AQUI-->
              <div class="form-group card-body callout callout-success ">

                <div class="row seccion1">

                  <div class=" col-md-3">

                    <!-- ENTRADA PARA BUSCAR Y CAPTURAR TRABAJADOR -->
                    <div class="form-group  ">
                      <label for="EditarEntregarbuscaTrabajador">Buscar:</label>

                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-search "></i></span>
                        </div>

                        <select class="form-control  " name="EditarEntregarbuscaTrabajador"
                          id="EditarEntregarbuscaTrabajador" disabled>
                          <option value=""># Empleado</option>

                          <?php

                      $item = null;
                      $valor = null;

                      $mostrarTrabajador = ControladorTrabajadores::ctrMostrarTrabajadoresTipoSindicalizados($item, $valor);

                      foreach ($mostrarTrabajador as $key => $value) {

                        echo '<option value="'.$value["id_trabajador"].'">'.$value["num_empleado"].'</option>';
                      }

                      ?>

                        </select>

                        </select>

                      </div>
                    </div>
                    <input type="hidden" name="EditarEntregarTrabajadorId" id="EditarEntregarTrabajadorId"
                      class="form-control form-control is-invalid" readonly="">
                  </div>
                <!--  /col-md-3 -->

                  <!-- ENTRADA PARA MOSTRAR NOMBRE DEL TRABAJADOR -->
                  <div class="col-md-6 pl-3">
                    <div class="form-group  ">
                      <label for="EditarEntregarnomTrabajador">Empleado:</label>

                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-user "></i></span>
                        </div>
                        <input type="text" name="EditarEntregarnomTrabajador" id="EditarEntregarnomTrabajador"
                          class="form-control" placeholder="Empleado" readonly="">

                      </div>
                    </div>
                  </div>
                <!--  /col-md-6 pl-3 -->

                  <!-- ENTRADA PARA MOSTRAR TIPO DE EMPLEADO DEL TRABAJADOR -->
                  <div class="col-md-3">
                    <div class="form-group  ">
                      <label for="EditarEntregartipoEmpleado">Tipo Empleado:</label>

                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-id-card-o "></i></span>
                        </div>
                        <input type="text" name="EditarEntregartipoEmpleado" id="EditarEntregartipoEmpleado"
                          class="form-control" placeholder="Tipo" readonly="">

                      </div>
                    </div>
                  </div>
                <!--  col-md-3 -->

                </div>
                <!--en row-->

              </div>

              <!--ENTRADA PARA EDITAR CAMBIO DE CATEGORIA-->

              <div class="form-group card-body callout callout-warning mt-5 OcultarSeccion2">

                <div class="row ">

                  <!-- ENTRADA PARA SELECCIONAR TIPO DE PRESTAMO -->
                  <div class="col-md-5">

                    <div class="form-group  ">
                      <label for="buscarEditarEntregarrPrestamo">Tipo de Préstamo:</label>
                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-search "></i></span>
                        </div>

                        <select class="form-control  " name="buscarEditarEntregarPrestamo"
                          id="buscarEditarEntregarPrestamo" required="" disabled>
                          <option value="">Tipo de Préstamo</option>

                          <?php

                            $item = null;
                            $valor = null;

                            $mostrarTipoPrestamo = ControladorPrestamos::ctrMostrarTipoPrestamo($item, $valor);

                            foreach ($mostrarTipoPrestamo as $key => $value) {

                              echo '<option value="'.$value["prestamo"].'">'.$value["prestamo"].'</option>';
                            }
                        ?>

                        </select>

                      </div>
                    <!--  /input-group -->
                    </div>
                    <!--/form-group -->

                    <input type="hidden" name="EditarEntregarPrestamo" id="EditarEntregarPrestamo"
                      class="form-control form-control is-invalid" readonly="" placeholder="EditarEntregarPrestamo"
                      required>
                    <input type="hidden" name="EditarAplicarprestamoId" id="EditarEntregarprestamoId"
                      class="form-control form-control is-invalid" readonly="" placeholder="EditarEntregarprestamoId"
                      required>

                  </div>
                  <!-- /col-md-5 -->

                  <!--ENTRADA PARA EDITAR MONTO -->

                  <div class="col-md-3 pl-4">
                    <div class="form-group  ">
                      <label for="EditarEntregarnuevoMontoPrestamo">Monto:</label>
                      <div class="input-group">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ion ion-logo-usd"></i></span>
                        </div>
                        <input class="form-control" type="text" name="EditarEntregarnuevoMontoPrestamo"
                          id="EditarEntregarnuevoMontoPrestamo" autocomplete="off" placeholder="0,000.00" readonly="">

                      </div>
                      <!--/input-group-->
                    </div>
                    <!--/form-group-->

                    <input class="form-control is-invalid" type="hidden" name="EditarEntregarMontoPrestamo"
                      id="EditarEntregarMontoPrestamo" autocomplete="off" required readonly=""
                      placeholder="EditarEntregarMontoPrestamo">
                  </div>
                <!--/col-md-3 pl-4  -->

                  <!--ENTRADA PARA EDITAR FECHA DE REGISTRO -->

                  <div class=" col-md-4  ">
                    <div class="form-group   ">
                      <label for="EditarEntregarFechaPrestamo">Fecha de Aplicación:</label>

                      <div class="input-group date" id="EditarEntregarFechaPrestamo" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input"
                          data-target="#EditarEntregarFechaPrestamo" name="EditarEntregarFechaPrestamo"
                          id="EditarEntregarFechaPrestamo" readonly="" />
                        <div class="input-group-append" data-target="#EditarEntregarFechaPrestamo"
                          data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>

                    </div>
                    <!--/form-group-->

                    <input class="form-control is-invalid" type="hidden" name="EditarEntregaridPrestamo"
                      id="EditarEntregaridPrestamo" required placeholder="EditarEntregaridPrestamo" readonly="">
                  </div>
                  <!--/col-md-4-->

                  <!-- INPUT OCULTO -->
                  <input type="hidden" name="CapturistaEditarEntregarPrestamo"
                    value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control is-invalid" required
                    readonly="CapturistaEditarEntregarPrestamo">
                  <!-- /INPUT OCULTO -->

                  <!--ENTRADA PARA EDITAR ESTATUS DE PRESTAMO-->
                  <div class="col-md-5">
                    <div class="form-group  ">

                      <label for="EditarEntregarEstatus">Estatus:</label>
                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-check-square-o "></i></span>
                        </div>

                        <select class="form-control  " name="EditarEntregarEstatus" id="EditarEntregarEstatus"
                          required="">
                          <option value="">Seleccionar...</option>
                          <!-- <option value="Autorizado" >Autorizado</option> -->
                          <option value="Entregado">Entregar Préstamo</option>
                        </select>

                      </div>
                      <!-- class="input-group" -->
                    </div>
                    <!-- class="form-group" -->
                  </div>
                  <!-- /"col-md-5" -->

                </div>
              </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

              <div class="modal-footer">
                <button type="button" id="CancelarEditarEntregar-Prestamos" class="btn btn-outline-danger "
                  data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancelar</button>

                <button type="submit" id="btnActualizarEntregar" class="btn btn-outline-success"><i class="fa fa-check"
                    aria-hidden="true"></i>&nbsp;Entregar</button>
              </div>

              <?php 

                $EditarEntregarPrestamo = new ControladorPrestamos();
                $EditarEntregarPrestamo -> ctrEditarEntregarPrestamo();

              ?>

            </form>

          </div>
          <!-- /fin card-header -->
        </div>
        <!-- /fin modal-body  modal-lg-->
      </div>
      <!-- /fin modal-content-->
    </div>
    <!-- /fin modal-dialog modal-lg-->
  </div>
  <!-- /finmodal fade bd-example-modal-lg-->

<!--=====================================
MODAL CANCELAR PRESTAMO
======================================-->

  <div class="modal fade bd-example-modal-lg" id="modalCancelarPrestamo" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

        <!--=====================================
CABEZA DEL MODAL CANCELAR PRESTAMO
======================================-->

        <div class="modal-header modal-header-danger">

          <h5 class="modal-title text-ligth" id="exampleModalLabel"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;
            Cancelar - Préstamo &nbsp;</h5>

          <div class="form-group  ">
            <div class="input-group  input-group-sm  ">

              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-barcode"></i></span>
              </div>

              <input type="text" name="BarCodePrestamoCancelarId" id="BarCodePrestamoCancelarId" class="form-control"
                size="1" readonly="">

            </div>
          </div>
          <!--/form-group -->

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <!--=====================================
CUERPO DEL MODAL CANCELAR PRESTAMO
======================================-->
        <div class="modal-body  modal-lg">

          <div class="card-header  ">
            <form method="post" name="registrationForm-CancelarPrestamo" id="registrationForm-CancelarPrestamo">

              <div class="form-group card-body callout callout-default ">

                <div class="row seccion1">

                  <div class=" col-md-3  ">

                    <!-- ENTRADA PARA BUSCAR Y CAPTURAR TRABAJADOR -->
                    <div class="form-group  ">
                      <label for="EditarCancelarbuscaTrabajador">Buscar:</label>

                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-search "></i></span>
                        </div>

                        <select class="form-control  " name="EditarCancelarbuscaTrabajador"
                          id="EditarCancelarbuscaTrabajador" disabled>
                          <option value=""># Empleado</option>

                          <?php

                      $item = null;
                      $valor = null;

                      $mostrarTrabajador = ControladorTrabajadores::ctrMostrarTrabajadoresTipoSindicalizados($item, $valor);

                      foreach ($mostrarTrabajador as $key => $value) {

                        echo '<option value="'.$value["id_trabajador"].'">'.$value["num_empleado"].'</option>';
                      }

                      ?>

                        </select>

                      </div>
                      <!-- input-group -->
                    </div>
                    <!-- form-group -->
                    <input type="hidden" name="EditarCancelarTrabajadorId" id="EditarCancelarTrabajadorId"
                      class="form-control form-control is-invalid" readonly="">
                  </div>

                  <!-- ENTRADA PARA MOSTRAR NOMBRE DEL TRABAJADOR -->
                  <div class=" col-md-6 pl-3">
                    <div class="form-group  ">
                      <label for="EditarCancelarnomTrabajador">Empleado:</label>

                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-user "></i></span>
                        </div>
                        <input type="text" name="EditarCancelarnomTrabajador" id="EditarCancelarnomTrabajador"
                          class="form-control" placeholder="Empleado" readonly="">

                      </div>
                    </div>
                  </div>

                  <!-- ENTRADA PARA MOSTRAR TIPO DE EMPLEADO DEL TRABAJADOR -->
                  <div class="col-md-3">
                    <div class="form-group  ">
                      <label for="EditarCancelartipoEmpleado">Tipo Empleado:</label>

                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-id-card-o "></i></span>
                        </div>
                        <input type="text" name="EditarCancelartipoEmpleado" id="EditarCancelartipoEmpleado"
                          class="form-control" placeholder="Tipo" readonly="">
                      </div>

                    </div>
                    <!--form-group-->
                  </div>
                  <!--col-md-3 -->

                </div>
                <!--end row seccion1-->

              </div>
              <!-- form-group card-body callout callout-default -->

              <div class="form-group card-body callout callout-default">

                <div class="row ">

                  <!-- ENTRADA PARA SELECCIONAR TIPO DE PRESTAMO -->
                  <div class=" col-md-5">

                    <div class="form-group  ">
                      <label for="buscarCancelaPrestamo">Tipo de Préstamo:</label>
                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-search "></i></span>
                        </div>

                        <select class="form-control  " name="buscarCancelaPrestamo" id="buscarCancelaPrestamo"
                          required="" disabled>
                          <option value="">Tipo de Préstamo</option>

                          <?php

                              $item = null;
                              $valor = null;

                              $mostrarTipoPrestamo = ControladorPrestamos::ctrMostrarTipoPrestamo($item, $valor);

                              foreach ($mostrarTipoPrestamo as $key => $value) {

                                echo '<option value="'.$value["prestamo"].'">'.$value["prestamo"].'</option>';
                              }
                            
                            ?>

                        </select>

                      </div>
                    </div>

                    <input type="hidden" name="EditarCancelarPrestamo" id="EditarCancelarPrestamo"
                      class="form-control form-control is-invalid" readonly="" placeholder="EditarCancelarPrestamo"
                      required>
                    <input type="hidden" name="EditarCancelarprestamoId" id="EditarCancelarprestamoId"
                      class="form-control form-control is-invalid" readonly="" placeholder="EditarCancelarprestamoId"
                      required>

                  </div>
                  <!-- FIN PARA SELECCIONAR TIPO DE PRESTAMO -->

                  <!--ENTRADA PARA EDITAR MONTO -->
                  <div class=" col-md-3 pl-4  ">
                    <div class="form-group  ">
                      <label for="EditarCancelarnuevoMontoPrestamo">Monto:</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ion ion-logo-usd"></i></span>
                        </div>
                        <input class="form-control" type="text" name="EditarCancelarnuevoMontoPrestamo"
                          id="EditarCancelarnuevoMontoPrestamo" autocomplete="off" placeholder="0,000.00" readonly="">

                      </div>
                    </div>
                    <input class="form-control is-invalid" type="hidden" name="EditarCancelarMontoPrestamo"
                      id="EditarCancelarMontoPrestamo" autocomplete="off" required readonly=""
                      placeholder="EditarCancelarMontoPrestamo">
                  </div>
                  <!--FIN PARA EDITAR MONTO -->

                  <!--ENTRADA PARA EDITAR FECHA DE REGISTRO -->
                  <div class=" col-md-4  ">
                    <div class="form-group   ">
                      <label for="EditarCancelarFechaPrestamo">Fecha de Aplicación:</label>
                      <div class="input-group date" id="EditarCancelarFechaPrestamo" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input"
                          data-target="#EditarCancelarFechaPrestamo" name="EditarCancelarFechaPrestamo"
                          id="EditarCancelarFechaPrestamo" readonly="" />
                        <div class="input-group-append" data-target="#EditarCancelarFechaPrestamo"
                          data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>

                    </div>
                    <!--/form-group-->

                    <input class="form-control is-invalid" type="hidden" name="EditarCancelaridPrestamo"
                      id="EditarCancelaridPrestamo" required placeholder="EditarCancelaridPrestamo" readonly="">
                  </div>
                  <!--FIN PARA EDITAR FECHA DE REGISTRO -->

                  <input type="hidden" name="CapturistaCancelarEntregarPrestamo"
                    value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control is-invalid" required
                    readonly="CapturistaCancelarEntregarPrestamo">

                  <!--ENTRADA PARA LA DESCRIPCION-->
                  <div class=" col-md-12 pr-4 pl-3 ">

                    <div class="form-group">

                      <label for="nuevoCancelarMotivo">Motivo de Cancelación:</label>

                      <textarea class="form-control" id="nuevoCancelarMotivo" name="nuevoCancelarMotivo"
                        placeholder="Descripción..." rows="3" autocomplete="off" autofocus="true"></textarea>

                    </div>
                    <!--/form-group -->

                  </div>

                  <!--ENTRADA PARA EDITAR ESTATUS DE PRESTAMO-->
                  <div class="col-md-5">
                    <div class="form-group  ">

                      <label for="EditarCancelarEstatus">Estatus:</label>
                      <div class="input-group">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-check-square-o "></i></span>
                        </div>

                        <select class="form-control  " name="EditarCancelarEstatus" id="EditarCancelarEstatus"
                          required="">
                          <option value="">Seleccionar...</option>
                          <!-- <option value="Autorizado" >Autorizado</option> -->
                          <option value="Cancelado">Cancelar Préstamo</option>
                        </select>

                      </div>
                      <!-- class="input-group" -->
                    </div>
                    <!-- class="form-group" -->
                  </div>
                  <!-- /"col-md-5" -->
                  <!--END ENTRADA PARA EDITAR ESTATUS DE PRESTAMO-->

                </div>
                <!--EN ROW-->
              </div>
              <!-- form-group card-body callout callout-default -->

              <!--=====================================
        PIE DEL MODAL
        ======================================-->

              <div class="modal-footer">
                <button type="button" id="CancelarEditarCancelar-Prestamos" class="btn btn-outline-danger "
                  data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cerrar</button>

                <button type="submit" id="btnActualizarCancelar" class="btn btn-outline-success"><i class="fa fa-check"
                    aria-hidden="true"></i>&nbsp;Cancelar Préstamo</button>
              </div>

              <?php 

        $CancelarPrestamo = new ControladorPrestamos();
        $CancelarPrestamo -> ctrCancelarPrestamo();

        ?>

            </form>

          </div>
          <!-- /fin card-header -->
        </div>
        <!-- /fin modal-body  modal-lg-->
      </div>
      <!-- /fin modal-content-->
    </div>
    <!-- /fin modal-dialog modal-lg-->
  </div>
  <!-- /finmodal fade bd-example-modal-lg-->

</body>
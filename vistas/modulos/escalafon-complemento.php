
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
          <div class="col-sm-6">
            <h1>&nbsp;Escalafon - Complemento</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Escalafon</li>
              <li class="breadcrumb-item active">Complemento</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column  buttom-->
          <div>
          <button type="button" class="btn btn-primary btnAgregarComplemento" data-toggle="modal" data-target="#modalAgregarComplemento"><i class="fa fa-plus nav-icon"></i>&nbsp;
            Agregar Registro
          </button>
        </div>
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <section class="account-content">
      <div class="card-body">
        <table class="table TablaComplemento display  table-hover table-striped table-bordered dt-responsive nowrap"  style="width:100%">
          <thead>
            <tr>

            <th>Id</th>
            <th>Nº Empleado</th>
            <th>Nombre del Trabajador</th>
            <th>Adscripción</th>
            <th>Movimiento </th>
            <th>Monto </th>
            <th>Fecha de Movimiento</th>
            <th>Acciones</th>

            </tr>
          </thead>

        </table>
      </div>

    </section>
</div>



<!--=====================================

MODAL AGREGAR NUEVO APOYO DE TRANSPORTE

======================================-->

<div class="modal fade bd-example-modal-lg" id="modalAgregarComplemento"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

      <div class="modal-header modal-header-primary">

        <h5 class="modal-title text-ligth" id="exampleModalLabel"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>&nbsp; Agregar - Complemento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

      <div class="modal-body  modal-lg">

        <div class="card-header  ">

          <form  method="post" name="registrationForm-Complemento" id ="registrationForm-Complemento"   enctype="multipart/form-data">

            <!--AQUI-->

            <!--SECCION 1-->

            <div class="form-group card-body callout callout-success ">

              <div class="row seccion1">

                <div class=" col-md-3  ">

                  <!-- ENTRADA PARA EL CAPTURISTA DE REGISTROS -->
                  <input type="hidden" name="Capturista-Complemento" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >

                  <!-- ENTRADA PARA BUSCAR Y CAPTURAR TRABAJADOR -->
                  <div class="form-group ">
                    <label for="buscaTrabajador">Buscar:</label>
                    
                    <div class="input-group ">

                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search "></i></span>
                      </div>

                      <select class="form-control  " name="buscaTrabajador" id="buscaTrabajador" required="" >
                          <option value="" ># Empleado</option>

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
                  
                        <input type="hidden" name="trabajadorId" id="trabajadorId" class="form-control" readonly=""   >
                </div> 

                

                <!-- ENTRADA PARA MOSTRAR NOMBRE DEL TRABAJADOR -->
                <div class=" col-md-6 pl-3">
                  <div class="form-group  ">
                    <label for="nomTrabajador">Empleado:</label>
                    
                    <div class="input-group ">

                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user "></i></span>
                      </div>
                        <input type="text" name="nomTrabajador" id="nomTrabajador" class="form-control" placeholder="Empleado" readonly=""  >
                    
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
                        <input type="text" name="tipoEmpleado" id="tipoEmpleado" class="form-control" placeholder="Tipo" readonly="" >
                    
                      </div>
                  </div>
                </div> 

              </div> <!--en row-->

            </div>


            <!--ENTRADA PARA AGREGAR APOYO DE TRANSPORTE-->
            <!--SECCION 2-->

            <div class="form-group card-body callout callout-warning mt-5 OcultarSeccion2">
              <div class="row">

                <!-- ENTRADA PARA SELECCIONAR TIPO DE CATEGORIA -->
                <div class=" col-md-5  ">

                  <!-- ENTRADA PARA EL CAPTURISTA DE REGISTROS -->
                  <input type="hidden" name="Capturista-Complemento" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >
                  <div class="form-group  ">
                  <label for="nuevoComplemento">Descripción:</label>
                  <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-tags"></i></span>
                        </div>

                        <input type="text" name="nuevoComplemento" id="nuevoComplemento" class="form-control" value="Complemento" readonly="" >

                    
                  </div>
                  </div>
                  
                </div>

            


                <!--ENTRADA PARA AGREGAR MONTO EN APOYO DE TRANSPORTE-->

                <div class=" col-md-3 pl-4  ">
                  <div class="form-group  ">
                    <label for="nuevoMontoComplemento">Monto:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ion ion-logo-usd"></i></span>
                      </div>
                      <input class="form-control" type="text"  name="nuevoMontoComplemento" id="nuevoMontoComplemento" autocomplete="off" placeholder="0,000.00" >

                    

                    </div>
                  </div>
                  <input class="form-control" type="hidden"  name="MontoComplemento" id="MontoComplemento" autocomplete="off" >
                </div> 


                <!--ENTRADA PARA AGREGAR FECHA DE REGISTRO EN APOYO DE TRANSPORTE-->

                <div class=" col-md-4  ">
                  <div class="form-group  ">
                    <label for="nuevoFechaComplemento">Fecha de Registro:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                      <input class="form-control" type="date"  name="nuevoFechaComplemento" id="nuevoFechaComplemento"  >
                    </div>
                  </div>
                </div> 


              </div>
            </div> 

        

          <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">

            <!--   <button type="button" id="CancelarRegrescar-ApoyoTransporte" class="btn btn-outline-info " data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Refrescar</button> -->
          
              <button type="button" id="CancelarAgregar-Complemento" class="btn btn-outline-danger " data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancelar</button>

              <button type="submit" id="btnGuardar" class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Guardar</button>
            </div>


          <?php 

            $CrearComplemento = new Controlador_Complemento();
            $CrearComplemento -> ctr_CrearComplemento();

            ?>  

      </form>

    </div>

      </div>
      
    </div>
  </div>
</div>



<!--=====================================

MODAL EDITAR NUEVO APOYO DE TRANSPORTE

======================================-->


<div class="modal fade bd-example-modal-lg" id="modalEditarComplemento"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

      <div class="modal-header modal-header-primary">

        <h5 class="modal-title text-ligth" id="exampleModalLabel"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>&nbsp; Editar - Complemento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

      <div class="modal-body  modal-lg">

        <div class="card-header  ">

          <form  method="post" name="registrationForm-EditarComplemento" id ="registrationForm-EditarComplemento"   enctype="multipart/form-data">

            <!--AQUI-->

            <div class="form-group card-body callout callout-success ">

              <div class="row seccion1">


                <div class=" col-md-3  ">

                  <!-- ENTRADA PARA EDITAR EL CAPTURISTA DE REGISTROS -->
                  <input type="hidden" name="Capturista-EditarComplemento" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >

                  <!-- ENTRADA PARA BUSCAR Y CAPTURAR TRABAJADOR -->
                  <div class="form-group  ">
                    <label for="EditarbuscaTrabajador">Buscar:</label>
                    
                    <div class="input-group ">

                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search "></i></span>
                      </div>

                      <select class="form-control  " name="EditarbuscaTrabajador" id="EditarbuscaTrabajador" >
                          <option value="" ># Empleado</option>

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

                        <input type="hidden" name="EditartrabajadorId" id="EditartrabajadorId" class="form-control"   >
                      </div>
                  </div>

                </div> 

                <!-- ENTRADA PARA MOSTRAR NOMBRE DEL TRABAJADOR -->
                <div class=" col-md-6 pl-3">
                  <div class="form-group  ">
                    <label for="EditarnomTrabajador">Empleado:</label>
                    
                    <div class="input-group ">

                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user "></i></span>
                      </div>
                        <input type="text" name="EditarnomTrabajador" id="EditarnomTrabajador" class="form-control" placeholder="Empleado" readonly="" >
                    
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
                        <input type="text" name="EditartipoEmpleado" id="EditartipoEmpleado" class="form-control" placeholder="Tipo" readonly="" >
                    
                      </div>
                  </div>
                </div> 

              </div> <!--en row-->

            </div>


            <!--ENTRADA PARA EDITAR APOYO DE TRANSPORTE-->

            <div class="form-group card-body callout callout-warning mt-5 OcultarSeccion2">

              <div class="row ">

                <!-- ENTRADA PARA SELECCIONAR TIPO DE CATEGORIA -->
                <div class=" col-md-5  ">

                  <!-- ENTRADA PARA EL CAPTURISTA DE REGISTROS -->
                  <input type="hidden" name="Capturista-EditarComplemento" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >
                  <div class="form-group  ">
                  <label for="EditarComplemento">Descripción:</label>
                  <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-tags"></i></span>
                        </div>

                        <input type="text" name="EditarComplemento" id="EditarComplemento" class="form-control"  readonly="" >

                      
                  </div>
                  </div>
                  
                </div>

            


                <!--ENTRADA PARA EDITAR MONTO EN APOYO DE TRANSPORTE-->

                <div class=" col-md-3 pl-4  ">
                  <div class="form-group  ">
                    <label for="EditarnuevoMontoComplemento">Monto:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="ion ion-logo-usd"></i></span>
                      </div>
                      <input class="form-control" type="text"  name="EditarnuevoMontoComplemento" id="EditarnuevoMontoComplemento" autocomplete="off" >

                      <input class="form-control" type="hidden"  name="EditarMontoComplemento" id="EditarMontoComplemento" autocomplete="off" >

                    </div>
                  </div>
                </div> 


                <!--ENTRADA PARA EDITAR FECHA DE REGISTRO EN APOYO DE TRANSPORTE-->

                <div class=" col-md-4  ">
                  <div class="form-group  ">
                    <label for="EditarFechaComplemento">Fecha de Registro:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                      <input class="form-control" type="date"  name="EditarFechaComplemento" id="EditarFechaComplemento" >

                        <input type="hidden"  name="idComplemento" id="idComplemento" required>
                    </div>
                  </div>
                </div> 


              </div>
            </div> 

        

          <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">
              <button type="button" id="CancelarEditar-Complemento" class="btn btn-outline-danger " data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancelar</button>

              <button type="submit" id="btnActualizar" class="btn btn-outline-success"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;Actualizar</button>
            </div>

          <?php 

            $EditarComplemento = new Controlador_Complemento();
            $EditarComplemento -> ctr_EditarComplemento();

            ?>  

      </form>

    </div>

      </div>
      
    </div>
  </div>
</div>


</body>



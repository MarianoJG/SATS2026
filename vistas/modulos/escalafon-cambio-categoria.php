
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
          <h1><span><i class="fa fa-tag" aria-hidden="true"></i></span>&nbsp;Escalafon - Cambio de Categoría</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Escalafon</li>
              <li class="breadcrumb-item active">Cambio de Categoría</li>
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
        <div class="pl-3">
          <button type="button" class="btn btn-primary btnAgregarCambioCategoria" data-toggle="modal" data-target="#modalAgregarCambioCategoria"><i class="fa fa-plus nav-icon"></i>&nbsp;
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
      <table class="table TablaCambioCategoria display  table-hover table-striped table-bordered dt-responsive nowrap"  style="width:100%">
        <thead>
          <tr>

            <th>Id</th>
            <th>Nº Empleado</th>
            <th>Nombre del Trabajador</th>
            <th>Adscripción</th>
            <th>Cambio de Categoría </th>
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

MODAL AGREGAR 

======================================-->

<div class="modal fade bd-example-modal-lg" id="modalAgregarCambioCategoria"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">

      <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

    <div class="modal-header modal-header-primary">

      <h5 class="modal-title text-ligth" id="exampleModalLabel"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>&nbsp; Agregar - Cambio de Categoría</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

    <div class="modal-body  modal-lg">

      <div class="card-header  ">

        <form  method="post" name="registrationForm-CambioCategoria" id ="registrationForm-CambioCategoria"   enctype="multipart/form-data">

          <!--AQUI-->

            <!--SECCION 1-->

          <div class="form-group card-body callout callout-success ">

            <div class="row seccion1">

              <div class=" col-md-3  ">

                <!-- ENTRADA PARA EL CAPTURISTA DE REGISTROS -->
                <input type="hidden" name="Capturista-CambioCategoria" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >

                <!-- ENTRADA PARA BUSCAR Y CAPTURAR TRABAJADOR -->
                <div class="form-group ">
                  <label for="buscaTrabajador">Buscar:</label>
                  
                  <div class="input-group ">

                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-search "></i></span>
                    </div>

                      <select class="form-control  " name="buscaTrabajador" id="buscaTrabajador" required=""  >
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


            <!--ENTRADA PARA AGREGAR NUEVO CAMBIO DE CATEGORIA-->
            <!--SECCION 2-->

          <div class="form-group card-body callout callout-warning mt-5 OcultarSeccion2">
            <div class="row seccion2">

              <!-- ENTRADA PARA SELECCIONAR TIPO DE CATEGORIA -->
              <div class=" col-md-5  ">

                <!-- ENTRADA PARA EL CAPTURISTA DE REGISTROS -->
                <input type="hidden" name="Capturista-CambioCategoria" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >
                <div class="form-group  ">
                <label for="nuevoCambioCategoria">Descripción:</label>
                <div class="input-group ">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-search "></i></span>
                  </div>

                  <select class="form-control  " name="nuevoCambioCategoria" id="nuevoCambioCategoria" required="" >
                    <option value="" >Categoría</option>

                    <?php

                    $item = null;
                    $valor = null;

                    $mostrarCategoria = ControladorCombobox::ctrMostrarComboCategorias($item, $valor);

                    foreach ($mostrarCategoria as $key => $value) {

                      echo '<option value="'.$value["categoria"].'">'.$value["categoria"].'</option>';
                    }

                    ?>

                  </select>


                </div>
                </div>
                    <input type="text" name="categoriaId" id="categoriaId" class="form-control" readonly=""   >
              </div>

          


              <!--ENTRADA PARA AGREGAR MONTO CAMBIO DE CATEGORIA-->

              <div class=" col-md-3 pl-4  ">
                <div class="form-group  ">
                  <label for="nuevoMontoCambioCategoria">Monto:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ion ion-logo-usd"></i></span>
                    </div>
                    <input class="form-control" type="text"  name="nuevoMontoCambioCategoria" id="nuevoMontoCambioCategoria" autocomplete="off" placeholder="0,000.00"  >

                    

                  </div>
                </div>
                  <input class="form-control" type="hidden"  name="MontoCambioCategoria" id="MontoCambioCategoria" autocomplete="off" >
              </div> 


                <!--ENTRADA PARA AGREGAR FECHA DE REGISTRO EN APOYO DE TRANSPORTE-->

              <div class=" col-md-4  ">
                <div class="form-group  ">
                  <label for="nuevoFechaCambioCategoria">Fecha de Registro:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input class="form-control" type="date"  name="nuevoFechaCambioCategoria" id="nuevoFechaCambioCategoria"  >
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
          
            <button type="button" id="CancelarAgregar-CambioCategoria" class="btn btn-outline-danger " data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancelar</button>

            <button type="submit" id="btnGuardar" class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Guardar</button>
          </div>


      <?php 

          $CrearCambioCategoria = new Controlador_CambioCategoria();
          $CrearCambioCategoria -> ctr_CrearCambioCategoria();

          ?>  

      </form>

    </div>

    </div>
    
  </div>
</div>
</div>



<!--=====================================

MODAL EDITAR CAMBIO DE CATEGORIA

======================================-->


<div class="modal fade bd-example-modal-lg" id="modalEditarCambioCategoria"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">

      <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

    <div class="modal-header modal-header-primary">

      <h5 class="modal-title text-ligth" id="exampleModalLabel"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>&nbsp; Editar -Cambio de Categoría</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

    <div class="modal-body  modal-lg">

      <div class="card-header  ">

        <form  method="post" name="registrationForm-EditarCambioCategoria" id ="registrationForm-EditarCambioCategoria"   enctype="multipart/form-data">

          <!--AQUI-->

          <div class="form-group card-body callout callout-success ">

            <div class="row seccion1">


              <div class=" col-md-3  ">

                <!-- ENTRADA PARA EDITAR EL CAPTURISTA DE REGISTROS -->
                <input type="hidden" name="Capturista-EditarCambioCategoria" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >

                <!-- ENTRADA PARA BUSCAR Y CAPTURAR TRABAJADOR -->
                <div class="form-group  ">
                  <label for="EditarbuscaTrabajador">Buscar:</label>
                  
                  <div class="input-group ">

                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-search "></i></span>
                    </div>

                      <select class="form-control  " name="EditarbuscaTrabajador" id="EditarbuscaTrabajador" disabled    >
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

                      
                      </div>
                </div>
                        <input type="hidden" name="EditartrabajadorId" id="EditartrabajadorId" class="form-control"   >
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


          <!--ENTRADA PARA EDITAR CAMBIO DE CATEGORIA-->

          <div class="form-group card-body callout callout-warning mt-5 OcultarSeccion2">

            <div class="row ">

              <!-- ENTRADA PARA SELECCIONAR TIPO DE CATEGORIA -->
              <div class=" col-md-5  ">

                <!-- ENTRADA PARA EL CAPTURISTA DE REGISTROS -->
                <input type="hidden" name="Capturista-EditarCambioCategoria" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >
                <div class="form-group  ">
                <label for="buscarEditarCambioCategoria">Descripción:</label>
                <div class="input-group ">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-search "></i></span>
                  </div>

                  <select class="form-control  " name="buscarEditarCambioCategoria" id="buscarEditarCambioCategoria" required="" disabled   >
                    <option value="" >Categoría</option>

                    <?php

                    $item = null;
                    $valor = null;

                    $mostrarTrabajador = ControladorCombobox::ctrMostrarComboCategorias($item, $valor);

                    foreach ($mostrarTrabajador as $key => $value) {

                      echo '<option value="'.$value["categoria"].'">'.$value["categoria"].'</option>';
                    }

                    ?>
                    
                  </select>

                  
                </div>
                </div>

                  <input type="hidden" name="EditarCambioCategoria" id="EditarCambioCategoria" class="form-control" required=""    >
                  <input type="hidden" name="EditarcategoriaId" id="EditarcategoriaId" class="form-control"    >
                  
              </div>

          


              <!--ENTRADA PARA EDITAR MONTO EN APOYO DE TRANSPORTE-->

              <div class=" col-md-3 pl-4  ">
                <div class="form-group  ">
                  <label for="EditarnuevoMontoCambioCategoria">Monto:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ion ion-logo-usd"></i></span>
                    </div>
                    <input class="form-control" type="text"  name="EditarnuevoMontoCambioCategoria" id="EditarnuevoMontoCambioCategoria" autocomplete="off" placeholder="0,000.00" >   

                  </div>
                </div>
                  <input class="form-control" type="hidden"  name="EditarMontoCambioCategoria" id="EditarMontoCambioCategoria" autocomplete="off" required >
              </div> 


                <!--ENTRADA PARA EDITAR FECHA DE REGISTRO CAMBIO DE CATEGORIA-->

              <div class=" col-md-4  ">
                <div class="form-group  ">
                  <label for="EditarFechaCambioCategoria">Fecha de Registro:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input class="form-control" type="date"  name="EditarFechaCambioCategoria" id="EditarFechaCambioCategoria" >

                      
                  </div>
                </div>
                <input type="hidden"  name="idCambioCategoria" id="idCambioCategoria" required>
              </div> 
                
            </div>
          </div> 

      

        <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">
            <button type="button" id="CancelarEditar-CambioCategoria" class="btn btn-outline-danger " data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancelar</button>

            <button type="submit" id="btnActualizar" class="btn btn-outline-success"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp;Actualizar</button>
          </div>

          <?php 

          $EditarCambioCategoria = new Controlador_CambioCategoria();
          $EditarCambioCategoria -> ctr_EditarCambioCategoria();

          ?>  

      </form>

    </div>

    </div>
    
  </div>
</div>
</div>


</body>



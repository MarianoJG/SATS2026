
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
          
          <h1>&nbsp;Actas y Acuerdos - Nuevas Bases </h1>
          <footer class="blockquote-footer text-muted">Datos actualizados  <cite title="Source Title">.</cite></footer>

        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
            <li class="breadcrumb-item active">Actas y Acuerdos</li>
              <li class="breadcrumb-item active">Nuevas Bases </li>
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
          <button type="button" class="btn btn-primary btnAgregarNuevaBase" data-toggle="modal" data-target="#modalAgregarNuevaBase"><i class="fa fa-plus nav-icon"></i>&nbsp;
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
      <table class="table TablaNuevasBases display  table-hover table-striped table-bordered dt-responsive nowrap"  style="width:100%">
        <thead>
          <tr>

            <th>Id</th>
            <th>Nº Empleado</th>
            <th>Nombre del Trabajador</th>
            <th>Adscripción</th>
            <th>Movimiento </th>
            <th>Nuevo Trabajador </th>
            <th>Fecha de Movimiento</th>
            <th>Acciones</th>

          </tr>
        </thead>

      </table>
    </div>

  </section>
</div>



<!--=====================================

MODAL AGREGAR NUEVA BASE (SINDICALIZADO)

======================================-->

<div class="modal fade bd-example-modal-lg" id="modalAgregarNuevaBase"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">

      <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

    <div class="modal-header modal-header-primary">

      <h5 class="modal-title text-ligth" id="exampleModalLabel"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>&nbsp; Agregar - Nueva Base Sindical </h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

    <div class="modal-body  modal-lg">

      <div class="card-header  ">

        <form  method="post" name="registrationForm-NuevaBase" id ="registrationForm-NuevaBase"   enctype="multipart/form-data">

          <!--INFORMACION IMPORTANTE CARD EXPANDABLE-->

          <div class="col-md-12 pb-3">

          <div class="card card-info collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Información Importante!</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">

              <p><em>Solo podras buscar trabajadores por</em>&nbsp; <strong># Empleado</strong>&nbsp; de tipo (Confianza & Eventual).</p>
          
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>


          <!--SECCION 1-->
          <div class="form-group card-body callout callout-success ">

            <div class="row seccion1">

              <div class=" col-md-3  ">

                <!-- ENTRADA PARA EL CAPTURISTA DE REGISTROS -->
                <input type="hidden" name="Capturista-NuevaBase" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >

                <!-- ENTRADA PARA BUSCAR Y CAPTURAR TRABAJADOR -->
                <div class="form-group  ">
                  <label for="buscaTrabajador">Buscar:</label>
                  
                  <div class="input-group ">

                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-search "></i></span>
                    </div>

                      <select class="form-control  " name="buscaTrabajador" id="buscaTrabajador" >
                        <option value="" ># Empleado</option>

                          <?php

                        $item = null;
                        $valor = null;

                        $mostrarTrabajador = ControladorTrabajadores::ctrMostrarTrabajadoresTipoConfianzaEventual($item, $valor);

                        foreach ($mostrarTrabajador as $key => $value) {

                          echo '<option value="'.$value["id_trabajador"].'">'.$value["num_empleado"].'</option>';
                        }

                        ?>

                      </select>

                      
                      </div>
                </div>
                      <input type="hidden" name="trabajadorId" id="trabajadorId" class="form-control"   >
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


          
          <div class="form-group card-body callout callout-warning mt-5 OcultarSeccion2">
            <div class="row">

              
              <div class=" col-md-4  ">

                <!-- ENTRADA PARA EL CAPTURISTA DE REGISTROS -->
                <input type="hidden" name="Capturista-NuevaBase" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >
                <div class="form-group  ">

                    <!--ENTRADA PARA AGREGAR DESCRIPCION: NUEVA BASE SINDICAL-->

                <label for="nuevoNuevaBase">Descripción:</label>
                  <div class="input-group ">

                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-tags"></i></span>
                      </div>

                        <input type="text" name="nuevoNuevaBase" id="nuevoNuevaBase" class="form-control" value="Nueva Base Sindical" readonly="" >

                </div>
                </div>
                
              </div>


                <!--ENTRADA PARA AGREGAR NUEVA ASIGNACIONL-->

                <div class=" col-md-4  ">
  
                <div class="form-group  ">

                <label for="nuevoTipoEmpleado_Sindicalizado">Nueva Asignación:</label>
                  <div class="input-group ">

                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-tags"></i></span>
                      </div>

                      
                        <input type="text" name="nuevoTipoEmpleado_Sindicalizado" id="nuevoTipoEmpleado_Sindicalizado" class="form-control" value="Sindicalizado" readonly="" >

                </div>
                </div>
                
              </div>


  
                <!--ENTRADA PARA AGREGAR FECHA DE REGISTRO -->

              <div class=" col-md-4  ">
                <div class="form-group  ">
                  <label for="nuevoFechaNuevaBase">Fecha de Registro:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input class="form-control" type="date"  name="nuevoFechaNuevaBase" id="nuevoFechaNuevaBase" >
                  </div>
                </div>
              </div> 


            </div>
          </div> 

      

        <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">
            <button type="button" id="CancelarAgregar-NuevaBase" class="btn btn-outline-danger " data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancelar</button>

            <button type="submit" id="btnGuardar" class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Guardar</button>
          </div>


              <?php 
              
              $CrearNuevaBase = new Controlador_NuevaBase();
              $CrearNuevaBase -> ctr_CrearNuevaBase();
              
              ?>  
      
      </form>

    </div>

    </div>
    
  </div>
</div>
</div>



<!--=====================================

MODAL EDITAR NUEVA BASE

======================================-->


<div class="modal fade bd-example-modal-lg" id="modalEditarNuevaBase"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">

      <!--=====================================
      CABEZA DEL MODAL
      ======================================-->

    <div class="modal-header modal-header-primary">

      <h5 class="modal-title text-ligth" id="exampleModalLabel"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>&nbsp; Editar - Nueva Base</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

      <!--=====================================
      CUERPO DEL MODAL
      ======================================-->

    <div class="modal-body  modal-lg">

      <div class="card-header  ">

        <form  method="post" name="registrationForm-EditarNuevaBase" id ="registrationForm-EditarNuevaBase"   enctype="multipart/form-data">

          <!--INFORMACION IMPORTANTE CARD EXPANDABLE-->

          <div class="col-md-12 pb-3">

          <div class="card card-warning collapsed-card">
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-info-circle"></i>&nbsp;&nbsp;Información Importante!</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            

            <div class="card-body mx-auto " >

              <p><em>Solo podras editar el campo</em> &nbsp; <i class="fa fa-calendar"></i><strong>&nbsp;Fecha de Registro</strong>&nbsp;&nbsp; <abbr title="Contactar Administrador (Maria Teresa Murillo)" >Dudas?</abbr> </p>

            </div>
            <!-- /.card-body -->



          </div>
          <!-- /.card -->
        </div>

          <div class="form-group card-body callout callout-success ">

            <div class="row">

              <div class=" col-md-3  ">

                <!-- ENTRADA PARA EDITAR EL CAPTURISTA DE REGISTROS -->
                <input type="hidden" name="Capturista-EditarNuevaBase" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >

                <!-- ENTRADA PARA BUSCAR Y CAPTURAR TRABAJADOR -->
                <div class="form-group  ">
                  <label for="EditarbuscaTrabajador">Buscar:</label>
                  
                  <div class="input-group ">

                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-search "></i></span>
                    </div>

                      <select class="form-control  " name="EditarbuscaTrabajador" id="EditarbuscaTrabajador" disabled >
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


          <!--ENTRADA PARA EDITAR NUEVA BASE-->

          <div class="form-group card-body callout callout-warning mt-5">
            <div class="row">

              
              <div class=" col-md-4  ">

                <!-- ENTRADA PARA EL CAPTURISTA DE REGISTROS -->
                <input type="hidden" name="Capturista-NuevaBase" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >
                <div class="form-group  ">

                    <!--ENTRADA PARA AGREGAR NUEVA BASE SINDICAL-->

                <label for="EditarNuevaBase">Descripción:</label>
                  <div class="input-group ">

                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-tags"></i></span>
                      </div>

                        <input type="text" name="EditarNuevaBase" id="EditarNuevaBase" class="form-control"  readonly="" >
                      <!--  <input type="text" name="Editar_nuevoTipoEmpleado_Sindicalizado" id="Editar_nuevoTipoEmpleado_Sindicalizado" class="form-control"  > -->

                </div>
                </div>
                
              </div>


                <!--ENTRADA PARA EDITAR NUEVA ASIGNACIONL-->

                <div class=" col-md-4  ">
  
                <div class="form-group  ">

                <label for="Editar_nuevoTipoEmpleado_Sindicalizado">Nueva Asignación:</label>
                  <div class="input-group ">

                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-tags"></i></span>
                      </div>

                      
                        <input type="text" name="Editar_nuevoTipoEmpleado_Sindicalizado" id="Editar_nuevoTipoEmpleado_Sindicalizado" class="form-control" readonly=""  >

                </div>
                </div>
                
              </div>

  
                <!--ENTRADA PARA AGREGAR FECHA DE REGISTRO -->

              <div class=" col-md-4  ">
                <div class="form-group  ">
                  <label for="EditarFechaNuevaBase">Fecha de Registro:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input class="form-control" type="date"  name="EditarFechaNuevaBase" id="EditarFechaNuevaBase" >

                    <input type="hidden"  name="idNuevaBase" id="idNuevaBase" >
                  </div>
                </div>
              </div> 


            </div>
          </div> 

      

        <!--=====================================
          PIE DEL MODAL
          ======================================-->

          <div class="modal-footer">
            <button type="button" id="CancelarEditar-NuevaBase" class="btn btn-outline-danger " data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancelar</button>

            <button type="submit" class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Actualizar</button>
          </div>

          <?php 

          $EditarNuevaBase = new Controlador_NuevaBase();
          $EditarNuevaBase -> ctr_EditarNuevaBase();

          ?>  

      </form>

    </div>

    </div>
    
  </div>
</div>
</div>



</body>



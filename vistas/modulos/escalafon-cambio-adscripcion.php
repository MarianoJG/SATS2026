
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
           
            <h1><span> <i class="fa fa-briefcase nav-icon"></i></span>&nbsp; Escalafon - Cambio de Adscripción</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Escalafon</li>
               <li class="breadcrumb-item active">Cambio de Adscripción</li>
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
          <div class="pl-2">
           <button type="button" class="btn btn-primary btnAgregarCambioAdscripcion" data-toggle="modal" data-target="#modalAgregarCambioAdscripcion"><i class="fa fa-plus nav-icon"></i>&nbsp;
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
        <table class="table TablaCambioAdscripcion display  table-hover table-striped table-bordered dt-responsive nowrap"  style="width:100%">
          <thead>
            <tr>

             <th>Id</th>
             <th>Nº Empleado</th>
             <th>Nombre del Trabajador</th>
             <th>Adscripción Anterior</th>
             <th>Adscripción Actual </th> 
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

<div class="modal fade bd-example-modal-lg" id="modalAgregarCambioAdscripcion"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

       <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

      <div class="modal-header modal-header-primary">

        <h5 class="modal-title text-ligth" id="exampleModalLabel"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>&nbsp; Agregar - Cambio de Adscripción</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

       <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

      <div class="modal-body  modal-lg">

        <div class="card-header  ">

          <form  method="post" name="registrationForm-CambioAdscripcion" id ="registrationForm-CambioAdscripcion"   enctype="multipart/form-data">

            <!--AQUI-->

             <!--SECCION 1-->

            <div class="form-group card-body callout callout-success ">

              <div class="row seccion1">

                <div class=" col-md-3  ">

                  <!-- ENTRADA PARA EL CAPTURISTA DE REGISTROS -->
                  <input type="hidden" name="Capturista-CambioAdscripcion" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >

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



              <div class="row seccion1-1 ">

                 <!-- ENTRADA PARA MOSTRAR NOMBRE DEL TRABAJADOR -->
                <div class=" col-md-12 ">
                  <div class="form-group  ">
                    <label for="Adscripcion_actual">Adscripción Actual:</label>
                    
                    <div class="input-group ">

                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-briefcase "></i></span>
                      </div>
                        <input type="text" name="Adscripcion_actual" id="Adscripcion_actual" class="form-control" placeholder="Adscripción Actual" readonly=""  >
                     
                       </div>
                  </div>
                  
                </div> 
                
              </div>

            </div>


             <!--ENTRADA PARA AGREGAR NUEVO CAMBIO DE CATEGORIA-->
             <!--SECCION 2-->

            <div class="form-group card-body callout callout-warning mt-5 OcultarSeccion2">
              <div class="row seccion2">

                <!-- ENTRADA PARA SELECCIONAR TIPO DE CATEGORIA -->
                <div class=" col-md-8  ">

                  <!-- ENTRADA PARA EL CAPTURISTA DE REGISTROS -->
                  <input type="hidden" name="Capturista-CambioAdscripcion" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >
                  <div class="form-group  ">
                  <label for="nuevoCambioAdscripcion">Cambio de Adscripción a:</label>
                  <div class="input-group ">

                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-search "></i></span>
                    </div>

                    <select class="form-control  " name="nuevoCambioAdscripcion" id="nuevoCambioAdscripcion" required="" >
                      <option value="" >Seleccionar Adscripción</option>

                      <?php

                      $item = null;
                      $valor = null;

                      $mostrarTrabajador = ControladorCombobox::ctrMostrarComboDepartamentos($item, $valor);

                      foreach ($mostrarTrabajador as $key => $value) {

                       echo '<option value="'.$value["departamento"].'">'.$value["departamento"].'</option>';
                     }

                     ?>

                   </select>


                 </div>
                  </div>
                      <input type="hidden" name="departamentoId" id="departamentoId" class="form-control" readonly=""   >
                </div>

 

                 <!--ENTRADA PARA AGREGAR FECHA DE REGISTRO EN APOYO DE TRANSPORTE-->

                <div class=" col-md-4  ">
                  <div class="form-group  ">
                    <label for="nuevoFechaCambioAdscripcion">Fecha de Registro:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                      <input class="form-control" type="date"  name="nuevoFechaCambioAdscripcion" id="nuevoFechaCambioAdscripcion"  >
                    </div>
                  </div>
                </div> 


              </div>
            </div> 

        

          <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">

            
           
              <button type="button" id="CancelarAgregar-CambioAdscripcion" class="btn btn-outline-danger " data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancelar</button>

              <button type="submit" id="btnGuardar" class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Guardar</button>
            </div>


            <?php 
            
            $CrearCambioAdscripcion = new Controlador_CambioAdscripcion();
            $CrearCambioAdscripcion -> ctr_CrearCambioAdscripcion();
            
            ?>  
 
       </form>

     </div>

      </div>
      
    </div>
  </div>
</div>




<!--=====================================

MODAL EDITAR CAMBIO DE ADSCRIPCION

======================================-->


<div class="modal fade bd-example-modal-lg" id="modalEditarCambioAdscripcion"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

       <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

      <div class="modal-header modal-header-primary">

        <h5 class="modal-title text-ligth" id="exampleModalLabel"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>&nbsp; Editar - Cambio de Adscripción</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

       <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

      <div class="modal-body  modal-lg">

        <div class="card-header  ">

          <form  method="post" name="registrationFormEditarCambioAdscripcion" id ="registrationFormEditarCambioAdscripcion"   enctype="multipart/form-data">

            <!--AQUI-->

             <!--SECCION 1-->

            <div class="form-group card-body callout callout-success ">

              <div class="row seccion1">

                <div class=" col-md-3  ">

                  <!-- ENTRADA PARA EL CAPTURISTA DE REGISTROS -->
                  <input type="hidden" name="Capturista-EditarCambioAdscripcion" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >

                  <!-- ENTRADA PARA BUSCAR Y CAPTURAR TRABAJADOR -->
                  <div class="form-group ">
                    <label for="EditarbuscaTrabajador">Buscar:</label>
                    
                    <div class="input-group ">

                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search "></i></span>
                      </div>

                       <select class="form-control  " name="EditarbuscaTrabajador" id="EditarbuscaTrabajador" required="" disabled >
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
                  
                        <input type="hidden" name="EditartrabajadorId" id="EditartrabajadorId" class="form-control" readonly=""   >
                </div> 

                

                <!-- ENTRADA PARA MOSTRAR NOMBRE DEL TRABAJADOR -->
                <div class=" col-md-6 pl-3">
                  <div class="form-group  ">
                    <label for="EditarnomTrabajador">Empleado:</label>
                    
                    <div class="input-group ">

                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user "></i></span>
                      </div>
                        <input type="text" name="EditarnomTrabajador" id="EditarnomTrabajador" class="form-control" placeholder="Empleado" readonly=""  >
                     
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



              <div class="row seccion1-1 ">

                 <!-- ENTRADA PARA MOSTRAR NOMBRE DEL TRABAJADOR -->
                <div class=" col-md-12 ">
                  <div class="form-group  ">
                    <label for="EditarAdscripcion_actual">Adscripción Anterior:</label>
                    
                    <div class="input-group ">

                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-briefcase "></i></span>
                      </div>
                        <input type="text" name="EditarAdscripcion_actual" id="EditarAdscripcion_actual" class="form-control" placeholder="Adscripción Actual" readonly=""  >
                     
                       </div>
                  </div>
                  
                </div> 
                
              </div>

            </div>


             <!--ENTRADA PARA AGREGAR NUEVO CAMBIO DE CATEGORIA-->
             <!--SECCION 2-->

            <div class="form-group card-body callout callout-warning mt-5 OcultarSeccion2">
              <div class="row seccion2">

                <!-- ENTRADA PARA SELECCIONAR TIPO DE CATEGORIA -->
                <div class=" col-md-8  ">

                  <!-- ENTRADA PARA EL CAPTURISTA DE REGISTROS -->
                  <input type="hidden" name="Capturista-EditarCambioAdscripcion" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >


                  <div class="form-group  ">
                  <label for="editarCambioAdscripcion">Ultima Adscripción Asignada:</label>
                  <div class="input-group ">

                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-search "></i></span>
                    </div>

                    <select class="form-control  " name="editarCambioAdscripcion" id="editarCambioAdscripcion" required="" >
                      <option value="" >Seleccionar Adscripción</option>

                      <?php

                      $item = null;
                      $valor = null;

                      $mostrarTrabajador = ControladorCombobox::ctrMostrarComboDepartamentos($item, $valor);

                      foreach ($mostrarTrabajador as $key => $value) {

                       echo '<option value="'.$value["departamento"].'">'.$value["departamento"].'</option>';
                     }

                     ?>

                   </select>


                 </div>
                  </div>
                      <input type="hidden" name="EditardepartamentoId" id="EditardepartamentoId" class="form-control" readonly=""   >
                </div>

 

                 <!--ENTRADA PARA AGREGAR FECHA DE REGISTRO EN APOYO DE TRANSPORTE-->

                <div class=" col-md-4  ">
                  <div class="form-group  ">
                    <label for="EditarnuevoFechaCambioAdscripcion">Fecha de Registro:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                      <input class="form-control" type="date"  name="EditarnuevoFechaCambioAdscripcion" id="EditarnuevoFechaCambioAdscripcion" >
                    </div>

                  </div>

                   <input type="hidden"  name="idCambioAdscripcion" id="idCambioAdscripcion" class="form-control" required readonly>
           
                </div> 

              </div>
            </div> 

        

          <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">

            
           
              <button type="button" id="Cancelar-EditarCambioAdscripcion" class="btn btn-outline-danger " data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancelar</button>

              <button type="submit" id="btnActualizar" class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Actualizar</button>
            </div>


           <?php 
            
            $EditarCambioAdscripcion = new Controlador_CambioAdscripcion();
            $EditarCambioAdscripcion -> ctr_EditarCambioAdscripcion();
            
            ?>   
 
       </form>

     </div>

      </div>
      
    </div>
  </div>
</div>



</body>



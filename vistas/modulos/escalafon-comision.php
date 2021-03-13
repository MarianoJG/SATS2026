
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
           
            <h1><span> <i class="fa fa-building-o nav-icon"></i></span>&nbsp; Escalafon - Comisión</h1>
          </div>

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Escalafon</li>
               <li class="breadcrumb-item active">Comisión</li>
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
           <button type="button" class="btn btn-primary btnAgregarComision" data-toggle="modal" data-target="#modalAgregarComision"><i class="fa fa-plus nav-icon"></i>&nbsp;
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
        <table class="table TablaComision display  table-hover table-striped table-bordered dt-responsive nowrap"  style="width:100%">
          <thead>
            <tr>

             <th>Id</th>
             <th>Nº Empleado</th>
             <th>Nombre del Trabajador</th>
             <th>Adscripción </th>
             <th>Tipo de Movimiento </th>
             <th>Comisionado a: </th>
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

<div class="modal fade bd-example-modal-lg" id="modalAgregarComision"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

       <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

      <div class="modal-header modal-header-primary">

        <h5 class="modal-title text-ligth" id="exampleModalLabel"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>&nbsp; Agregar - Nueva Comisión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

       <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

      <div class="modal-body  modal-lg">

        <div class="card-header  ">

          <form  method="post" name="registrationForm-Comision" id ="registrationForm-Comision"   enctype="multipart/form-data">

            <!--AQUI-->

             <!--SECCION 1-->

            <div class="form-group card-body callout callout-success ">

              <div class="row seccion1">

                <div class=" col-md-3  ">

                  <!-- ENTRADA PARA EL CAPTURISTA DE REGISTROS -->
                  <input type="hidden" name="Capturista-Comision" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >

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
                  
                        <input type="hidden" name="trabajadorId" id="trabajadorId" class="form-control" readonly=""   ><!--input oculto--> 

                </div> <!--end col-md-3--> 

                

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
                </div> <!--end col-md-6--> 


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
                </div> <!--end col-md-3-->  



              </div> <!--end row seccion1-->



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
                  
                </div><!--end col-md-12--> 
                
              </div><!--end row seccion1-1-->

            </div>


             <!--ENTRADA PARA AGREGAR NUEVA COMISION-->
             <!--SECCION 2-->

            <div class="form-group card-body callout callout-warning mt-5 OcultarSeccion2">
              <div class="row seccion2">


                <div class=" col-md-8 ">
                  <div class="form-group  ">
                    <label for="Tipo_Movimiento_Comision">Movimiento:</label>
                    
                    <div class="input-group ">

                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-building-o "></i></span>
                      </div>
                        <input type="text" name="Tipo_Movimiento_Comision" id="Tipo_Movimiento_Comision" class="form-control" placeholder="Comisión" readonly="" value="Comisión"  >
                     
                       </div>
                  </div>
                  
                </div>

                  <!--ENTRADA PARA AGREGAR FECHA DE REGISTRO EN COMISION-->

                <div class=" col-md-4  ">
                  <div class="form-group  ">
                    <label for="nuevoFechaComision">Fecha de Registro:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                      <input class="form-control" type="date"  name="nuevoFechaComision" id="nuevoFechaComision"  >
                    </div>
                  </div>
                </div> 



                <!-- ENTRADA PARA SELECCIONAR TIPO DE ADSCRIPCION -->
                <div class=" col-md-12 ">

                  <!-- ENTRADA PARA EL CAPTURISTA DE REGISTROS -->
                  <input type="hidden" name="Capturista-Comision" id="Capturista-Comision" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >

                  <div class="form-group  ">

                    <label for="nuevaComision">Comisionado a:</label>
                    <div class="input-group ">

                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search "></i></span>
                      </div>

                      <select class="form-control  " name="nuevaComision" id="nuevaComision" required="" >

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

 

              </div>


            </div> 

        

          <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">

            
           
              <button type="button" id="CancelarAgregar-Comision" class="btn btn-outline-danger " data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancelar</button>

              <button type="submit" id="btnGuardar" class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Guardar</button>
            </div>


           <?php 
            
            $CrearComision = new Controlador_Comision();
            $CrearComision -> ctr_CrearComision();
            
            ?>  
 
       </form>

     </div>

      </div>
      
    </div>
  </div>
</div>





<!--=====================================

MODAL EDITAR COMISION

======================================-->


<div class="modal fade bd-example-modal-lg" id="modalEditarComision"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

       <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

      <div class="modal-header modal-header-primary">

        <h5 class="modal-title text-ligth" id="exampleModalLabel"><i class="fa fa-plus-circle fa-lg" aria-hidden="true"></i>&nbsp; Editar - Comisión</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

       <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

      <div class="modal-body  modal-lg">

        <div class="card-header  ">

          <form  method="post" name="registrationFormEditarComision" id ="registrationFormEditarComision"   enctype="multipart/form-data">

            <!--AQUI-->

             <!--SECCION 1-->

            <div class="form-group card-body callout callout-success ">

              <div class="row seccion1">
                   <!-- ENTRADA PARA EL CAPTURISTA DE REGISTROS -->

                   <input type="hidden" name="Capturista-EditarComision" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >

                      <!-- ENTRADA PARA EL ID DEL REGISTRO DE COMISION -->
                   <input type="hidden"  name="idComision" id="idComision" class="form-control" required readonly>

                <div class=" col-md-3  ">
 
                  <!-- ENTRADA PARA BUSCAR Y CAPTURAR TRABAJADOR -->
                  <div class="form-group ">
                    <label for="EditarbuscaTrabajador">Buscar:</label>
                    
                    <div class="input-group ">

                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search "></i></span>
                      </div>

                       <select class="form-control  " name="EditarbuscaTrabajador" id="EditarbuscaTrabajador" required=""  >
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
                  
                        <input type="hidden" name="EditartrabajadorId" id="EditartrabajadorId" class="form-control" readonly=""   ><!--input oculto--> 

                </div> <!--end col-md-3--> 

                

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
                </div> <!--end col-md-6--> 


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
                </div> <!--end col-md-3-->  



              </div> <!--end row seccion1-->



              <div class="row seccion1-1 ">

                 <!-- ENTRADA PARA MOSTRAR NOMBRE DEL TRABAJADOR -->
                <div class=" col-md-12 ">
                  <div class="form-group  ">
                    <label for="EditarAdscripcion_actual">Adscripción Actual:</label>
                    
                    <div class="input-group ">

                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-briefcase "></i></span>
                      </div>
                        <input type="text" name="EditarAdscripcion_actual" id="EditarAdscripcion_actual" class="form-control" placeholder="Adscripción Actual" readonly=""  >
                     
                       </div>
                  </div>
                  
                </div><!--end col-md-12--> 
                
              </div><!--end row seccion1-1-->

            </div>


             <!--ENTRADA PARA AGREGAR NUEVA COMISION-->
             <!--SECCION 2-->

            <div class="form-group card-body callout callout-warning mt-5 OcultarSeccion2">
              <div class="row seccion2">


                <div class=" col-md-8 ">
                  <div class="form-group  ">
                    <label for="editar_Tipo_Movimiento_Comision">Movimiento:</label>
                    
                    <div class="input-group ">

                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-building-o "></i></span>
                      </div>
                        <input type="text" name="editar_Tipo_Movimiento_Comision" id="editar_Tipo_Movimiento_Comision" class="form-control" placeholder="Comisión" readonly="" value="Comisión"  >
                     
                       </div>
                  </div>
                  
                </div>

                  <!--ENTRADA PARA AGREGAR FECHA DE REGISTRO EN COMISION-->

                <div class=" col-md-4  ">
                  <div class="form-group  ">
                    <label for="EditarFechaComision">Fecha de Registro:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                      <input class="form-control" type="date"  name="EditarFechaComision" id="EditarFechaComision"  >
                    </div>


                  </div>
                </div> 



                <!-- ENTRADA PARA SELECCIONAR TIPO DE ADSCRIPCION -->
                <div class=" col-md-12 ">

                  <!-- ENTRADA PARA EL CAPTURISTA DE REGISTROS -->
                  <input type="hidden" name="Capturista-EditarComision"  id="Capturista-EditarComision" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >

                  <div class="form-group  ">

                    <label for="Editar-nuevaComision">Comisionado a:</label>
                    <div class="input-group ">

                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search "></i></span>
                      </div>

                      <select class="form-control  " name="Editar-nuevaComision" id="Editar-nuevaComision" required="" >

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

                 <input type="hidden"  name="id_departamento" id="id_departamento" class="form-control" required readonly>

 

              </div>


            </div> 

        

          <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">

            
           
              <button type="button" id="CancelarEditar-Comision" class="btn btn-outline-danger " data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancelar</button>

              <button type="submit" id="btnActualizar" class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Actualizar</button>
            </div>


         <?php 
            
            $EditarComision = new Controlador_Comision();
            $EditarComision -> ctr_EditarComision();
            
            ?>   
 
       </form>

     </div>

      </div>
      
    </div>
  </div>
</div>






</body>



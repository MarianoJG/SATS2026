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
            <h1>&nbsp;Registros de Hijos de Trabajadores</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Administración</li>
              <li class="breadcrumb-item active">Registros Hijos</li>
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
          <button type="button" class="btn btn-primary btnAgregarHijos" data-toggle="modal" data-target="#modalAgregarHijos"><i class="fa fa-plus nav-icon"></i>&nbsp;
            Agregar Hijos
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
        <table  class="table TablaHijos display table-hover table-striped table-bordered dt-responsive" style="width:100%">
          <thead>
            <tr>
            <th>Id</th>
            <th>Nombres</th>
            <th>Fecha de Nacimiento</th>
            <th>Padre o Tutor</th>
            <th>Nº Empleado</th>
            <th>Adscripción</th>
            <th>Acciones</th>

            </tr>
          </thead>

        </table>
        <input type="hidden" class="form-control is-invalid" value="<?php echo $_SESSION['perfil']; ?>"
          id="perfilOculto" readonly>
      </div>

    </section>
</div>






<!--=====================================
MODAL AGREGAR HIJO
======================================-->

<div class="modal fade bd-example-modal-lg" id="modalAgregarHijos"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

      <div class="modal-header modal-header-primary">

        <h5 class="modal-title text-ligth" id="exampleModalLabel"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Agregar Hijos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

      <div class="modal-body  modal-lg">

        <div class="card-header  ">

          <form  method="post" name="registrationFormHijos" id ="registrationFormHijos"   enctype="multipart/form-data">

            <!--AQUI-->

            <div class="form-group card-body callout callout-info ">

              <div class="row">

                <div class=" col-md-3  ">

                  <!-- ENTRADA PARA EL CAPTURISTA DE REGISTROS -->

                      <input type="hidden" name="CapturistaH" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >

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

                          $mostrarTrabajador = ControladorTrabajadores::ctrMostrarTrabajadoresTipoSindicalizados($item, $valor);

                          foreach ($mostrarTrabajador as $key => $value) {

                          echo '<option value="'.$value["id_trabajador"].'">'.$value["num_empleado"].'</option>';
                        }

                        ?>

                        </select>
                      </div>
                      <input type="hidden" name="nuevoNumEmpleado" id="nuevoNumEmpleado" class="form-control">
                      <input type="hidden" name="trabajadorId" id="trabajadorId" class="form-control">
                      

                  </div>

                </div> 
                

                <div class=" col-md-6  ">
                  <div class="form-group  ">
                    <label for="nomTrabajador">Empleado:</label>
                    
                    <div class="input-group ">

                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-user "></i></span>
                      </div>
                        <input type="text" name="nomTrabajador" id="nomTrabajador" class="form-control" placeholder="Empleado" readonly="" >
                    
                      </div>
                  </div>
                </div> 

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

              <div class="row">
              <div class="col-3"></div>

              <div class=" col-9">
                  <div class="form-group  ">
                    <div class="input-group ">
                        <input type="text" name="nuevoDepartamento" id="nuevoDepartamento" class="form-control" placeholder="Departamento" readonly="" >
                    
                      </div>
                  </div>
                </div> 
                
                </div>

            </div>


            <!--ENTRADA PARA AGREGAR HIJOS-->

            <div class="form-group card-body callout callout-warning mt-5">
              <div class="row">

                <div class=" col-md-7">
                  <div class="form-group  ">
                    <label for="nuevoNomHijo">Nombre Completo:</label>
                    <input type="text" name="nuevoNomHijo" id="nuevoNomHijo" class="form-control"  placeholder="Nombres & Apellidos"  autocomplete="off" style="text-transform:capitalize;"  >
                  </div>
                </div>

                <div class=" col-md-5">
                  <div class="form-group  ">
                    <label for="nuevoFechaNacH">Fecha de Nacimiento:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                      <input class="form-control" type="date"  name="nuevoFechaNacH" id="nuevoFechaNacH" >
                    </div>
                  </div>
                </div> 

                <!-- <div class=" col-md-1  ">
                  <div class="form-group ">
                    <label for="Agregar">Agregar</label>
                    <div class="input-group">
                      <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                </div>  -->


              </div>
            </div> 


              <!--ENTRADA PARA AGREGAR HIJOS HIDE

            <div class="form-group hide card-body callout callout-warning mt-1" id="hijosTemplate">
              <div class="row">

                <div class=" col-md-6 ">
                  <div class="form-group  ">
                  
                    <input type="text" name="nuevoNomHijoHide" id="nuevoNomHijoHide" class="form-control"  placeholder="Nombres & Apellidos"  autocomplete="off" style="text-transform:capitalize;"  >
                  </div>
                </div>

                <div class=" col-md-5  ">
                  <div class="form-group  ">
                  
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                      <input class="form-control" type="date" value="" name="nuevoFechaNacHHide" id="nuevoFechaNacHHide" >
                    </div>
                  </div>
                </div> 

                <div class=" col-md-1  ">
                  <div class="form-group ">
                  
                    <div class="input-group">
                      <button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>
                    </div>
                  </div>
                </div> 


              </div>
            </div> -->
          



          <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">
              <button type="button" id="CancelarAgregarHijo" class="btn btn-outline-danger " data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancelar</button>
              <button type="submit" class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Guardar</button>
            </div>



          <?php 

            $crearHijo = new ControladorHijos();
            $crearHijo -> ctrCrearHijo();


            ?>

            

      </form>

    </div>

      </div>
      
    </div>
  </div>
</div>




<!--=====================================
MODAL EDITAR HIJO
======================================-->

<div class="modal fade bd-example-modal-lg" id="modalEditarHijo"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

      <div class="modal-header modal-header-primary">

        <h5 class="modal-title text-ligth" id="exampleModalLabel"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp; Editar Hijos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

      <div class="modal-body  modal-lg">

        <div class="card-header  ">

          <form  method="post" name="registrationFormHijosEditar" id ="registrationFormHijosEditar"   enctype="multipart/form-data">

            

            <div class="form-group card-body callout callout-info ">

              <div class="row">

                <div class=" col-md-3  ">

                  <!-- EDITAR PARA EL CAPTURISTA DE REGISTROS -->
                      <input type="hidden" name="editarCapturistaH" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >


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

                          $mostrarTrabajador = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor);

                          foreach ($mostrarTrabajador as $key => $value) {

                          echo '<option value="'.$value["id_trabajador"].'">'.$value["num_empleado"].'</option>';
                        }

                        ?>

                        </select>

                        
                      </div>
                      <input type="hidden" name="EditarNumEmpleado" id="EditarNumEmpleado" class="form-control">
                        <input type="hidden" name="EditartrabajadorId" id="EditartrabajadorId" class="form-control">
                  </div>

                </div> 

                <div class=" col-md-6  ">
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
                <!-- /col-md-3 -->
                <div class="col-3"></div>            
                <div class=" col-9">
                  <div class="form-group  ">
                    <div class="input-group ">
                        <input type="text" name="editarDepartamento" id="editarDepartamento" class="form-control" placeholder="Departamento" readonly="" >
                    
                      </div>
                  </div>
                </div> 

              </div> 

            </div>


            <!--ENTRADA PARA EDITAR HIJOS-->

            <div class="form-group card-body callout callout-warning mt-5">
              <div class="row">

                <div class=" col-md-6 ">
                  <div class="form-group  ">
                    <label for="EditarnuevoNomHijo">Nombre Completo:</label>
                    <input type="text" name="EditarnuevoNomHijo" id="EditarnuevoNomHijo" class="form-control"  placeholder="Nombres & Apellidos"  autocomplete="off" style="text-transform:capitalize;"  >
                  </div>
                </div>

                <div class=" col-md-5  ">
                  <div class="form-group  ">
                    <label for="EditarnuevoFechaNacH">Fecha de Nacimiento:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                      <input class="form-control" type="date"  name="EditarnuevoFechaNacH" id="EditarnuevoFechaNacH" >

                      <input type="hidden"  name="idHijo" id="idHijo" required>
                    </div>
                  </div>
                </div> 

                <div class=" col-md-1  ">
                  <div class="form-group ">
                    <label for="Agregar">Agregar</label>
                    <div class="input-group">
                      <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                </div> 


              </div>
            </div> 


              <!--ENTRADA PARA AGREGAR HIJOS HIDE

            <div class="form-group hide card-body callout callout-warning mt-1" id="hijosTemplate">
              <div class="row">

                <div class=" col-md-6 ">
                  <div class="form-group  ">
                  
                    <input type="text" name="nuevoNomHijoHide" id="nuevoNomHijoHide" class="form-control"  placeholder="Nombres & Apellidos"  autocomplete="off" style="text-transform:capitalize;"  >
                  </div>
                </div>

                <div class=" col-md-5  ">
                  <div class="form-group  ">
                  
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                      </div>
                      <input class="form-control" type="date" value="" name="nuevoFechaNacHHide" id="nuevoFechaNacHHide" >
                    </div>
                  </div>
                </div> 

                <div class=" col-md-1  ">
                  <div class="form-group ">
                  
                    <div class="input-group">
                      <button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>
                    </div>
                  </div>
                </div> 


              </div>
            </div> -->
          



          <!--=====================================
            PIE DEL MODAL
            ======================================-->

          <div class="modal-footer">
              <button type="button" id="CancelarEditarHijo" class="btn btn-outline-danger " data-dismiss="modal"><i class="fa fa-times
                " aria-hidden="true"></i>&nbsp;Cancelar</button>
              <button type="submit" class="btn btn-outline-success"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp; Actualizar</button>
            </div>


        <?php 

            $editarHijo = new ControladorHijos();
            $editarHijo -> ctrEditarHijo();


            ?> 

            

      </form>

    </div>

      </div>
      
    </div>
  </div>
</div>






</body>



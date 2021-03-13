<style type="text/css">
  .fv-form-bootstrap4 .fv-control-feedback {
    width: 0px;
    height: 38px;
    line-height: 38px;
    right: -5px;
}
</style>

<body class="hold-transition sidebar-mini bg-p2-pages" style="height: auto;">


   <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mt-5 pt-2">
          <div class="col-sm-6">
            <h1>&nbsp;Listado de Trabajadores Registrados</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Administración</li>
               <li class="breadcrumb-item active">Reg. Trabajadores</li>
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

           <?php 

           if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Capturista" )
           {

             echo ' <button type="buttom" class="btn btn-primary" data-toggle="modal" id="btnLimpiar" data-target="#modalAgregarTrabajador"><i class="fa fa-plus nav-icon"></i>&nbsp;
             Agregar Trabajador
           </button>   ';


          }             
         


           
           
           ?>
         <!--  <div>
           <button type="buttom" class="btn btn-primary" data-toggle="modal" id="btnLimpiar" data-target="#modalAgregarTrabajador"><i class="fa fa-plus nav-icon"></i>&nbsp;
             Agregar Trabajador
           </button>
         </div> -->
          <!--/.col (left) -->
          <!-- right column -->
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <section class="account-content">
      <div class="card-body">
        <table  class="table TablaTrabajadores table-hover table-striped table-bordered dt-responsive nowrap " style="width:100%">
          <thead>
           
           <tr>
              <th>Id</th>
              <th># Empleado</th>
              <th>Nombre (s)</th>
              <th>A. Paterno</th>
              <th>A. Materno</th>
              <th>Foto</th>
              <th>Tipo de Empleado</th>
              <th>Categoría</th>
              <th>Departamento</th>
              <th>Acciones</th>
           </tr>

         </thead>

        </table>

         <input type="hidden" value="<?php echo $_SESSION['perfil']; ?>" id="perfilOculto">
      </div>

    </section>
</div>



<!--=====================================
MODAL AGREGAR TRABAJADOR
======================================-->

<div class="modal fade  bd-example-modal-lg" id="modalAgregarTrabajador"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

       <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

      <div class="modal-header modal-header-primary">

        <h5 class="modal-title text-ligth" id="exampleModalLabel"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Agregar Trabajador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

       <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

      <div class="modal-body  modal-lg">

        <div class="card-header  ">

          <form  method="post" name="registrationForm" id ="registrationForm"   enctype="multipart/form-data">

            <div class="row  ">




                <div class=" col-md-6 px-4  "> <!--====begin col-md-6 1=========-->

                    <!-- ENTRADA PARA EL CAPTURISTA DE REGISTROS -->
                      <input type="hidden" name="capturista" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >

                      <!-- ENTRADA PARA EL Número DE EMPLEADO -->
                       
                     <div class="form-group  ">
                      <label for="nuevoNumEmpleado">Número de Empleado:</label>
                      <input type="text" name="nuevoNumEmpleado" id="nuevoNumEmpleado" class="form-control" maxlength="5" placeholder="Número de Empleado" autocomplete="off"  >

                    </div>


                      <!--ENTRADA PARA EL NOMBRE-->

                       <div class="form-group  ">
                       <label for="nuevoNombreTrabajador">Nombre (s) :</label>
                       <input type="text" name="nuevoNombreTrabajador" id="nuevoNombreTrabajador" class="form-control" placeholder=" Nombres" autocomplete="off" style="text-transform:capitalize;"  >
                     </div>


                       <!--ENTRADA PARA EL APELLIDO PATERNO-->

                      <div class="form-group   ">
                       <label for="nuevoApellidoPaterno">Apellido Paterno:</label>
                       <input type="text" name="nuevoApellidoPaterno" id="nuevoApellidoPaterno" class="form-control" placeholder=" Apellido Paterno" autocomplete="off" style="text-transform:capitalize;"   >
                      </div>


                        <!--ENTRADA PARA EL APELLIDO MATERNO-->

                      <div class="form-group ">
                        <label for="nuevoApellidoMaterno">Apellido Materno:</label>
                        <input type="text" name="nuevoApellidoMaterno" id="nuevoApellidoMaterno" class="form-control" placeholder=" Apellido Materno" autocomplete="off" style="text-transform:capitalize;"  >
                      </div>


                      <!-- ENTRADA PARA SELECCIONAR SEXO -->

                       <div class="form-group   ">
                        <label for="nuevoSexo">Sexo:</label>

                        <div class="input-group">

                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-venus-mars"></i></span>
                          </div>

                          <select class="form-control" name="nuevoSexo"  id="nuevoSexo">
                            <option value="">Seleccionar Sexo</option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                          </select>

                        </div>
                      </div>


                        <!-- ENTRADA PARA SELECCIONAR ESTADO CIVIL -->

                        <div class="form-group  ">
                          <label for="nuevoEdoCivil">Estado Civil:</label>

                          <div class="input-group">

                            <div class="input-group-prepend">
                             <!--  <span class="input-group-text"><i class="fa fa-universal-access"></i></span> -->
                           </div>

                           <select class="form-control" name="nuevoEdoCivil" id="nuevoEdoCivil">
                            <option value="">Seleccionar Estado Civil</option>
                            <option value="Soltero (a)">Soltero (a)</option>
                            <option value="Casado (a)">Casado (a)</option>
                            <option value="Divorciado (a)">Divorciado (a)</option>
                            <option value="Viudo (a)">Viudo (a)</option>
                            <option value="Unión Libre">Unión Libre</option>
                            <option value="No Especificó">No Especificó</option>
                            
                          </select>

                        </div>

                      </div>


                      <!-- ENTRADA PARA SELECCIONAR FECHA DE NACIMIENTO -->

                       <div class="form-group   ">
                        <label for="nuevoFechaNac">Fecha de Nacimiento:</label>

                        <div class="input-group">

                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                          </div>

                          <input class="form-control" type="date" value="" name="nuevoFechaNac" id="nuevoFechaNac" >

                        </div>
                      </div>

                      
                     <!--  <div class="form-group">
                         <label for="nuevoFechaNac">Fecha de Nacimiento:</label>

                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">

                          <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="nuevoFechaNac" autocomplete="off" placeholder="Seleccionar Fecha">

                          <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker" >
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>

                        </div>

                      </div>
 -->
                      


                     

                       <!-- ENTRADA PARA AÑOS CUMPLIDOS -->

                    <!--   <div class="form-group  "> -->
                      <!--  <label for="nuevoEdadActual"> Edad Actual:</label> 

                       <div class="input-group">-->

                       <!--  <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                        </div>

                        <input type="hidden" name="nuevoEdadActual" id="nuevoEdadActual" class="form-control" maxlength="2" placeholder="Años"  >
                      </div> -->
                 <!--    </div> -->


                    <!-- ENTRADA PARA SUBIR FOTO -->

                     <div class="form-group   ">

                      <label for="nuevaFotoT">Fotografia:</label>
                      <div class="custom-file">

                        <input type="file"  class=" custom-file-input nuevaFotoT" name="nuevaFotoT" >
                        <label class="custom-file-label" for="customFile">Seleccionar Imagen</label>
                      </div>
                    </div>

                    <p >Peso máximo de la imagen 2 MB &nbsp; <span ><i class="  fa fa-upload"></i></span></p>

                      <div class="form-group   ">
                      
                      <div class="img-thumbnail" >
                      
                      <img src="vistas/img/trabajadores/default/icon-jpeg.png" class="rounded previsualizar" width="107px">
                      
                      </div>
                      </div>

                </div>   <!--====end col-md-6 1=========-->
            
            

                <div class=" col-md-6 px-4"><!--====begin col-md-6 2=========-->


                     <!-- ENTRADA PARA SELECCIONAR FECHA DE INGRESO -->

                     <div class="form-group  ">
                      <label for="nuevoFechaIngreso">Fecha de Ingreso:</label>
                      
                      <div class="input-group">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>

                        <input class="form-control" type="date" value="" name="nuevoFechaIngreso" id="nuevoFechaIngreso"  max="2018-12-31">

                      </div>
                    </div>


                     <!-- ENTRADA PARA ANTIGUEDAD -->

                   <!--   <div class="form-group "> -->
                      <!--  <label for="nuevoAntiguedad">Antigüedad Laboral:</label> -->

                      <!--  <div class="input-group"> -->

                       <!--  <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                        </div> 

                        <input type="hidden" name="nuevoAntiguedad" id="nuevoAntiguedad" class="form-control" maxlength="2" placeholder="Años" autocomplete="off" >-->
                    <!--   </div> -->
                    <!-- </div> -->


                       <!-- ENTRADA PARA SELECCIONAR TIPO DE EMPLEADO -->

                       <div class="form-group   ">
                        <label for="nuevoTipoEmpleado">Tipo de Empleado:</label>

                        <div class="input-group ">

                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
                          </div>

                          <select class="form-control" name="nuevoTipoEmpleado" id="nuevoTipoEmpleado" >
                            <option value="">Seleccionar Tipo de Empleado</option>
                            <option value="Sindicalizado">Sindicalizado</option>
                            <option value="Eventual">Eventual</option>
                            <option value="Confianza">Confianza</option>
                            <option value="Jubilado">Jubilado</option>

                          </select>
                        </div>

                      </div>


                     <!-- ENTRADA PARA SELECCIONAR CATEGORIA -->

                     <div class="form-group   ">
                      <label for="nuevoCategoria">Categoría:</label>

                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-tags"></i></span>
                        </div>

                        <select class="form-control" name="nuevoCategoria" id="nuevoCategoria" >
                          <option value="">Buscar Categoría</option>

                          <?php

                          $item = null;
                          $valor = null;

                          $categorias = ControladorCombobox::ctrMostrarComboCategorias($item, $valor);

                          foreach ($categorias as $key => $value) {

                           echo '<option value="'.$value["categoria"].'">'.$value["categoria"].'</option>';
                         }

                         ?>
                         
                        </select>
                      </div>

                    </div>


                     <!-- ENTRADA PARA SELECCIONAR DEPARTAMENTO -->

                     <div class="form-group  ">
                      <label for="nuevoDepartamento">Departamento:</label>

                      <div class="input-group">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                        </div>

                        <select class="form-control " name="nuevoDepartamento" id="nuevoDepartamento" >
                          <option value="">Buscar Departamento</option>

                           <?php

                          $item = null;
                          $valor = null;

                          $departamentos = ControladorCombobox::ctrMostrarComboDepartamentos($item, $valor);

                          foreach ($departamentos as $key => $value) {

                           echo '<option value="'.$value["departamento"].'">'.$value["departamento"].'</option>';
                         }

                         ?>
                           
                         

                        </select>
                      </div>

                    </div>


                      <!-- ENTRADA PARA SELECCIONAR ESCOLARIDAD -->

                    <div class="form-group   ">
                      <label for="nuevoEscolaridad">Escolaridad:</label>

                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-graduation-cap"></i></span>
                        </div>

                        <select class="form-control" name="nuevoEscolaridad" id="nuevoEscolaridad" >
                          <option value="">Seleccionar Escolaridad</option>


                           <?php

                          $item = null;
                          $valor = null;

                          $escolaridad = ControladorCombobox::ctrMostrarComboEscolaridad($item, $valor);

                          foreach ($escolaridad as $key => $value) {

                           echo '<option value="'.$value["escolaridad"].'">'.$value["escolaridad"].'</option>';
                         }

                         ?>
                     

                        </select>
                      </div>

                    </div>


                  <!-- ENTRADA PARA ESTADO -->

                    <div class="form-group   ">
                      <label for="nuevoMunicipioEstado">Municipio / Estado:</label>

                      <!-- <input type="text" name="nuevoMunicipioEstado" id="nuevoMunicipioEstado" class="form-control" value="Culiacán, Sinaloa" readonly=""  > -->

                      <select class="form-control" name="nuevoMunicipioEstado" id="nuevoMunicipioEstado" >
                        <option value="">Seleccionar Localidad...</option>
                        <option value="Culiacán, Sinaloa">Culiacán, Sinaloa</option>
                        <option value="Navolato, Sinaloa">Navolato, Sinaloa</option>


                      </select>


                    </div>


                     <!-- ENTRADA PARA SELECCIONAR COLONIA -->
                     <div class="form-group   ">
                      <label for="nuevoColonia">Colonia/Fracc./Sindicatura:</label>

                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-crosshairs"></i></span>
                        </div>

                        <select class="form-control"   name="nuevoColonia" id="nuevoColonia">

                           <option value="">Buscar Colonia</option>

                             <?php

                          $item = null;
                          $valor = null;

                          $colonias = ControladorCombobox::ctrMostrarComboColonias($item, $valor);

                          foreach ($colonias as $key => $value) {

                           echo '<option value="'.$value["colonia"].'">'.$value["colonia"].'</option>';
                         }

                         ?>
                           
                         
                           
                    
                        </select>
                      </div>

                    </div>


                       <!--ENTRADA PARA LA Dirección-->

                       <div class="form-group   ">
                        <label for="nuevoDireccion">Dirección:</label>

                        <div class="input-group ">

                         <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-location-arrow"></i></span>
                        </div>

                        <input type="text" name="nuevoDireccion" id="nuevoDireccion" class="form-control" placeholder=" Calle y Número" autocomplete="off" style="text-transform:capitalize;" maxlength="50"  >

                      </div>
                    </div>


                       <!--ENTRADA PARA TELEFONO-->

                       <div class="form-group  ">
                        <label for="nuevoTelefono">Telefono:</label>

                        <div class="input-group ">

                         <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-mobile fa-lg"></i></span>
                        </div>

                        <input type="text" name="nuevoTelefono" id="nuevoTelefono" class="form-control" placeholder=" Número de Telefono" autocomplete="off"  data-inputmask="'mask': '(999) 999-9999'" data-mask  >

                      </div>
                    </div>


                     <!--ENTRADA PARA EMAIL-->

                       <div class="form-group ">
                        <label for="nuevoEmail">Email:</label>

                        <div class="input-group ">

                         <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                        </div>

                        <input type="text" name="nuevoEmail" id="nuevoEmail" class="form-control" placeholder="Correo Electronico" autocomplete="off"  >

                      </div>
                    </div>

               </div><!--====end col-md-6 2=========-->


        </div><!--====end row=========-->

          <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">
              <button type="button" id="CancelarAgregarTrabajador" class="btn btn-outline-danger " data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancelar</button>
              <button type="submit" class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Guardar</button>
            </div>



           <?php 

            $crearTrabajador = new ControladorTrabajadores();
            $crearTrabajador -> ctrCrearTrabajador();

           
             ?>

            
 
       </form>

     </div>

      </div>
      
    </div>
  </div>
</div>





<!--=====================================
MODAL EDITAR TRABAJADOR
======================================-->

<div class="modal fade bd-example-modal-lg" id="modalEditarTrabajador"  role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">


       <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

      <div class="modal-header modal-header-primary">

        <h5 class="modal-title text-ligth" id="exampleModalLabel"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp; Editar Trabajador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>


       <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

      <div class="modal-body  modal-lg">

        <div class="card-header  ">

          <form  method="post" name="registrationFormEditar" id ="registrationFormEditar"   enctype="multipart/form-data">

            <div class="row  ">

                <div class=" col-md-6 px-4  "> <!--====begin col-md-6 1=========-->


                   <!-- ENTRADA PARA EL CAPTURISTA DE REGISTROS -->
                      <input type="hidden" name="editarCapturista" value="<?php  echo $_SESSION["nombre"]; ?>" class="form-control"  >

						<!--=====================================
						ENTRADA PARA EDITAR EL NUMERO DE EMPLEADO
						======================================-->

                     <div class="form-group  ">
                      <label for="editarNumEmpleado">Número de Empleado:</label>
                      <input type="text" name="editarNumEmpleado" id="editarNumEmpleado" class="form-control" maxlength="5" placeholder="Número de Empleado" autocomplete="off" readonly="">
                    </div>


						<!--=====================================
						ENTRADA PARA EDITAR NOMBRE
						======================================-->

                       <div class="form-group  ">
                       <label for="editarNombreTrabajador">Nombre (s) :</label>
                       <input type="text" name="editarNombreTrabajador" id="editarNombreTrabajador" class="form-control" placeholder=" Nombres" autocomplete="off" style="text-transform:capitalize;"  >
                     </div>


						<!--=====================================
						ENTRADA PARA EDITAR APELLIDO PATERNO
						======================================-->

                      <div class="form-group   ">
                       <label for="editarApellidoPaterno">Apellido Paterno:</label>
                       <input type="text" name="editarApellidoPaterno" id="editarApellidoPaterno" class="form-control" placeholder=" Apellido Paterno" autocomplete="off" style="text-transform:capitalize;"   >
                      </div>


						<!--=====================================
						ENTRADA PARA EDITAR  APELLIDO MATERNO
						======================================-->

                      <div class="form-group ">
                        <label for="editarApellidoMaterno">Apellido Materno:</label>
                        <input type="text" name="editarApellidoMaterno" id="editarApellidoMaterno" class="form-control" placeholder=" Apellido Materno" autocomplete="off" style="text-transform:capitalize;"  >
                      </div>


						<!--=====================================
						ENTRADA PARA EDITAR SEXO
						======================================-->

                       <div class="form-group   ">
                        <label for="editarSexo">Sexo:</label>

                        <div class="input-group">

                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-venus-mars"></i></span>
                          </div>

                          <select class="form-control" name="editarSexo"  id="editarSexo">
                           
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                          </select>

                        </div>
                      </div>


						<!--=====================================
						ENTRADA PARA EDITAR ESTADO CIVIL
						======================================-->

                        <div class="form-group  ">
                          <label for="editarEdoCivil">Estado Civil:</label>

                          <div class="input-group">

                            <div class="input-group-prepend">
                             <!--  <span class="input-group-text"><i class="fa fa-universal-access"></i></span> -->
                           </div>

                           <select class="form-control" name="editarEdoCivil" id="editarEdoCivil">
                            <option value="">Seleccionar Estado Civil</option>
                          
                            <option value="Soltero (a)">Soltero (a)</option>
                            <option value="Casado (a)">Casado (a)</option>
                            <option value="Divorciado (a)">Divorciado (a)</option>
                            <option value="Viudo (a)">Viudo (a)</option>
                            <option value="Unión Libre">Unión Libre</option>
                            <option value="No Especificó">No Especificó</option>
                          
                            
                          </select>

                        </div>

                      </div>



						<!--=====================================
						ENTRADA PARA EDITAR FECHA DE NACIMIENTO
						======================================-->

                       <div class="form-group   ">
                        <label for="editarFechaNac">Fecha de Nacimiento:</label>

                        <div class="input-group">

                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                          </div>

                          <input class="form-control" type="date" value="" name="editarFechaNac" id="editarFechaNac" >

                        </div>
                      </div>

                      <!--  <div class="form-group">
                         <label for="editarFechaNac">Fecha de Nacimiento:</label>

                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">

                          <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="editarFechaNac" autocomplete="off" placeholder="Seleccionar Fecha">

                          <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker" >
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>

                        </div>

                      </div>
 -->
                    

                       <!-- ENTRADA PARA AÑOS CUMPLIDOS -->

                    <!--   <div class="form-group  "> -->
                      <!--  <label for="nuevoEdadActual"> Edad Actual:</label>

                       <div class="input-group"> -->

                       <!--  <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                        </div> 

                        <input type="hidden" name="editarEdadActual" id="editarEdadActual" class="form-control" maxlength="2" placeholder="Años"  >
                      </div>-->
                 <!--    </div> -->


						<!--=====================================
						ENTRADA PARA EDITAR FOTO TRABAJADOR
						======================================-->

                     <div class="form-group   ">

                      <label for="editarFotoT">Fotografia:</label>
                      <div class="custom-file">

                        <input type="file"  class=" custom-file-input EditarnuevaFotoT" name="editarFotoT" >
                        <label class="custom-file-label" for="customFile">Seleccionar Imagen</label>
                      </div>
                    </div>

                    <p >Peso máximo de la imagen 2 MB &nbsp; <span ><i class="  fa fa-upload"></i></span></p>

                      <div class="form-group   ">
                      
                      <div class="img-thumbnail" >
                      
                      <img src="vistas/img/trabajadores/default/icon-jpeg.png" class="rounded previsualizarE" width="107px">

                       <input type="hidden" name="fotoActual" id="fotoActual">
                      
                      </div>
                      </div>

                </div>   <!--====end col-md-6 1=========-->
            
            

                <div class=" col-md-6 px-4"><!--====begin col-md-6 2=========-->



                     <!--=====================================
						ENTRADA PARA EDITAR FECHA DE INGRESO
						======================================-->

                     <div class="form-group  ">
                      <label for="editarFechaIngreso">Fecha de Ingreso:</label>
                      
                      <div class="input-group">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                        </div>

                        <input class="form-control" type="date" value="" name="editarFechaIngreso" id="editarFechaIngreso">

                      </div>
                    </div>


                     <!-- ENTRADA PARA ANTIGUEDAD -->

                   <!--   <div class="form-group "> -->
                      <!--  <label for="nuevoAntiguedad">Antigüedad Laboral:</label> -->

                      <!--  <div class="input-group"> -->

                       <!--  <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-clock-o"></i></span>
                        </div> 

                        <input type="hidden" name="editarAntiguedad" id="editarAntiguedad" class="form-control" maxlength="2" placeholder="Años" autocomplete="off" >-->
                    <!--   </div> -->
                    <!-- </div> -->



                       <!--=====================================
						ENTRADA PARA EDITAR TIPO DE EMPLEADO
						======================================-->

                       <div class="form-group   ">
                        <label for="editarTipoEmpleado">Tipo de Empleado:</label>

                        <div class="input-group ">

                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-id-card-o"></i></span>
                          </div>

                          <select class="form-control" name="editarTipoEmpleado" id="editarTipoEmpleado" >
                            <option value="">Seleccionar Tipo de Empleado</option>
                          
                            <option value="Sindicalizado">Sindicalizado</option>
                            <option value="Eventual">Eventual</option>
                            <option value="Confianza">Confianza</option>
                            <option value="Jubilado">Jubilado</option>

                          </select>
                        </div>

                      </div>



						<!--=====================================
						ENTRADA PARA EDITAR CATEGORIA
						======================================-->

                     <div class="form-group   ">
                      <label for="editarCategoria">Categoría:</label>

                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-tags"></i></span>
                        </div>

                        <select class="form-control" name="editarCategoria" id="editarCategoria" >
                          <option value="">Seleccionar Categoria</option>
                         

                           <?php
                             
                             $item = null;
                             $valor = null;
                             
                             $categoria = ControladorCombobox::ctrMostrarComboCategorias($item, $valor);
                             
                             foreach ($categoria as $key => $value) {
                             
                             echo '<option value="'.$value["categoria"].'">'.$value["categoria"].'</option>';
                             }
                             
                             ?>
                                                
                        </select>
                      </div>

                    </div>



						<!--=====================================
						ENTRADA PARA EDITAR DEPARTAMENTO
						======================================-->

                      <div class="form-group  ">
                      <label for="editarDepartamento">Departamento:</label>

                      <div class="input-group">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-briefcase"></i></span>
                        </div>

                        <select class="form-control"   name="editarDepartamento" id="editarDepartamento">
                           <option value="">Seleccionar Departamento</option>
                           

                           <?php
                             
                             $item = null;
                             $valor = null;
                             
                             $departamento = ControladorCombobox::ctrMostrarComboDepartamentos($item, $valor);
                             
                             foreach ($departamento as $key => $value) {
                             
                             echo '<option value="'.$value["departamento"].'">'.$value["departamento"].'</option>';
                             }
                             
                             ?>

                        </select>
                      </div>

                    </div>



                  <!--=====================================
					ENTRADA PARA EDITAR ESCOLARIDAD
					======================================-->

                    <div class="form-group   ">
                      <label for="editarEscolaridad">Escolaridad:</label>

                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-graduation-cap"></i></span>
                        </div>

                        <select class="form-control" name="editarEscolaridad" id="editarEscolaridad" >
                          <option value="">Seleccionar Escolaridad</option>
                         

                           <?php
                             
                             $item = null;
                             $valor = null;
                             
                             $escolaridad = ControladorCombobox::ctrMostrarComboEscolaridad($item, $valor);
                             
                             foreach ($escolaridad as $key => $value) {
                             
                             echo '<option value="'.$value["escolaridad"].'">'.$value["escolaridad"].'</option>';
                             }
                             
                             ?>

                        </select>
                      </div>

                    </div>



						<!--=====================================
						ENTRADA PARA ESTADO
						======================================-->

                    <div class="form-group   ">
                      <label for="editarMunicipioEstado">Municipio / Estado:</label>

                      <!-- <input type="text" name="editarMunicipioEstado" id="editarMunicipioEstado" class="form-control" value="Culiacán, Sinaloa" readonly=""  > -->

                      <select class="form-control" name="editarMunicipioEstado" id="editarMunicipioEstado" >
                        <option value="">Seleccionar Localidad...</option>
                        <option value="Culiacán, Sinaloa">Culiacán, Sinaloa</option>
                        <option value="Navolato, Sinaloa">Navolato, Sinaloa</option>
                        

                      </select>


                    </div>


                    <!--=====================================
						ENTRADA PARA EDITAR COLONIA
						======================================-->
                     <div class="form-group   ">
                      <label for="editarColonia">Colonia/Fracc./Sindicatura:</label>

                      <div class="input-group ">

                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-crosshairs"></i></span>
                        </div>

                        <select class="form-control"   name="editarColonia" id="editarColonia">
                          <option value="">Seleccionar Colonia</option>

                         
                             <?php
                             
                             $item = null;
                             $valor = null;
                             
                             $colonias = ControladorCombobox::ctrMostrarComboColonias($item, $valor);
                             
                             foreach ($colonias as $key => $value) {
                             
                             echo '<option value="'.$value["colonia"].'">'.$value["colonia"].'</option>';
                             }
                             
                             ?>
                                                                   
                             
                    
                        </select>
                      </div>

                    </div>


                      <!--=====================================
						ENTRADA PARA EDITAR DIRECCION
						======================================-->

                       <div class="form-group   ">
                        <label for="editarDireccion">Dirección:</label>

                        <div class="input-group ">

                         <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-location-arrow"></i></span>
                        </div>

                        <input type="text" name="editarDireccion" id="editarDireccion" class="form-control" placeholder=" Calle y Número" autocomplete="off" style="text-transform:capitalize;" maxlength="50"  >

                      </div>
                    </div>


                       <!--=====================================
						ENTRADA PARA EDITAR TELEFONO
						======================================-->

                       <div class="form-group  ">
                        <label for="editarTelefono">Telefono:</label>

                        <div class="input-group ">

                         <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-mobile fa-lg"></i></span>
                        </div>

                        <input type="text" name="editarTelefono" id="editarTelefono" class="form-control" placeholder=" Número de Telefono" autocomplete="off"  data-inputmask="'mask': '(999) 999-9999'" data-mask  >

                      </div>
                    </div>


                    <!--=====================================
						ENTRADA PARA EDITAR EMAIL
						======================================-->

                       <div class="form-group ">
                        <label for="editarEmail">Email:</label>

                        <div class="input-group ">

                         <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-envelope-o"></i></span>
                        </div>

                        <input type="text" name="editarEmail" id="editarEmail" class="form-control" placeholder="Correo Electronico" autocomplete="off"  >

                      </div>
                    </div>

               </div><!--====end col-md-6 2=========-->


        </div><!--====end row=========-->


          <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">
              <button type="button" id="CancelarEditarTrabajador" class="btn btn-outline-danger " data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancelar</button>
              <button type="submit" class="btn btn-outline-success"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp; Actualizar</button>
            </div>

             <?php
             
             $editarTrabajador = new ControladorTrabajadores();
             $editarTrabajador -> ctrEditarTrabajador();
             
             ?> 
  
       </form>

     </div>

      </div>
      
    </div>
  </div>
</div>



<!--=====================================
MODAL EXPEDIENTE
======================================-->

<div class="modal fade" id="modalExpediente" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

       <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

      <div class="modal-header modal-header-primary">

        <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fa fa-folder-open-o"></i>&nbsp; Expediente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

       <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

      <div class="modal-body">

        <div class="card-header">

          <form method="post" name="editFormUsers" id ="editFormUsers" role="form" enctype="multipart/form-data">

            <div class="col-md-12">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info-active">
                <h3 class="widget-user-username">Alexander Pierce</h3>
                <h5 class="widget-user-desc">Founder & CEO</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src=" " alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
          </div>

            
            

            
           


            <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal"><i class="fa fa-times
                " aria-hidden="true"></i>&nbsp;Cancelar</button>
              <button type="submit" class="btn btn-outline-success"><i class="fa fa-refresh" aria-hidden="true"></i>&nbsp; Actualizar</button>
            </div>

             <?php
             
             $editarTrabajador = new ControladorTrabajadores();
             $editarTrabajador -> ctrEditarTrabajador();
             
             ?> 

      

          </form>
          
        </div>

      </div>
      
    </div>
  </div>
</div>
</body>




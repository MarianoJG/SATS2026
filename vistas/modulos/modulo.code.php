 <!--hidden-->

            <div class=" row form-group hide card-body callout callout-info mt-3" id="hijosTemplate">

                 

             <!-- Registrar Nombre Completo-->
            
            <div class=" col-md-6 ">
              <div class="form-group  ">
               <!--  <label for="nuevoNomHijo">Nombre Completo:</label> -->
                <input type="text" name="nuevoNomHijo" id="nuevoNomHijo" class="form-control"  placeholder="Nombres & Apellidos"  autocomplete="off" style="text-transform:capitalize;"  >
              </div>
              
            </div>

               <!-- Registrar Fecha de Nacimiento-->
            
            <div class=" col-md-5  ">
              <div class="form-group  ">
              <!--   <label for="nuevoFechaNacH">Fecha de Nacimiento:</label> -->
                
                <div class="input-group">
                  
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                  </div>
                  
                  <input class="form-control" type="date" value="" name="nuevoFechaNacH" id="nuevoFechaNacH" >
                  
                </div>
                
              </div>
              
            </div> 

            <!-- Boton agregar registro-->

             <div class=" col-md-1  ">
              <div class="form-group  ">
              <!--   <label for="nuevoFechaNacH">Agregar</label> -->
                
                <div class="input-group">
                  
                 <button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>
                  
                </div>
                
              </div>
              
            </div>   
                   
      
          </div> 













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
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarHijos"><i class="fa fa-plus nav-icon"></i>&nbsp;
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
        <table  class="table tabla-usuarios table-hover table-striped table-bordered dt-responsive nowrap" style="width:100%">
          <thead>
            <tr>
             <th>Id</th>
             <th>Nombres</th>
             <th>Fecha de Nacimiento</th>
             <th>Acciones</th>

            </tr>
          </thead>

          <tbody>
             <?php 

              $item = null;
              $valor = null;


              $trabajadores = ControladorHijos::ctrMostrarHijos($item, $valor);
            
              foreach ($trabajadores as $key => $value){

              echo '
                 <tr>
                 <td>'.$value["id_hijo"].'</td>
                               
                 <td>'.$value["nombre_completo"].'</td>';
                     
                       echo '<td>'.$value["f_nacimiento"].'</td>


                      <td>
                        <div class="btn-group">
                            
                          <button class="btn btn-info btnEditarTrabajador" idTrabajador="'.$value["id_trabajador"].'" data-toggle="modal" data-target="#modalEditarTrabajador"><i class="fa fa-pencil-square-o"></i></button>

                        </div>

                      

                        

                      </td>
              </tr>';

              }

            ?>  
          </tbody>

        </table>
      </div>

    </section>
</div>



<!--=====================================
MODAL AGREGAR HIJOS
======================================-->

<div class="modal fade bd-example-modal-lg" id="modalAgregarHijos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

      <div class="modal-body">

        <div class="card-header  ">
    

        <form method="post" name="registrationFormHijos" id ="registrationFormHijos" role="form"  class="form-horizontal">

           <!--=====================================
           ENTRADA CAPTURISTA POR ID
           ======================================-->
           <div class="row card-body callout callout-info">


             <!--  <div class="  col-md-4  ">
               
                <div class="form-group  ">
                        <label for="buscarNumTrabajador">Numero de Empleado:</label>

                        <div class="input-group ">

                         <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>

                        <input type="text" name="buscarNumTrabajador" id="buscarNumTrabajador" class="form-control" maxlength="5" placeholder=" Buscar" autocomplete="off" >

                      </div>
                    </div>

                      <?php /*

                       $buscarTrabajador = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor);
                     
                      */
                      
                      ?>


                 
            </div>-->

            <div class=" col-md-2  ">
              <div class="form-group  ">
                <label for="trabajadorId">Id:</label>

                <div class="input-group ">


                  <input type="text" name="trabajadorId" id="trabajadorId" class="form-control" placeholder="ID" readonly="" >

                </div>
              </div>
            </div>    


             <div class=" col-md-10  ">
                      <div class="form-group  ">
                        <label for="empleadoEncontrado">Empleado:</label>

                        <div class="input-group ">

                         <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-search "></i></span>
                        </div>

                        <input type="text" name="empleadoEncontrado" id="empleadoEncontrado" class="form-control" placeholder=" Buscar Nombre del Empleado..."  >

                      </div>
                    </div>
            </div>        


          </div> 


              <!--=====================================
           ******ENTRADA PARA HIJOS DE TRABAJADORES****
           ======================================


           <div class="row card-body callout callout-info mt-3">

            <div class=" col-md-6 ">
              <div class="form-group  ">
                <label for="nuevoNomHijo">Nombre Completo:</label>
                <input type="text" name="nuevoNomHijo" id="nuevoNomHijo" class="form-control"  placeholder="Nombres & Apellidos"  autocomplete="off" style="text-transform:capitalize;"  >
              </div>
              
            </div>

            <div class=" col-md-6  ">
              <div class="form-group  ">
                <label for="nuevoFechaNacH">Fecha de Nacimiento:</label>

                <div class="input-group">

                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                  </div>

                  <input class="form-control" type="date" value="" name="nuevoFechaNacH" id="nuevoFechaNacH" >

                </div>

              </div>
              
            </div>        

          </div>  -->

    <!--=====================================
          xxxxxxxxxxxxxxxxxxxxxxxxxxxx
          ====================================== -->
          <div class=" row form-group card-body callout callout-info mt-3"> <!--inicio row-->

            <div class=" col-md-6 ">
              <div class="form-group  ">
                <label for="nuevoNomHijo">Nombre Completo:</label>
                <input type="text" name="nuevoNomHijo" id="nuevoNomHijo" class="form-control"  placeholder="Nombres & Apellidos"  autocomplete="off" style="text-transform:capitalize;"  >
              </div>
            </div>


            <div class=" col-md-5  ">
              <div class="form-group  ">
                <label for="nuevoFechaNacH">Fecha de Nacimiento:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                  </div>
                  <input class="form-control" type="date" value="" name="nuevoFechaNacH" id="nuevoFechaNacH" >
                </div>
              </div>
            </div> 


            <div class=" col-md-1  ">
              <div class="form-group ">
                <label for="nuevoFechaNacH">Agregar</label>
                <div class="input-group">
                  <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
                </div>
              </div>
            </div> 


          </div><!--fin row-->


            <!--hide --> 

            <div class=" row form-group hide card-body callout callout-info mt-3" id="hijosTemplate"> <!--inicio row-->

              <div class=" col-md-6 ">
                <div class="form-group ">
                  <label for="nuevoNomHijo">Nombre Completo:</label>
                  <input type="text" name="nuevoNomHijo" id="nuevoNomHijo" class="form-control"  placeholder="Nombres & Apellidos"  autocomplete="off" style="text-transform:capitalize;"  >
                </div>
              </div>


              <div class=" col-md-5  ">
                <div class="form-group   ">
                  <label for="nuevoFechaNacH">Fecha de Nacimiento:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input class="form-control" type="date" value="" name="nuevoFechaNacH" id="nuevoFechaNacH" >
                  </div>
                </div>
              </div> 


              <div class=" col-md-1  ">
                <div class="form-group   ">
                  <label for="nuevoFechaNacH">Agregar</label>
                  <div class="input-group">
                    <button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
              </div> 
            </div>   

         

            <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">
              <button type="button" id="btnCancelar" class="btn btn-outline-danger"  data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancelar</button>
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




















<form method="post" name="registrationFormHijos" id ="registrationFormHijos" role="form"  class="form-horizontal">



            <div class=" form-group card-body callout callout-info mt-3"> <!--inicio row-->

            <div class=" col-md-6 ">
              <div class="form-group  ">
                <label for="nuevoNomHijo">Nombre Completo:</label>
                <input type="text" name="nuevoNomHijo" id="nuevoNomHijo" class="form-control"  placeholder="Nombres & Apellidos"  autocomplete="off" style="text-transform:capitalize;"  >
              </div>
            </div>


            <div class=" col-md-5  ">
              <div class="form-group  ">
                <label for="nuevoFechaNacH">Fecha de Nacimiento:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                  </div>
                  <input class="form-control" type="date" value="" name="nuevoFechaNacH" id="nuevoFechaNacH" >
                </div>
              </div>
            </div> 


            <div class=" col-md-1  ">
              <div class="form-group ">
                <label for="nuevoFechaNacH">Agregar</label>
                <div class="input-group">
                  <button type="button" class="btn btn-default addButton"><i class="fa fa-plus"></i></button>
                </div>
              </div>
            </div> 


            <!--hide --> 

            <div class="  form-group hide card-body callout callout-info mt-3" id="hijosTemplate"> <!--inicio row-->

              <div class=" col-md-6 ">
                <div class="form-group ">
                  <label for="nuevoNomHijo">Nombre Completo:</label>
                  <input type="text" name="nuevoNomHijo" id="nuevoNomHijo" class="form-control"  placeholder="Nombres & Apellidos"  autocomplete="off" style="text-transform:capitalize;"  >
                </div>
              </div>


              <div class=" col-md-5  ">
                <div class="form-group   ">
                  <label for="nuevoFechaNacH">Fecha de Nacimiento:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                    </div>
                    <input class="form-control" type="date" value="" name="nuevoFechaNacH" id="nuevoFechaNacH" >
                  </div>
                </div>
              </div> 


              <div class=" col-md-1  ">
                <div class="form-group   ">
                  <label for="nuevoFechaNacH">Agregar</label>
                  <div class="input-group">
                    <button type="button" class="btn btn-default removeButton"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
              </div> 

            </div>   








                <!--=====================================
                PIE DEL MODAL
                ======================================-->
                
                <div class="modal-footer">
                  <button type="button" id="btnCancelar" class="btn btn-outline-danger"  data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancelar</button>
                  <button type="submit" class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Guardar</button>
                </div>
                
                <?php 
                
                $crearHijo = new ControladorHijos();
                $crearHijo -> ctrCrearHijo();
                
                
                ?>
                
                
              </form>








              <!--CONTROLADOR HIJOS CONTROLADOR -->

              <?php

class ControladorHijos{

  /*=============================================
  REGISTRAR HIJOS DE TRABAJADORES 
  =============================================*/

  static public function ctrCrearHijo(){

    if(isset($_POST["nuevoNomHijo"])){

      if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNomHijo"])
       
        ){

          
        $tabla = "hijos";
    
        $datos = array(
                
                // "nombre_completo"   => ucwords($_POST["nuevoNomHijo"]),
                // "f_nacimiento"    => $_POST["nuevoFechaNacH"]
                // 
                "nombre_completo"    => ucwords($_POST["nuevoNomHijo"]),
              
                
                "f_nacimiento"    => $_POST["nuevoFechaNacH"]


                
                );


        $respuesta = ModeloHijos::mdlCrearHijo($tabla, $datos);
      
        if($respuesta == "ok"){

          echo
              '<script>

                swal
                ("Excelente!", "Registro Guardado Con Exito!", "success");
                window.setTimeout (function(){
                  window.location.href ="registro-hijos";
                  },1500);

              </script>';

        } 


      }else{

        echo '<script>

          swal({

            type: "error",
            title: "¡El Nombre no puede ir vacío o llevar caracteres especiales!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"

          }).then(function(result){

            if(result.value){
            
              window.location = "registro-hijos";

            }

          });
        

        </script>';

      }
    }
  }


    



        
         

  

  /*=============================================
  MOSTRAR TRABAJADORES
  =============================================*/

  static public function ctrMostrarHijos($item, $valor){

    $tabla = "hijos";

    $respuesta = ModeloHijos::mdlMostrarHijos($tabla, $item, $valor);

    return $respuesta;
  
  }
}
  





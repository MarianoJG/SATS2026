<?php

if($_SESSION["perfil"] == "Capturista"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<body class="hold-transition sidebar-mini bg-p2-pages" style="height: auto;">

  <div class="content-wrapper ">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mt-5 pt-2">
          <div class="col-sm-6">
            <h1>&nbsp;Administrar Usuarios del Sistema</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="inicio">Inicio</a></li>
              <li class="breadcrumb-item active">Administración</li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        
          <div>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario"><i class="fa fa-plus nav-icon"></i>&nbsp;
            Agregar Usuario
          </button>
        </div>
        
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

    <section class="account-content">
      <div class="card-body">
        <table  class="table  tablas table-hover table-striped table-bordered dt-responsive nowrap" style="width:100%">
          <thead>
            <tr>

              <th>Id</th>
              <th>Nombres de Usuarios</th>
              <th>Foto</th>
              <th>Usuario Login</th>
              <th>Perfil</th>
              <th>Estado</th>
              <th>Último Login</th>
              <th>Acciones</th>

            </tr>
          </thead>

          <tbody>

            <?php 

              $item = null;
              $valor = null;

              $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);
            
              foreach ($usuarios as $key => $value){

              echo '
              <tr>
                <td>'.$value["id"].'</td>
              <td>'.$value["nombre"].'</td>';
                      

                      if($value["foto"] != ""){

                        echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                      }else{

                        echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                      }

                      echo '<td>'.$value["usuario"].'</td>';

                      echo '<td>'.$value["perfil"].'</td>';

                      if($value["estado"] != 0){

                        echo '<td><button class="btn btn-success btn-sm btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                      }else{

                        echo '<td><button class="btn btn-danger btn-sm btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                      }             

                      echo '<td>'.$value["ultimo_login"].'</td>
                      <td>

                        <div class="btn-group">
                        <span data-toggle="modal" data-target="#modalEditarUsuario"><button class="btn btn-info btnEditarUsuario" idUsuario="'.$value["id"].'"" data-toggle="tooltip" data-placement="top" title="Editar"><i class="fa fa-pencil-square-o"></i></button></span>
                        </div>

                        <div class="btn-group">

                          <button class="btn btn-danger btnEliminarUsuario"  idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'" data-toggle="tooltip" data-placement="top" title="Eliminar"><i class="fa fa-times-circle"></i></button>
                          
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
MODAL AGREGAR USUARIO
======================================-->

<div class="modal fade" id="modalAgregarUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

      <div class="modal-header modal-header-primary">

        <h5 class="modal-title text-ligth" id="exampleModalLabel"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp; Agregar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

      <div class="modal-body">

        <div class="card-header  ">

          <form method="post" name="registrationFormUsers" id ="registrationFormUsers" role="form" enctype="multipart/form-data">

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
              </div>
              <input type="text" name="nuevoNombre" id="nuevoNombre" class="form-control" placeholder="Nombre & Apellido" autocomplete="off" required="" style="text-transform:capitalize;">
            </div>

            <!-- ENTRADA PARA EL USUARIO -->

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user-secret"></i></span>
              </div>
              <input type="text" name="nuevoUsuario" id="nuevoUsuario" class="form-control" placeholder=" Usuario del Sistema (Alias)" autocomplete="off" required="" >
            </div>

            <!-- ENTRADA PARA EL PASSWORD -->

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
              </div>
              <input type="password" name="nuevoPassword" id="nuevoPassword" class="form-control" placeholder=" Contraseña" autocomplete="off" required="">
            </div>


            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-cogs"></i></span>
              </div>

              <select class="form-control" name="nuevoPerfil" required="">
                <option value="">Seleccionar Perfil</option>
                <option value="Administrador">Administrador</option>
                <option value="Super Usuario">Super Usuario</option>
                <option value="Secretario General">Secretario General</option>
                <option value="Capturista">Capturista</option>
                <option value="Admin Finanzas">Admin Finanzas</option>
                <option value="Personal Finanzas">Personal Finanzas</option>
                <option value="Admin Escalafon">Admin Escalafon</option>
                <option value="Admin Actas y Acuerdos">Admin Actas y Acuerdos</option>
              </select>

            </div>


            <!-- ENTRADA PARA SUBIR FOTO -->

            <label for="foto">Fotografia</label>
            <div class="custom-file">
            
              <input type="file"  class=" custom-file-input nuevaFoto" name="nuevaFoto" >
              <label class="custom-file-label" for="customFile">Seleccionar Imagen</label>
            </div>
            <p >Peso máximo de la imagen 2 MB &nbsp; <span ><i class="  fa fa-upload"></i></span></p>

            <div class="img-thumbnail " >
              <img src="vistas/img/usistema/default/cam.png" class="rounded previsualizar" width="80px">

            </div>

            <!--=====================================
            PIE DEL MODAL
            ======================================-->

            <div class="modal-footer">
              <button type="button" id="btnCancelar" class="btn btn-outline-danger"  data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Cancelar</button>
              <button type="submit" class="btn btn-outline-success"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;Guardar</button>
            </div>

            <?php 

            $crearUsuario = new ControladorUsuarios();
            $crearUsuario -> ctrCrearUsuario();

            ?>


          </form>
          
        </div>

      </div>
      
    </div>
  </div>
</div>


<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div class="modal fade" id="modalEditarUsuario" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

      <div class="modal-header modal-header-info">

        <h5 class="modal-title text-white" id="exampleModalLabel"><i class="fa fa-pencil"></i>&nbsp; Editar Usuario</h5>
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

            <!-- ENTRADA PARA EL NOMBRE -->

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user"></i></span>
              </div>
              <input type="text" class="form-control" id="editarNombre" name="editarNombre"   value="" autocomplete="off" required="" style="text-transform:capitalize;">
            </div>

            <!-- ENTRADA PARA EL USUARIO -->

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-user-secret"></i></span>
              </div>
              <input type="text" class="form-control" id="editarUsuario" name="editarUsuario"   value="" readonly >
            </div>

            <!-- ENTRADA PARA EL PASSWORD -->

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-lock"></i></span>
              </div>
              <input type="password" class="form-control" name="editarPassword"  placeholder=" Nueva Contraseña">

              <input type="hidden" id="passwordActual" name="passwordActual">
            </div>


            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fa fa-cogs"></i></span>
              </div>

              <select class="form-control" name="editarPerfil" required="">
                <option value="" id="editarPerfil"></option>
                <option value="Administrador">Administrador</option>
                <option value="Super Usuario">Super Usuario</option>
                <option value="Secretario General">Secretario General</option>
                <option value="Capturista">Capturista</option>
                <option value="Admin Finanzas">Admin Finanzas</option>
                <option value="Personal Finanzas">Personal Finanzas</option>
                <option value="Admin Escalafon">Admin Escalafon</option>
                <option value="Admin Actas y Acuerdos">Admin Actas y Acuerdos</option>
              </select>

            </div>


            <!-- ENTRADA PARA EDITAR SUBIR FOTO -->

            <label for="foto">Fotografia</label>
            <div class="custom-file">
            
              <input type="file"  class=" custom-file-input EditarnuevaFoto" name="editarFoto" >
              <label class="custom-file-label" for="customFile">Seleccionar Imagen</label>
            </div>
            <p >Peso máximo de la imagen 2 MB &nbsp; <span ><i class="  fa fa-upload"></i></span></p>

            <div class="img-thumbnail" >
              <img src="vistas/img/usistema/default/cam.png" class="rounded previsualizarE " width="80px">

              <input type="hidden" name="fotoActual" id="fotoActual">

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
            
            $editarUsuario = new ControladorUsuarios();
            $editarUsuario -> ctrEditarUsuario();
            
            ?> 


          </form>
          
        </div>

      </div>
      
    </div>
  </div>
</div>
</body>

<?php

  $borrarUsuario = new ControladorUsuarios();
  $borrarUsuario -> ctrBorrarUsuario();

?> 






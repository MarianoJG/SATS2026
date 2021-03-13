
<!-- HOME -->

<body class="hold-transition sidebar-mini bg-accpunt-pages" style="height: auto;">
       
<div class="wrapper-page">

    <div class="account-pages">
                                       
        <div class="account-box">
            <div class="contenido-logo-box">
                <h2 class="text-uppercase text-center">
                    <a href="#" class="text-success">
                        <span><img src="assets/images/satsloginY023.svg" alt="" width="140" height="140"></span>
                    </a>

                </h2>
                
                
                   <p class="h6 font-weight-normal text-center text-white" ><span><img src="assets/images/management.svg"  height="40" width="40"></span> &nbsp;Sistema de Administración de Trabajadores Sindicalizados </p>
             

                <h6 class="text-uppercase text-center text-light font-bold mt-4">Iniciar Sesión</h6>

            </div>

            <div class="account-content">
                <form class="form-horizontal" id="login" name="login" method="post">

                    <div class="form-group m-b-20 row">
                        <div class="col-12">
                            <!--  <label for="usuario">Usuario</label> -->
                            <div class="input-group">
                                
                                <input class="form-control" type="text" id="ingUsuario" name="ingUsuario" autocomplete="off"  placeholder=" Usuario" autofocus="" >

                                <div class="input-group-append">
                                    <span class="fa fa-user input-group-text"></span>
                                </div>

                            </div>   
                        </div>
                    </div>


                    <div class="form-group row m-b-20">
                        <div class="col-12">
                            <!-- <a href="#" class="text-muted pull-right"><small>Forgot your password?</small></a> -->
                            <!--  <label for="password">Contraseña</label> -->
                            <div class="input-group">
                               
                                
                                <input class="form-control" type="password"  id="ingPassword" name="ingPassword" autocomplete="off" placeholder=" Contraseña">

                                <div class="input-group-append">
                                    <span class="fa fa-lock input-group-text"></span>
                                </div>

                            </div>  
                        </div>
                    </div>

                    <div class="form-group row m-b-20">
                        <div class="col-12">

                        </div>
                    </div>

                    <div class="form-group row text-center m-t-10">
                        <div class="col-12">
                            <button class="btn btn-block btn-secondary  waves-light waves-effect w-md" type="submit" name="btnEntrar" value="Entrar" id="btnEntrar">Entrar</button>
                        </div>
                    </div>

                    <div class="row m-t-50">
                        <div class="col-sm-12 text-center">

                            <p class="text-muted">STASAC <a href="#" class="text-dark m-l-5"><b>&nbsp; 2020-2023</b></a></p>
                        </div>
                        
                    </div>

                    <?php

                    $login = new ControladorUsuarios();
                    $login -> ctrIngresoUsuario();

                    ?>

                </form>

                

            </div>
             <!-- end content-->

              <!-- BEGIN SCRIPT  ERROR MESAGGE -->

                 <script>
                    with(document.login){
                        onsubmit = function(e){
                            e.preventDefault();
                            ok = true;
                            if(ok && ingUsuario.value==""){
                                ok=false;
                                $('#errorMessage').show('fade');
                                setTimeout(function () {
                                    $('#errorMessage').hide('fade');
                                }, 2500);
                                $('#linkClose').click(function () {
                                    $('#errorMessage').hide('fade');
                                });
                                ingUsuario.focus();
                            }
                            if(ok && ingPassword.value==""){
                                ok=false;
                                $('#errorMessage2').show('fade');
                                setTimeout(function () {
                                    $('#errorMessage2').hide('fade');
                                }, 2500);
                                $('#linkClose').click(function () {
                                    $('#errorMessage2').hide('fade');
                                });
                                ingPassword.focus();
                            }
                            if(ok){ submit(); }
                        }
                    }

                </script>

                   <!-- END SCRIPT  ERROR MESAGGE -->

                   <!-- ALERT  ERROR MESAGGE -->

                <div class="alert alert-danger" id="errorMessage" style="display:none;">
                    <a class="close" data-dismiss="alert" href="#">×</a><strong>Error !</strong> Nombre de Usuario Vacio.
                </div>

                <div class="alert alert-danger" id="errorMessage2" style="display:none;">
                    <a class="close" data-dismiss="alert" href="#">×</a><strong>Error !</strong> Contraseña Vacia.
                </div>

                 <!-- END ALERT  ERROR MESAGGE -->
              
   
        </div><!--end account-box-->
    </div>
    <!-- end card-box-->

</div>
<!-- end wrapper -->
</body>

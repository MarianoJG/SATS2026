 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-danger elevation-4">
    <!-- Brand Logo -->
    <a href="inicio" class="brand-link">
      <img src="vistas/img/plantilla/satsloginY023.svg" alt height="50" 
          >
      <span class="brand-text font-weight-light">&nbsp; S T A S A C</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         <?php

          if($_SESSION["foto"] != ""){

            echo '<img src="'.$_SESSION["foto"].'"alt="User Avatar" class="img-size-5 mr-3 img-circle" height="70">';
            
          }else{


            echo '<img src="vistas/img/usistema/default/default_user.png" class="user-image">';
            
          }


          ?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php  echo $_SESSION["nombre"]; ?></a>
          <small><a href="#"><i class="fa fa-circle text-success"></i>&nbsp; En linea</a></small>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar  flex-column" data-widget="treeview" role="menu" data-accordion="false">

       
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library menu-open -->
        
        <?php
         /* MODULO DE CONTROL Y SEGUIMIENTO PERMISO SOLO ADMINISTRADOR */

          if($_SESSION["perfil"] == "Administrador")
           {

             echo '<li class="nav-header">CONTROL Y SEGUIMIENTO</li>  

              <li class="nav-item has-treeview ">

                <a href="inicio" class="nav-link active">
                  <i class="nav-icon fa fa-dashboard"></i>
                  <p>
                    Administración
                    <i class="right fa fa-angle-left"></i>
                  </p>
                </a>

                 

                <ul class="nav nav-treeview">

                  <li class="nav-item">
                    <a href="usuarios" class="nav-link  ">
                      <i class="fa fa-users nav-icon"></i>
                      <p>Usuarios</p>
                    </a>
                  </li>

                   <li class="nav-item">
                    <a href="registro-trabajadores" class="nav-link ">
                      <i class="fa fa-plus-square-o nav-icon"></i>
                      <p>Registro Trabajadores</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="registro-hijos" class="nav-link ">
                      <i class="fa fa-plus-square-o nav-icon"></i>
                      <p>Registro Hijos</p>
                    </a>
                  </li>

                   ';

          } 

          /* MODULO DE CONTROL Y SEGUIMIENTO CAPTURA PERMISOS SOLO ADMINISTRADOR Y CAPTURISTA */

           if($_SESSION["perfil"] == "Capturista" )
           {

             echo '<li class="nav-header">CONTROL Y SEGUIMIENTO</li>  

              <li class="nav-item has-treeview ">

                <a href="inicio" class="nav-link active">
                  <i class="nav-icon fa fa-dashboard"></i>
                  <p>
                    Administración
                    <i class="right fa fa-angle-left"></i>
                  </p>
                </a>

                 

                <ul class="nav nav-treeview">
                                 
                  <li class="nav-item">
                    <a href="registro-trabajadores" class="nav-link ">
                      <i class="fa fa-plus-square-o nav-icon"></i>
                      <p>Registro Trabajadores</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="registro-hijos" class="nav-link ">
                      <i class="fa fa-plus-square-o nav-icon"></i>
                      <p>Registro Hijos</p>
                    </a>
                  </li>';
 
          } 

            /* MODULO DE CONTROL Y SEGUIMIENTO PERMISOS SOLO ADMINISTRADOR */

           if($_SESSION["perfil"] == "Administrador" )
           {

             echo ' <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-list nav-icon"></i>
                        <p>Listado</p>
                      </a>
                   </li>

                   <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-list-alt nav-icon"></i>
                        <p>Reportes</p>
                      </a>
                   </li>

                   <li class="nav-item">
                      <a href="#" class="nav-link">
                        <i class="fa fa-bar-chart nav-icon"></i>
                        <p>Gráficas</p>
                      </a>
                  </li>
                  
                </ul>

              </li> ';


          } 


           /* MODULO DE ESCALAFON PERMISOS SOLO ADMINISTRADOR  */

           if($_SESSION["perfil"] == "Administrador" )
           {

             echo '   <li class="nav-header">SECRETARÍAS</li>

             <li class="nav-item has-treeview ">

            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-line-chart"></i>
              <p>
                Escalafon
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="escalafon-cambio-categoria" class="nav-link ">
                  <i class="fa fa-tag nav-icon"></i>
                  <p>Cambio de Categoría</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="escalafon-cambio-adscripcion" class="nav-link ">
                  <i class="fa fa-briefcase nav-icon"></i>
                  <p>Cambio de Adscripción</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-exchange nav-icon"></i>
                  <p>Sustituciones Bases</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-tags nav-icon"></i>
                  <p>Recategorización</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="escalafon-complemento" class="nav-link ">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Complemento</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="escalafon-comision" class="nav-link ">
                  <i class="fa fa-building-o nav-icon"></i>
                  <p>Comision</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-suitcase nav-icon"></i>
                  <p>Permuta</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="escalafon-apoyo-transporte" class="nav-link ">
                  <i class="fa fa-bus nav-icon"></i>
                  <p>Apoyo de Transporte</p>
                </a>
              </li>
              
              
            
              
            </ul>
          </li>  ';

          }


             /* MODULO DE ESCALAFON PERMISOS SOLO ADM ESCALAFON */

           if($_SESSION["perfil"] == "Admin Escalafon"  )
           {

             echo '  <li class="nav-header">SECRETARÍAS</li>

             <li class="nav-item has-treeview  menu-open ">

            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-line-chart"></i>
              <p>
                Escalafon
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>

           <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="registro-trabajadores" class="nav-link  ">
                  <i class="fa fa-list-ul nav-icon"></i>
                  <p>Padrón Trabajadores</p>
                </a>
              </li>

             
              <li class="nav-item">
                <a href="escalafon-cambio-categoria" class="nav-link ">
                  <i class="fa fa-tag nav-icon"></i>
                  <p>Cambio de Categoría</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="escalafon-cambio-adscripcion" class="nav-link ">
                  <i class="fa fa-briefcase nav-icon"></i>
                  <p>Cambio de Adscripción</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-exchange nav-icon"></i>
                  <p>Sustituciones Bases</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-tags nav-icon"></i>
                  <p>Recategorización</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="escalafon-complemento" class="nav-link ">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Complemento</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="escalafon-comision" class="nav-link ">
                  <i class="fa fa-building-o nav-icon"></i>
                  <p>Comision</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-suitcase nav-icon"></i>
                  <p>Permuta</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="escalafon-apoyo-transporte" class="nav-link ">
                  <i class="fa fa-bus nav-icon"></i>
                  <p>Apoyo de Transporte</p>
                </a>
              </li>
              
              
            
              
           </ul>
          </li>  ';

          }




             /* MODULO DE ACTAS Y ACUERDOS PERMISOS SOLO ADMINISTRADOR Y ADM ACTAS Y ACUERDOS */

           if($_SESSION["perfil"] == "Administrador" )
           {

             echo ' 

           <li class="nav-item has-treeview ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Actas y Acuerdos
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

             
              
              <li class="nav-item">
                <a href="nuevas-bases" class="nav-link ">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Nuevas Bases</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-files-o nav-icon"></i>
                  <p>Agregar Actas</p>
                </a>
              </li>
             
              
            </ul>
          </li> ';


          }


            /* MODULO DE ACTAS Y ACUERDOS PERMISOS SOLO Y ADM ACTAS Y ACUERDOS */

           if($_SESSION["perfil"] == "Admin Actas y Acuerdos" )
           {

             echo ' <li class="nav-header">SECRETARÍAS</li>

           <li class="nav-item has-treeview menu-open ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Actas y Acuerdos
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="registro-trabajadores" class="nav-link  ">
                  <i class="fa fa-list-ul nav-icon"></i>
                  <p>Padrón Trabajadores</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="nuevas-bases" class="nav-link ">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Nuevas Bases</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-files-o nav-icon"></i>
                  <p>Agregar Actas</p>
                </a>
              </li>
             
              
            </ul>
          </li> ';


          }


           


            /* MODULO DE FINANZAS PERMISOS SOLO ADMINISTRADOR Y ADM FINANZAS */

           if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Admin Finanzas" )
           {

             echo ' 

           <li class="nav-item has-treeview ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fa fa-money"></i>
              <p>
                Finanzas
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-plus-square-o nav-icon"></i>
                  <p>Registro Prestamos</p>
                </a>
              </li>
             
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Listado</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Reportes</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-bar-chart nav-icon"></i>
                  <p>Gráficas</p>
                </a>
              </li>
            </ul>
          </li> ';


          }


           

            /* MODULO DE PROMOCION FINANCIERA PERMISOS SOLO ADMINISTRADOR Y ADM PFINANCIERA */

           if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Admin Prom. financiera" )
           {

             echo '  <li class="nav-item has-treeview ">
            <a href="#" class="nav-link active">

              <i class="nav-icon fa fa-usd"></i>
              <p>
                Prom. Financiera
                <i class="right fa fa-angle-left"></i>
              </p>

            </a>

            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-plus-square-o nav-icon"></i>
                  <p>Reg. Movientos</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Listado</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Reportes</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-bar-chart nav-icon"></i>
                  <p>gráficas</p>
                </a>
              </li>

            </ul>
          </li> ';


          } 

          /* MODULO DE PROMOCION FINANCIERA PERMISOS SOLO ADMINISTRADOR Y ADM EDUCACION */

           if($_SESSION["perfil"] == "Administrador" || $_SESSION["perfil"] == "Admin Educacion" )
           {

             echo '   <li class="nav-item has-treeview ">
            <a href="inicio" class="nav-link active">
              <i class="nav-icon fa fa-graduation-cap"></i>
              <p>
                Educación
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
             
              <li class="nav-item">
                <a href="#" class="nav-link ">
                  <i class="fa fa-plus-square-o nav-icon"></i>
                  <p>Reg. Movientos</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Listado</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-list-alt nav-icon"></i>
                  <p>Reportes</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-bar-chart nav-icon"></i>
                  <p>gráficas</p>
                </a>
              </li>
            </ul>
          </li> ';


          }             
         
      ?>


        
        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
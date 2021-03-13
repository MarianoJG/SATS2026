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

          <tbody>

             <?php 

              $item = null;
              $valor = null;


              $trabajadores = ControladorTrabajadores::ctrMostrarTrabajadores($item, $valor);
            
              foreach ($trabajadores as $key => $value){

              echo '
                 <tr>
                 <td>'.$value["id_trabajador"].'</td>
                 <td>'.$value["num_empleado"].'</td>
                 <td>'.$value["nombres"].'</td>
                 <td>'.$value["a_paterno"].'</td>
                 <td>'.$value["a_materno"].'</td>';

 
                      if($value["fotot"] != ""){

                        echo '<td><img src="'.$value["fotot"].'" class="img-thumbnail" width="40px"></td>';

                      }else{

                        echo '<td><img src="vistas/img/trabajadores/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                      }

                  
                       echo '<td>'.$value["tipo_empleado"].'</td>';
                       echo '<td>'.$value["categoria"].'</td>';
                       echo '<td>'.$value["departamento"].'</td>


                      <td>
                      
                      <div class="btn-group">

                        <span data-toggle="modal" data-target="#modalEditarTrabajador">

                          <button class="btn btn-info btnEditarTrabajador" idTrabajador="'.$value["id_trabajador"].'" data-toggle="tooltip" data-placement="top" title="Editar">

                            <i class="fa fa-pencil-square-o"></i>

                          </button>

                        </span>

                      </div>
                      
                        
                        
                        

                        <div class="btn-group">  
                          <button class="btn btn-warning "><i class="fa fa-folder-open-o"></i></button>

                        </div>
                        
                        <div class="btn-group">';

                      if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-outline-primary btnPrintTrabajador" idTrabajador="'.$value["id_trabajador"].'"data-toggle="tooltip" data-placement="top" title="Imprimir" >

                          <i class="ion ion-android-print" ></i>

                          </button>';

                      }

                      '</div>  

                        
                        
                        

                        

                      </td>
              </tr>';

              }

            ?>  
             <tfoot>
           <!--  <tr>
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

           </tr> -->
         </tfoot>  
           
          </tbody>
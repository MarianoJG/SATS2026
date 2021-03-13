
/*=============================================>>>>>
= INICIO MODAL #modalAgregarComplemento =
===============================================>>>>>*/

 

$.fn.select2.defaults.set('language', 'es');

$('#modalAgregarComplemento').on('shown.bs.modal', function () {



  /*==ACTIVAR AGREGAR CAMPOS SELECT2 EN APOYO TRANSPORTE==*/

     $('#buscaTrabajador').select2({
       minimumInputLength: 2,
       theme: 'bootstrap4',
       placeholder: $(this).attr('placeholder'),
       allowClear: Boolean($(this).data('allow_clear')),

     })

  /*=FIN ACTIVAR AGREGAR CAMPOS SELECT2 EN APOYO TRANSPORTE =*/

  


  /*==FORMATO DE CANTIDAD AL MONTO==*/

    $("#nuevoMontoComplemento").number(true, 2);

        $(document).ready(function () {
            $("#nuevoMontoComplemento").keyup(function () {
                var value = $(this).val();
                $("#MontoComplemento").val(value);
            });
    });

  /*=FIN FORMATO DE CANTIDAD AL MONTO =*/
  



  /*== BUSCA EL TRABAJADOR POR NUM DE EMPLEADO Y SE CARGAN LOS DATOS NOMBRES Y TIPO EMP ==*/
    
    $('#buscaTrabajador').change(function() {
     var idTrabajador = $(this).val();
     var datos = new FormData();
     datos.append('idTrabajador', idTrabajador);
     $.ajax({
       url:"ajax/trabajadores.ajax.php",
       method: "POST",
       data: datos,
       cache: false,
       contentType: false,
       processData: false,
       
       dataType: "json",
       success: function(respuesta){
     
        
         $("#trabajadorId").val(respuesta["id_trabajador"]);

         $("#nomTrabajador").val(respuesta["nombres"] + " " + (respuesta["a_paterno"])  + " " + (respuesta["a_materno"]) );

         $("#tipoEmpleado").val(respuesta["tipo_empleado"]);

       }

     })

    });

  /*=BUSCA EL TRABAJADOR POR NUM DE EMPLEADO Y SE CARGAN LOS DATOS NOMBRES Y TIPO EMP =*/
 



  /*= VALIDACION REVISAR SI EL NUMERO DE EMPLEADO YA ESTA REGISTRADO=
  

    $("#buscaTrabajador").change(function(){
    
      $(".alert").remove();


      var id_trabajador = $(this).val();

      var datos = new FormData();
      datos.append("validarTrabajador", id_trabajador);

       $.ajax({
          url:"ajax/complemento.ajax.php",
          method:"POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success:function(respuesta){
            
            if(respuesta){
              
              //$('#buscaTrabajador').val("null").trigger('change.select2');//limpia campo categoria select2
              $("#buscaTrabajador").prop("disabled", true);//deshabilita buscar trabajador
           
              $("#trabajadorId").val('');//limpia campo id_trabajador
              $("#trabajadorId").html('');//limpia campo id_trabajador

              $(".seccion1").parent().after('<div class="alert alert-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp; Este empleado ya cuenta con APOYO DE TRANSPORTE...</div>');//envia alerta
               
                $(".OcultarSeccion2").hide();
                $("#btnGuardar").hide();
                $('#nuevoFechaComplemento').attr('readonly', true);
              
              
            }

            else{

                $(".OcultarSeccion2").show();
                $("#btnGuardar").show();
               
                $('#nuevoFechaComplemento').attr('readonly', false);   

               $("#nomTrabajador").parent().after('<div class="alert alert-success"><i class="fa fa-bus" aria-hidden="true"></i>&nbsp; APOYO DE TRANSPORTE &nbsp;&nbsp;<i class="fa fa-check-square-o" aria-hidden="true"></i> Disponible.</div>');

            }    

          }

      })

    })*/

  /*= FIN VALIDACION REVISAR SI EL NUMERO DE EMPLEADO YA ESTA REGISTRADO=*/

  
})
 
/*=============================================<<<<<*/ 
/*=FIN DE MODAL #modalAgregarComplemento =*/
/*=============================================<<<<<*/





/*=============================================>>>>>
= INICIO MODAL #modalEditarComplemento =
===============================================>>>>>*/

 /*==EDITAR CAMPOS SELECT2 EN APOYO DE TRANSPORTE==*/
 

$.fn.select2.defaults.set('language', 'es');

$('#modalEditarComplemento').on('shown.bs.modal', function () {


     $('#EditarbuscaTrabajador').select2({
       minimumInputLength: 2,
       theme: 'bootstrap4',
       placeholder: $(this).attr('placeholder'),
       allowClear: Boolean($(this).data('allow_clear')),


     });

    

    /*==FORMATO DE CANTIDAD AL MONTO EDITAR===*/


    $("#EditarnuevoMontoComplemento").number(true, 2);

        $(document).ready(function () {
            $("#EditarnuevoMontoComplemento").keyup(function () {
                var value = $(this).val();
                $("#EditarMontoComplemento").val(value);
            });
    });
 

    /*==PARA EDITAR BUSCA TRABAJADOR POR AJAX LO ENCUENTRA Y CARGA LOS DATOS A LOS CAMPOS==*/ 

     $('#EditarbuscaTrabajador').change(function() {
       var idTrabajador = $(this).val();
       var datos = new FormData();
       datos.append('idTrabajador', idTrabajador);
       $.ajax({
         url:"ajax/trabajadores.ajax.php",
         method: "POST",
         data: datos,
         cache: false,
         contentType: false,
         processData: false,
         dataType: "json",
         success: function(respuesta){
          

           $("#EditartrabajadorId").val(respuesta["id_trabajador"]);

           $("#EditarnomTrabajador").val(respuesta["nombres"] + " " + (respuesta["a_paterno"])  + " " + (respuesta["a_materno"]) );

            $("#EditartipoEmpleado").val(respuesta["tipo_empleado"]);


         }

       })

     });



       /*= VALIDACION EDITAR / REVISAR SI EL NUMERO DE EMPLEADO YA ESTA REGISTRADO=
  

    $("#EditarbuscaTrabajador").change(function(){
    
      $(".alert").remove();

    
      var id_trabajador = $(this).val();

      var datos = new FormData();
      datos.append("validarTrabajador", id_trabajador);

       $.ajax({
          url:"ajax/apoyo-transporte.ajax.php",
          method:"POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success:function(respuesta){
            
            if(respuesta){
              
              //$('#EditarbuscaTrabajador').val("null").trigger('change.select2');//limpia campo categoria select2
              $("#EditarbuscaTrabajador").prop("disabled", true);//deshabilita buscar trabajador
           
              $("#EditartrabajadorId").val('');//limpia campo id_trabajador
              $("#EditartrabajadorId").html('');//limpia campo id_trabajador

              $(".seccion1").parent().after('<div class="alert alert-warning"><i"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp; Este empleado ya cuenta con dAPOYO DE TRANSPORTE...</div>');//envia alerta
              
                $(".OcultarSeccion2").hide();
                $("#btnActualizar").hide();
                $('#EditarFechaComplemento').attr('readonly', true);
                //$(this).removeClass('nuevoFechaComplemento');
              
            }

            else{

                $(".OcultarSeccion2").show();
                $("#btnActualizar").show();
                
                $('#EditarFechaComplemento').attr('readonly', false);
                $("#EditarFechaComplemento").val('');//limpia campo id_trabajador
                $("#EditarFechaComplemento").html('');//limpia campo id_trabajador   

               $("#EditarnomTrabajador").parent().after('<div class="alert alert-success"><i class="fa fa-bus" aria-hidden="true"></i>&nbsp; APOYO DE TRANSPORTE &nbsp;&nbsp;<i class="fa fa-check-square-o" aria-hidden="true"></i> Disponible.</div>');
               $(".seccion1").parent().after('<div class="alert alert-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp; Estas a punto de remplazar un empleado ya registrado... estas seguro?.</div>');//envia alerta 

            }    

          }

      })

    })*/

  /*= FIN VALIDACION EDITAR / REVISAR SI EL NUMERO DE EMPLEADO YA ESTA REGISTRADO=*/




    



})
/*=FIN DE MODAL #modalEditarComplemento =*/
/*=============================================<<<<<*/




/*=============================================>>>>>
= INICIO BOTON CANCELAR MODALES =
===============================================>>>>>*/


  $("#CancelarAgregar-Complemento").click(function(event) {
     
     setTimeout("location.href='escalafon-complemento'", 1);
             
   });

  

   $("#CancelarEditar-Complemento").click(function(event) {
       
      setTimeout("location.href='escalafon-complemento'", 1);          

   });

   /*=FIN DE BOTON CANCELAR MODALES =*/
/*=============================================<<<<<*/




/*=============================================>>>>>
= INICIO EDITAR APOYO DE TRANSPORTE =
===============================================>>>>>*/

$(".TablaComplemento").on("click", ".btnEditar-Complemento", function(){

  var idComplemento = $(this).attr("idComplemento");

  var datos = new FormData();
  datos.append("idComplemento", idComplemento);

  $.ajax({
    url: "ajax/complemento.ajax.php",
    method: "POST",
        data: datos,
        cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success: function(respuesta){
        //console.log('Línea 203. respuesta => ', respuesta);
        
          $("#EditartrabajadorId").val(respuesta["id_trabajador"]);
          $("#EditarbuscaTrabajador").val(respuesta["id_trabajador"]);
          $("#EditarnomTrabajador").val(respuesta["nombre_completo"]);
          $("#EditartipoEmpleado").val(respuesta["tipo_empleado"]);
          
          
          $("#EditarComplemento").val(respuesta["complemento"]);
          $("#EditarnuevoMontoComplemento").val(respuesta["monto_complemento"]);
          $("#EditarMontoComplemento").val(respuesta["monto_complemento"]);
          
          $("#EditarFechaComplemento").val(respuesta["f_registro_complemento"]);
          $("#idComplemento").val(respuesta["id_complemento"]);

      }

  })

})

/*=FIN EDITAR APOYO DE TRANSPORTE =*/
/*=============================================<<<<<*/




/*=============================================>>>>>
= INICIO CARGA TABLA DINAMICA DE APYO DE TRANSPORTE =
===============================================>>>>>*/

$('.TablaComplemento').DataTable( {
           
           "ajax": "ajax/datatable-complemento.ajax.php",
           "deferRender": true,
           "retrieve": true,
           
           "lengthChange": false,
           
           "order": [[ 0, "desc" ]],
           
           "dom": 'Bfrtip',
           
        "buttons": [
           
            {
                extend:    'copyHtml5',
                text:      '<i class="fa fa-files-o"></i> Copiar',
                titleAttr: 'Copiar'
            },
            {
                extend: 'excel',
                 text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i>  Excel',
                messageTop: 'Personal Sindicalizado Beneficiados con Apoyo de Complemento al Salario.',
                 titleAttr: 'Excel'
            },
            {
                extend: 'pdfHtml5',
                text:      '<i class="fa fa-file-pdf-o"></i>  PDF',
                 titleAttr: 'PDF',

                orientation: 'landscape',
                pageSize: 'LEGAL'
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print" aria-hidden="true"></i>  Imprimir',
                 titleAttr: 'Imprimir',
                autoPrint: false,
                 messageTop: 'Personal Sindicalizado Beneficiados con Apoyo de Complemento al Salario.'
            }
        ],

          //"processing": true,
      
         "language": {

            "decimal": ",",
            "thousands": ".",



            "sProcessing":     "Procesando",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
            },
            "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }

        }

    } );

/*=FIN TABLA DINAMICA DE APYO DE TRANSPORTE =*/
/*=============================================<<<<<*/



/*=============================================>>>>>
= INICIO TOOLTIP =
===============================================>>>>>*/

$(document).ready(function(){
    //$('[data-toggle="tooltip"]').tooltip(); 

    $('body').tooltip({selector: '[data-toggle="tooltip"]'});  
});

/*=FIN TOOLTIP =*/
/*=============================================<<<<<*/




/*=============================================>>>>>
= INICIO FORMVALIDATION AGREGAR APOYO DE TRANSPORTE =
===============================================>>>>>*/

 
 $(document).ready(function() {
    $('#registrationForm-Complemento')
      

        .formValidation({
            framework: 'bootstrap4',

            icon: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },

       
           
            fields: {

              buscaTrabajador: {
                  validators: {
                    notEmpty: {
                      message: 'El Campo Buscar Trabajador es obligatorio...'
                    },
                    
                  }
                },             

                nomTrabajador: {
                  validators: {
                    Empty: {
                      message: 'El Campo Empleado es obligatorio...'
                    },
                    stringLength: {
                      min: 3,
                      message: 'El Nombre del empleado debe contener al menos 3 caracteres'
                    }
                  }
                }, 

              tipoEmpleado: {
                  validators: {
                    Empty: {
                      message: 'El Campo Tipo de Empleado es obligatorio...'
                    },
                    stringLength: {
                      min: 3,
                      message: 'El Tipo de Empleado debe contener al menos 3 caracteres'
                    }
                  }
                }, 

                 nuevoComplemento: {
                  validators: {
                    notEmpty: {
                      message: 'El Campo Complemento es es obligatorio...'
                    },
                    stringLength: {
                      min: 3,
                      message: 'El Campo Complemento debe contener al menos 1 caracter'
                    }
                  }
                },
           
                  validators: {
                    notEmpty: {

                nuevoMontoComplemento: {
                      message: 'El Campo Monto es es obligatorio...'
                    },
                    stringLength: {
                      min: 1,
                      message: 'El Campo Monto debe contener al menos 1 caracter'
                    }
                  }
                },
            
                 nuevoFechaComplemento:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Fecha de Registro, es obligaria...'
                    },
                    date: {
                      format: 'DD/MM/YYYY',
                      message: 'Seleccionar una fecha valida...'

                    }
                  }
                }

            }
        });

        
  });

 /*=FIN FORMVALIDATION AGREGAR APOYO DE TRANSPORTE =*/
/*=============================================<<<<<*/



/*=============================================>>>>>
= INICIO FORMVALIDATION EDITAR APOYO DE TRANSPORTE =
===============================================>>>>>*/

 
 $(document).ready(function() {
    $('#registrationForm-EditarComplemento')
      

        .formValidation({
            framework: 'bootstrap4',

            icon: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
           
            fields:{

              EditarbuscaTrabajador: {
                  validators: {
                    notEmpty: {
                      message: 'El Campo Buscar Trabajador es obligatorio...'
                    },
                    
                  }
                },


                EditarnomTrabajador: {
                  validators: {
                    Empty: {
                      message: 'El Campo Nombre de Trabajador es es obligatorio...'
                    },
                    stringLength: {
                      min: 3,
                      message: 'El Nombre de Trabajador debe contener al menos 3 caracteres'
                    }
                  }
                }, 

              EditartipoEmpleado: {
                  validators: {
                    Empty: {
                      message: 'El Campo Tipo de Empleado es es obligatorio...'
                    },
                    stringLength: {
                      min: 3,
                      message: 'El Tipo de Empleado debe contener al menos 3 caracteres'
                    }
                  }
                }, 

                 EditarComplemento: {
                  validators: {
                    notEmpty: {
                      message: 'El Campo Categoria es es obligatorio...'
                    },
                    stringLength: {
                      min: 3,
                      message: 'El Campo Categoria debe contener al menos 1 caracter'
                    }
                  }
                },

                  

                EditarnuevoMontoComplemento: {
                  validators: {
                    notEmpty: {
                      message: 'El Campo Monto es es obligatorio...'
                    },
                    stringLength: {
                      min: 1,
                      message: 'El Campo Monto debe contener al menos 1 caracter'
                    }
                  }
                },

              
                 EditarFechaComplemento:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Fecha de Registro, es obligaria...'
                    },
                    date: {
                      format: 'DD/MM/YYYY',
                      message: 'Seleccionar una fecha valida...'

                    }
                  }
                }

            }
            

        });
  });





 /*=FIN FORMVALIDATION EDITAR APOYO DE TRANSPORTE =*/
/*=============================================<<<<<*/




    

 







/*=============================================>>>>>
= INICIO MODAL #modalAgregarNuevaBase =
===============================================>>>>>*/

 

$.fn.select2.defaults.set('language', 'es');

$('#modalAgregarNuevaBase').on('shown.bs.modal', function () {


  /*==ACTIVAR AGREGAR CAMPOS SELECT2 EN NUEVA BASE==*/

     $('#buscaTrabajador').select2({
       minimumInputLength: 2,
       theme: 'bootstrap4',
       placeholder: $(this).attr('placeholder'),
       allowClear: Boolean($(this).data('allow_clear')),

     })

     /*=FIN DE MODAL #modalAgregarNuevaBase =*/
  /*=============================================<<<<<*/




  /*=== BUSCA EL TRABAJADOR POR NUM DE EMPLEADO Y SE CARGAN LOS DATOS NOMBRES Y TIPO EMP ===*/
   
 
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

  /*=FIN BUSCA TRABAJADOR POR NUM DE EMPLEADO Y CARGA DATOS =*/
  /*=============================================<<<<<*/



  /*=== REVISAR SI EL NUMERO DE EMPLEADO YA ESTA REGISTRADO ===*/

    $("#buscaTrabajador").change(function(){

      $(".alert").remove();

        /*===remueve la alerta por tiempo====*/
      // setTimeout(function () {
      // $('.alert').hide('fade');
      // }, 3000);
      /*===================================*/

      var id_trabajador = $(this).val();

      var datos = new FormData();
      datos.append("validarTrabajador", id_trabajador);

       $.ajax({
          url:"ajax/nueva-base.ajax.php",
          method:"POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success:function(respuesta){
            
            if(respuesta){

              //$("#buscaTrabajador").select2("val", "");
              
              //$('#buscaTrabajador').val("null").trigger('change.select2');//limpia campo categoria select2

               $("#buscaTrabajador").prop("disabled", true);//deshabilita buscar trabajador
           
              //$("#trabajadorId").val('');//limpia campo id_trabajador

              $(".seccion1").parent().after('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp; Ya cuenta con Base Sindical...</div>');//envia alerta
            
              $(".OcultarSeccion2").hide();
              $("#btnGuardar").hide();
              // $("#nomTrabajador").val('');
              // $("#tipoEmpleado").val 
              // 
                  
            }

            else

               $("#nomTrabajador").parent().after('<div class="alert alert-success"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp; NUEVA BASE SINDICAL &nbsp; &nbsp; &nbsp;<i class="fa fa-check-square-o" aria-hidden="true"></i> Disponible.</div>');
  
             
          }


      })
    })
      /*=FIN REVISAR SI EL NUMERO DE EMPLEADO YA ESTA REGISTRADO =*/
          /*=============================================<<<<<*/

}) 
 /*=============================================<<<<<*/ 
/*=FIN DE MODAL #modalAgregarNuevaBase =*/
/*=============================================<<<<<*/








/*=============================================>>>>>
= INICIO MODAL #modalEditarNuevaBase =
===============================================>>>>>*/

 /*==EDITAR CAMPOS SELECT2 EN APOYO DE TRANSPORTE==*/
 

$.fn.select2.defaults.set('language', 'es');

$('#modalEditarNuevaBase').on('shown.bs.modal', function () {


     $('#EditarbuscaTrabajador').select2({
       minimumInputLength: 2,
       theme: 'bootstrap4',
       placeholder: $(this).attr('placeholder'),
       allowClear: Boolean($(this).data('allow_clear')),


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


     /*=== REVISAR SI EL NUMERO DE EMPLEADO YA ESTA REGISTRADO ===*/

    $("#EditarbuscaTrabajador").change(function(){

      $(".alert").remove();

        /*===remueve la alerta por tiempo====*/
      // setTimeout(function () {
      // $('.alert').hide('fade');
      // }, 3000);
      /*===================================*/

      var id_trabajador = $(this).val();

      var datos = new FormData();
      datos.append("validarTrabajador", id_trabajador);

       $.ajax({
          url:"ajax/nueva-base.ajax.php",
          method:"POST",
          data: datos,
          cache: false,
          contentType: false,
          processData: false,
          dataType: "json",
          success:function(respuesta){
            
            if(respuesta){

              //$("#buscaTrabajador").select2("val", "");
              
              $('#EditarbuscaTrabajador').val("null").trigger('change.select2');//limpia campo categoria select2
           
              $("#EditartrabajadorId").val('');//limpia campo id_trabajador

              $("#EditarnomTrabajador").parent().after('<div class="alert alert-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp; Ya cuenta con Base Sindical...</div>');//envia alerta
              
              // $("#nomTrabajador").val('');
              // $("#tipoEmpleado").val 
              // 
                  
            }

            else

               $("#EditarnomTrabajador").parent().after('<div class="alert alert-success"><i class="fa fa-info-circle" aria-hidden="true"></i>&nbsp; NUEVA BASE SINDICAL &nbsp; &nbsp; &nbsp;<i class="fa fa-check-square-o" aria-hidden="true"></i> Disponible.</div>');
  
             
          }


      })
    })
      /*=FIN REVISAR SI EL NUMERO DE EMPLEADO YA ESTA REGISTRADO =*/
          /*=============================================<<<<<*/


})
/*=FIN DE MODAL #modalEditarNuevaBase =*/
/*=============================================<<<<<*/





/*=============================================>>>>>
= INICIO BOTON CANCELAR MODALES =
===============================================>>>>>*/


  $("#CancelarAgregar-NuevaBase").click(function(event) {
     
     setTimeout("location.href='nuevas-bases'", 1);
             
   });
   
   $("#CancelarEditar-NuevaBase").click(function(event) {
       
      setTimeout("location.href='nuevas-bases'", 1);          

   });

   /*=FIN DE BOTON CANCELAR MODALES =*/
/*=============================================<<<<<*/




/*=============================================>>>>>
= INICIO EDITAR TABLA NUEVA BASE =
===============================================>>>>>*/

$(".TablaNuevasBases").on("click", ".btnEditar-NuevaBase", function(){

  var idNuevaBase = $(this).attr("idNuevaBase");

  var datos = new FormData();
  datos.append("idNuevaBase", idNuevaBase);

  $.ajax({
    url: "ajax/nueva-base.ajax.php",
    method: "POST",
        data: datos,
        cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success: function(respuesta){
        //console.log('Línea 203. respuesta => ', respuesta);
        //
        
          $("#EditartrabajadorId").val(respuesta["id_trabajador"]);
          $("#EditarbuscaTrabajador").val(respuesta["id_trabajador"]);
          $("#EditarnomTrabajador").val(respuesta["nombre_completo"]);

          $("#EditartipoEmpleado").val(respuesta["tipo_empleado"]);
          $("#EditarNuevaBase").val(respuesta["nueva_base"]);
          $("#Editar_nuevoTipoEmpleado_Sindicalizado").val(respuesta["tipo_empleado"]);
          $("#EditarFechaNuevaBase").val(respuesta["f_registro_NuevaBase"]);
          $("#idNuevaBase").val(respuesta["id_nuevabase"]);

      }

  })

})

/*=FIN EDITAR APOYO DE TRANSPORTE =*/
/*=============================================<<<<<*/




/*=============================================>>>>>
= INICIO CARGA TABLA DINAMICA DE APYO DE TRANSPORTE =
===============================================>>>>>*/

$('.TablaNuevasBases').DataTable( {
           
           "ajax": "ajax/datatable-NuevaBase.ajax.php",
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
                messageTop: 'Personal Sindicalizado Beneficiados con Apoyo de Transporte.',
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
                 messageTop: 'Trabajadores Beneficiados con una Nueva Base Sindical.'
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
= INICIO popover =
===============================================>>>>>*/

$(function () {

  $('[data-toggle="popover"]').popover()
})

/*=FIN popover =*/
/*=============================================<<<<<*/




/*=============================================>>>>>
= INICIO FORMVALIDATION AGREGAR APOYO DE TRANSPORTE =
===============================================>>>>>*/

 
 $(document).ready(function() {
    $('#registrationForm-NuevaBase')
      

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

                 nuevoNuevaBase: {
                  validators: {
                    notEmpty: {
                      message: 'El Campo Nueva Base es es obligatorio...'
                    },
                    stringLength: {
                      min: 3,
                      message: 'El Campo Nueva Base debe contener al menos 1 caracter'
                    }
                  }
                },

                  nuevoTipoEmpleado_Sindicalizado: {
                  validators: {
                    notEmpty: {
                      message: 'El Campo Nueva Asignación es es obligatorio...'
                    },
                    stringLength: {
                      min: 5,
                      message: 'El Campo Nueva Asignación debe contener al menos 5 caracter'
                    }
                  }
                },
            
                 nuevoFechaNuevaBase:{
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

 /*=FIN FORMVALIDATION AGREGAR NUEVA BASE =*/
/*=============================================<<<<<*/



/*=============================================>>>>>
= INICIO FORMVALIDATION EDITAR NUEVA BASE =
===============================================>>>>>*/

 
 $(document).ready(function() {
    $('#registrationForm-EditarNuevaBase')
      

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

                 EditarNuevaBase: {
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


                Editar_nuevoTipoEmpleado_Sindicalizado: {
                  validators: {
                    notEmpty: {
                      message: 'El Campo Nueva Asignación es es obligatorio...'
                    },
                    stringLength: {
                      min: 5,
                      message: 'El Campo Nueva Asignación debe contener al menos 5 caracter'
                    }
                  }
                },


                 
                 EditarFechaNuevaBase:{
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
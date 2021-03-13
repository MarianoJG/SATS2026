
/*=============================================>>>>>
= INICIO MODAL #modalAgregarCambioAdscripcion =
===============================================>>>>>*/

 

$.fn.select2.defaults.set('language', 'es');

$('#modalAgregarCambioAdscripcion').on('shown.bs.modal', function () {



  /*==ACTIVAR AGREGAR CAMPOS SELECT2 ==*/

     $('#buscaTrabajador').select2({
       minimumInputLength: 2,
       theme: 'bootstrap4',
       placeholder: $(this).attr('placeholder'),
       allowClear: Boolean($(this).data('allow_clear')),

     })


      $('#nuevoCambioAdscripcion').select2({
       minimumInputLength: 2,
       theme: 'bootstrap4',
       placeholder: $(this).attr('placeholder'),
       allowClear: Boolean($(this).data('allow_clear')),

     })

  /*=FIN ACTIVAR AGREGAR CAMPOS SELECT2 =*/

  


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

         $("#Adscripcion_actual").val(respuesta["departamento"]);

       }

     })

    });

  /*= FIN BUSCA EL TRABAJADOR POR NUM DE EMPLEADO Y SE CARGAN LOS DATOS NOMBRES Y TIPO EMP =*/
 


 /*== BEGIN BUSCA EL DEPARTAMENTO PARA SU NUEVA ADSCRIPCION ==*/
    
    $('#nuevoCambioAdscripcion').change(function() {
     var buscardepartamento = $(this).val();
     var datos = new FormData();
     datos.append('buscardepartamento', buscardepartamento);
     $.ajax({
       url:"ajax/cambio-adscripcion.ajax.php",
       method: "POST",
       data: datos,
       cache: false,
       contentType: false,
       processData: false,
       
       dataType: "json",
       success: function(respuesta){


         $("#nuevoCambioAdscripcion").val(respuesta["adscripcion_nuevo"]);
         $("#departamentoId").val(respuesta["id_departamento"]);

        

       }

     })

    });

  /*=END =*/


 

  
})
 
/*=============================================<<<<<*/ 
/*=FIN DE MODAL #modalAgregarCambioAdscripcion =*/
/*=============================================<<<<<*/





/*=============================================>>>>>
= INICIO MODAL #modalEditarCambioAdscripcion =
===============================================>>>>>*/

 /*==EDITAR CAMPOS SELECT2 EN APOYO DE TRANSPORTE==*/
 

$.fn.select2.defaults.set('language', 'es');

$('#modalEditarCambioAdscripcion').on('shown.bs.modal', function () {


     $('#EditarbuscaTrabajador').select2({
       minimumInputLength: 2,
       theme: 'bootstrap4',
       placeholder: $(this).attr('placeholder'),
       allowClear: Boolean($(this).data('allow_clear')),


     });

      $('#editarCambioAdscripcion').select2({
       minimumInputLength: 2,
       theme: 'bootstrap4',
       placeholder: $(this).attr('placeholder'),
       allowClear: Boolean($(this).data('allow_clear')),

     })

    

    

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

            $("#EditarAdscripcion_actual").val(respuesta["departamento"]);


         }

       })

     });




     /*== BEGIN BUSCA EL TRABAJADOR POR NUM DE EMPLEADO Y SE CARGAN LOS DATOS NOMBRES Y TIPO EMP ==*/
    
    $('#editarCambioAdscripcion').change(function() {
     var buscardepartamento = $(this).val();
     var datos = new FormData();
     datos.append('buscardepartamento', buscardepartamento);
     $.ajax({
       url:"ajax/cambio-adscripcion.ajax.php",
       method: "POST",
       data: datos,
       cache: false,
       contentType: false,
       processData: false,
       
       dataType: "json",
       success: function(respuesta){


         $("#EditarAdscripcion_actual").val(respuesta["adscripcion_nuevo"]);
         $("#EditardepartamentoId").val(respuesta["id_departamento"]);

        

       }

     })

    });

  /*=END =*/





})
/*=FIN DE MODAL #modalEditarCambioAdscripcion =*/
/*=============================================<<<<<*/




/*=============================================>>>>>
= INICIO BOTON CANCELAR MODALES =
===============================================>>>>>*/


  $("#CancelarAgregar-CambioAdscripcion").click(function(event) {
     
     setTimeout("location.href='escalafon-cambio-adscripcion'", 1);
             
   });

  

   $("#Cancelar-EditarCambioAdscripcion").click(function(event) {
       
      setTimeout("location.href='escalafon-cambio-adscripcion'", 1);          

   });

   /*=FIN DE BOTON CANCELAR MODALES =*/
/*=============================================<<<<<*/




/*=============================================>>>>>
= INICIO EDITAR APOYO DE TRANSPORTE =
===============================================>>>>>*/

$(".TablaCambioAdscripcion").on("click", ".btnEditar-CambioAdscripcion", function(){

  var idCambioAdscripcion = $(this).attr("idCambioAdscripcion");

  var datos = new FormData();
  datos.append("idCambioAdscripcion", idCambioAdscripcion);

  $.ajax({
    url: "ajax/cambio-adscripcion.ajax.php",
    method: "POST",
        data: datos,
        cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success: function(respuesta){
        
       
           $("#EditartrabajadorId").val(respuesta["id_trabajador"]);
           $("#EditarbuscaTrabajador").val(respuesta["id_trabajador"]);
           $("#EditarnomTrabajador").val(respuesta["nombre_completo"]);
           $("#EditartipoEmpleado").val(respuesta["tipo_empleado"]);
           
           $("#EditarAdscripcion_actual").val(respuesta["adscripcion_actual"]);
           $("#editarCambioAdscripcion").val(respuesta["adscripcion_nuevo"]);
           $("#EditarnuevoFechaCambioAdscripcion").val(respuesta["f_registro_cadsc"]); 
           $("#EditardepartamentoId").val(respuesta["id_departamento"]);
           
           $("#idCambioAdscripcion").val(respuesta["id_c_adscripcion"]);
        

      }

  })

})
/*=FIN EDITAR APOYO DE TRANSPORTE =*/
/*=============================================<<<<<*/




/*=============================================>>>>>
= INICIO CARGA TABLA DINAMICA DE APYO DE TRANSPORTE =
===============================================>>>>>*/

$('.TablaCambioAdscripcion').DataTable( {
           
          "ajax": "ajax/datatable-cambio-adscripcion.ajax.php",
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
                 messageTop: 'Personal Sindicalizado Beneficiados con Apoyo de Transporte.'
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
    $('#registrationForm-CambioAdscripcion')
      

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

                Adscripcion_actual: {
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

                 nuevoCambioAdscripcion: {
                  validators: {
                    notEmpty: {
                      message: 'El Campo Cambio Adscripcion es es obligatorio...'
                    },
                    stringLength: {
                      min: 3,
                      message: 'El Campo Cambio Adscripcion debe contener al menos 1 caracter'
                    }
                  }
                },
           
           
            
                 nuevoFechaCambioAdscripcion:{
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
    $('#registrationFormEditarCambioAdscripcion')
      

        .formValidation({
            framework: 'bootstrap4',

            icon: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },

       
           
             fields: {

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
                      message: 'El Campo Empleado es obligatorio...'
                    },
                    stringLength: {
                      min: 3,
                      message: 'El Nombre del empleado debe contener al menos 3 caracteres'
                    }
                  }
                }, 

              EditartipoEmpleado: {
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

                EditarAdscripcion_actual: {
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

                 editarCambioAdscripcion: {
                  validators: {
                    notEmpty: {
                      message: 'El Campo Cambio Adscripcion es es obligatorio...'
                    },
                    stringLength: {
                      min: 3,
                      message: 'El Campo Cambio Adscripcion debe contener al menos 1 caracter'
                    }
                  }
                },
           
           
            
                 EditarnuevoFechaCambioAdscripcion:{
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




    

 






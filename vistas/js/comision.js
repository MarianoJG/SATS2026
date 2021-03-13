
/*=============================================>>>>>
= INICIO MODAL #modalAgregarComision =
===============================================>>>>>*/

 

$.fn.select2.defaults.set('language', 'es');

$('#modalAgregarComision').on('shown.bs.modal', function () {



  /*==ACTIVAR AGREGAR CAMPOS SELECT2 ==*/

     $('#buscaTrabajador').select2({
       minimumInputLength: 2,
       theme: 'bootstrap4',
       placeholder: $(this).attr('placeholder'),
       allowClear: Boolean($(this).data('allow_clear')),

     })


      $('#nuevaComision').select2({
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
    
    $('#nuevaComision').change(function() {
     var buscardepartamento = $(this).val();
     var datos = new FormData();
     datos.append('buscardepartamento', buscardepartamento);
     $.ajax({
       url:"ajax/comision.ajax.php",
       method: "POST",
       data: datos,
       cache: false,
       contentType: false,
       processData: false,
       
       dataType: "json",
       success: function(respuesta){


         $("#nuevaComision").val(respuesta["adscripcion_nuevo"]);
         $("#departamentoId").val(respuesta["id_departamento"]);

        

       }

     })

    });

  /*=END =*/


 

  
})
 
/*=============================================<<<<<*/ 
/*=FIN DE MODAL #modalAgregarComision =*/
/*=============================================<<<<<*/





/*=============================================>>>>>
= INICIO MODAL #modalEditarComision =
===============================================>>>>>*/

 /*==EDITAR CAMPOS SELECT2 ==*/
 

$.fn.select2.defaults.set('language', 'es');

$('#modalEditarComision').on('shown.bs.modal', function () {


     $('#EditarbuscaTrabajador').select2({
       minimumInputLength: 2,
       theme: 'bootstrap4',
       placeholder: $(this).attr('placeholder'),
       allowClear: Boolean($(this).data('allow_clear')),


     });

      $('#Editar-nuevaComision').select2({
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




     





})
/*=FIN DE MODAL #modalEditarComision =*/
/*=============================================<<<<<*/




/*=============================================>>>>>
= INICIO BOTON CANCELAR MODALES =
===============================================>>>>>*/


  $("#CancelarAgregar-Comision").click(function(event) {
     
     setTimeout("location.href='escalafon-comision'", 1);
             
   });

   $("#CancelarEditar-Comision").click(function(event) {
     
     setTimeout("location.href='escalafon-comision'", 1);
             
   });

  

   

   /*=FIN DE BOTON CANCELAR MODALES =*/
/*=============================================<<<<<*/




/*=============================================>>>>>
= INICIO EDITAR TABLA COMISION =
===============================================>>>>>*/

$(".TablaComision").on("click", ".btnEditar-Comision", function(){

  var idCambioComision = $(this).attr("idCambioComision");

  var datos = new FormData();
  datos.append("idCambioComision", idCambioComision);

  $.ajax({
    url: "ajax/comision.ajax.php",
    method: "POST",
        data: datos,
        cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success: function(respuesta){
       // console.log('Línea 273. respuesta => ', respuesta);
        
       
           $("#EditartrabajadorId").val(respuesta["id_trabajador"]);
           $("#EditarbuscaTrabajador").val(respuesta["id_trabajador"]);
           $("#EditarnomTrabajador").val(respuesta["nombre_completo"]);
           $("#EditartipoEmpleado").val(respuesta["tipo_empleado"]);
           
           $("#EditarAdscripcion_actual").val(respuesta["adscripcion_actual"]);
           $("#editar_Tipo_Movimiento_Comision").val(respuesta["tipo_movimiento"]);
           $("#EditarFechaComision").val(respuesta["f_registro_comision"]); 
           $("#EditardepartamentoId").val(respuesta["id_departamento"]);
           $("#Editar-nuevaComision").val(respuesta["adscripcion_comision"]);

           $("#idComision").val(respuesta["id_comision"]);
           
          
        

      }

  })

})
/*=FIN EDITAR TABLA COMISION =*/
/*=============================================<<<<<*/




/*=============================================>>>>>
= INICIO CARGA TABLA DINAMICA DE COMISION =
===============================================>>>>>*/

$('.TablaComision').DataTable( {
           
          "ajax": "ajax/datatable-comision.ajax.php",
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
                 messageTop: 'Personal Sindicalizado con movimientos de comisión.'
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

/*=FIN TABLA DINAMICA DE COMISION =*/
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
= INICIO FORMVALIDATION AGREGAR COMISION =
===============================================>>>>>*/

 
 $(document).ready(function() {
    $('#registrationForm-Comision')
      

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

                 Tipo_Movimiento_Comision: {
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
           
           
            
                 nuevoFechaComision:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Fecha de Registro, es obligaria...'
                    },
                    date: {
                      format: 'DD/MM/YYYY',
                      message: 'Seleccionar una fecha valida...'

                    }
                  }
                },

                nuevaComision: {
                  validators: {
                    notEmpty: {
                      message: 'El Campo Comisionado a: es obligatorio...'
                    },
                    
                  }
                }     

            }
        });

        
  });

 /*=FIN FORMVALIDATION AGREGAR COMISION =*/
/*=============================================<<<<<*/



/*=============================================>>>>>
= INICIO FORMVALIDATION EDITAR COMISION =
===============================================>>>>>*/

$(document).ready(function() {
    $('#registrationFormEditarComision')
      

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

                 editar_Tipo_Movimiento_Comision: {
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
           
           
            
                 EditarFechaComision:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Fecha de Registro, es obligaria...'
                    },
                    date: {
                      format: 'DD/MM/YYYY',
                      message: 'Seleccionar una fecha valida...'

                    }
                  }
                },




            }
        });

        
  });

 
 





 /*=FIN FORMVALIDATION EDITAR COMISION =*/
/*=============================================<<<<<*/




    

 






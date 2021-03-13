
 /*=============================================
INICIA MODAL AGREGAR CATEGORIA
=============================================*/

 /*==ACTIVAR AGREGAR CAMPOS SELECT2 EN ESCALAFON CAMBIO DE CATEGORIA==*/

$.fn.select2.defaults.set('language', 'es');

$('#modalAgregarCcategoria').on('shown.bs.modal', function () {

     $('#buscaTrabajador').select2({
       minimumInputLength: 2,
       theme: 'bootstrap4',
       placeholder: $(this).attr('placeholder'),
       allowClear: Boolean($(this).data('allow_clear')),


     })

     $('#nuevoCCategoria').select2({
       minimumInputLength: 2,
       theme: 'bootstrap4',
       placeholder: $(this).attr('placeholder'),
       allowClear: Boolean($(this).data('allow_clear')),


     })


 /*=============================================
FORMATO DE CANTIDAD AL MONTO 
=============================================*/

    $("#nuevoMontoCC").number(true, 2);

        $(document).ready(function () {
            $("#nuevoMontoCC").keyup(function () {
                var value = $(this).val();
                $("#MontoCC").val(value);
            });
    });
 

 //BUSCA EL TRABAJADOR POR NUM DE EMPLEADO Y SE CARGAN LOS DATOS NOMBRES Y TIPO EMP

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


     /*===================================================
REVISAR SI EL NUMERO DE EMPLEADO  YA ESTÁ REGISTRADO
====================================================*/

      $("#nuevoCCategoria").change(function(){
        
        /*===remueve la alerta por tiempo====*/
        setTimeout(function () {
        $('.alert').hide('fade');
        }, 3000);
        /*===================================*/

        var cambio_categoria = $(this).val();

        var datos = new FormData();
        datos.append("validarCategoria", cambio_categoria);

         $.ajax({
            url:"ajax/escalafon-cambio-categoria.ajax.php",
            method:"POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success:function(respuesta){
              
              if(respuesta){

                $("#nuevoCCategoria").parent().after('<div class="alert alert-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Este empleado ya tiene esa CATEGORIA Registrada.</div>');

                $('#nuevoCCategoria').val(null).trigger('change'); //limpia campo categoria select2

              }

            }

        })
      })

      




}) /*===FINALIZA MODAL AGREGAR CATEGORIA===*/

 





/*=============================================
INICIA MODAL EDITAR CATEGORIA
=============================================*/

 /*==EDITAR CAMPOS SELECT2 EN HIJOS==*/
 

$.fn.select2.defaults.set('language', 'es');

$('#modalEditarCcategoria').on('shown.bs.modal', function () {


     $('#EditarbuscaTrabajador').select2({
       minimumInputLength: 2,
       theme: 'bootstrap4',
       placeholder: $(this).attr('placeholder'),
       allowClear: Boolean($(this).data('allow_clear')),


     });

     // $('#EditarCCategoria').select2({
     //   minimumInputLength: 2,
     //   theme: 'bootstrap4',
     //   placeholder: $(this).attr('placeholder'),
     //   allowClear: Boolean($(this).data('allow_clear')),


     // })


    /*==FORMATO DE CANTIDAD AL MONTO EDITAR===*/


    $("#EditarNuevoMontoCC").number(true, 2);

        $(document).ready(function () {
            $("#EditarNuevoMontoCC").keyup(function () {
                var value = $(this).val();
                $("#EditarMontoCC").val(value);
            });
    });
 

    /*==BUSCA TRABAJADOR POR AJAX LO ENCUENTRA Y CARGA LOS DATOS A LOS CAMPOS==*/ 

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
          

           $("#EditarTrabajadorId").val(respuesta["id_trabajador"]);

           $("#EditarNomTrabajador").val(respuesta["nombres"] + " " + (respuesta["a_paterno"])  + " " + (respuesta["a_materno"]) );

            $("#EditarTipoEmpleado").val(respuesta["tipo_empleado"]);


         }

       })

     });

})/*===FINALIZA MODAL EDITAR CATEGORIA===*/






/*=============================================
AL CANCELAR LIMPIAR FORMULARIO DE CAMBIO DE CATEGORIA
=============================================*/


  $("#CancelarAgregar-Ccategoria").click(function(event) {
      //$("#registrationForm-Ccategoria")[0].reset();
   
      // $(".previsualizar").attr("src","vistas/img/trabajadores/default/icon-jpeg.png");
     setTimeout("location.href='escalafon-cambio-categoria'", 1);
             
   });
   
   $("#CancelarEditar-Ccategoria").click(function(event) {
       //$("#registrationForm-CcategoriaEditar")[0].reset();
   
      // $(".previsualizar").attr("src","vistas/img/trabajadores/default/icon-jpeg.png");
      setTimeout("location.href='escalafon-cambio-categoria'", 1);
             

   });

  



/*=============================================
        EDITAR HIJOS
=============================================*/
$(".TablaEscalafonCambioCategoria").on("click", ".btnEditar-Ccategoria", function(){

  var idEscalafonCC = $(this).attr("idEscalafonCC");

  var datos = new FormData();
  datos.append("idEscalafonCC", idEscalafonCC);

  $.ajax({
    url: "ajax/escalafon-cambio-categoria.ajax.php",
    method: "POST",
        data: datos,
        cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success: function(respuesta){
        //console.log('Línea 203. respuesta => ', respuesta);

        $("#EditarCCategoria").val(respuesta["cambio_categoria"]);
        $("#EditarNuevoMontoCC").val(respuesta["monto_cc"]);
        $("#EditarMontoCC").val(respuesta["monto_cc"]);

        $("#EditarFechaCC").val(respuesta["f_registro_cc"]);
        $("#idEscalafonCC").val(respuesta["id_escalafon"]);

      }

  })


})


  






/*=============================================
CARGAR LA TABLA DINAMICA DE TRABAJADORES
=============================================*/

$('.TablaEscalafonCambioCategoria').DataTable( {
           
           "ajax": "ajax/datatable-escalafon.ajax.php",
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
                messageTop: 'Personal Sindicalizado Beneficiados con Cambio de Categoria.',
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
                 messageTop: 'Personal Sindicalizado Beneficiados con Cambio de Categoria.'
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



/*=============================================
tooltip tabla Cambio de Categoria
=============================================*/

$(document).ready(function(){
    //$('[data-toggle="tooltip"]').tooltip(); 

    $('body').tooltip({selector: '[data-toggle="tooltip"]'});  
});




/*=============================================
FORM VALIDATION AGREGAR CAMBIO DE CATEGORIA
=============================================*/

 
 $(document).ready(function() {
    $('#registrationForm-Ccategoria')
      

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
                      message: 'El Campo Nombre de Trabajador es es obligatorio...'
                    },
                    stringLength: {
                      min: 3,
                      message: 'El Nombre de Trabajador debe contener al menos 3 caracteres'
                    }
                  }
                }, 

              tipoEmpleado: {
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

                 nuevoCCategoria: {
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

                  

                nuevoMontoCC: {
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

              
                 nuevoFechaCC:{
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


/*=============================================
FORM VALIDATION EDITAR CAMBIO DE CATEGORIA
=============================================*/

 
 $(document).ready(function() {
    $('#registrationForm-Editar-Ccategoria')
      

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

                EditarNomTrabajador: {
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

              EditarTipoEmpleado: {
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
                                  
              

                EditarCCategoria: {
                  validators: {
                    notEmpty: {
                      message: 'El Campo Categoria es es obligatorio...'
                    },
                    stringLength: {
                      min: 3,
                      message: 'El Categoria debe contener al menos 3 caracteres'
                    }
                  }
                },

                 EditarNuevoMontoCC: {
                  validators: {
                    notEmpty: {
                      message: 'El Campo Monto es obligatorio, si no aplica una cantidad teclear "0"...'
                    },
                    stringLength: {
                      min: 1,
                      message: 'El Monto debe contener al menos 1 caracteres'
                    }
                  }
                },

              
                 EditarFechaCC:{
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



    

 







/*=============================================>>>>>
= INICIO MODAL #modalAgregarCambioCategoria =
===============================================>>>>>*/



$.fn.select2.defaults.set('language', 'es');

$('#modalAgregarCambioCategoria').on('shown.bs.modal', function () {



  /*==ACTIVAR AGREGAR CAMPOS SELECT2 ==*/

  $('#buscaTrabajador').select2({
    minimumInputLength: 2,
    theme: 'bootstrap4',
    placeholder: $(this).attr('placeholder'),
    allowClear: Boolean($(this).data('allow_clear')),

  })



  $('#nuevoCambioCategoria').select2({
    minimumInputLength: 2,
    theme: 'bootstrap4',
    placeholder: $(this).attr('placeholder'),
    allowClear: Boolean($(this).data('allow_clear')),

  })

  /*=FIN ACTIVAR AGREGAR CAMPOS SELECT2  =*/




  /*==FORMATO DE CANTIDAD AL MONTO==*/

  $("#nuevoMontoCambioCategoria").number(true, 2);

  $(document).ready(function () {
    $("#nuevoMontoCambioCategoria").keyup(function () {
      var value = $(this).val();
      $("#MontoCambioCategoria").val(value);
    });
  });

  /*=FIN FORMATO DE CANTIDAD AL MONTO =*/




  /*== BEGIN BUSCA EL TRABAJADOR POR NUM DE EMPLEADO Y SE CARGAN LOS DATOS NOMBRES Y TIPO EMP ==*/

  $('#buscaTrabajador').change(function () {
    var idTrabajador = $(this).val();
    var datos = new FormData();
    datos.append('idTrabajador', idTrabajador);
    $.ajax({
      url: "ajax/trabajadores.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,

      dataType: "json",
      success: function (respuesta) {

        $("#trabajadorId").val(respuesta["id_trabajador"]);

        $("#nomTrabajador").val(respuesta["nombres"] + " " + (respuesta["a_paterno"]) + " " + (respuesta["a_materno"]));

        $("#tipoEmpleado").val(respuesta["tipo_empleado"]);

      }

    })

  });

  /*=END =*/



  /*== BEGIN BUSCA EL TRABAJADOR POR NUM DE EMPLEADO Y SE CARGAN LOS DATOS NOMBRES Y TIPO EMP ==*/

  $('#nuevoCambioCategoria').change(function () {
    var buscarCategoria = $(this).val();
    var datos = new FormData();
    datos.append('buscarCategoria', buscarCategoria);
    $.ajax({
      url: "ajax/cambio-categoria.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,

      dataType: "json",
      success: function (respuesta) {


        $("#nuevoCambioCategoria").val(respuesta["cambio_categoria"]);
        $("#categoriaId").val(respuesta["id_categoria"]);



      }

    })

  });

  /*=END =*/



})

/*=============================================<<<<<*/
/*=FIN DE MODAL #modalAgregarCambioCategoria =*/
/*=============================================<<<<<*/










/*=============================================>>>>>
= INICIO BOTON CANCELAR MODALES =
===============================================>>>>>*/


$("#CancelarAgregar-CambioCategoria").click(function (event) {

  setTimeout("location.href='escalafon-cambio-categoria'", 1);

});



$("#CancelarEditar-CambioCategoria").click(function (event) {

  setTimeout("location.href='escalafon-cambio-categoria'", 1);

});

/*=FIN DE BOTON CANCELAR MODALES =*/
/*=============================================<<<<<*/


/*==FORMATO DE CANTIDAD AL MONTO==*/

$("#EditarnuevoMontoCambioCategoria").number(true, 2);

$(document).ready(function () {
  $("#EditarnuevoMontoCambioCategoria").keyup(function () {
    var value = $(this).val();
    $("#EditarMontoCambioCategoria").val(value);
  });
});

/*=FIN FORMATO DE CANTIDAD AL MONTO =*/

/*=============================================>>>>>
= INICIO EDITAR Cambio de Categoría =
===============================================>>>>>*/

$(".TablaCambioCategoria").on("click", ".btnEditar-CambioCategoria", function () {

  var idCambioCategoria = $(this).attr("idCambioCategoria");

  var datos = new FormData();
  datos.append("idCambioCategoria", idCambioCategoria);

  $.ajax({
    url: "ajax/cambio-categoria.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      //console.log('Línea 203. respuesta => ', respuesta);

      $("#EditartrabajadorId").val(respuesta["id_trabajador"]);
      $("#EditarbuscaTrabajador").val(respuesta["id_trabajador"]);
      $("#EditarnomTrabajador").val(respuesta["nombre_completo"]);
      $("#EditartipoEmpleado").val(respuesta["tipo_empleado"]);

      $("#EditarcategoriaId").val(respuesta["id_categoria"]);
      $("#buscarEditarCambioCategoria").val(respuesta["cambio_categoria"]);
      $("#EditarCambioCategoria").val(respuesta["cambio_categoria"]);

      $("#EditarnuevoMontoCambioCategoria").val(respuesta["monto_cc"]);
      $("#EditarMontoCambioCategoria").val(respuesta["monto_cc"]);

      $("#EditarFechaCambioCategoria").val(respuesta["f_registro_cc"]);
      $("#idCambioCategoria").val(respuesta["id_c_categoria"]);


    }

  })

})

/*=FIN EDITAR Cambio de Categoría =*/
/*=============================================<<<<<*/




/*=============================================>>>>>
= INICIO CARGA TABLA DINAMICA  =
===============================================>>>>>*/

$('.TablaCambioCategoria').DataTable({

  "ajax": "ajax/datatable-cambio-categoria.ajax.php",
  "deferRender": true,
  "retrieve": true,

  "lengthChange": false,

  "order": [[0, "desc"]],

  "dom": 'Bfrtip',

  "buttons": [

    {
      extend: 'copyHtml5',
      text: '<i class="fa fa-files-o"></i> Copiar',
      titleAttr: 'Copiar'
    },
    {
      extend: 'excel',
      text: '<i class="fa fa-file-excel-o" aria-hidden="true"></i>  Excel',
      messageTop: 'Personal Sindicalizado Beneficiados con Cambio de Categoría.',
      titleAttr: 'Excel'
    },
    {
      extend: 'pdfHtml5',
      text: '<i class="fa fa-file-pdf-o"></i>  PDF',
      titleAttr: 'PDF',

      orientation: 'landscape',
      pageSize: 'LEGAL'
    },
    {
      extend: 'print',
      text: '<i class="fa fa-print" aria-hidden="true"></i>  Imprimir',
      titleAttr: 'Imprimir',
      autoPrint: false,
      messageTop: 'Personal Sindicalizado Beneficiados con Cambio de Categoría.'
    }
  ],

  //"processing": true,

  "language": {

    "decimal": ",",
    "thousands": ".",



    "sProcessing": "Procesando",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ningún dato disponible en esta tabla",
    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix": "",
    "sSearch": "Buscar:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
      "sFirst": "Primero",
      "sLast": "Último",
      "sNext": "Siguiente",
      "sPrevious": "Anterior"
    },
    "oAria": {
      "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
      "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }

  }

});

/*=FIN TABLA DINAMICA  =*/
/*=============================================<<<<<*/



/*=============================================>>>>>
= INICIO TOOLTIP =
===============================================>>>>>*/

$(document).ready(function () {
  //$('[data-toggle="tooltip"]').tooltip(); 

  $('body').tooltip({ selector: '[data-toggle="tooltip"]' });
});

/*=FIN TOOLTIP =*/
/*=============================================<<<<<*/




/*=============================================>>>>>
= INICIO FORMVALIDATION AGREGAR Cambio de Categoría =
===============================================>>>>>*/


$(document).ready(function () {
  $('#registrationForm-CambioCategoria')


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

        nuevoCambioCategoria: {
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


        nuevoMontoCambioCategoria: {
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

        nuevoFechaCambioCategoria: {
          validators: {
            notEmpty: {
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

/*=FIN FORMVALIDATION AGREGAR Cambio de Categoría =*/
/*=============================================<<<<<*/



/*=============================================>>>>>
= INICIO FORMVALIDATION EDITAR Cambio de Categoría =
===============================================>>>>>*/


$(document).ready(function () {
  $('#registrationForm-EditarCambioCategoria')


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

        buscarEditarCambioCategoria: {
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



        EditarnuevoMontoCambioCategoria: {
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


        EditarFechaCambioCategoria: {
          validators: {
            notEmpty: {
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





/*=FIN FORMVALIDATION EDITAR Cambio de Categoría =*/
/*=============================================<<<<<*/






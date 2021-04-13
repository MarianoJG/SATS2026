/*=============================================
ACTIVAR AGREGAR CAMPOS SELECT2 EN HIJOS
=============================================*/
$.fn.select2.defaults.set('language', 'es');

$('#modalAgregarHijos').on('shown.bs.modal', function () {

  $('#buscaTrabajador').select2({
    minimumInputLength: 2,
    theme: 'bootstrap4',
    placeholder: $(this).attr('placeholder'),
    allowClear: Boolean($(this).data('allow_clear')),


  });

  //BUSCA EL TRABAJADOR POR NUM DE EMPLEADO Y SE CARGAN LOS DATOS NOMBRES Y TIPO EMP

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
        $("#nuevoNumEmpleado").val(respuesta["num_empleado"]);

        $("#nomTrabajador").val(respuesta["nombres"] + " " + (respuesta["a_paterno"]) + " " + (respuesta["a_materno"]));

        $("#tipoEmpleado").val(respuesta["tipo_empleado"]);
        $("#nuevoDepartamento").val(respuesta["departamento"]);


      }

    })

  });

})


/*=============================================
EDITAR CAMPOS SELECT2 EN HIJOS
=============================================*/
$.fn.select2.defaults.set('language', 'es');

$('#modalEditarHijo').on('shown.bs.modal', function () {

  $('#EditarbuscaTrabajador').select2({
    minimumInputLength: 2,
    theme: 'bootstrap4',
    placeholder: $(this).attr('placeholder'),
    allowClear: Boolean($(this).data('allow_clear')),


  });

  $('#EditarbuscaTrabajador').change(function () {
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


        $("#EditartrabajadorId").val(respuesta["id_trabajador"]);
        $("#EditarNumEmpleado").val(respuesta["num_empleado"]);

        $("#EditarnomTrabajador").val(respuesta["nombres"] + " " + (respuesta["a_paterno"]) + " " + (respuesta["a_materno"]));

        $("#EditartipoEmpleado").val(respuesta["tipo_empleado"]);

        $("#editarDepartamento").val(respuesta["departamento"]);


      }

    })

  });

})




/*=============================================
AL CANCELAR LIMPIAR FORMULARIO DE USUARIOS
=============================================*/


$("#CancelarAgregarHijo").click(function (event) {
  // $("#registrationForm")[0].reset();

  // $(".previsualizar").attr("src","vistas/img/trabajadores/default/icon-jpeg.png");
  setTimeout("location.href='registro-hijos'", 1);

});

$("#CancelarEditarHijo").click(function (event) {
  //$("#registrationFormHijosEditar")[0].reset();

  // $(".previsualizar").attr("src","vistas/img/trabajadores/default/icon-jpeg.png");
  setTimeout("location.href='registro-hijos'", 1);

});




/*=============================================
EDITAR HIJOS
=============================================*/
$(".TablaHijos").on("click", ".btnEditarHijo", function () {

  var idHijo = $(this).attr("idHijo");

  var datos = new FormData();
  datos.append("idHijo", idHijo);

  $.ajax({
    url: "ajax/hijos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#EditarbuscaTrabajador").val(respuesta["id_trabajador"]);
      $("#EditarNumEmpleado").val(respuesta["num_empleado"]);
      $("#EditartrabajadorId").val(respuesta["id_trabajador"]);
      $("#editarDepartamento").val(respuesta["departamento"]);
      $("#EditartipoEmpleado").val(respuesta["tipo_empleado"]);


      $("#EditarnomTrabajador").val(respuesta["nombre_completo_trabajador"]);

      $("#EditarnuevoNomHijo").val(respuesta["nombre_completo"]);
      $("#EditarnuevoFechaNacH").val(respuesta["f_nacimiento"]);
      $("#idHijo").val(respuesta["id_hijo"]);

    }

  })


})





/*===================================================
ADD FORMULARIO DINAMICO
====================================================*/

$(document).ready(function () {
  var

    hijosIndex = 0;

  $('#registrationFormHijos')

    // Add button click handler
    .on('click', '.addButton', function () {
      hijosIndex++;
      var $template = $('#hijosTemplate'),
        $clone = $template
          .clone()
          .removeClass('hide')
          .removeAttr('id')
          .attr('data-hijos-index', hijosIndex)
          .insertBefore($template);

      // Update the name attributes
      $clone
        .find('[name="nuevoNomHijo"]').attr('name', 'hijos[' + hijosIndex + '].nuevoNomHijo').end()
        .find('[name="nuevoFechaNacH"]').attr('name', 'hijos[' + hijosIndex + '].nuevoFechaNacH').end();

      // Add new fields
      // Note that we also pass the validator rules for new field as the third parameter

    })

    // Remove button click handler
    .on('click', '.removeButton', function () {
      var $row = $(this).parents('.form-group'),
        index = $row.attr('data-hijos-index');


      //  // Remove fields
      $('#registrationFormHijos')
        .remove('removeField', $row.find('[name="hijos[' + hijosIndex + '].nuevoNomHijo"]'))
        .remove('removeField', $row.find('[name="hijos[' + hijosIndex + '].nuevoFechaNacH"]'));




      // Remove element containing the fields
      $row.remove();
    });
});



/*=============================================
CARGAR LA TABLA DINAMICA DE TRABAJADORES
=============================================*/

var perfilOculto = $("#perfilOculto").val();
$('.TablaHijos').DataTable({
  "ajax": "ajax/datatable-hijos.ajax.php?perfilOculto=" + perfilOculto,
  "deferRender": true,
  "retrieve": true,

  "lengthChange": false,

  "order": [[0, "desc"]],

  "dom": 'Bfrtip',

  "columnDefs": [
    { targets: [1], class: "nowrap" },
    { targets: [2], class: "normal" },
    { targets: [3], class: "nowrap" },
    { targets: [4], class: "nowrap" },
    { targets: [5], class: "normal" },
    { targets: [6], class: "normal" }



    ,
  ],

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
      messageTop: 'Hijos de Trabajadores Sindicalizados.'
    }
  ],






  "language": {

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



/*=============================================
tooltip tabla hijos
=============================================*/

$(document).ready(function () {
  //$('[data-toggle="tooltip"]').tooltip(); 

  $('body').tooltip({ selector: '[data-toggle="tooltip"]' });
});






/*=============================================
FORM VALIDATION REGISTRAR HIJOS
=============================================*/


$(document).ready(function () {
  $('#registrationFormHijos')


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

        nuevoNomHijo: {
          validators: {
            notEmpty: {
              message: 'El Campo Apellido Paterno es es obligatorio...'
            },
            stringLength: {
              min: 3,
              message: 'El Apellido Paterno debe contener al menos 3 caracteres'
            }
          }
        },


        nuevoFechaNacH: {
          validators: {
            Empty: {
              message: 'El campo Fecha de Nacimiento, es obligaria...'
            },
            date: {
              format: 'DD/MM/YYYY',
              message: 'Seleccionar una fecha valida...'

            }
          }
        },

        nuevoNomHijoHide: {
          validators: {
            notEmpty: {
              message: 'El campo Fecha de Nacimiento, es obligaria...'
            }
          }
        },

        nuevoFechaNacHHide: {
          validators: {
            notEmpty: {
              message: 'El campo Fecha de Nacimiento, es obligaria...'
            }
          }
        }


      }
    });
});


/*=============================================
FORM VALIDATION EDITAR HIJOS
=============================================*/


$(document).ready(function () {
  $('#registrationFormHijosEditar')


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



        EditarnuevoNomHijo: {
          validators: {
            notEmpty: {
              message: 'El Campo Apellido Paterno es es obligatorio...'
            },
            stringLength: {
              min: 3,
              message: 'El Apellido Paterno debe contener al menos 3 caracteres'
            }
          }
        },


        EditarnuevoFechaNacH: {
          validators: {
            Empty: {
              message: 'El campo Fecha de Nacimiento, es obligaria...'
            },
            date: {
              format: 'DD/MM/YYYY',
              message: 'Seleccionar una fecha valida...'

            }
          }
        },

        EditarnuevoNomHijoHide: {
          validators: {
            notEmpty: {
              message: 'El campo Fecha de Nacimiento, es obligaria...'
            }
          }
        },

        EditarnuevoFechaNacHHide: {
          validators: {
            notEmpty: {
              message: 'El campo Fecha de Nacimiento, es obligaria...'
            }
          }
        }


      }
    });
});





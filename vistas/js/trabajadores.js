/*=============================================
SUBIENDO LA FOTO DEL TRABAJADOR
=============================================*/
$(".nuevaFotoT").change(function(){

	var imagen = this.files[0];
	
	/*=============================================
  	VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  	=============================================*/

  	if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

  		$(".nuevaFotoT").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen debe estar en formato JPG o PNG!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else if(imagen["size"] > 2000000){

  		$(".nuevaFotoT").val("");

  		 swal({
		      title: "Error al subir la imagen",
		      text: "¡La imagen no debe pesar más de 2MB!",
		      type: "error",
		      confirmButtonText: "¡Cerrar!"
		    });

  	}else{

  		var datosImagen = new FileReader;
  		datosImagen.readAsDataURL(imagen);

  		$(datosImagen).on("load", function(event){

  			var rutaImagen = event.target.result;

  			$(".previsualizar").attr("src", rutaImagen);



  		})

  	}
})


/*=============================================
tooltip tabla trabajadores
=============================================*/

$(document).ready(function(){
    //$('[data-toggle="tooltip"]').tooltip(); 

    $('body').tooltip({selector: '[data-toggle="tooltip"]'});   
});






/*=============================================
ACTUALIZANDO LA FOTO DEL TRABAJADOR
=============================================*/
$(".EditarnuevaFotoT").change(function(){

  var imagen = this.files[0];
  
  /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

      $(".EditarnuevaFotoT").val("");

       swal({
          title: "Error al subir la imagen",
          text: "¡La imagen debe estar en formato JPG o PNG!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

    }else if(imagen["size"] > 2000000){

      $(".EditarnuevaFotoT").val("");

       swal({
          title: "Error al subir la imagen",
          text: "¡La imagen no debe pesar más de 2MB!",
          type: "error",
          confirmButtonText: "¡Cerrar!"
        });

    }else{

      var datosImagen = new FileReader;
      datosImagen.readAsDataURL(imagen);

      $(datosImagen).on("load", function(event){

        var rutaImagen = event.target.result;

        $(".previsualizarE").attr("src", rutaImagen);



      })

    }
})







/*=============================================
AL CANCELAR LIMPIAR FORMULARIO DE TRABAJADORES
=============================================*/

 $("#CancelarAgregarTrabajador").click(function(event) {
      // $("#registrationForm")[0].reset();
   
      // $(".previsualizar").attr("src","vistas/img/trabajadores/default/icon-jpeg.png");
      setTimeout("location.href='registro-trabajadores'", 1);
             
   });


 /*=============================================
              DateTimePickers
=============================================*/




        $(function () {
            $('#datetimepicker1').datetimepicker({
                viewMode: 'years',
                format: 'L',
                format: 'YYYY/MM/DD',
                maxDate: moment().add(+1,'days'),
            });
        });         

  
       




/*=============================================
EDITAR TRABAJADOR
=============================================*/
$(document).on("click", ".btnEditarTrabajador", function(){
 
 var idTrabajador = $(this).attr("idTrabajador");
 
 var datos = new FormData();
 datos.append("idTrabajador", idTrabajador);
 
 $.ajax({
   
   url:"ajax/trabajadores.ajax.php",
   method: "POST",
   data: datos,
   cache: false,
   contentType: false,
   processData: false,
   dataType: "json",
   success: function(respuesta){
  
        $("#idTrabajador").val(respuesta["id_trabajador"]);
        $("#editarNumEmpleado").val(respuesta["num_empleado"]);
        $("#editarNombreTrabajador").val(respuesta["nombres"]);
        $("#editarApellidoPaterno").val(respuesta["a_paterno"]);
        $("#editarApellidoMaterno").val(respuesta["a_materno"]);
        
        $("#editarSexo").val(respuesta["sexo"]);
        $("#editarEdoCivil").val(respuesta["edo_civil"]);
        $("#editarFechaNac").val(respuesta["f_nacimiento"]);
        
        if(respuesta["fotot"] != ""){
        
        $("#fotoActual").val(respuesta["fotot"]);
        $(".previsualizarE").attr("src", respuesta["fotot"]);
        
        }else{
        $(".previsualizarE").attr("src","vistas/img/trabajadores/default/icon-jpeg.png");
        
        }
        
        
        $("#editarFechaIngreso").val(respuesta["f_ingreso"]);
        $("#editarTipoEmpleado").val(respuesta["tipo_empleado"]);
        $("#editarCategoria").val(respuesta["categoria"]);
        
        
        $("#editarDepartamento").val(respuesta["departamento"]); 
        $("#editarEscolaridad").val(respuesta["escolaridad"]);   
        
        
        $("#editarMunicipioEstado").val(respuesta["municipioestado"]);
        $("#editarColonia").val(respuesta["colonia"]);
        $("#editarDireccion").val(respuesta["calle_numero"]);
        $("#editarTelefono").val(respuesta["telefono"]);
        $("#editarEmail").val(respuesta["email"]);
        
   }
   
 });
 
})


/*===================================================
REVISAR SI EL NUMERO DE EMPLEADO  YA ESTÁ REGISTRADO
====================================================*/

$("#nuevoNumEmpleado").change(function(){

	$(".alert").remove();


	var num_empleado = $(this).val();

	var datos = new FormData();
	datos.append("validarTrabajador", num_empleado);

	 $.ajax({
	    url:"ajax/trabajadores.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoNumEmpleado").parent().after('<div class="alert alert-warning"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> El número de empleado ya existe en la base de datos.</div>');

	    		$("#nuevoNumEmpleado").val("");

	    	}

	    }

	})
})





/*=============================================
LIMPIAR CAMPOS MODAL AGREGAR TRABAJADORES
=============================================
$("#CancelarAgregarTrabajador").on("click", function (event){

	swal({
  title: 'Cancelar Formulario?',
  text: "Se limpiaran los campos capturados hasta el momento!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
   cancelButtonText: 'No',
  confirmButtonText: 'Si, Cancelar!'
}).then((result) => {
  if (result.value) {
    swal(
      'Cancelado!',
      'El Formulario ha sido cancelado con exito!.',
      'success',
      'timer: 1500'
    )
    setTimeout("location.href='registro-trabajadores'", 1000);
  }
})

	
});*/



/*=============================================
LIMPIAR CAMPOS MODAL EDITAR TRABAJADORES
=============================================
$("#CancelarEditarTrabajador").on("click", function (event){

  swal({
  title: 'Cancelar Edicion?',
  text: "No se efectuarán los cambios!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
   cancelButtonText: 'No',
  confirmButtonText: 'Si, Cancelar!'
}).then((result) => {
  if (result.value) {
    swal(
      'Cancelado!',
      'La Edición ha sido cancelada con exito!.',
      'success',
      'timer: 1500'
    )
    setTimeout("location.href='registro-trabajadores'", 1000);
  }
})

  
});*/



/*=============================================
ACTIVAR AGREGAR CAMPOS SELECT2 EN TRABAJADORES
=============================================*/
$.fn.select2.defaults.set('language', 'es');

$('#modalAgregarTrabajador').on('shown.bs.modal', function () {

 $('#nuevoSexo').select2({
   theme: 'bootstrap4',
   placeholder: $(this).attr('placeholder'),
   allowClear: Boolean($(this).data('allow_clear')),

 })


 $('#nuevoEdoCivil').select2({
   theme: 'bootstrap4',
   placeholder: $(this).attr('placeholder'),
   allowClear: Boolean($(this).data('allow_clear')),

 })


 $('#nuevoTipoEmpleado').select2({
   theme: 'bootstrap4',
   placeholder: $(this).attr('placeholder'),
   allowClear: Boolean($(this).data('allow_clear')),

 })


 $('#nuevoCategoria').select2({
   minimumInputLength: 3,
   theme: 'bootstrap4',
   placeholder: $(this).attr('placeholder'),
   allowClear: Boolean($(this).data('allow_clear')),

 })


 $('#nuevoDepartamento').select2({
   minimumInputLength: 3,
   theme: 'bootstrap4',
   placeholder: $(this).attr('placeholder'),
   allowClear: Boolean($(this).data('allow_clear')),

 })


 $('#nuevoEscolaridad').select2({
  minimumInputLength: 3,
   theme: 'bootstrap4',
   placeholder: $(this).attr('placeholder'),
   allowClear: Boolean($(this).data('allow_clear')),

 })


 $('#nuevoColonia').select2({
   minimumInputLength: 3,
   theme: 'bootstrap4',
   placeholder: $(this).attr('placeholder'),
   allowClear: Boolean($(this).data('allow_clear')),


 })

})


 /*=============================================
ACTIVAR EDITAR CAMPOS SELECT2 EN TRABAJADORES
=============================================*/
$('#modalEditarTrabajador').on('shown.bs.modal', function () {

  $('#editarSexo').select2({
    theme: 'bootstrap4',
    placeholder: $(this).attr('placeholder'),
    allowClear: Boolean($(this).data('allow_clear')),
    
  })


  $('#editarEdoCivil').select2({
    theme: 'bootstrap4',
    placeholder: $(this).attr('placeholder'),
    allowClear: Boolean($(this).data('allow_clear')),
    
  })


  $('#editarTipoEmpleado').select2({
    theme: 'bootstrap4',
    placeholder: $(this).attr('placeholder'),
    allowClear: Boolean($(this).data('allow_clear')),
    
  })


  $('#editarCategoria').select2({
    minimumInputLength: 3, 
    theme: 'bootstrap4',
    placeholder: $(this).attr('placeholder'),
    allowClear: Boolean($(this).data('allow_clear')),
    
  })


  $('#editarDepartamento').select2({
    minimumInputLength: 3,
    theme: 'bootstrap4',
    placeholder: $(this).attr('placeholder'),
    allowClear: Boolean($(this).data('allow_clear')),
    
  })


  $('#editarEscolaridad').select2({
    theme: 'bootstrap4',
    placeholder: $(this).attr('placeholder'),
    allowClear: Boolean($(this).data('allow_clear')),
    
  })


  $('#editarColonia').select2({
    minimumInputLength: 3,
    theme: 'bootstrap4',
    placeholder: $(this).attr('placeholder'),
    allowClear: Boolean($(this).data('allow_clear')),
    
    
  })

})




/*=============================================
CARGAR LA TABLA DINAMICA DE TRABAJADORES
=============================================*/

var perfilOculto = $("#perfilOculto").val();

$('.TablaTrabajadores').DataTable( {
  "ajax": "ajax/datatable-trabajadores.ajax.php?perfilOculto="+perfilOculto,
  "deferRender": true,
  "retrieve": true,
  //"processing": true,
  "language": {

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

  },
  
  "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos"]]
} );


  



/*=============================================
FORM VALIDATION REGISTRAR
=============================================*/

 $(document).ready(function() {
    $('#registrationForm')
      

        .formValidation({
            framework: 'bootstrap4',

            icon: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
           
            fields: {
                nuevoNumEmpleado: {
                  validators: {
                    notEmpty: {
                      message: 'El Numero de Empleado es obligatorio...'
                    },
                    stringLength: {
                      min: 5,
                      message: 'El Número de Empleado debe contener 5 caracteres'
                    },
                    regexp: {
                      message: 'El Número de Empleado solo admite numeros enteros',
                      regexp: /^[0-9]+$/
                    }
                  }
                },
                  
                nuevoNombreTrabajador: {
                  validators: {
                    notEmpty: {
                      message: 'El Campo Nombre es es obligatorio...'
                    },
                    stringLength: {
                      min: 3,
                      message: 'El Nombre debe contener al menos 3 caracteres'
                    }
                  }
                },

                nuevoApellidoPaterno: {
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

                nuevoApellidoMaterno: {
                  validators: {
                    Empty: {
                      message: 'El Campo Apellido Materno es es obligatorio...'
                    },
                    stringLength: {
                      min: 3,
                      message: 'El Apellido Materno debe contener al menos 3 caracteres'
                    }
                  }
                },

                nuevoSexo:{
                  validators:{
                    notEmpty:{
                      message: 'El campo sexo, es obligario...'
                    }
                  }
                },

                 nuevoEdoCivil:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Estado Civil, es obligario...'
                    }
                  }
                },

                 nuevoFechaNac:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Fecha de Nacimiento, es obligaria...'
                    },
                    date: {
                      format: 'DD/MM/YYYY',
                      message: 'Seleccionar una fecha valida...'

                    }
                  }
                },

                nuevoEdadActual: {
                  validators: {
                    
                    
                  }
                },

                nuevaFotoT: {
                  validators: {
                    notEmpty: {
                      message: 'El Campo Fotografia es obligatorio, no puede ser vacio'
                    },
                    file: {
                      extension: 'jpg',

                      message: 'El archivo de imagen tiene que ser con extension .jpg'
                    }

                  }
                },

                 nuevoFechaIngreso:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Fecha de Ingreso, es obligaria...'
                    }
                  }
                },

                 nuevoAntiguedad: {
                  validators: {
                    
                    
                  }
                },

                nuevoTipoEmpleado:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Tipo de Empleado, es obligario...'
                    }
                  }
                },

                nuevoCategoria:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Categoria, es obligario...'
                    }
                  }
                },

                nuevoDepartamento:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Adscripción, es obligario...'
                    }
                  }
                },

                nuevoEscolaridad:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Escolaridad, es obligario...'
                    }
                  }
                },

                nuevoMunicipioEstado:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Municipio / Estado, es obligario...'
                    }
                  }
                },

                 nuevoColonia:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Colonia, es obligario...'
                    }
                  }
                },

                 nuevoDireccion: {
                  validators: {
                    notEmpty: {
                      message: 'El Campo Dirección es es obligatorio...'
                    },
                    stringLength: {
                      min: 5,
                      message: 'El campo Dirección debe contener al menos 5 caracteres'
                    }
                  }
                },

                 nuevoTelefono: {
                  validators: {
                    notEmpty: {
                      message: 'El Campo Número de Telefono es es obligatorio...'
                    },
                    stringLength: {
                      min: 10,
                      message: 'El campo Número Telefono debe contener al menos 10 caracteres'
                    }
                  }
                },

                nuevoEmail: {
                  validators: {
                                 Empty: {
                      message: 'El Campo Correo electrónico, no puede ir vacio...'
                    },
                   
                    regexp: {
                      regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                      message: 'Ese no es un correo electrónico valido...'
                    }
                  }
                },


                quantity: {
                    validators: {
                        notEmpty: {
                            message: 'The quantity is required'
                        },
                        integer: {
                            message: 'The quantity must be a number'
                        }
                    }
                }
            }
        });
  });


/*=============================================
FORM VALIDATION EDITAR
=============================================*/

 $(document).ready(function() {
    $('#registrationFormEditar')
        

        .formValidation({
            framework: 'bootstrap4',

            icon: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
           
            fields: {
                editarNumEmpleado: {
                  validators: {
                    notEmpty: {
                      message: 'El Numero de Empleado es obligatorio...'
                    },
                    stringLength: {
                      min: 5,
                      message: 'El Número de Empleado debe contener 5 caracteres'
                    },
                    regexp: {
                      message: 'El Número de Empleado solo admite numeros enteros',
                      regexp: /^[0-9]+$/
                    }
                  }
                },
                  
                editarNombreTrabajador: {
                  validators: {
                    notEmpty: {
                      message: 'El Campo Nombre es es obligatorio...'
                    },
                    stringLength: {
                      min: 3,
                      message: 'El Nombre debe contener al menos 3 caracteres'
                    }
                  }
                },

                editarApellidoPaterno: {
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

                editarApellidoMaterno: {
                  validators: {
                    Empty: {
                      message: 'El Campo Apellido Materno es es obligatorio...'
                    },
                    stringLength: {
                      min: 3,
                      message: 'El Apellido Materno debe contener al menos 3 caracteres'
                    }
                  }
                },

                editarSexo:{
                  validators:{
                    notEmpty:{
                      message: 'El campo sexo, es obligario...'
                    }
                  }
                },

                 editarEdoCivil:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Estado Civil, es obligario...'
                    }
                  }
                },

                 editarFechaNac:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Fecha de Nacimiento, es obligaria...'
                    },
                    date: {
                      format: 'DD/MM/YYYY',
                      message: 'Seleccionar una fecha valida...'

                    }
                  }
                },

                

                nuevaFotoT: {
                  validators: {
                  
                    file: {
                      extension: 'jpg',

                      message: 'El archivo de imagen tiene que ser con extension .jpg'
                    }

                  }
                },

                 editarFechaIngreso:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Fecha de Ingreso, es obligaria...'
                    }
                  }
                },

                 nuevoAntiguedad: {
                  validators: {
                    
                    
                  }
                },

                editarTipoEmpleado:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Tipo de Empleado, es obligario...'
                    }
                  }
                },

                editarCategoria:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Categoria, es obligario...'
                    }
                  }
                },

                editarDepartamento:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Adscripción, es obligario...'
                    }
                  }
                },

                editarEscolaridad:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Escolaridad, es obligario...'
                    }
                  }
                },

                editarMunicipioEstado:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Municipio / Estado, es obligario...'
                    }
                  }
                },

                 editarColonia:{
                  validators:{
                    notEmpty:{
                      message: 'El campo Colonia, es obligario...'
                    }
                  }
                },

                 editarDireccion: {
                  validators: {
                    notEmpty: {
                      message: 'El Campo Dirección es es obligatorio...'
                    },
                    stringLength: {
                      min: 5,
                      message: 'El campo Dirección debe contener al menos 5 caracteres'
                    }
                  }
                },

                 editarTelefono: {
                  validators: {
                    notEmpty: {
                      message: 'El Campo Número de Telefono es es obligatorio...'
                    },
                    stringLength: {
                      min: 10,
                      message: 'El campo Número Telefono debe contener al menos 10 caracteres'
                    }
                  }
                },

                editarEmail: {
                  validators: {
                                 Empty: {
                      message: 'El Campo Correo electrónico, no puede ir vacio...'
                    },
                   
                    regexp: {
                      regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                      message: 'Ese no es un correo electrónico valido...'
                    }
                  }
                },


                quantity: {
                    validators: {
                        notEmpty: {
                            message: 'The quantity is required'
                        },
                        integer: {
                            message: 'The quantity must be a number'
                        }
                    }
                }
            }
        });
  });



/* IMPRIMIR EXPENDIENTE */


$(".table").on("click", ".btnPrintTrabajador", function(){

  var idTrabajador = $(this).attr("idTrabajador");


  window.open("extensiones/tcpdf/pdf/expediente.php?id_trabajador="+idTrabajador, "_blank");

})




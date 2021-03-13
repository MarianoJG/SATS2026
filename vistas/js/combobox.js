/*=============================================
EDITAR  COMBO CATEGORIA
=============================================
$(".table").on("click", ".btnEditarTrabajador", function(){

	var idComboboxCategoria = $(this).attr("idComboboxCategoria");

	var datos = new FormData();
	datos.append("idComboboxCategoria", idComboboxCategoria);

	$.ajax({
		url: "ajax/combobox.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){
        console.log('Línea 20. respuesta => ', respuesta);

     	
     		
     	}

	})


})*/

/*=============================================
EDITAR  COMBO DEPARTAMENTO
=============================================
$(".tablas").on("click", ".btnEditarDepartamento", function(){

  var idComboboxDepartamento = $(this).attr("idComboboxDepartamento");

  var datos = new FormData();
  datos.append("idComboboxDepartamento", idComboboxDepartamento);

  $.ajax({
    url: "ajax/combobox.ajax.php",
    method: "POST",
        data: datos,
        cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success: function(respuesta){

        $("#editarDepartamento").val(respuesta["departamento"]);
        $("#idComboboxDepartamento").val(respuesta["id_departamento"]);

      }

  })


})*/

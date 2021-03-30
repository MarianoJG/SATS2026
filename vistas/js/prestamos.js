
/*=============================================>>>>>
= INICIO MODAL #modalAgregarPrestamo =
===============================================>>>>>*/

$.fn.select2.defaults.set('language', 'es');

$('#modalAgregarPrestamo').on('shown.bs.modal', function () {

    /*==ACTIVAR AGREGAR CAMPOS SELECT2 ==*/

    $('#buscaTrabajador').select2({
        minimumInputLength: 2,
        theme: 'bootstrap4',
        placeholder: $(this).attr('placeholder'),
        allowClear: Boolean($(this).data('allow_clear')),
    })

    $('#nuevoPrestamo').select2({
        //minimumInputLength: 2,
        theme: 'bootstrap4',
        placeholder: $(this).attr('placeholder'),
        allowClear: Boolean($(this).data('allow_clear')),
    })

    /*=FIN ACTIVAR AGREGAR CAMPOS SELECT2  =*/

    /*==FORMATO DE CANTIDAD AL MONTO==*/

    $("#nuevoMontoPrestamo").number(true, 2);

    $(document).ready(function () {
        $("#nuevoMontoPrestamo").keyup(function () {
            var value = $(this).val();
            $("#MontoPrestamo").val(value);
        });
    });
    /*=FIN FORMATO DE CANTIDAD AL MONTO =*/


    /*=INICIO BOTON CANCELAR MODALES=*/

    $("#CancelarAgregar-Prestamo").click(function (event) {
        setTimeout("location.href='finanzas-prestamos'", 1);
    });


    /*=FIN BOTON CANCELAR MODALES=*/


    /*== BUSCA EL TRABAJADOR POR NUM DE EMPLEADO Y SE CARGAN LOS DATOS NOMBRES Y TIPO EMP ==*/

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

    /*== BUSCA EL TIPO DE PRESTAMO==*/

    $('#nuevoPrestamo').change(function () {
        var buscarPrestamo = $(this).val();
        var datos = new FormData();
        datos.append('buscarPrestamo', buscarPrestamo);
        $.ajax({
            url: "ajax/prestamos.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,

            dataType: "json",
            success: function (respuesta) {

                $("#nuevoPrestamo").val(respuesta["prestamo"]);
                $("#prestamoId").val(respuesta["id_tipo_prestamo"]);
            }
        })
    });

    /*=END  BUSCA EL TIPO DE PRESTAMO =*/
})
/*=============================================<<<<<*/
/*=FIN DE MODAL #modalAgregarPrestamo =*/
/*=============================================<<<<<*/



/*=============================================<<<<<*/
/*=INICIO MODAL #modalEditarPrestamo =*/
/*=============================================<<<<<*/

$.fn.select2.defaults.set('language', 'es');

$('#modalEditarPrestamo').on('shown.bs.modal', function () {

    /*==ACTIVAR AGREGAR CAMPOS SELECT2 ==*/

    $('#EditarbuscaTrabajador').select2({
        minimumInputLength: 2,
        theme: 'bootstrap4',
        placeholder: $(this).attr('placeholder'),
        allowClear: Boolean($(this).data('allow_clear')),
    })

    $('#buscarEditarPrestamo').select2({
        //minimumInputLength: 2,
        theme: 'bootstrap4',
        placeholder: $(this).attr('placeholder'),
        allowClear: Boolean($(this).data('allow_clear')),
    })

    /*=FIN ACTIVAR AGREGAR CAMPOS SELECT2  =*/

    /*==FORMATO DE CANTIDAD AL MONTO==*/

    $("#EditarnuevoMontoPrestamo").number(true, 2);

    $(document).ready(function () {
        $("#EditarnuevoMontoPrestamo").keyup(function () {
            var value = $(this).val();
            $("#EditarMontoPrestamo").val(value);
        });
    });
    /*=FIN FORMATO DE CANTIDAD AL MONTO =*/


    /*=INICIO BOTON CANCELAR MODALES=*/
    $("#CancelarEditar-Prestamos").click(function (event) {
        setTimeout("location.href='finanzas-prestamos'", 1);
    });
    /*=FIN BOTON CANCELAR MODALES=*/


    /*== BUSCA EL TRABAJADOR POR NUM DE EMPLEADO Y SE CARGAN LOS DATOS NOMBRES Y TIPO EMP ==*/

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
                $("#EditarnomTrabajador").val(respuesta["nombres"] + " " + (respuesta["a_paterno"]) + " " + (respuesta["a_materno"]));
                $("#EditartipoEmpleado").val(respuesta["tipo_empleado"]);
            }
        })
    });
    /*=END =*/

    /*== BUSCA EL TIPO DE PRESTAMO==*/

    $('#buscarEditarPrestamo').change(function () {
        var buscarPrestamo = $(this).val();
        var datos = new FormData();
        datos.append('buscarPrestamo', buscarPrestamo);
        $.ajax({
            url: "ajax/prestamos.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,

            dataType: "json",
            success: function (respuesta) {

                $("#EditarPrestamo").val(respuesta["prestamo"]);
                $("#EditarprestamoId").val(respuesta["id_tipo_prestamo"]);
            }
        })
    });

    /*=END  BUSCA EL TIPO DE PRESTAMO =*/
})

/*=============================================<<<<<*/
/*=INICIO MODAL #modalAplicarPrestamo =*/
/*=============================================<<<<<*/

$.fn.select2.defaults.set('language', 'es');

$('#modalAplicarPrestamo').on('shown.bs.modal', function () {

    /*==ACTIVAR AGREGAR CAMPOS SELECT2 ==*/

    $('#EditarAplicarbuscaTrabajador').select2({
        minimumInputLength: 2,
        theme: 'bootstrap4',
        placeholder: $(this).attr('placeholder'),
        allowClear: Boolean($(this).data('allow_clear')),
    })

    $('#buscarEditarAplicarPrestamo').select2({
        //minimumInputLength: 2,
        theme: 'bootstrap4',
        placeholder: $(this).attr('placeholder'),
        allowClear: Boolean($(this).data('allow_clear')),
    })

    /*=FIN ACTIVAR AGREGAR CAMPOS SELECT2  =*/

    /*==FORMATO DE CANTIDAD AL MONTO==*/

    $("#EditarAplicarnuevoMontoPrestamo").number(true, 2);

    $(document).ready(function () {
        $("#EditarAplicarnuevoMontoPrestamo").keyup(function () {
            var value = $(this).val();
            $("#EditarAplicarMontoPrestamo").val(value);
        });
    });
    /*=FIN FORMATO DE CANTIDAD AL MONTO =*/


    /*=INICIO BOTON CANCELAR MODALES=*/
    $("#CancelarEditarAplicar-Prestamos").click(function (event) {
        setTimeout("location.href='finanzas-prestamos'", 1);
    });
    /*=FIN BOTON CANCELAR MODALES=*/


    /*== BUSCA EL TRABAJADOR POR NUM DE EMPLEADO Y SE CARGAN LOS DATOS NOMBRES Y TIPO EMP ==*/

    $('#EditarAplicarBuscaTrabajador').change(function () {
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

                // $("#EditarAplicarbuscaTrabajador").val(respuesta["num_empleado"]);
                $("#EditarAplicarTrabajadorId").val(respuesta["id_trabajador"]);
                $("#EditarAplicarnomTrabajador").val(respuesta["nombres"] + " " + (respuesta["a_paterno"]) + " " + (respuesta["a_materno"]));
                $("#EditarAplicartipoEmpleado").val(respuesta["tipo_empleado"]);
            }
        })

    });
    /*=END =*/

    /*== BUSCA EL TIPO DE PRESTAMO==*/

    $('#buscarEditarAplicarPrestamo').change(function () {
        var buscarPrestamo = $(this).val();
        var datos = new FormData();
        datos.append('buscarPrestamo', buscarPrestamo);
        $.ajax({
            url: "ajax/prestamos.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,

            dataType: "json",
            success: function (respuesta) {

                $("#EditarAplicarPrestamo").val(respuesta["prestamo"]);
                $("#EditarAplicarprestamoId").val(respuesta["id_tipo_prestamo"]);
            }
        })
    });

    /*=END  BUSCA EL TIPO DE PRESTAMO =*/
})


/*=============================================<<<<<*/
/*=INICIO MODAL #modalEntregarPrestamo =*/
/*=============================================<<<<<*/

$.fn.select2.defaults.set('language', 'es');

$('#modalEntregarPrestamo').on('shown.bs.modal', function () {

    /*==ACTIVAR AGREGAR CAMPOS SELECT2 ==*/

    $('#EditarEntregarbuscaTrabajador').select2({
        minimumInputLength: 2,
        theme: 'bootstrap4',
        placeholder: $(this).attr('placeholder'),
        allowClear: Boolean($(this).data('allow_clear')),
    })

    $('#buscarEditarEntregarPrestamo').select2({
        //minimumInputLength: 2,
        theme: 'bootstrap4',
        placeholder: $(this).attr('placeholder'),
        allowClear: Boolean($(this).data('allow_clear')),
    })

    /*=FIN ACTIVAR AGREGAR CAMPOS SELECT2  =*/

    /*==FORMATO DE CANTIDAD AL MONTO==*/

    $("#EditarEntregarnuevoMontoPrestamo").number(true, 2);

    $(document).ready(function () {
        $("#EditarAplicarnuevoMontoPrestamo").keyup(function () {
            var value = $(this).val();
            $("#EditarEntregarMontoPrestamo").val(value);
        });
    });
    /*=FIN FORMATO DE CANTIDAD AL MONTO =*/


    /*=INICIO BOTON CANCELAR MODALES=*/
    $("#CancelarEditarEntregar-Prestamos").click(function (event) {
        setTimeout("location.href='finanzas-prestamos'", 1);
    });
    /*=FIN BOTON CANCELAR MODALES=*/


    /*== BUSCA EL TRABAJADOR POR NUM DE EMPLEADO Y SE CARGAN LOS DATOS NOMBRES Y TIPO EMP ==*/

    $('#EditarEntregarBuscaTrabajador').change(function () {
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

                // $("#EditarAplicarbuscaTrabajador").val(respuesta["num_empleado"]);
                $("#EditarEntregarTrabajadorId").val(respuesta["id_trabajador"]);
                $("#EditarEntregarnomTrabajador").val(respuesta["nombres"] + " " + (respuesta["a_paterno"]) + " " + (respuesta["a_materno"]));
                $("#EditarEntregartipoEmpleado").val(respuesta["tipo_empleado"]);
            }
        })

    });
    /*=END =*/

    /*== BUSCA EL TIPO DE PRESTAMO==*/

    $('#buscarEditarEntregarPrestamo').change(function () {
        var buscarPrestamo = $(this).val();
        var datos = new FormData();
        datos.append('buscarPrestamo', buscarPrestamo);
        $.ajax({
            url: "ajax/prestamos.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,

            dataType: "json",
            success: function (respuesta) {

                $("#EditarEntregarPrestamo").val(respuesta["prestamo"]);
                $("#EditarEntregarprestamoId").val(respuesta["id_tipo_prestamo"]);
            }
        })
    });

    /*=END  BUSCA EL TIPO DE PRESTAMO =*/
})


/*=============================================<<<<<*/
/*=INICIO MODAL #modalCancelarPrestamo =*/
/*=============================================<<<<<*/

$.fn.select2.defaults.set('language', 'es');

$('#modalCancelarPrestamo').on('shown.bs.modal', function () {

    /*==ACTIVAR AGREGAR CAMPOS SELECT2 ==*/

    $('#EditarCancelarbuscaTrabajador').select2({
        minimumInputLength: 2,
        theme: 'bootstrap4',
        placeholder: $(this).attr('placeholder'),
        allowClear: Boolean($(this).data('allow_clear')),
    })

    $('#buscarEditarCancelarPrestamo').select2({
        //minimumInputLength: 2,
        theme: 'bootstrap4',
        placeholder: $(this).attr('placeholder'),
        allowClear: Boolean($(this).data('allow_clear')),
    })

    /*=FIN ACTIVAR AGREGAR CAMPOS SELECT2  =*/

    /*==FORMATO DE CANTIDAD AL MONTO==*/

    $("#EditarCancelarnuevoMontoPrestamo").number(true, 2);

    $(document).ready(function () {
        $("#EditarAplicarnuevoMontoPrestamo").keyup(function () {
            var value = $(this).val();
            $("#EditarEntregarMontoPrestamo").val(value);
        });
    });

    /*=FIN FORMATO DE CANTIDAD AL MONTO =*/


    /*=INICIO BOTON CANCELAR MODALES=*/
    $("#CancelarEditarCancelar-Prestamos").click(function (event) {
        setTimeout("location.href='finanzas-prestamos'", 1);
    });




    /*=FIN BOTON CANCELAR MODALES=*/


    /*== BUSCA EL TRABAJADOR POR NUM DE EMPLEADO Y SE CARGAN LOS DATOS NOMBRES Y TIPO EMP ==*/

    $('#EditarCancelarBuscaTrabajador').change(function () {
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

                // $("#EditarAplicarbuscaTrabajador").val(respuesta["num_empleado"]);
                $("#EditarCancelarTrabajadorId").val(respuesta["id_trabajador"]);
                $("#EditarCancelarnomTrabajador").val(respuesta["nombres"] + " " + (respuesta["a_paterno"]) + " " + (respuesta["a_materno"]));
                $("#EditarCancelartipoEmpleado").val(respuesta["tipo_empleado"]);
            }
        })

    });
    /*=END =*/

    /*== BUSCA EL TIPO DE PRESTAMO==*/

    $('#buscarEditarCancelarPrestamo').change(function () {
        var buscarPrestamo = $(this).val();
        var datos = new FormData();
        datos.append('buscarPrestamo', buscarPrestamo);
        $.ajax({
            url: "ajax/prestamos.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,

            dataType: "json",
            success: function (respuesta) {

                $("#EditarCancelarPrestamo").val(respuesta["prestamo"]);
                $("#EditarCancelarprestamoId").val(respuesta["id_tipo_prestamo"]);
            }
        })
    });

    /*=END  BUSCA EL TIPO DE PRESTAMO =*/
})

/* fin modal cancelar prestamo */









/*=============================================>>>>>
= INICIO CARGA TABLA DINAMICA  =
===============================================>>>>>*/
var perfilOculto = $("#perfilOculto").val();
$('.TablaPrestamos').DataTable({

    "ajax": "ajax/datatable-prestamos.ajax.php?perfilOculto=" + perfilOculto,
    "deferRender": true,
    "retrieve": true,

    "lengthChange": false,

    "order": [[0, "desc"]],

    "dom": 'Bfrtip',

    "columnDefs": [
        { targets: [1], class: "nowrap" },
        { targets: [2], class: "nowrap" },
        { targets: [3], class: "normal" },
        { targets: [4], class: "nowrap" },
        { targets: [5], class: "nowrap" },
        { targets: [6], class: "nowrap" },
        { targets: [7], class: "nowrap" },
        { targets: [8], class: "nowrap" },
        { targets: [9], class: "nowrap" }


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
= INICIO EDITAR TABLA PRESTAMOS =
===============================================>>>>>*/

$(".TablaPrestamos").on("click", ".btnEditar-Prestamo", function () {
    var idPrestamo = $(this).attr("idPrestamo");
    var datos = new FormData();
    datos.append("idPrestamo", idPrestamo);

    $.ajax({
        url: "ajax/prestamos.ajax.php",
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

            $("#EditarprestamoId").val(respuesta["id_finanzas_prestamo"]);
            $("#buscarEditarPrestamo").val(respuesta["tipo_prestamo"]);
            $("#EditarPrestamo").val(respuesta["tipo_prestamo"]);

            $("#EditarnuevoMontoPrestamo").val(respuesta["monto_tp"]);
            $("#EditarMontoPrestamo").val(respuesta["monto_tp"]);

            $("#EditarFechaPrestamo").val(respuesta["f_registro_tp"]);
            $("#EditaridPrestamo").val(respuesta["id_finanzas_prestamo"]);
            $("#EditarEstatus").val(respuesta["estatus_prestamo"]);
            $("#BarCodePrestamoEditarId").val(respuesta["id_finanzas_prestamo"]);
        }
    })
})

/*=FIN EDITAR TABLA PRESTAMOS =*/
/*=============================================<<<<<*/

/*=============================================>>>>>
= INICIO EDITAR APLICAR TABLA PRESTAMOS =
===============================================>>>>>*/

$(".TablaPrestamos").on("click", ".btnEditarAplicar-Prestamo", function () {
    var idPrestamo = $(this).attr("idPrestamo");
    var datos = new FormData();
    datos.append("idPrestamo", idPrestamo);

    $.ajax({
        url: "ajax/prestamos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            //console.log('Línea 203. respuesta => ', respuesta);

            $("#EditarAplicarTrabajadorId").val(respuesta["id_trabajador"]);
            $("#EditarAplicarbuscaTrabajador").val(respuesta["id_trabajador"]);
            $("#EditarAplicarnomTrabajador").val(respuesta["nombre_completo"]);
            $("#EditarAplicartipoEmpleado").val(respuesta["tipo_empleado"]);

            $("#EditarAplicarprestamoId").val(respuesta["id_tipo_prestamo"]);
            $("#buscarEditarAplicarPrestamo").val(respuesta["tipo_prestamo"]);
            $("#EditarAplicarPrestamo").val(respuesta["tipo_prestamo"]);

            $("#EditarAplicarnuevoMontoPrestamo").val(respuesta["monto_tp"]);
            $("#EditarAplicarMontoPrestamo").val(respuesta["monto_tp"]);

            /*  $("#EditarAplicarFechaPrestamo").val(respuesta["f_registro_tp"]); */
            $("#EditarAplicaridPrestamo").val(respuesta["id_finanzas_prestamo"]);
            $("#EditaraplicarEstatus").val(respuesta["estatus_prestamo"]);
            $("#BarCodePrestamoAplicarId").val(respuesta["id_finanzas_prestamo"]);
        }
    })
})

/*=FIN EDITAR TABLA PRESTAMOS =*/
/*=============================================<<<<<*/


/*=============================================>>>>>
= INICIO EDITAR APLICAR TABLA PRESTAMOS =
===============================================>>>>>*/

$(".TablaPrestamos").on("click", ".btnEditarEntregar-Prestamo", function () {
    var idPrestamo = $(this).attr("idPrestamo");
    var datos = new FormData();
    datos.append("idPrestamo", idPrestamo);

    $.ajax({
        url: "ajax/prestamos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            // console.log(respuesta);

            $("#EditarEntregarTrabajadorId").val(respuesta["id_trabajador"]);
            $("#EditarEntregarbuscaTrabajador").val(respuesta["id_trabajador"]);
            $("#EditarEntregarnomTrabajador").val(respuesta["nombre_completo"]);
            $("#EditarEntregartipoEmpleado").val(respuesta["tipo_empleado"]);

            $("#EditarEntregarprestamoId").val(respuesta["id_tipo_prestamo"]);
            $("#buscarEditarEntregarPrestamo").val(respuesta["tipo_prestamo"]);
            $("#EditarEntregarPrestamo").val(respuesta["tipo_prestamo"]);

            $("#EditarEntregarnuevoMontoPrestamo").val(respuesta["monto_tp"]);
            $("#EditarEntregarMontoPrestamo").val(respuesta["monto_tp"]);

            /*  $("#EditarEntregarFechaPrestamo").val(respuesta["f_registro_tp"]); */
            $("#EditarEntregaridPrestamo").val(respuesta["id_finanzas_prestamo"]);
            $("#CapturistaEditarEntregarPrestamo").val(respuesta["id_finanzas_prestamo"]);
            /* $("#EditarEntregarEstatus").val(respuesta["estatus_prestamo"]); */
            $("#BarCodePrestamoEntregarId").val(respuesta["id_finanzas_prestamo"]);
        }
    })
})

/*=FIN EDITAR TABLA PRESTAMOS =*/
/*=============================================<<<<<*/




/*=============================================>>>>>
= INICIO EDITAR APLICAR TABLA PRESTAMOS =
===============================================>>>>>*/

$(".TablaPrestamos").on("click", ".btnEditarCancelar-Prestamo", function () {
    var idPrestamo = $(this).attr("idPrestamo");
    var datos = new FormData();
    datos.append("idPrestamo", idPrestamo);

    $.ajax({
        url: "ajax/prestamos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (respuesta) {
            // console.log(respuesta);

            $("#EditarCancelarTrabajadorId").val(respuesta["id_trabajador"]);
            $("#EditarCancelarbuscaTrabajador").val(respuesta["id_trabajador"]);
            $("#EditarCancelarnomTrabajador").val(respuesta["nombre_completo"]);
            $("#EditarCancelartipoEmpleado").val(respuesta["tipo_empleado"]);

            $("#EditarCancelarprestamoId").val(respuesta["id_tipo_prestamo"]);
            $("#buscarCancelaPrestamo").val(respuesta["tipo_prestamo"]);
            $("#EditarCancelarPrestamo").val(respuesta["tipo_prestamo"]);

            $("#EditarCancelarnuevoMontoPrestamo").val(respuesta["monto_tp"]);
            $("#EditarCancelarMontoPrestamo").val(respuesta["monto_tp"]);

            /*  $("#EditarEntregarFechaPrestamo").val(respuesta["f_registro_tp"]); */
            $("#EditarCancelaridPrestamo").val(respuesta["id_finanzas_prestamo"]);
            $("#CapturistaEditarCancelarPrestamo").val(respuesta["id_finanzas_prestamo"]);
            /* $("#EditarEntregarEstatus").val(respuesta["estatus_prestamo"]); */
            $("#BarCodePrestamoCancelarId").val(respuesta["id_finanzas_prestamo"]);
        }
    })
})

/*=FIN EDITAR TABLA PRESTAMOS =*/
/*=============================================<<<<<*/






// <><><><><><><><><><><><><><><><><><><><><><><><><><>


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
= INICIO FORMVALIDATION AGREGAR PRESTAMOS =
===============================================>>>>>*/
$(document).ready(function () {
    $('#registrationForm-Prestamos')
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

                nuevoPrestamo: {
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


                nuevoMontoPrestamo: {
                    validators: {
                        notEmpty: {
                            message: 'El Campo Monto es es obligatorio...'
                        },
                        stringLength: {
                            min: 4,
                            max: 5,
                            message: 'El Campo Monto debe contener al menos 4 Digitos'
                        }
                    }
                },

                nuevoEstatus: {
                    validators: {
                        notEmpty: {
                            message: 'El Campo Estatus es obligatorio...'
                        },
                    }
                },

                nuevoFechaPrestamo: {
                    validators: {
                        notEmpty: {
                            message: 'El campo Fecha de Registro, es obligaria...'
                        },
                        date: {
                            format: 'YYYY/MM/DD HH:mm:ss ',
                            message: 'Seleccionar una fecha valida...'

                        }
                    }
                }

            }
        });
});

/*=FIN FORMVALIDATION AGREGAR PRESTAMOS =*/
/*=============================================<<<<<*/



/*=============================================>>>>>
= INICIO FORMVALIDATION EDITAR PRESTAMOS =
===============================================>>>>>*/
$(document).ready(function () {
    $('#registrationForm-EditarPrestamo')

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

                buscarEditarPrestamo: {
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

                EditarnuevoMontoPrestamo: {
                    validators: {
                        notEmpty: {
                            message: 'El Campo Monto es es obligatorio...'
                        },
                        stringLength: {
                            min: 4,
                            max: 5,
                            message: 'El Campo Monto debe contener al menos 4 Digitos'
                        }
                    }
                },

                EditarEstatus: {
                    validators: {
                        notEmpty: {
                            message: 'El Campo Estatus es obligatorio...'
                        },
                    }
                },

                EditarFechaPrestamo: {
                    validators: {
                        notEmpty: {
                            message: 'El campo Fecha de Registro, es obligaria...'
                        },
                        date: {
                            format: 'YYYY/MM/DD HH:mm:ss ',
                            message: 'Seleccionar una fecha valida...'

                        }
                    }
                }
            }
        });
});
/*=FIN FORMVALIDATION EDITAR Cambio de Categoría =*/
/*=============================================<<<<<*/


/*=============================================>>>>>
= INICIO FORMVALIDATION APLICAR PRESTAMOS =
===============================================>>>>>*/
$(document).ready(function () {
    $('#registrationForm-AplicarPrestamo')

        .formValidation({
            framework: 'bootstrap4',

            icon: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },

            fields: {

                EditarAplicarbuscaTrabajador: {
                    validators: {
                        notEmpty: {
                            message: 'El Campo Buscar Trabajador es obligatorio...'
                        },

                    }
                },


                EditarAplicarnomTrabajador: {
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

                EditarAplicartipoEmpleado: {
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

                buscarEditarAplicarPrestamo: {
                    validators: {
                        Empty: {
                            message: 'El Campo Prestamo es es obligatorio...'
                        },
                        stringLength: {
                            min: 3,
                            message: 'El Campo Prestamo debe contener al menos 1 caracter'
                        }
                    }
                },

                EditarAplicarnuevoMontoPrestamo: {
                    validators: {
                        Empty: {
                            message: 'El Campo Monto es es obligatorio...'
                        },
                        stringLength: {
                            min: 4,
                            max: 5,
                            message: 'El Campo Monto debe contener al menos 4 Digitos'
                        }
                    }
                },

                EditarAplicarEstatus: {
                    validators: {
                        notEmpty: {
                            message: 'El Campo Estatus es obligatorio...'
                        },
                    }
                },

                EditarAplicarFechaPrestamo: {
                    validators: {
                        notEmpty: {
                            message: 'El campo Fecha de Registro, es obligaria...'
                        },
                        date: {
                            format: 'YYYY/MM/DD HH:mm:ss ',
                            message: 'Seleccionar una fecha valida...'

                        }
                    }
                }

            }
        });
});
/*=FIN FORMVALIDATION EDITAR Cambio de Categoría =*/
/*=============================================<<<<<*/


/*=============================================>>>>>
= INICIO FORMVALIDATION ENTREGAR PRESTAMOS =
===============================================>>>>>*/
$(document).ready(function () {
    $('#registrationForm-EntregarPrestamo')

        .formValidation({
            framework: 'bootstrap4',

            icon: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },

            fields: {

                EditarEntregarbuscaTrabajador: {
                    validators: {
                        notEmpty: {
                            message: 'El Campo Buscar Trabajador es obligatorio...'
                        },

                    }
                },


                EditarEntregarnomTrabajador: {
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

                EditarEntregartipoEmpleado: {
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

                buscarEditarEntregarPrestamo: {
                    validators: {
                        notEmpty: {
                            message: 'El Campo Prestamo es es obligatorio...'
                        },
                        stringLength: {
                            min: 3,
                            message: 'El Campo Prestamo debe contener al menos 1 caracter'
                        }
                    }
                },

                EditarEntregarnuevoMontoPrestamo: {
                    validators: {
                        notEmpty: {
                            message: 'El Campo Monto es es obligatorio...'
                        },
                        stringLength: {
                            min: 4,
                            max: 5,
                            message: 'El Campo Monto debe contener al menos 4 Digitos'
                        }
                    }
                },

                EditarEntregarEstatus: {
                    validators: {
                        notEmpty: {
                            message: 'El Campo Estatus es obligatorio...'
                        },
                    }
                },

                EditarEntregarFechaPrestamo: {
                    validators: {
                        notEmpty: {
                            message: 'El campo Fecha de Registro, es obligaria...'
                        },
                        date: {
                            format: 'YYYY/MM/DD HH:mm:ss ',
                            message: 'Seleccionar una fecha valida...'

                        }
                    }
                }

            }
        });
});
/*=FIN FORMVALIDATION EDITAR Cambio de Categoría =*/
/*=============================================<<<<<*/


/*=============================================>>>>>
= INICIO FORMVALIDATION ENTREGAR PRESTAMOS =
===============================================>>>>>*/
$(document).ready(function () {
    $('#registrationForm-CancelarPrestamo')

        .formValidation({
            framework: 'bootstrap4',

            icon: {
                valid: 'fa fa-check',
                invalid: 'fa fa-times',
                validating: 'fa fa-refresh'
            },

            fields: {

                EditarCancelarbuscaTrabajador: {
                    validators: {
                        notEmpty: {
                            message: 'El Campo Buscar Trabajador es obligatorio...'
                        },

                    }
                },


                EditarCancelarnomTrabajador: {
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

                EditarCancelartipoEmpleado: {
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

                buscarCancelaPrestamo: {
                    validators: {
                        notEmpty: {
                            message: 'El Campo Prestamo es es obligatorio...'
                        },
                        stringLength: {
                            min: 3,
                            message: 'El Campo Prestamo debe contener al menos 1 caracter'
                        }
                    }
                },

                EditarCancelarnuevoMontoPrestamo: {
                    validators: {
                        notEmpty: {
                            message: 'El Campo Monto es es obligatorio...'
                        },
                        stringLength: {
                            min: 4,
                            max: 5,
                            message: 'El Campo Monto debe contener al menos 4 Digitos'
                        }
                    }
                },

                EditarCancelarEstatus: {
                    validators: {
                        notEmpty: {
                            message: 'El Campo Estatus es obligatorio...'
                        },
                    }
                },

                nuevoCancelarMotivo: {
                    validators: {
                        notEmpty: {
                            message: 'El Campo Motivo de Cancelación es obligatorio...'
                        },
                        stringLength: {
                            min: 8,
                            message: 'El Campo Motivo de Cancelación debe contener al menos 8 caracteres'
                        },
                        regexp: {
                            regexp: '^[^"\n\r|\"\"\'\']+$',
                            message: 'No se permiten saltos de linea, comillas simples y dobles...'
                        }
                    }
                },


                EditarCancelarFechaPrestamo: {
                    validators: {
                        notEmpty: {
                            message: 'El campo Fecha de Registro, es obligaria...'
                        },
                        date: {
                            format: 'YYYY/MM/DD HH:mm:ss ',
                            message: 'Seleccionar una fecha valida...'

                        }
                    }
                }

            }
        });
});
/*=FIN FORMVALIDATION EDITAR Cambio de Categoría =*/
/*=============================================<<<<<*/









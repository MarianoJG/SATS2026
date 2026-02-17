
/*=============================================
DATA TABLE GENERAL
=============================================*/


$(document).ready(function () {

  $(".tablas").DataTable({


    "fixedColumns": true,
    "responsive": true,

    language: {
      "sProcessing": "Procesando...",
      "sLengthMenu": "Mostrar _MENU_ registros",
      "sZeroRecords": "No se encontraron resultados",
      "sEmptyTable": "Ningún dato disponible en esta tabla",
      "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
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
    },

    "lengthMenu": [[10, 20, 30, -1], [10, 20, 30, "Todos"]]


  });

});




/*=============================================
INPUT MASK
=============================================*/

$(function () {
  //Initialize Select2 Elements
  $('.select2').select2()





  //Datemask dd/mm/yyyy
  $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
  //Datemask2 mm/dd/yyyy
  $('#datemask2').inputmask('aaaa/mm/dd', { 'placeholder': 'aaaa/mm/dd' })




  //Money Euro //telefono
  $('[data-mask]').inputmask()

  //Date range picker
  $('#reservation').daterangepicker()
  //Date range picker with time picker
  $('#reservationtime').daterangepicker({
    timePicker: true,
    timePickerIncrement: 30,
    format: 'MM/DD/YYYY h:mm A'
  })
  //Date range as a button
  $('#daterange-btn').daterangepicker(
    {
      ranges: {
        'Today': [moment(), moment()],
        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
        'This Month': [moment().startOf('month'), moment().endOf('month')],
        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
      },
      startDate: moment().subtract(29, 'days'),
      endDate: moment()
    },
    function (start, end) {
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
    }
  )

})



//Display Overlay Cargando Datos Ajax

$(document).ajaxStart(function () {
  $.LoadingOverlaySetup({

    background: "rgba(0, 0, 0, 0.5)",
    image: "vistas/img/gif/index.triple-gears-loading-icon.svg",
    //image           : "vistas/img/preloaders.svg/loader8.svg",

    imageAnimation: "1.5s fadein",
    //text        : "Cargando Datos...",

    imageColor: "#ffffff"
    //imageColor      : "#B70000"
    //imageColor: "#ffcc00",



  });


  $.LoadingOverlay("show");
});

$(document).ajaxStop(function () {
  $.LoadingOverlay("hide");
});
//END Display Overlay Cargando Datos Ajax



$(function () {
  $('#nuevoFechaPrestamo').datetimepicker({

    daysOfWeekDisabled: [],
    locale: 'es',
    // viewMode: 'years',
    format: 'YYYY/MM/DD HH:mm:ss '
  });
});

$(function () {
  $('#EditarFechaPrestamo').datetimepicker({

    daysOfWeekDisabled: [],
    locale: 'es',
    // viewMode: 'years',
    format: 'YYYY/MM/DD HH:mm:ss '
  });
});

$(function () {
  $('#EditarAplicarFechaPrestamo').datetimepicker({

    daysOfWeekDisabled: [],
    locale: 'es',
    // viewMode: 'years',
    format: 'YYYY/MM/DD HH:mm:ss '
  });
});


$(function () {
  $('#EditarEntregarFechaPrestamo').datetimepicker({

    daysOfWeekDisabled: [],
    locale: 'es',
    // viewMode: 'years',
    format: 'YYYY/MM/DD HH:mm:ss '
  });
});


$(function () {
  $('#EditarCancelarFechaPrestamo').datetimepicker({

    daysOfWeekDisabled: [],
    locale: 'es',
    // viewMode: 'years',
    format: 'YYYY/MM/DD HH:mm:ss '
  });
});


function idleTimer() {
  var t;
  //window.onload = resetTimer;
  window.onmousemove = resetTimer; // catches mouse movements
  window.onmousedown = resetTimer; // catches mouse movements
  window.onclick = resetTimer;     // catches mouse clicks
  window.onscroll = resetTimer;    // catches scrolling
  window.onkeypress = resetTimer;  //catches keyboard actions

  function logout() {
    window.location.href = 'sessionexpirada';  //Adapt to actual logout script
  }
  /* 
    function reload() {
      window.location = self.location.href;  //Reloads the current page
    } */

  function resetTimer() {
    clearTimeout(t);
    t = setTimeout(logout, 600000);   // time is in milliseconds (1000 is 1 second) 10 minutos
    // t = setTimeout(reload, 30000);  // time is in milliseconds (1000 is 1 second)
  }
}
idleTimer();

/*
var sonido = new Audio();
sonido.src = "vistas/sonidos/pacman-dies.mp3"; */






















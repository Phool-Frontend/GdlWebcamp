$(function () {
    $('#registros').DataTable({
      "paging": true,
      "pageLength":10,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "language": {
        paginate:{
            next: 'Siguiente',
            previous:'Anterior',
            last: 'Último',
            first:'Primero'
        },
        info: 'Mostrando _START_ a _END_ de _TOTAL_ resultados',
        emptyTable: 'No hay registros',
        infoEmpty: '0 Registros',
        search: 'Buscar'
      }
    });
  });


$('#crear_registro_admin').attr('disabled',true);
$('#repetir_password').on('input',function(){
  var password_nuevo = $('#password').val();

  if($(this).val() == password_nuevo){
      $('#resultado_password').text('Correcto').addClass('text-success').removeClass('text-danger');
      $('input#repetir_password').addClass('is-valid').removeClass('is-invalid');
      $('input#password').addClass('is-valid').removeClass('is-invalid');
      $('#crear_registro_admin').attr('disabled',false);
  } else{
      $('#resultado_password').text('No son iguales').addClass('text-danger').removeClass('text-success');
      $('input#repetir_password').addClass('is-invalid').removeClass('is-valid');
      $('input#password').addClass('is-invalid').removeClass('is-valid');
  }
})


//Date Picker el traductor esta un JS
$( function() {
  $( "#fecha" ).datepicker();
} );

//Time Picker
$(function () {
  $('#timepicker').datetimepicker({
    format: 'LT'
  })

//Select2
$(function () {
  $('.select2').select2()
})

$(function() {
  $('.seleccionar').select2()})
})

//IconPicker
$(function () {
    $('#icono').iconpicker();  
    $('#cambia').addClass('fas fa-cannabis');            
});  

//Seleccionar archivo
$(document).ready(function () {
    bsCustomFileInput.init();
});

// Grafico en Morris
$(function () {
  "use strict";

 
  // LINE CHART
$.getJSON('servicio-registrados.php', function(data){
  var line = new Morris.Line({
    element: 'line-chart',
    resize: true,
    data:  data ,
    xkey: 'fecha',
    ykeys: ['cantidad'],
    labels: ['Item 1'],
    lineColors: ['#3c8dbc'],
    hideHover: 'auto'
  });
});

      

 
});
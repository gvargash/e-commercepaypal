 /*=============================================
     tooltip
     =============================================*/
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})


 /*=============================================
     tabla categorias
     =============================================*/

 $(document).ready(function() {
   $("#tblDatatable").dataTable(
            {
                "language": idioma_spanish
  			 }).DataTable();
});


$(document).ready(function(){
  $("#tblvisitapaises").dataTable(
      {
          "language": idioma_spanish
        }).DataTable();
})

 /*=============================================
     tabla categorias
     =============================================*/
$("#btnCancelar").click(function(){
    history.back();
  })

 //traduciendo datatables
var idioma_spanish = {
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
}
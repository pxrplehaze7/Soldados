$(document).ready(function () {

    var table = $('#dataTable').DataTable({

        // buttons:['copy', 'csv', 'excel', 'pdf', 'print']
        buttons: [
            {
              extend: 'excel',
              text:'Excel <i class="fa-solid fa-file-excel"></i>',
              title: 'Lista de Usuarios',
              filename: 'Lista de Usuarios',
              exportOptions: {
                columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
              },
              className: "btn_excel",
            },
            {
              extend: 'pdf',
              text:'PDF <i class="fa-solid fa-file-pdf"></i>',
              title: 'Lista de Usuarios',
              filename: 'Lista de Usuarios',
              exportOptions: {
                columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
              },
              className: "btn_pdf",
            },
          
              {
                extend: 'csv',
                text:'CSV  <i class="fa-solid fa-file-csv"></i>',
                title: 'Lista de Usuarios',
                filename: 'Lista de Usuarios',
                exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
                },
                className: "btn_csv",
              },
              {
                extend: 'copy',
                text:'Copiar <i class="fa-solid fa-copy"></i>',
                title: 'Lista de Usuarios',
                filename: 'Lista de Usuarios',
                exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
                },
                className: "btn_copiar",
              },
              {
                extend: 'print',
                text:'Imprimir <i class="fa-solid fa-print"></i>',
                title: 'Lista de Usuarios',
                filename: 'Lista de Usuarios',
                exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5, 6, 7]
                },
                className: "btn_imprimir",
              }
          ]
   
      
    });
    table.buttons().container()
        .appendTo('#lista-btn .col-md-6:eq(0)');
});


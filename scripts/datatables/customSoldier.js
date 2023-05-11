$(document).ready(function () {

    var table = $('#dataTable').DataTable({
      

        // buttons:['copy', 'csv', 'excel', 'pdf', 'print']
        buttons: [
            {
              extend: 'excel',
              text:'Excel <i class="fa-solid fa-file-excel"></i>',
              title: 'Lista de Soldados',
              filename: 'Lista de Soldados',
              exportOptions: {
                columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
              },
              className: "btn_excel",
            },
            {
              extend: 'pdf',
              text:'PDF <i class="fa-solid fa-file-pdf"></i>',
              title: 'Lista de Soldados',
              filename: 'Lista de Soldados',
              orientation: 'landscape',
              exportOptions: {
                columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
              },
              className: "btn_pdf",
            },
          
              {
                extend: 'csv',
                text:'CSV  <i class="fa-solid fa-file-csv"></i>',
                title: 'Lista de Soldados',
                filename: 'Lista de Soldados',
                exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                },
                className: "btn_csv",
              },
              {
                extend: 'copy',
                text:'Copiar <i class="fa-solid fa-copy"></i>',
                title: 'Lista de Soldados',
                filename: 'Lista de Soldados',
                exportOptions: {
                  columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                },
                className: "btn_copiar",
              },
              {
                extend: 'print',
                text:'Imprimir <i class="fa-solid fa-print"></i>',
                title: 'Lista de Soldados',
                filename: 'Lista de Soldados',
                exportOptions: {
                  modifier: {
                    page: 'current'
                },
                  columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                  
                },
                className: "btn_imprimir",
              }
          ]
   
      
    });
    table.buttons().container()
        .appendTo('#dataTable_wrapper .col-md-6:eq(0)');
});


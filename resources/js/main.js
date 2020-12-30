$(document).ready( function () {
  
    $('#table_id').dataTable({
        aLengthMenu: [
            [10,25, 50, 100, 200, -1],
            [10,25, 50, 100, 200, "All"]
        ],
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive: true,

    });

});


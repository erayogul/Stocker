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

    $('.delete-stock-category-button').on('click', function () {
        var id = $(this).closest('a').attr("data-id");
        $('#id-delete').val(id);
        $('#modal-delete').modal({
              show: true
        });
    });
    
    $('.edit-stock-category-button').on('click', function () {
        var id = $(this).closest('a').attr("data-id");
        var name = $(this).closest('a').attr("data-name");
        $('#id-edit').val(id);
        $('#category_name').val(name);
        $('#modal-edit').modal({
              show: true
        });
    });

});


$(document).ready(function () {

    $('#table_id').dataTable({
        aLengthMenu: [
            [10, 25, 50, 100, 200, -1],
            [10, 25, 50, 100, 200, "All"]
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

    document.getElementById("stockNotificationSwitch").addEventListener("change", stockNotificationShowHide);

    function stockNotificationShowHide() {
        var status = document.getElementById("stockNotificationSwitch").checked;
        var div = document.getElementById("stockNotificationArea");
        var status = document.getElementById("stockNotificationSwitch").checked;
        status ? div.style.display = "block" : div.style.display = "none";
    }

    $('.delete-stock-button').on('click', function () {
        var id = $(this).closest('a').attr("data-id");
        $('#id-delete').val(id);
        $('#modal-delete').modal({
            show: true
        });
    });

    $('.increase-stock-button').on('click', function () {
        $(".modal-title-change").text("Arttırma");
        $(".modal-label-change").text("Eklenecek Miktar:");
        var id = $(this).closest('a').attr("data-id");
        var oldQuantity = $(this).closest('a').attr("data-quantity");
        $('#id-change').val(id);
        $('#oldStockQuantity').val(oldQuantity);
        $('#modal-change').modal({
            show: true
        });

        changeQuantityFunc();

        document.getElementById("changeQuantity").addEventListener("input", changeQuantityFunc);

        function changeQuantityFunc() {
            var changeQuantity = document.getElementById("changeQuantity").value;
            var oldQuantity = document.getElementById("oldStockQuantity").value
            var newValue = parseInt(oldQuantity) + parseInt(changeQuantity);
            document.getElementById("newStockQuantity").value = newValue;
        }
    });

    $('.decrease-stock-button').on('click', function () {
        $(".modal-title-change").text("Eksiltme");
        $(".modal-label-change").text("Düşülecek Miktar:");
        var id = $(this).closest('a').attr("data-id");
        var oldQuantity = $(this).closest('a').attr("data-quantity");
        $('#id-change').val(id);
        $('#oldStockQuantity').val(oldQuantity);
        $('#modal-change').modal({
            show: true
        });

        changeQuantityFunc();

        document.getElementById("changeQuantity").addEventListener("input", changeQuantityFunc);

        function changeQuantityFunc() {
            var changeQuantity = document.getElementById("changeQuantity").value;
            var oldQuantity = document.getElementById("oldStockQuantity").value
            var newValue = parseInt(oldQuantity) - parseInt(changeQuantity);
            document.getElementById("newStockQuantity").value = newValue;
        }
    });




});


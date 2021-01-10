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
        $(".modal-title-change").text("Ürün Ekle");
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
        $(".modal-title-change").text("Ürün Eksilt");
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

    $('.edit-stock-button').on('click', function () {
        clearStockModal();
        $(".modal-title-add-edit").text("Ürün Düzenle");
        var id = $(this).closest('a').attr("data-id");
        var action = $(this).closest('a').attr("data-action");
        var name = $(this).closest('a').attr("data-name");
        var stock_id = $(this).closest('a').attr("data-stock_id");
        var category = $(this).closest('a').attr("data-category");
        var supplier = $(this).closest('a').attr("data-supplier");
        var location = $(this).closest('a').attr("data-location");
        var quantity = $(this).closest('a').attr("data-quantity");
        var notification = $(this).closest('a').attr("data-notification");
        var notificationUser = $(this).closest('a').attr("data-notificationUser");
        var notificationQuantity = $(this).closest('a').attr("data-notificationQuantity");
        $('#id-add-edit').val(id);
        $('#actionType').val(action);
        $('#name-add-edit').val(name);
        $('#stock_id-add-edit').val(stock_id);
        $('#category-add-edit').val(parseInt(category));
        $('#supplier-add-edit').val(supplier);
        $('#location-add-edit').val(location);
        $('#quantity-add-edit').val(quantity);
        if (notification == 1) {
            document.getElementById("stockNotificationSwitch").checked = true;
            var div = document.getElementById("stockNotificationArea");
            div.style.display = "block";
        }
        else {
            document.getElementById("stockNotificationSwitch").checked = false;
            var div = document.getElementById("stockNotificationArea");
            div.style.display = "none";
        }
        $('#notificationUser-add-edit').val(parseInt(notificationUser));
        $('#notificationQuantity-add-edit').val(notificationQuantity);
        document.querySelector('#finish-add-edit').innerText = 'Kaydet';
        $('#modal-default').modal({
            show: true
        });

    });

    $('.create-stock-button').on('click', function () {
        clearStockModal();
        $(".modal-title-add-edit").text("Ürün Oluştur");
        document.querySelector('#finish-add-edit').innerText = 'Oluştur';
        $('#modal-default').modal({
            show: true
        });

    });

    function clearStockModal() {
        $('#id-add-edit').val("");
        $('#actionType').val("");
        $('#name-add-edit').val("");
        $('#stock_id-add-edit').val("");
        $('#category-add-edit').val("");
        $('#supplier-add-edit').val("");
        $('#location-add-edit').val("");
        $('#quantity-add-edit').val("");
        document.getElementById("stockNotificationSwitch").checked = false;
        var div = document.getElementById("stockNotificationArea");
        div.style.display = "none";
        $('#notificationUser-add-edit').val("");
        $('#notificationQuantity-add-edit').val("");
    }

});


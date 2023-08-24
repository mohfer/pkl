$(document).ready(function () {
    $('#storage_input').on('input', function () {
        var selectedStorageId = $('#list_storage option[value="' + $(this).val() + '"]').data('id');
        if (selectedStorageId) {
            $.ajax({
                url: '../src/function/get_stok_storage.php',
                type: 'POST',
                data: { storage_id: selectedStorageId },
                success: function (response) {
                    $('#stok_input_storage').val(response);
                }
            });
        }
    });
});
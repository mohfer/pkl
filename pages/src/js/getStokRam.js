$(document).ready(function () {
    $('#ram_input').on('input', function () {
        var selectedRamId = $('#list_ram option[value="' + $(this).val() + '"]').data('id');
        if (selectedRamId) {
            $.ajax({
                url: '../src/function/get_stok_ram.php',
                type: 'POST',
                data: { ram_id: selectedRamId },
                success: function (response) {
                    $('#stok_input_ram').val(response);
                }
            });
        }
    });
});
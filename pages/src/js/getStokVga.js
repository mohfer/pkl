$(document).ready(function () {
    $('#vga_input').on('input', function () {
        var selectedVgaId = $('#list_vga option[value="' + $(this).val() + '"]').data('id');
        if (selectedVgaId) {
            $.ajax({
                url: '../src/function/get_stok_vga.php',
                type: 'POST',
                data: { vga_id: selectedVgaId },
                success: function (response) {
                    $('#stok_input_vga').val(response);
                }
            });
        }
    });
});
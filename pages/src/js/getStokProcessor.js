$(document).ready(function () {
    // Event listener untuk input nama processor
    $('#processor_input').on('input', function () {
        var selectedProcessorId = $('#list_processor option[value="' + $(this).val() + '"]').data('id');
        if (selectedProcessorId) {
            // Menggunakan AJAX untuk mengambil data stok
            $.ajax({
                url: '../src/function/get_stok_processor.php', // Ganti dengan path yang benar ke skrip PHP Anda
                type: 'POST',
                data: {
                    processor_id: selectedProcessorId
                },
                success: function (response) {
                    // Update input stok dengan nilai dari response
                    $('#stok_input_processor').val(response);
                }
            });
        }
    });
});
function setupDataList(inputId, dataListId, hiddenInputId) {
    const input = document.getElementById(inputId);
    const dataList = document.getElementById(dataListId);
    const hiddenInput = document.getElementById(hiddenInputId);

    input.addEventListener('input', function () {
        const selectedOption = dataList.querySelector(`option[value="${input.value}"]`);
        if (selectedOption) {
            hiddenInput.value = selectedOption.getAttribute('data-id');
        } else {
            hiddenInput.value = '';
        }
    });
}

// Panggil fungsi setupDataList untuk setiap elemen input
setupDataList('karyawan_input', 'list_karyawan', 'id_karyawan');
setupDataList('processor_input', 'list_processor', 'id_processor');
setupDataList('ram_input', 'list_ram', 'id_ram');
setupDataList('storage_input', 'list_storage', 'id_storage');
setupDataList('vga_input', 'list_vga', 'id_vga');
// Dan seterusnya untuk elemen-elemen lainnya
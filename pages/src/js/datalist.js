function setupDataList(inputId, dataListId, hiddenInputId, nameInputId) {
    const input = document.getElementById(inputId);
    const dataList = document.getElementById(dataListId);
    const hiddenInput = document.getElementById(hiddenInputId);
    const nameInput = document.getElementById(nameInputId);

    input.addEventListener('input', function () {
        const selectedOption = dataList.querySelector(`option[value="${input.value}"]`);
        if (selectedOption) {
            hiddenInput.value = selectedOption.getAttribute('data-id');
            nameInput.value = selectedOption.value;
        } else {
            hiddenInput.value = '';
            nameInput.value = '';
        }
    });

    const initialSelectedOption = dataList.querySelector(`option[value="${input.value}"]`);
    if (initialSelectedOption) {
        hiddenInput.value = initialSelectedOption.getAttribute('data-id');
        nameInput.value = initialSelectedOption.value;
    }
}

setupDataList('karyawan_input', 'list_karyawan', 'id_karyawan');
setupDataList('processor_input', 'list_processor', 'id_processor', 'nama_processor');
setupDataList('ram_input', 'list_ram', 'id_ram', 'nama_ram');
setupDataList('storage_input', 'list_storage', 'id_storage', 'nama_storage');
setupDataList('vga_input', 'list_vga', 'id_vga', 'nama_vga');
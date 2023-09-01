// Ambil elemen input dengan id "nip"
var nipInput = document.getElementById("nip");

// Tambahkan event listener untuk membatasi panjang karakter dan menghentikan input
nipInput.addEventListener("input", function () {
    if (this.value.length > 18) {
        this.value = this.value.slice(0, 18); // Potong karakter jika lebih dari 18
        this.blur(); // Hentikan fokus dari input
    }
});
const data = $('.info-data').data('infodata');
const login = $('.info-login').data('infologin');

// Login Page
if (login == "Berhasil login sebagai Admin!") {
    Swal.fire({
        icon: 'success',
        title: 'Success',
        confirmButtonColor: '#241468',
        text: login,
    }).then(function () {
        window.location = "pages/dashboard";
    })
} else if (login == "Berhasil login sebagai Karyawan!") {
    Swal.fire({
        icon: 'success',
        title: 'Success',
        confirmButtonColor: '#241468',
        text: login,
    }).then(function () {
        window.location = "pages/me/dashboard";
    })
} else if (login == "Gagal") {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: '#241468',
        text: 'Username atau password salah!',
    })
} else if (login == "Kosong") {
    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        confirmButtonColor: '#241468',
        text: 'Username atau password tidak boleh kosong!',
    })
} else if (login == "Logout berhasil!") {
    Swal.fire({
        icon: 'success',
        title: 'Success',
        confirmButtonColor: '#241468',
        text: 'Logout berhasil!',
    }).then(function () {
        window.location = "./";
    })
}

// Delete Page
$(document).on('click', '#btn-del', function (e) {
    e.preventDefault();
    var link = $(this).attr('href');
    Swal.fire({
        title: 'Hapus data?',
        text: "Mungkin saja data di halaman lain akan terhapus!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#241468',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = link;
        }
    })
})

// Insert and Update Page
if (data == "berhasil disimpan!" || data == "berhasil dihapus!" || data == "password berhasil dirubah!") {
    Swal.fire({
        icon: 'success',
        title: 'Success',
        confirmButtonColor: '#241468',
        text: 'Data' + ' ' + data,
    })
} else if (data == "gagal disimpan!" || data == "gagal dihapus!" || data == "sudah ada!" || data == "nip sudah terdaftar!" || data == "jumlah melebihi stok yang tersedia!" || data == "tidak dapat dihapus karena data masih digunakan di halaman lain!" || data == "tidak ditemukan! tolong pilih data sesuai dengan datalist yang sudah ada!" || data == "password baru anda tidak sesuai dengan konfirmasi password!" || data == "password lama tidak sesuai!") {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: '#241468',
        text: 'Data' + ' ' + data,
    })
} else if (data == "sudah memiliki komputer!") {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        confirmButtonColor: '#241468',
        text: 'Nama tersebut' + ' ' + data,
    })
}
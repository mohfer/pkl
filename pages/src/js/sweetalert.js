const data = $('.info-data').data('infodata');
const login = $('.info-login').data('infologin');

// Login Page
if (login == "Berhasil") {
    Swal.fire({
        icon: 'success',
        title: 'Success',
        confirmButtonColor: '#241468',
        text: 'Login berhasil!',
    }).then(function () {
        window.location = "pages/dashboard";
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
}

// Delete Page
$(document).on('click', '#btn-del', function (e) {
    e.preventDefault();
    var link = $(this).attr('href');
    Swal.fire({
        title: 'Hapus data?',
        text: "Kamu tidak akan bisa mengembalikannya!",
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
if (data == "berhasil disimpan!" || data == "berhasil dihapus!") {
    Swal.fire({
        icon: 'success',
        title: 'Success',
        confirmButtonColor: '#241468',
        text: 'Data' + ' ' + data,
    })
} else if (data == "gagal disimpan!" || data == "gagal dihapus!" || data == "sudah ada!" || data == "nip sudah terdaftar!") {
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
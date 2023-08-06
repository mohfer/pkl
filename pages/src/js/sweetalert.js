const login = $('.info-login').data('infologin');

if (login == "Berhasil") {
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Login berhasil!',
    }).then(function () {
        window.location = "pages/dashboard";
    })
} else if (login == "Gagal") {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Username atau password salah!',
    })
} else if (login == "Kosong") {
    Swal.fire({
        icon: 'warning',
        title: 'Oops...',
        text: 'Username atau password tidak boleh kosong!',
    })
}

const data = $('.info-data').data('infodata');

if (data == "berhasil disimpan!") {
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: 'Data' + data,
    })
} else if (data == "gagal disimpan!") {
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Data' + data,
    })
}
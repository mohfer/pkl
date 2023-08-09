<?php

session_start();

include "../src/config/connect.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $stok = $_POST['stok'];

    $query = "SELECT nama FROM processor WHERE nama = '$nama'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['data'] = "sudah ada!";
    } else {
        $sql = "INSERT INTO processor (id, nama, stok) VALUES ('$id', '$nama', '$stok')";
        if (mysqli_query($conn, $sql)) {
            $_SESSION['data'] = "berhasil disimpan!";
            header("Location: ../processor");
            exit;
        } else {
            $_SESSION['data'] = "gagal disimpan!";
        }
    }
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../src/css/global.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <?php include "../src/library/bootstrap.php" ?>
    <?php include "../src/library/sweetalert.php" ?>
    <title>Inventory Barang | Processor</title>
</head>

<body>
    <!-- Swal -->
    <div class="info-data" data-infodata="<?php if (isset($_SESSION['data'])) {
                                                echo $_SESSION['data'];
                                            }
                                            unset($_SESSION['data']) ?>">
    </div>
    <!-- Swal -->
    <div class="wrapper">
        <div class="row vh-100">
            <div class="col-md-2 sidebar text-light">
                <div class="text-center my-3 mb-5">
                    <h4>Inventory Barang</h4>
                </div>
                <div class="mx-4">
                    <h5>Menu</h5>
                    <a href="../dashboard/">
                        <p class="opacity">Dashboard</p>
                    </a>
                </div>
                <div class="mx-4">
                    <h5>Master | Komponen</h5>
                    <a href="../processor/">
                        <p class="opacity-100 aktif rounded-pill">Processor</p>
                    </a>
                    <a href="../ram/">
                        <p class="opacity">RAM</p>
                    </a>
                    <a href="../storage/">
                        <p class="opacity">Storage</p>
                    </a>
                    <a href="../vga/">
                        <p class="opacity">Graphics Card</p>
                    </a>
                </div>
                <div class="mx-4">
                    <h5>Master | Karyawan</h5>
                    <a href="../karyawan/">
                        <p class="opacity">Karyawan</p>
                    </a>
                </div>
                <div class="mx-4">
                    <h5>Transaksi</h5>
                    <a href="../komputer/">
                        <p class="opacity">Komputer</p>
                    </a>
                    <a href="../barang/">
                        <p class="opacity">Barang</p>
                    </a>
                    <a href="../keluhan/">
                        <p class="opacity">Keluhan</p>
                    </a>
                </div>
            </div>
            <div class="col-md-10 content">
                <div class="wrapper shadow p-3 my-3 left">
                    <h1>Processor | Tambah</h1>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col">
                                <div class="">
                                    <input type="hidden" id="id" name="id" class="form-control" placeholder="1">
                                </div>
                                <div class="mb-3">
                                    <label for="nama">Nama</label>
                                    <input type="text" id="nama" name="nama" class="form-control" placeholder="Intel Core i3 13100" required>
                                </div>
                                <div class="mb-3">
                                    <label for="stok">Stok</label>
                                    <input type="number" id="stok" name="stok" class="form-control" placeholder="10" required>
                                </div>
                            </div>
                            <div class="col">
                            </div>
                            <div class="mb-3">
                                <button class="btn ungu" name="submit">Simpan</button>
                                <a href="../processor/" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../src/js/sweetalert.js"></script>
</body>

</html>
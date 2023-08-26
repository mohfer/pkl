<?php

session_start();

include "../src/config/connect.php";

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $stok = $_POST['stok'];

    $sql_check_name = "SELECT id FROM processor WHERE nama = '$nama' AND id != '$id'";
    $result = mysqli_query($conn, $sql_check_name);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['data'] = "sudah ada!";
        header("Location: ../processor");
        exit;
    }

    $sql = "UPDATE processor SET nama = '$nama', stok = '$stok' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['data'] = "berhasil disimpan!";
        header("Location: ../processor");
    } else {
        $_SESSION['data'] = "gagal disimpan!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../src/css/global.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <title>Inventory Barang | Processor</title>
</head>

<body>
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
                    <a href="../komputer/">
                        <p class="opacity">Komputer</p>
                    </a>
                </div>
                <div class="mx-4">
                    <h5>Transaksi</h5>
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
                    <h1>Processor | Update</h1>
                    <?php $data = mysqli_query($conn, "SELECT * FROM processor WHERE id = $id") ?>
                    <?php while ($d = mysqli_fetch_array($data)) : ?>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col">
                                    <div class="">
                                        <input type="hidden" id="id" name="id" class="form-control" placeholder="1" value="<?= $d['id'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama">Nama</label>
                                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Intel Core i3 13100" value="<?= $d['nama'] ?>" required autocomplete="off">
                                    </div>
                                    <div class="mb-3">
                                        <label for="stok">Stok</label>
                                        <input type="number" id="stok" name="stok" class="form-control" placeholder="10" value="<?= $d['stok'] ?>" required autocomplete="off">
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
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
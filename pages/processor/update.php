<?php

session_start();

include "../src/config/connect.php";

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $core = $_POST['core'];
    $thread = $_POST['thread'];
    $daya = $_POST['daya'];

    $sql = "UPDATE processor SET  nama = '$nama', core = '$core', thread = '$thread', daya = '$daya' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['info'] = "berhasil disimpan!";
    } else {
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../src/css/global.css">
    <?php include '../src/library/sweetalert.php' ?>
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
                    <h5>Komponen</h5>
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
                    <h5>Komponen</h5>
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
                                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Intel Core i3 13100" value="<?= $d['nama'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="core">Core</label>
                                        <input type="text" id="core" name="core" class="form-control" placeholder="4" value="<?= $d['core'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="thread">Thread</label>
                                        <input type="text" id="thread" name="thread" class="form-control" placeholder="8" value="<?= $d['thread'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="daya">Daya (W)</label>
                                        <input type="text" id="daya" name="daya" class="form-control" placeholder="60" value="<?= $d['daya'] ?>">
                                    </div>
                                </div>
                                <div class="col">
                                </div>
                                <div class="mb-3">
                                    <button class="btn ungu" name="submit">Simpan</button>
                                    <a href="../processor/" onclick='self.history.back()' class="btn btn-danger">Batal</a>
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
<?php

session_start();

include "../src/config/connect.php";

$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $brand = $_POST['brand'];
    $nama = $_POST['nama'];
    $vram = $_POST['vram'];
    $stok = $_POST['stok'];

    $sql = "UPDATE vga SET  brand = '$brand', nama = '$nama', vram = '$vram', stok = '$stok' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['data'] = "berhasil disimpan!";
        header("Location: ../vga");
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
                        <p class="opacity">Processor</p>
                    </a>
                    <a href="../ram/">
                        <p class="opacity">RAM</p>
                    </a>
                    <a href="../storage/">
                        <p class="opacity">Storage</p>
                    </a>
                    <a href="../vga/">
                        <p class="opacity-100 aktif rounded-pill">Graphics Card</p>
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
                    <h1>Graphics Card | Update</h1>
                    <?php $data = mysqli_query($conn, "SELECT * FROM vga WHERE id = $id") ?>
                    <?php while ($d = mysqli_fetch_array($data)) : ?>
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col">
                                    <div class="">
                                        <input type="hidden" id="id" name="id" class="form-control" placeholder="1" value="<?= $d['id'] ?>">
                                    </div>
                                    <div class="mb-3">
                                        <label for="brand">Brand (NVIDIA/AMD)</label>
                                        <select id="brand" class="form-select mb-3" name="brand" required>
                                            <option selected><?= $d['brand'] ?></option>
                                            <option value="NVIDIA">NVIDIA</option>
                                            <option value="AMD">AMD</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama">Nama</label>
                                        <input type="text" id="nama" name="nama" class="form-control" placeholder="RTX 2080Ti" value="<?= $d['nama'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="vram">VRAM (GB)</label>
                                        <input type="number" id="vram" name="vram" class="form-control" placeholder="8" value="<?= $d['vram'] ?>" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="stok">Stok</label>
                                        <input type="number" id="stok" name="stok" class="form-control" placeholder="100" value="<?= $d['stok'] ?>" required>
                                    </div>
                                </div>
                                <div class="col">
                                </div>
                                <div class="mb-3">
                                    <button class="btn ungu" name="submit">Simpan</button>
                                    <a href="../vga/" class="btn btn-danger">Batal</a>
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
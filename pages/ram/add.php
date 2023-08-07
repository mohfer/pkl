<?php

session_start();

include "../src/config/connect.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $tipe_memori = $_POST['tipe_memori'];
    $kapasitas = $_POST['kapasitas'];
    $kecepatan = $_POST['kecepatan'];

    $sql = "INSERT INTO ram (id, tipe_memori, kapasitas, kecepatan) VALUES ('$id', '$tipe_memori', '$kapasitas', '$kecepatan')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['data'] = "berhasil disimpan!";
        header("Location: ../ram");
    } else {
        $_SESSION['data'] = "gagal disimpan!";
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
    <?php include "../src/library/bootstrap.php" ?>
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
                        <p class="opacity">Processor</p>
                    </a>
                    <a href="../ram/">
                        <p class="opacity-100 aktif rounded-pill">RAM</p>
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
                    <h1>RAM | Tambah</h1>
                    <form action="" method="POST">
                        <div class="row">
                            <div class="col">
                                <div class="">
                                    <input type="hidden" id="id" name="id" class="form-control" placeholder="1">
                                </div>
                                <div class="mb-3">
                                    <label for="tipe_memori">Tipe Memori (DDR)</label>
                                    <select id="tipe_memori" class="form-select" name="tipe_memori" required>
                                        <option value="DDR2">DDR2</option>
                                        <option value="DDR3">DDR3</option>
                                        <option value="DDR4">DDR4</option>
                                        <option value="DDR5">DDR5</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="kapasitas">Kapasitas (GB)</label>
                                    <input type="text" id="kapasitas" name="kapasitas" class="form-control" placeholder="8" required>
                                </div>
                                <div class="mb-3">
                                    <label for="kecepatan">Kecepatan (MHz)</label>
                                    <input type="text" id="kecepatan" name="kecepatan" class="form-control" placeholder="2666" required>
                                </div>
                            </div>
                            <div class="col">
                            </div>
                            <div class="mb-3">
                                <button class="btn ungu" name="submit">Simpan</button>
                                <a href="../ram/" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
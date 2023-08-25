<?php

session_start();

include "../src/config/connect.php";

$query_karyawan = "SELECT id, nama FROM karyawan ORDER BY nama ASC";
$result_karyawan = mysqli_query($conn, $query_karyawan);

$query_join = "SELECT
    k.id AS id,
    karyawan.nama AS nama_karyawan
FROM keluhan k
JOIN karyawan ON k.id_karyawan = karyawan.id
ORDER BY karyawan.nama ASC";

$result_join = mysqli_query($conn, $query_join);
date_default_timezone_set('Asia/Jakarta');
$tanggal = date('l, d F Y, h:i:s A');

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $id_karyawan = $_POST['id_karyawan'];
    $keluhan = $_POST['keluhan'];

    $sql = "INSERT INTO keluhan (id, tanggal_masuk, id_karyawan, keluhan, solusi, biaya, status) VALUES ('$id', '$tanggal', '$id_karyawan', '$keluhan', '', '', '0')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['data'] = "berhasil disimpan!";
        header("Location: ../keluhan");
        exit;
    } else {
        $_SESSION['data'] = "gagal disimpan!";
    }
}

mysqli_close($conn);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../src/css/global.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <?php include '../src/library/bootstrap.php' ?>
    <?php include '../src/library/datatables.php' ?>
    <?php include '../src/library/sweetalert.php' ?>
    <title>Inventory Barang | Keluhan</title>
</head>

<script>
    $(document).ready(function() {
        $('#myTable').dataTable();
    });
</script>

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
            <section class="col-md-2 sidebar text-light">
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
                        <p class="opacity">Graphics Card</p>
                    </a>
                </div>
                <div class="mx-4">
                    <h5>Master | Karyawan</h5>
                    <a href="../karyawan/">
                        <p class="opacity">Karyawan</p>
                        <a href="../komputer/">
                            <p class="opacity">Komputer</p>
                        </a>
                    </a>
                </div>
                <div class="mx-4">
                    <h5>Transaksi</h5>
                    <a href="../barang/">
                        <p class="opacity">Barang</p>
                    </a>
                    <a href="../keluhan/">
                        <p class="opacity-100 aktif rounded-pill">Keluhan</p>
                    </a>
                </div>
            </section>
            <section class="col-md-10 content">
                <div class="wrapper shadow p-3 my-3 left">
                    <h1>Keluhan | Tambah</h1>
                    <form action="" method="POST">
                        <div class="">
                            <input type="hidden" id="id" name="id" class="form-control" placeholder="1">
                        </div>
                        <div class="row my-3">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="karyawan">Karyawan</label>
                                    <input class="form-control" type="text" name="karyawan_input" id="karyawan_input" list="list_karyawan" autocomplete="off" required>
                                    <datalist id="list_karyawan">
                                        <?php while ($row = mysqli_fetch_assoc($result_karyawan)) { ?>
                                            <option value="<?= $row['nama']; ?>" data-id="<?= $row['id']; ?>"></option>
                                        <?php } ?>
                                    </datalist>
                                    <input type="hidden" name="id_karyawan" id="id_karyawan">
                                </div>
                                <div class="mb-3">
                                    <label for="keluhan">Keluhan</label>
                                    <textarea class="form-control" name="keluhan" id="keluhan" cols="30" rows="5" required></textarea>
                                </div>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                        <button class="btn ungu mb-3" name="submit">Tambah</button>
                        <a href="../keluhan/" class="btn btn-danger mb-3">Batal</a>
                    </form>
                </div>
            </section>
        </div>
    </div>
    <script src="../src/js/sweetalert.js"></script>
    <script src="../src/js/datalist.js"></script>

</body>

</html>
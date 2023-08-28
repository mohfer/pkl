<?php

session_start();

$id_karyawan = $_SESSION['id_karyawan'];

include "../../src/config/connect.php";
include "../../src/function/antiSqlInjection.php";

if (!isset($_SESSION['id_karyawan'])) {
    header("Location: ../../../pages/dashboard");
}

date_default_timezone_set('Asia/Jakarta');
$tanggal = date('l, d F Y, H:i:s') . " WIB";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $keluhan = $_POST['keluhan'];

    if (empty($id_karyawan)) {
        $_SESSION['data'] = "tidak ditemukan! tolong pilih data sesuai dengan datalist yang sudah ada!";
    } else {

        $sql = "INSERT INTO keluhan (id, tanggal_masuk, id_users, id_karyawan, keluhan, solusi, biaya, status) VALUES ('$id', '$tanggal', NULL, '$id_karyawan', '$keluhan', '', '', '0')";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['data'] = "berhasil disimpan!";
            header("Location: ../keluhan");
            exit;
        } else {
            $_SESSION['data'] = "gagal disimpan!";
        }
    }
}

mysqli_close($conn);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../src/css/global.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <?php include '../../src/library/bootstrap.php' ?>
    <?php include '../../src/library/datatables.php' ?>
    <?php include '../../src/library/sweetalert.php' ?>

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
    <div class="container-fluid">
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
                    <h5>Transaksi</h5>
                    <a href="../keluhan/">
                        <p class="opacity-100 aktif rounded-pill">Keluhan</p>
                    </a>
                </div>
                <div class="mx-4">
                    <h5>Aksi</h5>
                    <a href="../../../logout.php">
                        <p class="opacity">Logout</p>
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
    <script src="../../src/js/sweetalert.js"></script>

</body>

</html>
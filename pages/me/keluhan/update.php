<?php

session_start();

$id = $_GET['id'];
$id_karyawan = $_SESSION['id_karyawan'];

include "../../src/config/connect.php";
include "../../src/function/antiSqlInjection.php";

if (!isset($_SESSION['id_karyawan'])) {
    header("Location: ../../../pages/dashboard");
}



include "../../src/function/getFunction.php";

$query = "SELECT * FROM keluhan WHERE id = '$id'";
$result_query = mysqli_query($conn, $query);

date_default_timezone_set('Asia/Jakarta');
$tanggal = date('Y-m-d H:i:s');

$query_join = "SELECT 
            u.nama AS nama_petugas
            FROM keluhan k
            JOIN users u ON k.id_users = u.id
            WHERE k.id = '$id'";

$result_query_join = mysqli_query($conn, $query_join);


$query_status = "SELECT status FROM keluhan WHERE id = $id";
$result_status = mysqli_query($conn, $query_status);

if ($result_status) {
    $row_status = mysqli_fetch_assoc($result_status);
    $status = $row_status['status'];
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $keluhan = $_POST['keluhan'];

    $sql = "UPDATE keluhan SET keluhan = '$keluhan' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['data'] = "berhasil disimpan!";
        header("Location: ../keluhan");
        exit;
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
                <a href="../../../">
                    <div class="text-center my-3 mb-5">
                        <h4>Inventory Barang</h4>
                    </div>
                </a>
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
                    <a href="../password/">
                        <p class="opacity">Password</p>
                    </a>
                    <a href="../../../logout.php">
                        <p class="opacity">Logout</p>
                    </a>
                </div>
            </section>
            <section class="col-md-10 content">
                <div class="wrapper shadow p-3 my-3 left">
                    <?php if ($status == "0") : ?>
                        <h1>Keluhan | Update</h1>
                    <?php elseif ($status == "Selesai" || $status == "Proses") : ?>
                        <h1>Keluhan | Detail</h1>
                    <?php endif; ?>
                    <?php if ($result = mysqli_fetch_array($result_query)) ?>
                    <?php if ($petugas = mysqli_fetch_array($result_query_join)) ?>
                    <?php if ($status == "0" || $status == "Proses") : ?>
                        <form action="" method="POST">
                            <div class="">
                                <input type="hidden" id="id" name="id" class="form-control" placeholder="1" value="<?= $result['id'] ?>">
                            </div>
                            <div class="row my-3">
                                <div class="col">
                                    <div class="mb-3" <?php if ($status == "0") echo 'style="display: none"'; ?>>
                                        <label for="petugas">Petugas</label>
                                        <input class="form-control" name="petugas" id="petugas" value="<?php echo $petugas['nama_petugas'] ?>" <?php if ($status == "Proses") echo 'disabled readonly'; ?>></input>
                                    </div>
                                    <div class="mb-3">
                                        <label for="keluhan">Keluhan</label>
                                        <textarea class="form-control" name="keluhan" id="keluhan" cols="30" rows="5" <?php if ($status == "Proses") echo 'disabled readonly'; ?>><?php echo $result['keluhan'] ?></textarea>
                                    </div>
                                    <?php if ($status == "Proses") : ?>
                                        <div class="mb-3">
                                            <label for="solusi">Solusi</label>
                                            <textarea class="form-control" name="solusi" id="solusi" cols="30" rows="5" disabled readonly required><?php echo empty($result['solusi']) ? 'Sedang Diproses...' : $result['solusi']; ?></textarea>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="col mt-3">
                                    <?php if ($status == "Proses") : ?>
                                        <p class="fs-3 fw-bold">Tanggal Keluhan</p>
                                        <span>Tanggal Masuk : <?= date('d F Y', strtotime($result["tanggal_masuk"])) ?></span>
                                        <br>
                                        <span>Tanggal Proses : <?= date('d F Y', strtotime($result["tanggal_proses"])) ?></span>
                                        <br>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <button class="btn ungu mb-3" name="submit" <?php if ($status == "Proses") echo 'style="display: none"'; ?>>Simpan</button>
                            <a href="../keluhan/" class="btn btn-danger mb-3">Batal</a>
                        </form>
                    <?php elseif ($status == "Selesai") : ?>
                        <form action="" method="POST">
                            <div class="">
                                <input type="hidden" id="id" name="id" class="form-control" placeholder="1" value="<?= $d['id'] ?>">
                            </div>
                            <div class="row my-3">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="petugas">Petugas</label>
                                        <input class="form-control" name="petugas" id="petugas" value="<?php echo $petugas['nama_petugas'] ?>" disabled readonly></input>
                                    </div>
                                    <div class="mb-3">
                                        <label for="keluhan">Keluhan</label>
                                        <textarea class="form-control" name="keluhan" id="keluhan" cols="30" rows="5" disabled readonly><?php echo $result['keluhan'] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="solusi">Solusi</label>
                                        <textarea class="form-control" name="solusi" id="solusi" cols="30" rows="5" required disabled readonly><?php echo $result['solusi'] ?></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="biaya">Biaya (Rp)</label>
                                        <input type="number" id="biaya" name="biaya" value="<?php echo $result['biaya'] ?>" class="form-control" required disabled readonly>
                                    </div>
                                </div>
                                <div class="col mt-3">
                                    <p class="fs-3 fw-bold">Tanggal Keluhan</p>
                                    <span>Tanggal Masuk : <?= date('d F Y', strtotime($result["tanggal_masuk"])) ?></span>
                                    <br>
                                    <span>Tanggal Proses : <?= date('d F Y', strtotime($result["tanggal_proses"])) ?></span>
                                    <br>
                                    <span>Tanggal Selesai : <?= date('d F Y', strtotime($result["tanggal_selesai"])) ?></span>
                                    <br>
                                </div>
                            </div>
                            <a href="../keluhan/" class="btn btn-danger mb-3">Kembali</a>
                        </form>
                    <?php endif; ?>
                </div>
            </section>
        </div>
    </div>
    <script src="../../src/js/sweetalert.js"></script>

</body>

</html>
<?php

session_start();

include "../src/config/connect.php";
include "../src/function/antiSqlInjection.php";

$query_karyawan = "SELECT id, nama FROM karyawan ORDER BY nama ASC";
$result_karyawan = mysqli_query($conn, $query_karyawan);

$query_join = "SELECT
    k.id AS id,
    k.tanggal_masuk AS tanggal_masuk,
    k.tanggal_proses AS tanggal_proses,
    k.tanggal_selesai AS tanggal_selesai,
    karyawan.nama AS nama_karyawan,
    k.keluhan AS keluhan,
    k.status AS status
FROM keluhan k
JOIN karyawan ON k.id_karyawan = karyawan.id WHERE status = '0'
ORDER BY k.tanggal_masuk ASC";

$result_join = mysqli_query($conn, $query_join);

$query_join_proses = "SELECT
    k.id AS id,
    k.tanggal_masuk AS tanggal_masuk,
    k.tanggal_proses AS tanggal_proses,
    k.tanggal_selesai AS tanggal_selesai,
    karyawan.nama AS nama_karyawan,
    k.keluhan AS keluhan,
    k.solusi AS solusi,
    k.status AS status
FROM keluhan k
JOIN karyawan ON k.id_karyawan = karyawan.id WHERE status = 'Proses'
ORDER BY k.tanggal_proses DESC";

$result_join_proses = mysqli_query($conn, $query_join_proses);

$query_join_selesai = "SELECT
    k.id AS id,
    k.tanggal_masuk AS tanggal_masuk,
    k.tanggal_proses AS tanggal_proses,
    k.tanggal_selesai AS tanggal_selesai,
    karyawan.nama AS nama_karyawan,
    k.keluhan AS keluhan,
    k.solusi AS solusi,
    k.biaya AS biaya,
    k.status AS status
FROM keluhan k
JOIN karyawan ON k.id_karyawan = karyawan.id WHERE status = 'Selesai'
ORDER BY k.tanggal_selesai DESC";

$result_join_selesai = mysqli_query($conn, $query_join_selesai);

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
        $('#myTable0').dataTable();
        $('#myTableProses').dataTable();
        $('#myTableSelesai').dataTable();
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
                    <h1>Keluhan | Status</h1>
                    <nav class="my-3">
                        <ul class="nav nav-pills mb-3 gap-2" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">0</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-proses-tab" data-bs-toggle="pill" data-bs-target="#pills-proses" type="button" role="tab" aria-controls="pills-proses" aria-selected="false">Proses</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-selesai-tab" data-bs-toggle="pill" data-bs-target="#pills-selesai" type="button" role="tab" aria-controls="pills-selesai" aria-selected="false">Selesai</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                <table id="myTable0" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tanggal Masuk</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Keluhan</th>
                                            <th scope="col" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 ?>
                                        <?php while ($result = mysqli_fetch_array($result_join)) : ?>
                                            <tr>
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $result["tanggal_masuk"] ?></td>
                                                <td><?= $result["nama_karyawan"] ?></td>
                                                <td><?= strlen($result["keluhan"]) > 10 ? substr($result["keluhan"], 0, 10) . "..." : $result["keluhan"] ?></td>
                                                <td>
                                                    <div class="text-center">
                                                        <a href="update.php?id=<?= $result['id'] ?>" class="btn btn-warning">Edit</a> | <a href="delete.php?id=<?= $result['id'] ?>" id="btn-del" class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="pills-proses" role="tabpanel" aria-labelledby="pills-proses-tab" tabindex="0">
                                <table id="myTableProses" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tanggal Proses</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Keluhan</th>
                                            <th scope="col">Solusi</th>
                                            <th scope="col" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 ?>
                                        <?php while ($result = mysqli_fetch_array($result_join_proses)) : ?>
                                            <tr>
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $result["tanggal_proses"] ?></td>
                                                <td><?= $result["nama_karyawan"] ?></td>
                                                <td><?= strlen($result["keluhan"]) > 10 ? substr($result["keluhan"], 0, 10) . "..." : $result["keluhan"] ?></td>
                                                <td><?= strlen($result["solusi"]) > 10 ? substr($result["solusi"], 0, 10) . "..." : $result["solusi"] ?></td>
                                                <td>
                                                    <div class="text-center">
                                                        <a href="update.php?id=<?= $result['id'] ?>" class="btn btn-warning">Edit</a> | <a href="delete.php?id=<?= $result['id'] ?>" id="btn-del" class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="pills-selesai" role="tabpanel" aria-labelledby="pills-selesai-tab" tabindex="0">
                                <table id="myTableSelesai" class="table table-striped display">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Tanggal Selesai</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Keluhan</th>
                                            <th scope="col">Solusi</th>
                                            <th scope="col">Biaya (Rp)</th>
                                            <th scope="col" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 ?>
                                        <?php while ($result = mysqli_fetch_array($result_join_selesai)) : ?>
                                            <tr>
                                                <th scope="row"><?= $no++ ?></th>
                                                <td><?= $result["tanggal_selesai"] ?></td>
                                                <td><?= $result["nama_karyawan"] ?></td>
                                                <td><?= strlen($result["keluhan"]) > 10 ? substr($result["keluhan"], 0, 10) . "..." : $result["keluhan"] ?></td>
                                                <td><?= strlen($result["solusi"]) > 10 ? substr($result["solusi"], 0, 10) . "..." : $result["solusi"] ?></td>
                                                <td><?= $result["biaya"] ?></td>
                                                <td>
                                                    <div class="text-center">
                                                        <a href="update.php?id=<?= $result['id'] ?>" class="btn btn-warning">Detail</a> | <a href="delete.php?id=<?= $result['id'] ?>" id="btn-del" class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endwhile; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </nav>
                    <a href="add.php" class="btn ungu my-3" name="submit">Tambah</a>
                </div>
            </section>
        </div>
    </div>
    <script src="../src/js/sweetalert.js"></script>

</body>

</html>
<?php

session_start();

$id = $_SESSION['id_karyawan'];

include "../../src/config/connect.php";
include "../../src/function/antiSqlInjection.php";
include "../../src/function/statusCount.php";

if (!isset($_SESSION['id_karyawan'])) {
    header("Location: ../../../pages/dashboard");
}

$query_identitas = "SELECT nama, nip, jk, divisi FROM karyawan WHERE id = '$id'";
$identitas_result = mysqli_query($conn, $query_identitas);

$query = "SELECT k.*, 
            k.id AS id, 
            p.nama AS nama_processor, 
            r.kapasitas AS kapasitas_ram,
            r.tipe_memori AS tipe_ram,
            s.tipe AS tipe_storage,
            s.kapasitas AS kapasitas_storage,
            v.brand AS brand_vga,
            v.nama AS nama_vga,
            v.vram AS vram_vga
            FROM komputer k 
            JOIN karyawan ka ON k.id_karyawan = ka.id 
            LEFT JOIN processor p ON k.id_processor = p.id 
            LEFT JOIN ram r ON k.id_ram = r.id 
            LEFT JOIN storage s ON k.id_storage = s.id 
            LEFT JOIN vga v ON k.id_vga = v.id 
            WHERE k.id_karyawan = '$id'";

$komputer_result = mysqli_query($conn, $query);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../src/css/global.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../../src/library/bootstrap.php' ?>
    <title>Inventory Barang | Dashboard</title>
</head>

<script>
    $(document).ready(function() {
        $('#table').dataTable({
            "scrollY": "300px",
            "scrollCollapse": true,
            "paging": true
        });
    });
</script>

<body>
    <?php include "../../src/layouts/navbar.php" ?>
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-md-2 sidebar text-light">
                <div class="text-center my-3 mb-3">
                </div>
                <div class="text-center my-3 mb-5">
                    <h4>Inventory Barang</h4>
                </div>
                <div class="mx-4">
                    <h5>Menu</h5>
                    <a href="../dashboard/">
                        <p class="opacity-100 aktif rounded-pill">Dashboard</p>
                    </a>
                </div>
                <div class="mx-4">
                    <h5>Transaksi</h5>
                    <a href="../keluhan/">
                        <p class="opacity">Keluhan</p>
                    </a>
                </div>
                <div class="mx-4">
                    <h5>Aksi</h5>
                    <a href="../../../logout.php">
                        <p class="opacity">Logout</p>
                    </a>
                </div>
            </div>
            <div class="col-md-10 content">
                <div class="wrapper shadow p-3 my-3 left">
                    <h1>Dashboard | <?= $_SESSION['level'] ?></h1>
                    <div class="row my-3">
                        <div class="col-md-4">
                            <a href="../keluhan/" class="text-dark">
                                <div class="p-4 shadow hover rounded h-100">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="fs-3">Jumlah Keluhan Status "0"</p>
                                        </div>
                                        <div class="col-md-2">
                                            <h1 class="text-ungu"><?= $ks0_result ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="../keluhan/" class="text-dark">
                                <div class="p-4 shadow hover rounded h-100">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="fs-3">Jumlah Keluhan Status "Proses"</p>
                                        </div>
                                        <div class="col-md-2">
                                            <h1 class="text-ungu"><?= $ksp_result ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="../keluhan/" class="text-dark">
                                <div class="p-4 shadow hover rounded h-100">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="fs-3">Jumlah Keluhan Status "Selesai"</p>
                                        </div>
                                        <div class="col-md-2">
                                            <h1 class="text-ungu"><?= $kss_result ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6">
                            <div class="p-4 shadow rounded hover h-100">
                                <?php if ($identitas = mysqli_fetch_array($identitas_result)) : ?>
                                    <p class="fs-3 fw-bold">Identitas Karyawan</p>
                                    <span>Nama : <?= $identitas['nama'] ?></span>
                                    <br>
                                    <span>NIP : <?= $identitas['nip'] ?></span>
                                    <br>
                                    <span>Jenis Kelamin : <?= $identitas['jk'] ?></span>
                                    <br>
                                    <span>Divisi : <?= $identitas['divisi'] ?></span>
                                    <br>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-4 shadow rounded hover h-100">
                                <?php if ($komputer = mysqli_fetch_array($komputer_result)) : ?>
                                    <p class="fs-3 fw-bold">Spesifikasi Komputer Karyawan</p>
                                    <span>ID Komputer : <?= $komputer['id'] ?></span>
                                    <br>
                                    <span>Processor : <?= $komputer['nama_processor'] ?></span>
                                    <br>
                                    <span>RAM : <?= $komputer['kapasitas_ram'] . " GB " . $komputer['tipe_ram'] ?></span>
                                    <br>
                                    <span>Storage : <?= $komputer['tipe_storage'] . " " . $komputer['kapasitas_storage'] . " GB" ?></span>
                                    <br>
                                    <span>Graphics Card : <?= $komputer['brand_vga'] . " " . $komputer['nama_vga'] . " " . $komputer['vram_vga'] . " GB" ?></span>
                                    <br>
                                <?php else : ?>
                                    <p class="fs-3 fw-bold">Spesifikasi Komputer Karyawan</p>
                                    <span>Karyawan Belum Memiliki Komputer!</span>
                                    <br>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
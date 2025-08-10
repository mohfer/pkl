<?php

session_start();

include "../src/config/connect.php";
include "../src/function/antiSqlInjection.php";
include "../src/function/dashboardCount.php";

if (!isset($_SESSION['id_users'])) {
    header("Location: ../../pages/me/dashboard");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../src/css/global.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../src/library/bootstrap.php' ?>
    <title>Inventory Barang | Dashboard</title>
    <!-- Umami Analytics -->
    <script defer src="https://umami.mohfer.my.id/script.js" data-website-id="2b6ba940-9fe6-4f04-848b-3035b9666d8a"></script>
    <!-- End Umami Analytics -->
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
    <?php include "../src/layouts/navbar.php" ?>
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-md-2 sidebar text-light">
                <a href="../../">
                    <div class="text-center my-3 mb-5">
                        <h4>Inventory Barang</h4>
                    </div>
                </a>
                <div class="mx-4">
                    <h5>Menu</h5>
                    <a href="../dashboard/">
                        <p class="opacity-100 aktif rounded-pill">Dashboard</p>
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
                <div class="mx-4">
                    <h5>Aksi</h5>
                    <a href="../password/">
                        <p class="opacity">Password</p>
                    </a>
                    <a href="../../logout.php">
                        <p class="opacity">Logout</p>
                    </a>
                </div>
            </div>
            <div class="col-md-10 content">
                <div class="wrapper shadow p-3 my-3 left">
                    <h1>Dashboard | <?= $_SESSION['level'] ?></h1>
                    <div class="row my-3">
                        <div class="col-md-6">
                            <a href="../barang/" class="text-dark">
                                <div class="p-4 shadow hover rounded h-100">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="fs-2">Jumlah Transaksi Masuk</p>
                                        </div>
                                        <div class="col-md-2">
                                            <h1 class="text-ungu"><?= $tmasuk_result ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="../barang/" class="text-dark">
                                <div class="p-4 shadow hover rounded h-100">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="fs-2">Jumlah Transaksi Keluar</p>
                                        </div>
                                        <div class="col-md-2">
                                            <h1 class="text-ungu"><?= $tkeluar_result ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
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
                        <div class="col-md-3">
                            <a href="../processor/" class="text-dark">
                                <div class="p-4 shadow hover rounded h-100">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="fs-3">Jumlah Processor</p>
                                        </div>
                                        <div class="col-md-2">
                                            <h1 class="text-ungu"><?= $processor_result ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="../ram/" class="text-dark">
                                <div class="p-4 shadow hover rounded h-100">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="fs-3">Jumlah RAM</p>
                                        </div>
                                        <div class="col-md-2">
                                            <h1 class="text-ungu"><?= $ram_result ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="../storage/" class="text-dark">
                                <div class="p-4 shadow hover rounded h-100">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="fs-3">Jumlah Storage</p>
                                        </div>
                                        <div class="col-md-2">
                                            <h1 class="text-ungu"><?= $storage_result ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="../vga/" class="text-dark">
                                <div class="p-4 shadow hover rounded h-100">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="fs-3">Jumlah Graphics Card</p>
                                        </div>
                                        <div class="col-md-2">
                                            <h1 class="text-ungu"><?= $vga_result ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-md-6">
                            <a href="../karyawan/" class="text-dark">
                                <div class="p-4 shadow hover rounded h-100">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="fs-2">Jumlah Karyawan</p>
                                        </div>
                                        <div class="col-md-2">
                                            <h1 class="text-ungu"><?= $karyawan_result ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="../komputer/" class="text-dark">
                                <div class="p-4 shadow hover rounded h-100">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p class="fs-2">Jumlah Komputer</p>
                                        </div>
                                        <div class="col-md-2">
                                            <h1 class="text-ungu"><?= $komputer_result ?></h1>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
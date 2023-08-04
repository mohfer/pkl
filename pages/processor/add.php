<?php

include "../src/config/connect.php";

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
                    <h5>Komponen</h5>
                    <a href="../processor/">
                        <p class="opacity-100 aktif rounded-pill">Processor</p>
                    </a>
                    <a href="../ram/">
                        <p class="opacity">RAM</p>
                    </a>
                    <a href="../motherboard/">
                        <p class="opacity">Motherboard</p>
                    </a>
                    <a href="../psu/">
                        <p class="opacity">Powersupply</p>
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
                <div class="wrapper shadow-lg p-3 my-3 left">
                    <h1>Processor | Tambah</h1>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="kode">Kode</label>
                                <input type="text" id="kode" class="form-control" placeholder="1">
                            </div>
                            <div class="mb-3">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" class="form-control" placeholder="Intel Core i3 13100">
                            </div>
                            <div class="mb-3">
                                <label for="core">Core</label>
                                <input type="text" id="core" class="form-control" placeholder="4">
                            </div>
                            <div class="mb-3">
                                <label for="thread">Thread</label>
                                <input type="text" id="thread" class="form-control" placeholder="8">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label for="max-speed">Max Speed (GHz)</label>
                                <input type="text" id="max-speed" class="form-control" placeholder="4.50">
                            </div>
                            <div class="mb-3">
                                <label for="daya">Daya (W)</label>
                                <input type="text" id="daya" class="form-control" placeholder="60">
                            </div>
                            <div class="mb-3">
                                <label for="tgl-peluncuran">Tanggal Peluncuran</label>
                                <input type="text" id="tgl-peluncuran" class="form-control" placeholder="
Q1'23">
                            </div>
                        </div>
                        <div class="mb-3">
                            <a href="add.php" class="btn ungu">Simpan</a>
                            <a href="../processor/" class="btn btn-danger">Batal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
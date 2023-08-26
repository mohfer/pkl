<?php

session_start();

include "../src/config/connect.php";
include "../src/function/antiSqlInjection.php";

$row = mysqli_query($conn, "SELECT * FROM vga ORDER BY nama DESC");

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
    <title>Inventory Barang | VGA</title>
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
            </section>
            <section class="col-md-10 content">
                <div class="wrapper shadow p-3 my-3 left">
                    <h1>Graphics Card</h1>
                    <table id="myTable" class="table table-striped display">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Nama</th>
                                <th scope="col">VRAM (GB)</th>
                                <th scope="col">Stok</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php while ($result = mysqli_fetch_array($row)) : ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $result["id"] ?></td>
                                    <td><?= $result["brand"] ?></td>
                                    <td><?= $result["nama"] ?></td>
                                    <td><?= $result["vram"] ?></td>
                                    <td><?= $result["stok"] ?></td>
                                    <td>
                                        <div class="text-center">
                                            <a href="update.php?id=<?= $result['id'] ?>" class="btn btn-warning">Edit</a> | <a href="delete.php?id=<?= $result['id'] ?>" id="btn-del" class="btn btn-danger">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <a href="add.php" class="btn ungu my-3">Tambah</a>
                </div>
            </section>
        </div>
    </div>
    <script src="../src/js/sweetalert.js"></script>
</body>

</html>
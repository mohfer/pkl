<?php

session_start();

include "../src/config/connect.php";

$row = mysqli_query($conn, "SELECT * FROM processor");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../src/css/global.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../src/library/bootstrap.php' ?>
    <?php include '../src/library/datatables.php' ?>
    <title>Inventory Barang | Processor</title>
</head>

<script>
    $(document).ready(function() {
        $('#myTable').dataTable({
            "scrollY": "300px",
            "scrollCollapse": true,
            "paging": true
        });
    });
</script>

<body>

    <!-- Swal -->
    <div class="info-login" data-infologin="<?php if (isset($_SESSION['info'])) {
                                                echo $_SESSION['info'];
                                            }
                                            unset($_SESSION['info']) ?>">
    </div>
    <!-- Swal -->

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
                    <h1>Processor</h1>
                    <table id="myTable" class="table table-striped display">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Core</th>
                                <th scope="col">Thread</th>
                                <th scope="col">Daya (W)</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php while ($result = mysqli_fetch_array($row)) : ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $result["id"] ?></td>
                                    <td><?= $result["nama"] ?></td>
                                    <td><?= $result["core"] ?></td>
                                    <td><?= $result["thread"] ?></td>
                                    <td><?= $result["daya"] ?></td>
                                    <td>
                                        <div class="text-center">
                                            <a href="update.php?id=<?= $result['id'] ?>" class="btn btn-warning">Edit</a> | <a href="" class="btn btn-danger">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <a href="add.php" class="btn ungu my-3">Tambah</a>
                </div>
            </div>
        </div>
    </div>
    <script src="../src/js/sweetalert.js"></script>
</body>

</html>
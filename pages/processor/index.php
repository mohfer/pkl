<?php

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
    <title>Inventory Barang | Processor</title>
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
                    <h1 class="mb-3">Processor</h1>
                    <table id="table" class="table display">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Kode</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Core</th>
                                <th scope="col">Thread</th>
                                <th scope="col">Max Speed (GHz)</th>
                                <th scope="col">Daya (W)</th>
                                <th scope="col">Tanggal Peluncuran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php while ($result = mysqli_fetch_array($row)) : ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $result["kode"] ?></td>
                                    <td><?= $result["nama"] ?></td>
                                    <td><?= $result["core"] ?></td>
                                    <td><?= $result["thread"] ?></td>
                                    <td><?= $result["max_speed"] ?></td>
                                    <td><?= $result["daya"] ?></td>
                                    <td><?= $result["tgl_peluncuran"] ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                    <a href="add.php" class="btn ungu my-3">Tambah</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
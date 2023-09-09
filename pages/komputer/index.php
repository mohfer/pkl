<?php

session_start();

include "../src/config/connect.php";
include "../src/function/antiSqlInjection.php";

if (!isset($_SESSION['id_users'])) {
    header("Location: ../../pages/me/dashboard");
}

$query_karyawan = "SELECT id, nama FROM karyawan ORDER BY nama ASC";
$result_karyawan = mysqli_query($conn, $query_karyawan);

$query_processor = "SELECT id, nama FROM processor ORDER BY nama DESC";
$result_processor = mysqli_query($conn, $query_processor);

$query_ram = "SELECT id, tipe_memori, kapasitas FROM ram ORDER BY tipe_memori DESC";
$result_ram = mysqli_query($conn, $query_ram);

$query_storage = "SELECT id, tipe, kapasitas FROM storage ORDER BY kapasitas DESC";
$result_storage = mysqli_query($conn, $query_storage);

$query_vga = "SELECT id, brand, nama, vram FROM vga ORDER BY nama DESC";
$result_vga = mysqli_query($conn, $query_vga);

$query_join = "SELECT
    k.id AS id,
    karyawan.nama AS nama_karyawan,
    p.nama AS nama_processor,
    r.kapasitas AS kapasitas_ram,
    r.tipe_memori AS tipe_ram,
    s.tipe AS tipe_storage,
    s.kapasitas AS kapasitas_storage,
    v.brand AS brand_vga,
    v.nama AS nama_vga,
    v.vram AS vram_vga
FROM komputer k
JOIN karyawan ON k.id_karyawan = karyawan.id
JOIN processor p ON k.id_processor = p.id
JOIN ram r ON k.id_ram = r.id
JOIN storage s ON k.id_storage = s.id
JOIN vga v ON k.id_vga = v.id
ORDER BY karyawan.nama ASC";

$result_join = mysqli_query($conn, $query_join);

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $id_karyawan = $_POST['id_karyawan'];
    $id_processor = $_POST['id_processor'];
    $id_ram = $_POST['id_ram'];
    $id_storage = $_POST['id_storage'];
    $id_vga = $_POST['id_vga'];

    if (empty($id_karyawan) || empty($id_processor) || empty($id_ram) || empty($id_storage)) {
        $_SESSION['data'] = "tidak ditemukan! tolong pilih data sesuai dengan datalist yang sudah ada!";
    } else {

        $query = "SELECT id_karyawan FROM komputer WHERE id_karyawan = '$id_karyawan'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            $_SESSION['data'] = "sudah memiliki komputer!";
        } else {
            $sql = "INSERT INTO komputer (id, id_karyawan, id_processor, id_ram, id_storage, id_vga) VALUES ('$id', '$id_karyawan', '$id_processor', '$id_ram', '$id_storage', '$id_vga')";

            if (mysqli_query($conn, $sql)) {
                $_SESSION['data'] = "berhasil disimpan!";
                header("Location: ../komputer");
                exit;
            } else {
                $_SESSION['data'] = "gagal disimpan!";
            }
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
    <link rel="stylesheet" href="../src/css/global.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <?php include '../src/library/bootstrap.php' ?>
    <?php include '../src/library/datatables.php' ?>
    <?php include '../src/library/sweetalert.php' ?>

    <title>Inventory Barang | Komputer</title>
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
                <a href="../../">
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
                            <p class="opacity-100 aktif rounded-pill">Komputer</p>
                        </a>
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
            </section>
            <section class="col-md-10 content">
                <div class="wrapper shadow p-3 my-3 left">
                    <h1>Komputer</h1>
                    <form action="" method="POST">
                        <div class="">
                            <input type="hidden" id="id" name="id" class="form-control" placeholder="1">
                        </div>
                        <div class="row my-3">
                            <div class="col">
                                <label for="karyawan">Karyawan</label>
                                <input class="form-control" type="text" name="karyawan_input" id="karyawan_input" list="list_karyawan" autocomplete="off" required>
                                <datalist id="list_karyawan">
                                    <?php while ($row = mysqli_fetch_assoc($result_karyawan)) { ?>
                                        <option value="<?= $row['nama']; ?>" data-id="<?= $row['id']; ?>"></option>
                                    <?php } ?>
                                </datalist>
                                <input type="hidden" name="id_karyawan" id="id_karyawan">
                            </div>
                            <div class="col">
                                <label for="processor">Processor</label>
                                <input class="form-control" type="text" name="processor_input" id="processor_input" list="list_processor" autocomplete="off" required>
                                <datalist id="list_processor">
                                    <?php while ($row = mysqli_fetch_assoc($result_processor)) { ?>
                                        <option value="<?= $row['nama']; ?>" data-id="<?= $row['id']; ?>"></option>
                                    <?php } ?>
                                </datalist>
                                <input type="hidden" name="id_processor" id="id_processor">
                            </div>
                            <div class="col">
                                <label for="ram">RAM</label>
                                <input class="form-control" type="text" name="ram_input" id="ram_input" list="list_ram" autocomplete="off" required>
                                <datalist id="list_ram">
                                    <?php while ($row = mysqli_fetch_assoc($result_ram)) { ?>
                                        <option value="<?= $row['kapasitas'] . ' GB ' . $row['tipe_memori']; ?>" data-id="<?= $row['id']; ?>"></option>
                                    <?php } ?>
                                </datalist>
                                <input type="hidden" name="id_ram" id="id_ram">
                            </div>
                            <div class="col">
                                <label for="storage">Storage</label>
                                <input class="form-control" type="text" name="storage_input" id="storage_input" list="list_storage" autocomplete="off" required>
                                <datalist id="list_storage">
                                    <?php while ($row = mysqli_fetch_assoc($result_storage)) { ?>
                                        <option value="<?= $row['tipe'] . ' ' . $row['kapasitas'] . ' GB'; ?>" data-id="<?= $row['id']; ?>"></option>
                                    <?php } ?>
                                </datalist>
                                <input type="hidden" name="id_storage" id="id_storage">
                            </div>
                            <div class="col">
                                <label for="vga">Graphics Card</label>
                                <input class="form-control" type="text" name="vga_input" id="vga_input" list="list_vga" autocomplete="off">
                                <datalist id="list_vga">
                                    <?php while ($row = mysqli_fetch_assoc($result_vga)) { ?>
                                        <option value="<?= $row['brand'] . ' ' . $row['nama'] . ' ' . $row['vram'] . ' GB '; ?>" data-id="<?= $row['id']; ?>"></option>
                                    <?php } ?>
                                </datalist>
                                <input type="hidden" name="id_vga" id="id_vga">
                            </div>
                        </div>
                        <button class="btn ungu mb-3" name="submit">Tambah</button>
                    </form>
                    <table id="myTable" class="table table-striped display">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">ID</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Processor</th>
                                <th scope="col">RAM</th>
                                <th scope="col">Storage</th>
                                <th scope="col">Graphics Card</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php while ($result = mysqli_fetch_array($result_join)) : ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $result["id"] ?></td>
                                    <td><?= $result["nama_karyawan"] ?></td>
                                    <td><?= $result["nama_processor"] ?></td>
                                    <td><?= $result["kapasitas_ram"] . ' GB ' . $result['tipe_ram'] ?></td>
                                    <td><?= $result["tipe_storage"] . ' ' . $result['kapasitas_storage'] . ' GB' ?></td>
                                    <td><?= $result['brand_vga'] . ' ' . $result["nama_vga"] . ' ' . $result['vram_vga'] . ' GB' ?></td>
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
            </section>
        </div>
    </div>
    <script src="../src/js/sweetalert.js"></script>
    <script src="../src/js/datalistKomputer.js"></script>

</body>

</html>
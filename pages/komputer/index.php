<?php

session_start();

include "../src/config/connect.php";

$query_karyawan = "SELECT id, nama FROM karyawan ORDER BY nama ASC";
$result_karyawan = mysqli_query($conn, $query_karyawan);

$query_processor = "SELECT id, nama FROM processor ORDER BY nama DESC";
$result_processor = mysqli_query($conn, $query_processor);

$query_ram = "SELECT id, tipe_memori, kapasitas FROM ram ORDER BY kapasitas DESC";
$result_ram = mysqli_query($conn, $query_ram);

$query_storage = "SELECT id, tipe, kapasitas FROM storage ORDER BY kapasitas DESC";
$result_storage = mysqli_query($conn, $query_storage);

$query_vga = "SELECT id, brand, nama, vram FROM vga";
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

    $query = "SELECT id_karyawan, id_processor, id_ram, id_storage, id_vga FROM komputer WHERE id_karyawan = '$id_karyawan' AND id_processor = '$id_processor' AND id_ram = '$id_ram' AND id_storage = '$id_storage' AND id_vga = '$id_vga'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['data'] = "sudah ada!";
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
                        <p class="opacity">Graphics Card</p>
                    </a>
                </div>
                <div class="mx-4">
                    <h5>Master | Karyawan</h5>
                    <a href="../karyawan/">
                        <p class="opacity">Karyawan</p>
                    </a>
                </div>
                <div class="mx-4">
                    <h5>Transaksi</h5>
                    <a href="../komputer/">
                        <p class="opacity-100 aktif rounded-pill">Komputer</p>
                    </a>
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
                    <h1>Komputer</h1>
                    <form action="" method="POST">
                        <div class="">
                            <input type="hidden" id="id" name="id" class="form-control" placeholder="1">
                        </div>
                        <div class="row my-3">
                            <div class="col">
                                <label for="">Nama Karyawan</label>
                                <select class="form-select" name="id_karyawan">
                                    <?php while ($row = mysqli_fetch_assoc($result_karyawan)) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="">Processor</label>
                                <select class="form-select" name="id_processor">
                                    <?php while ($row = mysqli_fetch_assoc($result_processor)) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="">RAM</label>
                                <select class="form-select" name="id_ram">
                                    <?php while ($row = mysqli_fetch_assoc($result_ram)) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['kapasitas'] . ' GB' . ' ' . $row['tipe_memori']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="">Storage</label>
                                <select class="form-select" name="id_storage">
                                    <?php while ($row = mysqli_fetch_assoc($result_storage)) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['tipe'] . ' ' . $row['kapasitas'] . ' GB'; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="">Graphics Card</label>
                                <select class="form-select" name="id_vga">
                                    <?php while ($row = mysqli_fetch_assoc($result_vga)) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['brand'] . ' ' . $row['nama'] . ' ' . $row['vram'] . ' GB'; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <button class="btn ungu mb-3" name="submit">Tambah</button>
                    </form>
                    <table id="myTable" class="table table-striped display">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
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
</body>

</html>
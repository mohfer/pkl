<?php

session_start();

$id = $_GET['id'];
$id_users = $_SESSION['id_users'];

include "../src/config/connect.php";
include "../src/function/antiSqlInjection.php";

if (!isset($_SESSION['id_users'])) {
    header("Location: ../../pages/me/dashboard");
}



include "../src/function/getFunction.php";

$query_karyawan = "SELECT id, nama FROM karyawan ORDER BY nama ASC";
$result_karyawan = mysqli_query($conn, $query_karyawan);

$query_join = "SELECT
    k.id AS id,
    karyawan.nama AS nama_karyawan,
    karyawan.nip AS nip_karyawan,
    karyawan.jk AS jk_karyawan,
    karyawan.divisi AS divisi_karyawan,
    p.nama AS nama_processor,
    r.kapasitas AS kapasitas_ram,
    r.tipe_memori AS tipe_ram,
    s.tipe AS tipe_storage,
    s.kapasitas AS kapasitas_storage,
    v.brand AS brand_vga,
    v.nama AS nama_vga,
    v.vram AS vram_vga
FROM keluhan kel
JOIN karyawan ON kel.id_karyawan = karyawan.id
JOIN komputer k ON kel.id_karyawan = k.id_karyawan
JOIN processor p ON k.id_processor = p.id
JOIN ram r ON k.id_ram = r.id
JOIN storage s ON k.id_storage = s.id
JOIN vga v ON k.id_vga = v.id
WHERE kel.id = $id
ORDER BY karyawan.nama ASC";

$result_join = mysqli_query($conn, $query_join);
date_default_timezone_set('Asia/Jakarta');
$tanggal = date('l, d F Y, H:i:s') . " WIB";

$query_status = "SELECT status FROM keluhan WHERE id = $id";
$result_status = mysqli_query($conn, $query_status);

if ($result_status) {
    $row_status = mysqli_fetch_assoc($result_status);
    $status = $row_status['status'];
}

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $id_karyawan = $_POST['id_karyawan'];
    $solusi = $_POST['solusi'];
    $biaya = $_POST['biaya'];

    $sql = "UPDATE keluhan SET id_karyawan = '$id_karyawan', solusi = '$solusi', biaya = '$biaya' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['data'] = "berhasil disimpan!";
        header("Location: ../keluhan");
        exit;
    } else {
        $_SESSION['data'] = "gagal disimpan!";
    }
}

if (isset($_POST['proses'])) {
    $id = $_GET['id'];
    $id_karyawan = $_POST['id_karyawan'];
    $keluhan = $_POST['keluhan'];

    $sql = "UPDATE keluhan SET id_users = '$id_users', id_karyawan = '$id_karyawan', keluhan = '$keluhan', tanggal_proses = '$tanggal', status = 'Proses' WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['data'] = "berhasil disimpan!";
        header("Location: ../keluhan");
        exit;
    } else {
        $_SESSION['data'] = "gagal disimpan!";
    }
}

if (isset($_POST['selesai'])) {
    $id = $_GET['id'];
    $solusi = $_POST['solusi'];
    $biaya = $_POST['biaya'];

    $sql = "UPDATE keluhan SET tanggal_selesai = '$tanggal', solusi = '$solusi', biaya = '$biaya', status = 'Selesai' WHERE id = '$id'";

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
                    <?php if ($status == "Proses" || $status == "0") : ?>
                        <h1>Keluhan | Update</h1>
                    <?php endif; ?>
                    <?php if ($status == "Selesai") : ?>
                        <h1>Keluhan | Detail</h1>
                    <?php endif; ?>
                    <?php $data = mysqli_query($conn, "SELECT * FROM keluhan WHERE id = $id") ?>
                    <?php while ($d = mysqli_fetch_array($data)) : ?>
                        <?php if ($status == "0" || $status == "Proses") : ?>
                            <form action="" method="POST">
                                <div class="">
                                    <input type="hidden" id="id" name="id" class="form-control" placeholder="1" value="<?= $d['id'] ?>">
                                </div>
                                <div class="row my-3">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="karyawan">Karyawan</label>
                                            <input class="form-control" type="text" name="karyawan_input" id="karyawan_input" list="list_karyawan" value="<?= getKaryawan($conn, $d['id_karyawan']) ?>" autocomplete="off" required <?php if ($status == "Proses") echo 'disabled readonly'; ?>>
                                            <datalist id="list_karyawan">
                                                <?php while ($row = mysqli_fetch_assoc($result_karyawan)) { ?>
                                                    <option value="<?= $row['nama']; ?>" data-id="<?= $row['id']; ?>"></option>
                                                <?php } ?>
                                            </datalist>
                                            <input type="hidden" name="id_karyawan" id="id_karyawan">
                                        </div>
                                        <div class="mb-3">
                                            <label for="keluhan">Keluhan</label>
                                            <textarea class="form-control" name="keluhan" id="keluhan" cols="30" rows="5" <?php if ($status == "Proses") echo 'disabled readonly'; ?>><?php echo $d['keluhan'] ?></textarea>
                                        </div>
                                        <?php if ($status == "Proses") : ?>
                                            <div class="mb-3">
                                                <label for="solusi">Solusi</label>
                                                <textarea class="form-control" name="solusi" id="solusi" cols="30" rows="5" required><?php echo $d['solusi'] ?></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="biaya">Biaya (Rp)</label>
                                                <input type="number" id="biaya" name="biaya" value="<?php echo $d['biaya'] ?>" class="form-control" placeholder="200000" required>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col mt-3">
                                        <?php if ($result = mysqli_fetch_array($result_join)) : ?>
                                            <p class="fs-3 fw-bold">Identitas Karyawan</p>
                                            <span>Nama : <?= $result['nama_karyawan'] ?></span>
                                            <br>
                                            <span>NIP : <?= $result['nip_karyawan'] ?></span>
                                            <br>
                                            <span>Jenis Kelamin : <?= $result['jk_karyawan'] ?></span>
                                            <br>
                                            <span>Divisi : <?= $result['divisi_karyawan'] ?></span>
                                            <br>
                                            <br>
                                            <p class="fs-3 fw-bold">Spesifikasi Komputer Karyawan</p>
                                            <span>ID Komputer : <?= $result['id'] ?></span>
                                            <br>
                                            <span>Processor : <?= $result['nama_processor'] ?></span>
                                            <br>
                                            <span>RAM : <?= $result['kapasitas_ram'] . " GB " . $result['tipe_ram'] ?></span>
                                            <br>
                                            <span>Storage : <?= $result['tipe_storage'] . " " . $result['kapasitas_storage'] . " GB " ?></span>
                                            <br>
                                            <span>Graphics Card : <?= $result['brand_vga'] . " " . $result['nama_vga'] . " " . $result['vram_vga'] . " GB " ?></span>
                                            <br>
                                        <?php else : ?>
                                            <p class="fs-3 fw-bold">Spesifikasi Komputer Karyawan</p>
                                            <span>Karyawan Tersebut Belum Memiliki Komputer</span>
                                            <br>
                                        <?php endif; ?>
                                        <?php if ($status == "0") : ?>
                                            <button class="btn ungu my-3" name="proses">Proses</button>
                                        <?php elseif ($status == "Proses") : ?>
                                            <button class="btn ungu my-3" name="selesai">Selesai</button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <button class="btn ungu mb-3" name="submit">Simpan</button>
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
                                            <label for="karyawan">Karyawan</label>
                                            <input class="form-control" type="text" name="karyawan_input" id="karyawan_input" list="list_karyawan" value="<?= getKaryawan($conn, $d['id_karyawan']) ?>" autocomplete="off" required disabled readonly>
                                            <datalist id="list_karyawan">
                                                <?php while ($row = mysqli_fetch_assoc($result_karyawan)) { ?>
                                                    <option value="<?= $row['nama']; ?>" data-id="<?= $row['id']; ?>"></option>
                                                <?php } ?>
                                            </datalist>
                                            <input type="hidden" name="id_karyawan" id="id_karyawan">
                                        </div>
                                        <div class="mb-3">
                                            <label for="keluhan">Keluhan</label>
                                            <textarea class="form-control" name="keluhan" id="keluhan" cols="30" rows="5" disabled readonly><?php echo $d['keluhan'] ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="solusi">Solusi</label>
                                            <textarea class="form-control" name="solusi" id="solusi" cols="30" rows="5" required disabled readonly><?php echo $d['solusi'] ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="biaya">Biaya (Rp)</label>
                                            <input type="number" id="biaya" name="biaya" value="<?php echo $d['biaya'] ?>" class="form-control" placeholder="200000" required disabled readonly>
                                        </div>
                                    </div>
                                    <div class="col mt-3">
                                        <?php if ($result = mysqli_fetch_array($result_join)) : ?>
                                            <p class="fs-3 fw-bold">Identitas Karyawan</p>
                                            <span>Nama : <?= $result['nama_karyawan'] ?></span>
                                            <br>
                                            <span>NIP : <?= $result['nip_karyawan'] ?></span>
                                            <br>
                                            <span>Jenis Kelamin : <?= $result['jk_karyawan'] ?></span>
                                            <br>
                                            <span>Divisi : <?= $result['divisi_karyawan'] ?></span>
                                            <br>
                                            <br>
                                            <p class="fs-3 fw-bold">Spesifikasi Komputer Karyawan</p>
                                            <span>ID Komputer : <?= $result['id'] ?></span>
                                            <br>
                                            <span>Processor : <?= $result['nama_processor'] ?></span>
                                            <br>
                                            <span>RAM : <?= $result['kapasitas_ram'] . " GB " . $result['tipe_ram'] ?></span>
                                            <br>
                                            <span>Storage : <?= $result['tipe_storage'] . " " . $result['kapasitas_storage'] . " GB " ?></span>
                                            <br>
                                            <span>Graphics Card : <?= $result['brand_vga'] . " " . $result['nama_vga'] . " " . $result['vram_vga'] . " GB " ?></span>
                                            <br>
                                            <br>
                                            <p class="fs-3 fw-bold">Tanggal Keluhan</p>
                                            <span>Tanggal Masuk : <?= $d['tanggal_masuk'] ?></span>
                                            <br>
                                            <span>Tanggal Proses : <?= $d['tanggal_proses'] ?></span>
                                            <br>
                                            <span>Tanggal Selesai : <?= $d['tanggal_selesai'] ?></span>
                                        <?php endif; ?>
                                        <?php if ($status == "0") : ?>
                                            <button class="btn ungu my-3" name="proses">Proses</button>
                                        <?php elseif ($status == "Proses") : ?>
                                            <button class="btn ungu my-3" name="selesai">Selesai</button>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <a href="../keluhan/" class="btn btn-danger mb-3">Kembali</a>
                            </form>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            </section>
        </div>
    </div>
    <script src="../src/js/sweetalert.js"></script>
    <script src="../src/js/datalistKomputer.js"></script>

</body>

</html>
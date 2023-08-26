<?php

session_start();

include "../src/config/connect.php";
include "../src/function/antiSqlInjection.php";
include "../src/function/barangFunction.php";

$query_karyawan = "SELECT id, nama FROM karyawan ORDER BY nama ASC";
$result_karyawan = mysqli_query($conn, $query_karyawan);

$query_processor = "SELECT id, nama, stok FROM processor ORDER BY nama DESC";
$result_processor = mysqli_query($conn, $query_processor);

$query_ram = "SELECT id, tipe_memori, kapasitas, stok FROM ram ORDER BY kapasitas DESC";
$result_ram = mysqli_query($conn, $query_ram);

$query_storage = "SELECT id, tipe, kapasitas, stok FROM storage ORDER BY kapasitas DESC";
$result_storage = mysqli_query($conn, $query_storage);

$query_vga = "SELECT id, brand, nama, vram, stok FROM vga";
$result_vga = mysqli_query($conn, $query_vga);

$query_barang = "SELECT * FROM barang ORDER BY tanggal DESC";
$result_barang = mysqli_query($conn, $query_barang);

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
    <script src="../src/js/getStokProcessor.js"></script>
    <script src="../src/js/getStokRam.js"></script>
    <script src="../src/js/getStokStorage.js"></script>
    <script src="../src/js/getStokVga.js"></script>

    <title>Inventory Barang | Barang</title>
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
                        <a href="../komputer/">
                            <p class="opacity">Komputer</p>
                        </a>
                    </a>
                </div>
                <div class="mx-4">
                    <h5>Transaksi</h5>
                    <a href="../barang/">
                        <p class="opacity-100 aktif rounded-pill">Barang</p>
                    </a>
                    <a href="../keluhan/">
                        <p class="opacity">Keluhan</p>
                    </a>
                </div>
            </section>
            <section class="col-md-10 content">
                <div class="wrapper shadow p-3 my-3 left">
                    <h1>Barang</h1>
                    <nav class="my-3">
                        <ul class="nav nav-pills mb-3 gap-2" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-processor-tab" data-bs-toggle="pill" data-bs-target="#pills-processor" type="button" role="tab" aria-controls="pills-processor" aria-selected="false">Processor</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-ram-tab" data-bs-toggle="pill" data-bs-target="#pills-ram" type="button" role="tab" aria-controls="pills-ram" aria-selected="false">RAM</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-storage-tab" data-bs-toggle="pill" data-bs-target="#pills-storage" type="button" role="tab" aria-controls="pills-storage" aria-selected="false">Storage</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-vga-tab" data-bs-toggle="pill" data-bs-target="#pills-vga" type="button" role="tab" aria-controls="pills-vga" aria-selected="false">Graphics Card</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="col" id="karyawan">
                                    <label for="karyawan">Karyawan</label>
                                    <input class="form-control" type="text" name="karyawan_input" id="karyawan_input" list="list_karyawan" autocomplete="off" required>
                                    <datalist id="list_karyawan">
                                        <?php while ($row = mysqli_fetch_assoc($result_karyawan)) { ?>
                                            <option value="<?= $row['nama']; ?>" data-id="<?= $row['id']; ?>"></option>
                                        <?php } ?>
                                    </datalist>
                                    <input type="hidden" name="id_karyawan" id="id_karyawan">
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="pills-processor" role="tabpanel" aria-labelledby="pills-processor-tab" tabindex="0">
                                <div class="">
                                    <form action="" method="POST">
                                        <div class="">
                                            <input type="hidden" id="id" name="id" class="form-control" placeholder="1">
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="processor">Processor</label>
                                                <input class="form-control" type="text" name="processor_input" id="processor_input" list="list_processor" autocomplete="off" required>
                                                <datalist id="list_processor">
                                                    <?php while ($row = mysqli_fetch_assoc($result_processor)) { ?>
                                                        <option value="<?= $row['nama']; ?>" data-id="<?= $row['id']; ?>"></option>
                                                    <?php } ?>
                                                </datalist>
                                                <input type="hidden" name="id_processor" id="id_processor">
                                                <input type="hidden" name="nama_processor" id="nama_processor">
                                            </div>
                                            <div class="col">
                                                <label for="stok">Stok</label>
                                                <input type="text" class="form-control" name="stok_input_processor" id="stok_input_processor" disabled readonly>
                                            </div>
                                            <div class="col">
                                                <label for="jumlah">Jumlah</label>
                                                <input type="number" class="form-control" name="jumlah" id="" autocomplete="off" required>
                                            </div>
                                            <div class="col">
                                                <label for="perusahaan">Dari/Untuk</label>
                                                <input type="text" class="form-control" name="perusahaan" id="" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <button class="btn ungu my-3" name="tambahProcessor">Masuk</button>
                                        <button class="btn btn-danger my-3" name="kurangProcessor">Keluar</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-ram" role="tabpanel" aria-labelledby="pills-ram-tab" tabindex="0">
                                <div class="">
                                    <form action="" method="POST">
                                        <div class="">
                                            <input type="hidden" id="id" name="id" class="form-control" placeholder="1">
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="ram">RAM</label>
                                                <input class="form-control" type="text" name="ram_input" id="ram_input" list="list_ram" autocomplete="off" required>
                                                <datalist id="list_ram">
                                                    <?php while ($row = mysqli_fetch_assoc($result_ram)) { ?>
                                                        <option value="<?= $row['kapasitas'] . ' GB ' . $row['tipe_memori']; ?>" data-id="<?= $row['id']; ?>"></option>
                                                    <?php } ?>
                                                </datalist>
                                                <input type="hidden" name="id_ram" id="id_ram">
                                                <input type="hidden" name="nama_ram" id="nama_ram">
                                            </div>
                                            <div class="col">
                                                <label for="stok">Stok</label>
                                                <input type="text" class="form-control" name="stok_input_ram" id="stok_input_ram" disabled readonly>
                                            </div>
                                            <div class="col">
                                                <label for="jumlah">Jumlah</label>
                                                <input type="number" class="form-control" name="jumlah" id="" autocomplete="off" required>
                                            </div>
                                            <div class="col">
                                                <label for="perusahaan">Dari/Untuk</label>
                                                <input type="text" class="form-control" name="perusahaan" id="" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <button class="btn ungu my-3" name="tambahRAM">Masuk</button>
                                        <button class="btn btn-danger my-3" name="kurangRAM">Keluar</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-storage" role="tabpanel" aria-labelledby="pills-storage-tab" tabindex="0">
                                <div class="">
                                    <form action="" method="POST">
                                        <div class="">
                                            <input type="hidden" id="id" name="id" class="form-control" placeholder="1">
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="storage">Storage</label>
                                                <input class="form-control" type="text" name="storage_input" id="storage_input" list="list_storage" autocomplete="off" required>
                                                <datalist id="list_storage">
                                                    <?php while ($row = mysqli_fetch_assoc($result_storage)) { ?>
                                                        <option value="<?= $row['tipe'] . ' ' . $row['kapasitas'] . ' GB'; ?>" data-id="<?= $row['id']; ?>"></option>
                                                    <?php } ?>
                                                </datalist>
                                                <input type="hidden" name="id_storage" id="id_storage">
                                                <input type="hidden" name="nama_storage" id="nama_storage">
                                            </div>
                                            <div class="col">
                                                <label for="stok">Stok</label>
                                                <input type="text" class="form-control" name="stok_input_storage" id="stok_input_storage" disabled readonly>
                                            </div>
                                            <div class="col">
                                                <label for="jumlah">Jumlah</label>
                                                <input type="number" class="form-control" name="jumlah" id="" autocomplete="off" required>
                                            </div>
                                            <div class="col">
                                                <label for="perusahaan">Dari/Untuk</label>
                                                <input type="text" class="form-control" name="perusahaan" id="" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <button class="btn ungu my-3" name="tambahStorage">Masuk</button>
                                        <button class="btn btn-danger my-3" name="kurangStorage">Keluar</button>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-vga" role="tabpanel" aria-labelledby="pills-vga-tab" tabindex="0">
                                <div class="">
                                    <form action="" method="POST">
                                        <div class="">
                                            <input type="hidden" id="id" name="id" class="form-control" placeholder="1">
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label for="vga">Graphics Card</label>
                                                <input class="form-control" type="text" name="vga_input" id="vga_input" list="list_vga" autocomplete="off" required>
                                                <datalist id="list_vga">
                                                    <?php while ($row = mysqli_fetch_assoc($result_vga)) { ?>
                                                        <option value="<?= $row['brand'] . ' ' . $row['nama'] . ' ' . $row['vram'] . ' GB '; ?>" data-id="<?= $row['id']; ?>"></option>
                                                    <?php } ?>
                                                </datalist>
                                                <input type="hidden" name="id_vga" id="id_vga">
                                                <input type="hidden" name="nama_vga" id="nama_vga">
                                            </div>
                                            <div class="col">
                                                <label for="stok">Stok</label>
                                                <input type="text" class="form-control" name="stok_input_vga" id="stok_input_vga" disabled readonly>
                                            </div>
                                            <div class="col">
                                                <label for="jumlah">Jumlah</label>
                                                <input type="number" class="form-control" name="jumlah" id="" autocomplete="off" required>
                                            </div>
                                            <div class="col">
                                                <label for="perusahaan">Dari/Untuk</label>
                                                <input type="text" class="form-control" name="perusahaan" id="" autocomplete="off" required>
                                            </div>
                                        </div>
                                        <button class="btn ungu my-3" name="tambahVga">Masuk</button>
                                        <button class="btn btn-danger my-3" name="kurangVga">Keluar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <table id="myTable" class="table table-striped display">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Komponen</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Dari/Untuk</th>
                                <th class="text-center" scope="col">Status</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php while ($result = mysqli_fetch_array($result_barang)) : ?>
                                <tr>
                                    <th scope="row"><?= $no++ ?></th>
                                    <td><?= $result["tanggal"] ?></td>
                                    <td><?= $result["komponen"] ?></td>
                                    <td><?= $result["nama_komponen"] ?></td>
                                    <td><?= $result['jumlah'] ?></td>
                                    <td><?= $result['perusahaan'] ?></td>
                                    <td class="<?php echo ($result['status'] === 'Masuk') ? 'bg-success text-light text-center' : 'bg-danger text-light text-center'; ?>">
                                        <?php echo $result['status']; ?>
                                    </td>
                                    <td>
                                        <div class="text-center">
                                            <a href="delete.php?id=<?= $result['id'] ?>" id="btn-del" class="btn btn-danger">Hapus</a>
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
    <script src="../src/js/datalistBarang.js"></script>
</body>

</html>
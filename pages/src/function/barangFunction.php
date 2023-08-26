<?php

date_default_timezone_set('Asia/Jakarta');
$tanggal = date('l, d F Y, H:i:s') . " WIB";

// Processor
if (isset($_POST['tambahProcessor'])) {
    $id = $_POST['id'];
    $id_processor = $_POST['id_processor'];
    $nama_processor = $_POST['nama_processor'];
    $jumlah = $_POST['jumlah'];
    $perusahaan = $_POST['perusahaan'];

    if (empty($id_processor)) {
        $_SESSION['data'] = "tidak ditemukan! tolong pilih data sesuai dengan datalist yang sudah ada!";
    } else {

        $sql_update_processor = "UPDATE processor SET stok = stok + '$jumlah' WHERE id = '$id_processor'";

        if (mysqli_query($conn, $sql_update_processor)) {
            $sql_insert_barang = "INSERT INTO barang (id, tanggal, komponen, nama_komponen, jumlah, perusahaan, status) 
        VALUES ('$id', '$tanggal', 'Processor', '$nama_processor', '$jumlah', '$perusahaan', 'Masuk')";

            if (mysqli_query($conn, $sql_insert_barang)) {
                $_SESSION['data'] = "berhasil disimpan!";
                header("Location: ../barang");
                exit;
            } else {
                $_SESSION['data'] = "gagal disimpan!";
            }
        } else {
            $_SESSION['data'] = "gagal disimpan!";
        }
    }
}


if (isset($_POST['kurangProcessor'])) {
    $id = $_POST['id'];
    $id_processor = $_POST['id_processor'];
    $nama_processor = $_POST['nama_processor'];
    $jumlah = $_POST['jumlah'];
    $perusahaan = $_POST['perusahaan'];

    if (empty($id_processor)) {
        $_SESSION['data'] = "tidak ditemukan! tolong pilih data sesuai dengan datalist yang sudah ada!";
    } else {

        $sql_check_stok = "SELECT stok FROM processor WHERE id = '$id_processor'";
        $result = mysqli_query($conn, $sql_check_stok);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $stok_processor = $row['stok'];

            if ($jumlah <= $stok_processor) {
                $sql_update_processor = "UPDATE processor SET stok = stok - '$jumlah' WHERE id = '$id_processor'";
                $sql_insert_barang = "INSERT INTO barang (id, tanggal, komponen, nama_komponen, jumlah, perusahaan, status) 
            VALUES ('$id', '$tanggal', 'Processor', '$nama_processor', '$jumlah', '$perusahaan', 'Keluar')";

                if (mysqli_query($conn, $sql_update_processor) && mysqli_query($conn, $sql_insert_barang)) {
                    $_SESSION['data'] = "berhasil disimpan!";
                    header("Location: ../barang");
                    exit;
                } else {
                    $_SESSION['data'] = "gagal disimpan!";
                }
            } else {
                $_SESSION['data'] = "jumlah melebihi stok yang tersedia!";
            }
        }
    }
}


// RAM
if (isset($_POST['tambahRAM'])) {
    $id = $_POST['id'];
    $id_ram = $_POST['id_ram'];
    $nama_ram = $_POST['nama_ram'];
    $jumlah = $_POST['jumlah'];
    $perusahaan = $_POST['perusahaan'];

    if (empty($id_ram)) {
        $_SESSION['data'] = "tidak ditemukan! tolong pilih data sesuai dengan datalist yang sudah ada!";
    } else {

        $sql_update_ram = "UPDATE ram SET stok = stok + '$jumlah' WHERE id = '$id_ram'";

        if (mysqli_query($conn, $sql_update_ram)) {
            $sql_insert_barang = "INSERT INTO barang (id, tanggal, komponen, nama_komponen, jumlah, perusahaan, status) 
        VALUES ('$id', '$tanggal', 'RAM', '$nama_ram', '$jumlah', '$perusahaan', 'Masuk')";

            if (mysqli_query($conn, $sql_insert_barang)) {
                $_SESSION['data'] = "berhasil disimpan!";
                header("Location: ../barang");
                exit;
            } else {
                $_SESSION['data'] = "gagal disimpan!";
            }
        } else {
            $_SESSION['data'] = "gagal disimpan!";
        }
    }
}

if (isset($_POST['kurangRAM'])) {
    $id = $_POST['id'];
    $id_ram = $_POST['id_ram'];
    $nama_ram = $_POST['nama_ram'];
    $jumlah = $_POST['jumlah'];
    $perusahaan = $_POST['perusahaan'];

    if (empty($id_ram)) {
        $_SESSION['data'] = "tidak ditemukan! tolong pilih data sesuai dengan datalist yang sudah ada!";
    } else {

        $sql_check_stok = "SELECT stok FROM ram WHERE id = '$id_ram'";
        $result = mysqli_query($conn, $sql_check_stok);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $stok_ram = $row['stok'];

            if ($jumlah <= $stok_ram) {
                $sql_update_ram = "UPDATE ram SET stok = stok - '$jumlah' WHERE id = '$id_ram'";
                $sql_insert_barang = "INSERT INTO barang (id, tanggal, komponen, nama_komponen, jumlah, perusahaan, status) 
            VALUES ('$id', '$tanggal', 'RAM', '$nama_ram', '$jumlah', '$perusahaan', 'Keluar')";

                if (mysqli_query($conn, $sql_update_ram) && mysqli_query($conn, $sql_insert_barang)) {
                    $_SESSION['data'] = "berhasil disimpan!";
                    header("Location: ../barang");
                    exit;
                } else {
                    $_SESSION['data'] = "gagal disimpan!";
                }
            } else {
                $_SESSION['data'] = "jumlah melebihi stok yang tersedia!";
            }
        }
    }
}

// Storage
if (isset($_POST['tambahStorage'])) {
    $id = $_POST['id'];
    $id_storage = $_POST['id_storage'];
    $nama_storage = $_POST['nama_storage'];
    $jumlah = $_POST['jumlah'];
    $perusahaan = $_POST['perusahaan'];

    if (empty($id_storage)) {
        $_SESSION['data'] = "tidak ditemukan! tolong pilih data sesuai dengan datalist yang sudah ada!";
    } else {

        $sql_update_storage = "UPDATE storage SET stok = stok + '$jumlah' WHERE id = '$id_storage'";

        if (mysqli_query($conn, $sql_update_storage)) {
            $sql_insert_barang = "INSERT INTO barang (id, tanggal, komponen, nama_komponen, jumlah, perusahaan, status) 
        VALUES ('$id', '$tanggal', 'Storage', '$nama_storage', '$jumlah', '$perusahaan', 'Masuk')";

            if (mysqli_query($conn, $sql_insert_barang)) {
                $_SESSION['data'] = "berhasil disimpan!";
                header("Location: ../barang");
                exit;
            } else {
                $_SESSION['data'] = "gagal disimpan!";
            }
        } else {
            $_SESSION['data'] = "gagal disimpan!";
        }
    }
}

if (isset($_POST['kurangStorage'])) {
    $id = $_POST['id'];
    $id_storage = $_POST['id_storage'];
    $nama_storage = $_POST['nama_storage'];
    $jumlah = $_POST['jumlah'];
    $perusahaan = $_POST['perusahaan'];

    if (empty($id_storage)) {
        $_SESSION['data'] = "tidak ditemukan! tolong pilih data sesuai dengan datalist yang sudah ada!";
    } else {

        $sql_check_stok = "SELECT stok FROM storage WHERE id = '$id_storage'";
        $result = mysqli_query($conn, $sql_check_stok);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $stok_storage = $row['stok'];

            if ($jumlah <= $stok_storage) {
                $sql_update_storage = "UPDATE storage SET stok = stok - '$jumlah' WHERE id = '$id_storage'";
                $sql_insert_barang = "INSERT INTO barang (id, tanggal, komponen, nama_komponen, jumlah, perusahaan, status) 
            VALUES ('$id', '$tanggal', 'Storage', '$nama_storage', '$jumlah', '$perusahaan', 'Keluar')";

                if (mysqli_query($conn, $sql_update_storage) && mysqli_query($conn, $sql_insert_barang)) {
                    $_SESSION['data'] = "berhasil disimpan!";
                    header("Location: ../barang");
                    exit;
                } else {
                    $_SESSION['data'] = "gagal disimpan!";
                }
            } else {
                $_SESSION['data'] = "jumlah melebihi stok yang tersedia!";
            }
        }
    }
}

//Graphics Card
if (isset($_POST['tambahVga'])) {
    $id = $_POST['id'];
    $id_vga = $_POST['id_vga'];
    $nama_vga = $_POST['nama_vga'];
    $jumlah = $_POST['jumlah'];
    $perusahaan = $_POST['perusahaan'];

    if (empty($id_vga)) {
        $_SESSION['data'] = "tidak ditemukan! tolong pilih data sesuai dengan datalist yang sudah ada!";
    } else {

        $sql_update_vga = "UPDATE vga SET stok = stok + '$jumlah' WHERE id = '$id_vga'";

        if (mysqli_query($conn, $sql_update_vga)) {
            $sql_insert_barang = "INSERT INTO barang (id, tanggal, komponen, nama_komponen, jumlah, perusahaan, status) 
        VALUES ('$id', '$tanggal', 'Graphics Card', '$nama_vga', '$jumlah', '$perusahaan', 'Masuk')";

            if (mysqli_query($conn, $sql_insert_barang)) {
                $_SESSION['data'] = "berhasil disimpan!";
                header("Location: ../barang");
                exit;
            } else {
                $_SESSION['data'] = "gagal disimpan!";
            }
        } else {
            $_SESSION['data'] = "gagal disimpan!";
        }
    }
}

if (isset($_POST['kurangVga'])) {
    $id = $_POST['id'];
    $id_vga = $_POST['id_vga'];
    $nama_vga = $_POST['nama_vga'];
    $jumlah = $_POST['jumlah'];
    $perusahaan = $_POST['perusahaan'];

    if (empty($id_vga)) {
        $_SESSION['data'] = "tidak ditemukan! tolong pilih data sesuai dengan datalist yang sudah ada!";
    } else {

        $sql_check_stok = "SELECT stok FROM vga WHERE id = '$id_vga'";
        $result = mysqli_query($conn, $sql_check_stok);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $stok_vga = $row['stok'];

            if ($jumlah <= $stok_vga) {
                $sql_update_vga = "UPDATE vga SET stok = stok - '$jumlah' WHERE id = '$id_vga'";
                $sql_insert_barang = "INSERT INTO barang (id, tanggal, komponen, nama_komponen, jumlah, perusahaan, status) 
            VALUES ('$id', '$tanggal', 'Graphics Card
            ', '$nama_vga', '$jumlah', '$perusahaan', 'Keluar')";

                if (mysqli_query($conn, $sql_update_vga) && mysqli_query($conn, $sql_insert_barang)) {
                    $_SESSION['data'] = "berhasil disimpan!";
                    header("Location: ../barang");
                    exit;
                } else {
                    $_SESSION['data'] = "gagal disimpan!";
                }
            } else {
                $_SESSION['data'] = "jumlah melebihi stok yang tersedia!";
            }
        }
    }
}

<?php

$tanggal = date("j F Y");

// Processor
if (isset($_POST['tambahProcessor'])) {
    $id = $_POST['id'];
    $id_processor = $_POST['id_processor'];
    $nama_processor = $_POST['nama_processor'];
    $jumlah = $_POST['jumlah'];

    $sql_update_processor = "UPDATE processor SET stok = stok + '$jumlah' WHERE id = '$id_processor'";

    if (mysqli_query($conn, $sql_update_processor)) {
        $sql_insert_barang = "INSERT INTO barang (id, tanggal, komponen, nama_komponen, jumlah) 
        VALUES ('$id', '$tanggal', 'Processor', '$nama_processor', ' + $jumlah ')";

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


if (isset($_POST['kurangProcessor'])) {
    $id = $_POST['id'];
    $id_processor = $_POST['id_processor'];
    $nama_processor = $_POST['nama_processor'];
    $jumlah = $_POST['jumlah'];

    $sql_update_processor = "UPDATE processor SET stok = stok - '$jumlah' WHERE id = '$id_processor'";

    if (mysqli_query($conn, $sql_update_processor)) {
        $sql_insert_barang = "INSERT INTO barang (id, tanggal, komponen, nama_komponen, jumlah) 
        VALUES ('$id', '$tanggal', 'Processor', '$nama_processor', ' - $jumlah ')";

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

// RAM
if (isset($_POST['tambahRAM'])) {
    $id = $_POST['id'];
    $id_ram = $_POST['id_ram'];
    $nama_ram = $_POST['nama_ram'];
    $jumlah = $_POST['jumlah'];

    $sql_update_ram = "UPDATE ram SET stok = stok + '$jumlah' WHERE id = '$id_ram'";

    if (mysqli_query($conn, $sql_update_ram)) {
        $sql_insert_barang = "INSERT INTO barang (id, tanggal, komponen, nama_komponen, jumlah) 
        VALUES ('$id', '$tanggal', 'RAM', '$nama_ram', ' + $jumlah ')";

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

if (isset($_POST['kurangRAM'])) {
    $id = $_POST['id'];
    $id_ram = $_POST['id_ram'];
    $nama_ram = $_POST['nama_ram'];
    $jumlah = $_POST['jumlah'];

    $sql_update_ram = "UPDATE ram SET stok = stok - '$jumlah' WHERE id = '$id_ram'";

    if (mysqli_query($conn, $sql_update_ram)) {
        $sql_insert_barang = "INSERT INTO barang (id, tanggal, komponen, nama_komponen, jumlah) 
        VALUES ('$id', '$tanggal', 'RAM', '$nama_ram', ' - $jumlah ')";

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

// Storage
if (isset($_POST['tambahStorage'])) {
    $id = $_POST['id'];
    $id_storage = $_POST['id_storage'];
    $nama_storage = $_POST['nama_storage'];
    $jumlah = $_POST['jumlah'];

    $sql_update_storage = "UPDATE storage SET stok = stok + '$jumlah' WHERE id = '$id_storage'";

    if (mysqli_query($conn, $sql_update_storage)) {
        $sql_insert_barang = "INSERT INTO barang (id, tanggal, komponen, nama_komponen, jumlah) 
        VALUES ('$id', '$tanggal', 'Storage', '$nama_storage', ' + $jumlah ')";

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

if (isset($_POST['kurangStorage'])) {
    $id = $_POST['id'];
    $id_storage = $_POST['id_storage'];
    $nama_storage = $_POST['nama_storage'];
    $jumlah = $_POST['jumlah'];

    $sql_update_storage = "UPDATE storage SET stok = stok - '$jumlah' WHERE id = '$id_storage'";

    if (mysqli_query($conn, $sql_update_storage)) {
        $sql_insert_barang = "INSERT INTO barang (id, tanggal, komponen, nama_komponen, jumlah) 
        VALUES ('$id', '$tanggal', 'Storage', '$nama_storage', ' - $jumlah ')";

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

//Graphics Card
if (isset($_POST['tambahVga'])) {
    $id = $_POST['id'];
    $id_vga = $_POST['id_vga'];
    $nama_vga = $_POST['nama_vga'];
    $jumlah = $_POST['jumlah'];

    $sql_update_vga = "UPDATE vga SET stok = stok + '$jumlah' WHERE id = '$id_vga'";

    if (mysqli_query($conn, $sql_update_vga)) {
        $sql_insert_barang = "INSERT INTO barang (id, tanggal, komponen, nama_komponen, jumlah) 
        VALUES ('$id', '$tanggal', 'Graphics Card', '$nama_vga', ' + $jumlah ')";

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

if (isset($_POST['kurangVga'])) {
    $id = $_POST['id'];
    $id_vga = $_POST['id_vga'];
    $nama_vga = $_POST['nama_vga'];
    $jumlah = $_POST['jumlah'];

    $sql_update_vga = "UPDATE vga SET stok = stok - '$jumlah' WHERE id = '$id_vga'";

    if (mysqli_query($conn, $sql_update_vga)) {
        $sql_insert_barang = "INSERT INTO barang (id, tanggal, komponen, nama_komponen, jumlah) 
        VALUES ('$id', '$tanggal', 'Graphics Card', '$nama_vga', ' - $jumlah ')";

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

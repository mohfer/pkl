<?php

session_start();

include "../src/config/connect.php";
include "../src/function/antiSqlInjection.php";
$id = $_GET['id'];

$sql_check_referenced = "SELECT id_karyawan FROM komputer WHERE id_karyawan = '$id'";
$result = mysqli_query($conn, $sql_check_referenced);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['data'] = 'tidak dapat dihapus karena data masih digunakan di halaman komputer!';
    header("Location: ../karyawan");
} else {
    $sql = "DELETE FROM karyawan WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['data'] = 'berhasil dihapus!';
        header("Location: ../karyawan");
    } else {
        $_SESSION['data'] = 'gagal dihapus!';
    }
}

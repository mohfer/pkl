<?php

session_start();

include "../src/config/connect.php";
include "../src/function/antiSqlInjection.php";

if (!isset($_SESSION['id_users'])) {
    header("Location: ../../pages/me/dashboard");
}



$id = $_GET['id'];

$sql_check_referenced = "SELECT id_storage FROM komputer WHERE id_storage = '$id'";
$result = mysqli_query($conn, $sql_check_referenced);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['data'] = 'tidak dapat dihapus karena data masih digunakan di halaman lain!';
    header("Location: ../storage");
} else {
    $sql = "DELETE FROM storage WHERE id = '$id'";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['data'] = 'berhasil dihapus!';
        header("Location: ../storage");
    } else {
        $_SESSION['data'] = 'gagal dihapus!';
    }
}

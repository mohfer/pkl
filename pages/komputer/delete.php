<?php

session_start();

include "../src/config/connect.php";
include "../src/function/antiSqlInjection.php";

if (!isset($_SESSION['id_users'])) {
    header("Location: ../../pages/me/dashboard");
}



$id = $_GET['id'];

$sql = "DELETE FROM komputer WHERE id = '$id'";
if (mysqli_query($conn, $sql)) {
    $_SESSION['data'] = 'berhasil dihapus!';
    header("Location: ../komputer");
} else {
    $_SESSION['data'] = 'gagal dihapus!';
}

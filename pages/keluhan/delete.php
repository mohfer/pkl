<?php

session_start();

include "../src/config/connect.php";
include "../src/function/antiSqlInjection.php";
$id = $_GET['id'];

$sql = "DELETE FROM keluhan WHERE id = '$id'";
if (mysqli_query($conn, $sql)) {
    $_SESSION['data'] = 'berhasil dihapus!';
    header("Location: ../keluhan");
} else {
    $_SESSION['data'] = 'gagal dihapus!';
}

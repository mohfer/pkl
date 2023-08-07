<?php

session_start();

include "../src/config/connect.php";
$id = $_GET['id'];

$sql = "DELETE FROM storage WHERE id = '$id'";
if (mysqli_query($conn, $sql)) {
    $_SESSION['data'] = 'berhasil dihapus!';
    header("Location: ../storage");
} else {
    $_SESSION['data'] = 'gagal dihapus!';
}

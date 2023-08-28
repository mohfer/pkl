<?php

$id = $_SESSION['id_karyawan'];

$query_ks0 = "SELECT COUNT(*) AS status FROM keluhan WHERE status = '0' AND id_karyawan = '$id'";
$ks0_result = mysqli_query($conn, $query_ks0);

if (mysqli_num_rows($ks0_result) > 0) {
    $row = mysqli_fetch_assoc($ks0_result);
    $ks0_result = $row["status"];
}

// Keluhan Status Proses
$query_ksp = "SELECT COUNT(*) AS status FROM keluhan WHERE status = 'Proses' AND id_karyawan = '$id'";
$ksp_result = mysqli_query($conn, $query_ksp);

if (mysqli_num_rows($ksp_result) > 0) {
    $row = mysqli_fetch_assoc($ksp_result);
    $ksp_result = $row["status"];
}

// Keluhan Status Selesai
$query_kss = "SELECT COUNT(*) AS status FROM keluhan WHERE status = 'Selesai' AND id_karyawan = '$id'";
$kss_result = mysqli_query($conn, $query_kss);

if (mysqli_num_rows($kss_result) > 0) {
    $row = mysqli_fetch_assoc($kss_result);
    $kss_result = $row["status"];
}

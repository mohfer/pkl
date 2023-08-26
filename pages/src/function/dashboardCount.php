<?php

// Status Masuk
$query_tmasuk = "SELECT COUNT(*) AS status FROM barang WHERE status = 'Masuk';";
$tmasuk_result = mysqli_query($conn, $query_tmasuk);

if (mysqli_num_rows($tmasuk_result) > 0) {
    $row = mysqli_fetch_assoc($tmasuk_result);
    $tmasuk_result = $row["status"];
}

// Status Keluar
$query_tkeluar = "SELECT COUNT(*) AS status FROM barang WHERE status = 'Keluar';";
$tkeluar_result = mysqli_query($conn, $query_tkeluar);

if (mysqli_num_rows($tkeluar_result) > 0) {
    $row = mysqli_fetch_assoc($tkeluar_result);
    $tkeluar_result = $row["status"];
}

// Keluhan Status 0
$query_ks0 = "SELECT COUNT(*) AS status FROM keluhan WHERE status = '0';";
$ks0_result = mysqli_query($conn, $query_ks0);

if (mysqli_num_rows($ks0_result) > 0) {
    $row = mysqli_fetch_assoc($ks0_result);
    $ks0_result = $row["status"];
}

// Keluhan Status Proses
$query_ksp = "SELECT COUNT(*) AS status FROM keluhan WHERE status = 'Proses';";
$ksp_result = mysqli_query($conn, $query_ksp);

if (mysqli_num_rows($ksp_result) > 0) {
    $row = mysqli_fetch_assoc($ksp_result);
    $ksp_result = $row["status"];
}

// Keluhan Status Selesai
$query_kss = "SELECT COUNT(*) AS status FROM keluhan WHERE status = 'Selesai';";
$kss_result = mysqli_query($conn, $query_kss);

if (mysqli_num_rows($kss_result) > 0) {
    $row = mysqli_fetch_assoc($kss_result);
    $kss_result = $row["status"];
}

// Jumlah Processor
$query_processor = "SELECT COUNT(*) AS processor FROM processor";
$processor_result = mysqli_query($conn, $query_processor);

if (mysqli_num_rows($processor_result) > 0) {
    $row = mysqli_fetch_assoc($processor_result);
    $processor_result = $row["processor"];
}

// Jumlah RAM
$query_ram = "SELECT COUNT(*) AS ram FROM ram";
$ram_result = mysqli_query($conn, $query_ram);

if (mysqli_num_rows($ram_result) > 0) {
    $row = mysqli_fetch_assoc($ram_result);
    $ram_result = $row["ram"];
}

// Jumlah Storage
$query_storage = "SELECT COUNT(*) AS storage FROM storage";
$storage_result = mysqli_query($conn, $query_storage);

if (mysqli_num_rows($storage_result) > 0) {
    $row = mysqli_fetch_assoc($storage_result);
    $storage_result = $row["storage"];
}

// Jumlah Graphics Card
$query_vga = "SELECT COUNT(*) AS vga FROM vga";
$vga_result = mysqli_query($conn, $query_vga);

if (mysqli_num_rows($vga_result) > 0) {
    $row = mysqli_fetch_assoc($vga_result);
    $vga_result = $row["vga"];
}

// Jumlah Karyawan
$query_karyawan = "SELECT COUNT(*) AS karyawan FROM karyawan";
$karyawan_result = mysqli_query($conn, $query_karyawan);

if (mysqli_num_rows($karyawan_result) > 0) {
    $row = mysqli_fetch_assoc($karyawan_result);
    $karyawan_result = $row["karyawan"];
}

// Jumlah Komputer
$query_komputer = "SELECT COUNT(*) AS komputer FROM komputer";
$komputer_result = mysqli_query($conn, $query_komputer);

if (mysqli_num_rows($komputer_result) > 0) {
    $row = mysqli_fetch_assoc($komputer_result);
    $komputer_result = $row["komputer"];
}

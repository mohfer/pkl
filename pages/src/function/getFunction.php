<?php

function getKaryawan($conn, $karyawanId)
{
    $query = "SELECT nama FROM karyawan WHERE id = $karyawanId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['nama'];
}
function getProcessor($conn, $processorId)
{
    $query = "SELECT nama FROM processor WHERE id = $processorId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['nama'];
}
function getRam($conn, $ramId)
{
    $query = "SELECT kapasitas, tipe_memori FROM ram WHERE id = $ramId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $info = $row['kapasitas'] . " GB " . $row['tipe_memori'];
    return $info;
}
function getStorage($conn, $storageId)
{
    $query = "SELECT tipe, kapasitas FROM storage WHERE id = $storageId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $info = $row['tipe'] . " " . $row['kapasitas'] . " GB";
    return $info;
}
function getVga($conn, $vgaId)
{
    $query = "SELECT brand, nama, vram FROM vga WHERE id = $vgaId";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    $info = $row['brand'] . " " . $row['nama'] . " " . $row['vram'] . " GB ";
    return $info;
}

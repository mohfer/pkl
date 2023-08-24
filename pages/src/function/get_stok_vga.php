<?php

include "../config/connect.php";

if (isset($_POST['vga_id'])) {
    $vgaId = $_POST['vga_id'];

    $query = "SELECT stok FROM vga WHERE id = '$vgaId'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        echo $row['stok'];
    } else {
        echo "N/A";
    }

    mysqli_close($conn);
}

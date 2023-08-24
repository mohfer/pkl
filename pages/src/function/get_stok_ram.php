<?php

include "../config/connect.php";

if (isset($_POST['ram_id'])) {
    $ramId = $_POST['ram_id'];

    $query = "SELECT stok FROM ram WHERE id = '$ramId'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        echo $row['stok'];
    } else {
        echo "N/A";
    }

    mysqli_close($conn);
}

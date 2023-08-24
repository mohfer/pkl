<?php

include "../config/connect.php";

if (isset($_POST['storage_id'])) {
    $storageId = $_POST['storage_id'];

    $query = "SELECT stok FROM storage WHERE id = '$storageId'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        echo $row['stok'];
    } else {
        echo "N/A";
    }

    mysqli_close($conn);
}

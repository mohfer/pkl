<?php

include "../config/connect.php";

if (isset($_POST['processor_id'])) {
    $processorId = $_POST['processor_id'];

    $query = "SELECT stok FROM processor WHERE id = '$processorId'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        echo $row['stok'];
    } else {
        echo "N/A";
    }

    mysqli_close($conn);
}

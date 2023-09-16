<?php 

if (isset($_POST['filter'])) {
    $mulai = htmlspecialchars($_POST['startdate']);
    $selesai = htmlspecialchars($_POST['enddate']);

    if ($mulai == NULL && $selesai == NULL) {
        $query_barang = "SELECT * FROM barang ORDER BY tanggal DESC";
        $result_barang = mysqli_query($conn, $query_barang);
    } else if ($mulai == NULL) {
        $_SESSION['data'] = "start date wajib di isi!";
    } else if ($selesai == NULL) {
        $_SESSION['data'] = "end date wajib di isi!";
    } else {
        $query_barang = "SELECT * FROM barang WHERE tanggal BETWEEN '$mulai' AND DATE_ADD('$selesai',INTERVAL 1 DAY) ORDER BY tanggal DESC";
        $result_barang = mysqli_query($conn, $query_barang);
    }
}

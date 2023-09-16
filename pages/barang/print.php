<?php
include "../src/config/connect.php";
require_once __DIR__ . '../../../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['format' => 'A4-L']);
ob_start();

if (isset($_POST['print'])) {
    $mulai = $_POST['startdate'];
    $selesai = $_POST['enddate'];

    if ($mulai == NULL && $selesai == NULL) {
        header("Location: ./");
    } else if ($mulai == NULL) {
        header("Location: ./");
    } else if ($selesai == NULL) {
        header("Location: ./");
    } else {
        $row = mysqli_query($conn, "SELECT * FROM barang WHERE tanggal BETWEEN '$mulai' AND DATE_ADD('$selesai',INTERVAL 1 DAY) ORDER BY tanggal ASC");
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/table.css">
    <title>Inventory Barang | Print</title>
</head>

<body>
    <h1 class="header">History Barang</h1>
    <p class="header">Periode <?= date('d F Y', strtotime($mulai)) ?> - <?= date('d F Y', strtotime($selesai)) ?></p>
    <div class="table">
        <table border="1" cellspacing="0">
            <tr>
                <td style="font-weight: bold; text-align: center;">No</td>
                <td style="font-weight: bold;">Tanggal</td>
                <td style="font-weight: bold;">Komponen</td>
                <td style="font-weight: bold;">Nama Komponen</td>
                <td style="font-weight: bold; text-align: center;">Jumlah</td>
                <td style="font-weight: bold;">Perusahaan</td>
                <td style="font-weight: bold; text-align: center;">Status</td>
            </tr>
            <?= $no = 1 ?>
            <?php while ($data = mysqli_fetch_array($row)) : ?>
                <tr>
                    <td style="text-align: center;"><?= $no++ ?></td>
                    <td><?= date('d F Y', strtotime($data["tanggal"])) ?></td>
                    <td><?= $data['komponen'] ?></td>
                    <td><?= $data['nama_komponen'] ?></td>
                    <td style="text-align: center;"><?= $data['jumlah'] ?></td>
                    <td><?= $data['perusahaan'] ?></td>
                    <td style="text-align: center;"><?= $data['status'] ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <div class="signed">
        <br>
        <p>Serang, <?= date("d F Y") ?></p>
        <br>
        <br>
        <br>
        <h4>Mohamad Ferdiansyah</h4>
    </div>

</body>

</html>


<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML($html);
$pdfData = $mpdf->Output('history_report.pdf', \Mpdf\Output\Destination::STRING_RETURN);
header('Content-Type: application/pdf');
echo $pdfData;
?>
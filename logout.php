<?php

session_start();
session_unset();
session_destroy();
$_SESSION['info'] = 'Logout berhasil!';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <?php include 'pages/src/library/bootstrap.php' ?>
    <?php include 'pages/src/library/sweetalert.php' ?>

    <title>Inventory Barang | Logout</title>
</head>

<body>
    <!-- Swal -->
    <div class="info-login" data-infologin="<?php if (isset($_SESSION['info'])) {
                                                echo $_SESSION['info'];
                                            }
                                            unset($_SESSION['info']) ?>">
    </div>
    <!-- Swal -->
    <script src="pages/src/js/sweetalert.js"></script>

</body>

</html>
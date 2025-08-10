<?php

session_start();


if (!isset($_SESSION['id_karyawan'])) {
    header("Location: ../../../pages/dashboard");
}

include "../../src/config/connect.php";
include "../../src/function/antiSqlInjection.php";

if (isset($_POST['reset'])) {
    $oldPassword = md5($_POST['oldPassword']);
    $username = $_SESSION['username_karyawan'];

    $show = mysqli_query($conn, "SELECT * FROM karyawan WHERE username = '$username' AND password = '$oldPassword'");
    $data = mysqli_fetch_array($show);

    if ($data) {
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        if ($newPassword == $confirmPassword) {
            $pass_ok = md5($confirmPassword);
            $ubah = mysqli_query($conn, "UPDATE karyawan SET password = '$pass_ok' WHERE id = '$_SESSION[id_karyawan]'");

            if ($ubah) {
                $_SESSION['data'] = "password berhasil dirubah!";
            }
        } else {
            $_SESSION['data'] = "password baru anda tidak sesuai dengan konfirmasi password!";
        }
    } else {
        $_SESSION['data'] = "password lama tidak sesuai!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../../src/css/global.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <?php include '../../src/library/bootstrap.php' ?>
    <?php include '../../src/library/sweetalert.php' ?>
    <title>Inventory Barang | Password</title>
    <!-- Umami Analytics -->
    <script defer src="https://umami.mohfer.my.id/script.js" data-website-id="2b6ba940-9fe6-4f04-848b-3035b9666d8a"></script>
    <!-- End Umami Analytics -->
</head>

<body>
    <!-- Swal -->
    <div class="info-data" data-infodata="<?php if (isset($_SESSION['data'])) {
                                                echo $_SESSION['data'];
                                            }
                                            unset($_SESSION['data']) ?>">
    </div>
    <!-- Swal -->
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="col-md-2 sidebar text-light">
                <a href="../../../">
                    <div class="text-center my-3 mb-5">
                        <h4>Inventory Barang</h4>
                    </div>
                </a>
                <div class="mx-4">
                    <h5>Menu</h5>
                    <a href="../dashboard/">
                        <p class="opacity">Dashboard</p>
                    </a>
                </div>
                <div class="mx-4">
                    <h5>Transaksi</h5>
                    <a href="../keluhan/">
                        <p class="opacity">Keluhan</p>
                    </a>
                </div>
                <div class="mx-4">
                    <h5>Aksi</h5>
                    <a href="../password/">
                        <p class="opacity-100 aktif rounded-pill">Password</p>
                    </a>
                    <a href="../../../logout.php">
                        <p class="opacity">Logout</p>
                    </a>
                </div>
            </div>
            <div class="col-md-10 content">
                <div class="wrapper shadow p-3 my-3 left">
                    <h1>Password | Reset</h1>
                    <div class="row my-3">
                        <?php if (isset($message)) : ?>
                            <p><?php echo $message; ?></p>
                        <?php endif; ?>
                        <form action="" method="POST">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="oldPassword">Password Lama</label>
                                    <input type="password" id="oldPassword" class="form-control" name="oldPassword" required>
                                </div>
                                <div class="mb-3">
                                    <label for="newPassword">Password Baru</label>
                                    <input type="password" id="newPassword" class="form-control" name="newPassword">
                                </div>
                                <div class="mb-3">
                                    <label for="confirmPassword">Konfirmasi Password</label>
                                    <input type="password" id="confirmPassword" class="form-control" name="confirmPassword" required>
                                </div>
                                <button class="btn ungu my-3" name="reset">Reset</button>
                            </div>
                            <div class="col-md-6">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../../src/js/sweetalert.js"></script>
</body>

</html>
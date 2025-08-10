<?php

session_start();

if (isset($_SESSION['id_users'])) {
    $_SESSION['info'] = 'Berhasil login sebagai Admin!';
}

if (isset($_SESSION['id_karyawan'])) {
    $_SESSION['info'] = 'Berhasil login sebagai Karyawan!';
}

include "pages/src/config/connect.php";
include "pages/src/function/antiSqlInjection.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql_users = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result_users = mysqli_query($conn, $sql_users);

    $sql_karyawan = "SELECT * FROM karyawan WHERE username = '$username' AND password = '$password'";
    $result_karyawan = mysqli_query($conn, $sql_karyawan);

    if ($result_users->num_rows > 0) {
        $row = mysqli_fetch_assoc($result_users);
        $_SESSION['id_users'] = $row['id'];
        $_SESSION['username_users'] = $row['username'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['info'] = 'Berhasil login sebagai Admin!';
    } else if ($result_karyawan->num_rows > 0) {
        $row = mysqli_fetch_assoc($result_karyawan);
        $_SESSION['id_karyawan'] = $row['id'];
        $_SESSION['username_karyawan'] = $row['username'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['info'] = 'Berhasil login sebagai Karyawan!';
    } else if ($username == "" || $password == "") {
        $_SESSION['info'] = 'Kosong';
    } else {
        $_SESSION['info'] = 'Gagal';
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pages/src/css/login.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <?php include 'pages/src/library/bootstrap.php' ?>
    <?php include 'pages/src/library/sweetalert.php' ?>
    <title>Inventory Barang | Login</title>
    <!-- Umami Analytics -->
    <script defer src="https://umami.mohfer.my.id/script.js" data-website-id="2b6ba940-9fe6-4f04-848b-3035b9666d8a"></script>
    <!-- End Umami Analytics -->
</head>

<body>
    <!-- Swal -->
    <div class="info-login" data-infologin="<?php if (isset($_SESSION['info'])) {
                                                echo $_SESSION['info'];
                                            }
                                            unset($_SESSION['info']) ?>">
    </div>
    <!-- Swal -->

    <div class="wrapper d-flex justify-content-center align-items-center vh-100">
        <div class="p-5 border rounded-5 shadow-lg login mx-5" style="width: 400px;">
            <div class="d-flex justify-content-center">
                <a href="./"><img src="pages/src/image/assets/logo.png" class="img-fluid" alt=""></a>
            </div>
            <h2 class="mb-3 fw-bold">Login.</h2>
            <form action="" method="POST">
                <input name="username" type="text" class="form-control py-3 mb-3 rounded-pill" placeholder="Username">
                <input name="password" type="password" class="form-control py-3 mb-3 rounded-pill" placeholder="Password">
                <button name="submit" class="btn btn-login w-100 py-3 rounded-pill text-light">Sign in</button>
            </form>
        </div>
    </div>
    <script src="pages/src/js/sweetalert.js"></script>
</body>

</html>
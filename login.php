<?php

session_start();
// if (isset($_SESSION['username'])) {
//     header("Location: pages/dashboard/");
// }

include "pages/src/config/connect.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['info'] = 'Berhasil';
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
        <div class="login w-25 p-5 rounded-5 shadow-lg bg-light">
            <div class="d-flex justify-content-center">
                <img src="pages/src/image/logo.png" class="w-75" alt="">
            </div>
            <h2 class="mb-3 fw-bold">Login.</h2>
            <form action="" method="POST">
                <div class="row">
                    <input name="username" type="text" class="form-control py-3 mb-3 rounded-pill" placeholder="Username">
                </div>
                <div class="row">
                    <input name="password" type="password" class="form-control py-3 mb-3 rounded-pill" placeholder="Password">
                </div>
                <div class="row">
                    <button name="submit" class="btn btn-login w-100 py-3 rounded-pill text-light">Sign in</button>
                </div>
            </form>
        </div>
    </div>
    <script src="pages/src/js/sweetalert.js"></script>
</body>

</html>
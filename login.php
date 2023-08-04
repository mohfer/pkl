<?php

include "src/config/connect.php";

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: pages/dashboard");
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="pages/css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <title>Inventory Barang | Login</title>
</head>

<body>
    <div class="wrapper d-flex justify-content-center align-items-center vh-100">
        <div class="login w-25 p-5 rounded-5 shadow-lg bg-light">
            <div class="d-flex justify-content-center">
                <img src="src/image/logo.png" class="w-75" alt="">
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
</body>

</html>
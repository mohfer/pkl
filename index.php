<?php
include "pages/src/config/connect.php";
include "pages/src/function/dashboardCount.php";

$query_barang = "SELECT * FROM barang ORDER BY tanggal DESC LIMIT 5";
$result_barang = mysqli_query($conn, $query_barang);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="pages/src/css/index.css">

    <title>Inventory Barang</title>
    <?php include "pages/src/library/bootstrap.php" ?>
</head>

<body>
    <nav class="navbar fixed-top navbar-expand-lg ungu shadow-lg py-3">
        <div class="container">
            <a class="navbar-brand" data-aos="fade-down" href="./">Inventory Barang</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item" data-aos="fade-down" data-aos-delay="200">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item" data-aos="fade-down" data-aos-delay="400">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item" data-aos="fade-down" data-aos-delay="600">
                        <a class="nav-link" href="#barang">Barang</a>
                    </li>
                    <li class="nav-item" data-aos="fade-down" data-aos-delay="800">
                        <a class="nav-link" href="#table-barang">History</a>
                    </li>
                    <li class="nav-item" data-aos="fade-down" data-aos-delay="1000">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section id="hero" class="container-fluid ungu text-light mb-5 mt-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6">
                <h1 class="fw-bold" data-aos="fade-down">Selamat Datang di Aplikasi Inventory Barang dan <br>Keluhan Karyawan Berbasis Web</h1>
                <div data-aos="fade-down" data-aos-delay="200">
                    <a href="login.php"><button class="btn-login rounded-3 px-5">Login</button></a>
                </div>
            </div>
            <div class="col-md-4" data-aos="fade-down" data-aos-delay="400">
                <img src="pages/src/image/assets/illustration.png" class="img-fluid" alt="">
            </div>
        </div>
    </section>
    <section id="about" class="container my-5">
        <div class="row container py-5 my-5 d-flex justify-content-center align-items-center">
            <div class="col" data-aos="fade-down">
                <img src="pages/src/image/assets/picture-about.png" class="img-fluid shadow-lg rounded-3" alt="">
            </div>
            <div class="col">
                <h1 class="fw-bold title mb-3" data-aos="fade-down" data-aos-delay="200">Inventory Barang?</h1>
                <p class="text-secondary fs-5" data-aos="fade-down" data-aos-delay="400">Aplikasi inventory merupakan jenis aplikasi yang berkaitan dengan persediaan barang-barang di gudang. Aplikasi inventory biasanya digunakan oleh suatu perusahaan yang bergerak dalam bisnis agar mampu mengelola barang supaya persediaannya dapat teratur dengan baik.</p>
            </div>
        </div>
    </section>
    <section id="barang" class="container-fluid">
        <div class="container my-5 py-5">
            <div class="text-center my-5" data-aos="fade-down">
                <h1 class="fw-bold title">Apa Yang Kami Punya?</h1>
            </div>
            <div class="row gap-5 my-5 py-5">
                <div class="col col-barang rounded-3 shadow-lg" data-aos="fade-down" data-aos-delay="200">
                    <h2 class="text-center my-3 line-bottom mx-3 py-3">Processor</h2>
                    <p class="text-secondary p-3">Processor atau unit pemrosesan adalah komponen listrik yang melakukan operasi pada sumber data eksternal, biasanya memori atau aliran data lainnya. Ini biasanya berbentuk mikroprosesor, yang dapat diimplementasikan pada satu chip sirkuit terintegrasi logam-oksida-semikonduktor.</p>
                    <h2 class="text-center my-3 line-top mx-3 py-3 ">Jumlah : <?= $processor_result ?></h2>
                </div>
                <div class="col col-barang rounded-3 shadow-lg" data-aos="fade-down" data-aos-delay="400">
                    <h2 class="text-center my-3 line-bottom mx-3 py-3">RAM</h2>
                    <p class="text-secondary p-3">Random Access Memory adalah jenis penyimpanan komputer yang isinya dapat diakses dalam waktu tetap, tidak memperdulikan letak datanya dalam memori.</p>
                    <h2 class="text-center my-3 line-top mx-3 py-3">Jumlah : <?= $ram_result ?></h2>
                </div>
                <div class="col col-barang rounded-3 shadow-lg" data-aos="fade-down" data-aos-delay="600">
                    <h2 class="text-center my-3 line-bottom mx-3 py-3">Storage</h2>
                    <p class="text-secondary p-3">Penyimpanan data komputer atau memori komputer merujuk pada komponen komputer, perangkat komputer, atau media perekaman yang mempertahankan data digital yang digunakan untuk beberapa jangka waktu. Penyimpanan data komputer menyediakan salah satu dari tiga fungsi inti komputer modern, yakni mempertahankan informasi.</p>
                    <h2 class="text-center my-3 line-top mx-3 py-3">Jumlah : <?= $storage_result ?></h2>
                </div>
                <div class="col col-barang rounded-3 shadow-lg" data-aos="fade-down" data-aos-delay="800">
                    <h2 class="text-center my-3 line-bottom mx-3 py-3">Graphics Card</h2>
                    <p class="text-secondary p-3">Graphics Card, atau kartu video adalah kartu tambahan yang berfungsi untuk menciptakan dan menampilkan tampilan-tampilan di layar. Seringkali kartu grafis dimaknai sebagai kartu grafis khusus yang terpisah, untuk membedakannya dengan kartu grafis yang sudah tertempel ke papan induk bersama CPU.</p>
                    <h2 class="text-center my-3 line-top mx-3 py-3">Jumlah : <?= $vga_result ?></h2>
                </div>
            </div>
        </div>
    </section>
    <section id="table-barang" class="container-fluid">
        <div class="container my-5 py-5">
            <div class="text-center my-5" data-aos="fade-down">
                <h1 class="fw-bold title">History Barang</h1>
            </div>
            <div class="p-3 shadow-lg rounded-3" data-aos="fade-down" data-aos-delay="200">
                <div class="table-responsive">
                    <table id="myTable" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Komponen</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Dari/Untuk</th>
                                <th class="text-center" scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($result = mysqli_fetch_array($result_barang)) : ?>
                                <tr>
                                    <td><?= $result["tanggal"] ?></td>
                                    <td><?= $result["komponen"] ?></td>
                                    <td><?= $result["nama_komponen"] ?></td>
                                    <td><?= $result['jumlah'] ?></td>
                                    <td><?= $result['perusahaan'] ?></td>
                                    <td class="<?php echo ($result['status'] === 'Masuk') ? 'bg-success text-light text-center' : 'bg-danger text-light text-center'; ?>">
                                        <?php echo $result['status']; ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <footer class="text-center text-white ungu">
        <div class="container">
            <section class="mt-5">
                <div class="row text-center d-flex justify-content-center pt-5">
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold" data-aos="fade-down">
                            <a href="#" class="text-white">Home</a>
                        </h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold" data-aos="fade-down" data-aos-delay="200">
                            <a href="#about" class="text-white">About</a>
                        </h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold" data-aos="fade-down" data-aos-delay="400">
                            <a href="#barang" class="text-white">Barang</a>
                        </h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold" data-aos="fade-down" data-aos-delay="600">
                            <a href="#table-barang" class="text-white">History</a>
                        </h6>
                    </div>
                    <div class="col-md-2">
                        <h6 class="text-uppercase font-weight-bold" data-aos="fade-down" data-aos-delay="800">
                            <a href="login.php" class="text-white">Login</a>
                        </h6>
                    </div>
                </div>
            </section>
            <hr class="my-5" />
            <section class="mb-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8" data-aos="fade-down" data-aos-delay="1000">
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt
                            distinctio earum repellat quaerat voluptatibus placeat nam,
                            commodi optio pariatur est quia magnam eum harum corrupti
                            dicta, aliquam sequi voluptate quas.
                        </p>
                    </div>
                </div>
            </section>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2023 Copyright
            <a class="text-white" href="https://github.com/Delendins" target="_blank">Delendins</a>
        </div>
    </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="pages/src/js/aos.js"></script>
</body>

</html>
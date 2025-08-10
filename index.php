<?php
include "pages/src/config/connect.php";

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
    <?php include "pages/src/library/bootstrap.php" ?>
    <title>Inventory Barang</title>
    <!-- Umami Analytics -->
    <script defer src="https://umami.mohfer.my.id/script.js" data-website-id="2b6ba940-9fe6-4f04-848b-3035b9666d8a"></script>
    <!-- End Umami Analytics -->
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
    <section id="hero" class="container-fluid ungu text-light d-flex justify-content-center align-items-center vh-100">
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
        <div class="row container py-5 my-5 d-flex justify-content-center align-items-center ">
            <div class="col" data-aos="fade-down">
                <img src="pages/src/image/assets/picture-about.png" class="img-fluid shadow-lg rounded-3" alt="">
            </div>
            <div class="col">
                <h1 class="fw-bold title" data-aos="fade-down" data-aos-delay="200">Inventory Barang?</h1>
                <span class="line" data-aos="fade-down" data-aos-delay="1000"></span>
                <p class="text-secondary fs-5" data-aos="fade-down" data-aos-delay="400">Aplikasi inventori barang adalah perangkat lunak yang dirancang untuk membantu bisnis atau organisasi dalam mengelola dan mengawasi stok atau persediaan barang yang mereka miliki.</p>
            </div>
        </div>
    </section>
    <section id="keluhan" class="container my-5">
        <div class="row container py-5 my-5 d-flex justify-content-center align-items-center">
            <div class="col">
                <h1 class="fw-bold title mb-3" data-aos="fade-down" data-aos-delay="200">Keluhan karyawan?</h1>
                <span class="line" data-aos="fade-down" data-aos-delay="1000"></span>
                <p class="text-secondary fs-5" data-aos="fade-down" data-aos-delay="400">Aplikasi keluhan karyawan adalah perangkat lunak yang dirancang khusus untuk memungkinkan karyawan mengajukan, melacak, dan mengelola keluhan, masalah, atau pertanyaan terkait lingkungan kerja.</p>
            </div>
            <div class="col" data-aos="fade-down">
                <img src="pages/src/image/assets/picture-keluhan.png" class="img-fluid shadow-lg rounded-3" alt="">
            </div>
        </div>
    </section>
    <section id="barang" class="container-fluid">
        <div class="container my-5 py-5">
            <div class="text-center my-5" data-aos="fade-down">
                <h1 class="fw-bold title">Apa Yang Kami Punya?</h1>
                <span class="line-center" data-aos="fade-down" data-aos-delay="1000"></span>
            </div>
            <div class="row gap-5 my-5 py-5">
                <div class="col col-barang rounded-5 shadow-lg" data-aos="fade-down" data-aos-delay="200">
                    <div class="d-flex justify-content-center align-items-center mt-5">
                        <img src="pages/src/image/assets/processor.png" class="w-50 img-fluid" alt="">
                    </div>
                    <h2 class="text-center line-center mx-3 py-3">Processor</h2>
                    <p class="text-secondary p-3 text-center">Processor atau unit pemrosesan adalah komponen listrik yang melakukan operasi pada sumber data eksternal, biasanya memori atau aliran data lainnya.</p>
                </div>
                <div class="col col-barang rounded-5 shadow-lg" data-aos="fade-down" data-aos-delay="400">
                    <div class="d-flex justify-content-center align-items-center mt-5">
                        <img src="pages/src/image/assets/ram.png" class="w-50 img-fluid" alt="">
                    </div>
                    <h2 class="text-center line-center mx-3 py-3">RAM</h2>
                    <p class="text-secondary p-3 text-center">Random Access Memory adalah jenis penyimpanan komputer yang isinya dapat diakses dalam waktu tetap, tidak memperdulikan letak datanya dalam memori.</p>
                </div>
                <div class="col col-barang rounded-5 shadow-lg" data-aos="fade-down" data-aos-delay="600">
                    <div class="d-flex justify-content-center align-items-center mt-5">
                        <img src="pages/src/image/assets/hard-disk.png" class="w-50 img-fluid" alt="">
                    </div>
                    <h2 class="text-center line-center mx-3 py-3">Storage</h2>
                    <p class="text-secondary p-3 text-center">Penyimpanan data komputer atau memori komputer merujuk pada komponen komputer, perangkat komputer, atau media perekaman yang mempertahankan data digital yang digunakan untuk beberapa jangka waktu.</p>
                </div>
                <div class="col col-barang rounded-5 shadow-lg" data-aos="fade-down" data-aos-delay="800">
                    <div class="d-flex justify-content-center align-items-center mt-5">
                        <img src="pages/src/image/assets/graphic-card.png" class="w-50 img-fluid" alt="">
                    </div>
                    <h2 class="text-center line-center mx-3 py-3">Graphics Card</h2>
                    <p class="text-secondary p-3 text-center">Graphics Card, atau kartu video adalah kartu tambahan yang berfungsi untuk menciptakan dan menampilkan tampilan-tampilan di layar.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="table-barang" class="container-fluid">
        <div class="container my-5 py-5">
            <div class="text-center my-5" data-aos="fade-down">
                <h1 class="fw-bold title">History Barang</h1>
                <span class="line-center" data-aos="fade-down" data-aos-delay="1000"></span>
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
                                    <td><?= date('d F Y', strtotime($result["tanggal"])) ?></td>
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
                            Ini adalah project web PRAKERIN (Praktik Kerja Industri) untuk memenuhi persyaratan mengikuti UKOM (Uji Kompetensi)
                        </p>
                    </div>
                </div>
            </section>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © <?= date('Y') ?> Copyright
            <a class="text-white" href="https://github.com/mohfer" target="_blank">mohfer</a>
        </div>
    </footer>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="pages/src/js/aos.js"></script>
</body>

</html>
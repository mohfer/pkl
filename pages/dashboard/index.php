<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../src/css/global.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/dt-1.13.6/datatables.min.js"></script>
    <title>Inventory Barang | Dashboard</title>
</head>

<script>
    $(document).ready(function() {
        $('#table').dataTable({
            "scrollY": "300px",
            "scrollCollapse": true,
            "paging": true
        });
    });
</script>

<body>
    <div class="wrapper">
        <div class="row vh-100">
            <div class="col-md-2 sidebar text-light">
                <div class="text-center my-3 mb-5">
                    <h4>Inventory Barang</h4>
                </div>
                <div class="mx-4">
                    <h5>Menu</h5>
                    <a href="">
                        <p class="opacity-100 aktif rounded-pill">Dashboard</p>
                    </a>
                </div>
                <div class="mx-4 mt-3">
                    <h5>Komponen</h5>
                    <a href="../processor/">
                        <p class="opacity">Processor</p>
                    </a>
                    <a href="../ram/">
                        <p class="opacity">RAM</p>
                    </a>
                    <a href="../storage/">
                        <p class="opacity">Storage</p>
                    </a>
                    <a href="../vga/">
                        <p class="opacity">Graphics Card</p>
                    </a>
                </div>
                <div class="mx-4">
                    <h5>Komponen</h5>
                </div>
            </div>
            <div class="col-md-10 content">
                <div class="wrapper">
                    <div class="row my-3">
                        <div class="col-md-6">
                            <div class="transaksi-masuk p-4 shadow-lg left">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h1>Jumlah Transaksi Masuk</h1>
                                    </div>
                                    <div class="col-md-2">
                                        <h1 class="text-success">200</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="transaksi-keluar p-4 shadow-lg left">
                                <div class="row">
                                    <div class="col-md-10">
                                        <h1>Jumlah Transaksi Keluar</h1>
                                    </div>
                                    <div class="col-md-2">
                                        <h1 class="text-danger">200</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table id="table" class="table">

                </table>
            </div>
        </div>
    </div>
</body>

</html>
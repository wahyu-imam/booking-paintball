<?php
    include ("../koneksi/koneksi.php");
    session_start();
    if(!isset($_SESSION['username'])) {
        include("login.php");
        exit;
    }
    $pengguna=$_SESSION['username'];
    $kode_paket = $_GET['kode_paket'];

    $dataPaket = mysqli_query($con, "SELECT * FROM paket WHERE kode_paket = '$kode_paket'");
    $tampil = mysqli_fetch_array($dataPaket);

?>
<!DOCTYPE html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
    <link rel="stylesheet" href="../assets/vendor/inputmask/css/inputmask.css" />
    <title>Admin - Jungle Paintball Jogja</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="../admin/index.php">jungle paintball jogja</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"> <?php echo $pengguna;  ?></h5>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="../admin/index.php">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="../admin/index.php" data-toggle="" aria-expanded="false" data-target="" aria-controls=""><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-list"></i>Master</a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="../admin/barang.php"> Barang </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../admin/event.php">Event</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="../admin/paket.php">Paket</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../admin/detail_paket.php"> Detail Paket </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../admin/fasilitas.php"> Fasilitas </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../admin/jadwal.php"> Jadwal </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../admin/member.php"> Member </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-fw fa-chart-pie"></i>Transaksi</a>
                                <div id="submenu-2" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2-1" aria-controls="submenu-2-1"><i class="fas fa-fw fa-chart-pie"></i>Booking</a>
                                            <div id="submenu-2-1" class="collapse submenu">
                                                <ul class="nav flex-column">
                                                    <li>
                                                        <a class="nav-link" href="../admin/booking_biasa.php"> Biasa </a>
                                                    </li>
                                                    <li>
                                                        <a class="nav-link" href="../admin/booking_event.php"> Event </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fab fa-fw fa-wpforms"></i>Laporan</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#">Barang</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3-1" aria-controls="submenu-3-1"><i class="fab fa-fw fa-wpforms"></i>Booking</a>
                                            <div id="submenu-3-1" class="collapse submenu">
                                                <ul class="nav flex-column">
                                                    <li>
                                                        <a class="nav-link" href="../admin/lap_booking_biasa.php"> Biasa </a>
                                                    </li>
                                                    <li>
                                                        <a class="nav-link" href="../admin/lap_booking_event.php"> Event </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Jungle PaintBall Jogja</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active" aria-current="page">Master</li>
                                        <li class="breadcrumb-item"><a href="../admin/paket.php" class="breadcrumb-link">Paket</a></li>
                                        <li class="breadcrumb-item"><a href="../admin/ubah_paket.php" class="breadcrumb-link">Ubah Paket</a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="m-0 font-weight-bold text-gray-100 text-center">Ubah Data Paket</h3>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST">
                            <div class="form-group">
                                <label for="kode_paket" class="col-form-label">Kode Paket</label>
                                <input id="kode_paket" name="kode_paket" type="text" class="form-control" value="<?php echo $tampil['kode_paket'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama_paket" class="col-form-label">Nama Paket</label>
                                <input id="nama_paket" name="nama_paket" type="text" class="form-control" value="<?php echo $tampil['nama_paket'] ?>">
                            </div>
                            <div>
                                <button class="btn btn-success" name="ubah">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="../assets/libs/js/main-js.js"></script>
    <script src="../assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>
</body>
 
</html>

<?php
    if(isset($_POST['ubah']))
    {
        $kode_paket = $_POST['kode_paket'];
        $nama_paket = $_POST['nama_paket'];
        
        $simpan = mysqli_query($con, "UPDATE paket SET nama_paket = '$nama_paket' WHERE kode_paket = '$kode_paket'");
        
        if($simpan)
        {
            ?>
                <script type="text/javascript">
                    alert("Berhasil Simpan");
                    window.location = "../admin/paket.php";
                </script>
            <?php
        }
    }
?>
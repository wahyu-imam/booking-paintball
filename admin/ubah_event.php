<?php
    include ("../koneksi/koneksi.php");
    session_start();
    if(!isset($_SESSION['username'])) {
        include("login.php");
        exit;
    }
    $pengguna=$_SESSION['username'];
    $kode_event = $_GET['kode_event'];

    $data_event = mysqli_query($con, "SELECT * FROM event WHERE kode_event = '$kode_event'");
    $tampil = mysqli_fetch_array($data_event);
    $tgl_buka = $tampil['tgl_buka'];
    $pecah = explode('-', $tgl_buka);
    $tgl_buka = $pecah[2].'/'.$pecah[1].'/'.$pecah[0];
    $tgl_tutup = $tampil['tgl_tutup'];
    $pecah = explode('-', $tgl_tutup);
    $tgl_tutup = $pecah[2].'/'.$pecah[1].'/'.$pecah[0];
    $tgl_start_play = $tampil['tgl_start_play'];
    $pecah = explode('-', $tgl_start_play);
    $tgl_start_play = $pecah[2].'/'.$pecah[1].'/'.$pecah[0];
    $tgl_end_play = $tampil['tgl_end_play'];
    $pecah = explode('-', $tgl_end_play);
    $tgl_end_play = $pecah[2].'/'.$pecah[1].'/'.$pecah[0];
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
                                    <h5 class="mb-0 text-white nav-user-name"> <?php echo $pengguna; ?></h5>
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
                                            <a class="nav-link active" href="../admin/event.php">Event</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../admin/paket.php">Paket</a>
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
                                        <li class="breadcrumb-item"><a href="../admin/event.php" class="breadcrumb-link">Event</a></li>
                                        <li class="breadcrumb-item"><a href="../admin/ubah_event.php" class="breadcrumb-link">Ubah Event</a></li>
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
                        <h3 class="m-0 font-weight-bold text-gray-100 text-center">Ubah Data Event</h3>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST">
                            <div class="form-group">
                                <label for="kode_event" class="col-form-label">Kode Event</label>
                                <input id="kode_event" name="kode_event" type="text" class="form-control" value="<?php echo $tampil['kode_event'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama_event" class="col-form-label">Nama Event</label>
                                <input id="nama_event" name="nama_event" type="text" class="form-control" value="<?php echo $tampil['nama_event'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="biaya_daftar" class="col-form-label">Biaya Pendaftaran</label>
                                <input id="biaya_daftar" name="biaya_daftar" type="text" class="form-control" value="<?php echo $tampil['biaya_daftar'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="tgl_buka" class="col-form-label">Tanggal Buka Pendaftaran</label>
                                <input type="text" class="form-control datetimepicker-input" id="tgl_buka" data-toggle="datetimepicker" data-target="#tgl_buka" data-date-format="DD/MM/YYYY" id="tgl_buka" name="tgl_buka" value="<?php echo $tgl_buka ?>" />
                            </div>
                            <div class="form-group">
                                <label for="tgl_tutup" class="col-form-label">Tanggal Tutup Pendaftaran</label>
                                <input type="text" class="form-control datetimepicker-input" id="tgl_tutup" data-toggle="datetimepicker" data-target="#tgl_tutup" data-date-format="DD/MM/YYYY" id="tgl_tutup" name="tgl_tutup" value="<?php echo $tgl_tutup ?>" />
                            </div>
                            <div class="form-group">
                                <label for="tgl_mulai_main" class="col-form-label">Tanggal Mulai Bermain</label>
                                <input type="text" class="form-control datetimepicker-input" id="tgl_mulai_main" data-toggle="datetimepicker" data-target="#tgl_mulai_main" data-date-format="DD/MM/YYYY" id="tgl_mulai_main" name="tgl_mulai_main" value="<?php echo $tgl_start_play ?>" />
                            </div>
                            <div class="form-group">
                                <label for="tgl_akhir_main" class="col-form-label">Tanggal Akhir Bermain</label>
                                <input type="text" class="form-control datetimepicker-input" id="tgl_akhir_main" data-toggle="datetimepicker" data-target="#tgl_akhir_main" data-date-format="DD/MM/YYYY" id="tgl_akhir_main" name="tgl_akhir_main" value="<?php echo $tgl_end_play ?>" />
                            </div>
                            <div class="form-group">
                                <label for="jam_mulai" class="col-form-label">Jam Mulai Bermain</label>
                                <input id="jam_mulai" name="jam_mulai" type="text" class="form-control" value="<?php echo $tampil['jam_play'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="jam_akhir" class="col-form-label">Jam Akhir Bermain</label>
                                <input id="jam_akhir" name="jam_akhir" type="text" class="form-control" value="<?php echo $tampil['jam_end'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="info" class="col-form-label">Keterangan</label>
                                <input id="info" name="info" type="text" class="form-control" value="<?php echo $tampil['info'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="hadiah" class="col-form-label">Hadiah</label>
                                <input id="hadiah" name="hadiah" type="text" class="form-control" value="<?php echo $tampil['hadiah'] ?>">
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
        $kode_event = $_POST['kode_event'];
        $nama_event = $_POST['nama_event'];
        $biaya_daftar = $_POST['biaya_daftar'];
        $tgl_buka = $_POST['tgl_buka'];
        $pecah = explode('/', $tgl_buka);
        $tgl_buka = $pecah[2].'-'.$pecah[1].'-'.$pecah[0];
        $tgl_buka2 = strtotime($tgl_buka);
        $tgl_tutup = $_POST['tgl_tutup'];
        $pecah = explode('/', $tgl_tutup);
        $tgl_tutup = $pecah[2].'-'.$pecah[1].'-'.$pecah[0];
        $tgl_tutup2 = strtotime($tgl_tutup);
        $tgl_start_play = $_POST['tgl_mulai_main'];
        $pecah = explode('/', $tgl_start_play);
        $tgl_start_play = $pecah[2].'-'.$pecah[1].'-'.$pecah[0];
        $tgl_end_play = $_POST['tgl_akhir_main'];
        $pecah = explode('/', $tgl_end_play);
        $tgl_end_play = $pecah[2].'-'.$pecah[1].'-'.$pecah[0];
        $jam_play = $_POST['jam_mulai'];
        $jam_end = $_POST['jam_akhir'];
        $info = $_POST['info'];
        $hadiah = $_POST['hadiah'];
        $today = date('Y-m-d');
        $today = strtotime($today);
        if($today >= $tgl_buka2 && $today <= $tgl_tutup2){
            $status = "Buka";
        }else{
            $status = "Tutup";
        }
        
        $simpan = mysqli_query($con, "UPDATE `event` SET `nama_event`='$nama_event',`biaya_daftar`='$biaya_daftar',`tgl_buka`='$tgl_buka',`tgl_tutup`='$tgl_tutup',`tgl_start_play`='$tgl_start_play',`tgl_end_play`='$tgl_end_play',`jam_play`='$jam_play',`jam_end`='$jam_end',`info`='$info',`hadiah`='$hadiah',`status`='$status' WHERE `kode_event`='$kode_event'");
        
        if($simpan)
        {
            ?>
                <script type="text/javascript">
                    alert("Berhasil Simpan");
                    window.location = "../admin/event.php";
                </script>
            <?php
        }
    }
?>
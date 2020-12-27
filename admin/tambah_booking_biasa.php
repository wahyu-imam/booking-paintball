<?php
    include ("../koneksi/koneksi.php");
    session_start();
    if(!isset($_SESSION['username'])) {
        include("login.php");
        exit;
    }
    $pengguna=$_SESSION['username'];
    $sql = mysqli_query($con, "SELECT MAX(kode_booking) AS kode FROM booking");
    $data = mysqli_fetch_array($sql);
    $kode = $data['kode'];
    $urutan = (int) substr($kode, 1, 3);
    $urutan++;
    $huruf = "S";
    $kode_booking = $huruf . sprintf("%03s", $urutan);

    $sql2 = mysqli_query($con, "SELECT MAX(kode_detail_booking) AS kode FROM detail_booking");
    $data2 = mysqli_fetch_array($sql2);
    $kode2 = $data2['kode'];
    $urutan2 = (int) substr($kode2, 2, 3);
    $urutan2++;
    $huruf2 = "DS";
    $kode_detail_booking = $huruf2 . sprintf("%03s", $urutan2);
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
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-list"></i>Master</a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="../admin/barang.php"> Barang </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="../admin/event.php">Event</a>
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
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-fw fa-chart-pie"></i>Transaksi</a>
                                <div id="submenu-2" class="collapse submenu">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2-1" aria-controls="submenu-2-1"><i class="fas fa-fw fa-chart-pie"></i>Booking</a>
                                            <div id="submenu-2-1" class="collapse submenu">
                                                <ul class="nav flex-column">
                                                    <li>
                                                        <a class="nav-link active" href="../admin/booking_biasa.php"> Biasa </a>
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
                                        <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                                        <li class="breadcrumb-item active" aria-current="page">Booking</li>
                                        <li class="breadcrumb-item"><a href="../admin/booking_biasa.php" class="breadcrumb-link">Booking Biasa</a></li>
                                        <li class="breadcrumb-item"><a href="../admin/tambah_booking_biasa.php" class="breadcrumb-link">Tambah Booking Biasa</a></li>
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
                        <h3 class="m-0 font-weight-bold text-gray-100 text-center">Tambah Data Booking Biasa</h3>
                    </div>
                    <div class="card-body">
                        <form role="form" method="POST" name="data_booking" id="data_booking">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="kode_booking" class="col-form-label">Kode Booking</label>
                                                <input id="kode_booking" name="kode_booking" type="text" class="form-control" value="<?php echo $kode_booking ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label for="kode_member" class="col-form-label">Nama Member</label>
                                                <select class="form-control" name="kode_member" id="kode_member" onchange="">
                                                <?php 
                                                    $sql = mysqli_query($con, 'SELECT * FROM member');
                                                    while ($tampil = mysqli_fetch_array($sql)) {
                                                        echo '<option value="'.$tampil['kode_member'].'">'.$tampil['nama_member'].'</option>';                         
                                                    }
                                                ?>
                                            </select>
                                            </div>
                                            <label for="tgl_booking" class="col-form-label">Tanggal Booking</label>
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control datetimepicker-input" id="tgl_booking" data-toggle="datetimepicker" data-target="#tgl_booking" data-date-format="DD-MM-YYYY" name="tgl_booking" onchange="" min="date(DD-MM-YYYY)" />
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="javascript:void(0)" class="btn btn-success float-left btn-sm" id="cek">
                                                        <span class="text">Cek</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="kode_jadwal" id="kode_jadwal" class="form-control text-left bg-white border-0" readonly="" hidden="">
                                                <label for="jadwal_jam" class="col-form-label">Jadwal Jam Pertandingan</label>
                                                <input id="jadwal_jam" name="jadwal_jam" type="text" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="kode_detail_booking" class="col-form-label">Kode Detail Booking</label>
                                                <input id="kode_detail_booking" name="kode_detail_booking" type="text" class="form-control" value="<?php echo $kode_detail_booking ?>" readonly>
                                            </div>
                                            <label for="nama_paket" class="col-form-label">Nama Paket</label>
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <input id="nama_paket" name="nama_paket" type="text" class="form-control" value="" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="javascript:void(0)" class="btn btn-success float-left btn-sm" id="cekPaket">
                                                        <span class="text">Cek</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="harga" class="col-form-label">Harga Paket</label>
                                                <input id="harga" name="harga" type="text" class="form-control" readonly>
                                            </div>
                                            <div>
                                                <a href="javascript:void(0)" class="btn btn-success float-right btn-sm" id="tambah">
                                                        <span class="text">Tambah</span>
                                                    </a>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="hari" id="hari" class="form-control text-left bg-white border-0" readonly hidden>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="kode_subPaket" id="kode_subPaket" class="form-control text-left bg-white border-0" readonly hidden>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- ============================================================== -->
                                <!-- data table  -->
                                <!-- ============================================================== -->
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-bordered first" style="width:100%" id="dataTabelSementara" name="dataTabelSementara">
                                                    <thead>
                                                        <tr>
                                                            <th style="width: 10%">No</th>
                                                            <th style="width: 16%">Kode Dtl Booking</th>
                                                            <th style="width: 15%">Kode Sub Paket</th>
                                                            <th>Nama Paket</th>
                                                            <th style="width: 10%">Harga</th>
                                                            <th style="width: 10%">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                            <a href="javascript:void(0)" class="btn btn-success float-right btn-sm" id="cekout" name="cekout">
                                                <span class="text">Check Out</span>
                                            </a>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- end data table  -->
                                <!-- ============================================================== -->
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
    <script src="../assets/vendor/datepicker/moment.js"></script>
    <script src="../assets/vendor/datepicker/tempusdominus-bootstrap-4.js"></script>
    <script src="../assets/vendor/datepicker/datepicker.js"></script>

    <div id="tampilModalCekJadwal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

    <div id="tampilModalCekPaket" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

    <div id="modalCekOut" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>

</body>
 
</html>

<script type="text/javascript">
    function getNilai(id){
        var nilai = document.getElementById(id).value;
        alert(nilai);
    }

    $(document).ready(function(){
        $("#cek").click(function(){
            var tgl = document.getElementById('tgl_booking').value;
            var sendTgl = JSON.stringify(tgl);
            $.ajax({
                url: "tampil_modal_cek_jadwal.php",
                type: "post",
                data: {tgl : sendTgl},
                success : function(data){
                    $("#tampilModalCekJadwal").html(data);
                    $("#tampilModalCekJadwal").modal('show');
                }
            });
        });
    });

    $(document).ready(function(){
        $("#cekPaket").click(function(){
            var hari = document.getElementById('hari').value;
            var jam = document.getElementById('jadwal_jam').value;
            var sendHari = JSON.stringify(hari);
            var sendJam = JSON.stringify(jam);
            $.ajax({
                url: "tampil_modal_cek_paket.php",
                type: "post",
                data: {hari : sendHari, jam : sendJam},
                success : function(data){
                    $("#tampilModalCekPaket").html(data);
                    $("#tampilModalCekPaket").modal('show');
                }
            });
        });
    });

    $(document).ready(function(){
        var index = 1;
        $("#tambah").click(function(){
            newIndex = index++;
            var kode_detail_booking = document.getElementById('kode_detail_booking').value;
            var kode_subPaket = document.getElementById('kode_subPaket').value;
            var array_subPaket = kode_subPaket.split(';');
            if (array_subPaket[3] == null) {
                array_subPaket[3] = "";
            }
            var harga = document.getElementById('harga').value;

            $("#dataTabelSementara").append('<tr valign="top" id="'+newIndex+'">\n\
                <td width="100px" class="text-xs text-gray-600 text-center">' + newIndex + '</td>\n\
                <td width="100px" class="text-xs text-gray-600 text-center kode_detail_booking'+newIndex+'">' + kode_detail_booking + '</td>\n\
                <td width="100px" class="text-xs text-gray-600 text-center kode_subPaket'+newIndex+'">' + array_subPaket[0] + '</td>\n\
                <td width="100px" class="text-xs text-gray-600 text-center nama_paket'+newIndex+'">' + array_subPaket[1]+' '+ array_subPaket[2] +' '+ array_subPaket[3] +'</td>\n\
                <td width="100px" class="text-xs text-gray-600 text-center harga'+newIndex+'">' + harga + '</td>\n\
                <td width="100px" class="text-center"><a href="javascript:void(0);" class="remCF">Hapus</a></td>\n\
                </tr>');

            var arrayKodeDetailBooking = kode_detail_booking.split('DS');
            var urutan = parseInt(arrayKodeDetailBooking[1]) + 1;
            if(urutan < 10){
                kode_detail_booking = "DS00"+urutan;
            }else if(urutan >= 10 && urutan < 100){
                kode_detail_booking = "DS0"+urutan;
            }else if(urutan >= 100 && urutan < 1000){
                kode_detail_booking = "DS"+urutan;
            }
            document.getElementById('kode_detail_booking').value = kode_detail_booking;
        });

        $("#dataTabelSementara").on('click', '.remCF', function() {
            $(this).parent().parent().remove();

        });

        $("#cekout").click(function(){
            var lastRowId = $('#dataTabelSementara tr:last').attr("id");

            var kode_booking = document.getElementById('kode_booking').value;
            var kode_member = document.getElementById('kode_member').value;
            var tgl_booking = document.getElementById('tgl_booking').value;
            var kode_jadwal = document.getElementById('kode_jadwal').value;
            var jenis_booking = "Biasa";
            var kode_detail_booking = new Array();
            var kode_subPaket = new Array();
            var harga = new Array();

            for ( var i = 1; i <= lastRowId; i++) {
                kode_detail_booking.push($("#"+i+" .kode_detail_booking"+i).html());  
                kode_subPaket.push($("#"+i+" .kode_subPaket"+i).html());
                harga.push($("#"+i+" .harga"+i).html());
            }

            var sendKodeBooking = JSON.stringify(kode_booking);
            var sendKodeMember = JSON.stringify(kode_member);
            var sendTglBooking = JSON.stringify(tgl_booking);
            var sendKodeJadwal = JSON.stringify(kode_jadwal);
            var sendJenisBooking = JSON.stringify(jenis_booking);
            var sendKodeDetailBooking = JSON.stringify(kode_detail_booking);
            var sendKodeSubPaket = JSON.stringify(kode_subPaket);
            var sendHarga = JSON.stringify(harga);

            $.ajax({
                url: "modal_check_out.php",
                type: "post",
                data: {kode_booking : sendKodeBooking, kode_member : sendKodeMember, tgl_booking : sendTglBooking, kode_jadwal : sendKodeJadwal, jenis_booking : sendJenisBooking, kode_detail_booking : sendKodeDetailBooking, kode_subPaket : sendKodeSubPaket, harga : sendHarga},
                success : function(data){
                    $("#modalCekOut").html(data);
                    $("#modalCekOut").modal('show');
                }
            });
        });
    });
</script>
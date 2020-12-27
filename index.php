<?php 
    include ("koneksi/koneksi.php");
    $sql = mysqli_query($con, "SELECT kode_event, tgl_buka, tgl_tutup FROM event");
    $tgl_sekarang = date('Y-m-d');
    while ($tampil = mysqli_fetch_array($sql)) {
      $tgl_buka = $tampil['tgl_buka'];
      $tgl_tutup = $tampil['tgl_tutup'];
      $sqlFilter = mysqli_query($con, "SELECT * FROM `event` WHERE tgl_tutup >= '$tgl_tutup' AND tgl_buka <= '$tgl_buka'");
      $tampilFilter = mysqli_fetch_array($sqlFilter);
      $kode_event = $tampilFilter['kode_event'];
      $sqlUbah = mysqli_query($con, "UPDATE event SET status = 'Buka' WHERE kode_event = '$kode_event'");    
    }

    $pecah = explode('-', $tgl_sekarang);
    $tgl = $pecah[2].'-'.$pecah[1].'-'.$pecah[0];
    $sql = mysqli_query($con, "SELECT jam - INTERVAL '1' HOUR AS sebelum, jam, jam + INTERVAL '1' HOUR AS sesudah FROM booking, jadwal WHERE booking.kode_jadwal=jadwal.kode_jadwal AND tgl_booking = '$tgl'");
    $sebelum = [];
    $jam = [];
    $sesudah = [];
    $i = 0;
    while ($tampil = mysqli_fetch_array($sql)) {
      $sebelum[$i] = $tampil['sebelum'];
      $jam[$i] = $tampil['jam'];
      $sesudah[$i] = $tampil['sesudah'];
      $i++;
    }
    $array = array_merge($sebelum, $jam, $sesudah);
    $sql = "SELECT * FROM jadwal ";
    for ($i=0; $i < count($array); $i++) { 
      if ($i == count($array) - 1) {
        $sql = $sql."jam != '$array[$i]'";
      }else if($i == 0){
        $sql = $sql."WHERE jam != '$array[$i]' AND ";
      }else{
        $sql = $sql."jam != '$array[$i]' AND ";
      }
    }
    $sql2 = mysqli_query($con, $sql);
    $no = 1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Restaurantly Bootstrap Template - Index</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Restaurantly - v1.1.0
  * Template URL: https://bootstrapmade.com/restaurantly-restaurant-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-phone"></i> 088980006642
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html">Jungle Paintball Jogja</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.html">Beranda</a></li>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#event">Event/Lomba</a></li>
          <li><a href="#paketPaintball">Paket Paintball</a></li>
          <li><a href="#jenis">Jenis Permainan</a></li>
          <li><a href="#peraturan">Peraturan Paintball</a></li>
          <li><a href="#peralatan">Peralatan Paintball</a></li>
          <li class="book-a-table text-center"><a href="member/login.php">Masuk</a></li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative text-center text-lg-left" data-aos="zoom-in" data-aos-delay="100">
      <div class="row">
        <div class="col-lg-8">
          <h1>Selamat datang di <span class="">Jungle Paintball Jogja</span></h1>

          <div class="btns">
            <a href="#jadwal" class="btn-menu animated fadeInUp scrollto">Jadwal Lapangan</a>
            <a href="member/login.php" class="btn-book animated fadeInUp scrollto">Sewa Lapangan</a>
          </div>
        </div>
        <div class="col-lg-4 d-flex align-items-center justify-content-center" data-aos="zoom-in" data-aos-delay="200">
          <a href="https://www.youtube.com/watch?v=GlrxcuEDyF8" class="venobox play-btn" data-vbtype="video" data-autoplay="true"></a>
        </div>

      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
            <div class="about-img">
              <img src="assets/img/about.jpg" alt="">
            </div>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <h3>Jungle Paintball Jogja adalah tempat bermain murah dan seru di Yogyakarta</h3>
            <p class="font-italic">
             Lokasi strategis di area Depok, Kaliwaru, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281  ( 'Barat Hartono Mall' )
            </p>
            <ul>
              <li><i class="icofont-check-circled"></i> Arena dirancang sedemikian rupa mirip dengan area "perang" umumnya.</li>
              <li><i class="icofont-check-circled"></i> Anda akan mendapatkan 50 peluru yang di bagi dalam 2 Sesi pertandingan (masing masing 25 peluru)</li>
              <li><i class="icofont-check-circled"></i> Peluru yang tersisa,dapat dimainkan pada Sesi ke 3,atau anda dapat tambah peluru (Reload)</li>
              <li><i class="icofont-check-circled"></i> Briefing dilakukan sebelum pertandingan,ketika anda bermain akan dikawal dengan seksama oleh 2 orang instruktur.</li>
              <li><i class="icofont-check-circled"></i> Permainan tidak dibatasi waktu,permainan berakhir ketika peluru habis atau salah satu tim kalah.</li>
              <li><i class="icofont-check-circled"></i> Harga paket paintball kami sangat kompetitif.</li>
            </ul>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Jadwal Selection ======= -->
    <section id="jadwal" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Jadwal Lapangan</h2>
          <p>Jadwal hari ini yang masih kosong</p>
        </div>
        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
            <?php 
                while ($tampil2 = mysqli_fetch_array($sql2)) {
                    ?> 
                    <div class="col-lg-6 menu-item <?php $tampil2['kode_paket'] ?>">
                        <div class="menu-content">
                            <a href="#"><?php echo $tampil2['jam'] ?></a><span>Status Free</span>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>
      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Why Us Section ======= -->
    <section id="event" class="why-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Event / Lomba</h2>
          <p>Ikuti Event / Lomba di Jungle Paintball Jogja</p>
        </div>

        <div class="row">
            <?php 
                $sql = mysqli_query($con, "SELECT kode_event, nama_event, biaya_daftar, concat(DATE_FORMAT(tgl_buka, '%d %M %Y'),' sampai ',DATE_FORMAT(tgl_tutup, '%d %M %Y')) AS tgl_daftar, concat(DATE_FORMAT(tgl_start_play, '%d %M %Y'),' sampai ',DATE_FORMAT(tgl_end_play, '%d %M %Y')) AS tgl_main, concat(jam_play,' sampai ',jam_end) AS jam_main, info, hadiah, status FROM event WHERE status = 'Buka'");
                while ($tampil = mysqli_fetch_array($sql)) {
            ?>
                    <div class="col-lg-4">
                        <div class="box" data-aos="zoom-in" data-aos-delay="100">
                            <span >
                                <a><?php echo $tampil['nama_event'] ?></a>
                            </span>
                            <h4><?php echo $tampil['tgl_daftar'] ?></h4>
                            <p>Ikuti dan daftarkan diri anda serta tim untuk lomba Paintball pada tanggal <?php echo $tampil['tgl_main'] ?> di Jungle Paintball Jogja.</p>
                        </div>
                    </div>
                <?php
                }
                ?>
        </div>
      </div>
    </section><!-- End Why Us Section -->

    <!-- ======= Menu Section ======= -->
    <section id="paketPaintball" class="menu section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Paket Paintball</h2>
          <p>Paket Paintball di Jungle Paintball Jogja</p>
        </div>
        <div class="row menu-container" data-aos="fade-up" data-aos-delay="200">
            <?php 
                $sql = mysqli_query($con, "SELECT * FROM `sub_paket` ORDER BY kode_paket ASC");
                while ($tampil2 = mysqli_fetch_array($sql)) {
                    ?> 
                    <div class="col-lg-6 menu-item <?php $tampil2['kode_paket'] ?>">
                        <div class="menu-content">
                            <a href="#"><?php echo $tampil2['nama_sub'] ?></a><span>Rp. <?php echo $tampil2['harga'] ?>/Orang</span>
                        </div>
                        <div class="menu-ingredients">
                            <?php echo $tampil2['ketentuan'] ?>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>
      </div>
    </section><!-- End Menu Section -->

    <!-- ======= Specials Section ======= -->
    <section id="jenis" class="specials">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Jenis Permainan</h2>
          <p>Jenis Permainan di Jungle Paintball Jogja</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-3">
            <ul class="nav nav-tabs flex-column">
              <li class="nav-item">
                <a class="nav-link active show" data-toggle="tab" href="#tab-1">Terminator</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-2">Shoot The Captain</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-3">Capture The Flag</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-4">Gun Shop</a>
              </li>
            </ul>
          </div>
          <div class="col-lg-9 mt-4 mt-lg-0">
            <div class="tab-content">
              <div class="tab-pane active show" id="tab-1">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Terminator</h3>
                    <p>Misi setiap team adalah menghabiskan lawan!! Apabila waktu habis team pemenang ditentukan berdasarkan team yang pemainnya paling sedikit gugur.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/paintball3.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-2">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Shoot The Captain</h3>
                    <p>Misi setiap team adalah mempertahankan Captainnya yang tidak bersenjata dan berusaha menembak captain team lawan. Apabila captainnya tertembak otomatis team tersebut dinyatakan kalah.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/paintball8.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-3">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Capture The Flag</h3>
                    <p>Misi setiap team adalah memperebutkan bendera!! Pemenang adalah team yang pertama merebut bendera lawan. Variasi scenario ini berupa duo bendera atau lebih dari 2 bendera.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/paintball9.jpeg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="tab-4">
                <div class="row">
                  <div class="col-lg-8 details order-2 order-lg-1">
                    <h3>Gun Shop</h3>
                    <p>Setiap team mengerjakan suatu misi pertempuran. Setiap tim dibekali sejumlah dana dengan jumlah yang ditentukan untuk “membeli” peralatan tempur.Permainan dimulai setelah setiap tim siap dengan peralatan dan alat penunjang pertempuran lainnya.</p>
                  </div>
                  <div class="col-lg-4 text-center order-1 order-lg-2">
                    <img src="assets/img/paintball-paling-seru.jpg" alt="" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Specials Section -->


    <!-- ======= Peraturan Section ======= -->
    <section id="peraturan" class="testimonials section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Peraturan Permainan</h2>
          <p>Peraturan Peraminan di Jungle Paintball jogja</p>
          <ul>
              <li> Dilarang melepas masker / google dengan alasan apapun.</li>
              <li> Setiap senjata paintball (paintball gun) memiliki pengunci untuk keamanan, instruktur biasanya meminta untuk mengunci senjata selama permainan tidak berlangsung untuk keamanan.</li>
              <li> Jarak tembak minimum adalah 4.5 – 5 meter.</li>
              <li> Hit, seseorang dinyatakan tertembak dan harus keluar dari arena.</li>
              <li> Seseorang yang telah tertembak harus mengangkat senjata dan keluar dari arena.</li>
              <li> Wiping atau membersihkan cat yang menempel pada bagian tubuh ketika tertembak dengan tujuan untuk mengelabui lawan adalah tidak dibenarkan dan merupakan kecurangan.</li>
              <li> No contact, selama permainan, tidak diperkenankan melakukan kontak fisik dengan lawan.</li>
            </ul>
        </div>

       

      </div>
    </section><!-- End Book A Table Section -->

    <!-- ======= Events Section ======= -->
    <section id="peralatan" class="events">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Peralatan Paintball</h2>
          <p>Peralatan Paintball di Jungle Paintball Jogja</p>
        </div>

        <div class="owl-carousel events-carousel" data-aos="fade-up" data-aos-delay="200">

          <div class="row event-item">
            <div class="col-lg-6">
              <img src="assets/img/paintballmarker.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3>Paintball Marker</h3>
              <p class="font-italic">
                Paintball marker atau paintball gun adalah peralatan yang palin utama. Pistol Paintball ini memiliki loader / hopper yang merupakan tempat / wadah peluru cat serta sebuah tabung gas bertekanan tinggi sekitar 4500 Psi. Senjata juga dilengkapi kunci pengaman untuk mencegah hal-hal yang tidak diinginkan.
              </p>
            </div>
          </div>

          <div class="row event-item">
            <div class="col-lg-6">
              <img src="assets/img/peluru.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3>Peluru Paintball</h3>
              <p class="font-italic">
                Merupakan amunisi utama pada permainan paintball, berupa peluru yang berisi cairan berwarna / cat. Bahan cat yang digunakan tidak berbahaya bagi manusia maupun bagi lingkungan.
              </p>
              <p>
                Kualitas dari permainan paintball ditentukan kuat oleh kualitas dari peluru yang digunakan. Ciri peluru dengan kualitas baik ialah bentuknya bulat sempurna sehingga memiliki akurasi yang baik, kulitnya tipis sehingga mudah pecah ketika terkena badan atau objek lain, serta memiliki cat yang berwarna mencolok ketika mengena objek dengan latar belakang warna apapun dan sulit untuk dihapus selama permainan masih berlangsung. Beberapa peluru terbaik saat ini memiliki cat berwarna metalik sehingga sangat terlihat ketika mengenai tubuh dan sulit untuk dihapus.
              </p>
            </div>
          </div>

          <div class="row event-item">
            <div class="col-lg-6">
              <img src="assets/img/masker.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3>Masker / Google</h3>
              <p class="font-italic">
                Goggle adalah perangkat keamanan untuk melindungi area wajah terutama bagian mata. Selama berada di arena permainan, pemain tidak diperkenankan ntuk melepas masker. Saat ini masker untuk permainan paintball sudah dibuat sedemikian rupa sehingga sangat nyaman digunakan dan tentu saja aman.
              </p>
            </div>
          </div>

          <div class="row event-item">
            <div class="col-lg-6">
              <img src="assets/img/body p.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3>Body Protector</h3>
              <p class="font-italic">
                Pengaman yang lebih dikhususkan untuk melindungi area dada dan punggung untuk mengurangi tekanan tembak peluru pada saat mengenai badan dan punggung.
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Events Section -->
  </main><!-- End #main -->
  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
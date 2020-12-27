<?php 
    include ("../koneksi/koneksi.php");
    $sql = mysqli_query($con, "SELECT MAX(kode_member) AS kode FROM member");
    $data = mysqli_fetch_array($sql);
    $kode = $data['kode'];
    $urutan = (int) substr($kode, 3, 3);
    $urutan++;
    $huruf = "M";
    $kode_member = $huruf . sprintf("%03s", $urutan);
?>
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <form class="splash-container" role="form" method="POST">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Registrations Form</h3>
                <p>Please enter your user information.</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" id="nama_member" name="nama_member" required="" placeholder="Nama Lengkap" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" id="username" name="username" required="" placeholder="Username" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="email" id="email" name="email" required="" placeholder="E-mail" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" id="pass_awal" name="pass_awal" type="password" required="" placeholder="Password">
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit" name="simpan">Register My Account</button>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p>Already member? <a href="../member/login.php" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>
</body>

 
</html>

<?php
    if(isset($_POST['simpan']))
    {
        $nama_member = $_POST['nama_member'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $pass_awal = $_POST['pass_awal'];
        $pass = md5($pass_awal);
        
        $simpan = mysqli_query($con, "INSERT INTO `member`(`kode_member`, `nama_member`, `email`, `username`, `pass`, `pass_awal`) VALUES ('$kode_member','$nama_member','$email','$username','$pass','$pass_awal')");
        
        if($simpan)
        {
            ?>
                <script type="text/javascript">
                    alert("Berhasil Register");
                    window.location = "../member/login.php";
                </script>
            <?php
        }
    }
?>
<?php
session_start();
include "../koneksi/koneksi.php";


$login = mysqli_query($con, "select * from pengguna where username = '" . $_POST['username'] . "' and pass = '".md5($_POST['password'])."'");

$rowcount = mysqli_num_rows($login);

$data = mysqli_fetch_array($login);

if ($rowcount == 1) 
{
	$_SESSION['username'] = $_POST['username'];
	$_SESSION['password'] = md5($_POST['password']);
	header("Location: ../admin/index.php");
}
else
{
	echo '<script>alert(\'Username atau password tidak sesuai!\')
			setTimeout(\'location.href="../login.php"\' ,0);</script>';
			exit;
}

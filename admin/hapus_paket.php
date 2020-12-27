<?php
	include ("../koneksi/koneksi.php");
	session_start();
	if(!isset($_SESSION['username'])) {
    	include("login.php");
    	exit;
	}
	$pengguna=$_SESSION['username'];

	$kode_paket = $_GET['kode_paket'];

	$hapus = mysqli_query($con, "DELETE FROM paket WHERE kode_paket = '$kode_paket'");

	if ($hapus) {
		?>
		<script type="text/javascript">
			alert("Data Berhasil di Hapus");
			window.location="../admin/paket.php";
		</script>
		<?php
	}
?>
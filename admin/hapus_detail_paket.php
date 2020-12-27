<?php
	include ("../koneksi/koneksi.php");
	session_start();
	if(!isset($_SESSION['username'])) {
    	include("login.php");
    	exit;
	}
	$pengguna=$_SESSION['username'];

	$kode_detail_paket = $_GET['kode_detail_paket'];

	$hapus = mysqli_query($con, "DELETE FROM `sub_paket` WHERE kode_subPaket = '$kode_detail_paket'");

	if ($hapus) {
		?>
		<script type="text/javascript">
			alert("Data Berhasil di Hapus");
			window.location="../admin/detail_paket.php";
		</script>
		<?php
	}
?>
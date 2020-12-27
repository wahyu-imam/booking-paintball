<?php
	include ("../koneksi/koneksi.php");
	session_start();
	if(!isset($_SESSION['username'])) {
    	include("login.php");
    	exit;
	}
	$pengguna=$_SESSION['username'];

	$kode_barang = $_GET['kode_barang'];

	$hapus = mysqli_query($con, "DELETE FROM barang WHERE kode_barang = '$kode_barang'");

	if ($hapus) {
		?>
		<script type="text/javascript">
			alert("Data Berhasil di Hapus");
			window.location="../admin/barang.php";
		</script>
		<?php
	}
?>
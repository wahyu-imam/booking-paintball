<?php
	include ("../koneksi/koneksi.php");
	session_start();
	if(!isset($_SESSION['username'])) {
    	include("login.php");
    	exit;
	}
	$pengguna=$_SESSION['username'];

	$kode_jadwal = $_GET['kode_jadwal'];

	$hapus = mysqli_query($con, "DELETE FROM jadwal WHERE kode_jadwal = '$kode_jadwal'");

	if ($hapus) {
		?>
		<script type="text/javascript">
			alert("Data Berhasil di Hapus");
			window.location="../admin/jadwal.php";
		</script>
		<?php
	}
?>
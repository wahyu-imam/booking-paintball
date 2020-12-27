<?php
	include ("../koneksi/koneksi.php");
	session_start();
	if(!isset($_SESSION['username'])) {
    	include("login.php");
    	exit;
	}
	$pengguna=$_SESSION['username'];

	$kode_fasilitas = $_GET['kode_fasilitas'];

	$hapus = mysqli_query($con, "DELETE FROM fasilitas WHERE kode_fasilitas = '$kode_fasilitas'");

	if ($hapus) {
		?>
		<script type="text/javascript">
			alert("Data Berhasil di Hapus");
			window.location="../admin/fasilitas.php";
		</script>
		<?php
	}
?>
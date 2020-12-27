<?php
	include ("../koneksi/koneksi.php");
	session_start();
	if(!isset($_SESSION['username'])) {
    	include("login.php");
    	exit;
	}
	$pengguna=$_SESSION['username'];

	$kode_event = $_GET['kode_event'];

	$hapus = mysqli_query($con, "DELETE FROM event WHERE kode_event = '$kode_event'");

	if ($hapus) {
		?>
		<script type="text/javascript">
			alert("Data Berhasil di Hapus");
			window.location="../admin/event.php";
		</script>
		<?php
	}
?>
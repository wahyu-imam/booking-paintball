<?php
	include ("../koneksi/koneksi.php");
	session_start();
	if(!isset($_SESSION['username'])) {
    	include("login.php");
    	exit;
	}
	$pengguna=$_SESSION['username'];

	$kode_member = $_GET['kode_member'];

	$hapus = mysqli_query($con, "DELETE FROM member WHERE kode_member = '$kode_member'");

	if ($hapus) {
		?>
		<script type="text/javascript">
			alert("Data Berhasil di Hapus");
			window.location="../admin/member.php";
		</script>
		<?php
	}
?>
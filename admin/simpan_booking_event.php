<?php 
	include("../koneksi/koneksi.php");
	$kode_booking = json_decode($_POST['kode_booking']);
    $kode_member = json_decode($_POST['kode_member']);
    $jenis_booking = json_decode($_POST['jenis_booking']);
    $kode_detail_booking = json_decode($_POST['kode_detail_booking']);
    $kode_event = json_decode($_POST['kode_event']);
    $total = json_decode($_POST['total']);
    $bayar = json_decode($_POST['bayar']);
    $kembali = json_decode($_POST['kembali']);
    $simpan_booking = mysqli_query($con, "INSERT INTO `booking`(`kode_booking`, `jenis_booking`, `kode_member`, `biaya`, `bayar`, `kembali`,konfirmasi) VALUES ('$kode_booking','$jenis_booking','$kode_member','$total','$bayar','$kembali','Belum')");

    for ($i=0; $i < count($kode_detail_booking); $i++) {
     	$kode_dtl_booking = $kode_detail_booking[$i];
     	$kode_event2 = $kode_event[$i];
    	$simpan_detail_booking = mysqli_query($con, "INSERT INTO `detail_booking`(`kode_detail_booking`, `kode_booking`, `kode_event`) VALUES ('$kode_dtl_booking','$kode_booking','$kode_event2')");
    }
    if ($simpan_booking) {
    	$hasil = "Booking Berhasil";
    }else{
    	$hasil = "Booking Gagal";
    }
    print($hasil);
?>
<?php 
	include("../koneksi/koneksi.php");
	$kode_booking = json_decode($_POST['kode_booking']);
    $kode_member = json_decode($_POST['kode_member']);
    $tgl_booking = json_decode($_POST['tgl_booking']);
    $kode_jadwal = json_decode($_POST['kode_jadwal']);
    $jenis_booking = json_decode($_POST['jenis_booking']);
    $kode_detail_booking = json_decode($_POST['kode_detail_booking']);
    $kode_subPaket = json_decode($_POST['kode_subPaket']);
    $total = json_decode($_POST['total']);
    $bayar = json_decode($_POST['bayar']);
    $kembali = json_decode($_POST['kembali']);

    $simpan_booking = mysqli_query($con, "INSERT INTO `booking`(`kode_booking`, `jenis_booking`, `tgl_booking`, `kode_jadwal`, `kode_member`, `biaya`, `bayar`, `kembali`, konfirmasi) VALUES ('$kode_booking','$jenis_booking','$tgl_booking','$kode_jadwal','$kode_member','$total','$bayar','$kembali','Belum')");

    for ($i=0; $i < count($kode_detail_booking); $i++) {
     	$kode_dtl_booking = $kode_detail_booking[$i];
     	$kode_sub_paket = $kode_subPaket[$i];
    	$simpan_detail_booking = mysqli_query($con, "INSERT INTO `detail_booking`(`kode_detail_booking`, `kode_booking`, `kode_subPaket`) VALUES ('$kode_dtl_booking','$kode_booking','$kode_sub_paket')");
    }
    if ($simpan_detail_booking) {
    	$hasil = "Booking Berhasil";
    }else{
    	$hasil = "Booking Gagal";
    }
    print($hasil);
?>
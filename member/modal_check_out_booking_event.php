<?php
	include("../koneksi/koneksi.php");
	$kode_booking = json_decode($_POST['kode_booking']);
    $kode_member = json_decode($_POST['kode_member']);
    $jenis_booking = json_decode($_POST['jenis_booking']);
    $kode_detail_booking = json_decode($_POST['kode_detail_booking']);
    $kode_event = json_decode($_POST['kode_event']);
    $nama_event = json_decode($_POST['nama_event']);
    $biaya = json_decode($_POST['biaya']);
    $total = 0;
    for ($i=0; $i < count($biaya); $i++) { 
        $total = $total + $biaya[$i];
    }

    $sqlMember = mysqli_query($con, "SELECT * FROM member WHERE kode_member = '$kode_member'");
    $tampilMember = mysqli_fetch_array($sqlMember);
    $nama_member = $tampilMember['nama_member'];
?>

<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header bg-success">
            <h5 class="modal-title text-white font-weight-bold">Transaksi Booking</h5>
            <button type="button" class="close text-black font-weight-bold" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    	<div class="modal-body">
        	<?php
                date_default_timezone_set('Asia/Jakarta');
                $tgl = gmdate("Y-m-d H:i:s", time()+60*60*7);
            ?>
            <input type="text" name="tglTransaksi" id="tglTransaksi" readonly="" class="h6 float-right text-right border-0 font-weight-bold text-gray-800" value="<?php echo $tgl ?>">
            <div><br><br></div>
            <input type="text" name="nama_member" id="nama_member" readonly="" class="h6 float-felt text-left border-0 font-weight text-gray-800" value="<?php echo 'Nama Member : '.$nama_member ?>">
            <br>
            <table id="example" class="table table-striped table-bordered first" style="width:100%">
                <thead>
                    <tr>
                        <th width="6%">No.</th>
                        <th>Nama Event</th>
                        <th width="10%">Biaya Daftar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php 
                            $no = 1;
                            for ($i=0; $i < count($kode_event); $i++) { 
                                ?>
                                <tr>
                                    <th><?php echo $no++ ?></th>
                                    <th>
                                        <?php 
                                        echo $nama_event[$i];
                                        ?>
                                    </th>
                                    <th><?php echo $biaya[$i] ?></th>
                                </tr>
                                <?php
                            }
                        ?>
                    </tr>
                </tbody>
            </table>
            <br>
            <div class="row">
                <div class="col-md-7">
                    <label class="h4 text-gray-900 font-weight float-left mx-3">Total Pembayaran Rp. <?php echo $total; ?></label>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <a href="javascript:void(0)" id="btn_transaksi" name="btn_transaksi" class="btn btn-success float-right btn-icon-split btn-sm open_booking">
                        <span>Booking</span>
                    </a>
                </div>
            </div>
    	</div>
    </div>
</div>

<script type="text/javascript">
	function getNilai(id){
        var nilai = document.getElementById(id).value;
        alert(nilai);
    }

    $(document).ready(function(){
    	$('#dataTable').on('click', '.open_booking', function(e){
    		var kode = $(this).attr("id");
    		var array = kode.split(',');
    		var kode_jadwal = array[0];
    		var jam = array[1];
            var getHari = "<?php echo $getHari ?>";
    		document.getElementById('kode_jadwal').value = kode_jadwal;
    		document.getElementById('jadwal_jam').value = jam;
            document.getElementById('hari').value = getHari;
    		$('#tampilModalCekJadwal').modal('hide');
    	});
    });
</script>

<script type="text/javascript">
    $("#btn_transaksi").click(function(){
            var kode_booking = "<?php echo $kode_booking ?>";
            var kode_member = "<?php echo $kode_member ?>";
            var jenis_booking = "<?php echo $jenis_booking ?>";
            var kode_detail_booking = JSON.parse('<?php echo JSON_encode($kode_detail_booking);?>');
            var kode_event = JSON.parse('<?php echo JSON_encode($kode_event);?>');
            var total = "<?php echo $total ?>";

            var sendKodeBooking = JSON.stringify(kode_booking);
            var sendKodeMember = JSON.stringify(kode_member);
            var sendJenisBooking = JSON.stringify(jenis_booking);
            var sendKodeDetailBooking = JSON.stringify(kode_detail_booking);
            var sendKodeEvent = JSON.stringify(kode_event);
            var sendTotal = JSON.stringify(total);
            $.ajax({
                url: "simpan_booking_event.php",
                type: "post",
                data: {kode_booking : sendKodeBooking, kode_member : sendKodeMember, jenis_booking : sendJenisBooking, kode_detail_booking : sendKodeDetailBooking, kode_event : sendKodeEvent, total : sendTotal},
                success : function(data){
                    alert(data);
                    setTimeout(function(){
                        location.href = "booking_event.php";
                    });
                }
            });
        });
</script>
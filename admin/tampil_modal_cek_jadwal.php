<?php
	include("../koneksi/koneksi.php");
	$tgl = json_decode($_POST["tgl"]);
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header bg-success">
            <h5 class="modal-title text-white font-weight-bold">Jadwal Lapangan</h5>
            <button type="button" class="close text-black font-weight-bold" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    	<div class="modal-body">
        	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            	<thead class="text-gray-900 text-center font-weight-bold bgtabel">
                	<tr>
                    	<th width="6%">No</th>
                    	<th>Jam</th>
                    	<th>Rentang</th>
                    	<th>Status</th>
                    	<th width="8%">Aksi</th>
                	</tr>
            	</thead>
            	<tbody>
                	<?php 
                    	$pecah = explode('-', $tgl);
                    	$tgl = $pecah[2].'-'.$pecah[1].'-'.$pecah[0];
                        $getHari = getHari($tgl);
                    	$sql = mysqli_query($con, "SELECT jam - INTERVAL '1' HOUR AS sebelum, jam, jam + INTERVAL '1' HOUR AS sesudah FROM booking, jadwal WHERE booking.kode_jadwal=jadwal.kode_jadwal AND tgl_booking = '$tgl'");
                    	$sebelum = [];
                    	$jam = [];
                    	$sesudah = [];
                    	$i = 0;
                    	while ($tampil = mysqli_fetch_array($sql)) {
                        	$sebelum[$i] = $tampil['sebelum'];
                        	$jam[$i] = $tampil['jam'];
                        	$sesudah[$i] = $tampil['sesudah'];
                        	$i++;
                    	}
                    	$array = array_merge($sebelum, $jam, $sesudah);
                    	$sql = "SELECT * FROM jadwal ";
                    	for ($i=0; $i < count($array); $i++) { 
                        	if ($i == count($array) - 1) {
                            	$sql = $sql."jam != '$array[$i]'";
                        	}else if($i == 0){
                            	$sql = $sql."WHERE jam != '$array[$i]' AND ";
                        	}else{
                            	$sql = $sql."jam != '$array[$i]' AND ";
                        	}
                    	}
                    	$sql2 = mysqli_query($con, $sql);
                    	$no = 1;
                    	while ($tampil2 = mysqli_fetch_array($sql2)) {
                        	?>
                        	<tr>
                            	<td><?php echo $no++; ?></td>
                            	<td><?php echo $tampil2['jam']; ?></td>
                            	<td><?php echo $tampil2['rentang']; ?></td>
                            	<td>Free</td>
                            	<td>
                                	<a href="javascript:void(0)" class="btn btn-success btn-icon-split btn-sm open_booking" id="<?php echo $tampil2['kode_jadwal'].','.$tampil2['jam'] ?>">
                                		<span class="icon text-white-100">
                                			<i class="fas fa-check"></i>
                                		</span>
                                	</a>
                            	</td>
                        	</tr>
                        	<?php
                    	}
                	?>
            	</tbody>
        	</table>
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

<?php 
    function getHari($tanggal){
        //format $tanggal YYYY-MM-DD
        $tgl=substr($tanggal,8,2);
        $bln=substr($tanggal,5,2);
        $thn=substr($tanggal,0,4);
        $info=date('w', mktime(0,0,0,$bln,$tgl,$thn));
        switch($info){
            case '0': return "Minggu"; break;
            case '1': return "Senin"; break;
            case '2': return "Selasa"; break;
            case '3': return "Rabu"; break;
            case '4': return "Kamis"; break;
            case '5': return "Jumat"; break;
            case '6': return "Sabtu"; break;
        };
    };
?>
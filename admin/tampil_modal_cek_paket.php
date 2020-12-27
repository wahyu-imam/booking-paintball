<?php
	include("../koneksi/koneksi.php");
	$hari = json_decode($_POST["hari"]);
    $jam = json_decode($_POST["jam"]);
?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header bg-success">
            <h5 class="modal-title text-white font-weight-bold">Paket Tersedia</h5>
            <button type="button" class="close text-black font-weight-bold" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
    	<div class="modal-body">
        	<table class="table table-bordered" id="dataTablePaket" width="100%" cellspacing="0">
            	<thead class="text-gray-900 text-center font-weight-bold bgtabel">
                	<tr>
                    	<th width="6%">No</th>
                    	<th>Nama Paket</th>
                        <th width="15%">Harga</th>
                    	<th width="8%">Aksi</th>
                	</tr>
            	</thead>
            	<tbody>
                	<?php 
                    	if($hari == "Sabtu" || $hari == "Minggu"){
                            $hari = "Sabtu - Minggu";
                        }else{
                            $hari = "Senin - Jumat";
                        }
                    	$sql = mysqli_query($con, "SELECT * FROM sub_paket, paket WHERE sub_paket.kode_paket=paket.kode_paket AND nama_sub = '$hari'");
                        $no = 1;
                    	while ($tampil = mysqli_fetch_array($sql)) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $tampil['nama_paket'].' '.$tampil['nama_sub'].' '.$tampil['ketentuan']; ?></td>
                                <td><?php echo $tampil['harga']; ?></td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-success btn-icon-split btn-sm open_paket" id="<?php echo $tampil['kode_subPaket'].';'.$tampil['nama_paket'].';'.$tampil['nama_sub'].';'.$tampil['ketentuan'].';'.$tampil['harga'] ?>">
                                        <span class="icon text-white-100">
                                            <i class="fas fa-check"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                            <?php
                        }
                        $sql2 = mysqli_query($con, "SELECT * FROM sub_paket, paket WHERE sub_paket.kode_paket=paket.kode_paket AND nama_sub != 'Senin - Jumat' AND nama_sub != 'Sabtu - Minggu'");
                        while ($tampil2 = mysqli_fetch_array($sql2)) {
                            ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $tampil2['nama_paket'].' '.$tampil2['nama_sub'] ?></td>
                                <td><?php echo $tampil2['harga']; ?></td>
                                <td>
                                    <a href="javascript:void(0)" class="btn btn-success btn-icon-split btn-sm open_paket2" id="<?php echo $tampil2['kode_subPaket'].';'.$tampil2['nama_paket'].';'.$tampil2['nama_sub'].';'.$tampil2['harga'] ?>">
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
        $('#dataTablePaket').on('click', '.open_paket', function(e){
            var kode = $(this).attr("id");
            var array = kode.split(";");
            var kode_subPaket = array[0];
            var nama_paket = array[1];
            var nama_sub = array[2];
            var ketentuan = array[3];
            var harga = array[4];

            document.getElementById('kode_subPaket').value = kode_subPaket+';'+nama_paket+';'+nama_sub+';'+ketentuan;
            document.getElementById('nama_paket').value = nama_paket+' '+nama_sub+' '+ketentuan;
            document.getElementById('harga').value = harga;
            $('#tampilModalCekPaket').modal('hide');
        });
    });

    $(document).ready(function(){
        $('#dataTablePaket').on('click', '.open_paket2', function(e){
            var kode = $(this).attr("id");
            var array = kode.split(";");
            var kode_subPaket = array[0];
            var nama_paket = array[1];
            var nama_sub = array[2];
            var harga = array[3];

            document.getElementById('kode_subPaket').value = kode_subPaket+';'+nama_paket+';'+nama_sub;
            document.getElementById('nama_paket').value = nama_paket+' '+nama_sub;
            document.getElementById('harga').value = harga;
            $('#tampilModalCekPaket').modal('hide');
        });
    });
</script>
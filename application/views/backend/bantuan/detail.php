<div class="row">
	<div class="col-md-12">



	
	<div class="card card-primary">
		<div class="card-header">
			<div class="col-md-12">
			<h3 class="float-left">Detail Bantuan</h3>

			<button type="button" class="btn btn-sm btn-success float-right" onclick="printContent('print')"><i class="fa fa-print"></i> Print</button> 
			</div>
		</div>
<script>
function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
</script>
		<div class="card-body" id="print">
			<div class="row p-3">
				<div class="col-md-6">
					<table>
						<tr>
							<td>Pemberi Bantuan</td>
							<td>:</td>
							<td><?= $bantuan['bantuan_dari'] ?></td>
						</tr>
						<tr>
							<td>Jenis Bantuan</td>
							<td>:</td>
							<td><?= $bantuan['bantuan_jenis'] ?></td>
						</tr>
						<tr>
							<td>Bantuan Keterangan</td>
							<td>:</td>
							<td><?= $bantuan['bantuan_keterangan'] ?></td>
						</tr>
						
					</table>
				</div>
				<div class="col-6">
					<table>
						
						
						<tr>
							<td>Bantuan Jumlah</td>
							<td>:</td>
							<td>
							<?php if ($bantuan['bantuan_jenis']=='rumah'){ ?>
								<?= $bantuan['bantuan_jumlah'] ?> Unit
								
							<?php }elseif ($bantuan['bantuan_jenis']=='uang') {?>

								Rp. <?= nominal($bantuan['bantuan_jumlah']) ?> ,- / KK</td>

							<?php }else{ ?>
								<?= $bantuan['bantuan_jumlah'] ?> Kg
							<?php } ?>
						</tr>
						<tr>
							<td>Bantuan Periode</td>
							<td>:</td>
							<td><?= $bantuan['bantuan_periode'] ?></td>
						</tr>
					</table>
				</div>
			</div>
			<hr style="border: 1px solid black;width: 97%;margin:0 auto; ">

			<div class="row p-3">

				<div class="col-md-12 ">
					<h5>Nama Penerima Bantuan</h5>
					<?php 
					$penerima = $this->BantuanModel->lihat_penerima_bantuan($bantuan['bantuan_id']);
					 ?>

					 <table class="table  table-bordered table-hover" style="width:100%">
				<thead>
					<tr>
						<th style="width: 40px;">No</th>
						<th>Nama Penerima</th>
						<th>Nomor KK</th>

					</tr>
				</thead>
				<tbody>
					<?php if (count($penerima)==0){ ?>
						<tr>
							<td colspan="2" class="text-center text-danger">Belum ada penerima</td>
						</tr>
					<?php }else{ ?>

					<?php 
					$no =1;
					foreach ($penerima as $val): ?>
						
					<tr>
						<td><?= $no ?></td>
						<td><?= $val['kk_kepala'] ?></td>
						<td><?= $val['kk_no'] ?></td>
						
					</tr>

					<?php 
					$no++;
					endforeach ?>
					<?php } ?>
				</tbody>
			</table>
				</div>
			</div>
		</div>
	</div>

	</div>
</div>

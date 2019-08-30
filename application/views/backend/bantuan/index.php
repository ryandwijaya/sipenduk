<div class="row">
	<div class="col-md-12">
		
	
	<div class="card card-primary">
		<div class="card-header">
			<div class="col-md-12">
			<h3 class="float-left">List Bantuan</h3>
			
			
			<?php if ($this->session->userdata('session_level')=='admin'): ?>
			<a href="<?= base_url() ?>bantuan/tambah"><button type="button" class="btn btn-sm btn-primary float-right ml-2">Berikan Bantuan</button> </a>
			<?php endif ?>
			<?php if ($this->session->userdata('session_level')=='penduduk'): ?>
				
			<a href="<?= base_url() ?>bantuan/ajukan"><button type="button" class="btn btn-sm btn-primary float-right ml-2">Ajukan Bantuan</button> </a>

			<?php endif ?>
			<a href="<?= base_url() ?>bantuan/export"><button type="button" class="btn btn-sm btn-success float-right">Export</button> </a>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<table id="example" class="table  table-bordered table-hover" style="width:100%">
				<thead>
					<tr>
						<th style="width: 40px;">No</th>
						<th>Bantuan Dari</th>
						<th>Jenis Bantuan</th>
						<th>Jumlah</th>
						<th>Keterangan</th>
						<th>Periode</th>
						<th class="text-center">Status</th>
						<th class="text-center text-success"><i class="fa fa-wrench fa-lg" title="aksi"></i></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no =1;
					foreach ($bantuan as $val): ?>
						
					<tr>
						<td><?= $no ?></td>
						<td><?= $val['bantuan_dari'] ?></td>
						<td><?= $val['bantuan_jenis'] ?></td>
						<?php if ($val['bantuan_jenis']=='uang'){ ?>
							
						<td>Rp. <?= nominal($val['bantuan_jumlah']) ?> ,-</td>

						<?php }elseif ($val['bantuan_jenis']=='beras') { ?>
						<td><?= nominal($val['bantuan_jumlah']) ?> Kg</td>
						<?php } ?>
						<td><?= $val['bantuan_keterangan'] ?></td>
						<td><?= $val['bantuan_periode'] ?></td>
						<td class="text-center">
						<?php if ($val['bantuan_status']!='diterima'){ ?>
							<span class="text-warning" title="Sedang menunggu dikonfirmasi"><i class="fa fa-spinner"></i></span>
						<?php }else{ ?>
							<span class="text-success" title="Sudah dikonfirmasi"><i class="fa fa-check"></i></span>
						<?php } ?>
						</td>
						<td class="text-center">
							
							<?php if ($this->session->userdata('session_level')=='kades'){ ?>
								<?php if ($val['bantuan_status']=='waiting'){ ?>
									<form action="<?= base_url() ?>konfirmasi/<?= $val['bantuan_id'] ?>" method="POST">
									<button type="submit" name="konfirmasi" onclick="return confirm('Yakin ingin mengkonfirmasi ?')" class="btn btn-success" title="konfirmasi bantuan ?"><i class="fa fa-check"></i></button>
									<button type="submit" name="tolak" onclick="return confirm('Yakin ingin menolak bantuan ini ?')" class="btn btn-danger" title="tolak bantuan ?"><i class="fa fa-times"></i></button>
									</form>
								<?php }elseif ($val['bantuan_status'] =='diterima') { ?>
									<span class="text-success">Sudah dikonfirmasi</span>
								<?php }else{ ?>
									<span class="text-danger">Ditolak</span>
								<?php } ?>

							<?php }else{ ?>
							<?php if ($this->session->userdata('session_level')=='kesra'): ?>
								
							<a href="<?= base_url() ?>bantuan/delete/<?= $val['bantuan_id'] ?>" onclick="return confirm('Yakin ingin menghapus ?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
							<?php endif ?>
							<a href="<?= base_url() ?>bantuan/detail/<?= $val['bantuan_id'] ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
							<?php } ?>
						</td>
					</tr>

					<?php 
					$no++;
					endforeach ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>

	</div>
</div>

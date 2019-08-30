<div class="row">
	<div class="col-md-12">
		
	
	<div class="card card-primary">
		<div class="card-header">
			<div class="col-md-12">
			<h3 class="float-left">Data RT</h3>
			<a href="<?= base_url() ?>rt/tambah" class="btn btn-sm btn-primary float-right"><i class="fa fa-plus"></i> RT Baru</a> 
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<table id="example" class="table  table-bordered table-hover" style="width:100%">
				<thead>
					<tr>
						<th style="width: 40px;">No</th>
						<th>Nomor RT</th>
						<th>Nomor RW</th>
						<th>Kelurahan</th>
						<th class="text-center text-success"><i class="fa fa-wrench fa-lg" title="aksi"></i></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no =1;
					foreach ($rt as $val): ?>
						
					<tr>
						<td><?= $no ?></td>
						<td><?= $val['rt_nama'] ?></td>
						<td><?= $val['rw_nama'] ?></td>
						<td><?= $val['kel_nama'] ?></td>
						<td class="text-center">
							<a href="#" class="btn btn-warning"><i class="fa fa-edit"></i></a>
							<a href="<?= base_url() ?>rt/delete/<?= $val['rt_id'] ?>" onclick="return confirm('Yakin ingin menghapus RT <?= $val['rt_nama'] ?>? Menghapus berarti menghilangkan semua data yang memiliki kaitan dengan data ini !')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
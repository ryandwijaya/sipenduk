<div class="row">
	<div class="col-md-12">
		
	
	<div class="card card-primary">
		<div class="card-header">
			<div class="col-md-12">
			<h3 class="float-left">Data RW</h3>
			<a href="<?= base_url() ?>rw/tambah" class="btn btn-sm btn-primary float-right"><i class="fa fa-plus"></i> RW Baru</a> 
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<table id="example" class="table  table-bordered table-hover" style="width:100%">
				<thead>
					<tr>
						<th style="width: 40px;" class="">No</th>
						<th class="">Nomor RW</th>
						<th class="">Kelurahan</th>
						<th class="text-center "><i class="fa fa-wrench fa-lg" title="aksi"></i></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no =1;
					foreach ($rw as $val): ?>
						
					<tr>
						<td><?= $no ?></td>
						<td><?= $val['rw_nama'] ?></td>
						<td><?= $val['kel_nama'] ?></td>
						<td class="text-center">
							<a href="#" class="btn btn-warning"><i class="fa fa-edit"></i></a>
							<a href="<?= base_url() ?>rw/delete/<?= $val['rw_id'] ?>" onclick="return confirm('Yakin ingin menghapus RW <?= $val['rw_nama'] ?>? Menghapus berarti menghilangkan semua data yang memiliki kaitan dengan data ini !')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
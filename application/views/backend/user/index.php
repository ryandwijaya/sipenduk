<div class="row">
	<div class="col-md-12">
		
	
	<div class="card card-primary">
		<div class="card-header">
			<div class="col-md-12">
			<h3 class="float-left">List User</h3>
			
			<button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#modal_user">Tambah User</button> 
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<table id="example" class="table  table-bordered table-hover" style="width:100%">
				<thead>
					<tr>
						<th style="width: 40px;">No</th>
						<th>Username</th>
						<th>Nama</th>
						<th>Level</th>
						<th class="text-center text-success"><i class="fa fa-wrench fa-lg" title="aksi"></i></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no =1;
					foreach ($user as $val): ?>
						
					<tr>
						<td><?= $no ?></td>
						<td><?= $val['user_username'] ?></td>
						<td><?= $val['user_nama'] ?></td>
						<td><?= $val['user_level'] ?></td>
						<td class="text-center">
							<a href="<?= base_url() ?>kel/delete/<?= $val['user_id'] ?>" onclick="return confirm('Yakin ingin menghapus kelurahan <?= $val['user_nama'] ?>? Menghapus berarti menghilangkan semua data yang memiliki kaitan dengan data ini !')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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

<div class="row">
	<div class="col-md-12">
		
	
	<div class="card card-primary">
		<div class="card-header">
			<div class="col-md-12">
			<h3 class="float-left">List Penduduk</h3>
			<?php if ($this->session->userdata('session_level')=='penduduk'): ?>
			<a href="<?= base_url() ?>penduduk/tambah" class="btn btn-sm btn-primary float-right"><i class="fa fa-plus"></i> Penduduk Baru</a> 
			<?php endif ?>
			</div>
		</div>
		<div class="card-body">
			<div class="table-responsive">
			<table id="example" class="table  table-bordered table-hover" style="width:100%">
				<thead>
					<tr>
						<th style="width: 40px;">No</th>
						<?php if ($this->session->userdata('session_level')!='penduduk'): ?>
						<th>NIK</th>
						<?php endif ?>
						<th>Nama</th>
						<th class="text-center">Tempat Tanggal Lahir</th>
						<th class="text-center">Jenis Kelamin</th>
						<th class="text-center">Status</th>
						<?php if ($this->session->userdata('session_level')!='penduduk'): ?>
						<th class="text-center text-success"><i class="fa fa-wrench fa-lg" title="aksi"></i></th>
						<?php endif ?>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no =1;
					foreach ($penduduk as $val): ?>
						
					<tr>
						<td><?= $no ?></td>
						<?php if ($this->session->userdata('session_level')!='penduduk'): ?>
						<td><?= $val['penduduk_nik'] ?></td>
						<?php endif ?>
						<td><?= $val['penduduk_nama'] ?></td>
						<td class="text-center"><?= $val['penduduk_tempat_lahir'] ?>, <?= date_indo($val['penduduk_tgl_lahir']) ?></td>
						<td class="text-center"><?= $val['penduduk_jk'] ?></td>
						<td class="text-center"><?= $val['penduduk_status_acc'] ?></td>
						<?php if ($this->session->userdata('session_level')!='penduduk'): ?>
						<td class="text-center">
							<!-- <a href="#" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> -->
							<a href="<?= base_url() ?>lihat/<?= $val['penduduk_id'] ?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
							<a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>

						</td>
						<?php endif ?>
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
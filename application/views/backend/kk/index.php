<div class="row">
	<div class="col-md-12">
		
	
	<div class="card card-primary">
		<div class="card-header">
			<div class="col-md-12">
			<h3 class="float-left">List KK</h3>
			<?php if ($this->session->userdata('session_level')=='admin'): ?>
			<button type="button" class="btn btn-sm btn-primary float-right" data-toggle="modal" data-target="#modal_kk">Tambah KK</button> 
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
						<th>Nomor KK</th>
						<?php endif ?>
						<th>Kepala Keluarga</th>
						<th>Kepala Alamat</th>
						<th>Kel/RW/RT</th>
						<th>Kode Pos</th>
						<?php if ($this->session->userdata('session_level')!='penduduk'): ?>
						<th>Foto KK</th>
						<?php endif ?>
						<th class="text-center text-success"><i class="fa fa-wrench fa-lg" title="aksi"></i></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no =1;
					foreach ($kk as $val): ?>
						
					<tr>
						<td><?= $no ?></td>
						<?php if ($this->session->userdata('session_level')!='penduduk'): ?>
							
						<td><?= $val['kk_no'] ?></td>
						<?php endif ?>

						<td><?= $val['kk_kepala'] ?></td>
						<td><?= $val['kk_alamat'] ?></td>
						<td><?= $val['kel_nama'] ?> , RW. <?= $val['rw_nama'] ?> / RT. <?= $val['rt_nama'] ?></td>
						<td><?= $val['kk_kode_pos'] ?></td>
						<?php if ($this->session->userdata('session_level')!='penduduk'): ?>
						<td><a href="<?= base_url() ?>upload/kk/<?= $val['kk_foto'] ?>"><?= $val['kk_foto'] ?></a></td>
						<?php endif ?>

						<td class="text-center">
							<a href="<?= base_url() ?>lihat/kk/<?= $val['kk_id'] ?>" class="btn btn-info"><i class="fa fa-eye"></i></a>
							<?php if ($this->session->userdata('session_level')=='admin'): ?>
								
							<a href="<?= base_url() ?>kel/delete/<?= $val['kk_id'] ?>" onclick="return confirm('Yakin ingin menghapus ? berarti menghilangkan semua data yang memiliki kaitan dengan data ini !')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
							<?php endif ?>
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
<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
	var root = window.location.origin+'/sipenduk/';


		
		$('#s_kel').change(function(){
		var id = $(this).val();
		var getUrl = root+ 'ajax/rt/'+id;
		var html = '';
		$.ajax({
			url : getUrl,
			type : 'ajax',
			dataType : 'json',
			method: 'post',
			success : function(response){
				console.log(response);
				for (var i = 0; i < response.length; i++) {
					html+= '<option value='+response[i].rt_id+'> RW '+response[i].rw_nama+' / RT'+ response[i].rt_nama +'</option>';
				}
				console.log(html);
				$('#option-rt').html(html);


			},
			error: function(response){
				console.log(response.status);
			}
		});

	});

});

                </script>

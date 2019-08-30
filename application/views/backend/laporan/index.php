		<form action="<?= base_url() ?>laporan" method="POST">
<div class="row">
			<div class="col-md-6">
			<div class="form-group">
				<label>Pilih Kelurahan</label>
				<select name="kel_id" id="s_kel" class="form-control">
								<option disabled selected>-Pilih Kelurahan-</option>
								<?php foreach ($kelurahan as $v): ?>
									<option value="<?= $v['kel_id'] ?>"><?= $v['kel_nama'] ?></option>
								<?php endforeach ?>
				</select>
			</div>
			</div>

			<div class="col-md-4">
			<div class="form-group">
				<label>Pilih RW/RT</label>
				<select name="id_rt" id="opt-rt" class="form-control">
								<!-- <?php foreach ($rt as $a): ?>
								<option value="<?= $a['rt_id'] ?>">RW <?= $a['rw_nama'] ?> / RT <?= $a['rt_nama'] ?></option>
								<?php endforeach ?> -->
								
									<option disabled selected>-Pilih RW/RT-</option>
								
				</select>
			</div>
			</div>

			<div class="col-md-2">
			<div class="form-group">
				<label>.</label>
				<button type="submit" name="lihat" class="btn btn-primary form-control">Lihat</button>
			</div>
			</div>
</div>
		</form>


		<hr>

<div class="row">
	<div class="col-md-12">
		<form action="<?= base_url() ?>laporan/export" method="POST">
			
		<input type="hidden" name="key" value="<?= $this->input->post('id_rt') ?>">
		<button class="float-right ml-2 btn btn-info btn-sm p2" type="submit">export</button>
		</form>
	<div class="table-responsive">
		<table id="example" class="table  table-bordered table-hover" style="width:100%">
		
				<thead>
					<tr>
						<th style="width: 40px;">No</th>
						<th>NIK</th>
						<th>Nama</th>
						<th class="text-center">Tempat Tanggal Lahir</th>
						<th class="text-center">Jenis Kelamin</th>
						<!-- <th class="text-center">Status</th> -->
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no =1;
					foreach ($penduduk as $val): ?>
						
					<tr>
						<td><?= $no ?></td>
						<td><?= $val['penduduk_nik'] ?></td>
						<td><?= $val['penduduk_nama'] ?></td>
						<td class="text-center"><?= $val['penduduk_tempat_lahir'] ?>, <?= date_indo($val['penduduk_tgl_lahir']) ?></td>
						<td class="text-center"><?= $val['penduduk_jk'] ?></td>
						<!-- <td class="text-center"><?= $val['penduduk_status_acc'] ?></td> -->
						<td>
							<a href="<?= base_url() ?>lihat/<?= $val['penduduk_id'] ?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
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
				$('#opt-rt').html(html);


			},
			error: function(response){
				console.log(response.status);
			}
		});

	});

});

                </script>
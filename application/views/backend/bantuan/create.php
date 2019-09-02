<style>
	.bold{
		font-size: 14pt;
		font-weight: 800;
	}
</style>
<div class="row">
	<div class="col-md-12">
		<div class="card card-success">

			<div class="card-header">
				<h3>Isi form bantuan</h3>
			</div>
			<div class="card-body">
				
			
			<form action="<?= base_url() ?>bantuan/tambah" method="POST">

				
					
				<div class="row">
<!-- 					<div class="col-md-6">
						<div class="form-group">
	                      <label>Nama Penduduk</label>
	                      <select class="form-control select2" name="bantuan_penduduk_id">
	                      		<option selected disabled>-Pilih Penduduk-</option>
								<?php foreach ($kk as $value): ?>
									<option value="<?= $value['kk_id'] ?>">No KK. <?= $value['kk_no'] ?> ,  Kepala : <?= $value['kk_kepala'] ?> </option>
								<?php endforeach ?>
	                      </select>
	                    </div>
					</div> -->
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Pemberi Bantuan</label>
							<input type="text" class="form-control" name="bantuan_dari" placeholder="masukkan nama pemberi bantuan">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
	                      <label>Jenis Bantuan</label>
	                      <select class="form-control" id="j-bantuan" name="bantuan_jenis">
								<option disabled selected>-Pilih Jenis Bantuan-</option>
								<option value="beras">Beras</option>
								<option value="uang">Uang</option>
								<option value="rumah">Rumah Layak Huni</option>
	                      </select>
	                    </div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Jumlah Bantuan / KK</label>
							<input type="number" class="form-control" name="bantuan_jumlah">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
	                      <label>Periode</label>
	                      <select class="form-control" name="bantuan_periode">
								<option disabled selected>-Pilih Periode-</option>
								<option>1 - (Januari - April)</option>
								<option>2 - (Mei - Agustus)</option>
								<option>3 - (September - Desember)</option>
	                      </select>
	                    </div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="">Keterangan</label>
							<input type="text" class="form-control" name="bantuan_keterangan">
						</div>
					</div>
					
					
				</div>
				
				<hr>
				<div class="row">
					<div class="col-md-5">
						<input type="number" id="v-penerima" name="jumlah_penerima" class="form-control" placeholder="masukkan jumlah penerima">
					</div>
					<div class="col-md-2">
						<a class="btn btn-info form-control" id="b-penerima">Pilih Penerima</a>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div id="penerima">
							
						</div>
					</div>
				</div>
				<hr>
				
				<button type="submit" name="tambah" class="btn btn-success float-right ml-3">Ajukan</button>		
				<button class="btn btn-light float-right">Cancel</button>		

			</form>
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
		
		$('#b-penerima').click(function(){
		var id = $('#v-penerima').val();
		var jenis = $('#j-bantuan').val();
		var lengh = parseInt(id);
		var getUrl = root+'ajax/kk/'+jenis+'';
		var html = '';
		var opt = '';
		$.ajax({
			url : getUrl,
			type : 'ajax',
			dataType : 'json',
			method: 'post',
			success : function(response){
				console.log(response);
				if (jenis == 'rumah') {

				for (var i = 0; i < response.length; i++) {
						opt+='<option value="'+response[i].kk_id+'">No. KK ['+response[i].kk_no+'] | Nama Kepala : '+response[i].kk_kepala+' | Penghasilan : '+  response[i].kk_penghasilan+' /bln ( '+ response[i].pengajuan_keterangan +' ) </option>';
				}
				for (var i = 0; i < lengh ; i++) {
					html+='<select class="form-control select2 mt-2" name="penerima'+i+'">'
					html+='<option disabled selected>-Pilih KK-</option>'
					html+=opt;
					html+='</select>';
					
				}

				}else if(jenis == 'uang'){

				for (var i = 0; i < response.length; i++) {
						opt+='<option value="'+response[i].kk_id+'">No. KK ['+response[i].kk_no+'] | Nama Kepala : '+response[i].kk_kepala+' | Penghasilan : '+  response[i].kk_penghasilan+' /bln ( '+ response[i].pengajuan_keterangan +' ) </option>';
				}
				for (var i = 0; i < lengh ; i++) {
					html+='<select class="form-control select2 mt-2" name="penerima'+i+'">'
					html+='<option disabled selected>-Pilih KK-</option>'
					html+=opt;
					html+='</select>';
					
				}

				}else{

				}
				
				console.log(html);
				$('#penerima').html(html);


			},
			error: function(response){
				console.log(response.status);
			}
		});

	});


});

                </script>



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
				<h3>Isi form pengajuan</h3>
			</div>
			<div class="card-body">
				
			
			<form action="<?= base_url() ?>bantuan/ajukan" method="POST">

				
					
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
							<?php 
							$get_kk = $this->KkModel->get_satuan($this->session->userdata('session_id'));
							 ?>
							<label for="">No KK</label>
							<input type="text" class="form-control" name="bantuan_dari" value="<?php echo $get_kk['kk_no'] ?> | Nama Kepala : <?php echo $get_kk['kk_kepala'] ?>" readonly><input type="hidden" class="form-control" name="bantuan_dari" value="<?php echo $get_kk['kk_id'] ?>" readonly>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
	                      <label>Jenis Bantuan</label>
	                      <select class="form-control" name="bantuan_jenis">
								<option disabled selected>-Pilih Jenis Bantuan-</option>
								<option value="beras">Beras</option>
								<option value="uang">Uang</option>
								<option value="rumah">Rumah Layak Huni</option>
	                      </select>
	                    </div>
					</div>
				</div>

				<div class="row">
					
					

					<div class="col-md-12">
						<div class="form-group">
							<label for="">Keterangan</label>
							<textarea class="form-control" name="keterangan"></textarea>
						</div>
					</div>
					
					
				</div>
				
				
				
				<button type="submit" name="tambah" class="btn btn-success float-right ml-3">Ajukan</button>		
				<button class="btn btn-light float-right">Cancel</button>		

			</form>
			</div>
		</div>

	</div>
</div>

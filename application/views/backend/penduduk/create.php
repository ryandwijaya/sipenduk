<div class="row">
	<div class="col-md-12">
		<div class="card card-success">

			<div class="card-header">
				<h3>Isi form kependudukan</h3>
			</div>
			<div class="card-body">
				
			
			<form action="<?= base_url() ?>penduduk/tambah" method="POST">

				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<label for="">Dari KK</label>
							<?php if ($this->session->userdata('session_level')=='penduduk'){ ?>
							<input type="hidden" name="kk_id" class="form-control" readonly value="<?= $this->session->userdata('session_id') ?>">
							<?php $get_kk = $this->KkModel->get_satuan($this->session->userdata('session_id')); ?>
							<input type="text" name="kk_info" class="form-control" readonly value="<?php echo $get_kk['kk_no'].' | Nama Kepala : '.$get_kk['kk_kepala'] ?>">
							<?php }else{ ?>
							<select name="kk_id" id="s_kel" class="form-control select2">
								<option disabled selected>-Pilih KK-</option>
								<?php foreach ($kk as $v): ?>
									<option value="<?= $v['kk_id'] ?>"><?= $v['kk_no'] ?> - <?= $v['kk_kepala'] ?></option>
								<?php endforeach ?>
							</select>
							<?php } ?>
						</div>
					</div>
					<div class="col-md-4 mt-4">
						<button name="simpan" type="submit" class="btn btn-success float-right ml-4">Simpan</button>
						<a href="#" class="btn btn-light float-right">Cancel</a>
					</div>
					
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Nama Penduduk</label>
							<input type="text" class="form-control" required name="penduduk_nama">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">NIK</label>
							<input type="text" class="form-control" required name="penduduk_nik">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Status Hubungan</label>
							<input type="text" class="form-control" required name="penduduk_status_hub" placeholder="anak /ibu /ayah">
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Tempat Lahir</label>
							<input type="text" class="form-control" required name="penduduk_tempat_lahir">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Tanggal Lahir</label>
							<input type="date" class="form-control" required name="penduduk_tgl_lahir">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="">Agama</label>
							<select  class="form-control" required name="penduduk_agama">
								<option selected disabled>-Pilih Agama-</option>
								<option value="Islam">Islam</option>
								<option value="Kristen">Kristen</option>
								<option value="Khatolik">Khatolik</option>
								<option value="Hindu">Hindu</option>
								<option value="Budha">Budha</option>
								<option value="Lainnya">Lainnya</option>
							</select>
						</div>
					</div>
					
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Pendidikan Terakhir</label>
							<select class="form-control" required name="penduduk_pend_terakhir">
								<option selected disabled>-Pilih Pendidikan-</option>
								<option value="SD">SD (Sederajat)</option>
								<option value="SMP">SMP (Sederajat)</option>
								<option value="SMA/SMK">SMA/SMK (Sederajat)</option>
								<option value="D3">D3</option>
								<option value="S1">S1 (Sederajat)</option>
								<option value="S2">S2</option>
								<option value="S3">S3</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Status</label>
							<select  class="form-control" required name="penduduk_status">
								<option selected disabled>-Pilih Status-</option>
								<option value="belum kawin">Belum Menikah</option>
								<option value="kawin">Sudah Menikah</option>
							</select>
						</div>
						
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Jenis Kelamin</label>
							<select  class="form-control" required name="penduduk_jk">
								<option selected disabled>-Pilih Jenis Kelamin-</option>
								<option value="Pria">Pria</option>
								<option value="Wanita">Wanita</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Pekerjaan</label>
							<input type="text" class="form-control" required name="penduduk_pekerjaan">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Pendapatan / Bulan</label>
							<input type="number" class="form-control" required name="penduduk_pendapatan">
						</div>
					</div>
				</div>


				
				
				
				

			</form>
			</div>
		</div>

	</div>
</div>

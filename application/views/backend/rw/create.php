<div class="row">
	<div class="col-md-12">
		<div class="card card-success">

			<div class="card-header">
				<h3>Isi Data RW</h3>
			</div>
			<div class="card-body p-5">
				
			
			<form action="<?= base_url() ?>rw/tambah" method="POST">
				

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Kelurahan</label>
							<select name="rw_from_kel" class="form-control">
								<option disabled selected>-Pilih Kelurahan-</option>
								<?php foreach ($kel as $value): ?>
									<option value="<?= $value['kel_id'] ?>"><?= $value['kel_nama'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Nomor RW</label>
							<input type="text" class="form-control" name="rw_nama" placeholder="Masukkan nomor RW">
						</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<button name="simpan" type="submit" class="btn btn-success	 float-right ml-4">Simpan</button>
						<a href="#" class="btn btn-light float-right">Cancel</a>
					</div>
				</div>
				

			</form>
			</div>
		</div>

	</div>
</div>
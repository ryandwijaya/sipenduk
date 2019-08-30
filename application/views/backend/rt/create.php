<div class="row">
	<div class="col-md-12">
		<div class="card card-success">

			<div class="card-header">
				<h3>Isi data RT</h3>
			</div>
			<div class="card-body p-5">
				
			
			<form action="<?= base_url() ?>rt/tambah" method="POST">
				

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="">RW</label>
							<select name="rt_from_rw" class="form-control">
								<option disabled selected>-Pilih RW-</option>
								<?php foreach ($rw as $value): ?>
									<option value="<?= $value['rw_id'] ?>"><?= $value['rw_nama'] ?> ( Kel. <strong><?= $value['kel_nama'] ?></strong> )</option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="">Nomor RT</label>
							<input type="text" class="form-control" name="rt_nama" placeholder="Masukkan nomor RT">
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
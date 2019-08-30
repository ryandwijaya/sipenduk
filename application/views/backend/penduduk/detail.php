<div class="row">
	<div class="col-md-4 text-center">
		<div class="card card-primary">
		<div class="card-header text-center">
			<h3>Data <?= $penduduk['penduduk_nama'] ?></h3>
		</div>
		<div class="card-body">
		<img src="<?= base_url() ?>assets/profile_av.png" alt="no image" width="150" height="150">
		<hr>
		<h5><?= $penduduk['penduduk_nama'] ?></h5>
		<h5 title="NIK"><?= $penduduk['penduduk_nik'] ?></h5>
		
		<?php if ($penduduk['penduduk_status_acc']=='valid'){ ?>
			<h5 class="text-success">Valid</h5>
		<?php }elseif($penduduk['penduduk_status_acc']=='invalid'){ ?>
			<h5 class="text-danger">Invalid</h5>
		<?php }else{?>
			<h5 class="text-info">Belum di validasi</h5>
		<?php } ?>
		
		</div>
	</div>
	</div>

	<div class="col-md-8">
		<div class="card card-primary">
		<div class="card-header">
			<?php if ($this->session->userdata('session_level')=='rt' && $penduduk['penduduk_status_acc']=='waiting'): ?>
				
			<div class="row">

				<div class="col-md-12 border">
					<form action="<?= base_url() ?>konfirm/penduk/<?= $penduduk['penduduk_id'] ?>" method="POST">
					<label><b>Validasi Kependudukan :</b></label>
					<button type="submit" name="invalid"  onclick="return confirm('Silahkan klik OK untuk lanjutkan')" 	 class="btn btn-danger btn-sm">invalid</button>
					<button type="submit" name="valid" onclick="return confirm('Silahkan klik OK untuk lanjutkan')" 	 class="btn btn-success btn-sm">valid</button>
					</form>
				</div>
			</div>

			<?php endif ?>
		</div>
		<!-- <style>
			td{
				padding: 10px;
			}
		</style> -->
		<div class="card-body">
			<ul class="nav nav-tabs" id="myTab2" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="home-tab2" data-toggle="tab" href="#home2" role="tab"
                          aria-controls="home" aria-selected="true">Detail Penduduk</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab"
                          aria-controls="profile" aria-selected="false">Detail Pendapatan	</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab3" data-toggle="tab" href="#profile3" role="tab"
                          aria-controls="profile2" aria-selected="false">Detail Hubungan</a>
                      </li>
            </ul>

            <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab2">
                        <table class="table table-striped table-bordered table-hover">
				<tr>
					<td>Nik</td>
					<td>:</td>
					<td><?= $penduduk['penduduk_nik'] ?></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><?= $penduduk['penduduk_nama'] ?></td>
				</tr>	
				<tr>
					<td>Tempat / Tanggal Lahir</td>
					<td>:</td>
					<td><?= $penduduk['penduduk_tempat_lahir'] ?>, <?= date_indo($penduduk['penduduk_tgl_lahir']) ?></td>
				</tr>
				<tr>
					<td>Golongan Darah</td>
					<td>:</td>
					<td><?= $penduduk['penduduk_goldar'] ?></td>
				</tr>
				<tr>
					<td>Agama</td>
					<td>:</td>
					<td><?= $penduduk['penduduk_agama'] ?></td>
				</tr>
				<tr>
					<td>Pendidikan Terakhir</td>
					<td>:</td>
					<td><?= $penduduk['penduduk_pend_terakhir'] ?></td>
				</tr>
				<tr>
					<td>Pekerjaan</td>
					<td>:</td>
					<td><?= $penduduk['penduduk_pekerjaan'] ?></td>
				</tr>
				<tr>
					<td>Status</td>
					<td>:</td>
					<td><?= $penduduk['penduduk_status'] ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?= $penduduk['kk_alamat'] ?></td>
				</tr>
				
			</table>
                      </div>




                    <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                    <table class="table table-striped table-bordered table-hover">
							<tr>
								<td>Gaji Perbulan</td>
								<td>:</td>
								<td>Rp. <?= nominal($penduduk['penduduk_pendapatan']) ?> ,-</td>
							</tr>
					</table>
                    </div>

                    <div class="tab-pane fade" id="profile3" role="tabpanel" aria-labelledby="profile-tab3">
                    
                      </div>
                      
            </div>
			
		
		</div>
	</div>
	</div>
</div>
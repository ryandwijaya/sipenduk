<div class="row">
	<div class="col-md-4 text-center">
		<div class="card card-primary">
		<div class="card-header text-center">
			<h4>Data KK</h4>
		</div>
		<div class="card-body">
		<a href="<?= base_url() ?>upload/kk/<?= $kk['kk_foto'] ?>"><img src="<?= base_url() ?>upload/kk/<?= $kk['kk_foto'] ?>" alt="no image" width="150" height="150"></a>
		<hr>
		<h5 title="Kepala Keluarga"><?= $kk['kk_kepala'] ?></h5>
		<h5 title="Nomor KK"><?= $kk['kk_no'] ?></h5>
		
		
		
		</div>
	</div>
	</div>

	<div class="col-md-8">
		<div class="card card-primary">
		<div class="card-header">
			
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
                          aria-controls="home" aria-selected="true">Detail Keluarga</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="profile-tab2" data-toggle="tab" href="#profile2" role="tab"
                          aria-controls="profile" aria-selected="false">Detail Pendapatan	</a>
                      </li>
                      
            </ul>

            <div class="tab-content tab-bordered" id="myTab3Content">
                      <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab2">
                       		<table>
                       			<tr>
                       				<th>Nama</th>
                       				<th class="text-right" style="width: 300px;">Status Hubungan</th>
                       			</tr>
                       		<?php foreach ($keluarga as $var): ?>
                       			<tr>
                       				<td><?= $var['penduduk_nama'] ?></td>
                       				<td class="text-right"><?= $var['penduduk_status_hub'] ?></td>
                       			</tr>
                       		<?php endforeach ?>
                       		</table>
                      </div>




                    <div class="tab-pane fade" id="profile2" role="tabpanel" aria-labelledby="profile-tab2">
                    <table class="table table-striped table-bordered table-hover">
							<table>
                       			<tr>
                       				<th>Nama</th>
                       				<th class="text-right" style="width: 300px;">Pendapatan Per Bulan</th>
                       			</tr>
                       		<?php foreach ($keluarga as $var): ?>
                       			<tr>
                       				<td><?= $var['penduduk_nama'] ?></td>
                       				<td class="text-right">Rp. <?= nominal($var['penduduk_pendapatan']) ?> ,-</td>
                       			</tr>
                       		<?php endforeach ?>
                       		</table>
					</table>
                    </div>

                      
            </div>
			
		
		</div>
	</div>
	</div>
</div>
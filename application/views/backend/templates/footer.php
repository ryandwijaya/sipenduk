
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2019 <div class="bullet"></div> Design By <a href="https://user-jay.blogspot.com/" target="_blank">BangJay</a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="<?= base_url() ?>assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="<?= base_url() ?>assets/bundles/chartjs/chart.min.js"></script>
  <script src="<?= base_url() ?>assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?= base_url() ?>assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="<?= base_url() ?>assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?= base_url() ?>assets/js/custom.js"></script>

  <script src="<?= base_url() ?>assets/bundles/select2/dist/js/select2.full.min.js"></script>
  <script src="<?= base_url() ?>assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  <script>
  	$(document).ready(function() {
    $('#example').DataTable();
} );
  </script>



<div class="modal fade" id="modal_kk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah KK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <?= form_open('kk/tambah',array('enctype'=>'multipart/form-data')) ?>
                    
                    <div class="form-group">
                    <label>Nomor KK</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="far fa-map"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" name="kk_no">
                    </div>
                  </div>
                   <div class="form-group">
                    <label>Nama Kepala</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="far fa-map"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" name="kk_kepala">
                    </div>
                  </div>

                   <div class="form-group">
                    <label>Alamat</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="far fa-map"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" name="kk_alamat">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Kelurahan</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="far fa-map"></i>
                               </div>
                              </div>
                            <select name="" id="s_kel" class="form-control">
                              <option disabled selected>-Pilih Kelurahan-</option>
                              <?php foreach ($lurah as $value): ?>
                                <option value="<?= $value['kel_id'] ?>"><?= $value['kel_nama'] ?></option>
                              <?php endforeach ?>
                            </select>
                          </div>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="form-group">
                        <label>RW/RT</label>
                           <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="far fa-map"></i>
                               </div>
                              </div>
                            <select name="kk_rt" id="option-rt" class="form-control">
                              <option disabled selected>-Pilih RW/RT-</option>
                            </select>
                          </div>
                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label>Kode Pos</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="far fa-map"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" name="kk_kode_pos">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>KK Foto</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="far fa-map"></i>
                        </div>
                      </div>
                      <input type="file" class="form-control" name="kk_foto">
                    </div>
                  </div>
                   
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
              </div>
                  </form>
            </div>
          </div>
        </div>

<div class="modal fade" id="modal_kelurahan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kelurahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <form action="<?= base_url() ?>kel/tambah" method="post">
                    
                    <div class="form-group">
                    <label>Nama Kelurahan</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="far fa-map"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" name="kel_nama">
                    </div>
                  </div>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
              </div>
                  </form>
            </div>
          </div>
        </div>


        <div class="modal fade" id="modal_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kelurahan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                  <form action="<?= base_url() ?>user/tambah" method="post">
                    
                    <div class="form-group">
                    <label>Username</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-id-card"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" name="user_username">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Nama</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="far fa-id-badge"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" name="user_nama">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="far fa-lock"></i>
                        </div>
                      </div>
                      <input type="password" class="form-control" name="user_password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Level</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="far fa-map"></i>
                        </div>
                      </div>
                      <select name="user_level" class="form-control">
                        <option disabled selected>-Pilih Level-</option>
                        <option>kesra</option>
                        <option>kades</option>
                        <option>admin</option>
                        <option>rt</option>
                        <option>penduduk</option>
                      </select>
                    </div>
                  </div>
              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
              </div>
                  </form>
            </div>
          </div>
        </div>
</body>



</html>
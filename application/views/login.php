<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="<?=base_url()?>assets/assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="<?=base_url()?>assets/assets/images/favicon.png" type="image/x-icon">
    <title>GEMOLOGY LABORATORY | LOGIN</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/assets/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/assets/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/assets/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/assets/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/assets/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/assets/css/style.css">
    <link id="color" rel="stylesheet" href="<?=base_url()?>assets/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/assets/css/responsive.css">
  </head>
  <body>
    <!-- loader starts-->
    <div class="loader-wrapper">
      <div class="loader-index"><span></span></div>
      <svg>
        <defs></defs>
        <filter id="goo">
          <fegaussianblur in="SourceGraphic" stddeviation="11" result="blur"></fegaussianblur>
          <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo"> </fecolormatrix>
        </filter>
      </svg>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper">
      <div class="container-fluid p-0">
        <!-- Unlock page start-->
        <div class="authentication-main mt-0">
          <div class="row">
            <div class="col-12">
              <div class="login-card">
                <div>
                  <div><a class="logo" href="index.html"><img class="img-fluid for-light" src="<?=base_url()?>assets/assets/images/logo/logo.png" alt="looginpage"><img class="img-fluid for-dark" src="<?=base_url()?>assets/assets/images/logo/logo_dark.png" alt="looginpage"></a></div>
                  <div class="login-main">
                    <form class="theme-form" method="POST" action="Login/aksi_login">
                      <h4>Masuk Panel Sistem</h4>
                      <div class="form-group">
                        <label class="col-form-label">Username</label>
                        <div class="form-input position-relative">
                          <input name="username" class="form-control" type="text" name="login[username]" required="" placeholder="Enter Username">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-form-label">Enter your Password</label>
                        <div class="form-input position-relative">
                          <input name="password" class="form-control" type="password" name="login[password]" required="" placeholder="*********">
                          <div class="show-hide"><span class="show"></span></div>
                        </div>
                      </div>
                      <div class="form-group mb-0">
                        <button class="btn btn-primary btn-block w-100" type="submit">Masuk Sekarang</button>
                      </div>
                      <p class="mt-4 mb-0">Lupa Password ?<a class="ms-2" href="https://api.whatsapp.com/send?phone=6281233516499&text=Halo%20👋🏻%20Developer%20*AKIRA*%20Saya%20Gemology%20Laboratory%20Owner%20*Lupa*%20*Password*%20*Login*">Hubungi Kami</a></p>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Unlock page end-->
        <!-- page-wrapper Ends-->
        <!-- latest jquery-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- Bootstrap js-->
        <script src="<?=base_url()?>assets/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
        <!-- feather icon js-->
        <script src="<?=base_url()?>assets/assets/js/icons/feather-icon/feather.min.js"></script>
        <script src="<?=base_url()?>assets/assets/js/icons/feather-icon/feather-icon.js"></script>
        <!-- scrollbar js-->
        <!-- Sidebar jquery-->
        <script src="<?=base_url()?>assets/assets/js/config.js"></script>
        <!-- Plugins JS start-->
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="<?=base_url()?>assets/assets/js/script.js"></script>
        <!-- login js-->
        <!-- Plugin used-->
      </div>
    </div>
  </body>
</html>
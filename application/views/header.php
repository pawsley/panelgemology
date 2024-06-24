<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <link rel="icon" href="<?=base_url()?>assets/assets/images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="<?=base_url()?>assets/assets/images/favicon.ico" type="image/x-icon">
    <title>Welcome To Dashboard | AKIRA UNIVERSE</title>
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
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/assets/css/vendors/slick.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/assets/css/vendors/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/assets/css/vendors/animate.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/assets/css/style.css">
    <link id="color" rel="stylesheet" href="<?=base_url()?>assets/assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/assets/css/responsive.css">
  </head>
  <body onload="startTime()">
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
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-header">
        <div class="header-wrapper row m-0">
          <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="<?=base_url()?>"><img class="img-fluid" src="<?=base_url()?>assets/assets/images/logo/logo.png" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
          </div>
          <div class="left-header col-xxl-5 col-xl-6 col-lg-5 col-md-4 col-sm-3 p-0">
            <div class="notification-slider">
              <div class="d-flex h-100"> <img src="<?=base_url()?>assets/assets/images/giftools.gif" alt="gif">
                <h6 class="mb-0 f-w-400"><span class="font-primary">AKIRA Developer's </span><span class="f-light">Correctly Carft. </span></h6><i class="icon-arrow-top-right f-light"></i>
              </div>
              <div class="d-flex h-100"><img src="<?=base_url()?>assets/assets/images/giftools.gif" alt="gif">
                <h6 class="mb-0 f-w-400"><span class="f-light">Lets stay connect with </span></h6><a class="ms-1" href="https://akira.id" target="_blank">Us !</a>
              </div>
            </div>
          </div>
          <div class="nav-right col-xxl-7 col-xl-6 col-md-7 col-8 pull-right right-header p-0 ms-auto">
            <ul class="nav-menus">
                <!-- Stay Dark or Light Mode ASeeeek -->
              <li>
                <div class="mode">
                  <svg>
                    <use href="<?=base_url()?>assets/assets/svg/icon-sprite.svg#moon"></use>
                  </svg>
                </div>
              </li>
              <!-- Avatar User Role Disini -->
              <li class="profile-nav onhover-dropdown pe-0 py-0">
                <div class="media profile-media"><img class="b-r-10" src="<?=base_url()?>assets/assets/images/dashboard/user.png" alt="https://akira.id/">
                  <div class="media-body"><span>Superadmin</span>
                    <p class="mb-0 font-roboto">Owner's <i class="middle fa fa-angle-down"></i></p>
                  </div>
                </div>
                <ul class="profile-dropdown onhover-show-div">
                  <li><a href="./login.html"><i data-feather="log-in"></i><span>Keluar</span></a></li>
                </ul>
              </li>
            </ul>
          </div>
          <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">                        
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">{{name}}</div>
            </div>
            </div>
          </script>
          <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
        </div>
      </div>
      <!-- Page Header Ends -->
      <!-- Page Body Start-->
      <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper" sidebar-layout="stroke-svg">
          <div>
            <div class="logo-wrapper"><a href="<?=base_url()?>"><img class="img-fluid for-light" src="<?=base_url()?>assets/assets/images/logo/logo.png" alt=""><img class="img-fluid for-dark" src="<?=base_url()?>assets/assets/images/logo/logo_dark.png" alt=""></a>
              <div class="back-btn"><i class="fa fa-angle-left"></i></div>
              <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper"><a href="<?=base_url()?> "><img class="img-fluid for-light" src="<?=base_url()?>assets/assets/images/logo/logo-icon.png" alt=""><img class="img-fluid for-dark" src="<?=base_url()?>assets/assets/images/logo/logo-icon2.png" alt=""></a></div>
            <nav class="sidebar-main">
              <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
              <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                  <li class="back-btn"><a href="<?=base_url()?> "><img class="img-fluid for-light" src="<?=base_url()?>assets/assets/images/logo/logo-icon.png" alt=""><img class="img-fluid for-dark" src="<?=base_url()?>assets/assets/images/logo/logo-icon2.png" alt=""></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                  </li>
                  <li class="sidebar-main-title">
                    <div>
                      <h6 class="lan-1">General</h6>
                    </div>
                  </li>
                  <li class="sidebar-list dash"><a class="sidebar-link sidebar-title link-nav dash" href="<?=base_url()?>">
                    <svg class="stroke-icon">
                      <use href="<?=base_url()?>assets/assets/svg/icon-sprite.svg#stroke-home"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="<?=base_url()?>assets/assets/svg/icon-sprite.svg#fill-home"></use>
                    </svg><span class="lan-3">Dashboard</span></a>
                  </li>
                  <li class="sidebar-main-title">
                    <div>
                      <h6 class="lan-8">Applications</h6>
                    </div>
                  </li>
                  <!-- Menu Memo -->
                  <li class="sidebar-list memo">
                    <a class="sidebar-link sidebar-title memo" href="#">
                      <svg class="stroke-icon">
                        <use href="<?=base_url()?>assets/assets/svg/icon-sprite.svg#stroke-task"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="<?=base_url()?>assets/assets/svg/icon-sprite.svg#fill-task"></use>
                      </svg><span>Memo</span></a>
                    <ul class="sidebar-submenu">
                      <li class="bmemo"><a class="bmemo" href="<?=base_url()?>memo/buat-baru/">Buat Baru</a></li>
                      <li class="dmemo"><a class="dmemo" href="<?=base_url()?>memo/daftar-memo/">daftar Memo</a></li>
                    </ul>
                  </li>
                  <li class="sidebar-list webs">
                    <a class="sidebar-link sidebar-title webs" href="#">
                      <svg class="stroke-icon">
                        <use href="<?=base_url()?>assets/assets/svg/icon-sprite.svg#stroke-internationalization"></use>
                      </svg>
                      <svg class="fill-icon">
                        <use href="<?=base_url()?>assets/assets/svg/icon-sprite.svg#fill-internationalization"></use>
                      </svg><span>Websites</span></a>
                    <ul class="sidebar-submenu">
                      <li><a href="<?=base_url()?>websites/gallery-website/">Galery Website</a></li>
                      <li><a href="<?=base_url()?>websites/buat-baru/">Ulasan</a></li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </nav>
          </div>
        </div>
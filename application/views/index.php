      <div class="page-body">
          <div class="container-fluid">        
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Default</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
                        <svg class="stroke-icon">
                          <use href="<?=base_url()?>assets/assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row widget-grid">
              <div class="col-xxl-4 col-sm-6 box-col-6">
                <div class="card profile-box">
                  <div class="card-body">
                    <div class="media">
                      <div class="media-body"> 
                        <div class="greeting-user">
                          <h4 class="f-w-600">Selamat Datang 💕</h4>
                          <p>Terimakasih telah memlih AKIRA, Perlu bantuan ?</p>
                          <div class="whatsnew-btn"><a href="https://www.akira.id/" target="_blank" class="btn btn-outline-white">Hubungi Kami</a></div>
                        </div>
                      </div>
                      <!-- Iki Widget Jam -->
                      <div>
                        <div class="clockbox">
                          <svg id="clock" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 600 600">
                            <g id="face">
                              <circle class="circle" cx="300" cy="300" r="253.9"></circle>
                              <path class="hour-marks" d="M300.5 94V61M506 300.5h32M300.5 506v33M94 300.5H60M411.3 107.8l7.9-13.8M493 190.2l13-7.4M492.1 411.4l16.5 9.5M411 492.3l8.9 15.3M189 492.3l-9.2 15.9M107.7 411L93 419.5M107.5 189.3l-17.1-9.9M188.1 108.2l-9-15.6"></path>
                              <circle class="mid-circle" cx="300" cy="300" r="16.2"></circle>
                            </g>
                            <g id="hour">
                              <path class="hour-hand" d="M300.5 298V142"></path>
                              <circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
                            </g>
                            <g id="minute">
                              <path class="minute-hand" d="M300.5 298V67"></path>
                              <circle class="sizing-box" cx="300" cy="300" r="253.9"></circle>
                            </g>
                            <g id="second">
                              <path class="second-hand" d="M300.5 350V55"></path>
                              <circle class="sizing-box" cx="300" cy="300" r="253.9">   </circle>
                            </g>
                          </svg>
                        </div>
                        <div class="badge f-10 p-0" id="txt"></div>
                      </div>
                    </div>
                    <div class="cartoon"><img class="img-fluid" src="<?=base_url()?>assets/assets/images/dashboard/cartoon.svg" alt="vector women with leptop"></div>
                  </div>
                </div>
              </div>
              <!-- Card Total Memo -->
              <div class="col-xxl-auto col-xl-6 col-sm-6 box-col-6"> 
                <div class="row"> 
                  <div class="col-xl-12"> 
                    <div class="card widget-1">
                      <div class="card-body"> 
                        <div class="widget-content">
                          <div class="widget-round primary">
                            <div class="bg-round">
                              <svg class="svg-fill">
                                <use href="<?=base_url()?>assets/assets/svg/icon-sprite.svg#stroke-task"> </use>
                              </svg>
                              <svg class="half-circle svg-fill">
                                <use href="<?=base_url()?>assets/assets/svg/icon-sprite.svg#halfcircle"></use>
                              </svg>
                            </div>
                          </div>
                          <div> 
                            <h4><?=$this->db->count_all('memo')?></h4><span class="f-light">Total Pembuatan Memo</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Card Hasil Memo Uang -->
                    <div class="col-xl-12"> 
                      <div class="card widget-1">
                        <div class="card-body"> 
                          <div class="widget-content">
                            <div class="widget-round success">
                              <div class="bg-round">
                                <svg class="svg-fill">
                                  <use href="<?=base_url()?>assets/assets/svg/icon-sprite.svg#profit"> </use>
                                </svg>
                                <svg class="half-circle svg-fill">
                                  <use href="<?=base_url()?>assets/assets/svg/icon-sprite.svg#halfcircle"></use>
                                </svg>
                              </div>
                            </div>
                            <div> 
                              <h4>Rp. <?= number_format($this->db->count_all('memo') * 100000, 0, ',', '.') ?></h4><span class="f-light">Revenue Pendapatan</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <!-- Card Total Pembuatan -->
        <div class="col-xl-12"> 
            <div class="card growth-wrap">
                <div class="card-header card-no-border pb-0">
                <div class="header-top">
                    <h5>Grafik Total Pembuatan Memo</h5>
                </div>
                </div>
                <div class="card-body">
                <div class="growth-wrapper">
                    <div id="growthchart"></div>
                </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->
      </div>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Buat Ulasan Baru</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="<?=base_url()?>assets/assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Buat Ulasan</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid basic_table">
            <div class="row">
              <div class="col-sm-12">
              <!-- Container Pembuatan Ulasan -->
                <div class="card">
                  <div class="card-header">
                    <h5>Buat Ulasan Baru</h5>
                  </div>
                  <form method="POST" action="<?=base_url()?>ulasan/simpan-ulasan" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                                <!-- Form Nama -->
                                <div class="col-sm-12 mb-3 m-form__group">
                                <label class="form-label">Nama Lengkap</label>
                                <div class="input-group"><span class="input-group-text"><i class="icofont icofont-user"></i></span>
                                    <input name="nama" class="form-control" id="NamaDepanUserUlasan" type="text" placeholder="Input Nama Depan">
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <!-- Jabatan User -->
                                <div class="col-sm-6 mb-3 m-form__group">
                                    <label class="form-label">Jabatan User</label>
                                    <div class="input-group"><span class="input-group-text"><i class="icofont icofont-ui-office"></i></span>
                                        <input name="jabatan" class="form-control" id="JabatanUserUlasan" type="text" placeholder="Input Jabatan User">
                                    </div>
                                </div>
                                <!-- Upload Avatar -->
                                <div class="col-sm-6 mb-3 m-form__group">
                                    <label class="form-label" for="FileUserUlasan">Foto Ulasan File JPG</label>
                                    <input name="img_ulasan" accept=".jpg, .png, .jpeg" class="form-control" id="FileUserUlasan" type="file" aria-label="file example" required="">
                                </div>
                            </div>
                            <!-- From Ulasan -->
                            <div class="col-sm-12 mb-3">
                                <div>
                                <label class="form-label" for="TextUserUlasan">Ulasan</label>
                                <textarea name="ulasan" class="form-control" id="TextUserUlasan" rows="3" placeholder="Maksimal 160 Karakter"></textarea>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary m-r-15" type="submit">Submit</button>
                        <button class="btn btn-light" type="submit">Cancel</button>
                    </div>
                  </form>                  
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h3>Daftar Ulasan</h3>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive user-datatable">
                        <table class="display table table-bordered table-striped" id="table-ulasan">
                            <thead>
                                <tr>
                                <th scope="col" class="text-center">NO</th>
                                <th scope="col">NAMA USER</th>
                                <th scope="col">JABATAN</th>
                                <th scope="col" class="text-center">FOTO USER</th>
                                <th scope="col">ULASAN</th>
                                <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                   </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        </div>
        <!-- Page Sidebar Ends-->
        <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Gallery Menu</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">                                       
                        <svg class="stroke-icon">
                          <use href="<?=base_url()?>assets/assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Tambah Gallery</li>
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
                    <h5>Tambah Gallery Baru</h5>
                  </div>
                  <form method="POST" action="<?=base_url()?>gallery/simpan-gallery" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                            <!-- Form Judul Galeri -->
                            <div class="col-sm-6 mb-3 m-form__group">
                                <label class="form-label">Judul Galeri</label>
                                <input name="judul" class="form-control" id="JudulGaleri" for="JudulGaleri" type="text" placeholder="Input Judul Galeri">
                            </div>
                            <!-- Form Sub Judul -->
                            <div class="col-sm-6 mb-3 m-form__group">
                                <label class="form-label">Sub Judul Galeri</label>
                                <input name="sub" class="form-control" id="SubJudulGaleri" for="SubJudulGaleri" type="text" placeholder="Input Sub Judul Galeri">
                            </div>
                            </div>
                            <div class="row">
                            <!-- Upload Gambar Galery -->
                            <div class="col-sm-12 mb-3 m-form__group">
                                <label class="form-label" for="FileGaleri">Foto Galeri File JPG</label>
                                <input name="img_gallery" class="form-control" id="FileGaleri" type="file" accept=".jpg, .png, .jpeg" required="">
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
                    <h3>Daftar Galeri</h3>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive user-datatable">
                        <table class="display table table-bordered table-striped" id="table-gallery">
                        <thead>
                            <tr>
                                <th class="text-center">NO</th>
                                <th>JUDUL GALERI</th>
                                <th>SUB JUDUL GALERI</th>
                                <th class="text-center">FOTO USER</th>
                                <th>ACTION</th>
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
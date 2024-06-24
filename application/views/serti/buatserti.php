
<div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Buat Certificate Baru</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
                        <svg class="stroke-icon">
                          <use href="<?=base_url()?>assets/assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Buat Certificate</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
              <!-- Container Formulir Pembuatan Certificate -->
                <div class="card">
                  <div class="card-header">
                    <h5>Formulir Pembuatan Certificate</h5>
                  </div>
                  <?php if (($this->uri->segment(2) == "buat-baru" && $this->uri->segment(1)=="certi")) { ?>
                  <form method="POST" action="<?=base_url()?>certi/simpan-certi">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                              <!-- Form Tanggal Otomatis -->
                              <div class="col-sm-6 mb-3 m-form__group">
                                <label class="form-label">Tanggal Pembuatan Otomatis</label>
                                <div class="input-group"><span class="input-group-text"><i class="icofont icofont-meeting-add"></i></span>
                                  <input name="datecerti" class="form-control" id="datecerti" type="date" required>
                                </div>
                              </div>
                              <!-- Form Nomor Memo -->
                              <div class="col-sm-6 mb-3 m-form__group">
                                <label class="form-label">No Certificate</label>
                                <div class="input-group"><span class="input-group-text"><i class="icofont icofont-barcode"></i></span>
                                  <input name="nocerti" class="form-control" id="nocerti" type="text" placeholder="Input No Certificate" required>
                                </div>
                              </div>
                              <!-- Upload Gambar -->
                              <!-- <div class="col-sm-4 mb-3 m-form__group">
                                <label class="form-label" for="FileMemoBatu">Foto Batu PNG, JPG, JPEG</label>
                                <input class="form-control" id="FileMemoBatu" accept=".jpg, .png, .jpeg" type="file" aria-label="file example" required="">
                              </div> -->
                            </div>
                                                  
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-primary m-r-15" type="submit" id="submitBtn">Submit</button>
                      <button class="btn btn-light" type="button">Cancel</button>
                    </div>
                  </form>
                  <?php } elseif ($this->uri->segment(2) == "ubah-certi" && $this->uri->segment(1)=="certi") { ?>
                  <form method="POST" action="<?=base_url()?>certi/update-certi" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                              <?php foreach ($getnocerti as $certi) { ?>
                                <input type="hidden" name="img_memo_old" value="<?=$certi['gem_img']?>">
                                <div class="col-sm-6 mb-3 m-form__group">
                                  <label class="form-label">No Certificate</label>
                                  <div class="input-group"><span class="input-group-text"><i class="icofont icofont-barcode"></i></span>
                                    <input name="editno_memo" value="<?=$certi['no_serti']?>" class="form-control" id="NoMemo" type="text" placeholder="Input No Certificate" readonly>
                                  </div>
                                </div>
                                                              
                                <!-- Upload Gambar -->
                                <div class="col-sm-6 mb-3 m-form__group">
                                  <label class="form-label" for="FileMemoBatu">Gambar Certificate</label>
                                  <input name="img_memo" class="form-control" id="FileMemoBatu" accept=".jpg, .png, .jpeg" type="file">
                                </div>
                              <?php } ?>
                            </div>
                                                  
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-primary m-r-15" type="submit" id="submitBtn">Submit</button>
                      <a href="<?=base_url()?>certi/buat-baru" class="btn btn-light">Cancel</a>
                    </div>
                  </form>           
                  <?php } ?>       
                </div>
              </div>
            </div>
          </div>         
          <!-- Container-fluid Ends-->
          <div class="container-fluid">
            <div class="row">
              <!-- Scroll - vertical dynamic Starts-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header pb-0 card-no-border">
                    <h3>Tabel Certificate Temporary</h3>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive user-datatable">
                      <table class="display table table-bordered table-striped" id="table-certi">
                        <thead>
                          <tr>
                            <th>No Certificate</th>
                            <th>Image Certificate</th>
                            <th>QR Certificate</th>
                            <th>Barcode Certificate</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Scroll - vertical dynamic Ends-->
            </div>
          </div>        
      </div>
      
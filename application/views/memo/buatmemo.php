
      <div class="page-body">
          <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Buat Memo Baru</h3>
                </div>
                <div class="col-6">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?=base_url()?>">                                       
                        <svg class="stroke-icon">
                          <use href="<?=base_url()?>assets/assets/svg/icon-sprite.svg#stroke-home"></use>
                        </svg></a></li>
                    <li class="breadcrumb-item">Buat Memo</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-12">
              <!-- Container Formulir Pembuatan Memo -->
                <div class="card">
                  <div class="card-header">
                    <h5>Formulir Pembuatan Memo</h5>
                  </div>
                  <?php if (($this->uri->segment(2) == "buat-baru" && $this->uri->segment(1)=="memo")) { ?>
                  <form method="POST" action="<?=base_url()?>memo/simpan-memo">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                              <!-- Form Tanggal Otomatis -->
                              <div class="col-sm-6 mb-3 m-form__group">
                                <label class="form-label">Tanggal Pembuatan Otomatis</label>
                                <div class="input-group"><span class="input-group-text"><i class="icofont icofont-meeting-add"></i></span>
                                  <input name="date" class="form-control" id="TanggalBuatMemo" type="date" placeholder="17 Agustus 2023" required>
                                </div>
                              </div>
                              <!-- Form Nomor Memo -->
                              <div class="col-sm-6 mb-3 m-form__group">
                                <label class="form-label">No Memo</label>
                                <div class="input-group"><span class="input-group-text"><i class="icofont icofont-barcode"></i></span>
                                  <input name="no_memo" class="form-control" id="NoMemo" type="text" placeholder="Input No Memo" required>
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
                  <?php } elseif ($this->uri->segment(2) == "ubah-memo" && $this->uri->segment(1)=="memo") { ?>
                  <form method="POST" action="<?=base_url()?>memo/update-memo" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-sm-12">
                            <div class="row">
                              <?php foreach ($getnomemo as $memo) { ?>
                                <input type="hidden" name="img_memo_old" value="<?=$memo['img_memo']?>">
                                <div class="col-sm-6 mb-3 m-form__group">
                                  <label class="form-label">No Memo</label>
                                  <div class="input-group"><span class="input-group-text"><i class="icofont icofont-barcode"></i></span>
                                    <input name="editno_memo" value="<?=$memo['no_memo']?>" class="form-control" id="NoMemo" type="text" placeholder="Input No Memo" readonly>
                                  </div>
                                </div>
                                                              
                                <!-- Upload Gambar -->
                                <div class="col-sm-6 mb-3 m-form__group">
                                  <label class="form-label" for="FileMemoBatu">Foto Batu PNG, JPG, JPEG</label>
                                  <input name="img_memo" class="form-control" id="FileMemoBatu" accept=".jpg, .png, .jpeg" type="file">
                                </div>
                              <?php } ?>
                            </div>
                                                  
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <button class="btn btn-primary m-r-15" type="submit" id="submitBtn">Submit</button>
                      <a href="<?=base_url()?>memo/buat-baru" class="btn btn-light">Cancel</a>
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
                    <h3>Tabel Memo Temporary</h3>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive user-datatable">
                      <table class="display table table-bordered table-striped" id="table-memo">
                        <thead>
                          <tr>
                            <th>No Memo</th>
                            <th>Image Memo</th>
                            <th>QR Memo</th>
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
      
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Certi extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Certi_model');
    $this->load->library('zend');
    if(! $this->session->userdata('logged') == TRUE)
    {
      redirect('login');
    }
  }

  public function index(){
    $this->load->model('Certi_model');
    $data['title'] = 'Certificates';
    $data['content'] = $this->load->view('serti/daftarserti', '', true);
    $data['css'] = '<link rel="stylesheet" type="text/css" href="'.base_url('assets/assets/css/vendors/datatables.css').'">';
    $data['js'] = '
    <script src="'. base_url('assets/assets/js/datatable/datatables/jquery.dataTables.min.js').'"></script>
    <script>
      $(document).ready(function() {
        $("#table-certi").DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "' . site_url('Certi/tablecerti') . '",
                "type": "POST"
            },
            "columns": [
                { 
                    "data": "no_serti",
                },
                { 
                    "data": "gem_img",
                    "render": function(data, type, full, meta) {
                      // You can customize the rendering of the image here
                      if (type === "display") {
                          if (data) {
                            return \'<img class="img-fluid table-avtar" loading="lazy" src="' . base_url('assets/img/card-serti/') . '\' + data + \'" alt="Image">\';
                          } else {
                              return "No Image";
                          }
                      }
                      return data;
                  }
                },
                { 
                    "data": "qr_code",
                    "render": function(data, type, full, meta) {
                      // You can customize the rendering of the image here
                      if (type === "display") {
                          if (data) {
                              return \'<img class="img-fluid table-avtar" loading="lazy" src="' . base_url('assets/img/serti_qr/') . '\' + data + \'" alt="Image">\';
                          } else {
                              return "No Image";
                          }
                      }
                      return data;
                  }
                },
                { 
                    "data": "barcode",
                    "render": function(data, type, full, meta) {
                      // You can customize the rendering of the image here
                      if (type === "display") {
                          if (data) {
                              return \'<img class="img-fluid table-avtar" loading="lazy" src="' . base_url('assets/img/serti_bar/') . '\' + data + \'" alt="Image">\';
                          } else {
                              return "No Image";
                          }
                      }
                      return data;
                  }
                },
                { "data": "date" },
                {
                  "data": "status",
                  "render": function (data, type, full, meta) {
                      // You can customize the rendering here
                      if (type === "display") {
                          if (data === "1") {
                            return `<span class="badge rounded-pill badge-secondary">Pending</span>`;
                          } else {
                            return `<span class="badge rounded-pill badge-success">Compleated</span>`;
                          }
                          return data; // return the original value for other cases
                      }
                      return data;
                  }
                },
                { 
                  "data": "no_serti",
                  "orderable": false, // Disable sorting for this column
                  "render": function(data, type, full, meta) {
                    if (type === "display") {
                      if (data) {
                        return `
                          <ul class="action">
                              <li class="edit"><a href="'.base_url('certi/ubah-certi/').'${data}"><i class="icon-pencil-alt"></i></a></li>
                              <li class="delete"><a href="'.base_url('certi/hapus/').'${data}"><i class="icon-trash"></i></a></li>
                          </ul>
                        `;
                      }
                    }
                    return data;
                  }
                }
              ],   
              "columnDefs": [
                { "targets": [1,2,3], "orderable": false }, // Disable sorting for specific columns
              ]                        
          });    
      });
    </script>';
    $this->load->view('layout/base', $data);
  }
  public function buatcerti() {
    $this->load->model('Certi_model');
    $data['title'] = 'Certificates';
    $data['content'] = $this->load->view('serti/buatserti', '', true);
    $data['css'] = '<link rel="stylesheet" type="text/css" href="'.base_url('assets/assets/css/vendors/datatables.css').'">';
    $data['js'] = '
    <script src="'. base_url('assets/assets/js/datatable/datatables/jquery.dataTables.min.js').'"></script>
    <script>
      $(document).ready(function() {
        $("#table-certi").DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "' . site_url('Certi/tablecertitemp') . '",
                "type": "POST"
            },
            "columns": [
                { 
                    "data": "no_serti",
                },
                { 
                    "data": "gem_img",
                    "render": function(data, type, full, meta) {
                      // You can customize the rendering of the image here
                      if (type === "display") {
                          if (data) {
                            return \'<img class="img-fluid table-avtar" src="' . base_url('assets/img/card-serti/') . '\' + data + \'" alt="Image">\';
                          } else {
                              return "No Image";
                          }
                      }
                      return data;
                  }
                },
                { 
                    "data": "qr_code",
                    "render": function(data, type, full, meta) {
                      // You can customize the rendering of the image here
                      if (type === "display") {
                          if (data) {
                              return \'<img class="img-fluid table-avtar" src="' . base_url('assets/img/serti_qr/') . '\' + data + \'" alt="Image">\';
                          } else {
                              return "No Image";
                          }
                      }
                      return data;
                  }
                },
                { 
                    "data": "barcode",
                    "render": function(data, type, full, meta) {
                      // You can customize the rendering of the image here
                      if (type === "display") {
                          if (data) {
                              return \'<img class="img-fluid table-avtar" src="' . base_url('assets/img/serti_bar/') . '\' + data + \'" alt="Image">\';
                          } else {
                              return "No Image";
                          }
                      }
                      return data;
                  }
                },
                { "data": "date" },
                {
                  "data": "status",
                  "render": function (data, type, full, meta) {
                      // You can customize the rendering here
                      if (type === "display") {
                          if (data === "1") {
                            return `<span class="badge rounded-pill badge-secondary">Pending</span>`;
                          } else {
                            return `<span class="badge rounded-pill badge-success">Compleated</span>`;
                          }
                          return data; // return the original value for other cases
                      }
                      return data;
                  }
                },
                { 
                  "data": "no_serti",
                  "orderable": false, // Disable sorting for this column
                  "render": function(data, type, full, meta) {
                    if (type === "display") {
                      if (data) {
                        return `
                          <ul class="action">
                              <li class="edit"><a href="'.base_url('certi/ubah-certi/').'${data}"><i class="icon-pencil-alt"></i></a></li>
                              <li class="delete"><a href="'.base_url('certi/hapus/').'${data}"><i class="icon-trash"></i></a></li>
                          </ul>
                        `;
                      }
                    }
                    return data;
                  }
                }
              ],   
              "columnDefs": [
                { "targets": [1,2,3], "orderable": false }, // Disable sorting for specific columns
              ]                        
          });    
      });
    </script>';
    $this->load->view('layout/base', $data);
  }
  public function ubah($id){
		$data["getnocerti"] = $this->Certi_model->getWhere($id);
    $data['content'] = $this->load->view('serti/buatserti', $data, true);
    $data['title'] = 'Certificates';
    $data['css'] = '<link rel="stylesheet" type="text/css" href="'.base_url('assets/assets/css/vendors/datatables.css').'">';
    $data['js'] = '
    <script src="'. base_url('assets/assets/js/datatable/datatables/jquery.dataTables.min.js').'"></script>
    <script>
      $(document).ready(function() {
        $("#table-certi").DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "' . site_url('Certi/tablecertitemp') . '",
                "type": "POST"
            },
            "columns": [
                { 
                    "data": "no_serti",
                },
                { 
                    "data": "gem_img",
                    "render": function(data, type, full, meta) {
                      // You can customize the rendering of the image here
                      if (type === "display") {
                          if (data) {
                            return \'<img class="img-fluid table-avtar" src="' . base_url('assets/img/card-serti/') . '\' + data + \'" alt="Image">\';
                          } else {
                              return "No Image";
                          }
                      }
                      return data;
                  }
                },
                { 
                    "data": "qr_code",
                    "render": function(data, type, full, meta) {
                      // You can customize the rendering of the image here
                      if (type === "display") {
                          if (data) {
                              return \'<img class="img-fluid table-avtar" src="' . base_url('assets/img/serti_qr/') . '\' + data + \'" alt="Image">\';
                          } else {
                              return "No Image";
                          }
                      }
                      return data;
                  }
                },
                { 
                    "data": "barcode",
                    "render": function(data, type, full, meta) {
                      // You can customize the rendering of the image here
                      if (type === "display") {
                          if (data) {
                              return \'<img class="img-fluid table-avtar" src="' . base_url('assets/img/serti_bar/') . '\' + data + \'" alt="Image">\';
                          } else {
                              return "No Image";
                          }
                      }
                      return data;
                  }
                },
                { "data": "date" },
                {
                  "data": "status",
                  "render": function (data, type, full, meta) {
                      // You can customize the rendering here
                      if (type === "display") {
                          if (data === "1") {
                            return `<span class="badge rounded-pill badge-secondary">Pending</span>`;
                          } else {
                            return `<span class="badge rounded-pill badge-success">Compleated</span>`;
                          }
                          return data; // return the original value for other cases
                      }
                      return data;
                  }
                },
                { 
                  "data": "no_serti",
                  "orderable": false, // Disable sorting for this column
                  "render": function(data, type, full, meta) {
                    if (type === "display") {
                      if (data) {
                        return `
                          <ul class="action">
                              <li class="edit"><a href="'.base_url('certi/ubah-certi/').'${data}"><i class="icon-pencil-alt"></i></a></li>
                              <li class="delete"><a href="'.base_url('certi/hapus/').'${data}"><i class="icon-trash"></i></a></li>
                          </ul>
                        `;
                      }
                    }
                    return data;
                  }
                }
              ],   
              "columnDefs": [
                { "targets": [1,2,3], "orderable": false }, // Disable sorting for specific columns
              ]                        
          });    
      });
    </script>';
    
    $this->load->view('layout/base', $data);
	}  
  public function tablecertitemp() {
    $this->load->library('datatables');
    $this->datatables->select('no_serti, gem_img, qr_code, barcode, date, status');
    $this->datatables->from('serti');
    return print_r($this->datatables->generate());
  }
  public function tablecerti() {
    $this->load->library('datatables');
    $this->datatables->select('no_serti, gem_img, qr_code, barcode, date, status');
    $this->datatables->from('serti');
    return print_r($this->datatables->generate());
  }
  public function barcode($nocerti){
    $this->zend->load('Zend/Barcode');
    $imageResource = Zend_Barcode::factory('code128','image', array('text'=>$nocerti), array())->draw();
    $imageName = $nocerti.'.jpg';
      
      if ($_SERVER['SERVER_NAME'] == 'localhost') {
        $imagePath = './assets/img/serti_bar/';
      } else if($_SERVER['SERVER_NAME'] == 'live.akira.id'){
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/panelgemology/assets/img/serti_bar/';
      }else {
        $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/assets/img/serti_bar/';
      }
    imagejpeg($imageResource, $imagePath.$imageName);    
  }
  public function qrcode($link,$nocerti) {
    $this->load->library('ciqrcode');
    $config['cacheable']    = true; //boolean, the default is true
    $config['cachedir']     = './assets/'; //string, the default is application/cache/
    $config['errorlog']     = './assets/'; //string, the default is application/logs/
    $config['imagedir']     = './assets/img/serti_qr/'; //direktori penyimpanan qr code
    $config['quality']      = true; //boolean, the default is true
    $config['size']         = '1024'; //interger, the default is 1024
    $config['black']        = array(224,255,255); // array, default is array(255,255,255)
    $config['white']        = array(70,130,180); // array, default is array(0,0,0)
    $this->ciqrcode->initialize($config);

    $qr=$nocerti.'.png'; //buat name dari qr code sesuai dengan nim

    $params['data'] = $link.'='.$nocerti; //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH.$config['imagedir'].$qr; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params);
  }
  public function save(){
    $nocerti = $this->input->post('nocerti');
		$date = $this->input->post('datecerti');
		$link = 'https://gemologylaboratory.com/auth/certif?keyword';
    $qr=$nocerti.'.png';
    $bar=$nocerti.'.jpg';

    $this->Certi_model->saveCerti($nocerti, $date, $qr, $bar);
    $this->qrcode($link,$nocerti);
    $this->barcode($nocerti);
		
		redirect('certi/buat-baru/');
  }
  public function update(){
    $nocerti = $this->input->post('editno_memo');
    
    if (!empty($_FILES['img_memo']['name'])) {
        $this->load->library('upload');
        
        $config['upload_path'] = realpath(APPPATH . '../assets/img/card-serti');
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['overwrite'] = true;
        $config['file_name'] = $nocerti;
        $config['max_size'] = 2048;        
        
        $this->upload->initialize($config);

        if ($this->upload->do_upload('img_memo')) {
            $data1 = $this->upload->data();
            $img_memo = $data1['file_name'];
            $old_img_memo = $this->input->post('img_memo_old', true);
            if (!empty($old_img_memo)) {
                unlink(FCPATH.'assets/img/card-serti/' . $old_img_memo);
            }
        } else {
            $error = $this->upload->display_errors();
        }
    } else {
        $img_memo = $this->input->post('img_memo', true);
    }

    $this->Certi_model->updateCerti($nocerti, $img_memo);
    redirect('certi/buat-baru/');
  }
  public function delete($id=null){
    if (!isset($id)) show_404();
        
    $image = $this->Certi_model->getWhere($id);

    foreach ($image as $i) {
      $gemImgPath = FCPATH .'assets/img/card-serti/' . $i['gem_img'];
      $barcodePath = FCPATH .'assets/img/serti_bar/' . $i['barcode'];
      $qrCodePath = FCPATH .'assets/img/serti_qr/' . $i['qr_code'];
      if ($this->Certi_model->deleteCerti($id)) {
        if (file_exists($gemImgPath)) {
          unlink($gemImgPath);
        }
        if (file_exists($barcodePath)) {
          unlink($barcodePath);
        }
        if (file_exists($qrCodePath)) {
          unlink($qrCodePath);
        }        
        redirect('certi/buat-baru/');
      }
    }
  }  

}


/* End of file Certi.php */
/* Location: ./application/controllers/Certi.php */
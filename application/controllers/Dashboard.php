<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Dashboard
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Dashboard extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Memo_model');
    $this->load->model('Gallery_model');
    $this->load->model('Ulasan_model');
    if(! $this->session->userdata('logged') == TRUE)
    {
        redirect('login');
    }
  }

  public function block() {
    $this->load->view('websites/blokakses');
  }

  public function fetchMemoData()
  {
      // Create an array with abbreviated month names
      $months = [
          'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
          'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
      ];
  
      // Load the database library if not already loaded
      $this->load->database();
  
      // Fetch data from the "memo" table
      $this->db->select("DATE_FORMAT(date, '%b') AS month, COUNT(*) AS count");
      $this->db->where('status', 2);
      $this->db->group_by("DATE_FORMAT(date, '%b')");
      $query = $this->db->get('memo');
      $result = $query->result_array();
  
      // Initialize the data array
      $data = [];
  
      // Loop through months and populate data
      foreach ($months as $month) {
          $count = 0;
          foreach ($result as $row) {
              if ($row['month'] === $month) {
                  $count = (int)$row['count']; // Cast count to integer
                  break;
              }
          }
          $data[] = $count;
      }
  
      // Return the data as JSON
      echo json_encode($data);
  }
  
  
  
  


  public function index()
  {
    $data['title'] = 'Welcome To Dashboard';
    $data['content'] = $this->load->view('index', '', true);
    $data['css'] = '';
    $data['js'] = '
    <script src="' . base_url('assets/assets/js/clock.js') . '"></script>
    <script src="' . base_url('assets/assets/js/chart/apex-chart/apex-chart.js') . '"></script>
    <script src="' . base_url('assets/assets/js/chart/apex-chart/stock-prices.js') . '"></script>
    <script src="' . base_url('assets/assets/js/chart/apex-chart/moment.min.js') . '"></script>
    
    <script>
        function fetchDataForChart() {
            $.ajax({
                url: "' . site_url('dashboard/fetchMemoData') . '", // Use the URL mapping you set up
                method: "GET",
                dataType: "json",
                success: function(data) {
                    renderChart(data);
                },
                error: function(error) {
                    console.log("Error fetching data:", error);
                }
            });
        }
        function renderChart(data) {
          var growthoptions = {
              series: [{
                  name: "Memos",
                  data: data
              }],
              chart: {
                  height: 200,
                  type: "line",
                  toolbar: {
                      show: false
                  },
                  dropShadow: {
                      enabled: true,
                      enabledOnSeries: undefined,
                      top: 5,
                      left: 0,
                      blur: 4,
                      color: "#7366ff",
                      opacity: 0.22
                  },
              },
              grid: {
                  yaxis: {
                      lines: {
                          show: false
                      }
                  },
              },
              colors: ["#5527FF"],
              stroke: {
                  width: 3,
                  curve: "smooth"
              },
              xaxis: {
                  type: "category",
                  categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                  tickAmount: 10,
                  labels: {
                      style: {
                          fontFamily: "Rubik, sans-serif",
                      },
                  },
                  axisTicks: {
                      show: false
                  },
                  axisBorder: {
                      show: false
                  },
                  tooltip: {
                      enabled: false,
                  },
              },
              fill: {
                  type: "gradient",
                  gradient: {
                      shade: "dark",
                      gradientToColors: ["#5527FF"],
                      shadeIntensity: 1,
                      type: "horizontal",
                      opacityFrom: 1,
                      opacityTo: 1,
                      colorStops: [
                          {
                              offset: 0,
                              color: "#5527FF",
                              opacity: 1
                          },
                          {
                              offset: 100,
                              color: "#E069AE",
                              opacity: 1
                          },
                      ]
                  },
              },
              yaxis: {
                  min: -10,
                  max: 40,
                  labels: {
                      show: false
                  }
              }
          };
          var growthchart = new ApexCharts(document.querySelector("#growthchart"), growthoptions);
          growthchart.render();
        }
        fetchDataForChart();
    </script>';
    $this->load->view('layout/base', $data);
  }

  public function memo() {
    $this->load->model('Memo_model');
    $data['title'] = 'Memo';
    $data['content'] = $this->load->view('memo/buatmemo', '', true);
    $data['css'] = '<link rel="stylesheet" type="text/css" href="'.base_url('assets/assets/css/vendors/datatables.css').'">';
    $data['js'] = '
    <script src="'. base_url('assets/assets/js/datatable/datatables/jquery.dataTables.min.js').'"></script>
    <script>
      $(document).ready(function() {
        $("#table-memo").DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "' . site_url('dashboard/json') . '",
                "type": "POST"
            },
            "columns": [
                { 
                    "data": "no_memo",
                },
                { 
                    "data": "img_memo",
                    "render": function(data, type, full, meta) {
                      // You can customize the rendering of the image here
                      if (type === "display") {
                          if (data) {
                            return \'<img class="img-fluid table-avtar" src="' . base_url('assets/img/card-memo/') . '\' + data + \'" alt="Image">\';
                          } else {
                              return "No Image";
                          }
                      }
                      return data;
                  }
                },
                { 
                    "data": "qr_memo",
                    "render": function(data, type, full, meta) {
                      // You can customize the rendering of the image here
                      if (type === "display") {
                          if (data) {
                              return \'<img class="img-fluid table-avtar" src="' . base_url('assets/img/memo/') . '\' + data + \'" alt="Image">\';
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
                  "data": "no_memo",
                  "orderable": false, // Disable sorting for this column
                  "render": function(data, type, full, meta) {
                    if (type === "display") {
                      if (data) {
                        return `
                          <ul class="action">
                              <li class="edit"><a href="'.base_url('memo/ubah-memo/').'${data}"><i class="icon-pencil-alt"></i></a></li>
                              <li class="delete"><a href="'.base_url('memo/hapus/').'${data}"><i class="icon-trash"></i></a></li>
                          </ul>
                        `;
                      }
                    }
                    return data;
                  }
                }
              ],   
              "columnDefs": [
                { "targets": [0,1,2,5], "orderable": false }, // Disable sorting for specific columns
              ]                        
          });    
      });
    </script>';
    
    $this->load->view('layout/base', $data);
  }

  public function daftarmemo(){
    $this->load->model('Memo_model');
    $data['title'] = 'Memo';
    $data['content'] = $this->load->view('memo/daftarmemo', '', true);
    $data['css'] = '<link rel="stylesheet" type="text/css" href="'.base_url('assets/assets/css/vendors/datatables.css').'">';
    $data['js'] = '
    <script src="'. base_url('assets/assets/js/datatable/datatables/jquery.dataTables.min.js').'"></script>
    <script>
      $(document).ready(function() {
        $("#table-memo").DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "' . site_url('dashboard/getMemoServer') . '",
                "type": "POST"
            },
            "columns": [
                { 
                    "data": "no_memo",
                },
                { 
                    "data": "img_memo",
                    "render": function(data, type, full, meta) {
                      // You can customize the rendering of the image here
                      if (type === "display") {
                          if (data) {
                            return \'<img class="img-fluid table-avtar" src="' . base_url('assets/img/card-memo/') . '\' + data + \'" alt="Image">\';
                          } else {
                              return "No Image";
                          }
                      }
                      return data;
                  }
                },
                { 
                    "data": "qr_memo",
                    "render": function(data, type, full, meta) {
                      // You can customize the rendering of the image here
                      if (type === "display") {
                          if (data) {
                              return \'<img class="img-fluid table-avtar" src="' . base_url('assets/img/memo/') . '\' + data + \'" alt="Image">\';
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
                  "data": "no_memo",
                  "orderable": false, // Disable sorting for this column
                  "render": function(data, type, full, meta) {
                    if (type === "display") {
                      if (data) {
                        return `
                          <ul class="action">
                              <li class="edit"><a href="'.base_url('memo/ubah-memo/').'${data}"><i class="icon-pencil-alt"></i></a></li>
                              <li class="delete"><a href="'.base_url('memo/hapus/').'${data}"><i class="icon-trash"></i></a></li>
                          </ul>
                        `;
                      }
                    }
                    return data;
                  }
                }
              ],   
              "columnDefs": [
                { "targets": [0,1,2,5], "orderable": false }, // Disable sorting for specific columns
              ]                        
          });    
      });
    </script>';
    $this->load->view('layout/base', $data);
  }

  public function gallery(){
    $data['title'] = 'Gallery';
    $data['content'] = $this->load->view('websites/gallery', '', true);
    $data['css'] = '<link rel="stylesheet" type="text/css" href="'.base_url('assets/assets/css/vendors/datatables.css').'">';
    $data['js'] = '
    <script src="'. base_url('assets/assets/js/datatable/datatables/jquery.dataTables.min.js').'"></script>
    <script>
      $(document).ready(function() {
        $("#table-gallery").DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "' . site_url('dashboard/json2') . '",
                "type": "POST"
            },
            "columns": [
                { 
                    "data": "id_gallery"
                },
                { "data": "judul" },
                { "data": "sub" },                
                { 
                    "data": "img_gallery",
                    "render": function(data, type, full, meta) {
                      if (type === "display") {
                          if (data) {
                            return \'<img class="img-100 me-2" src="' . base_url('assets/img/gallery/') . '\' + data + \'" alt="Image">\';
                          } else {
                              return "No Image";
                          }
                      }
                      return data;
                  }
                },
                { 
                  "data": "id_gallery",
                  "orderable": false, // Disable sorting for this column
                  "render": function(data, type, full, meta) {
                    if (type === "display") {
                      if (data) {
                        return `
                          <ul class="action">
                              <li class="delete"><a href="'.base_url('gallery/hapus/').'${data}"><i class="icon-trash"></i></a></li>
                          </ul>
                        `;
                      }
                    }
                    return data;
                  }
                }
              ],                 
          });    
      });
    </script>';
    $this->load->view('layout/base', $data);    
  }

  public function ulasan(){
    $data['title'] = 'Ulasan';
    $data['content'] = $this->load->view('websites/ulasan', '', true);
    $data['css'] = '<link rel="stylesheet" type="text/css" href="'.base_url('assets/assets/css/vendors/datatables.css').'">';
    $data['js'] = '
    <script src="'. base_url('assets/assets/js/datatable/datatables/jquery.dataTables.min.js').'"></script>
    <script>
      $(document).ready(function() {
        $("#table-ulasan").DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "' . site_url('dashboard/json3') . '",
                "type": "POST"
            },
            "columns": [
                { 
                  "data": "id_ulasan",
                },
                { "data": "nama" },
                { "data": "jabatan" },
                { 
                    "data": "img_ulasan",
                    "render": function(data, type, full, meta) {
                      // You can customize the rendering of the image here
                      if (type === "display") {
                          if (data) {
                            return \'<img class="img-100 me-2" src="' . base_url('assets/img/ulasan/') . '\' + data + \'" alt="Image">\';
                          } else {
                              return "No Image";
                          }
                      }
                      return data;
                  }
                },
                { "data": "ulasan" },
                { 
                  "data": "id_ulasan",
                  "orderable": false, // Disable sorting for this column
                  "render": function(data, type, full, meta) {
                    if (type === "display") {
                      if (data) {
                        return `
                          <ul class="action">
                              <li class="delete"><a href="'.base_url('ulasan/hapus/').'${data}"><i class="icon-trash"></i></a></li>
                          </ul>
                        `;
                      }
                    }
                    return data;
                  }
                }
              ],                           
          });    
      });
    </script>';
    $this->load->view('layout/base', $data);    
  }  

  public function getMemoServer() {
    $this->load->library('datatables');
    $this->datatables->add_column('no','$1','no_memo');
    $this->datatables->select('no_memo, img_memo, qr_memo, date, status');
    $this->datatables->where('status','2');
    $this->datatables->add_column('action', anchor('memo/edit/$1','Edit',array('class'=>'btn btn-danger btn-sm')), 'no_memo');
    $this->datatables->from('memo');
    return print_r($this->datatables->generate());
  }
  public function json(){
    $this->load->library('datatables');
    $this->datatables->add_column('no','$1','no_memo');
    $this->datatables->select('no_memo, img_memo, qr_memo, date, status');
    $this->datatables->add_column('action', anchor('memo/edit/$1','Edit',array('class'=>'btn btn-danger btn-sm')), 'no_memo');
    $this->datatables->from('memo');
    return print_r($this->datatables->generate());
  }
  public function json2(){
    $this->load->library('datatables');
    $this->datatables->add_column('no','$1','id_gallery');
    $this->datatables->select('id_gallery, judul, sub, img_gallery');
    $this->datatables->add_column('action', anchor('gallery/edit/$1','Edit',array('class'=>'btn btn-danger btn-sm')), 'id_gallery');
    $this->datatables->from('gallery');
    return print_r($this->datatables->generate());
  }
  public function json3(){
    $this->load->library('datatables');
    $this->datatables->add_column('no','$1','id_ulasan');
    $this->datatables->select('id_ulasan, nama, jabatan, img_ulasan, ulasan');
    $this->datatables->add_column('action', anchor('ulasan/edit/$1','Edit',array('class'=>'btn btn-danger btn-sm')), 'id_ulasan');
    $this->datatables->from('ulasan');
    return print_r($this->datatables->generate());
  }    

  public function smemo(){
    $this->load->library('ciqrcode');
    $nomemo = $this->input->post('no_memo');
		$date = $this->input->post('date');
    $stat = 1;
		$link = 'https://gemologylaboratory.com/auth/certif?keyword';
    
    $config['cacheable']    = true; //boolean, the default is true
    $config['cachedir']     = './assets/'; //string, the default is application/cache/
    $config['errorlog']     = './assets/'; //string, the default is application/logs/
    $config['imagedir']     = './assets/img/memo/'; //direktori penyimpanan qr code
    $config['quality']      = true; //boolean, the default is true
    $config['size']         = '1024'; //interger, the default is 1024
    $config['black']        = array(224,255,255); // array, default is array(255,255,255)
    $config['white']        = array(70,130,180); // array, default is array(0,0,0)
    $this->ciqrcode->initialize($config);

    $qr=$nomemo.'.png'; //buat name dari qr code sesuai dengan nim

    $params['data'] = $link.'='.$nomemo; //data yang akan di jadikan QR CODE
    $params['level'] = 'H'; //H=High
    $params['size'] = 10;
    $params['savename'] = FCPATH.$config['imagedir'].$qr; //simpan image QR CODE ke folder assets/images/
    $this->ciqrcode->generate($params);

    $this->Memo_model->saveMemo($nomemo, $date, $qr, $stat);
		
		redirect('memo/buat-baru/');
  }

  public function sgal(){
		$id = "";
		$judul = $this->input->post('judul');
    $sub = $this->input->post('sub');
		$img_gallery = "";

		$image_path = realpath(APPPATH . '../assets/img/gallery');
		$config['upload_path']          = $image_path;
		$config['allowed_types']        = 'jpg|png|jpeg';
    $config['overwrite'] = true;
    $config['file_name'] = $judul;
    $config['max_size'] = 2048;

		$this->load->library('upload',$config);
		if (!empty($_FILES['img_gallery']['name'])){
			$this->upload->do_upload('img_gallery');
			$data1 = $this->upload->data();
			$img_gallery = $data1['file_name'];
		}
		
		$this->Gallery_model->saveGallery($id, $judul, $sub, $img_gallery);
		
		redirect('websites/gallery-website/');    
  }
	public function hapusgal($id=null)
  {
    if (!isset($id)) show_404();
        
		$image = $this->Gallery_model->getWhere($id);

		foreach ($image as $i) {
			if ($this->Gallery_model->deleteGallery($id)) {
				unlink('./assets/img/gallery/'.$i['img_gallery']);
				redirect('websites/gallery-website/');
			}
		}
	}  

	public function hapusula($id=null)
  {
    if (!isset($id)) show_404();
        
		$image = $this->Ulasan_model->getWhere($id);

		foreach ($image as $i) {
			if ($this->Ulasan_model->deleteUlasan($id)) {
				unlink('./assets/img/ulasan/'.$i['img_ulasan']);
				redirect('websites/ulasan/');
			}
		}
	}  

  public function sulasan(){
		$id = "";
		$nama = $this->input->post('nama');
    $jabatan = $this->input->post('jabatan');
		$img_ulasan = "";
    $ulasan = $this->input->post('ulasan');

		$image_path = realpath(APPPATH . '../assets/img/ulasan');
		$config['upload_path']          = $image_path;
		$config['allowed_types']        = 'jpg|png|jpeg';
    $config['overwrite'] = true;
    $config['file_name'] = $nama;
    $config['max_size'] = 2048;

		$this->load->library('upload',$config);
		if (!empty($_FILES['img_ulasan']['name'])){
			$this->upload->do_upload('img_ulasan');
			$data1 = $this->upload->data();
			$img_ulasan = $data1['file_name'];
		}
		
		$this->Ulasan_model->saveUlasan($id, $nama, $jabatan, $img_ulasan, $ulasan);
		
		redirect('websites/ulasan/');      
  }

  public function ubah($id)
	{
		$data["getnomemo"] = $this->Memo_model->getWhere($id);
		$data['getMemo'] = $this->Memo_model->getDataTemp();
    $data['content'] = $this->load->view('memo/buatmemo', $data, true);
    $data['title'] = 'Memo';
    $data['css'] = '<link rel="stylesheet" type="text/css" href="'.base_url('assets/assets/css/vendors/datatables.css').'">';
    $data['js'] = '
    <script src="'. base_url('assets/assets/js/datatable/datatables/jquery.dataTables.min.js').'"></script>
    <script>
      $(document).ready(function() {
        $("#table-memo").DataTable({
            "processing": true,
            "serverSide": true,
            "order": [],
            "ajax": {
                "url": "' . site_url('dashboard/json') . '",
                "type": "POST"
            },
            "columns": [
                { 
                    "data": "no_memo",
                },
                { 
                    "data": "img_memo",
                    "render": function(data, type, full, meta) {
                      // You can customize the rendering of the image here
                      if (type === "display") {
                          if (data) {
                            return \'<img class="img-fluid table-avtar" src="' . base_url('assets/img/card-memo/') . '\' + data + \'" alt="Image">\';
                          } else {
                              return "No Image";
                          }
                      }
                      return data;
                  }
                },
                { 
                    "data": "qr_memo",
                    "render": function(data, type, full, meta) {
                      // You can customize the rendering of the image here
                      if (type === "display") {
                          if (data) {
                              return \'<img class="img-fluid table-avtar" src="' . base_url('assets/img/memo/') . '\' + data + \'" alt="Image">\';
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
                  "data": "no_memo",
                  "orderable": false, // Disable sorting for this column
                  "render": function(data, type, full, meta) {
                    if (type === "display") {
                      if (data) {
                        return `
                          <ul class="action">
                              <li class="edit"><a href="'.base_url('memo/ubah-memo/').'${data}"><i class="icon-pencil-alt"></i></a></li>
                              <li class="delete"><a href="'.base_url('memo/hapus/').'${data}"><i class="icon-trash"></i></a></li>
                          </ul>
                        `;
                      }
                    }
                    return data;
                  }
                }
              ],   
              "columnDefs": [
                { "targets": [0,1,2,5], "orderable": false }, // Disable sorting for specific columns
              ]                        
          });    
      });
    </script>';
    
    $this->load->view('layout/base', $data);
	}

  public function update(){
    $nomemo = $this->input->post('editno_memo');
    
    if (!empty($_FILES['img_memo']['name'])) {
        $this->load->library('upload');
        
        $config['upload_path'] = realpath(APPPATH . '../assets/img/card-memo');
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['overwrite'] = true;
        $config['file_name'] = $nomemo;
        $config['max_size'] = 2048;        
        
        $this->upload->initialize($config);

        if ($this->upload->do_upload('img_memo')) {
            $data1 = $this->upload->data();
            $img_memo = $data1['file_name'];
            $old_img_memo = $this->input->post('img_memo_old', true);
            if (!empty($old_img_memo)) {
                unlink('../assets/img/card-memo/' . $old_img_memo);
            }
        } else {
            $error = $this->upload->display_errors();
        }
    } else {
        $img_memo = $this->input->post('img_memo', true);
    }

    $this->Memo_model->updateMemo($nomemo, $img_memo);
    redirect('memo/buat-baru/');
  }

	public function hapus($id=null)
    {
        if (!isset($id)) show_404();
        
		$image = $this->Memo_model->getWhere($id);

		foreach ($image as $i) {
			if ($this->Memo_model->deleteMemo($id)) {
				unlink('../assets/img/card-memo/'.$i['gambar']);
				redirect('memo/buat-baru/');
			}
		}
	}  



}


/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */
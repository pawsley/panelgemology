<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Login
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

class Login extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Login_model');
		$this->load->library('form_validation');
  }

  public function index()
  {
    $this->load->view('login');
  }

  function aksi_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
            'role' => 'admin'
			);
		$cek = $this->Login_model->cek_login("user",$where)->num_rows();
		$data= $this->Login_model->cek_login("user",$where)->result_array();
		if($cek > 0){
			foreach ($data as $data) {
                if ($password == $data['password']) {
                $data_session = array(
                'username' => $data['username'],
                'role' => $data['role'],
                'id_user' => $data['id_user'],
                'logged' => TRUE
                );
                $this->session->set_userdata($data_session);
                redirect('/dashboard');
                }else{
                    $this->session->set_flashdata('failed', 'Password yang anda masukkan salah, Silahkan Coba Lagi');
                    redirect($_SERVER['HTTP_REFERER']);
                }
			}
		}else{
            $this->session->set_flashdata('failed', 'Username yang anda masukkan belum terdaftar');
            redirect($_SERVER['HTTP_REFERER']);
        }
	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
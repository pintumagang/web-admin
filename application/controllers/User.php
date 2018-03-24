<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index(){
		$this->load->view('Login');
	}

	public function Login(){

		$this->load->model('Model_Login');
		$user = $this->input->post('username',true);
		$pass = $this->input->post('pass',true);
		$cek  = $this->Model_Login->prosesLogin($user,$pass);
			if($cek['status']== 'A'){
				$select = $this->db->get_where('admin', array('id_user' => $cek['id_user']))->row();
				$data = array('logged_in' => true ,
							  'loger' => $select->nama);
				$this->session->set_userdata($data);
				$this->load->view('Admin_Home');
			} else if ($cek['status']== 'P') {
				$this->load->view('Perusahaan_Home');
			} else {
			$this->session->set_flashdata('error','Username atau password salah!');
			$this->load->view('Login');
		}
	}
	

	public function Logout(){
		$this->session->sess_destroy();
		redirect('User/index');
	}
}


//$select = $this->db->query('SELECT nama FROM admin WHERE id_user = $cek['id']');
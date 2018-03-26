<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index(){
		if ($this->session->userdata('user') == FALSE && $this->session->userdata('logged_in') == FALSE ) {
				$this->load->view('Login');	
		}else{
			$this->load->view('Admin_Home');
		}
		
	}

	public function Login(){


		if ($this->session->userdata('user') == FALSE && $this->session->userdata('logged_in') == FALSE ) {

		$this->load->model('Model_Login');
		$user = $this->input->post('username',true);
		$pass = $this->input->post('pass',true);
		$cek  = $this->Model_Login->prosesLogin($user,$pass);
			if($cek['status']== 'A'){

				$select = $this->db->get_where('admin', array('id_user' => $cek['id_user']))->row();
				$data = array('logged_in' => true ,
							  'loger' => $select->nama);
				$sql = "update user set last_login = ";

				$_SESSION['user'] = $data['loger'];
				$_SESSION['logged_in'] = $data['logged_in'];

				$this->load->view('Admin_Home');
			} else if ($cek['status']== 'P') {
				$this->load->view('Perusahaan_Home');
			} else {
			$this->session->set_flashdata('error','Username atau password salah!');
			$this->load->view('Login');
		}
		}
		else{

			$this->load->view('Admin_Home');

		}
	}
	

	public function Logout(){

		//if ($this->userdata('logged_in') == FALSE) {
			//$this->load->view('Login');
		//}
		//else{

		$this->session->unset_userdata('user');
		$this->session->unset_userdata('logged_in');
		$this->session->sess_destroy();
		redirect('User/index');

//			}
	}
}


//$select = $this->db->query('SELECT nama FROM admin WHERE id_user = $cek['id']');
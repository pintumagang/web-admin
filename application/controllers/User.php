<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index(){
		$this->load->view('Login');
	}

	public function Login(){

			// cek dulu kalo ada session atau enggk

		if ($this->session->userdata('user') == FALSE) {

			$this->load->model('Model_Login');
			$user = $this->input->post('username',true);
			$pass = $this->input->post('pass',true);
			$cek  = $this->Model_Login->prosesLogin($user,$pass);
			if($cek['status']== 'A'){
<<<<<<< HEAD
				$select = $this->db->get_where('admin', array('id_user' => $cek['id_user']))->row();
				$data = array('logged_in' => true ,
							  'loger' => $select->nama);
				$this->session->set_userdata($data);
				$this->load->view('Admin_Home');
=======


				//set coockies kalo ngeklik remember me
				if ( isset($_POST['remember-me']) ) {
					setcookie('email', $email, time()+3600);
				}

				// session
				session_start();
				$_SESSION['user'] = $user;
				redirect('/Admin/beranda', 'refresh');

>>>>>>> bfa798eab432fc1daa48888d138c32506081f6c7
			} else if ($cek['status']== 'P') {


				//set coockies kalo ngeklik remember me
				if ( isset($_POST['remember-me']) ) {
					setcookie('email', $email, time()+3600);
				}

				//session
				$_SESSION['user'] = $user;
				$this->load->view('Perusahaan_Home');
			} else {
			$this->session->set_flashdata('error','Username atau password salah!');
			$this->load->view('Login');
			}
		}else{

			redirect('/Admin/beranda', 'refresh');
		}
<<<<<<< HEAD
	}
	

	public function Logout(){
		$this->session->sess_destroy();
		redirect('User/index');
=======

		
			}
	

	public function Logout(){

		if (isset($_POST['logout'])) {
			$this->session->unset_userdata('user');
			$this->session->sess_destroy();
			$this->load->view('Login');
			
		}else if ($this->session->userdata('user') != FALSE){

			redirect('/Admin/beranda', 'refresh');
		}

		

>>>>>>> bfa798eab432fc1daa48888d138c32506081f6c7
	}
}


<<<<<<< HEAD
//$select = $this->db->query('SELECT nama FROM admin WHERE id_user = $cek['id']');
=======
>>>>>>> bfa798eab432fc1daa48888d138c32506081f6c7

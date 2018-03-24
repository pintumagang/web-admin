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


				//set coockies kalo ngeklik remember me
				if ( isset($_POST['remember-me']) ) {
					setcookie('email', $email, time()+3600);
				}

				// session
				session_start();
				$_SESSION['user'] = $user;
				redirect('/Admin/beranda', 'refresh');

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

		
			}
	

	public function Logout(){

		if (isset($_POST['logout'])) {
			$this->session->unset_userdata('user');
			$this->session->sess_destroy();
			$this->load->view('Login');
			
		}else if ($this->session->userdata('user') != FALSE){

			redirect('/Admin/beranda', 'refresh');
		}

		

	}
}



<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('User.php');

class Admin extends CI_Controller {


	public function beranda()
	{	

		// nanti tambahin warning
		if ($this->session->userdata('user') == FALSE) {
			$this->load->view('Login');
		}
		else{
			
			$this->output->set_header('Last-Modified:'.gmdate('D, d M Y H:i:s').'GMT');
			$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
			$this->output->set_header('Cache-Control: post-check=0, pre-check=0',false);
			$this->output->set_header('Pragma: no-cache');
			$this->load->view('Admin_Home');
		}
		
	}

	public function View_Beranda() 
	{
		$this->load->view('Admin_Home');
	}

	public function View_Admin()
	{
		$this->load->view('Admin_Home');
	} 

	public function View_Mahasiswa()
	{
		$this->load->view('Admin_Mahasiswa');
	} 

	public function View_Perusahaan()
	{
		$this->load->view('Admin_Perusahaan');
	}
}

?>
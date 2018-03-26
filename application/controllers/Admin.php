<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->model('Model_Admin');
	}




	public function TampilkanDataMahasiswa()
	{
		$this->load->view('Admin_Home');
	}

	public function View_Beranda() 
	{
		$this->load->view('Admin_Home');
	}

	public function View_Admin()
	{
		$dataadmin['admin']		= $this->Model_Admin->tampiltableadmin()->result();
		$this->load->view('Admin_Home', $dataadmin);
	} 

	public function View_Mahasiswa()
	{
		$this->load->view('Admin_Home');
	} 

	public function View_Perusahaan()
	{
		$this->load->view('Admin_Home');
	}

	public function EditDataAdmin(){
		$this->load->view('Admin_Admin_formedit');
	}
}

?>
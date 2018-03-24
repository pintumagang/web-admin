<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
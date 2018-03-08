<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends User {

	public function TampilkanDataMahasiswa()
	{
		$this->load->view('Admin_Home');
	}

}
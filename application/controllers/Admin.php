<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('User.php');

class Admin extends User {

	public function beranda()
	{
		$this->load->view('Admin_Home');
	}

}
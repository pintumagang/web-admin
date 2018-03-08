<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan extends User {

	public function Daftar()
	{
		$this->load->view('Perusahaan_Home');
	}

}

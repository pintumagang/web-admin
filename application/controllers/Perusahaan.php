<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include ('User.php');
class Perusahaan extends User {

	public function Daftar()
	{
		$this->load->view('Perusahaan_Home');
	}

	public function register(){
        $this->load->view('Register_Perusahaan');
    }

}

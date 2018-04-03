<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include ('User.php');
class Perusahaan extends User {



	public function View_Beranda (){
        $this->load->view('Perusahaan_Home');
    }

    public function View_Pendaftar(){
        $this->load->view('Perusahaan_Home');
    }

    public function View_TambahLowongan(){
        $this->load->view('Perusahaan_Home');
    }

    public function View_EditProfil(){
        $this->load->view('Perusahaan_Home');
    }
	public function view_register(){

        $this->load->view('Register_Perusahaan');
    }


    public function register(){

    }

}

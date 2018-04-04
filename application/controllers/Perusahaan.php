<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include ('User.php');
class Perusahaan extends CI_Controller {



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

       /* if (isset($_POST["submit_daftar"])){
                $this->register();
        }*/
	}


    public function register(){


        $nama_perusahaan = $this->input->post('nama_perusahaan',true);
        $nama_jalan = $this->input->post('nama_jalan',true);
        $provinsi = $this->input->post('provinsi',true);
        $kota = $this->input->post('kota',true);
        $negara = $this->input->post('negara',true);
        $kode_pos = $this->input->post('kode_pos',true);
        $no_tlp = $this->input->post('no_tlp',true);
        $email_daftar = $this->input->post('email_daftar',true);
        $username_daftar = $this->input->post('username_daftar',true);
        $password_daftar = $this->input->post('password_daftar',true);
        $jenis_industri = $this->input->post('jenis_industri',true);
        $website = $this->input->post('website',true);
	    $this->load->model('Model_Perusahaan');

	    $this->Model_Perusahaan->createPerusahaan($nama_perusahaan, $nama_jalan, $provinsi,
            $kota, $negara, $kode_pos, $no_tlp,
            $email_daftar, $username_daftar, $password_daftar, $jenis_industri, $website);

    }

}

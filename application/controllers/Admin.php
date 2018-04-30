<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('User.php');
class Admin extends User {

	public function __construct(){
		parent::__construct();
		$this->load->helper('url','form');
		$this->load->library('form_validation');
		$this->load->model('Model_Admin');
		$this->load->database();
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
		$dataadmin['admin']	= $this->Model_Admin->tampiltableadmin()->result_array();
		$this->load->view('Admin_Home', $dataadmin);
	} 

	public function View_Mahasiswa()
	{
		$datamahasiswa['mahasiswa']	= $this->Model_Admin->tampiltablemahasiswa()->result_array();
		
		$this->load->view('Admin_Home', $datamahasiswa);
	} 

	public function View_Perusahaan()
	{
		$dataperusahaan['perusahaan'] = $this->Model_Admin->tampiltableperusahaan()->result_array();
		
		$this->load->view('Admin_Home', $dataperusahaan);
	}

	public function View_Lowongan()
	{
		$datalowongan['lowongan'] = $this->Model_Admin->tampiltablelowongan()->result_array();
		
		$this->load->view('Admin_Home', $datalowongan);
	}

	public function deletemahasiswa($id){
		$hapus = $this->Model_Admin->hapusDatauser('user',$id);
		$hapus = $this->Model_Admin->hapusDatamahasiswa('mahasiswa',$id);
		if( $hapus > 0 ){
			redirect('Admin/View_Mahasiswa?module=Mahasiswa');
		} else {
			echo 'Gagal dihapus';
		}
	}

	public function deleteadmin($id){
		$hapus = $this->Model_Admin->hapusDatauser('user',$id);
		$hapus = $this->Model_Admin->hapusDatamahasiswa('admin',$id);
		if( $hapus > 0 ){
			redirect('Admin/View_Admin?module=Admin');
		} else {
			echo 'Gagal dihapus';
		}
	}

	public function deleteperusahaan($id){
		$hapus = $this->Model_Admin->hapusDatauser('user',$id);
		$hapus = $this->Model_Admin->hapusDatamahasiswa('perusahaan',$id);
		if( $hapus > 0 ){
			redirect('Admin/View_Perusahaan?module=Perusahaan');
		} else {
			echo 'Gagal dihapus';
		}
	}

	public function deletelowongan($id){
		$hapus = $this->Model_Admin->hapusDatamahasiswa('lowongan',$id);
		if( $hapus > 0 ){
			redirect('Admin/View_Lowongan?module=Lowongan');
		} else {
			echo 'Gagal dihapus';
		}
	}

	public function validasiperusahaan($id){
		$status			=1;
		$data = array(
			'status' => $status,
		);
		$verifikasi = $this->Model_Admin->verifikasiperusahaan($data,$id);
		if( $verifikasi > 0 ){
			redirect('Admin/View_Perusahaan?module=Perusahaan');
		} else {
			echo 'Proses Gagal';
		}
	}

	public function aktif($id){
		$status		=0;
		$data = array(
			'status' => $status,
		);
		$verifikasi = $this->Model_Admin->aktifasilowongan($data,$id);
		if( $verifikasi > 0 ){
			redirect('Admin/View_Lowongan?module=Lowongan');
		} else {
			echo 'Proses Gagal';
		}
	}

	public function nonaktif($id){
		$status			=1;
		$data = array(
			'status' => $status,
		);
		$verifikasi = $this->Model_Admin->aktifasilowongan($data,$id);
		if( $verifikasi > 0 ){
			redirect('Admin/View_Lowongan?module=Lowongan');
		} else {
			echo 'Proses Gagal';
		}
	}

	public function batalvalidasiperusahaan($id){
		$status			=0;
		$data = array(
			'status' => $status,
		);
		$verifikasi = $this->Model_Admin->verifikasiperusahaan($data,$id);
		if( $verifikasi > 0 ){
			redirect('Admin/View_Perusahaan?module=Perusahaan');
		} else {
			echo 'Proses dihapus';
		}
	}

	public function cek_email(){
		if(!filter_val($_POST["email"], FILTER_VALIDATE_EMAIL)){
			echo '<label class="text-danger"><span class="glyphicon glyphicon-remove">Email tidak valid!</span></label>';
		} else {
			$this->load->model('Model_Admin');
			if($this->Model_Admin->is_email_available($_POST["email"])){
				echo '<label class="text-danger"><span class="glyphicon glyphicon-remove">Email telah digunakan!</span></label>';
			} else {
				echo '<label class="text-success"><span class="glyphicon glyphicon-ok">Email tersedia!</span></label>';
			}
		}
	}

	public function tambahmahasiswa(){
		$username 		=$_POST['uname'];
		$nama_dpn 		=$_POST['nama_dpn'];
		$nama_blkg 		=$_POST['nama_blkg'];
		$email_u 		=$_POST['email'];
		$ptn 			=$_POST['ptn'];
		$hp 			=$_POST['hp'];
		$psw 			=$_POST['psw'];
		$stat 			= 'M';
		$psw = md5($psw);

		$data1 = array(
				'username' 			=> $username,
				'email_user' 		=> $email_u,
				'password'			=> $psw,
				'status'			=> $stat,
				);
		$tambah1 = $this->Model_Admin->tambahmahasiswa('user',$data1);
		$new_id = $this->db->insert_id();
		$data2 =  array(
				'id_user'			=> $new_id,
				'nama_depan'		=> $nama_dpn,
				'nama_belakang'		=> $nama_blkg,
				'perguruan_tinggi'	=> $ptn,
				'hp'				=> $hp
				);

		$tambah2 = $this->Model_Admin->tambahmahasiswa('mahasiswa',$data2);
		if( ($tambah1 + $tambah2) > 0 ){
			redirect('Admin/View_Mahasiswa?module=Mahasiswa');
		} else {
			echo 'Gagal disimpan';
		}
	}

		public function tambahperusahaan(){
		$username 		=$_POST['uname'];
		$nama_phs 		=$_POST['nama_phs'];
		$webeb 			=$_POST['web'];
		$email_u 		=$_POST['email_u'];
		$almt 			=$_POST['almt'];
		$status			=$_POST['status'];
		$psw 			=$_POST['psw'];
		$stat 			= 'P';
		if($status == 'Aktif' || $status == 'aktfif'){
			$status = 1;
		} else if ($status == 'Tidak aktif' || $status == 'tidak aktfif'){
			$status = 0;
		}

		$psw = md5($psw); 
		$data1 = array(
				'username' 			=> $username,
				'email_user' 		=> $email_u,
				'password'			=> $psw,
				'status'			=> $stat,
				);
		$tambah1 = $this->Model_Admin->tambahmahasiswa('user',$data1);
		$new_id = $this->db->insert_id();
		$data2 =  array(
				'id_user'					=> $new_id,
				'nama_perusahaan'			=> $nama_phs,
				'alamat_perusahaan'			=> $almt,
				'link_website'				=> $webeb,
				'status'					=> $status,
				);

		$tambah2 = $this->Model_Admin->tambahmahasiswa('perusahaan',$data2);
		if( ($tambah1 + $tambah2) > 0 ){
			redirect('Admin/View_Perusahaan?module=Perusahaan');
		} else {
			echo 'Gagal disimpan';
		}
	}

	public function tambahlowongan(){
		$nama_lowongan 			=$_POST['nama_lowongan'];
		$lokasi					=$_POST['lokasi'];
		$waktu_input 			=$_POST['waktu_input'];
		$batas_lamar 			=$_POST['batas_lamar'];
		$jenis_magang 			=$_POST['jenis_magang']; 
		$data1 = array(
				'nama_lowongan' 	=> $nama_lowongan,
				'lokasi'			=> $lokasi,
				'waktu_input'		=> $waktu_input,
				'deadline_submit'		=> $batas_lamar,
				'jenis_magang'		=> $jenis_magang,
				);
		$tambah1 = $this->Model_Admin->tambahmahasiswa('lowongan',$data1);
		
		if( ($tambah1 + $tambah2) > 0 ){
			redirect('Admin/View_Lowongan?module=Lowongan');
		} else {
			echo 'Gagal disimpan';
		}
	}

	public function editmahasiswa($id){
		$username 		=$_POST['uname'];
		$nama_dpn 		=$_POST['nama_dpn'];
		$nama_blkg 		=$_POST['nama_blkg'];
		$email_u 		=$_POST['email'];
		$ptn 			=$_POST['ptn'];
		$hp 			=$_POST['hp'];
		$data1 = array(
				'username' 			=> $username,
				'email_user' 		=> $email_u,
				);
		$edit1 = $this->Model_Admin->editDatamahasiswa('user',$data1,$id);
		$data2 =  array(
				'nama_depan'		=> $nama_dpn,
				'nama_belakang'		=> $nama_blkg,
				'perguruan_tinggi'	=> $ptn,
				'hp'				=> $hp
				);

		$edit2 = $this->Model_Admin->editDatamahasiswa('mahasiswa',$data2,$id);
		if( ($edit1 + $edit2) > 0 ){
			redirect('Admin/View_Mahasiswa?module=Mahasiswa');
		} else {
			echo 'Gagal disimpan';
		}
	}

	public function editadmin($id){
		$username 		=$_POST['uname'];
		$nama 	 		=$_POST['nama'];
		$email_u 		=$_POST['email_u'];
		$hp 			=$_POST['hp'];
		$data1 = array(
				'username' 			=> $username,
				'email_user' 		=> $email_u,
				);
		$edit1 = $this->Model_Admin->editDatamahasiswa('user',$data1,$id);
		$data2 =  array(
				'nama'		=> $nama,
				'phone'		=> $hp
				);

		$edit2 = $this->Model_Admin->editDatamahasiswa('admin',$data2,$id);
		if( ($edit1 + $edit2) > 0 ){
			redirect('Admin/View_Admin?module=Admin');
		} else {
			echo 'Gagal disimpan';
		}
	}


	public function editperusahaan($id){
		$username 		=$_POST['uname'];
		$nama_perusahaan 		=$_POST['nama_phs'];
		$link_website 		=$_POST['web'];
		$email_u 		=$_POST['email_u'];
		$alamat 		=$_POST['almt'];
		$data1 = array(
				'username' 			=> $username,
				'email_user' 		=> $email_u,
				);
		$edit1 = $this->Model_Admin->editDatamahasiswa('user',$data1,$id);
		$data2 =  array(
				'nama_perusahaan'	=> $nama_perusahaan,
				'link_website'		=> $link_website,
				'alamat_perusahaan'				=> $alamat,
				);

		$edit2 = $this->Model_Admin->editDatamahasiswa('perusahaan',$data2,$id);
		if( ($edit1 + $edit2) > 0 ){
			redirect('Admin/View_Perusahaan?module=Perusahaan');
		} else {
			echo 'Gagal disimpan';
		}
	}

	function check_email_avalibility()  
      { 
   				
   		 if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))  
           {  
                echo '<small style="color : #a94442;" data-bv-validator="stringLength" data-bv-validator-for="email" class="help-block" style="display: block;">Email tidak valid!</small>';  
           }  
           else  
           {
                $this->load->model("Model_Admin");  
                if($this->Model_Admin->is_email_available($_POST["email"]))  
                {  
                     //echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email Already register</label>'; 
                     echo '<small style="color : #a94442;" data-bv-validator="stringLength" data-bv-validator-for="email" class="help-block" style="display: block;">Email telah terdaftar!</small>';
                }
            }   
               
      }

      function check_uname_avalibility()  
      { 
   
                $this->load->model("Model_Admin");  
                if($this->Model_Admin->is_uname_available($_POST["uname"]))  
                {  
                     //echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email Already register</label>'; 
                     echo '<small style="color : #a94442;" data-bv-validator="stringLength" data-bv-validator-for="uname" class="help-block" style="display: block;">Username telah digunakan!</small>';
                }    
               
      }

}




?>
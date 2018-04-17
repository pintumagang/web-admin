<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('User.php');
class Admin extends User {

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

	public function validasiperusahaan($id){
		
	}

	public function tambahmahasiswa(){
		$username 		=$_POST['uname'];
		$nama_dpn 		=$_POST['nama_dpn'];
		$nama_blkg 		=$_POST['nama_blkg'];
		$email_u 		=$_POST['email_u'];
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
		$nama_dpn 		=$_POST['nama_phs'];
		$nama_blkg 		=$_POST['web'];
		$email_u 		=$_POST['email_u'];
		$ptn 			=$_POST['almt'];
		$hp 			=$_POST['deks'];
		$status			=$_POST['status'];
		$psw 			=$_POST['psw'];
		$stat 			= 'P';
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

		$tambah2 = $this->Model_Admin->tambahmahasiswa('perusahaan',$data2);
		if( ($tambah1 + $tambah2) > 0 ){
			redirect('Admin/View_Perusahaan?module=Perusahaan');
		} else {
			echo 'Gagal disimpan';
		}
	}

	public function editmahasiswa($id){
		$username 		=$_POST['uname'];
		$nama_dpn 		=$_POST['nama_dpn'];
		$nama_blkg 		=$_POST['nama_blkg'];
		$email_u 		=$_POST['email_u'];
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
		$nama_dpn 		=$_POST['nama_dpn'];
		$nama_blkg 		=$_POST['nama_blkg'];
		$email_u 		=$_POST['email_u'];
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
}




?>
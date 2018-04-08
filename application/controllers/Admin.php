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
		$dataadmin['admin']	= $this->Model_Admin->tampiltableadmin()->result();
		$this->load->view('Admin_Home', $dataadmin);
	} 

	public function View_Mahasiswa()
	{
		$dataadmin['mahasiswa']	= $this->Model_Admin->tampiltablemahasiswa()->result();
		
		$this->load->view('Admin_Home', $dataadmin);
	} 

	public function View_Perusahaan()
	{
		$this->load->view('Admin_Home');
	}

	public function EditDataAdmin(){
		$this->load->view('Admin_Admin_formedit');
	}

	public function delete($id){
		$hapus = $this->Model_Admin->hapusDatauser('user',$id);
		$hapus = $this->Model_Admin->hapusDatamahasiswa('mahasiswa',$id);
		if( $hapus > 0 ){
			redirect('Admin/View_Mahasiswa?module=Mahasiswa');
		} else {
			echo 'Gagal dihapus';
		}
	}

	public function tambahmahasiswa(){
		$username 		=$_POST['uname'];
		$nama_dpn 		=$_POST['nama_dpn'];
		$nama_blkg 		=$_POST['nama_blkg'];
		$email_u 		=$_POST['email_u'];
		$ptn 			=$_POST['ptn'];
		$hp 			=$_POST['hp'];
		$psw 			=$_POST['psw'];
		$data1 = array(
				'username' 			=> $username,
				'email_user' 		=> $email_u,
				'password'			=> $psw,
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

	public function getdataEdit($id){
		$this->data['dataEdit'] = $this->Model_Admin->DataEditMahasiswa($id);
		//redirect('Admin/View_Mahasiswa?module=Mahasiswa',$this->data);
		//$this->load->view('Admin_Home',$this->data);
	}

	public function editmahasiswa($id){
		$this->data['dataEdit'] = $this->Model_Admin->dataEditMahasiswa('user',$id);
		$this->load->view('',$this->data);

	}
}

?>
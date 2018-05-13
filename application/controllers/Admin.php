<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('User.php');
class Admin extends User {

	public function __construct(){
		parent::__construct();
        $this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->model('Model_Admin');
		$this->load->database();
        $this->load->library('upload');
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

	public function View_Prodi()
	{
		$dataprodi['prodi']	= $this->Model_Admin->tampiltableprodi()->result_array();
		
		$this->load->view('Admin_Home', $dataprodi);
	} 

	public function View_Slider()
	{
		$dataslider['slider'] = $this->Model_Admin->getslider()->result_array();
		$this->load->view('Admin_Home', $dataslider);
	} 

	public function View_Mahasiswa()
	{
		$datalowongan['mahasiswa'] = $this->Model_Admin->tampiltablemahasiswa()->result_array();
		
		$this->load->view('Admin_Home', $datalowongan);
	}

	public function View_Perusahaan()
	{
		$dataperusahaan['perusahaan'] = $this->Model_Admin->tampiltableperusahaan()->result_array();
		$dataprovinsi['provinsi'] = $this->Model_Admin->getProvinsi()->result_array();
		$datakabkot['kabkot'] = $this->Model_Admin->getKabkot()->result_array();

		$data = array(
			'perusahaan' => $dataperusahaan,
			'provinsi' => $dataprovinsi,
			'kabkot' => $datakabkot
		);
		$this->load->view('Admin_Home', $data);
	}

	public function View_Lowongan()
	{
		$datalowongan['lowongan'] = $this->Model_Admin->tampiltablelowongan()->result_array();
		$dataprovinsi['provinsi'] = $this->Model_Admin->getProvinsi()->result_array();
		$dataperusahaan['perusahaan'] = $this->Model_Admin->getPerusahaan()->result_array();
		$dataprodi['prodi']	= $this->Model_Admin->tampiltableprodi()->result_array();
		$data = array(
			'lowongan' => $datalowongan,
			'provinsi' => $dataprovinsi,
			'perusahaan' => $dataperusahaan,
			'prodi'	=> $dataprodi
		);
		$this->load->view('Admin_Home', $data);
	}

	public function deleteslider($id){
		$hapus = $this->Model_Admin->hapusDataSlider('slider_home',$id);
		if( $hapus > 0 ){
			redirect('Admin/View_Slider?module=Slider');
		} else {
			echo 'Gagal dihapus';
		}
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
		$hapus = $this->Model_Admin->hapusDatalowongan('lowongan',$id);
		if( $hapus > 0 ){
			redirect('Admin/View_Lowongan?module=Lowongan');
		} else {
			echo 'Gagal dihapus';
		}
	}

	public function deleteprodi($id){
		$hapus = $this->Model_Admin->hapusDataProdi('prodi',$id);
		if( $hapus > 0 ){
			redirect('Admin/View_Prodi?module=Prodi');
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
		$psw 			=$_POST['password'];
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
		$email_u 		=$_POST['email'];
		$almt 			=$_POST['almt'];
		$provinsi 		=$_POST['provinsi'];
		$kabkot 		=$_POST['kabkot'];
		$psw 			=$_POST['password'];
		$kodepos 		=$_POST['kodepos'];
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
				'id_provinsi'				=> $provinsi,
				'id_kota'					=> $kabkot,
				'kodepos'					=> $kodepos,
				);

		$tambah2 = $this->Model_Admin->tambahmahasiswa('perusahaan',$data2);
		if( ($tambah1 + $tambah2) > 0 ){
			redirect('Admin/View_Perusahaan?module=Perusahaan');
		} else {
			echo 'Gagal disimpan';
		}
	}

	public function tambahlowongan(){
		$nama_lowongan 		=$_POST['nama_lowongan'];
		$id_perusahaan		=$_POST['nama_phs'];
		$lokasi				=$_POST['lokasi'];
		$id_prodi			=$_POST['prodi'];
		$bataslamar 		=$_POST['batas_lamar'];
		$batas_lamar 		= date("Y-m-d", strtotime($bataslamar));
		$jenis_magang 		=$_POST['jenis_magang']; 
		$lokasi				=$_POST['lokasi'];
		$waktu_input	    = date('Y-m-d H:i:s');
		$status				= 0;
		$data1 = array(
				'nama_lowongan' 	=> $nama_lowongan,
				'id_perusahaan'		=> $id_perusahaan,
				'id_prodi'			=> $id_prodi,
				'lokasi'			=> $lokasi,
				'waktu_input'		=> $waktu_input,
				'deadline_submit'	=> $batas_lamar,
				'jenis_magang'		=> $jenis_magang,
				'status'			=> $status
				);
		$tambah1 = $this->Model_Admin->tambahmahasiswa('lowongan',$data1);
		
		if( ($tambah1 + $tambah2) > 0 ){
			redirect('Admin/View_Lowongan?module=Lowongan');
		} else {
			echo 'Gagal disimpan';
		}
	}

	public function editmahasiswa($id){
		$nama_dpn 		=$_POST['nama_dpn'];
		$nama_blkg 		=$_POST['nama_blkg'];
		$email_u 		=$_POST['email'];
		$ptn 			=$_POST['ptn'];
		$hp 			=$_POST['hp'];
		$data1 = array(
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
		$nama 	 		=$_POST['nama'];
		$email_u 		=$_POST['email'];
		$hp 			=$_POST['hp'];
		$data1 = array(
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
		$nama_perusahaan 		=$_POST['nama_phs'];
		$link_website 		=$_POST['web'];
		$email_u 		=$_POST['email'];
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
   		   //$this->load->model("Model_Admin");  
                if($this->Model_Admin->is_email_available($_POST["email"]))  
                {  
                     //echo '<label class="text-danger"><span class="glyphicon glyphicon-remove"></span> Email Already register</label>'; 
                     echo '<small style="color : #a94442;" data-bv-validator="stringLength" data-bv-validator-for="email" class="help-block" style="display: block;">Email telah terdaftar!</small>';
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


      function tambahprodi()
      {
      			$nama_prodi =$_POST['nama_prodi'];

      			$config['upload_path']          = './assets/images/logoprodi/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1024;

      			$this->load->library('upload', $config);
      			$this->upload->initialize($config);

      			if(!$this->upload->do_upload('gambar')){
      				echo "upload gagal";
      			} else {
      				$data = array('upload_data' => $this->upload->data());
      				
      				$datap = array(
      				'nama_prodi' => $nama_prodi,
      				'logo_prodi' => $data['upload_data']['file_path'],
      				);

      				$tambah1 = $this->Model_Admin->tambahprodi($datap);

      				if( ($tambah1) > 0 ){
						redirect('Admin/View_Prodi?module=Prodi');
					} else {
						echo 'Gagal disimpan';
					}

      			}
	
      }

    public function editprodi($id){

      	$nama_prodi 		=$_POST['nama_prodi'];
      	$gambar			=$_FILES['gambar'];
      	if($gambar == ''){
				$data1 = array(
						'nama_prodi' => $nama_prodi,
						);
				$edit2 = $this->Model_Admin->editProdi('prodi',$data1,$id);
				if( ($edit2) > 0 ){
					redirect('Admin/View_Prodi?module=Prodi');
				} else {
					echo 'Gagal disimpan';
				}
		} else if ($nama_prodi == ''){

				$config['upload_path']          = './assets/images/logoprodi/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1024;

      			$this->load->library('upload', $config);
      			$this->upload->initialize($config);

      			if(!$this->upload->do_upload('gambar')){
      				echo "upload gagal";
      			} else {
      				$data = array('upload_data' => $this->upload->data());
      				
      				$datap = array(
      				'logo_prodi' => $data['upload_data']['full_path'],
      				);

      				$tambah1 = $this->Model_Admin->editprodi('prodi',$datap,$id);

      				if( ($tambah1) > 0 ){
						redirect('Admin/View_Prodi?module=Prodi');
					} else {
						echo 'Gagal disimpan';
					}

      			}

		} else {

      			$config['upload_path']          = './assets/images/logoprodi/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 1024;

      			$this->load->library('upload', $config);
      			$this->upload->initialize($config);

      			if(!$this->upload->do_upload('gambar')){
      				echo "upload gagal";
      			} else {
      				$data = array('upload_data' => $this->upload->data());
      				
      				$datap = array(
      				'nama_prodi' => $nama_prodi,
      				'logo_prodi' => $data['upload_data']['full_path'],
      				);

      				$tambah1 = $this->Model_Admin->editprodi('prodi',$datap,$id);

      				if( ($tambah1) > 0 ){
						redirect('Admin/View_Prodi?module=Prodi');
					} else {
						echo 'Gagal disimpan';
					}

      			}

		}

    }


}




?>
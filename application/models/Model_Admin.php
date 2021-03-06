<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Admin extends CI_Model {

		public function tampiltableadmin(){
			$sql = "select a.id_user, a.id_admin, a.nama, a.phone, b.email_user, b.username, b.last_login from admin a, user b where a.id_user = b.id_user";
			return $this->db->query($sql);
		}

		public function tampiltablemahasiswa(){
			$sql = "select a.id_user, a.id_mhs, a.nama_depan, a.nama_belakang, a.perguruan_tinggi, a.hp , b.email_user, b.username, b.last_login from mahasiswa a, user b where a.id_user = b.id_user";
			return $this->db->query($sql);
		}

		public function tampiltableprodi(){
			$sql = "select * from prodi";
			return $this->db->query($sql);
		}

		public function tampiltableperusahaan(){
			//$sql ="SELECT * FROM perusahaan AS f INNER JOIN user AS d ON d.id_user = f.id_user INNER JOIN provinsi AS c ON c.id_provinsi = f.id_provinsi INNER JOIN kabupaten_kota AS n ON n.id_kota = f.id_kabkot";
//			$sql = "select a.id_user, a.id_perusahaan, a.nama_perusahaan, a.alamat_perusahaan, a.deskripsi, a.link_website, a.status, a.email , b.email_user, b.username, b.last_login from perusahaan a, user b where a.id_user = b.id_user";
			$sql = "SELECT perusahaan.id_user, perusahaan.id_perusahaan, perusahaan.nama_perusahaan, perusahaan.alamat_perusahaan, perusahaan.deskripsi, perusahaan.link_website, perusahaan.status, perusahaan.email, perusahaan.id_kota, perusahaan.kodepos, user.email_user, user.username, user.last_login, kabupaten_kota.nama_kabkot, kabupaten_kota.id_provinsi, provinsi.nama_provinsi from perusahaan INNER JOIN user ON perusahaan.id_user = user.id_user INNER JOIN kabupaten_kota ON kabupaten_kota.id_kabkot = perusahaan.id_kota INNER JOIN provinsi ON perusahaan.id_provinsi = provinsi.id_provinsi WHERE perusahaan.id_user = user.id_user";
			return $this->db->query($sql);
		}

		public function getProvinsi(){

        $sql = "SELECT * FROM provinsi";

        return $this->db->query($sql);
    	}

    	public function getSlider(){

        $sql = "SELECT * FROM slider_home";

        return $this->db->query($sql);
    	}

    	public function getPerusahaan(){

        $sql = "SELECT * FROM perusahaan where status = 1" ;

        return $this->db->query($sql);
    	}

    	public function getKabkot(){
        $sql = "SELECT * FROM kabupaten_kota";
        return $this->db->query($sql);
    	}

		public function tampiltablelowongan(){
			$sql = "select a.id_lowongan, a.id_perusahaan, a.nama_lowongan, a.status, a.waktu_input, a.deadline_submit, a.jenis_magang, a.lokasi, b.nama_perusahaan from lowongan a, perusahaan b where a.id_perusahaan = b.id_perusahaan";
			return $this->db->query($sql);
		}

		public function tambahmahasiswa($table, $data)
			{
				$tambah = $this->db->insert($table,$data);
				return $tambah;
		}

		public function hapusDatauser($table_name,$id){
				$this->db->where('id_user',$id);
				$hapus = $this->db->delete($table_name);
				return $hapus;
		}

		public function hapusDatamahasiswa($table_name,$id){
				$this->db->where('id_user',$id);
				$hapus = $this->db->delete($table_name);
				return $hapus;
		}

		public function hapusDataProdi($table_name,$id){
				$this->db->where('id_prodi',$id);
				$hapus = $this->db->delete($table_name);
				return $hapus;
		}

		public function hapusDataSlider($table_name,$id){
				$this->db->where('id_slider',$id);
				$hapus = $this->db->delete($table_name);
				return $hapus;
		}

		public function hapusDatalowongan($table_name,$id){
				$this->db->where('id_lowongan',$id);
				$hapus = $this->db->delete($table_name);
				return $hapus;
		}
		
		public function DataEditMahasiswa($id){
			$this->db->where('id_user',$id);
				$sql = "select a.id_user, a.id_mhs, a.nama_depan, a.nama_belakang, a.perguruan_tinggi, a.hp , b.email_user, b.username, b.last_login from mahasiswa a, user b where a.id_user = b.id_user";
			return $this->db->query($sql);
		}

		public function editDatamahasiswa($table_name,$data,$id)
		{
			$this->db->where('id_user',$id);
			$edit = $this->db->update($table_name,$data);
			return $edit;
		}

		public function editProdi($table_name,$data,$id)
		{
			$this->db->where('id_prodi',$id);
			$edit = $this->db->update($table_name,$data);
			return $edit;
		}

		public function verifikasiperusahaan($data,$id)
		{
			$this->db->where('id_user',$id);
			$edit = $this->db->update('perusahaan',$data);
			return $edit;
		}

		public function aktifasilowongan($data,$id)
		{
			$this->db->where('id_lowongan',$id);
			$edit = $this->db->update('lowongan',$data);
			return $edit;
		}

		function is_email_available($email)  
      	{  
           $this->db->where('email_user', $email);  
           $query = $this->db->get('user');  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      	}

      	function is_uname_available($uname) 
      	{  
           $this->db->where('username', $uname);  
           $query = $this->db->get('user');  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;  
           }  
      	}

      	public function tambahprodi($data){
      		$tambah = $this->db->insert('prodi',$data);
			return $tambah;
      	}
    }
 


?>
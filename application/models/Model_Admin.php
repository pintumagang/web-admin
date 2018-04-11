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

		public function tampiltableperusahaan(){
			$sqli = "select a.id_user, a.id_perusahaan, a.nama_perusahaan, a.alamat_perusahaan, a.deskripsi, a.link_website, a.status , b.email_user, b.username, b.last_login from perusahaan a, user b where a.id_user = b.id_user";
			return $this->db->query($sqli);
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

		public function getid_mhs($id){
			$this->db->where('id_user',$id);
			$id_mhs = $this->db->select->id_mhs;
			return $id_mhs;
		}
}

?>
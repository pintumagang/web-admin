<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Admin extends CI_Model {

		public function tampiltableadmin(){
			$this->db->order_by("id_admin","desc");
			$sql = "select a.id_user, a.id_admin, a.nama, a.email, b.username, b.last_login from admin a, user b where a.id_user = b.id_user";
			return $this->db->query($sql);
		}

		public function tampiltableuser(){
			return $this->db->get('user');
		}

		public function createadmin(){
			$this->db->insert("admin",array("nama"=>"", "email"=>""));
			$this->db->insert("user",array("username"=>""));
			return $this->db->insert_id();
		}

		public function updateadmin($id_admin,$value,$modul){
			$this->db->order_by("id_admin","desc");
			$this->db->where(array("id_admin"=>$id_admin));
			$this->db->update("admin",array($modul=>$value));
		}

		public function delete($id){
			$this->db->where("id_admin",$id);
			$this->db->delete("admin");
		}
}

?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Admin extends CI_Model {

		public function tampiltableadmin(){
			$sql = "select a.id_user, a.id_admin, a.nama, a.email, b.username, b.last_login from admin a, user b where a.id_user = b.id_user";
			return $this->db->query($sql);

		}

		public function tampiltableuser(){
			return $this->db->get('user');
		}

}

?>
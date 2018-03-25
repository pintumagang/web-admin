<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Admin extends CI_Model {

		public function tampiltableadmin(){
			return $this->db->get('admin');
		}

		public function tampiltableuser(){
			return $this->db->get('user');
		}

}

?>
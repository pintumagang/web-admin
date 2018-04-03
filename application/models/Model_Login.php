<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Login extends CI_Model {

	public function prosesLogin($user,$pass)
	{
		$this->db->where('username',$user);
		$this->db->where('password',md5($pass));
		return $this->db->get('user')->row_array();
	}

	public function cekStatus($status){

        $this->db->where('status',$status);
        return $this->db->get('user')->row_array();
    }


	/*public function Set_id($user_name){
		$this->db->where('username',$user_name);
		$this->db->where('id_user',$id_user);
		return $id_user;

		//Mencari user id berdasarkan username pada table mahasiswa

	}

	public function Get_Profil($id_user){
		return $this->db->get_where('mahasiswa',array('id_user' => $id_user), 'nama_belakang' , 'nama_depan');

	}*/


}
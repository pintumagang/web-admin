<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_Perusahaan extends CI_Model {


    public function createPerusahaan($nama_perusahaan, $nama_jalan, $provinsi, $kota, $negara, $kode_pos, $no_tlp,
                                    $email_daftar, $username_daftar, $password_daftar, $jenis_industri, $website){

        $this->db->insert("perusahaan",array("nama_perusahaan"=>$nama_perusahaan, "alamat_perusahaan"=> $nama_jalan,
                                            "link_website"=>$website, "kodepos" =>$kode_pos, "status"=> "P"));

        $this->db->insert("user",array("username"=>$username_daftar, "password" =>$password_daftar, "status"=>"P"));

        return $this->db->insert_id();
    }
}

?>
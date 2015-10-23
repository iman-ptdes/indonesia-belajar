<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pengguna_model extends CI_Model {
	
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function caripengguna($nama,$username,$status_pengguna,$group_pengguna,$jenis_pengguna ){
        $this->db->select('*');
        if ($nama!=''){
                $this->db->where("nama like '%$nama%' ");
        }
        if ($username!=''){
                $this->db->where("username like '%$username%' ");
        }
        if ($status_pengguna!=''){
                $this->db->where("status = '$status_pengguna' ");
        }
        if ($group_pengguna!=''){
                $this->db->where("id_pengguna_group = '$group_pengguna' ");
        }
        if ($jenis_pengguna!=''){
                $this->db->where("jenis_pengguna = '$jenis_pengguna' ");
        }
        
        return $this->db->get("pengguna");
    }
    
}
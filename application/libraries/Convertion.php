<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Convertion {

    public function pengguna_group($option) {
        $CI = & get_instance();
        $CI->load->model('db_model');

        $query = $CI->db_model->get('pengguna_group', '*', array('id_pengguna_group' => $option));
        $row = $query->row();
        $hasil = $row->nama;
        return $hasil;
    }

}

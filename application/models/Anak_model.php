<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Anak_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function cari_anak($nama, $status_bersekolah, $jenis_sekolah, $tingkat_sekolah) {
        $this->db->select('*');
        if ($nama != '') {
            $this->db->where("nama like '%$nama%' ");
        }
        if ($status_bersekolah != '') {
            $this->db->where("status_bersekolah = '$status_bersekolah' ");
        }
        if ($jenis_sekolah != '') {
            $this->db->where("jenis_sekolah = '$jenis_sekolah' ");
        }
        if ($tingkat_sekolah != '') {
            $this->db->where("tingkat_sekolah = '$tingkat_sekolah' ");
        }

        return $this->db->get("anak");
    }

    public function cari_anak2($nama, $jenis_kelamin, $umur_awal, $umur_akhir, $alamat, $kota, $provinsi, $status_bersekolah, $jenis_sekolah, $tingkat_sekolah) {
        $this->db->select('*');
        if ($nama != '') {
            $this->db->where("nama like '%$nama%' ");
        }
        if ($jenis_kelamin != '') {
            $this->db->where("jenis_kelamin like '%$jenis_kelamin%' ");
        }
        if ($umur_awal != '') {
            $tahun_awal = date("Y") - $umur_awal;
            $tgl_awal = $tahun_awal . '-12-31';
            $this->db->where("tanggal_lahir <= '$tgl_awal' ");
        }
        if ($umur_akhir != '') {
            $tahun_akhir = date("Y") - $umur_akhir;
            $tgl_akhir = $tahun_akhir . '-01-01';
            $this->db->where("tanggal_lahir >= '$tgl_akhir' ");
        }
        if ($alamat != '') {
            $this->db->where("alamat like '%$alamat%' ");
        }
        if ($kota != '') {
            $this->db->where("kota like '%$kota%' ");
        }
        if ($provinsi != '') {
            $this->db->where("provinsi like '%$provinsi%' ");
        }
        if ($status_bersekolah != '') {
            $this->db->where("status_bersekolah = '$status_bersekolah' ");
        }
        if ($jenis_sekolah != '') {
            $this->db->where("jenis_sekolah = '$jenis_sekolah' ");
        }
        if ($tingkat_sekolah != '') {
            $this->db->where("tingkat_sekolah = '$tingkat_sekolah' ");
        }


        return $this->db->get("anak");
    }

}

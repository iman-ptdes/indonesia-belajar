<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Form_option {
     public function jenis_kelamin($option) {
        $option = array(
            '' => 'Pilih jenis kelamin',
            'Laki-laki' => 'Laki-laki',
            'Perempuan' => 'Perempuan'
        );
        return $option;
    }
    
    public function status_tempat_tinggal($option) {
        $option = array(
            '' => 'Pilih status tempat tinggal',
            'Orang tua' => 'Orang tua',
            'Kontrak/kost' => 'Kontrak/kost',
            'Menumpang saudara' => 'Menumpang saudara',
            'Asrama' => 'Asrama',
            'Lainnya' => 'Lainnya',
        );
        return $option;
    }
    
     public function jenis_sekolah($option) {
        $option = array(
            '' => 'Pilih jenis sekolah',
            'Sekolah Formal Kemdikbud' => 'Sekolah Formal Kemdikbud (SD SMP SMA SMK)',
            'Sekolah Kemenag' => 'Sekolah Kemenag (MI MTs MA)',
            'Sekolah Non Formal Kemdikbud' => 'Sekolah Non Formal Kemdikbud (Pendidikan Masyarakat)',
            'Sekolah Lainnya' => 'Sekolah Lainnya',
        );
        return $option;
    }
    
    public function tingkat_sekolah($option) {
        $option = array(
            '' => 'Pilih tingkat sekolah',
            'SD dan Sederajat' => 'SD dan Sederajat',
            'SMP dan Sederajat' => 'SMP dan Sederajat',
            'SMA dan Sederajat' => 'SMA dan Sederajat',
        );
        return $option;
    }
    
    public function status_bersekolah($option) {
        $option = array(
            '' => 'Pilih status bersekolah',
            'Masih Sekolah' => 'Masih Sekolah',
            'Putus Sekolah' => 'Putus Sekolah',
            'Tidak Sekolah' => 'Tidak Sekolah'
        );
        return $option;
    }
     
    public function group_pengguna($option) {
        $CI = & get_instance();
        $CI->load->model('db_model');

        $query = $CI->db_model->get('pengguna_group', '*','id_pengguna_group <> 1');
        $option[''] = 'Group pengguna';
        foreach ($query->result() as $data) {
            $option[$data->id_pengguna_group] = $data->nama;
        }

        return $option;
    }
    public function jenis_pengguna($option) {
        $option = array(
            '' => 'Jenis pengguna',
            'Individu' => 'Individu',
            'Sekolah' => 'Sekolah',
            'Yayasan' => 'Yayasan',
            'Organisasi' => 'Organisasi',
            'Instansi Pemerintah' => 'Instansi Pemerintah',
        );
        return $option;
    }
    public function jenis_identitas($option) {
        $option = array(
            '' => 'Jenis identitas',
            'KTP' => 'KTP',
            'NIM' => 'NIM',
            'NIS' => 'NIS',
            'NIP' => 'NIP',
            'NPWP' => 'NPWP',
        );
        return $option;
    }
    
    public function status_pengguna($option) {
        $option = array(
            '' => 'Semua',
            1 => 'Aktif',
            0 => 'Tidak/Belum Aktif',
        );
        return $option;
    }
    
    public function jenis_kelamin2($option) {
        $option = array(
            '' => 'Semua',
            'Laki-laki' => 'Laki-laki',
            'Perempuan' => 'Perempuan'
        );
        return $option;
    }

    
   

   

}

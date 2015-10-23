<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengguna extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* load model */
        $this->load->model(array('db_model','pengguna_model'));
        $this->load->library(array('pagination', 'form_validation', 'form_option','convertion'));
        $this->load->helper('url', 'form', 'date');
    }
    
    public function lihat() {
        $nama = '';
        $username = '';
        $status_pengguna = '';
        $group_pengguna = '';
        $jenis_pengguna = '';
        $jumlah = 0;
        if ($this->input->post('nama') != '') {
            $nama = $this->input->post('nama');
        }
        if ($this->input->post('username') != '') {
            $username = $this->input->post('username');
        }
        if ($this->input->post('status_pengguna') != '') {
            $status_pengguna = $this->input->post('status_pengguna');
        }
        if ($this->input->post('group_pengguna') != '') {
            $group_pengguna = $this->input->post('group_pengguna');
        }
        if ($this->input->post('jenis_pengguna') != '') {
            $jenis_pengguna = $this->input->post('jenis_pengguna');
        }
        
        if ($this->input->post('cari') == 'cari')   {
            $query = $this->pengguna_model->caripengguna($nama,$username,$status_pengguna,$group_pengguna,$jenis_pengguna );
           
            $data['data'] = $query->result();
            $jumlah = $query->num_rows();
        }
        
        $data['jumlah'] = $jumlah;
        $data['nama'] = $nama;
        $data['username'] = $username;
        $data['isi_status_pengguna'] = $status_pengguna;
        $data['isi_group_pengguna'] = $group_pengguna;
        $data['isi_jenis_pengguna'] = $jenis_pengguna;
        $data['status_pengguna'] = $this->form_option->status_pengguna('');
        $data['group_pengguna'] = $this->form_option->group_pengguna('');
        $data['jenis_pengguna'] = $this->form_option->jenis_pengguna('');
        $data['content'] = $this->load->view('pengguna/lihat', $data, true);
        $this->load->view('main_template', $data);
    }

    public function detail($hash_id) {
        $query = $this->db_model->get('pengguna', '*', array("md5(sha1(id_pengguna))" => $hash_id));
        $data['row'] = $query->row();
        $data['hash_id'] = $hash_id;
        $data['content'] = $this->load->view('pengguna/detail', $data, true);
        $this->load->view('main_template', $data);
    }

    public function tambah() {
        //$data['label_menu'] = 'Klien';
        $data['jenis_pengguna'] = $this->form_option->jenis_pengguna('');
        $data['group_pengguna'] = $this->form_option->group_pengguna('');
        $data['jenis_identitas'] = $this->form_option->jenis_identitas('');
        $data['content'] = $this->load->view('pengguna/tambah', $data, true);
        $this->load->view('home', $data);
    }

    public function tambah_db() {
        $data_check = array(
            'username' => $this->input->post('username'),
        );
        $query = $this->db_model->get('pengguna', 'id_pengguna', $data_check);
        if ($query->num_rows() > 0) {
            echo "<script>alert('Username sudah ada');
                location.href = '" . site_url("pengguna/tambah") . "';
                </script>";
        } else {
            date_default_timezone_set('Asia/Jakarta');
            if ($this->input->post('group_pengguna')=='2') {
                $status = 1;
            } else {
                $status = 0;
            }
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'password' => sha1(sha1(md5($this->input->post('password')))),
                'id_pengguna_group' => $this->input->post('group_pengguna'),
                'jenis_pengguna' => $this->input->post('jenis_pengguna'),
                'telepon' => $this->input->post('telepon'),
                'alamat' => $this->input->post('alamat'),
                'kota' => $this->input->post('kota'),
                'provinsi' => $this->input->post('provinsi'),
                'jenis_identitas' => $this->input->post('jenis_identitas'),
                'no_identitas' => $this->input->post('no_identitas'),
                'tanggal_registrasi' => date('Y-m-d'),
                'status' => $status,
            );

            if ($this->db_model->add('pengguna', $data)) {
                $id = $this->db->insert_id();
                $hash_id = md5(sha1($id));
                echo "<script>alert('Berhasil Tambah Data Pengguna');
                location.href = '" . base_url("") ."';
               </script>";
            } else {
                echo "<script>alert('Gagal Tambah Data Pengguna');
                history.go(-1);
               </script>";
            }
        }
    }

    public function edit($hash_id) {
        $query = $this->db_model->get('pengguna', '*', array("md5(sha1(id_pengguna))" => $hash_id));
        $data['row'] = $query->row();
        $data['hash_id'] = $hash_id;
        $data['jenis_pengguna'] = $this->form_option->jenis_pengguna('');
        $data['group_pengguna'] = $this->form_option->group_pengguna('');
        $data['jenis_identitas'] = $this->form_option->jenis_identitas('');
        $data['content'] = $this->load->view('pengguna/edit', $data, true);
        $this->load->view('main_template', $data);
    }

    public function edit_db() {
        $hash_id = $this->input->post('hash_id');
        $data_check = array(
            'username' => $this->input->post('username'),
            'md5(sha1(id_pengguna)) <>' => $hash_id,
        );
        $query = $this->db_model->get('pengguna', 'id_pengguna', $data_check);
        if ($query->num_rows() > 0) {
            echo "<script>alert('Username sudah ada');
                location.href = '" . site_url("pengguna/edit") . "/$hash_id';
                </script>";
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
                'id_pengguna_group' => $this->input->post('group_pengguna'),
                'jenis_pengguna' => $this->input->post('jenis_pengguna'),
                'telepon' => $this->input->post('telepon'),
                'alamat' => $this->input->post('alamat'),
                'kota' => $this->input->post('kota'),
                'provinsi' => $this->input->post('provinsi'),
                'jenis_identitas' => $this->input->post('jenis_identitas'),
                'no_identitas' => $this->input->post('no_identitas'),
            );

            if ($this->db_model->update('pengguna', $data, array("md5(sha1(id_pengguna))" => $hash_id))) {
                echo "<script>alert('Berhasil Edit Data Pelamar');
                    location.href = '" . site_url("pengguna/detail/") . "/$hash_id';
                    </script>";
            } else {
                echo "<script>alert('Gagal Edit Data Pelamar');
                    history.go(-1);
                    </script>";
            }
        }
    }
    
    public function nonaktif($hash_id) {
        
        if ($this->db_model->update('pengguna',array ('status' => 0), array("md5(sha1(id_pengguna)) " => $hash_id))) {
            redirect("pengguna/lihat");
        }
    }
    
    public function aktif($hash_id) {
       
        if ($this->db_model->update('pengguna',array ('status' => 1), array("md5(sha1(id_pengguna)) " => $hash_id))) {
            redirect("pengguna/lihat");
        }
    }

    public function hapus($id) {
        $query = $this->db_model->id_klien($id);
        $id_klien = $query->row()->id_klien;
        if ($this->db_model->delete('klien', array("md5(sha1(id_klien)) " => $id))) {
            $targetFolder = 'images/klien'; // Relative to the root
            if (file_exists($targetFolder . '/' . $id_klien . '.jpg')) {
                unlink($targetFolder . '/' . $id_klien . '.jpg');
            }
            redirect("klien");
        }
    }

    public function upload($id = '') {
        $targetFolder = 'images/pengguna'; // Relative to the root

        if (file_exists($targetFolder . '/' . $id . '.jpg')) {
            unlink($targetFolder . '/' . $id . '.jpg');
        }
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $targetPath = base_url() . $targetFolder;
            $targetFile = $id . '.jpg';
            $targetFile = rtrim($targetPath, '/') . '/' . $targetFile;

            // Validate the file type
            $fileTypes = array('jpg', 'jpeg'); // File extensions
            $fileParts = pathinfo($_FILES['file']['name']);

            if (in_array($fileParts['extension'], $fileTypes)) {
                $destination_path = getcwd() . DIRECTORY_SEPARATOR;
                $target_path = $destination_path . $targetFolder . '/' . basename($targetFile);
                move_uploaded_file($tempFile, $target_path);
                echo '1';
            } else {
                echo 'Invalid file type.';
            }
        }
    }
}

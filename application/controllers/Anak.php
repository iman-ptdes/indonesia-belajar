<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Anak extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* load model */

        $this->load->model(array('db_model', 'anak_model'));
        $this->load->library(array('pagination', 'form_validation', 'form_option', 'convertion'));
        $this->load->helper('url', 'form', 'date');
        if ($this->session->userdata('id_pengguna') == null) {
            echo "<script>location.href = '" . base_url() . "';
		</script>";
        }
    }

    public function lihat() {

        $nama = '';
        $jenis_sekolah = '';
        $tingkat_sekolah = '';
        $status_bersekolah = '';
        if ($this->input->post('nama') != '') {
            $nama = $this->input->post('nama');
        }
        if ($this->input->post('status_bersekolah') != '') {
            $status_bersekolah = $this->input->post('status_bersekolah');
        }
        if ($this->input->post('jenis_sekolah') != '') {
            $jenis_sekolah = $this->input->post('jenis_sekolah');
        }
        if ($this->input->post('tingkat_sekolah') != '') {
            $tingkat_sekolah = $this->input->post('tingkat_sekolah');
        }


        $query = $this->anak_model->cari_anak($nama, $status_bersekolah, $jenis_sekolah, $tingkat_sekolah);

        $data['data'] = $query->result();
        $data['jumlah'] = $query->num_rows();
        $data['nama'] = $nama;
        $data['isi_jenis_sekolah'] = $jenis_sekolah;
        $data['isi_tingkat_sekolah'] = $tingkat_sekolah;
        $data['isi_status_bersekolah'] = $status_bersekolah;
        $data['jenis_sekolah'] = $this->form_option->jenis_sekolah('');
        $data['tingkat_sekolah'] = $this->form_option->tingkat_sekolah('');
        $data['status_bersekolah'] = $this->form_option->status_bersekolah('');
        $data['content'] = $this->load->view('anak/lihat', $data, true);
        $this->load->view('main_template', $data);
    }

    public function detail($hash_id) {
        //$query = $this->db_model->get('anak', 'anak.*, pengguna.*', array("md5(sha1(id_anak))" => $hash_id),'','','','',array('pengguna','anak.id_pengguna=pengguna.id_pengguna'));
        $query = $this->db->query("SELECT anak.*, anak.nama nma, pengguna.nama nm, pengguna.id_pengguna_group, pengguna.jenis_pengguna FROM anak  JOIN pengguna ON pengguna.id_pengguna=anak.id_pengguna WHERE md5(sha1(anak.id_anak))='$hash_id'");
        $data['row'] = $query->row();
        $data['hash_id'] = $hash_id;
        $data['content'] = $this->load->view('anak/detail', $data, true);
        $this->load->view('main_template', $data);
    }

    public function tambah() {
        if ($this->session->userdata('id_pengguna_group') != 2) {
            echo "<script>location.href = '" . base_url() . "';
		</script>";
        }
        
        $data['jenis_kelamin'] = $this->form_option->jenis_kelamin('');
        $data['status_tempat_tinggal'] = $this->form_option->status_tempat_tinggal('');
        $data['jenis_sekolah'] = $this->form_option->jenis_sekolah('');
        $data['tingkat_sekolah'] = $this->form_option->tingkat_sekolah('');
        $data['status_bersekolah'] = $this->form_option->status_bersekolah('');
        $data['content'] = $this->load->view('anak/tambah', $data, true);
        $this->load->view('main_template', $data);
    }

    public function tambah_db() {
        if ($this->session->userdata('id_pengguna_group') != 2) {
            echo "<script>location.href = '" . base_url() . "';
		</script>";
        }
        
        // if ($this->input->post('submit'))   
        if ($this->input->post('tanggal_lahir') == '') {
            if ($this->input->post('umur') == '') {
                $tanggal_lahir = '1970-01-01';
            } else {
                $tahun_lahir = date("Y") - $this->input->post('umur');
                $tanggal_lahir = $tahun_lahir . '-01-01';
            }
        } else {
            $tanggal_lahir = date("Y-m-d", strtotime($this->input->post('tanggal_lahir')));
        }

        $nik = $this->input->post('nik');
        $data_check_nik = "nik = '$nik'";
        $query1 = $this->db_model->get('anak', 'nik', $data_check_nik);
        if ($query1->num_rows() > 0) {
            echo "<script>alert('NIK sudah ada');
                location.href = '" . site_url("anak/tambah") . "';
                </script>";
        } else {
            date_default_timezone_set('Asia/Jakarta');
            $data = array(
                'nama' => $this->input->post('nama'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'alamat' => $this->input->post('alamat'),
                'kota' => $this->input->post('kota'),
                'provinsi' => $this->input->post('provinsi'),
                'telepon' => $this->input->post('telepon'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $tanggal_lahir,
                'nik' => $this->input->post('nik'),
                'status_tempat_tinggal' => $this->input->post('status_tempat_tinggal'),
                'status_bersekolah' => $this->input->post('status_bersekolah'),
                'jenis_sekolah' => $this->input->post('jenis_sekolah'),
                'tingkat_sekolah' => $this->input->post('tingkat_sekolah'),
                'sekolah' => $this->input->post('sekolah'),
                'alamat_sekolah' => $this->input->post('alamat_sekolah'),
                'alasan' => $this->input->post('alasan'),
                'ayah' => $this->input->post('ayah'),
                'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
                'pendidikan_ayah' => $this->input->post('pendidikan_ayah'),
                'ibu' => $this->input->post('ibu'),
                'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
                'pendidikan_ibu' => $this->input->post('pendidikan_ibu'),
                'alamat_ortu' => $this->input->post('alamat_ortu'),
                'pendapatan' => $this->input->post('pendapatan'),
                'saudara_ke' => $this->input->post('saudara_ke'),
                'jumlah_saudara' => $this->input->post('jumlah_saudara'),
                'id_pengguna' => $this->session->userdata('id_pengguna'),
                //'id_pengguna' => 3,
                //'foto_profil' => $this->input->post('userfile'),
                'tanggal_pendaftaran' => date('Y-m-d'),
            );

            if ($this->db_model->add('anak', $data)) {
                $id = $this->db->insert_id();
                $hash_id = md5(sha1($id));

                $config = array(
                    'upload_path' => 'images/anak',
                    'allowed_types' => "jpg",
                    'max_size' => "4000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
                    'max_height' => "1028",
                    'max_width' => "1024",
                    'file_name' => $hash_id
                );
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('user_file')) {
                    //$data = array('upload_data' => $this->upload->data());
                    // print_r($this->upload->data());
                    echo "<script>alert('Berhasil Tambah Data Anak');
                location.href = '" . site_url("anak/detail/") . "/$hash_id';
               </script>";
                } else {
                    //$error = array('error' => $this->upload->display_errors());\
                    //print_r($error);
                    echo "<script>alert('Berhasil Tambah Data Anak Tetapi Gagal Upload Poto');
                location.href = '" . site_url("anak/detail/") . "/$hash_id';
               </script>";
                }
            } else {
                echo "<script>alert('Gagal Tambah Data anak');
                history.go(-1);
               </script>";
            }
        }
    }

    public function edit($hash_id) {
        if (($this->session->userdata('id_pengguna_group') != 1) OR ($this->session->userdata('id_pengguna_group') != 2) ){
            echo "<script>location.href = '" . base_url() . "';
		</script>";
        }
        
        $query = $this->db_model->get('anak', '*', array("md5(sha1(id_anak))" => $hash_id));
        $data['row'] = $query->row();
        $data['hash_id'] = $hash_id;
        $data['jenis_kelamin'] = $this->form_option->jenis_kelamin('');
        $data['status_tempat_tinggal'] = $this->form_option->status_tempat_tinggal('');
        $data['jenis_sekolah'] = $this->form_option->jenis_sekolah('');
        $data['tingkat_sekolah'] = $this->form_option->tingkat_sekolah('');
        $data['status_bersekolah'] = $this->form_option->status_bersekolah('');
        $data['content'] = $this->load->view('anak/edit', $data, true);
        $this->load->view('main_template', $data);
    }

    public function edit_db() {
        if (($this->session->userdata('id_pengguna_group') != 1) OR ($this->session->userdata('id_pengguna_group') != 2) ){
            echo "<script>location.href = '" . base_url() . "';
		</script>";
        }
//		} if ($this->input->post('tanggal_lahir') == '' ){
        if ($this->input->post('tanggal_lahir') == '') {
            if ($this->input->post('umur') == '') {
                $tanggal_lahir = '1970-01-01';
            } else {
                $tahun_lahir = date("Y") - $this->input->post('umur');
                $tanggal_lahir = $tahun_lahir . '-01-01';
            }
        } else {
            $tanggal_lahir = date("Y-m-d", strtotime($this->input->post('tanggal_lahir')));
        }

        $data = array(
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'alamat' => $this->input->post('alamat'),
            'kota' => $this->input->post('kota'),
            'provinsi' => $this->input->post('provinsi'),
            'telepon' => $this->input->post('telepon'),
            'tempat_lahir' => $this->input->post('tempat_lahir'),
            'tanggal_lahir' => $tanggal_lahir,
            'status_tempat_tinggal' => $this->input->post('status_tempat_tinggal'),
            'status_bersekolah' => $this->input->post('status_bersekolah'),
            'jenis_sekolah' => $this->input->post('jenis_sekolah'),
            'tingkat_sekolah' => $this->input->post('tingkat_sekolah'),
            'sekolah' => $this->input->post('sekolah'),
            'alamat_sekolah' => $this->input->post('alamat_sekolah'),
            'alasan' => $this->input->post('alasan'),
            'ayah' => $this->input->post('ayah'),
            'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
            'pendidikan_ayah' => $this->input->post('pendidikan_ayah'),
            'ibu' => $this->input->post('ibu'),
            'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
            'pendidikan_ibu' => $this->input->post('pendidikan_ibu'),
            'alamat_ortu' => $this->input->post('alamat_ortu'),
            'pendapatan' => $this->input->post('pendapatan'),
            'saudara_ke' => $this->input->post('saudara_ke'),
            'jumlah_saudara' => $this->input->post('jumlah_saudara'),
        );

        if ($this->db_model->update('anak', $data, array("md5(sha1(id_anak))" => $this->input->post('hash_id')))) {
            $hash_id = $this->input->post('hash_id');
            echo "<script>alert('Berhasil Edit Data anak');
                location.href = '" . site_url("anak/detail/") . "/$hash_id';
               </script>";
        } else {
            echo "<script>alert('Gagal Edit Data anak');
                history.go(-1);
               </script>";
        }
    }

    public function hapus($hash_id) {
        if (($this->session->userdata('id_pengguna_group') != 1) OR ($this->session->userdata('id_pengguna_group') != 2) ){
            echo "<script>location.href = '" . base_url() . "';
		</script>";
        }
        if ($this->db_model->delete('anak', array("md5(sha1(id_anak)) " => $hash_id))) {
            $targetFolder = 'images/anak'; // Relative to the root
            if (file_exists($targetFolder . '/' . $hash_id . '.jpg')) {
                unlink($targetFolder . '/' . $hash_id . '.jpg');
            }
            redirect("anak/lihat");
        }
    }

    public function upload($hash_id = '') {
        if ($this->session->userdata('id_pengguna_group') != 2) {
            echo "<script>location.href = '" . base_url() . "';
		</script>";
        }
        $targetFolder = 'images/anak'; // Relative to the root

        if (file_exists($targetFolder . '/' . $hash_id . '.jpg')) {
            unlink($targetFolder . '/' . $hash_id . '.jpg');
        }
        if (!empty($_FILES)) {
            $tempFile = $_FILES['file']['tmp_name'];
            $targetPath = base_url() . $targetFolder;
            $targetFile = $hash_id . '.jpg';
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

    public function download() {
        $nama = '';
        $jenis_sekolah = '';
        $tingkat_sekolah = '';
        $status_bersekolah = '';
        if ($this->input->post('jenis_sekolah') != '') {
            $jenis_sekolah = $this->input->post('jenis_sekolah');
        }
        if ($this->input->post('tingkat_sekolah') != '') {
            $tingkat_sekolah = $this->input->post('tingkat_sekolah');
        }
        if ($this->input->post('status_bersekolah') != '') {
            $status_bersekolah = $this->input->post('status_bersekolah');
        }
        $query = $this->anak_model->cari_anak($nama, $status_bersekolah, $jenis_sekolah, $tingkat_sekolah);

        @header("Cache-Control: "); // leave blank to avoid IE errors
        @header("Pragma: "); // leave blank to avoid IE errors
        @header("Content-type: application/octet-stream");
        @header("Content-Disposition: attachment; filename=DataAnak.xls");
        echo '<style>
                .num {
                  mso-number-format:"\#\,\#\#0";
                }
                .text{
                  mso-number-format:"\@";/*force text*/
                }
                .date {
                  mso-number-format:"Short Date";
                } 
                table{
                        table-layout:"fixed";
                        word-break:break-all;
                }
                br {
                        mso-data-placement: same-cell;
                }
                </style>';



        echo "<table><tr><td align=center colspan=11>DATA ANAK</td></tr>
            <tr><td colspan=2>&nbsp;</td></tr>
<tr><td colspan=2>Status Bersekolah : </td><td colspan=2>$status_bersekolah</td></tr>
<tr><td colspan=2>Jenis Sekolah : </td><td colspan=2>$jenis_sekolah</td></tr>
<tr><td colspan=2>Tingkat Sekolah : </td><td colspan=2>$tingkat_sekolah</td></tr>
<tr><td colspan=2>&nbsp;</td></tr></table>";

        echo "<table border='1'><tr>
            <td align=center>No</td>
            <td align=center>Nama</td>
            <td align=center>Jenis Kelamin</td>
            <td align=center>Alamat</td>
            <td align=center>Kota</td>
            <td align=center>Provinsi</td>
            <td align=center>Tempat/Tanggal Lahir</td>
            <td align=center>Status Bersekolah</td>
            <td align=center>Jenis Sekolah Terakhir</td>
            <td align=center>Tingkat Sekolah Terakhir</td>
            <td align=center>Alamat Sekolah Terakhor</td>
            
           </tr>";
        $no = 0;
        foreach ($query->result() as $row) {
            $no++;
            $nama = isset($row->nama) ? $row->nama : '';
            $jenis_kelamin = isset($row->jenis_kelamin) ? $row->jenis_kelamin : '';
            $alamat = isset($row->alamat) ? $row->alamat : '';
            $kota = isset($row->kota) ? $row->kota : '';
            $provinsi = isset($row->provinsi) ? $row->provinsi : '';
            $tempat_lahir = isset($row->tempat_lahir) ? $row->tempat_lahir : '';
            $tanggal_lahir = isset($row->tanggal_lahir) ? $row->tanggal_lahir : '';
            $status_bersekolah = isset($row->status_bersekolah) ? $row->status_bersekolah : '';
            $jenis_sekolah = isset($row->jenis_sekolah) ? $row->jenis_sekolah : '';
            $tingkat_sekolah = isset($row->tingkat_sekolah) ? $row->tingkat_sekolah : '';
            $alamat_sekolah = isset($row->alamat_sekolah) ? $row->alamat_sekolah : '';

            echo "<tr>
                    <td>$no</td>
                    <td>$nama</td>
                    <td>$jenis_kelamin</td>
                    <td>$alamat</td>
                    <td>$kota</td>
                    <td>$provinsi</td>
                    <td>$tempat_lahir, $tanggal_lahir</td>
                    <td>$status_bersekolah</td>
                    <td>$jenis_sekolah</td>
                    <td>$tingkat_sekolah</td>   
                    <td>$alamat_sekolah</td> 
                </tr>";
        }
        echo "<table>";
    }

    public function cari() {
        $nama = '';
        $jenis_kelamin = '';
        $umur_awal = '';
        $umur_akhir = '';
        $alamat = '';
        $kota = '';
        $provinsi = '';
        $jenis_sekolah = '';
        $tingkat_sekolah = '';
        $status_bersekolah = '';
        
        $jumlah = 0;
        if ($this->input->post('nama') != '') {
            $nama = $this->input->post('nama');
        }
        if ($this->input->post('jenis_kelamin') != '') {
            $jenis_kelamin = $this->input->post('jenis_kelamin');
        }
        if ($this->input->post('umur_awal') != '') {
            $umur_awal = $this->input->post('umur_awal');
        }
        if ($this->input->post('umur_akhir') != '') {
            $umur_akhir = $this->input->post('umur_akhir');
        }
        if ($this->input->post('alamat') != '') {
            $alamat = $this->input->post('alamat');
        }
        if ($this->input->post('kota') != '') {
            $kota = $this->input->post('kota');
        }
        if ($this->input->post('provinsi') != '') {
            $provinsi = $this->input->post('provinsi');
        }
        if ($this->input->post('status_bersekolah') != '') {
            $status_bersekolah = $this->input->post('status_bersekolah');
        }
        if ($this->input->post('jenis_sekolah') != '') {
            $jenis_sekolah = $this->input->post('jenis_sekolah');
        }
        if ($this->input->post('tingkat_sekolah') != '') {
            $tingkat_sekolah = $this->input->post('tingkat_sekolah');
        }
        
        if ($this->session->userdata('id_pengguna_group') != 2) {
            $id_pengguna = '';
        } else {
            $id_pengguna = $this->session->userdata('id_pengguna');
        }
        
        if ($this->input->post('cari') == 'cari') {
            $query = $this->anak_model->cari_anak2($nama, $jenis_kelamin, $umur_awal, $umur_akhir, $alamat, $kota, $provinsi, $status_bersekolah, $jenis_sekolah, $tingkat_sekolah,$id_pengguna);

            $data['data'] = $query->result();
            $jumlah = $query->num_rows();
        }

        $data['jumlah'] = $jumlah;
        $data['nama'] = $nama;
        $data['umur_awal'] = $umur_awal;
        $data['umur_akhir'] = $umur_akhir;
        $data['alamat'] = $alamat;
        $data['kota'] = $kota;
        $data['provinsi'] = $provinsi;
        $data['isi_jenis_kelamin'] = $jenis_kelamin;
        $data['isi_jenis_sekolah'] = $jenis_sekolah;
        $data['isi_tingkat_sekolah'] = $tingkat_sekolah;
        $data['isi_status_bersekolah'] = $status_bersekolah;
        $data['jenis_kelamin'] = $this->form_option->jenis_kelamin2('');
        $data['jenis_sekolah'] = $this->form_option->jenis_sekolah('');
        $data['tingkat_sekolah'] = $this->form_option->tingkat_sekolah('');
        $data['status_bersekolah'] = $this->form_option->status_bersekolah('');
        $data['content'] = $this->load->view('anak/cari', $data, true);
        $this->load->view('main_template', $data);
    }

    public function download2() {
        $nama = '';
        $jenis_kelamin = '';
        $umur_awal = '';
        $umur_akhir = '';
        $alamat = '';
        $kota = '';
        $provinsi = '';
        $jenis_sekolah = '';
        $tingkat_sekolah = '';
        $status_bersekolah = '';
        $jumlah = 0;
        if ($this->input->post('nama') != '') {
            $nama = $this->input->post('nama');
        }
        if ($this->input->post('jenis_kelamin') != '') {
            $jenis_kelamin = $this->input->post('jenis_kelamin');
        }
        if ($this->input->post('umur_awal') != '') {
            $umur_awal = $this->input->post('umur_awal');
        }
        if ($this->input->post('umur_akhir') != '') {
            $umur_akhir = $this->input->post('umur_akhir');
        }
        if ($this->input->post('alamat') != '') {
            $alamat = $this->input->post('alamat');
        }
        if ($this->input->post('kota') != '') {
            $kota = $this->input->post('kota');
        }
        if ($this->input->post('provinsi') != '') {
            $provinsi = $this->input->post('provinsi');
        }
        if ($this->input->post('status_bersekolah') != '') {
            $status_bersekolah = $this->input->post('status_bersekolah');
        }
        if ($this->input->post('jenis_sekolah') != '') {
            $jenis_sekolah = $this->input->post('jenis_sekolah');
        }
        if ($this->input->post('tingkat_sekolah') != '') {
            $tingkat_sekolah = $this->input->post('tingkat_sekolah');
        }
        if ($this->input->post('cari') == 'cari') {
            $query = $this->anak_model->cari_anak2($nama, $jenis_kelamin, $umur_awal, $umur_akhir, $alamat, $kota, $provinsi, $status_bersekolah, $jenis_sekolah, $tingkat_sekolah);
        }

        @header("Cache-Control: "); // leave blank to avoid IE errors
        @header("Pragma: "); // leave blank to avoid IE errors
        @header("Content-type: application/octet-stream");
        @header("Content-Disposition: attachment; filename=DataAnak.xls");
        echo '<style>
                .num {
                  mso-number-format:"\#\,\#\#0";
                }
                .text{
                  mso-number-format:"\@";/*force text*/
                }
                .date {
                  mso-number-format:"Short Date";
                } 
                table{
                        table-layout:"fixed";
                        word-break:break-all;
                }
                br {
                        mso-data-placement: same-cell;
                }
                </style>';



        echo "<table><tr><td align=center colspan=11>DATA ANAK</td></tr>
            <tr><td colspan=2>&nbsp;</td></tr>
<tr><td colspan=2>&nbsp;</td></tr></table>";

        echo "<table border='1'><tr>
            <td align=center>No</td>
            <td align=center>Nama</td>
            <td align=center>Jenis Kelamin</td>
            <td align=center>Alamat</td>
            <td align=center>Kota</td>
            <td align=center>Provinsi</td>
            <td align=center>Tempat/Tanggal Lahir</td>
            <td align=center>Status Bersekolah</td>
            <td align=center>Jenis Sekolah Terakhir</td>
            <td align=center>Tingkat Sekolah Terakhir</td>
            <td align=center>Alamat Sekolah Terakhir</td>
            
           </tr>";
        $no = 0;
        foreach ($query->result() as $row) {
            $no++;
            $nama = isset($row->nama) ? $row->nama : '';
            $jenis_kelamin = isset($row->jenis_kelamin) ? $row->jenis_kelamin : '';
            $alamat = isset($row->alamat) ? $row->alamat : '';
            $kota = isset($row->kota) ? $row->kota : '';
            $provinsi = isset($row->provinsi) ? $row->provinsi : '';
            $tempat_lahir = isset($row->tempat_lahir) ? $row->tempat_lahir : '';
            $tanggal_lahir = date("d-m-Y", strtotime((isset($row->tanggal_lahir)) ? $row->tanggal_lahir : ''));
            $status_bersekolah = isset($row->status_bersekolah) ? $row->status_bersekolah : '';
            $jenis_sekolah = isset($row->jenis_sekolah) ? $row->jenis_sekolah : '';
            $tingkat_sekolah = isset($row->tingkat_sekolah) ? $row->tingkat_sekolah : '';
            $alamat_sekolah = isset($row->alamat_sekolah) ? $row->alamat_sekolah : '';

            echo "<tr>
                    <td>$no</td>
                    <td>$nama</td>
                    <td>$jenis_kelamin</td>
                    <td>$alamat</td>
                    <td>$kota</td>
                    <td>$provinsi</td>
                    <td>$tempat_lahir, $tanggal_lahir</td>
                    <td>$status_bersekolah</td>
                    <td>$jenis_sekolah</td>
                    <td>$tingkat_sekolah</td>   
                    <td>$alamat_sekolah</td> 
                </tr>";
        }
        echo "<table>";
    }

}

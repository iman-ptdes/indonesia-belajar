<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengguna extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /* load model */
        $this->load->model(array('db_model', 'pengguna_model'));
        $this->load->library(array('pagination', 'form_validation', 'form_option', 'convertion'));
        $this->load->helper('url', 'form', 'date');
        
    }

    public function lihat() {
        if ($this->session->userdata('id_pengguna_group') == 2) {
            echo "<script>location.href = '" . base_url() . "';
		</script>";
        }
        
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
        
        if (($this->session->userdata('id_pengguna_group') == 3) OR ($this->session->userdata('id_pengguna_group') == 4)){
            $group_pengguna = 2;
        } else {
            if ($this->input->post('group_pengguna') == 1) {
                $group_pengguna = $this->input->post('group_pengguna');
            }
        }
        
        
        if ($this->input->post('jenis_pengguna') != '') {
            $jenis_pengguna = $this->input->post('jenis_pengguna');
        }

        if ($this->input->post('cari') == 'cari') {
            $query = $this->pengguna_model->caripengguna($nama, $username, $status_pengguna, $group_pengguna, $jenis_pengguna);

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
        if ($this->session->userdata('id_pengguna_group') == null) {
            echo "<script>location.href = '" . base_url() . "';
		</script>";
        }
        
        $query = $this->db_model->get('pengguna', '*', array("md5(sha1(id_pengguna))" => $hash_id));
        $data['row'] = $query->row();
        $data['hash_id'] = $hash_id;
        $data['content'] = $this->load->view('pengguna/detail', $data, true);
        $this->load->view('main_template', $data);
    }

    public function tambah() {
        if ($this->session->userdata('id_pengguna_group') == 1) {
            echo "<script>location.href = '" . site_url("pengguna/lihat") . "';
		</script>";
        } else if ($this->session->userdata('id_pengguna_group') == 2) {
            echo "<script>location.href = '" . site_url("anak/cari") . "';
		</script>";
        }else if ($this->session->userdata('id_pengguna_group') == 3) {
            echo "<script>location.href = '" . site_url("donatur/lihat") . "';
		</script>";
        }else if ($this->session->userdata('id_pengguna_group') == 4) {
            echo "<script>location.href = '" . site_url("anak/cari") . "';
		</script>";
        }
        //$data['label_menu'] = 'Klien';
        $data['jenis_pengguna'] = $this->form_option->jenis_pengguna('');
        $data['group_pengguna'] = $this->form_option->group_pengguna('');
        $data['jenis_identitas'] = $this->form_option->jenis_identitas('');
        $data['content'] = $this->load->view('pengguna/tambah', $data, true);
        $this->load->view('home', $data);
    }

    public function login() {
        $data['username_error'] = '';
        $data['password_error'] = '';
        $username = $this->input->post('username');
        $password = sha1(sha1(md5($this->input->post('password'))));
        $query = $this->db_model->get('pengguna', '*', array('username' => $username));
        if ($query->num_rows() == 0) {
            $data['error'] = '<script>alert("Username tidak ditemukan")</script>';
        } else {
            $query = $this->db_model->get('pengguna', '*', array('username' => $username, 'status' => 0));
            if ($query->num_rows() > 0) {
                $data['error'] = '<script>alert("Username tidak aktif")</script>';
            } else {
                $query = $this->db_model->get('pengguna', '*', array('username' => $username, 'status' => 1, 'password' => $password));
                if ($query->num_rows() == 0) {
                    $data['error'] = '<script>alert("Password tidak sesuai")</script>';
                } else {
                    $row = $query->row();
                    $login_data = array(
                        'id_pengguna' => $row->id_pengguna,
                        'username' => $row->username,
                        'id_pengguna_group' => $row->id_pengguna_group,
                        'nama' => $row->nama
                    );
                    $this->session->set_userdata($login_data);
                    if ($row->id_pengguna_group == 1) { //administrator
                        redirect('pengguna/lihat');
                    } else if ($row->id_pengguna_group == 2) { //data entri
                        redirect('anak/cari');
                    } else if ($row->id_pengguna_group == 3) { //donatur
                        redirect('donasi/lihat');
                    } else if ($row->id_pengguna_group == 4) { //pemerintah
                        redirect('anak/cari');
                    }
                    break;
                }
            }
        }
        $data['jenis_pengguna'] = $this->form_option->jenis_pengguna('');
        $data['group_pengguna'] = $this->form_option->group_pengguna('');
        $data['jenis_identitas'] = $this->form_option->jenis_identitas('');
        $data['content'] = $this->load->view('pengguna/tambah', $data, true);
        $this->load->view('home', $data);
    }

    public function tambah_db() {
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $data_check_username = "username = '$username'";
        $data_check_email = "email = '$email'";
        $query1 = $this->db_model->get('pengguna', 'id_pengguna', $data_check_username);
        $query2 = $this->db_model->get('pengguna', 'id_pengguna', $data_check_email);
        if ($query1->num_rows() > 0) {
            echo "<script>alert('Username sudah ada');
                location.href = '" . site_url("pengguna/tambah") . "';
                </script>";
        } else if ($query2->num_rows() > 0) {
            echo "<script>alert('Email sudah ada');
                location.href = '" . site_url("pengguna/tambah") . "';
                </script>";
        } else {
            date_default_timezone_set('Asia/Jakarta');
            if ($this->input->post('group_pengguna') == '2') {
                $status = 0;
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

                $email = $this->input->post('email');
                //memasukan ke array
                $this->load->library('email');
                $config = array();
                $config['charset'] = 'utf-8';
                $config['useragent'] = 'Codeigniter';
                $config['protocol'] = "smtp";
                $config['mailtype'] = "html";
                $config['smtp_host'] = "ssl://smtp.gmail.com"; //pengaturan smtp
                $config['smtp_port'] = "465";
                $config['smtp_timeout'] = "400";
                $config['smtp_user'] = "pengelolaindonesiabelajar@gmail.com"; // isi dengan email kamu
                $config['smtp_pass'] = "sandipengelola"; // isi dengan password kamu
                $config['crlf'] = "\r\n";
                $config['newline'] = "\r\n";
                $config['wordwrap'] = TRUE;

                //memanggil library email dan set konfigurasi untuk pengiriman email
                $this->email->initialize($config);
                //konfigurasi pengiriman
                $this->email->from($config['smtp_user']);
                $this->email->to($email);
                $this->email->subject("Verifikasi Akun Indonesia Belajar");
                $this->email->message(
                        "Terimakasih telah melakuan registrasi di Indonesia Belajar, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>
			<a href='" . site_url("pengguna/verification/$hash_id") . "'>Tautan Verifikasi</a>"
                );

                if ($this->email->send()) {

                    echo "<script>alert('Berhasil melakukan registrasi, silahkan cek email kamu');
                        location.href = '" . base_url("") . "';
                        </script>";
                } else {
                    echo "<script>alert('Gagal mengirim verifikasi email, Silahkan register ulang');
                        location.href = '" . base_url("") . "';
                        </script>";
                }
            } else {
                echo "<script>alert('Gagal Tambah Data Pengguna');
                location.href = '" . base_url("") . "';
               </script>";
            }
        }
    }

    public function verification($hash_id) {

        if ($this->db_model->update('pengguna', array("status" => 1), array("md5(sha1(id_pengguna))" => $hash_id))) {
            echo "<script>alert('Akun anda telah diverifikasi, silahkan login');
                        location.href = '" . base_url("") . "';
                        </script>";
        }
    }

    public function edit($hash_id) {
        if ($this->session->userdata('id_pengguna_group') == null) {
            echo "<script>location.href = '" . base_url() . "';
		</script>";
        }
        
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
        if ($this->session->userdata('id_pengguna_group') == null) {
            echo "<script>location.href = '" . base_url() . "';
		</script>";
        }
        
        $hash_id = $this->input->post('hash_id');
//        $data_check = array(
//            'username' => $this->input->post('username'),
//            'md5(sha1(id_pengguna)) <>' => $hash_id,
//        );
//        $query = $this->db_model->get('pengguna', 'id_pengguna', $data_check);
//        if ($query->num_rows() > 0) {
//            echo "<script>alert('Username sudah ada');
//                location.href = '" . site_url("pengguna/edit") . "/$hash_id';
//                </script>";


        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $data_check_username = $data_check = array('username' => $username, 'md5(sha1(id_pengguna)) <>' => $hash_id,);
        $data_check_email = $data_check = array('email' => $email, 'md5(sha1(id_pengguna)) <>' => $hash_id,);
        $query1 = $this->db_model->get('pengguna', 'id_pengguna', $data_check_username);
        $query2 = $this->db_model->get('pengguna', 'id_pengguna', $data_check_email);
        if ($query1->num_rows() > 0) {
            echo "<script>alert('Username sudah ada');
                location.href = '" . site_url("pengguna/edit") . "/$hash_id';
                </script>";
        } else if ($query2->num_rows() > 0) {
            echo "<script>alert('Email sudah ada');
                location.href = '" . site_url("pengguna/edit") . "/$hash_id';
                </script>";
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'username' => $this->input->post('username'),
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
        if ($this->session->userdata('id_pengguna_group') != 1) {
            echo "<script>location.href = '" . base_url() . "';
		</script>";
        }

        if ($this->db_model->update('pengguna', array('status' => 0), array("md5(sha1(id_pengguna)) " => $hash_id))) {
            redirect("pengguna/lihat");
        }
    }

    public function aktif($hash_id) {
        if ($this->session->userdata('id_pengguna_group') != 1) {
            echo "<script>location.href = '" . base_url() . "';
		</script>";
        }

        if ($this->db_model->update('pengguna', array('status' => 1), array("md5(sha1(id_pengguna)) " => $hash_id))) {
            redirect("pengguna/lihat");
        }
    }

    public function hapus($hash_id) {
        if ($this->session->userdata('id_pengguna_group') != null) {
            echo "<script>location.href = '" . base_url() . "';
		</script>";
        }

        if ($this->db_model->delete('pengguna', array("md5(sha1(id_pengguna)) " => $hash_id))) {
            $targetFolder = 'images/pengguna'; // Relative to the root
            if (file_exists($targetFolder . '/' . $hash_id . '.jpg')) {
                unlink($targetFolder . '/' . $hash_id . '.jpg');
            }
            redirect("klien");
        }
    }

    public function upload($id = '') {
        if ($this->session->userdata('id_pengguna') == null) {
            echo "<script>location.href = '" . base_url() . "';
		</script>";
        }
        
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

    public function email() {

        //passing post data dari view
        $hash_id = 'dhflojdsfflajdsf';
        $email = 'ligatyayan@ptdes.net';

        //memasukan ke array

        $this->load->library('email');
        $config = array();
        $config['charset'] = 'utf-8';
        $config['useragent'] = 'Codeigniter';
        $config['protocol'] = "smtp";
        $config['mailtype'] = "html";
        $config['smtp_host'] = "ssl://smtp.gmail.com"; //pengaturan smtp
        $config['smtp_port'] = "465";
        $config['smtp_timeout'] = "400";
        $config['smtp_user'] = "pengelolaindonesiabelajar@gmail.com"; // isi dengan email kamu
        $config['smtp_pass'] = "sandipengelola"; // isi dengan password kamu
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $config['wordwrap'] = TRUE;
        //memanggil library email dan set konfigurasi untuk pengiriman email

        $this->email->initialize($config);
        //konfigurasi pengiriman
        $this->email->from($config['smtp_user']);
        $this->email->to($email);
        $this->email->subject("Verifikasi Akun Indonesia Belajar");
        $this->email->message(
                "terimakasih telah melakuan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>
			<a href='" . site_url("pengguna/verification/$hash_id") . "'>Tautan Verifikasi</a>"
        );

        if ($this->email->send()) {

            echo "<script>alert('Berhasil melakukan registrasi, silahkan cek email kamu');
                        location.href = '" . base_url("") . "';
                        </script>";
        } else {
            echo "<script>alert('Gagal mengirim verifikasi email, Silahkan register ulang');
                        location.href = '" . base_url("") . "';
                        </script>";
        }
    }

    public function email2() {

        //passing post data dari view
        $hash_id = 'dhflojdsfflajdsf';
        $email = 'ligatyayan@ptdes.net';

        //memasukan ke array

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'pengelolaindonesiabelajar@gmail.com',
            'smtp_pass' => 'sandipengelola',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        //konfigurasi pengiriman
        $this->email->from('pengelolaindonesiabelajar@gmail.com');
        $this->email->to('ligatyayan@ptdes.net');
        $this->email->subject("Verifikasi Akun");
        $this->email->message(
                "terimakasih telah melakuan registrasi, untuk memverifikasi silahkan klik tautan dibawah ini<br><br>
			Tautan Verifikasi</a>"
        );

        if ($this->email->send()) {
            echo "Berhasil melakukan registrasi, silahkan cek email kamu";
        } else {

            show_error($this->email->print_debugger());
        }
    }

    public function logout() {
        if ($this->session->userdata('id_pengguna') == null) {
            echo "<script>location.href = '" . base_url() . "';
		</script>";
        }
        $this->session->sess_destroy();
        echo "<script>location.href = '" . base_url(). "';
			</script>";
    }

}

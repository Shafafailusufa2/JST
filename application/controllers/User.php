<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('universal_function');
    }

    //Fungsi utama yang dipanggil saat menu user pertama kali dibuka
    function index() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $data = array('tittle' => 'Daftar User');
            $this->load->view('admin/user', $data);
        }
    }
    //Fungsi untuk menampilkan view tabel user
    //berisikan tampilan dasar dari tabel user
    function user_table() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $this->load->view('admin/user/user_table_view');
        }
    }

    //Fungsi untuk menampilkan view tambah user
    //berisikan form insert user
    function insert() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $this->load->view('admin/user/user_add');
        }
    }


    //Fungsi untuk menghapus user
    function delete($id_user) {
        if ($this->session->userdata("username")) {
            $this->universal_function->delete('user','id_user',$id_user);
            print("deletesuccess");
        } else {
            print("deletefail");
        }
    }

    //Fungsi untuk menampilkan view detail user
    //berisikan form update user 
    function detail($id_user) {
        if ($this->session->userdata("username")) {
            $query = $this->universal_function->getDataArray_1('user','id_user',$id_user);
            $data = array('detail' => $query);
            $this->load->view("admin/user/user_edit_view", $data);
        } else {
            redirect(base_url() . 'login');
        }
    }

    //Fungsi untuk melakukan update data user ke tabel user
    //fungsi ini berfungsi untuk menangkap variabel yang dilempar oleh view untuk
    //kemudian dimasukan kedalam tabel user dengan memperbaharui data user terpilih
    function update(){
        $id_user = $this->input->post('id_userEdit');
        $nama = $this->input->post('namaEdit');
        $username = $this->input->post('usernameEdit');
        $password = $this->input->post('passwordEdit');
        $passwordCek = $this->input->post('passwordEditCek');
        $alamat = $this->input->post('alamatEdit');
        $email = $this->input->post('emailEdit');

        if(!empty($id_user) && !empty($nama) && !empty($username) && !empty($email) && $password==$passwordCek){
            $available=0;
            $row=0;
            $cekUsername = $this->universal_function->getDataArray('user');
            $cekUsername_1 = $this->universal_function->getOne('user','username','id_user',$id_user);
            foreach ($cekUsername as $key => $value) {
                $row++;
                if($value['username']!=$username){
                        $available++;
                    }
                }
            if($username==$cekUsername_1){
                $update = $this->universal_function->update_user($id_user,$nama,$username,$password,$alamat,$email);
                if($update){
                print('ok');
                }
            }else if($row==$available){
               $update = $this->universal_function->update_user($id_user,$nama,$username,$password,$alamat,$email);
                if($update){
                print('ok');
                } 
            }else{
                print('invalid');
            }

        }else{
            print('error');
        }
    }

    //Fungsi untuk memasukan data user baru kedalam tabel user
    //fungsi ini menangkap variabel yang dilempar oleh view untuk kemudian dimasukan ke dalam
    //tabel user dengan cara tambah data baru
    function insertData(){
        $config = array(
            'upload_path' => './uploads/',
            'allowed_types' => 'gif|jpg|png|jpeg',
            'max_size' => '200000',
        );

        $this->load->library('upload', $config);
        $this->upload->do_upload('foto_admin');
        $upload_data = $this->upload->data();
        $file_name = $upload_data['file_name'];

        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $passwordCek = $this->input->post('passwordCek');
        $alamat = $this->input->post('alamatUser');
        $email = $this->input->post('emailUser');

        if(!empty($nama) && !empty($username) && !empty($email) && $password==$passwordCek){
            $available=0;
            $row=0;
            $cekUsername = $this->universal_function->getDataArray('user');
            foreach ($cekUsername as $key => $value) {
                $row++;
                if($value['username']!=$username){
                        $available++;
                    }
                }
            if($row==$available){
                if(!empty($file_name)){
                   $insert = $this->universal_function->insert_g($nama,$username,$password,$alamat,$email,$file_name);
                    if($insert){
                    print('saved');
                    } 
                }else{
                     $insert = $this->universal_function->insert($nama,$username,$password,$alamat,$email);
                    if($insert){
                    print('saved');
                    } 
                }
            }else{
                print('invalid');
            }

        }else{
            print('error_1');
        }
    }


    //Fungsi untuk melakukan upload pada menu insert dan update user
    //fungsi ini mengambil nama file dan memasukannya ke dalam tabel user
    //kemudian file disimpan dalam folder upload
    function update_gambar(){
        $config = array(
            'upload_path' => './uploads/',
            'allowed_types' => 'gif|jpg|png|jpeg',
            'max_size' => '200000',
        );

        $this->load->library('upload', $config);
        $this->upload->do_upload('foto_edit');
        $upload_data = $this->upload->data();
        $id_user = $this->input->post('id_userEdit');
        $file_name = $upload_data['file_name'];
        $update = $this->universal_function->update_gambar($file_name,$id_user);
            if($update){
                print('ok');
            }
        }


}



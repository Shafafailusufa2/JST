<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('universal_function');
    }

    //Fungsi yang pertama kali dijalankan ketika form login di buka 
    //http://localhost/jst/login
    public function index() {
        if ($this->session->userdata("username")) {
             redirect(base_url().'admin');
        }else{
             $this->load->view('login_view');
        }
    }

    //Pengecekan username yang terdaftar didalam tabel user
    function cek_login() {
        $username = $this->input->post("usernameLogin");
        $password = $this->input->post("passwordLogin");
        $login = $this->universal_function->login($username, $password);
        if (!empty($login)) {
            foreach ($login as $key => $value) {
                $this->session->set_userdata("username", $value["username"]);
                $this->session->set_userdata("nama", $value["nama"]);
                $this->session->set_userdata("id_user", $value["id_user"]);
                $this->session->set_userdata("level", $value["level"]);
                redirect(base_url() . 'admin');
            }
        } else {
            redirect(base_url() . 'login?error=1');
        }
    }

    //Fungsi logout untuk mengakhiri session user
     function logout() {
            session_destroy();
        }
        
}


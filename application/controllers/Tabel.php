<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Tabel extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('data_table');
    }

    //Fungsi untuk menampilkan tabel pelatihan dengan datatables pada menu data pelatihan
    function datatables_pelatihan() {
        if (
                isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
        ) {

            $datatables = $_POST;
            $datatables['table'] = 'tb_pelatihan';
            $datatables['id-table'] = 'id_lokasi';
            $datatables['col-display'] = array(
                'id_lokasi',
                'nama_lokasi',
                'data1',
                'data2',
                'data3',
                'data4',
                'data5',
                'data6'
            );
            $this->data_table->Datatables_Pelatihan($datatables);
        }

        return;
    }

    //Fungsi menampilkan tabel transformasi data pelatihan dengan datatables pada menu data peleatihan
    function datatables_transformasi_pelatihan() {
        if (
                isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
        ) {

            $datatables = $_POST;
            $datatables['table'] = 'tb_p_normalize';
            $datatables['id-table'] = 'id_lokasi';
            $datatables['col-display'] = array(
                'id_lokasi',
                'nama_lokasi',
                'data1',
                'data2',
                'data3',
                'data4',
                'data5',
                'data6'
            );
            $this->data_table->Datatables_Transformasi($datatables);
        }
        return;
    }

     //Fungsi menampilkan tabel pelatihan dengan datatables pada menu data pengujian
    function datatables_pengujian() {
        if (
                isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
        ) {

            $datatables = $_POST;
            $datatables['table'] = 'tb_pengujian';
            $datatables['id-table'] = 'id_lokasi';
            $datatables['col-display'] = array(
                'id_lokasi',
                'nama_lokasi',
                'data1',
                'data2',
                'data3',
                'data4',
                'data5',
                'data6'
            );
            $this->data_table->Datatables_Pengujian($datatables);
        }

        return;
    }

    //Fungsi menampilkan tabel transformasi dengan datatables pada data pengujian
    function datatables_transformasi_pengujian() {
        if (
                isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
        ) {

            $datatables = $_POST;
            $datatables['table'] = 'tb_p_normalize_1';
            $datatables['id-table'] = 'id_lokasi';
            $datatables['col-display'] = array(
                'id_lokasi',
                'nama_lokasi',
                'data1',
                'data2',
                'data3',
                'data4',
                'data5',
                'data6'
            );
            $this->data_table->Datatables_Transformasi_1($datatables);
        }

        return;
    }

    //Fungsi untuk menampilkan tabel markers dengan datatables
    function datatables_koordinat() {
        if (
                isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
        ) {

            $datatables = $_POST;
            $datatables['table'] = 'markers';
            $datatables['id-table'] = 'id';
            $datatables['col-display'] = array(
                'id',
                'name',
                'lat',
                'lng'
            );
            $this->data_table->Datatables_Koordinat($datatables);
        }

        return;
    }

     //Fungsi untuk menampilkan tabel markers dengan datatables
    function datatables_bobot() {
        if (
                isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
        ) {

            $datatables = $_POST;
            $datatables['table'] = 'bobot';
            $datatables['id-table'] = 'id_bobot';
            $datatables['col-display'] = array(
                'param',
                'x1',
                'x2',
                'x3',
                'x4',
                'x5',
                'b1',
                'z',
                'b2'
            );
            $this->data_table->Datatables_bobot($datatables);
        }

        return;
    }

     //Fungsi menampilkan tabel user dengan datatables
    function datatables_user() {
        if (
                isset($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
                strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'
        ) {

            $datatables = $_POST;
            $datatables['table'] = 'user';
            $datatables['id-table'] = 'id_user';
            $datatables['col-display'] = array(
                'id_user',
                'nama',
                'username',
                'email'
            );
            $this->data_table->Datatables_User($datatables);
        }

        return;
    }
}
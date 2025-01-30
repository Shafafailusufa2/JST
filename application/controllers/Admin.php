<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->library('tools');
        $this->load->model('universal_function');
    }

    //FUNGSI UTAMA YANG MENAMPILKAN HKESELURUHAN HALAMAN PROGRAM
    //HEADER
    //BODY
    //CONTENT
    //FOOTER
    //DI SATUKAN DENGAN FILE WRAPPER
    function index() {
        if (is_null($this->session->userdata("username"))) {
                redirect(base_url() . 'login');
        } else {
            if ($this->session->userdata("username")) {
                $this->load->view("admin/layout/wrapper");
            }
        }
    }

    //Fungsi yang pertama kali dijalankan ketika menu dashboard dijalankan
    //http://localhost/jst/admin/dashboard
    function dashboard() {

        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $data = array('tittle' => 'Daftar User');
            $this->load->view('admin/user', $data);
        }
        
    }

    //Fungsi untuk menampilkan menu data pelatihan
    //berisikan fungsi upload dan transformasi nilai data pelatihan
    function pelatihan() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $pel = $this->universal_function->getDataArray('tb_pelatihan');
            $norm = $this->universal_function->getDataArray('tb_p_normalize');
            $data = array('tittle'=>'Data Pelatihan','norm'=>$norm,'pel'=>$pel);
            $this->load->view("admin/pelatihan",$data);
        }
    }

    //Fungsi untuk menampilkan menu data pengujian
    //berisikan fungsi upload data dan transformasi nilai data pengujian
    function pengujian() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $peng = $this->universal_function->getDataArray('tb_pengujian');
            $norm = $this->universal_function->getDataArray('tb_p_normalize_1');
            $data = array('tittle'=>'Data Pengujian','norm'=>$norm,'peng'=>$peng);
            $this->load->view("admin/pengujian",$data);
        }
    }

     //Fungsi transformasi data pelatihan dan pengujian ke range nilai sigmoid biner [0.1,0.9]
    function transformasi($table) {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            if($table=='tb_pelatihan'){
                $table_n='tb_p_normalize';
            }else if($table=='tb_pengujian'){
                $table_n='tb_p_normalize_1';
            }

            $max_data1 = $this->universal_function->max($table,'data1');
            $min_data1 = $this->universal_function->min($table,'data1');

            $max_data2 = $this->universal_function->max($table,'data2');
            $min_data2 = $this->universal_function->min($table,'data2');

            $max_data3 = $this->universal_function->max($table,'data3');
            $min_data3 = $this->universal_function->min($table,'data3');

            $max_data4 = $this->universal_function->max($table,'data4');
            $min_data4 = $this->universal_function->min($table,'data4');

            $max_data5 = $this->universal_function->max($table,'data5');
            $min_data5 = $this->universal_function->min($table,'data5');

            $max_data6 = $this->universal_function->max($table,'data6');
            $min_data6 = $this->universal_function->min($table,'data6');
            $dataPelatihan = $this->universal_function->getDataArray($table);

            foreach ($dataPelatihan as $key => $data) {
                $lokasi = $data['nama_lokasi'];
                $data1 = ((0.8*($data['data1']-$min_data1))/($max_data1-$min_data1))+0.1;
                $data2 = ((0.8*($data['data2']-$min_data2))/($max_data2-$min_data2))+0.1;
                $data3 = ((0.8*($data['data3']-$min_data3))/($max_data3-$min_data3))+0.1;
                $data4 = ((0.8*($data['data4']-$min_data4))/($max_data4-$min_data4))+0.1;
                $data5 = ((0.8*($data['data5']-$min_data5))/($max_data5-$min_data5))+0.1;
                $data6 = ((0.8*($data['data6']-$min_data6))/($max_data6-$min_data6))+0.1;
                
                $n_data1 = number_format($data1,4);
                $n_data2 = number_format($data2,4);
                $n_data3 = number_format($data3,4);
                $n_data4 = number_format($data4,4);
                $n_data5 = number_format($data5,4);
                $n_data6 = number_format($data6,4);

                $n_insert = $this->universal_function->n_insert($table_n,$lokasi,$n_data1,$n_data2,$n_data3,$n_data4,$n_data5,$n_data6);

            }
            print('normalize');
        }
    }

    //Fungsi import data dari excel
    function importdata($table){
        $tb=$table;
        $br=5;
        $config['upload_path'] = './doc/';
        $config['allowed_types'] = 'xls|xlsx';
        $config['max_size'] = 1024 * 8;
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')){
            $data = $this->upload->data();
            $nama=$data['file_name'];
            if(file_exists("./doc/".$nama)){
                $file="./doc/".$nama;
                $update=$this->tools->importdata($file,$tb,$br,TRUE);
                unlink($file);
                    print('success');
            }else{
                print('error');
            }
        }else{
            print('error');
        }
    }

    //Fungsi menampilkan menu pembelajaran
    function pembelajaran() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $data_pembelajaran = $this->universal_function->getDataArray('result');
            $length = $this->universal_function->count('result','id_result','panjang');
            $cek = $this->universal_function->getDataArray('tb_p_normalize');
            
            if($data_pembelajaran){
                $i=1;
                foreach ($data_pembelajaran as $key => $value) {
                    $array[$i]=$value['mse'];
                    $i++;
                }
                for($x=1;$x<=$length;$x++){
                    $a_mse[$x]=unserialize($array[$x]);  
                }

                $y=1;
                for($z=1;$z<=$length;$z++){
                    foreach ($a_mse[$z] as $key => $value) {
                         $mse[$y]=$value;
                         $y++;
                    }
                }
                
            $epoch = $data_pembelajaran[0]['epoch'];
            $min = min($mse);
            $data = array('tittle'=>'Pembelajaran Jaringan','min'=>$min,'epo'=>$epoch,'data'=>$mse,'cek'=>$cek);
            }else{
            $data = array('tittle'=>'Pembelajaran Jaringan','cek'=>$cek);
            }
            $this->load->view("admin/pembelajaran/pembelajaran",$data);
        }
    }

    //Fungsi untuk menampilkan menu simulasi pelatihan
    //berisikan fungsi propagasi maju dari data pelatihan untuk mencari persentase akurasi hasil bobot pelatihan
    //terhadap pola penerimaan siswa
    function simpe() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $learn = $this->universal_function->getDataArray('result');
            $norm = $this->universal_function->getDataArray('tb_pelatihan');
            $data = array('tittle'=>'Simulasi Data Pelatihan','norm'=>$norm,'learn'=>$learn);
            $this->load->view("admin/simulasi/pelatihan",$data);
        }
    }

    //Fungsi untuk menampilkan menu simulasi pengujian
    //berisikan fungsi propagasi maju dari data pengujian untuk mencari keberhasilan promosi
    //di wilayah yang diprediksi
    function simpe_1() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $learn = $this->universal_function->getDataArray('result');
            $norm = $this->universal_function->getDataArray('tb_pengujian');
            $data = array('tittle'=>'Simulasi Data Pengujian','norm'=>$norm,'learn'=>$learn);
            $this->load->view("admin/simulasi/pengujian",$data);
        }
    }


    //Fungsi untuk menampilkan menu bobot
    //berisikan fungsi upload bobot yang akan digunakan sebagai bobot standar dalam program
    function bobot() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $bobot = $this->universal_function->getDataArray('bobot');
            $data = array('tittle'=>'Bobot & Bias','bobot'=>$bobot);
            $this->load->view("admin/bobot",$data);
        }
    }

    //Fungsi untuk menampilkan menu koordinat lokasi
    //berisikan fungsi untuk melakukan upload koordinat lokasi promosi yang akan ditampilkan pada
    //markers di menu pemetaan lokasi
    function koordinat() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $markers = $this->universal_function->getDataArray('markers');
            $data = array('tittle'=>'Daftar Koordinat Lokasi','markers'=>$markers);
            $this->load->view('koordinat',$data );
           
        }
    }

    //Fungsi untuk menampilkan view dari tabel koordinat lokasi
    function koor_lokasi() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $this->load->view('tabel_koordinat');
           
        }
    }

    //Fungsi untuk menampilkan menu bobot & bias akhir
    //menampilkan bobot awal dan akhir haril dari pelatihan pada menu proses pembelajaran
    function bobotAkhir() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $bobot_akhir_lapisan = $this->universal_function->getDataArray('bobot_hidden');
            $bobot_akhir_output = $this->universal_function->getDataArray('bobot_output');
            $bias_akhir_lapisan = $this->universal_function->getDataArray('bobot_b1');
            $bias_akhir_outuput = $this->universal_function->getDataArray('bobot_b2');
            $data = array('tittle'=>'Bobot & Bias Akhir','iw'=>$bobot_akhir_lapisan,'lw'=>$bobot_akhir_output,'bi'=>$bias_akhir_lapisan
                ,'bl'=>$bias_akhir_outuput);
            $this->load->view("admin/pembelajaran/bobotAkhir",$data);
        }
    }

    //Fungsi untuk menampilkan menu persentase wilayah
    //berisikan diagram batang yang digunakan untuk menampilkan persentase kebehasilan promosi
    function hasil() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $persen = $this->universal_function->getDataArray('tb_pengujian');
            if($persen){
                if($persen[0]['k_jst']!=0){
                    foreach ($persen as $key => $value) {
                        if($value['persen']>0){
                            $name[]=$value['nama_lokasi'].' ('.$value['persen'].' % )' ;
                        }
                    }
                    $data = array('tittle'=>'Grafik Persentase Wilayah','name'=>$name);
                }else{
                $data = array('tittle'=>'Grafik Persentase Wilayah');
                }
            }else{
            $data = array('tittle'=>'Grafik Persentase Wilayah');
            }
            
            $this->load->view("admin/pembelajaran/hasil",$data);
        }
    }

    //Fungsi untuk menampikan diagram batang pada menu persentase wilayah
    //fungsi ini mengambil persentase dari tabel tb_pengujian setelah simualasi data pengujian dilakukan 
    function diagram_batang(){
        $hasil = $this->universal_function->getDataArray('tb_pengujian');
        foreach ($hasil as $key => $value) {
            if($value['persen']>0){
            $row['data'][]=$value['persen'];
            }
        }
        $row['name']='Persentase Wilayah Promosi';
        $result = array();
        array_push($result,$row);
        print json_encode($result, JSON_NUMERIC_CHECK);
    }

     //Fungsi update persentase wilayah yang akan ditampilkan
    function persen() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $persen = $this->input->post('persen');
            $query = $this->universal_function->update('percentage','value',$persen,'id_percentage','1');
            if($query){
                printf('success');
            }
           
        }
    }

    //Fungsi untuk melihat menu pemetaan lokasi
    //berisikan persentasi keberhasilan promosi pada wilayah yang diprediksi dengan menampilkan
    //markers dari setiap koordinat lokasi prpmosi yang sudah diupload pada data koordinat lokasi kedalam sebuah peta
    function view_maps() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $persen = $this->universal_function->getDataArray('percentage');
            $data = array('tittle'=>'Lokasi Promosi','persen'=>$persen);
            $this->load->view('maps',$data );
           
        }
    }

     //Fungsi parsing xml untuk menampilkan marker pada google maps api
    function maps() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
                function parseToXML($htmlStr){
                $xmlStr=str_replace('<','&lt;',$htmlStr);
                $xmlStr=str_replace('>','&gt;',$xmlStr);
                $xmlStr=str_replace('"','&quot;',$xmlStr);
                $xmlStr=str_replace("'",'&#39;',$xmlStr);
                $xmlStr=str_replace("&",'&amp;',$xmlStr);
                return $xmlStr;
                }

                $result = $this->universal_function->getDataArray('markers');
                $persen = $this->universal_function->getDataArray('percentage');

                header("Content-type: text/xml");

                // Start XML file, echo parent node
                echo '<markers>';

                // Iterate through the rows, printing XML nodes for each
                foreach ($result as $key => $value) {
                  if($value['persen']>$persen[0]['value']){
                  // Add to XML document node
                  echo '<marker ';
                  echo 'id="' . $value['id'] . '" ';
                  echo 'name="' . parseToXML($value['name']) . '" ';
                  echo 'address="' . parseToXML($value['address']) . '" ';
                  echo 'lat="' . $value['lat'] . '" ';
                  echo 'lng="' . $value['lng'] . '" ';
                  echo 'type="' . $value['type'] . '" ';
                  echo 'persen="' . $value['persen'] . '" ';
                  echo '/>';
                    }
                }

                // End XML file
                echo '</markers>';
        }
    }

    //Fungsi untuk detail data promosi pada markers wilayah yang dipilih dipeta
    //fungsi ini akan menampilkan jumlah siswa target dan hasil prediksi jst
    function mapsDetail($name){
        $name_wilayah = str_replace('%20', ' ', $name);
        if(is_null($this->session->userdata('username'))){
            redirect(base_url().'login');
        }else{
            $jml_siswa = $this->universal_function->getDataArray('tb_pengujian');
            foreach ($jml_siswa as $key => $value) {
                if($value['nama_lokasi']==$name_wilayah){
                    $nama = $value['nama_lokasi'];
                    $target = $value['data6'];
                    $k_jst = round($value['k_jst']);
                    $persen = $value['persen'];
                }
            }
            $data = array('nama_wilayah'=>$nama,'target'=>$target,'k_jst'=>$k_jst,'persen'=>$persen);
            $this->load->view('detail',$data);
        }
    }

    //Fungsi untuk menampilkan menu analisis data pembelajaran
    //berisikan fungsi untuk menampilkan hasil perhitungan pada setiap iterasi / epoch dari hasil
    //pembelajaran jaringan yang telah dilakukan
    function analisis() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $data_pembelajaran = $this->universal_function->getDataArray('result');
            $length = $this->universal_function->count('result','id_result','panjang');
            $cek = $this->universal_function->getDataArray('tb_p_normalize');
            if($data_pembelajaran){
                $i=1;
                foreach ($data_pembelajaran as $key => $value) {
                    $array[$i]=unserialize($value['mse']);
                    $i++;
                }
                $y=1;
                for($z=1;$z<=$length;$z++){
                    foreach ($array[$z] as $key => $value) {
                         $mse[$y]=$value;
                         $y++;
                    }
                }
            $data = array('tittle'=>'Analisis Pembelajaran','learn'=>$mse,'input'=>$cek);
            }else{
            $data = array('tittle'=>'Analisis Pembelajaran');
            }
            $this->load->view("admin/pembelajaran/analisis",$data);
        }
    }

    //Fungsi untuk melihat menu inisialisasi bobot
    //berisikan peritungan inisialisasi bobot nguyen widraw
    function analisis_bobot() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $bobot = $this->universal_function->getDataArray('inisialisasi');
            $data = array('tittle'=>'Analisis Inisialisasi Bobot (Nguyen Widraw)','bobot'=>$bobot);
            $this->load->view('admin/pembelajaran/analisis_bobot',$data );
           
        }
    }

    //Fungsi untuk mereset data pembelajaran
    //fungsi ini akan menghapus isi dari tabel result, bobot_hidden, bobot_output, bobot_b1 dan bobot_b2
    function reset() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $update_1 = $this->universal_function->update_0('tb_pengujian','k_jst','0','k_jst');
            $update_2 = $this->universal_function->update_0('tb_pelatihan','k_jst','0','k_jst');
            $reset = $this->universal_function->reset();
            if($reset){
                printf('success');
            }
           
        }
    }

    //Fungsi untuk mereset data master
    //fungsi ini akan menghapus isi dari tabel tb_pelatihan, tb_p_normalize, tb_pengujian, tb_p_normalize_1, bobot dan markers
    function reset_1() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $reset = $this->universal_function->reset_1();
            if($reset){
                printf('success');
            }
           
        }
    }    

     //Fungsi untuk mereset tabel marker atau data koordinat lokasi pada menu koordinat lokasi
    function reset_koordinat() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $reset = $this->universal_function->truncate('markers');
            if($reset){
                printf('reset');
            }
           
        }
    }

    //Fungsi untuk mereset data pelatihan dan pengujian beserta data transformasinya
    function reset_data($table) {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        }else{
            if($table!='bobot'){
                if($table=='tb_pelatihan'){
                    $tn = 'tb_p_normalize';
                }else{
                    $tn = 'tb_p_normalize_1';
                }
                $trun = $this->universal_function->truncate($table);
                if($trun){
                    $trun1 = $this->universal_function->truncate($tn); 
                    if($trun1){
                        printf('trun');
                    }
                }  
            }else{
                $trun1 = $this->universal_function->truncate($table); 
                    if($trun1){
                        printf('trun');
                    }
            }          
        }
    }

}

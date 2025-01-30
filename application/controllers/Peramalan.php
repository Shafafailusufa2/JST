<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Peramalan extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model('universal_function');
    }

    //Fungsi untuk menampilkan grafik perbandingan target vs hasil JST data pelatihan
    //pada menu simulasi data pelatihan, fungsi ini mengambil data persentase dari tabel tb_pelatihan
    //datay ang ditampilkan digrafik adalah data asli
    function hasil_pelatihan(){
        $hasil = $this->universal_function->getDataArray('tb_pelatihan');
        $row['data'][]=null;
        $row1['data'][]=null;
        foreach ($hasil as $key => $value) {
            $row['data'][]=$value['data6'];
            $row1['data'][]=round($value['k_jst']);
        }
        $row['name']='Target';
        $row1['name']='Hasil Keluaran JST';
        $result = array();
        array_push($result,$row);
        array_push($result,$row1);
        print json_encode($result, JSON_NUMERIC_CHECK);
    }

    //Fungsi untuk menampilkan grafik perbandingan target vs hasil JST data pengujian
    //pada menu simulasi data pengujian, fungsi ini mengambil data persentase dari tabel tb_pengujian
    //datay ang ditampilkan digrafik adalah data asli
    function hasil_pengujian(){
        $hasil = $this->universal_function->getDataArray('tb_pengujian');
        $row['data'][]=null;
        $row1['data'][]=null;
        foreach ($hasil as $key => $value) {
            $row['data'][]=$value['data6'];
            $row1['data'][]=round($value['k_jst']);
        }
        $row['name']='Target';
        $row1['name']='Hasil Keluaran JST';
        $result = array();
        array_push($result,$row);
        array_push($result,$row1);
        print json_encode($result, JSON_NUMERIC_CHECK);
    }

    //Fungsi untuk menampilkangrafik perbandingan target vs keluaran jst pada 
    //pada menu analisis simulasi data pelatihan
    //fungsi ini menampilkan grafik dengan perbandingan data yang ditransformasi
    function analispel(){
         $table = 'tb_pelatihan';
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

            $hasil = $this->universal_function->getDataArray($table);
            $target = $this->universal_function->getDataArray('tb_p_normalize');

            $i=1;
            foreach ($hasil as $key => $value) {
                 $k_jst[$i] = ((0.8*($value['k_jst']-$min_data6))/($max_data6-$min_data6))+0.1;
                 $i++;
            }

        $row['data'][]=null;
        $row1['data'][]=null;

        foreach ($k_jst as $key => $value) {
            $row1['data'][]=$value;
        }
        foreach ($target as $key => $value) {
            $row['data'][]=$value['data6'];
            
        }

        $row['name']='Target';
        $row1['name']='Hasil Keluaran JST';
        $result = array();
        array_push($result,$row);
        array_push($result,$row1);
        print json_encode($result, JSON_NUMERIC_CHECK);
    }

    //Fungsi untuk menampilkangrafik perbandingan target vs keluaran jst pada 
    //pada menu analisis simulasi data pengujian
    //fungsi ini menampilkan grafik dengan perbandingan data yang ditransformasi
    function analispeng(){

            $table = 'tb_pengujian';
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

            $hasil = $this->universal_function->getDataArray($table);
            $target = $this->universal_function->getDataArray('tb_p_normalize_1');

            $i=1;
            foreach ($hasil as $key => $value) {
                 $k_jst[$i] = ((0.8*($value['k_jst']-$min_data6))/($max_data6-$min_data6))+0.1;
                 $i++;
            }

        $row['data'][]=null;
        $row1['data'][]=null;

        foreach ($k_jst as $key => $value) {
            $row1['data'][]=$value;
        }
        foreach ($target as $key => $value) {
            $row['data'][]=$value['data6'];
            
        }

        $row['name']='Target';
        $row1['name']='Hasil Keluaran JST';
        $result = array();
        array_push($result,$row);
        array_push($result,$row1);
        print json_encode($result, JSON_NUMERIC_CHECK);
    }

    //Fungsi untuk melempar data yang butuhkan untuk pelatihan jaringan ke tampilan result_analis_1
    //tampilan result akan melakukan perhitungan JST sesuai dengan epoch yang dipilih
    //program akan menampilkan hasil perhitungan epoch terakhir kedalam visual
    function analisis_pelatihan(){
        $result = $this->universal_function->getDataArray('result');
        $input = $this->universal_function->getDataArray('tb_p_normalize');
        $bobot_hidden = $this->universal_function->getDataArray('bobot_hidden');
        $bobot_output = $this->universal_function->getDataArray('bobot_output');
        $bobot_b1 = $this->universal_function->getDataArray('bobot_b1');
        $bobot_b2 = $this->universal_function->getDataArray('bobot_b2');
        $data_ke = $this->input->post('data');
        $data_asli = $this->universal_function->getDataArray('tb_pelatihan'); 


        $data=array('input'=>$input,'bobot_hidden'=>$bobot_hidden,'bobot_output'=>$bobot_output,
            'bobot_b1'=>$bobot_b1,'bobot_b2'=>$bobot_b2,'data_ke'=>$data_ke,'result'=>$result,'asli'=>$data_asli);
        $this->load->view('admin/simulasi/result_analis',$data);
    }

    //Fungsi untuk melempar data yang butuhkan untuk pelatihan jaringan ke tampilan result_analis_1
    //tampilan result akan melakukan perhitungan JST sesuai dengan epoch yang dipilih
    //program akan menampilkan hasil perhitungan epoch terakhir kedalam visual    
    function analisis_pengujian(){
        $result = $this->universal_function->getDataArray('result');
        $input = $this->universal_function->getDataArray('tb_p_normalize_1');
        $bobot_hidden = $this->universal_function->getDataArray('bobot_hidden');
        $bobot_output = $this->universal_function->getDataArray('bobot_output');
        $bobot_b1 = $this->universal_function->getDataArray('bobot_b1');
        $bobot_b2 = $this->universal_function->getDataArray('bobot_b2');
        $data_ke = $this->input->post('data');
        $data_asli = $this->universal_function->getDataArray('tb_pengujian'); 

        $data=array('input'=>$input,'bobot_hidden'=>$bobot_hidden,'bobot_output'=>$bobot_output,
            'bobot_b1'=>$bobot_b1,'bobot_b2'=>$bobot_b2,'data_ke'=>$data_ke,'result'=>$result,'asli'=>$data_asli);
        $this->load->view('admin/simulasi/result_analis_1',$data);
    }

    //Fungsi untuk menampilkan view menu analisis data pelatihan
    //fungsi ini melempar data yang dibutuhkan untuk membentuk tampilan utama menu simulasi data pelatihan
    function simpelanalis() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $table = 'tb_pelatihan';
            $max_kjst = $this->universal_function->max($table,'data6');
            $min_kjst = $this->universal_function->min($table,'data6');

            $hasil = $this->universal_function->getDataArray($table);
            $target = $this->universal_function->getDataArray('tb_p_normalize');
            $result = $this->universal_function->getDataArray('result');

            $data_asli = $this->universal_function->getDataArray('tb_pelatihan'); 
            $i=1;
            foreach ($hasil as $key => $value) {
                 $k_jst[$i] = ((0.8*($value['k_jst']-$min_kjst))/($max_kjst-$min_kjst))+0.1;
                 $i++;
            }

            if($hasil){
            $data = array('tittle'=>'Analisis Simulasi Data Pelatihan','k_jst'=>$k_jst,'target'=>$target,'asli'=>$data_asli,'result'=>$result);
            }else{
            $data = array('tittle'=>'Analisis Simulasi Data Pelatihan');
            }
            $this->load->view("admin/simulasi/analisis_pelatihan",$data);
        }
    }

    //Fungsi untuk menampilkan view menu analisis data pengujian
    //fungsi ini melempar data yang dibutuhkan untuk membentuk tampilan utama menu simulasi data pengujian
    function simpenganalis() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {

            $table = 'tb_pengujian';
            $max_kjst = $this->universal_function->max($table,'data6');
            $min_kjst = $this->universal_function->min($table,'data6');

            $hasil = $this->universal_function->getDataArray($table);
            $target = $this->universal_function->getDataArray('tb_p_normalize_1');
            $data_asli = $this->universal_function->getDataArray('tb_pengujian'); 
            $result = $this->universal_function->getDataArray('result');

            $i=1;
            foreach ($hasil as $key => $value) {
                 $k_jst[$i] = ((0.8*($value['k_jst']-$min_kjst))/($max_kjst-$min_kjst))+0.1;
                 $i++;
            }
           
            if($hasil){
            $data = array('tittle'=>'Analisis Simulasi Data Pengujian','k_jst'=>$k_jst,'target'=>$target,'asli'=>$data_asli,'result'=>$result);
            }else{
            $data = array('tittle'=>'Analisis Simulasi Data Pengujian');
            }
            $this->load->view("admin/simulasi/analisis_pengujian",$data);
        }
    }

    //Fungsi propagasi maju simulasi data pelatihan
    function pelatihan(){
        $result = $this->universal_function->getDataArray('result');
        $input = $this->universal_function->getDataArray('tb_p_normalize');
        $jumlah_data = $this->universal_function->count('tb_p_normalize','id_lokasi','jumlah');
        $bobot_hidden = $this->universal_function->getDataArray('bobot_hidden');
        $bobot_output = $this->universal_function->getDataArray('bobot_output');
        $bobot_b1 = $this->universal_function->getDataArray('bobot_b1');
        $bobot_b2 = $this->universal_function->getDataArray('bobot_b2');
        $epoch = $this->input->post('epoch');

        $v11 = $bobot_hidden[0]['x_1e'];
        $v12 = $bobot_hidden[1]['x_1e'];
        $v13 = $bobot_hidden[2]['x_1e'];
        $v14 = $bobot_hidden[3]['x_1e'];
        $v15 = $bobot_hidden[4]['x_1e'];

        $v21 = $bobot_hidden[0]['x_2e'];
        $v22 = $bobot_hidden[1]['x_2e'];
        $v23 = $bobot_hidden[2]['x_2e'];
        $v24 = $bobot_hidden[3]['x_2e'];
        $v25 = $bobot_hidden[4]['x_2e'];

        $v31 = $bobot_hidden[0]['x_3e'];
        $v32 = $bobot_hidden[1]['x_3e'];
        $v33 = $bobot_hidden[2]['x_3e'];
        $v34 = $bobot_hidden[3]['x_3e'];
        $v35 = $bobot_hidden[4]['x_3e'];

        $v41 = $bobot_hidden[0]['x_4e'];
        $v42 = $bobot_hidden[1]['x_4e'];
        $v43 = $bobot_hidden[2]['x_4e'];
        $v44 = $bobot_hidden[3]['x_4e'];
        $v45 = $bobot_hidden[4]['x_4e'];

        $v51 = $bobot_hidden[0]['x_5e'];
        $v52 = $bobot_hidden[1]['x_5e'];
        $v53 = $bobot_hidden[2]['x_5e'];
        $v54 = $bobot_hidden[3]['x_5e'];
        $v55 = $bobot_hidden[4]['x_5e'];

        $w1 = $bobot_output[0]['w_1e'];
        $w2 = $bobot_output[0]['w_2e'];
        $w3 = $bobot_output[0]['w_3e'];
        $w4 = $bobot_output[0]['w_4e'];
        $w5 = $bobot_output[0]['w_5e'];

        $v01 = $bobot_b1[0]['b_1e'];
        $v02 = $bobot_b1[1]['b_1e'];
        $v03 = $bobot_b1[2]['b_1e'];
        $v04 = $bobot_b1[3]['b_1e'];
        $v05 = $bobot_b1[4]['b_1e'];

        $w0 = $bobot_b2[0]['b_2e'];

        $j=1;
        foreach ($input as $key => $value) {
            $j++;
            $x1=$value['data1'];
            $x2=$value['data2'];
            $x3=$value['data3'];
            $x4=$value['data4'];
            $x5=$value['data5'];
            $t=$value['data6'];

            //Perkalian unit tersembunyi
            $z_net1 = $v01+($x1*$v11)+($x2*$v21)+($x3*$v31)+($x4*$v41)+($x5*$v51);
            $z_net2 = $v02+($x1*$v12)+($x2*$v22)+($x3*$v32)+($x4*$v42)+($x5*$v52);
            $z_net3 = $v03+($x1*$v13)+($x2*$v23)+($x3*$v33)+($x4*$v43)+($x5*$v53);
            $z_net4 = $v04+($x1*$v14)+($x2*$v24)+($x3*$v34)+($x4*$v44)+($x5*$v54);
            $z_net5 = $v05+($x1*$v15)+($x2*$v25)+($x3*$v35)+($x4*$v45)+($x5*$v55);

            //Pengaktifan unit tersembunyi (sigmoid biner)
            $z1=1/(1+(pow(2.71828183,-$z_net1)));
            $z2=1/(1+(pow(2.71828183,-$z_net2)));
            $z3=1/(1+(pow(2.71828183,-$z_net3)));
            $z4=1/(1+(pow(2.71828183,-$z_net4)));
            $z5=1/(1+(pow(2.71828183,-$z_net5)));

            //Perkalian unit keluaran
            $y_net = $w0+($z1*$w1)+($z2*$w2)+($z3*$w3)+($z4*$w4)+($z5*$w5);
            $y=$y_net;
            $d[$j]=$y;
        }
        
        $max = $this->universal_function->max('tb_pelatihan','data6');
        $min = $this->universal_function->min('tb_pelatihan','data6');

        $j=0;
        foreach ($d as $key => $value) {
            $normal = ((($value-0.1)*($max-$min))/0.8)+$min;
            $j++;
            $update = $this->universal_function->update_k_jst('tb_pelatihan','k_jst','id_lokasi',$j,$normal);
        }
        printf('success');
    }

     //Fungsi propagasi maju simulasi data pengujian
     function pengujian(){
        $result = $this->universal_function->getDataArray('result');
        $input = $this->universal_function->getDataArray('tb_p_normalize_1');
        $jumlah_data = $this->universal_function->count('tb_p_normalize_1','id_lokasi','jumlah');
        $bobot_hidden = $this->universal_function->getDataArray('bobot_hidden');
        $bobot_output = $this->universal_function->getDataArray('bobot_output');
        $bobot_b1 = $this->universal_function->getDataArray('bobot_b1');
        $bobot_b2 = $this->universal_function->getDataArray('bobot_b2');
        $epoch = $this->input->post('epoch');

        $v11 = $bobot_hidden[0]['x_1e'];
        $v12 = $bobot_hidden[1]['x_1e'];
        $v13 = $bobot_hidden[2]['x_1e'];
        $v14 = $bobot_hidden[3]['x_1e'];
        $v15 = $bobot_hidden[4]['x_1e'];

        $v21 = $bobot_hidden[0]['x_2e'];
        $v22 = $bobot_hidden[1]['x_2e'];
        $v23 = $bobot_hidden[2]['x_2e'];
        $v24 = $bobot_hidden[3]['x_2e'];
        $v25 = $bobot_hidden[4]['x_2e'];

        $v31 = $bobot_hidden[0]['x_3e'];
        $v32 = $bobot_hidden[1]['x_3e'];
        $v33 = $bobot_hidden[2]['x_3e'];
        $v34 = $bobot_hidden[3]['x_3e'];
        $v35 = $bobot_hidden[4]['x_3e'];

        $v41 = $bobot_hidden[0]['x_4e'];
        $v42 = $bobot_hidden[1]['x_4e'];
        $v43 = $bobot_hidden[2]['x_4e'];
        $v44 = $bobot_hidden[3]['x_4e'];
        $v45 = $bobot_hidden[4]['x_4e'];

        $v51 = $bobot_hidden[0]['x_5e'];
        $v52 = $bobot_hidden[1]['x_5e'];
        $v53 = $bobot_hidden[2]['x_5e'];
        $v54 = $bobot_hidden[3]['x_5e'];
        $v55 = $bobot_hidden[4]['x_5e'];

        $w1 = $bobot_output[0]['w_1e'];
        $w2 = $bobot_output[0]['w_2e'];
        $w3 = $bobot_output[0]['w_3e'];
        $w4 = $bobot_output[0]['w_4e'];
        $w5 = $bobot_output[0]['w_5e'];

        $v01 = $bobot_b1[0]['b_1e'];
        $v02 = $bobot_b1[1]['b_1e'];
        $v03 = $bobot_b1[2]['b_1e'];
        $v04 = $bobot_b1[3]['b_1e'];
        $v05 = $bobot_b1[4]['b_1e'];

        $w0 = $bobot_b2[0]['b_2e'];
        $j=1;
        foreach ($input as $key => $value) {
            $j++;
            $x1=$value['data1'];
            $x2=$value['data2'];
            $x3=$value['data3'];
            $x4=$value['data4'];
            $x5=$value['data5'];
            $t=$value['data6'];

            //Perkalian unit tersembunyi
            $z_net1 = $v01+($x1*$v11)+($x2*$v21)+($x3*$v31)+($x4*$v41)+($x5*$v51);
            $z_net2 = $v02+($x1*$v12)+($x2*$v22)+($x3*$v32)+($x4*$v42)+($x5*$v52);
            $z_net3 = $v03+($x1*$v13)+($x2*$v23)+($x3*$v33)+($x4*$v43)+($x5*$v53);
            $z_net4 = $v04+($x1*$v14)+($x2*$v24)+($x3*$v34)+($x4*$v44)+($x5*$v54);
            $z_net5 = $v05+($x1*$v15)+($x2*$v25)+($x3*$v35)+($x4*$v45)+($x5*$v55);

            //Pengaktifan unit tersembunyi (sigmoid biner)
            $z1=1/(1+(pow(2.71828183,-$z_net1)));
            $z2=1/(1+(pow(2.71828183,-$z_net2)));
            $z3=1/(1+(pow(2.71828183,-$z_net3)));
            $z4=1/(1+(pow(2.71828183,-$z_net4)));
            $z5=1/(1+(pow(2.71828183,-$z_net5)));

            //Perkalian unit keluaran
            $y_net = $w0+($z1*$w1)+($z2*$w2)+($z3*$w3)+($z4*$w4)+($z5*$w5);
            $y=$y_net;
            $d[$j]=$y;
        }
        
        $max = $this->universal_function->max('tb_pengujian','data6');
        $min = $this->universal_function->min('tb_pengujian','data6');
        $asli = $this->universal_function->getDataArray('tb_pengujian');
        $markers = $this->universal_function->getDataArray('markers');

        $j=0;
        $i=0;
        $x=2;
        foreach ($d as $key => $value) {
            $normal = ((($value-0.1)*($max-$min))/0.8)+$min;
            $bulat = round($normal);
            $j++;
                if($asli[$i]['data6']>$bulat){
                    $percen =  number_format(($bulat/$asli[$i]['data6'])*100,2);
                }else if($asli[$i]['data6']<$bulat){
                    $percen = number_format(($bulat/$asli[$i]['data6'])*100,2);
                }else{
                    $percen = ($bulat/$asli[$i]['data6'])*100;
                }           
            $update = $this->universal_function->update_k_jst_p('tb_pengujian','k_jst','id_lokasi',$j,$normal,$percen);    
            $markers = $this->universal_function->markers($x,$percen);
            $x++;
            $i++;
        }
        printf('success_1');
    }
}

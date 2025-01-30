<?php
set_time_limit(0);
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelajaran extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('universal_function');
    }

    //Fungsi menampilkan tabel input pada menu analisis pembelajaran
    function index() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $this->load->view('admin/pembelajaran/table_input');
        }
    }

    //Fungsi menampilkan hasil perhitungan inisialisasi bobot dengan metode nguyen widraw
    function analisis_inisial() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $bobot = $this->universal_function->getDataArray('inisialisasi');
            $data = array('bobot'=>$bobot);
            $this->load->view('admin/pembelajaran/result_bobot',$data);
        }
    }

    //Fungsi menampilkan mbobot awal
    function bobot_awal() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $data_pembelajaran = $this->universal_function->getDataArray('result');
            $length = $this->universal_function->count('result','id_result','panjang');
            
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
            $data = array('data'=>$mse);
            $this->load->view("admin/pembelajaran/bobot",$data);
            }else{
            $this->load->view("admin/pembelajaran/bobot");
            }
        }
    }

    //Fungsi menampilkan mbobot awal kosong
    function bobot_blank() {
        if (is_null($this->session->userdata("username"))) {
            redirect(base_url() . 'login');
        } else {
            $data_pembelajaran = $this->universal_function->getDataArray('result');
            $length = $this->universal_function->count('result','id_result','panjang');
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
            $data = array('data'=>$mse);
            $this->load->view("admin/pembelajaran/bobot_blank",$data);
            }else{
            $this->load->view("admin/pembelajaran/bobot_blank");
            }
        }
    }

    //Fungsi pelemparan data ke perhitungan analisis pembelajaran (tapilan result)
    function analisis(){
        $result = $this->universal_function->getDataArray('result');
        $input = $this->universal_function->getDataArray('tb_p_normalize');
        $jumlah_data = $this->universal_function->count('tb_p_normalize','id_lokasi','jumlah');
        $bobot_hidden = $this->universal_function->getDataArray('bobot_hidden');
        $bobot_output = $this->universal_function->getDataArray('bobot_output');
        $bobot_b1 = $this->universal_function->getDataArray('bobot_b1');
        $bobot_b2 = $this->universal_function->getDataArray('bobot_b2');
        $epoch = $this->input->post('epoch');

        $data=array('input'=>$input,'bobot_hidden'=>$bobot_hidden,'bobot_output'=>$bobot_output,
            'bobot_b1'=>$bobot_b1,'bobot_b2'=>$bobot_b2,'epoch'=>$epoch,'result'=>$result,'jumlah'=>$jumlah_data);
        $this->load->view('admin/pembelajaran/result',$data);
    }

    //Grafik mse pada menu pembelajaran
    function mse(){
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
                $row['data'][]=null;
                for($z=1;$z<=$length;$z++){
                    foreach ($a_mse[$z] as $key => $value) {
                         $row['data'][]=$value;
                    }
                }
            }
        
        $row['name']='MSE';
        $result = array();
        array_push($result,$row);
        print json_encode($result, JSON_NUMERIC_CHECK);
    }

    //Grafik perbandingan target pada menu pembelajaran
    function k_jst(){
        $target = $this->universal_function->getDataArray('tb_p_normalize');
        $k_jst = $this->universal_function->getDataArray('result');
        $row['data'][]=null;
        $row1['data'][]=null;
        foreach ($target as $key => $value) {
            $row['data'][]=$value['data6'];
        }
        $k_jst_2 = unserialize($k_jst[0]['k_jst']);
        foreach ($k_jst_2 as $key => $value) {
            $row1['data'][]=$value;
        }
        $row['name']='Target';
        $row1['name']='Hasil Keluaran JST';
        $result = array();
        array_push($result,$row);
        array_push($result,$row1);
        print json_encode($result, JSON_NUMERIC_CHECK);
    }

    //Grafik perbandingan target pada menu pembelajaran
    function hasil(){
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



    //Fungsi menampilkan tabel input normalisi pada menu analisis pembelajaran
    function datatables_input() {
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
            $this->universal_function->Datatables_Normalisasi($datatables);
        }
        return;
    }

    //Fungsi pembelajaran jaringan = adaptasi
    //Fungsi pembelajaran bobot = learngd (gradien descent)
    function learning(){
        //Parameter Jaringan
        $lr_iw = $this->input->post('lr_iw');
        $lr_ib = $this->input->post('lr_ib');
        $lr_lw = $this->input->post('lr_lw');
        $lr_lb = $this->input->post('lr_lb');
        $mse = $this->input->post('mse');
        $epoch = $this->input->post('epoch');

        //Bobot unit tersembunyi awal
        $v11 = $this->input->post('v11');
        $v12 = $this->input->post('v12');
        $v13 = $this->input->post('v13');
        $v14 = $this->input->post('v14');
        $v15 = $this->input->post('v15');

        $v21 = $this->input->post('v21');
        $v22 = $this->input->post('v22');
        $v23 = $this->input->post('v23');
        $v24 = $this->input->post('v24');
        $v25 = $this->input->post('v25');

        $v31 = $this->input->post('v31');
        $v32 = $this->input->post('v32');
        $v33 = $this->input->post('v33');
        $v34 = $this->input->post('v34');
        $v35 = $this->input->post('v35');

        $v41 = $this->input->post('v41');
        $v42 = $this->input->post('v42');
        $v43 = $this->input->post('v43');
        $v44 = $this->input->post('v44');
        $v45 = $this->input->post('v45');

        $v51 = $this->input->post('v51');
        $v52 = $this->input->post('v52');
        $v53 = $this->input->post('v53');
        $v54 = $this->input->post('v54');
        $v55 = $this->input->post('v55');

        //Bias unit tersembunyi awal
        $v01 = $this->input->post('v01');
        $v02 = $this->input->post('v02');
        $v03 = $this->input->post('v03');
        $v04 = $this->input->post('v04');
        $v05 = $this->input->post('v05');

        //Bobot unit keluaran awal
        $w1 = $this->input->post('w1');
        $w2 = $this->input->post('w2');
        $w3 = $this->input->post('w3');
        $w4 = $this->input->post('w4');
        $w5 = $this->input->post('w5');

        //Bias unit tersembunyi awal
        $w0 = $this->input->post('w0');

        //Array penyimpanan bobot awal
        $x_1=array($v11,$v12,$v13,$v14,$v15);
        $x_2=array($v21,$v22,$v23,$v24,$v25);
        $x_3=array($v31,$v32,$v33,$v34,$v35);
        $x_4=array($v41,$v42,$v43,$v44,$v45);
        $x_5=array($v51,$v52,$v53,$v54,$v55);
        $w_1=$w1;
        $w_2=$w2;
        $w_3=$w3;
        $w_4=$w4;
        $w_5=$w5;
        $b_1 = array($v01,$v02,$v03,$v04,$v05);
        $b_2 = $w0;

        //Mse baru untuk menentukan pemberhentian jaringan
        $MSE_B = 0;
        $MSE_B_S = 0;
        $iterasi=0;
        //perulangan berdasarkan EPOCH
        for($i=1;$i<=$epoch;$i++){
            //Kondisi berhenti perulangan dengan EPOCH
            if($MSE_B==0 && $MSE_B_S==0 || $MSE_B==$MSE_B_S || $MSE_B<$MSE_B_S && $MSE_B>$mse){
                    //Variabel pendukung kondisi berhenti
                    $k_e=0;
                    $input = $this->universal_function->getDataArray('tb_p_normalize');
                    $leng_data = $this->universal_function->count('tb_p_normalize','data1','panjang');
                    $j=0;
                    //Perulangan setiap data
                    foreach ($input as $key => $value) {
                        $j++;
                        //Variabel input
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

                        //Pengaktifan unit keluaran (identitas)
                        $y=$y_net;
                        $Error = $t-$y;
                        $k_e = $k_e+($Error*$Error);

                        //Faktor kesalahan pertama
                        $dk0 = $Error;

                        //Perubahan Bobot unit keluaran
                        $w0_b = $lr_lb*$dk0;
                        $w1_b = $lr_lw*$dk0*$z1;
                        $w2_b = $lr_lw*$dk0*$z2;
                        $w3_b = $lr_lw*$dk0*$z3;
                        $w4_b = $lr_lw*$dk0*$z4;
                        $w5_b = $lr_lw*$dk0*$z5;

                        //Suku perubahan Bobot unit tersembunyi #1
                        $d_net1 = $dk0*$w1;
                        $dj1 = ($d_net1*$z1)*(1-$z1);
                        //perubahan bias z1(v01)
                        $v01_b = $lr_ib*$dj1;
                        //suku perubahan bobot z1(v11,v21)
                        $v11_b = $lr_iw*$dj1*$x1;
                        $v21_b = $lr_iw*$dj1*$x2;
                        $v31_b = $lr_iw*$dj1*$x3;
                        $v41_b = $lr_iw*$dj1*$x4;
                        $v51_b = $lr_iw*$dj1*$x5;

                        //Suku perubahan Bobot unit tersembunyi #2
                        $d_net2 = $dk0*$w2;
                        $dj2 = ($d_net2*$z2)*(1-$z2);
                        //perubahan bias z1(v01)
                        $v02_b = $lr_ib*$dj2;
                        //suku perubahan bobot z1(v11,v21)
                        $v12_b = $lr_iw*$dj2*$x1;
                        $v22_b = $lr_iw*$dj2*$x2;
                        $v32_b = $lr_iw*$dj2*$x3;
                        $v42_b = $lr_iw*$dj2*$x4;
                        $v52_b = $lr_iw*$dj2*$x5;

                        //Suku perubahan Bobot unit tersembunyi #3
                        $d_net3 = $dk0*$w3;
                        $dj3 = ($d_net3*$z3)*(1-$z3);
                        //perubahan bias z1(v01)
                        $v03_b = $lr_ib*$dj3;
                        //suku perubahan bobot z1(v11,v21)
                        $v13_b = $lr_iw*$dj3*$x1;
                        $v23_b = $lr_iw*$dj3*$x2;
                        $v33_b = $lr_iw*$dj3*$x3;
                        $v43_b = $lr_iw*$dj3*$x4;
                        $v53_b = $lr_iw*$dj3*$x5;

                        //Suku perubahan Bobot unit tersembunyi #4
                        $d_net4 = $dk0*$w4;
                        $dj4 = ($d_net4*$z4)*(1-$z4);
                        //perubahan bias z1(v01)
                        $v04_b = $lr_ib*$dj4;
                        //suku perubahan bobot z1(v11,v21)
                        $v14_b = $lr_iw*$dj4*$x1;
                        $v24_b = $lr_iw*$dj4*$x2;
                        $v34_b = $lr_iw*$dj4*$x3;
                        $v44_b = $lr_iw*$dj4*$x4;
                        $v54_b = $lr_iw*$dj4*$x5;

                        //Suku perubahan Bobot unit tersembunyi #4
                        $d_net5 = $dk0*$w5;
                        $dj5 = ($d_net5*$z5)*(1-$z5);
                        //perubahan bias z1(v01)
                        $v05_b = $lr_ib*$dj5;
                        //suku perubahan bobot z1(v11,v21)
                        $v15_b = $lr_iw*$dj5*$x1;
                        $v25_b = $lr_iw*$dj5*$x2;
                        $v35_b = $lr_iw*$dj5*$x3;
                        $v45_b = $lr_iw*$dj5*$x4;
                        $v55_b = $lr_iw*$dj5*$x5;

                        //BOBOT AKHIR Iterasi Pertama Input ke Hidden
                        $v11 = $v11+$v11_b;
                        $v12 = $v12+$v12_b;
                        $v13 = $v13+$v13_b;
                        $v14 = $v14+$v14_b;
                        $v15 = $v15+$v15_b;

                        $v21 = $v21+$v21_b;
                        $v22 = $v22+$v22_b;
                        $v23 = $v23+$v23_b;
                        $v24 = $v24+$v24_b;
                        $v25 = $v25+$v25_b;

                        $v31 = $v31+$v31_b;
                        $v32 = $v32+$v32_b;
                        $v33 = $v33+$v33_b;
                        $v34 = $v34+$v34_b;
                        $v35 = $v35+$v35_b;

                        $v41 = $v41+$v41_b;
                        $v42 = $v42+$v42_b;
                        $v43 = $v43+$v43_b;
                        $v44 = $v44+$v44_b;
                        $v45 = $v45+$v45_b;

                        $v51 = $v51+$v51_b;
                        $v52 = $v52+$v52_b;
                        $v53 = $v53+$v53_b;
                        $v54 = $v54+$v54_b;
                        $v55 = $v55+$v55_b;

                        //BIAS AKHIR Iterasi Pertama Input ke Hidden
                        $v01 = $v01+$v01_b;
                        $v02 = $v02+$v02_b;
                        $v03 = $v03+$v03_b;
                        $v04 = $v04+$v04_b;
                        $v05 = $v05+$v05_b;

                        //BOBOT AKHIR Iterasi Pertama Hiden ke Output
                        $w1 = $w1+$w1_b;
                        $w2 = $w2+$w2_b;
                        $w3 = $w3+$w3_b;
                        $w4 = $w4+$w4_b;
                        $w5 = $w5+$w5_b;

                        //BIAS AKHIR Iterasi Pertama Hiden ke Output
                        $w0 = $w0+$w0_b;
                        //Array penyimpan hasil akhir keluaran jaringan
                        $d[$j]=$y;
                    }
                        //Pengupdatetan kondisi pembehentian perulangan
                        $MSE_B_S=$MSE_B;
                        $MSE_B = $k_e/$leng_data;
                        $iterasi=$i;
                        if($i==1){
                            $MSE_B_S=$MSE_B;
                        }

                        //Penyimpanan nilai MSE per 900 data (MSE)
                        if($i<=900){
                        $array[$i]=number_format($MSE_B,8);
                        }else if($i>900 && $i<=1800){
                                $array1[$i]=number_format($MSE_B,8);
                        }else if($i>1800 && $i<=2700){
                                $array2[$i]=number_format($MSE_B,8);
                        }else if($i>2700 && $i<=3600){
                                $array3[$i]=number_format($MSE_B,8);
                        }else if($i>3600 && $i<=4500){
                                $array4[$i]=number_format($MSE_B,8);
                        }else if($i>4500 && $i<=5400){
                                $array5[$i]=number_format($MSE_B,8);
                        }else if($i>5400 && $i<=6300){
                                $array6[$i]=number_format($MSE_B,8);
                        }else if($i>6300 && $i<=7200){
                                $array7[$i]=number_format($MSE_B,8);
                        }else if($i>7200 && $i<=8100){
                                $array8[$i]=number_format($MSE_B,8);
                        }else if($i>8100 && $i<=9000){
                                $array9[$i]=number_format($MSE_B,8);
                        }else if($i>9000 && $i<=9900){
                                $array10[$i]=number_format($MSE_B,8);
                        }else if($i>9900 && $i<=10800){
                                $array11[$i]=number_format($MSE_B,8);
                        }else if($i>10800 && $i<=11700){
                                $array12[$i]=number_format($MSE_B,8);
                        }else if($i>11700 && $i<=12600){
                                $array13[$i]=number_format($MSE_B,8);
                        }else if($i>12600 && $i<=13500){
                                $array14[$i]=number_format($MSE_B,8);
                        }else if($i>13500 && $i<=14400){
                                $array15[$i]=number_format($MSE_B,8);
                        }else if($i>14400 && $i<=15300){
                                $array16[$i]=number_format($MSE_B,8);
                        }else if($i>15300 && $i<=16200){
                                $array17[$i]=number_format($MSE_B,8);
                        }else if($i>16200 && $i<=17100){
                                $array18[$i]=number_format($MSE_B,8);
                        }else if($i>17100 && $i<=18000){
                                $array19[$i]=number_format($MSE_B,8);
                        }else if($i>18000 && $i<=18900){
                                $array20[$i]=number_format($MSE_B,8);
                        }else if($i>18900 && $i<=19800){
                                $array21[$i]=number_format($MSE_B,8);
                        }else if($i>19800 && $i<=20700){
                                $array22[$i]=number_format($MSE_B,8);
                        }else if($i>20700 && $i<=21600){
                                $array23[$i]=number_format($MSE_B,8);
                        }else if($i>21600 && $i<=22500){
                                $array24[$i]=number_format($MSE_B,8);
                        }else if($i>22500 && $i<=23400){
                                $array25[$i]=number_format($MSE_B,8);
                        }else if($i>23400 && $i<=24300){
                                $array26[$i]=number_format($MSE_B,8);
                        }else if($i>24300 && $i<=25200){
                                $array27[$i]=number_format($MSE_B,8);
                        }else if($i>25200 && $i<=26100){
                                $array28[$i]=number_format($MSE_B,8);
                        }else if($i>26100 && $i<=27000){
                                $array29[$i]=number_format($MSE_B,8);
                        }else if($i>27000 && $i<=27900){
                                $array30[$i]=number_format($MSE_B,8);
                        }else if($i>27900 && $i<=28800){
                                $array31[$i]=number_format($MSE_B,8);
                        }else if($i>28800 && $i<=29700){
                                $array32[$i]=number_format($MSE_B,8);
                        }else if($i>29700 && $i<=30600){
                                $array33[$i]=number_format($MSE_B,8);
                        }

                        //Array penyimpanan bobot akhir
                        $x_1e=array($v11,$v12,$v13,$v14,$v15);
                        $x_2e=array($v21,$v22,$v23,$v24,$v25);
                        $x_3e=array($v31,$v32,$v33,$v34,$v35);
                        $x_4e=array($v41,$v42,$v43,$v44,$v45);
                        $x_5e=array($v51,$v52,$v53,$v54,$v55);
                        $w_1e=$w1;
                        $w_2e=$w2;
                        $w_3e=$w3;
                        $w_4e=$w4;
                        $w_5e=$w5;
                        $b_1e = array($v01,$v02,$v03,$v04,$v05);
                        $b_2e = $w0;;

                //Kondisi berhenti jika MSE mencapai minimum error / jaringan tidak bergenerasi lagi
                }else if($MSE_B<$mse || $MSE_B>$MSE_B_S){
                            if ($MSE_B<$mse){
                                break;
                            }else if($MSE_B>$MSE_B_S){
                                break;
                            }
                    }
                }

                //Tindakan setelah pembelajaran terhenti
                if($MSE_B<$mse || $MSE_B>$MSE_B_S || $MSE_B>$mse && $iterasi==$epoch){
                    $truncate = $this->universal_function->truncate('bobot_hidden');
                    $truncate = $this->universal_function->truncate('bobot_output');
                    $truncate = $this->universal_function->truncate('bobot_b1');
                    $truncate = $this->universal_function->truncate('bobot_b2');

                    //penyimpanan bobot awal dan akhir  unit tersembunyi
                    for($x_e=0;$x_e<=4;$x_e++){
                        $insert_bobot = $this->universal_function->insert_hidden($x_1[$x_e],$x_1e[$x_e],$x_2[$x_e],$x_2e[$x_e],$x_3[$x_e],$x_3e[$x_e],
                            $x_4[$x_e],$x_4e[$x_e],$x_5[$x_e],$x_5e[$x_e]);
                        }
                    //penyimpanan bobot awal dan akhir unit keluaran
                    $insert_bobot2 = $this->universal_function->insert_output($w_1,$w_1e,$w_2,$w_2e,$w_3,$w_3e,$w_4,$w_4e,$w_5,$w_5e);
                    //penyimpanan bias uawal dan akhir unit keluaran
                    $insert_b2 = $this->universal_function->insert_b2($b_2,$b_2e);
                    //penyimpanan bias awal danakhit unit tersembunyi
                    for($b_e=0;$b_e<=4;$b_e++){
                    $insert_b1 = $this->universal_function->insert_b1($b_1[$b_e],$b_1e[$b_e]);
                    }

                    //penyimpanan nilai mse ke database
                    $d_array = serialize($d);
                    $data_array = serialize($array);
                        $truncate = $this->universal_function->truncate('result');
                        $result = $this->universal_function->result($data_array,$iterasi,$d_array,$lr_iw,$lr_ib,$lr_lw,$lr_lb,$mse);
                        if($i>900 && $i<=1800){
                            $data_array1 = serialize($array1);
                            $result = $this->universal_function->result($data_array1,'','','','','','','');
                        }else if($i>1800 && $i<=2700){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2));
                            for ($i=1; $i <=2 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>2700 && $i<=3600){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3));
                            for ($i=1; $i <=3 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>3600 && $i<=4500){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4));
                            for ($i=1; $i <=4 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>4500 && $i<=5400){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5));
                            for ($i=1; $i <=5 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>5400 && $i<=6300){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6));
                            for ($i=1; $i <=6 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>6300 && $i<=7200){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7));
                            for ($i=1; $i <=7 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>7200 && $i<=8100){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8));
                            for ($i=1; $i <=8 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>8100 && $i<=9000){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9));
                            for ($i=1; $i <=9 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>9000 && $i<=9900){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10));
                            for ($i=1; $i <=10 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>9900 && $i<=10800){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11));
                            for ($i=1; $i <=11 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>10800 && $i<=11700){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12));
                            for ($i=1; $i <=12 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>11700 && $i<=12600){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12),
                            13=>$data_array13 = serialize($array13));
                            for ($i=1; $i <=13 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>12600 && $i<=13500){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12),
                            13=>$data_array13 = serialize($array13),
                            14=>$data_array14 = serialize($array14));
                            for ($i=1; $i <=14 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>13500 && $i<=14400){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12),
                            13=>$data_array13 = serialize($array13),
                            14=>$data_array14 = serialize($array14),
                            15=>$data_array15 = serialize($array15));
                            for ($i=1; $i <=15 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>14400 && $i<=15300){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12),
                            13=>$data_array13 = serialize($array13),
                            14=>$data_array14 = serialize($array14),
                            15=>$data_array15 = serialize($array15),
                            16=>$data_array16 = serialize($array16));
                            for ($i=1; $i <=16 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>15300 && $i<=16200){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12),
                            13=>$data_array13 = serialize($array13),
                            14=>$data_array14 = serialize($array14),
                            15=>$data_array15 = serialize($array15),
                            16=>$data_array16 = serialize($array16),
                            17=>$data_array17 = serialize($array17));
                            for ($i=1; $i <=17 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>16200 && $i<=17100){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12),
                            13=>$data_array13 = serialize($array13),
                            14=>$data_array14 = serialize($array14),
                            15=>$data_array15 = serialize($array15),
                            16=>$data_array16 = serialize($array16),
                            17=>$data_array17 = serialize($array17),
                            18=>$data_array18 = serialize($array18));
                            for ($i=1; $i <=18 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>17100 && $i<=18000){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12),
                            13=>$data_array13 = serialize($array13),
                            14=>$data_array14 = serialize($array14),
                            15=>$data_array15 = serialize($array15),
                            16=>$data_array16 = serialize($array16),
                            17=>$data_array17 = serialize($array17),
                            18=>$data_array18 = serialize($array18),
                            19=>$data_array19 = serialize($array19));
                            for ($i=1; $i <=19 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>18000 && $i<=18900){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12),
                            13=>$data_array13 = serialize($array13),
                            14=>$data_array14 = serialize($array14),
                            15=>$data_array15 = serialize($array15),
                            16=>$data_array16 = serialize($array16),
                            17=>$data_array17 = serialize($array17),
                            18=>$data_array18 = serialize($array18),
                            19=>$data_array19 = serialize($array19),
                            20=>$data_array20 = serialize($array20));
                            for ($i=1; $i <=20 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>18900 && $i<=19800){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12),
                            13=>$data_array13 = serialize($array13),
                            14=>$data_array14 = serialize($array14),
                            15=>$data_array15 = serialize($array15),
                            16=>$data_array16 = serialize($array16),
                            17=>$data_array17 = serialize($array17),
                            18=>$data_array18 = serialize($array18),
                            19=>$data_array19 = serialize($array19),
                            20=>$data_array20 = serialize($array20),
                            21=>$data_array21 = serialize($array21));
                            for ($i=1; $i <=21 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>19800 && $i<=20700){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12),
                            13=>$data_array13 = serialize($array13),
                            14=>$data_array14 = serialize($array14),
                            15=>$data_array15 = serialize($array15),
                            16=>$data_array16 = serialize($array16),
                            17=>$data_array17 = serialize($array17),
                            18=>$data_array18 = serialize($array18),
                            19=>$data_array19 = serialize($array19),
                            20=>$data_array20 = serialize($array20),
                            21=>$data_array21 = serialize($array21),
                            22=>$data_array22 = serialize($array22));
                            for ($i=1; $i <=22 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>20700 && $i<=21600){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12),
                            13=>$data_array13 = serialize($array13),
                            14=>$data_array14 = serialize($array14),
                            15=>$data_array15 = serialize($array15),
                            16=>$data_array16 = serialize($array16),
                            17=>$data_array17 = serialize($array17),
                            18=>$data_array18 = serialize($array18),
                            19=>$data_array19 = serialize($array19),
                            20=>$data_array20 = serialize($array20),
                            21=>$data_array21 = serialize($array21),
                            22=>$data_array22 = serialize($array22),
                            23=>$data_array23 = serialize($array23));
                            for ($i=1; $i <=23 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>21600 && $i<=22500){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12),
                            13=>$data_array13 = serialize($array13),
                            14=>$data_array14 = serialize($array14),
                            15=>$data_array15 = serialize($array15),
                            16=>$data_array16 = serialize($array16),
                            17=>$data_array17 = serialize($array17),
                            18=>$data_array18 = serialize($array18),
                            19=>$data_array19 = serialize($array19),
                            20=>$data_array20 = serialize($array20),
                            21=>$data_array21 = serialize($array21),
                            22=>$data_array22 = serialize($array22),
                            23=>$data_array23 = serialize($array23),
                            24=>$data_array24 = serialize($array24));
                            for ($i=1; $i <=24 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>22500 && $i<=23400){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12),
                            13=>$data_array13 = serialize($array13),
                            14=>$data_array14 = serialize($array14),
                            15=>$data_array15 = serialize($array15),
                            16=>$data_array16 = serialize($array16),
                            17=>$data_array17 = serialize($array17),
                            18=>$data_array18 = serialize($array18),
                            19=>$data_array19 = serialize($array19),
                            20=>$data_array20 = serialize($array20),
                            21=>$data_array21 = serialize($array21),
                            22=>$data_array22 = serialize($array22),
                            23=>$data_array23 = serialize($array23),
                            24=>$data_array24 = serialize($array24),
                            25=>$data_array25 = serialize($array25));
                            for ($i=1; $i <=25 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>23400 && $i<=24300){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12),
                            13=>$data_array13 = serialize($array13),
                            14=>$data_array14 = serialize($array14),
                            15=>$data_array15 = serialize($array15),
                            16=>$data_array16 = serialize($array16),
                            17=>$data_array17 = serialize($array17),
                            18=>$data_array18 = serialize($array18),
                            19=>$data_array19 = serialize($array19),
                            20=>$data_array20 = serialize($array20),
                            21=>$data_array21 = serialize($array21),
                            22=>$data_array22 = serialize($array22),
                            23=>$data_array23 = serialize($array23),
                            24=>$data_array24 = serialize($array24),
                            25=>$data_array25 = serialize($array25),
                            26=>$data_array26 = serialize($array26));
                            for ($i=1; $i <=26 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>24300 && $i<=25200){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12),
                            13=>$data_array13 = serialize($array13),
                            14=>$data_array14 = serialize($array14),
                            15=>$data_array15 = serialize($array15),
                            16=>$data_array16 = serialize($array16),
                            17=>$data_array17 = serialize($array17),
                            18=>$data_array18 = serialize($array18),
                            19=>$data_array19 = serialize($array19),
                            20=>$data_array20 = serialize($array20),
                            21=>$data_array21 = serialize($array21),
                            22=>$data_array22 = serialize($array22),
                            23=>$data_array23 = serialize($array23),
                            24=>$data_array24 = serialize($array24),
                            25=>$data_array25 = serialize($array25),
                            26=>$data_array26 = serialize($array26),
                            27=>$data_array27 = serialize($array27));
                            for ($i=1; $i <=27 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>25200 && $i<=26100){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12),
                            13=>$data_array13 = serialize($array13),
                            14=>$data_array14 = serialize($array14),
                            15=>$data_array15 = serialize($array15),
                            16=>$data_array16 = serialize($array16),
                            17=>$data_array17 = serialize($array17),
                            18=>$data_array18 = serialize($array18),
                            19=>$data_array19 = serialize($array19),
                            20=>$data_array20 = serialize($array20),
                            21=>$data_array21 = serialize($array21),
                            22=>$data_array22 = serialize($array22),
                            23=>$data_array23 = serialize($array23),
                            24=>$data_array24 = serialize($array24),
                            25=>$data_array25 = serialize($array25),
                            26=>$data_array26 = serialize($array26),
                            27=>$data_array27 = serialize($array27),
                            28=>$data_array28 = serialize($array28));
                            for ($i=1; $i <=28 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>26100 && $i<=27000){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12),
                            13=>$data_array13 = serialize($array13),
                            14=>$data_array14 = serialize($array14),
                            15=>$data_array15 = serialize($array15),
                            16=>$data_array16 = serialize($array16),
                            17=>$data_array17 = serialize($array17),
                            18=>$data_array18 = serialize($array18),
                            19=>$data_array19 = serialize($array19),
                            20=>$data_array20 = serialize($array20),
                            21=>$data_array21 = serialize($array21),
                            22=>$data_array22 = serialize($array22),
                            23=>$data_array23 = serialize($array23),
                            24=>$data_array24 = serialize($array24),
                            25=>$data_array25 = serialize($array25),
                            26=>$data_array26 = serialize($array26),
                            27=>$data_array27 = serialize($array27),
                            28=>$data_array28 = serialize($array28),
                            29=>$data_array29 = serialize($array29));
                            for ($i=1; $i <=29 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>27000 && $i<=27900){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12),
                            13=>$data_array13 = serialize($array13),
                            14=>$data_array14 = serialize($array14),
                            15=>$data_array15 = serialize($array15),
                            16=>$data_array16 = serialize($array16),
                            17=>$data_array17 = serialize($array17),
                            18=>$data_array18 = serialize($array18),
                            19=>$data_array19 = serialize($array19),
                            20=>$data_array20 = serialize($array20),
                            21=>$data_array21 = serialize($array21),
                            22=>$data_array22 = serialize($array22),
                            23=>$data_array23 = serialize($array23),
                            24=>$data_array24 = serialize($array24),
                            25=>$data_array25 = serialize($array25),
                            26=>$data_array26 = serialize($array26),
                            27=>$data_array27 = serialize($array27),
                            28=>$data_array28 = serialize($array28),
                            29=>$data_array29 = serialize($array29),
                            30=>$data_array30 = serialize($array30));
                            for ($i=1; $i <=30 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>27900 && $i<=28800){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12),
                            13=>$data_array13 = serialize($array13),
                            14=>$data_array14 = serialize($array14),
                            15=>$data_array15 = serialize($array15),
                            16=>$data_array16 = serialize($array16),
                            17=>$data_array17 = serialize($array17),
                            18=>$data_array18 = serialize($array18),
                            19=>$data_array19 = serialize($array19),
                            20=>$data_array20 = serialize($array20),
                            21=>$data_array21 = serialize($array21),
                            22=>$data_array22 = serialize($array22),
                            23=>$data_array23 = serialize($array23),
                            24=>$data_array24 = serialize($array24),
                            25=>$data_array25 = serialize($array25),
                            26=>$data_array26 = serialize($array26),
                            27=>$data_array27 = serialize($array27),
                            28=>$data_array28 = serialize($array28),
                            29=>$data_array29 = serialize($array29),
                            30=>$data_array30 = serialize($array30),
                            31=>$data_array31 = serialize($array31));
                            for ($i=1; $i <=31 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>28800 && $i<=29700){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12),
                            13=>$data_array13 = serialize($array13),
                            14=>$data_array14 = serialize($array14),
                            15=>$data_array15 = serialize($array15),
                            16=>$data_array16 = serialize($array16),
                            17=>$data_array17 = serialize($array17),
                            18=>$data_array18 = serialize($array18),
                            19=>$data_array19 = serialize($array19),
                            20=>$data_array20 = serialize($array20),
                            21=>$data_array21 = serialize($array21),
                            22=>$data_array22 = serialize($array22),
                            23=>$data_array23 = serialize($array23),
                            24=>$data_array24 = serialize($array24),
                            25=>$data_array25 = serialize($array25),
                            26=>$data_array26 = serialize($array26),
                            27=>$data_array27 = serialize($array27),
                            28=>$data_array28 = serialize($array28),
                            29=>$data_array29 = serialize($array29),
                            30=>$data_array30 = serialize($array30),
                            31=>$data_array31 = serialize($array31),
                            32=>$data_array32 = serialize($array32));
                            for ($i=1; $i <=32 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }else if($i>29700 && $i<=30600){
                            $data=array(
                            1=>$data_array1 = serialize($array1),
                            2=>$data_array2 = serialize($array2),
                            3=>$data_array3 = serialize($array3),
                            4=>$data_array4 = serialize($array4),
                            5=>$data_array5 = serialize($array5),
                            6=>$data_array6 = serialize($array6),
                            7=>$data_array7 = serialize($array7),
                            8=>$data_array8 = serialize($array8),
                            9=>$data_array9 = serialize($array9),
                            10=>$data_array10 = serialize($array10),
                            11=>$data_array11 = serialize($array11),
                            12=>$data_array12 = serialize($array12),
                            13=>$data_array13 = serialize($array13),
                            14=>$data_array14 = serialize($array14),
                            15=>$data_array15 = serialize($array15),
                            16=>$data_array16 = serialize($array16),
                            17=>$data_array17 = serialize($array17),
                            18=>$data_array18 = serialize($array18),
                            19=>$data_array19 = serialize($array19),
                            20=>$data_array20 = serialize($array20),
                            21=>$data_array21 = serialize($array21),
                            22=>$data_array22 = serialize($array22),
                            23=>$data_array23 = serialize($array23),
                            24=>$data_array24 = serialize($array24),
                            25=>$data_array25 = serialize($array25),
                            26=>$data_array26 = serialize($array26),
                            27=>$data_array27 = serialize($array27),
                            28=>$data_array28 = serialize($array28),
                            29=>$data_array29 = serialize($array29),
                            30=>$data_array30 = serialize($array30),
                            31=>$data_array31 = serialize($array31),
                            32=>$data_array32 = serialize($array32),
                            33=>$data_array33 = serialize($array33));
                            for ($i=1; $i <=33 ; $i++) { 
                                $result1 = $this->universal_function->result($data[$i],'','','','','','','');
                            }
                        }
                            if ($MSE_B<$mse){
                                printf('goal');
                            }else if($MSE_B>$MSE_B_S){
                                printf('stop');
                            }else if($MSE_B>$mse && $iterasi==$epoch){
                                printf('fail');
                            }
                    }
                }

    //Algpritma inisialisasi bobot nguyen widraw
    function inisial(){
        //Bobot unit tersembunyi awal
        $v11 = $this->input->post('v11');
        $v12 = $this->input->post('v12');
        $v13 = $this->input->post('v13');
        $v14 = $this->input->post('v14');
        $v15 = $this->input->post('v15');

        $v21 = $this->input->post('v21');
        $v22 = $this->input->post('v22');
        $v23 = $this->input->post('v23');
        $v24 = $this->input->post('v24');
        $v25 = $this->input->post('v25');

        $v31 = $this->input->post('v31');
        $v32 = $this->input->post('v32');
        $v33 = $this->input->post('v33');
        $v34 = $this->input->post('v34');
        $v35 = $this->input->post('v35');

        $v41 = $this->input->post('v41');
        $v42 = $this->input->post('v42');
        $v43 = $this->input->post('v43');
        $v44 = $this->input->post('v44');
        $v45 = $this->input->post('v45');

        $v51 = $this->input->post('v51');
        $v52 = $this->input->post('v52');
        $v53 = $this->input->post('v53');
        $v54 = $this->input->post('v54');
        $v55 = $this->input->post('v55');

        //Bias unit tersembunyi awal
        $v01 = $this->input->post('v01');
        $v02 = $this->input->post('v02');
        $v03 = $this->input->post('v03');
        $v04 = $this->input->post('v04');
        $v05 = $this->input->post('v05');   

        //parameter nguyen widraw
        $n = 5;
        $p = 5;
        $fs = 0.7*(pow($p,(1/$n))); 
        $v01_baru = $fs/-2;
        $v02_baru = $fs/-2.5;
        $v03_baru = $fs/3;
        $v04_baru = $fs/-1.5;
        $v05_baru = $fs/1;

        //pengakaran dari julah kuadrad bobot hiden
        $v1 = sqrt(pow($v11,2)+pow($v21,2)+pow($v31,2)+pow($v41,2)+pow($v51,2));
        $v2 = sqrt(pow($v12,2)+pow($v22,2)+pow($v32,2)+pow($v42,2)+pow($v52,2));
        $v3 = sqrt(pow($v13,2)+pow($v23,2)+pow($v33,2)+pow($v43,2)+pow($v53,2));
        $v4 = sqrt(pow($v14,2)+pow($v24,2)+pow($v34,2)+pow($v44,2)+pow($v54,2));
        $v5 = sqrt(pow($v15,2)+pow($v25,2)+pow($v35,2)+pow($v45,2)+pow($v55,2));

        //Bobot baru setelah inisialisasi bobot dengan metode nguyen widraw
        $v11_baru = ($fs*$v11)/$v1;
        $v21_baru = ($fs*$v21)/$v1;
        $v31_baru = ($fs*$v31)/$v1;
        $v41_baru = ($fs*$v41)/$v1;
        $v51_baru = ($fs*$v51)/$v1;

        $v12_baru = ($fs*$v12)/$v2;
        $v22_baru = ($fs*$v22)/$v2;
        $v32_baru = ($fs*$v32)/$v2;
        $v42_baru = ($fs*$v42)/$v2;
        $v52_baru = ($fs*$v52)/$v2;
        
        $v13_baru = ($fs*$v13)/$v3;
        $v23_baru = ($fs*$v23)/$v3;
        $v33_baru = ($fs*$v33)/$v3;
        $v43_baru = ($fs*$v43)/$v3;
        $v53_baru = ($fs*$v53)/$v3;

        $v14_baru = ($fs*$v14)/$v4;
        $v24_baru = ($fs*$v24)/$v4;
        $v34_baru = ($fs*$v34)/$v4;
        $v44_baru = ($fs*$v44)/$v4;
        $v54_baru = ($fs*$v54)/$v4;

        $v15_baru = ($fs*$v15)/$v5;
        $v25_baru = ($fs*$v25)/$v5;
        $v35_baru = ($fs*$v35)/$v5;
        $v45_baru = ($fs*$v45)/$v5;
        $v55_baru = ($fs*$v55)/$v5;

                //Array untuk proses penyimpanan bobot lama dan baru ke database
                $x_1=array($v11,$v12,$v13,$v14,$v15);
                $x_2=array($v21,$v22,$v23,$v24,$v25);
                $x_3=array($v31,$v32,$v33,$v34,$v35);
                $x_4=array($v41,$v42,$v43,$v44,$v45);
                $x_5=array($v51,$v52,$v53,$v54,$v55);
                $b_1 = array($v01,$v02,$v03,$v04,$v05);
                $x_1e=array($v11_baru,$v12_baru,$v13_baru,$v14_baru,$v15_baru);
                $x_2e=array($v21_baru,$v22_baru,$v23_baru,$v24_baru,$v25_baru);
                $x_3e=array($v31_baru,$v32_baru,$v33_baru,$v34_baru,$v35_baru);
                $x_4e=array($v41_baru,$v42_baru,$v43_baru,$v44_baru,$v45_baru);
                $x_5e=array($v51_baru,$v52_baru,$v53_baru,$v54_baru,$v55_baru);
                $b_1e = array($v01_baru,$v02_baru,$v03_baru,$v04_baru,$v05_baru);

                //Penyimpanan bobot -bobot ke database
                $truncate = $this->universal_function->truncate('inisialisasi'); 
                for($x_e=0;$x_e<=4;$x_e++){
                    $insert_bobot = $this->universal_function->insert_inisial($x_1[$x_e],$x_1e[$x_e],$x_2[$x_e],$x_2e[$x_e],$x_3[$x_e],$x_3e[$x_e],$x_4[$x_e],$x_4e[$x_e],$x_5[$x_e],$x_5e[$x_e],$b_1[$x_e],$b_1e[$x_e]);
                }
            //Proses pengambilan mse dari tabel result
            $data_pembelajaran = $this->universal_function->getDataArray('result');
            $length = $this->universal_function->count('result','id_result','panjang');
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
            $data = array(
                'v11'=>$v11_baru,
                'v21'=>$v21_baru,
                'v31'=>$v31_baru,
                'v41'=>$v41_baru,
                'v51'=>$v51_baru,

                'v12'=>$v12_baru,
                'v22'=>$v22_baru,
                'v32'=>$v32_baru,
                'v42'=>$v42_baru,
                'v52'=>$v52_baru,

                'v13'=>$v13_baru,
                'v23'=>$v23_baru,
                'v33'=>$v33_baru,
                'v43'=>$v43_baru,
                'v53'=>$v53_baru,
                
                'v14'=>$v14_baru,
                'v24'=>$v24_baru,
                'v34'=>$v34_baru,
                'v44'=>$v44_baru,
                'v54'=>$v54_baru,

                'v15'=>$v15_baru,
                'v25'=>$v25_baru,
                'v35'=>$v35_baru,
                'v45'=>$v45_baru,
                'v55'=>$v55_baru,

                'v01'=>$v01_baru,
                'v02'=>$v02_baru,
                'v03'=>$v03_baru,
                'v04'=>$v04_baru,
                'v05'=>$v05_baru,
                'data'=>$mse
                );

            $this->load->view("admin/pembelajaran/bobot_nguyen",$data);
            }else{
                $data = array(
                'v11'=>$v11_baru,
                'v21'=>$v21_baru,
                'v31'=>$v31_baru,
                'v41'=>$v41_baru,
                'v51'=>$v51_baru,

                'v12'=>$v12_baru,
                'v22'=>$v22_baru,
                'v32'=>$v32_baru,
                'v42'=>$v42_baru,
                'v52'=>$v52_baru,

                'v13'=>$v13_baru,
                'v23'=>$v23_baru,
                'v33'=>$v33_baru,
                'v43'=>$v43_baru,
                'v53'=>$v53_baru,
                
                'v14'=>$v14_baru,
                'v24'=>$v24_baru,
                'v34'=>$v34_baru,
                'v44'=>$v44_baru,
                'v54'=>$v54_baru,

                'v15'=>$v15_baru,
                'v25'=>$v25_baru,
                'v35'=>$v35_baru,
                'v45'=>$v45_baru,
                'v55'=>$v55_baru,

                'v01'=>$v01_baru,
                'v02'=>$v02_baru,
                'v03'=>$v03_baru,
                'v04'=>$v04_baru,
                'v05'=>$v05_baru
                );
            $this->load->view("admin/pembelajaran/bobot_nguyen",$data);
            }
        }

        
    }


        
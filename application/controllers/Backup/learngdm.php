<?

    function learning(){

        //Parameter Jaringan
        $lr = $this->input->post('lr');
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
        $MSE_B = 0;
        for($i=1;$i<=$epoch;$i++){
                if($MSE_B==0 || $MSE_B>$mse){
                    $k_e=0;
                    $iterasi=0;
                    $input = $this->universal_function->getDataArray('tb_p_normalize');
                    $leng_data = $this->universal_function->count('tb_p_normalize','data1','panjang');
                    $j=0;
                    foreach ($input as $key => $value) {
                        $j++;
                        $x1=$value['data1'];
                        $x2=$value['data2'];
                        $x3=$value['data3'];
                        $x4=$value['data4'];
                        $x5=$value['data5'];
                        $t=$value['data6'];
                        $mc = 0.5000;

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

                        //Pengaktifan unit keluaran
                        $y=$y_net;
                        $Error = $t-$y;
                        $k_e = $k_e+($Error*$Error);

                        //Faktor kesalahan pertama
                        $dk0 = $Error;
                        //Perubahan Bobot unit keluaran
                        $w0_b = $lr*$dk0;
                        $w1_b = $lr*$dk0*$z1;
                        $w2_b = $lr*$dk0*$z2;
                        $w3_b = $lr*$dk0*$z3;
                        $w4_b = $lr*$dk0*$z4;
                        $w5_b = $lr*$dk0*$z5;

                        //Suku perubahan Bobot unit tersembunyi #1
                        $d_net1 = $dk0*$w1;
                        $dk1 = ($d_net1*$z1)*(1-$z1);
                        //perubahan bias z1(v01)
                        $v01_b = $lr*$dk1;
                        //suku perubahan bobot z1(v11,v21)
                        $v11_b = $lr*$dk1*$x1;
                        $v21_b = $lr*$dk1*$x2;
                        $v31_b = $lr*$dk1*$x3;
                        $v41_b = $lr*$dk1*$x4;
                        $v51_b = $lr*$dk1*$x5;

                        //Suku perubahan Bobot unit tersembunyi #2
                        $d_net2 = $dk0*$w2;
                        $dk2 = ($d_net2*$z2)*(1-$z2);
                        //perubahan bias z1(v01)
                        $v02_b = $lr*$dk2;
                        //suku perubahan bobot z1(v11,v21)
                        $v12_b = $lr*$dk2*$x1;
                        $v22_b = $lr*$dk2*$x2;
                        $v32_b = $lr*$dk2*$x3;
                        $v42_b = $lr*$dk2*$x4;
                        $v52_b = $lr*$dk2*$x5;

                        //Suku perubahan Bobot unit tersembunyi #3
                        $d_net3 = $dk0*$w3;
                        $dk3 = ($d_net3*$z3)*(1-$z3);
                        //perubahan bias z1(v01)
                        $v03_b = $lr*$dk3;
                        //suku perubahan bobot z1(v11,v21)
                        $v13_b = $lr*$dk3*$x1;
                        $v23_b = $lr*$dk3*$x2;
                        $v33_b = $lr*$dk3*$x3;
                        $v43_b = $lr*$dk3*$x4;
                        $v53_b = $lr*$dk3*$x5;

                        //Suku perubahan Bobot unit tersembunyi #4
                        $d_net4 = $dk0*$w4;
                        $dk4 = ($d_net4*$z4)*(1-$z4);
                        //perubahan bias z1(v01)
                        $v04_b = $lr*$dk4;
                        //suku perubahan bobot z1(v11,v21)
                        $v14_b = $lr*$dk4*$x1;
                        $v24_b = $lr*$dk4*$x2;
                        $v34_b = $lr*$dk4*$x3;
                        $v44_b = $lr*$dk4*$x4;
                        $v54_b = $lr*$dk4*$x5;

                        //Suku perubahan Bobot unit tersembunyi #5
                        $d_net5 = $dk0*$w5;
                        $dk5 = ($d_net5*$z5)*(1-$z5);
                        //perubahan bias z1(v01)
                        $v05_b = $lr*$dk5;
                        //suku perubahan bobot z1(v11,v21)
                        $v15_b = $lr*$dk5*$x1;
                        $v25_b = $lr*$dk5*$x2;
                        $v35_b = $lr*$dk5*$x3;
                        $v45_b = $lr*$dk5*$x4;
                        $v55_b = $lr*$dk5*$x5;

                        $v11_s = $v11;
                        $v12_s = $v12;
                        $v13_s = $v13;
                        $v14_s = $v14;
                        $v15_s = $v15;

                        $v21_s = $v21;
                        $v22_s = $v22;
                        $v23_s = $v23;
                        $v24_s = $v24;
                        $v25_s = $v25;

                        $v31_s = $v31;
                        $v32_s = $v32;
                        $v33_s = $v33;
                        $v34_s = $v34;
                        $v35_s = $v35;

                        $v41_s = $v41;
                        $v42_s = $v42;
                        $v43_s = $v43;
                        $v44_s = $v44;
                        $v45_s = $v45;

                        $v51_s = $v51;
                        $v52_s = $v52;
                        $v53_s = $v53;
                        $v54_s = $v54;
                        $v55_s = $v55;

                        //BIAS AKHIR Iterasi Pertama Input ke Hidden
                        $v01_s = $v01;
                        $v02_s = $v02;
                        $v03_s = $v03;
                        $v04_s = $v04;
                        $v05_s = $v05;

                        //BOBOT AKHIR Iterasi Pertama Hiden ke Output
                        $w1_s = $w1;
                        $w2_s = $w2;
                        $w3_s = $w3;
                        $w4_s = $w4;
                        $w5_s = $w5;

                        //BIAS AKHIR Iterasi Pertama Hiden ke Output
                        $w0_s = $w0;
                        //BOBOT AKHIR Iterasi Pertama Input ke Hidden
                        
                        $v11_a = $v11_s+$v11_b;
                        $v12_a = $v12_s+$v12_b;
                        $v13_a = $v13_s+$v13_b;
                        $v14_a = $v14_s+$v14_b;
                        $v15_a = $v15_s+$v15_b;

                        $v21_a = $v21_s+$v21_b;
                        $v22_a = $v22_s+$v22_b;
                        $v23_a = $v23_s+$v23_b;
                        $v24_a = $v24_s+$v24_b;
                        $v25_a = $v25_s+$v25_b;

                        $v31_a = $v31_s+$v31_b;
                        $v32_a = $v32_s+$v32_b;
                        $v33_a = $v33_s+$v33_b;
                        $v34_a = $v34_s+$v34_b;
                        $v35_a = $v35_s+$v35_b;

                        $v41_a = $v41_s+$v41_b;
                        $v42_a = $v42_s+$v42_b;
                        $v43_a = $v43_s+$v43_b;
                        $v44_a = $v44_s+$v44_b;
                        $v45_a = $v45_s+$v45_b;

                        $v51_a = $v51_s+$v51_b;
                        $v52_a = $v52_s+$v52_b;
                        $v53_a = $v53_s+$v53_b;
                        $v54_a = $v54_s+$v54_b;
                        $v55_a = $v55_s+$v55_b;

                        //BIAS AKHIR Iterasi Pertama Input ke Hidden
                        $v01_a = $v01_s+$v01_b;
                        $v02_a = $v02_s+$v02_b;
                        $v03_a = $v03_s+$v03_b;
                        $v04_a = $v04_s+$v04_b;
                        $v05_a = $v05_s+$v05_b;

                        //BOBOT AKHIR Iterasi Pertama Hiden ke Output
                        $w1_a = $w1_s+$w1_b;
                        $w2_a = $w2_s+$w2_b;
                        $w3_a = $w3_s+$w3_b;
                        $w4_a = $w4_s+$w4_b;
                        $w5_a = $w5_s+$w5_b;

                        //BIAS AKHIR Iterasi Pertama Hiden ke Output
                        $w0_a = $w0_s+$w0_b;

                        $v11 = $v11_a+$v11_b+($mc*($v11_a-$v11_s));
                        $v12 = $v12_a+$v12_b+($mc*($v12_a-$v12_s));
                        $v13 = $v13_a+$v13_b+($mc*($v13_a-$v13_s));
                        $v14 = $v14_a+$v14_b+($mc*($v14_a-$v14_s));
                        $v15 = $v15_a+$v15_b+($mc*($v15_a-$v15_s));

                        $v21 = $v21_a+$v21_b+($mc*($v21_a-$v21_s));
                        $v22 = $v22_a+$v22_b+($mc*($v22_a-$v22_s));
                        $v23 = $v23_a+$v23_b+($mc*($v23_a-$v23_s));
                        $v24 = $v24_a+$v24_b+($mc*($v24_a-$v24_s));
                        $v25 = $v25_a+$v25_b+($mc*($v25_a-$v25_s));

                        $v31 = $v31_a+$v31_b+($mc*($v31_a-$v31_s));
                        $v32 = $v32_a+$v32_b+($mc*($v32_a-$v32_s));
                        $v33 = $v33_a+$v33_b+($mc*($v33_a-$v33_s));
                        $v34 = $v34_a+$v34_b+($mc*($v34_a-$v34_s));
                        $v35 = $v35_a+$v35_b+($mc*($v35_a-$v35_s));

                        $v41 = $v41_a+$v41_b+($mc*($v41_a-$v41_s));
                        $v42 = $v42_a+$v42_b+($mc*($v42_a-$v42_s));
                        $v43 = $v43_a+$v43_b+($mc*($v43_a-$v43_s));
                        $v44 = $v44_a+$v44_b+($mc*($v44_a-$v44_s));
                        $v45 = $v45_a+$v45_b+($mc*($v45_a-$v45_s));

                        $v51 = $v51_a+$v51_b+($mc*($v51_a-$v51_s));
                        $v52 = $v52_a+$v52_b+($mc*($v52_a-$v52_s));
                        $v53 = $v53_a+$v53_b+($mc*($v53_a-$v53_s));
                        $v54 = $v54_a+$v54_b+($mc*($v54_a-$v54_s));
                        $v55 = $v55_a+$v55_b+($mc*($v55_a-$v55_s));

                        //BIAS AKHIR Iterasi Pertama Input ke Hidden
                        $v01 = $v01_a+$v01_b+($mc*($v01_a-$v01_s));
                        $v02 = $v02_a+$v02_b+($mc*($v02_a-$v02_s));
                        $v03 = $v03_a+$v03_b+($mc*($v03_a-$v03_s));
                        $v04 = $v04_a+$v04_b+($mc*($v04_a-$v04_s));
                        $v05 = $v05_a+$v05_b+($mc*($v05_a-$v05_s));

                        //BOBOT AKHIR Iterasi Pertama Hiden ke Output
                        $w1 = $w1_a+$w1_b+($mc*($w1_a-$w1_s));
                        $w2 = $w2_a+$w2_b+($mc*($w2_a-$w2_s));
                        $w3 = $w3_a+$w3_b+($mc*($w3_a-$w3_s));
                        $w4 = $w4_a+$w4_b+($mc*($w4_a-$w4_s));
                        $w5 = $w5_a+$w5_b+($mc*($w5_a-$w5_s));

                        //BIAS AKHIR Iterasi Pertama Hiden ke Output
                        $w0 = $w0_a+$w0_b+($mc*($w0_a-$w0_s));
                        $d[$j]=$y;

                        }   
                    
                        $MSE_B = $k_e/$leng_data;
                        $iterasi = $i;
                        if($i<=900){
                                $array[$i]=$MSE_B;
                        }else if($i>900 && $i<=1800){
                                $array1[$i]=$MSE_B;
                        }else if($i>1800 && $i<=2700){
                                $array2[$i]=$MSE_B;
                        }else if($i>2700 && $i<=3600){
                                $array3[$i]=$MSE_B;
                        }else if($i>3600 && $i<=4500){
                                $array4[$i]=$MSE_B;
                        }else if($i>4500 && $i<=5400){
                                $array5[$i]=$MSE_B;
                        }else if($i>5400 && $i<=6300){
                                $array6[$i]=$MSE_B;
                        }else if($i>6300 && $i<=7200){
                                $array7[$i]=$MSE_B;
                        }else if($i>7200 && $i<=8100){
                                $array8[$i]=$MSE_B;
                        }else if($i>8100 && $i<=9000){
                                $array9[$i]=$MSE_B;
                        }else if($i>9000 && $i<=9900){
                                $array10[$i]=$MSE_B;
                        }

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


                }
            }
        }
    }
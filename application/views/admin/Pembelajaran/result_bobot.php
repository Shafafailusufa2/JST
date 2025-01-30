<!--
Perhitungan inisialisasi bobot nguyen widraw dalam program yang ditampilkan dalam format HTML
data dilempar dari localhost/JST/pembelajaran/analisis_inisial
-->
<?
        //Nilai bobot dan bias awal
        $v11 = $bobot[0]['x_1'];
        $v12 = $bobot[1]['x_1'];
        $v13 = $bobot[2]['x_1'];
        $v14 = $bobot[3]['x_1'];
        $v15 = $bobot[4]['x_1'];

        $v21 = $bobot[0]['x_2'];
        $v22 = $bobot[1]['x_2'];
        $v23 = $bobot[2]['x_2'];
        $v24 = $bobot[3]['x_2'];
        $v25 = $bobot[4]['x_2'];

        $v31 = $bobot[0]['x_3'];
        $v32 = $bobot[1]['x_3'];
        $v33 = $bobot[2]['x_3'];
        $v34 = $bobot[3]['x_3'];
        $v35 = $bobot[4]['x_3'];

        $v41 = $bobot[0]['x_4'];
        $v42 = $bobot[1]['x_4'];
        $v43 = $bobot[2]['x_4'];
        $v44 = $bobot[3]['x_4'];
        $v45 = $bobot[4]['x_4'];

        $v51 = $bobot[0]['x_5'];
        $v52 = $bobot[1]['x_5'];
        $v53 = $bobot[2]['x_5'];
        $v54 = $bobot[3]['x_5'];
        $v55 = $bobot[4]['x_5'];

        //Bias unit tersembunyi awal
        $v01 = $bobot[0]['b_1'];
        $v02 = $bobot[1]['b_1'];
        $v03 = $bobot[2]['b_1'];
        $v04 = $bobot[3]['b_1'];
        $v05 = $bobot[4]['b_1']; 

        //parameter nguyen widraw
        $n = 5;
        $p = 5;
        $fs = 0.7*(pow($p,(1/$n))); 

        //Nilai bias hasil inisialisasi bobot nguyen widraw
        $v01_baru = $fs/-2;
        $v02_baru = $fs/-2.5;
        $v03_baru = $fs/3;
        $v04_baru = $fs/-1.5;
        $v05_baru = $fs/1;

        //Menentukan norma faktor setiap unit layat tersembunyi
        $v1 = sqrt(pow($v11,2)+pow($v21,2)+pow($v31,2)+pow($v41,2)+pow($v51,2));
        $v2 = sqrt(pow($v12,2)+pow($v22,2)+pow($v32,2)+pow($v42,2)+pow($v52,2));
        $v3 = sqrt(pow($v13,2)+pow($v23,2)+pow($v33,2)+pow($v43,2)+pow($v53,2));
        $v4 = sqrt(pow($v14,2)+pow($v24,2)+pow($v34,2)+pow($v44,2)+pow($v54,2));
        $v5 = sqrt(pow($v15,2)+pow($v25,2)+pow($v35,2)+pow($v45,2)+pow($v55,2));

        //Perhitungan bobot layar tersembunyi baru hasil inisialisasi bobot nguyen widraw
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
        $v55_baru = ($fs*$v55)/$v5; ?>

        <!-- Tmpilan HTML proses peritungan inisialisasi bobot -->
        <b><p>Arsitektur</p></b>
        <table>
          <tr>
            <td>Jumlah Masukan (<i>Input Layer</i>) n</td>
            <td>:</td>
            <td>5 unit</td>
          </tr>

          <tr>
            <td>Jumlah Lapisan (<i>Hidden Layer</i>) p</td>
            <td>:</td>
            <td>5 unit</td>
          </tr>

          <tr>
            <td>Jumlah  (<i>Output Layer</i>)</td>
            <td>:</td>
            <td>1 unit</td>
          </tr>

          <tr>
            <td>Faktor Skala</td>
            <td>:</td>
            <td>0.7 * ( (p) ^ 1 / n ) = <? echo '<b> 0.7 * ('.$p.') ^ 1 / '.$n.' ) = '.$fs.'</b>' ?></td>
          </tr>
        </table>
        <br>
        <p>Nilai bias adalah bilangan antara <? echo '<b> -'.$fs.'</b> sampai <b>'.$fs.' </b>'?></p>
        <table>
          <tr>
            <td>v01 = <? echo $v01_baru ?></td>
          </tr>
          <tr>
            <td>v02 = <? echo $v02_baru ?></td>
          </tr>
          <tr>
            <td>v03 = <? echo $v03_baru ?></td>
          </tr>
          <tr>
            <td>v04 = <? echo $v04_baru ?></td>
          </tr>
          <tr>
            <td>v05 = <? echo $v05_baru ?></td>
          </tr>
        </table>
        <br>

        <b><p>Hitung : ||vj||</p></b>
        <b><p>||vj|| = akar(sum(vij^2))</p></b>
        <table>
          <tr>
            <td>v1 = <? echo 'akar( ('.$v11.' ^ 2 ) + ('.$v21.' ^ 2 ) + ('.$v31.' ^ 2 ) + ('.$v41.' ^ 2 ) + ('.$v51.' ^ 2 ) = <b>'.$v1.'</b>' ?></td>
          </tr>
          <tr>
            <td>v2 = <? echo 'akar( ('.$v12.' ^ 2 ) + ('.$v22.' ^ 2 ) + ('.$v32.' ^ 2 ) + ('.$v42.' ^ 2 ) + ('.$v52.' ^ 2 )  = <b>'.$v2.'</b>' ?></td>
          </tr>
          <tr>
            <td>v3 = <? echo 'akar( ('.$v13.' ^ 2 ) + ('.$v23.' ^ 2 ) + ('.$v33.' ^ 2 ) + ('.$v43.' ^ 2 ) + ('.$v53.' ^ 2 )  = <b>'.$v3.'</b>' ?></td>
          </tr>
          <tr>
            <td>v4 = <? echo 'akar( ('.$v14.' ^ 2 ) + ('.$v24.' ^ 2 ) + ('.$v34.' ^ 2 ) + ('.$v44.' ^ 2 ) + ('.$v54.' ^ 2 )  = <b>'.$v4.'</b>' ?></td>
          </tr>
          <tr>
            <td>v5 = <? echo 'akar( ('.$v15.' ^ 2 ) + ('.$v25.' ^ 2 ) + ('.$v35.' ^ 2 ) + ('.$v45.' ^ 2 ) + ('.$v55.' ^ 2 )  = <b>'.$v5.'</b>' ?></td>
          </tr>
        </table>
        <br>

        <b><p>Bobot baru setelah inisialisasi</p></b>
        <b><p>vij_baru = ( Faktor Skala * vij ) / vj</p></b>
        <table>
          <tr>
            <td>v11 = <? echo '( '.$fs.' * '.$v11.' ) / ( '.$v1.' ) = <b>'.$v11_baru.'</b>' ?></td>
          </tr>
          <tr>
            <td>v21 = <? echo '( '.$fs.' * '.$v21.' ) / ( '.$v1.' ) = <b>'.$v21_baru.'</b>' ?></td>
          </tr>
          <tr>
            <td>v31 = <? echo '( '.$fs.' * '.$v31.' ) / ( '.$v1.' ) = <b>'.$v31_baru.'</b>' ?></td>
          </tr>
          <tr>
            <td>v41 = <? echo '( '.$fs.' * '.$v41.' ) / ( '.$v1.' ) = <b>'.$v41_baru.'</b>' ?></td>
          </tr>
          <tr>
            <td>v51 = <? echo '( '.$fs.' * '.$v51.' ) / ( '.$v1.' ) = <b>'.$v51_baru.'</b>' ?></td>
          </tr>
        </table>
        <br>
        <table>
          <tr>
            <td>v12 = <? echo '( '.$fs.' * '.$v12.' ) / ( '.$v2.' ) = <b>'.$v12_baru.'</b>' ?></td>
          </tr>
          <tr>
            <td>v22 = <? echo '( '.$fs.' * '.$v22.' ) / ( '.$v2.' ) = <b>'.$v22_baru.'</b>' ?></td>
          </tr>
          <tr>
            <td>v32 = <? echo '( '.$fs.' * '.$v32.' ) / ( '.$v2.' ) = <b>'.$v32_baru.'</b>' ?></td>
          </tr>
          <tr>
            <td>v42 = <? echo '( '.$fs.' * '.$v42.' ) / ( '.$v2.' ) = <b>'.$v42_baru.'</b>' ?></td>
          </tr>
          <tr>
            <td>v52 = <? echo '( '.$fs.' * '.$v52.' ) / ( '.$v2.' ) = <b>'.$v52_baru.'</b>' ?></td>
          </tr>
        </table>
        <br>

        <table>
          <tr>
            <td>v13 = <? echo '( '.$fs.' * '.$v13.' ) / ( '.$v3.' ) = <b>'.$v13_baru.'</b>' ?></td>
          </tr>
          <tr>
            <td>v23 = <? echo '( '.$fs.' * '.$v23.' ) / ( '.$v3.' ) = <b>'.$v23_baru.'</b>' ?></td>
          </tr>
          <tr>
            <td>v33 = <? echo '( '.$fs.' * '.$v33.' ) / ( '.$v3.' ) = <b>'.$v33_baru.'</b>' ?></td>
          </tr>
          <tr>
            <td>v43 = <? echo '( '.$fs.' * '.$v43.' ) / ( '.$v3.' ) = <b>'.$v43_baru.'</b>' ?></td>
          </tr>
          <tr>
            <td>v53 = <? echo '( '.$fs.' * '.$v53.' ) / ( '.$v3.' ) = <b>'.$v53_baru.'</b>' ?></td>
          </tr>
        </table>
        <br>

        <table>
          <tr>
            <td>v14 = <? echo '( '.$fs.' * '.$v14.' ) / ( '.$v4.' ) = <b>'.$v14_baru.'</b>' ?></td>
          </tr>
          <tr>
            <td>v24 = <? echo '( '.$fs.' * '.$v24.' ) / ( '.$v4.' ) = <b>'.$v24_baru.'</b>' ?></td>
          </tr>
          <tr>
            <td>v34 = <? echo '( '.$fs.' * '.$v34.' ) / ( '.$v4.' ) = <b>'.$v34_baru.'</b>' ?></td>
          </tr>
          <tr>
            <td>v44 = <? echo '( '.$fs.' * '.$v44.' ) / ( '.$v4.' ) = <b>'.$v44_baru.'</b>' ?></td>
          </tr>
          <tr>
            <td>v54 = <? echo '( '.$fs.' * '.$v54.' ) / ( '.$v4.' ) = <b>'.$v54_baru.'</b>' ?></td>
          </tr>
        </table>
        <br>
        <table>
          <tr>
            <td>v15 = <? echo '( '.$fs.' * '.$v15.' ) / ( '.$v5.' ) = <b>'.$v15_baru.'</b>' ?></td>
          </tr>
          <tr>
            <td>v25 = <? echo '( '.$fs.' * '.$v25.' ) / ( '.$v5.' ) = <b>'.$v25_baru.'</b>' ?></td>
          </tr>
          <tr>
            <td>v35 = <? echo '( '.$fs.' * '.$v35.' ) / ( '.$v5.' ) = <b>'.$v35_baru.'</b>' ?></td>
          </tr>
          <tr>
            <td>v45 = <? echo '( '.$fs.' * '.$v45.' ) / ( '.$v5.' ) = <b>'.$v45_baru.'</b>' ?></td>
          </tr>
          <tr>
            <td>v55 = <? echo '( '.$fs.' * '.$v55.' ) / ( '.$v5.' ) = <b>'.$v55_baru.'</b>' ?></td>
          </tr>
        </table>
        <br>

        <!-- CSS menu form result_bobot (form yang digunakan untuk menampilkan hasil perhitungan insialisasi bobot-->
        <style type="text/css">
          b{
            color: blue;
          }
          p{
            color: black;
          }
        </style>
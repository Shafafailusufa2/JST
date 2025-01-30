<script type="text/javascript">
  //Fungsi untuk menampilkan tombol detail setelah proses perhitungan pembelajaran pada MSE yang dipilih selesai
	$('.detail').show();
</script>

<!--
Perhitungan propagasi maju,mundur dan update bobot yang ditampilkan dalam format tampilan HTML
berfungsi untuk menganalisa bagaimana perhitungan JST dalam program ini berjalan
data dilempar dari localhost/JST/pembelajaran/analisis
-->
<?
//Nilai bobot dan bias awal
$v11 = $bobot_hidden[0]['x1'];
$v12 = $bobot_hidden[1]['x1'];
$v13 = $bobot_hidden[2]['x1'];
$v14 = $bobot_hidden[3]['x1'];
$v15 = $bobot_hidden[4]['x1'];

$v21 = $bobot_hidden[0]['x2'];
$v22 = $bobot_hidden[1]['x2'];
$v23 = $bobot_hidden[2]['x2'];
$v24 = $bobot_hidden[3]['x2'];
$v25 = $bobot_hidden[4]['x2'];

$v31 = $bobot_hidden[0]['x3'];
$v32 = $bobot_hidden[1]['x3'];
$v33 = $bobot_hidden[2]['x3'];
$v34 = $bobot_hidden[3]['x3'];
$v35 = $bobot_hidden[4]['x3'];

$v41 = $bobot_hidden[0]['x4'];
$v42 = $bobot_hidden[1]['x4'];
$v43 = $bobot_hidden[2]['x4'];
$v44 = $bobot_hidden[3]['x4'];
$v45 = $bobot_hidden[4]['x4'];

$v51 = $bobot_hidden[0]['x5'];
$v52 = $bobot_hidden[1]['x5'];
$v53 = $bobot_hidden[2]['x5'];
$v54 = $bobot_hidden[3]['x5'];
$v55 = $bobot_hidden[4]['x5'];

$w1 = $bobot_output[0]['w_1'];
$w2 = $bobot_output[0]['w_2'];
$w3 = $bobot_output[0]['w_3'];
$w4 = $bobot_output[0]['w_4'];
$w5 = $bobot_output[0]['w_5'];

$v01 = $bobot_b1[0]['b_1'];
$v02 = $bobot_b1[1]['b_1'];
$v03 = $bobot_b1[2]['b_1'];
$v04 = $bobot_b1[3]['b_1'];
$v05 = $bobot_b1[4]['b_1'];

$w0 = $bobot_b2[0]['b_2'];
$lr_iw=$result[0]['lr_iw'];
$lr_ib=$result[0]['lr_ib'];
$lr_lw=$result[0]['lr_lw'];
$lr_lb=$result[0]['lr_lb'];

for($i=1;$i<$epoch;$i++){
	$k_e=0;
    foreach ($input as $key => $value) {
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

          //Pengaktifan unit keluaran
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
      }
    }
    $i=$epoch;
?>

<? if($i==$epoch){?>
	<p><? echo 'Epoch ke - '.$epoch ?></p>
	<?$k_e = 0; $no=1; foreach ($input as $key => $value) {

		 $x1=$value['data1'];
         $x2=$value['data2'];
         $x3=$value['data3'];
         $x4=$value['data4'];
         $x5=$value['data5'];
         $t=$value['data6'];

		?>
	<div id="i_1">
	<br>
	<p>Data ke - <?  echo $no ?></p>
	<? $no++; ?>
	<p>Input & Bobot Awal :</p>
	<table>
		<tr>
			<td id="name">x1</td>
			<td>:</td>
			<td><? echo $value['data1'] ?></td>
			<td id="name">v11</td>
			<td>:</td>
			<td><? echo $v11?></td>
			<td id="name">v21</td>
			<td>:</td>
			<td ><? echo $v21?></td>
			<td id="name">v31</td>
			<td>:</td>
			<td><? echo $v31?></td>
			<td id="name">v41</td>
			<td>:</td>
			<td><? echo $v41?></td>
			<td id="name">v51</td>
			<td>:</td>
			<td><? echo $v51?></td>
			<td id="name">w1</td>
			<td>:</td>
			<td><? echo $w1?></td>
			<td id="name">v01</td>
			<td>:</td>
			<td><? echo $v01?></td>
		</tr>
		<tr>
			<td id="name">x2</td>
			<td>:</td>
			<td><? echo $value['data2'] ?></td>
			<td id="name">v12</td>
			<td>:</td>
			<td><? echo $v12?></td>
			<td id="name">v22</td>
			<td>:</td>
			<td><? echo $v22?></td>
			<td id="name">v32</td>
			<td>:</td>
			<td><? echo $v32?></td>
			<td id="name">v42</td>
			<td>:</td>
			<td><? echo $v42?></td>
			<td id="name">v52</td>
			<td>:</td>
			<td><? echo $v52?></td>
			<td id="name">w2</td>
			<td>:</td>
			<td><? echo $w2?></td>
			<td id="name">v02</td>
			<td>:</td>
			<td><? echo $v02?></td>
		</tr>
		<tr>
			<td id="name">x3</td>
			<td>:</td>
			<td><? echo $value['data3'] ?></td>
			<td id="name">v13</td>
			<td>:</td>
			<td><? echo $v13?></td>
			<td id="name">v23</td>
			<td>:</td>
			<td><? echo $v23?></td>
			<td id="name">v33</td>
			<td>:</td>
			<td><? echo $v33?></td>
			<td id="name">v43</td>
			<td>:</td>
			<td><? echo $v43?></td>
			<td id="name">v53</td>
			<td>:</td>
			<td><? echo $v53?></td>
			<td id="name">w3</td>
			<td>:</td>
			<td><? echo $w3?></td>
			<td id="name">v03</td>
			<td>:</td>
			<td><? echo $v03?></td>
		</tr>
		<tr>
			<td id="name">x4</td>
			<td>:</td>
			<td><? echo $value['data4'] ?></td>
			<td id="name">v14</td>
			<td>:</td>
			<td><? echo $v14?></td>
			<td id="name">v24</td>
			<td>:</td>
			<td><? echo $v24?></td>
			<td id="name">v34</td>
			<td>:</td>
			<td><? echo $v34?></td>
			<td id="name">v44</td>
			<td>:</td>
			<td><? echo $v44?></td>
			<td id="name">v54</td>
			<td>:</td>
			<td><? echo $v54?></td>
			<td id="name">w4</td>
			<td>:</td>
			<td><? echo $w4?></td>
			<td id="name">v04</td>
			<td>:</td>
			<td><? echo $v04?></td>
		</tr>
		<tr>
			<td id="name">x5</td>
			<td>:</td>
			<td><? echo $value['data5'] ?></td>
			<td id="name">v15</td>
			<td>:</td>
			<td><? echo $v15?></td>
			<td id="name">v25</td>
			<td>:</td>
			<td><? echo $v25?></td>
			<td id="name">v35</td>
			<td>:</td>
			<td><? echo $v35?></td>
			<td id="name">v45</td>
			<td>:</td>
			<td><? echo $v45?></td>
			<td id="name">v55</td>
			<td>:</td>
			<td><? echo $v55?></td>
			<td id="name">w5</td>
			<td>:</td>
			<td><? echo $w5?></td>
			<td id="name">v05</td>
			<td>:</td>
			<td><? echo $v05?></td>
		</tr>
		<tr>
    <td id="name">w0</td>
      <td>:</td>
      <td><? echo $w0?></td>
    </tr>
		</table>
    <br>
    <p>TARGET : <? echo $value['data6'] ?></p>
		<br>
		<?  
		    $z_net1 = $v01+($x1*$v11)+($x2*$v21)+($x3*$v31)+($x4*$v41)+($x5*$v51);
        $z_net2 = $v02+($x1*$v12)+($x2*$v22)+($x3*$v32)+($x4*$v42)+($x5*$v52);
        $z_net3 = $v03+($x1*$v13)+($x2*$v23)+($x3*$v33)+($x4*$v43)+($x5*$v53);
        $z_net4 = $v04+($x1*$v14)+($x2*$v24)+($x3*$v34)+($x4*$v44)+($x5*$v54);
        $z_net5 = $v05+($x1*$v15)+($x2*$v25)+($x3*$v35)+($x4*$v45)+($x5*$v55); ?>
    <div class="maju">
        <p>Perkalian Unit Tersembunyi</p>
        <p><? echo 'z_net(j) = v0(j) + sum(( x(i) * v(i)(j) ));' ?></p>
		<table>
		<tr>
			<td><? echo 'z_net1 = '.$v01.' + ( '.$x1.' * '.$v11.' ) + ( '.$x2.' * '.$v21.' ) + ( '.$x3.' * '.$v31.' ) + ( '.$x4.' * '.$v41.' ) + ( '.$x5.' * '.$v51.' ) = <b>'.$z_net1.'</b>' ?></td>
		</tr>
		<tr>
			<td><? echo 'z_net2 = '.$v02.' + ( '.$x1.' * '.$v12.' ) + ( '.$x2.' * '.$v22.' ) + ( '.$x3.' * '.$v32.' ) + ( '.$x4.' * '.$v42.' ) + ( '.$x5.' * '.$v52.' ) = <b>'.$z_net2.'</b>' ?></td>
		</tr>
		</tr>
			<td><? echo 'z_net3 = '.$v03.' + ( '.$x1.' * '.$v13.' ) + ( '.$x2.' * '.$v23.' ) + ( '.$x3.' * '.$v33.' ) + ( '.$x4.' * '.$v43.' ) + ( '.$x5.' * '.$v53.' ) = <b>'.$z_net3.'</b>' ?></td>
		</tr>
		<tr>
			<td><? echo 'z_net4 = '.$v04.' + ( '.$x1.' * '.$v14.' ) + ( '.$x2.' * '.$v24.' ) + ( '.$x3.' * '.$v34.' ) + ( ' .$x4.' * '.$v44.' ) + ( '.$x5.' * '.$v54.' ) = <b>'.$z_net4.'</b>' ?></td>
		</tr>
		<tr>
			<td><? echo 'z_net5 = '.$v05.' + ( '.$x1.' * '.$v15.' ) + ( '.$x2.' * '.$v25.' ) + ( '.$x3.' * '.$v35.' ) + ( '.$x4.' * '.$v45.' ) + ( '.$x5.' * '.$v55.' ) = <b>'.$z_net5.'</b>' ?></td>
		</tr>
		</table>
		<br>
		<? 
  $z1=1/(1+(pow(2.71828183,-$z_net1)));
  $z2=1/(1+(pow(2.71828183,-$z_net2)));
  $z3=1/(1+(pow(2.71828183,-$z_net3)));
  $z4=1/(1+(pow(2.71828183,-$z_net4)));
  $z5=1/(1+(pow(2.71828183,-$z_net5)));?>
  <p>Penagktifan Unit Tersembunyi dengan Aktivasi SIgmoid Biner</p>
  <p><? echo 'z(j) = 1 / ( 1 + e^-z_net(j) )' ?></p>
  <p><? echo 'e = 2.71828183' ?></p>
  <table>
  	<tr>
  		<td><? echo 'z1 = 1 / ( 1 + e ^ '.-$z_net1.' ) = <b>'.$z1.'</b>' ?></td>
  	</tr>
  	<tr>
  		<td><? echo 'z2 = 1 / ( 1 + e ^ '.-$z_net2.' ) = <b>'.$z2.'</b>' ?></td>
  	</tr>
  	<tr>
  		<td><? echo 'z3 = 1 / ( 1 + e ^ '.-$z_net3.' ) = <b>'.$z3.'</b>' ?></td>
  	</tr>
  	<tr>
  		<td><? echo 'z4 = 1 / ( 1 + e ^ '.-$z_net4.' ) = <b>'.$z4.'</b>' ?></td>
  	</tr>
  	<tr>
  		<td><? echo 'z5 = 1 / ( 1 + e ^ '.-$z_net5.' ) = <b>'.$z5.'</b>' ?></td>
  	</tr>
  </table>
   <br>
  <? $y_net = $w0+($z1*$w1)+($z2*$w2)+($z3*$w3)+($z4*$w4)+($z5*$w5); ?>
  <p>Perkalian Unit Keluaran</p>
  <p><? echo 'y_net(k) = w0 + sum(( z(j) * w(i)(j) ))' ?></p>
  <table>
  	<tr>
  		<td><? echo 'y_net = '.$w0.' + ( '.$z1.' * '.$w1.' ) + ('.$z2.' * '.$w2.' ) +  ('.$z3.' * '.$w3.' ) + ('.$z4.' * '.$w4.' ) + ('.$z5.' * '.$w5.' ) = <b>'.$y_net.'</b>' ?></td>
  	</tr>
  </table>
  <br>
  <? $y=$y_net;
     $Error = $t-$y;
   ?>
  <p>Penaktifan Unit Keluaran dengan Fungsi Identitas</p>
  <p><? echo 'y = y_net' ?></p>
  <table>
  	<tr>
  		<td><? echo 'y = <b>'.$y_net.'</b>' ?></td>
  	</tr>
  </table>
  </div>
  <br>
  <div class="mundur">
  <p>Faktor Error</p>
  <p><? echo 'Error = t - y ' ?></p>
  <table>
  	<tr>
  		<td><? echo 'Error = '.$t.' - '.$y.' = <b>'.$Error.'</b>' ?></td>
  	</tr>
  </table>
  <br>
  <p>Jumlah Kuadrat Error</p>
  <p><? echo 'Error = Error + ( Error * Error ) ' ?></p>
  <table>
  	<tr>
  		<td><? echo 'E = '.$k_e.' + ( '.$Error.' * '.$Error.' ) = <b>' ?><? echo $k_e = $k_e+($Error*$Error).'</b>'; ?></td>
  	</tr>
  </table>
  <br>
  <?
  //Faktor kesalahan pertama
   	$dk0 = $Error;
  //Perubahan Bobot unit keluaran
    $w0_b = $lr_lb*$dk0;
    $w1_b = $lr_lw*$dk0*$z1;
    $w2_b = $lr_lw*$dk0*$z2;
    $w3_b = $lr_lw*$dk0*$z3;
    $w4_b = $lr_lw*$dk0*$z4;
    $w5_b = $lr_lw*$dk0*$z5; ?>
  <p>Suku perubahan Bobot & Bias Unit Keluaran</p>
  <p><? echo 'Bias : w0_baru = lr * Error' ?></p>
  <p><? echo 'Bobot : w(i)_baru = lr * Error * z(j)' ?></p>
  <table>
  	<tr>
  		<td>Faktor Kesalahan Unit Keluaran : <? echo 'dk0 = '.$dk0.' (Error awal unit keluaran)'?></td>
  	</tr>
  	<tr>
  		<td>w0_baru : <? echo $lr_lb.' * '.$dk0.' = <b>'.$w0_b.'</b>' ?></td>
  	</tr>
  	<tr>
  		<td>w1_baru : <? echo $lr_lw.' * '.$dk0.' * '.$z1.' = <b>'.$w1_b.'</b>' ?></td>
  	</tr>
  	<tr>
  		<td>w2_baru : <? echo $lr_lw.' * '.$dk0.' * '.$z2.' = <b>'.$w2_b.'</b>' ?></td>
  	</tr>
  	<tr>
  		<td>w3_baru : <? echo $lr_lw.' * '.$dk0.' * '.$z3.' = <b>'.$w3_b.'</b>' ?></td>
  	</tr>
  	<tr>
  		<td>w4_baru : <? echo $lr_lw.' * '.$dk0.' * '.$z4.' = <b>'.$w4_b.'</b>' ?></td>
  	</tr>
  	<tr>
  		<td>w5_baru : <? echo $lr_lw.' * '.$dk0.' * '.$z5.' = <b>'.$w5_b.'</b>' ?></td>
  	</tr>
  </table>
  <br>
  <? $d_net1 = $dk0*$w1;
  	 $d_net2 = $dk0*$w2;
  	 $d_net3 = $dk0*$w3; 
  	 $d_net4 = $dk0*$w4;
  	 $d_net5 = $dk0*$w5;
  ?>
  <p>Perkalian Kesalahan Unit Tersembunyi</p>
  <p><? echo 'd_net(j) = dk0 * w(i)' ?></p>
  <table>
  	<tr>
  		<td>
  			<? echo 'd_net1 (z1) = '.$dk0.' * '.$w1.' = <b>'.$d_net1.'</b>' ?>
  		</td>
  	</tr>
  	<tr>
  		<td>
  			<? echo 'd_net2 (z2) = '.$dk0.' * '.$w2.' = <b>'.$d_net2.'</b>' ?>
  		</td>
  	</tr>
  	<tr>
  		<td>
  			<? echo 'd_net3 (z3) = '.$dk0.' * '.$w3.' = <b>'.$d_net3.'</b>' ?>
  		</td>
  	</tr>
  	<tr>
  		<td>
  			<? echo 'd_net4 (z4) = '.$dk0.' * '.$w4.' = <b>'.$d_net4.'</b>' ?>
  		</td>
  	</tr>
  	<tr>
  		<td>
  			<? echo 'd_net5 (z5) = '.$dk0.' * '.$w5.' = <b>'.$d_net5.'</b>' ?>
  		</td>
  	</tr>
  </table>
  <br>
  <?
  	$dj1 = ($d_net1*$z1)*(1-$z1);
  	$dj2 = ($d_net2*$z2)*(1-$z2);
  	$dj3 = ($d_net3*$z3)*(1-$z3);
  	$dj4 = ($d_net4*$z4)*(1-$z4);
  	$dj5 = ($d_net5*$z5)*(1-$z5);
   ?>
   <p>Faktor Kesalahan Unit tersembunyi (Rumus : Turunan Fungsi Aktivasi Sigmoid Biner)</p>
   <p><? echo 'dj(i) = ( d_net(j) * z(j) ) * ( 1 - z(j) )' ?></p>
   <table>
   	<tr>
   		<td>
   			<? echo 'dj1 = ('.$d_net1.' * '.$z1.' ) * ( 1 - '.$z1.' ) = <b>'.$dj1.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'dj2 = ('.$d_net2.' * '.$z2.' ) * ( 1 - '.$z2.' ) = <b>'.$dj2.'</b>' ?>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'dj3 = ('.$d_net3.' * '.$z3.' ) * ( 1 - '.$z3.' ) = <b>'.$dj3.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'dj4 = ('.$d_net4.' * '.$z4.' ) * ( 1 - '.$z4.' ) = <b>'.$dj4.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'dj5 = ('.$d_net5.' * '.$z5.' ) * ( 1 - '.$z5.' ) = <b>'.$dj5.'</b>' ?>
   		</td>
   	</tr>
   </table>
   <br>
   <? 
      //perubahan bias z1(v01)
      $v01_b = $lr_ib*$dj1;
      //suku perubahan bobot z1(v11,v21)
      $v11_b = $lr_iw*$dj1*$x1;
      $v21_b = $lr_iw*$dj1*$x2;
      $v31_b = $lr_iw*$dj1*$x3;
      $v41_b = $lr_iw*$dj1*$x4;
      $v51_b = $lr_iw*$dj1*$x5;

      //perubahan bias z1(v01)
      $v02_b = $lr_ib*$dj2;
      //suku perubahan bobot z1(v11,v21)
      $v12_b = $lr_iw*$dj2*$x1;
      $v22_b = $lr_iw*$dj2*$x2;
      $v32_b = $lr_iw*$dj2*$x3;
      $v42_b = $lr_iw*$dj2*$x4;
      $v52_b = $lr_iw*$dj2*$x5;

      //perubahan bias z1(v01)
      $v03_b = $lr_ib*$dj3;
      //suku perubahan bobot z1(v11,v21)
      $v13_b = $lr_iw*$dj3*$x1;
      $v23_b = $lr_iw*$dj3*$x2;
      $v33_b = $lr_iw*$dj3*$x3;
      $v43_b = $lr_iw*$dj3*$x4;
      $v53_b = $lr_iw*$dj3*$x5;

      //perubahan bias z1(v01)
      $v04_b = $lr_ib*$dj4;
      //suku perubahan bobot z1(v11,v21)
      $v14_b = $lr_iw*$dj4*$x1;
      $v24_b = $lr_iw*$dj4*$x2;
      $v34_b = $lr_iw*$dj4*$x3;
      $v44_b = $lr_iw*$dj4*$x4;
      $v54_b = $lr_iw*$dj4*$x5;

      //perubahan bias z1(v01)
      $v05_b = $lr_ib*$dj5;
      //suku perubahan bobot z1(v11,v21)
      $v15_b = $lr_iw*$dj5*$x1;
      $v25_b = $lr_iw*$dj5*$x2;
      $v35_b = $lr_iw*$dj5*$x3;
      $v45_b = $lr_iw*$dj5*$x4;
      $v55_b = $lr_iw*$dj5*$x5;

    ?>
   <p>Suku Perubahan Bobot & Bias Unit Tersembunyi</p>
   <p><? echo 'Bias : v0(j)_baru = lr * dj(i)' ?></p>
  <p><? echo 'Bobot : v(i)(j)_baru = lr * dj(i) * x(i)' ?></p>
   <table>
   	<tr>
   		<td>
   			<? echo 'v01_baru (bias) = '.$lr_ib.' * '.$dj1.' = <b>'.$v01_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v11_baru = '.$lr_iw.' * '.$dj1.' * '.$x1.' = <b>'.$v11_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v21_baru = '.$lr_iw.' * '.$dj1.' * '.$x2.' = <b>'.$v21_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v31_baru = '.$lr_iw.' * '.$dj1.' * '.$x3.' = <b>'.$v31_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v41_baru = '.$lr_iw.' * '.$dj1.' * '.$x4.' = <b>'.$v41_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v51_baru = '.$lr_iw.' * '.$dj1.' * '.$x5.' = <b>'.$v51_b.'</b>' ?>
   		</td>
   	</tr>
   	</table>
   	<br>
   	<table>
   	<tr>
   		<td>
   			<? echo 'v02_baru (bias) = '.$lr_ib.' * '.$dj2.' = <b>'.$v02_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v12_baru = '.$lr_iw.' * '.$dj2.' * '.$x1.' = <b>'.$v12_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v22_baru = '.$lr_iw.' * '.$dj2.' * '.$x2.' = <b>'.$v22_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v32_baru = '.$lr_iw.' * '.$dj2.' * '.$x3.' = <b>'.$v32_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v42_baru = '.$lr_iw.' * '.$dj2.' * '.$x4.' = <b>'.$v42_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v52_baru = '.$lr_iw.' * '.$dj2.' * '.$x5.' = <b>'.$v52_b.'</b>' ?>
   		</td>
   	</tr>
   </table>
   <br>
   <table>
   	<tr>
   		<td>
   			<? echo 'v03_baru (bias) = '.$lr_ib.' * '.$dj3.' = <b>'.$v03_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v13_baru = '.$lr_iw.' * '.$dj3.' * '.$x1.' = <b>'.$v13_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v23_baru = '.$lr_iw.' * '.$dj3.' * '.$x2.' = <b>'.$v23_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v33_baru = '.$lr_iw.' * '.$dj3.' * '.$x3.' = <b>'.$v33_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v43_baru = '.$lr_iw.' * '.$dj3.' * '.$x4.' = <b>'.$v43_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v53_baru = '.$lr_iw.' * '.$dj3.' * '.$x5.' = <b>'.$v53_b.'</b>' ?>
   		</td>
   	</tr>
   </table>
   <br>
   <table>
   	<tr>
   		<td>
   			<? echo 'v04_baru (bias) = '.$lr_ib.' * '.$dj4.' = <b>'.$v04_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v14_baru = '.$lr_iw.' * '.$dj4.' * '.$x1.' = <b>'.$v14_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v24_baru = '.$lr_iw.' * '.$dj4.' * '.$x2.' = <b>'.$v24_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v34_baru = '.$lr_iw.' * '.$dj4.' * '.$x3.' = <b>'.$v34_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v44_baru = '.$lr_iw.' * '.$dj4.' * '.$x4.' = <b>'.$v44_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v54_baru = '.$lr_iw.' * '.$dj4.' * '.$x5.' = <b>'.$v54_b.'</b>' ?>
   		</td>
   	</tr>
   </table>
   <br>
   <table>
   	<tr>
   		<td>
   			<? echo 'v05_baru (bias) = '.$lr_ib.' * '.$dj5.' = <b>'.$v05_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v15_baru = '.$lr_lw.' * '.$dj5.' * '.$x1.' = <b>'.$v15_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v25_baru = '.$lr_lw.' * '.$dj5.' * '.$x2.' =  <b>'.$v25_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v35_baru = '.$lr_lw.' * '.$dj5.' * '.$x3.' =  <b>'.$v35_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v45_baru = '.$lr_lw.' * '.$dj5.' * '.$x4.' =  <b>'.$v45_b.'</b>' ?>
   		</td>
   	</tr>
   	<tr>
   		<td>
   			<? echo 'v55_baru = '.$lr_lw.' * '.$dj5.' * '.$x5.' =  <b>'.$v55_b.'</b>' ?>
   		</td>
   	</tr>
   </table>
   </div>
   <br>

   <div class="update">
    <p>Bobot Akhir Lapisan Input ke Lapisan tersembunyi</p>
    <p><? echo 'v(i)(j) = v(i)(j) + v(i)(j)_baru' ?></p>
    <table>
    	<tr>
    		<td>
    			<? $dv_11 = $v11+$v11_b; echo 'v11 = '.$v11.' + '.$v11_b.' = <b>'.$dv_11.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_12 = $v12+$v12_b; echo 'v12 = '.$v12.' + '.$v12_b.' = <b>'.$dv_12.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_13 = $v13+$v13_b; echo 'v13 = '.$v13.' + '.$v13_b.' = <b>'.$dv_13.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_14 = $v14+$v14_b; echo 'v14 = '.$v14.' + '.$v14_b.' = <b>'.$dv_14.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_15 = $v15+$v15_b; echo 'v15 = '.$v15.' + '.$v15_b.' = <b>'.$dv_15.'</b>' ?>
    		</td>
    	</tr>
    </table>
    <br>
    <table>
    	<tr>
    		<td>
    			<? $dv_21 = $v21+$v21_b; echo 'v21 = '.$v21.' + '.$v21_b.' = <b>'.$dv_21.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_22 = $v22+$v22_b; echo 'v22 = '.$v22.' + '.$v22_b.' = <b>'.$dv_22.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_23 = $v23+$v23_b; echo 'v23 = '.$v23.' + '.$v23_b.' = <b>'.$dv_23.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_24 = $v24+$v24_b; echo 'v24 = '.$v24.' + '.$v24_b.' = <b>'.$dv_24.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_25 = $v25+$v25_b; echo 'v25 = '.$v25.' + '.$v25_b.' = <b>'.$dv_25.'</b>' ?>
    		</td>
    	</tr>
    </table>
    <br>
    <table>
    	<tr>
    		<td>
    			<? $dv_31 = $v31+$v31_b; echo 'v31 = '.$v31.' + '.$v31_b.' = <b>'.$dv_31.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_32 = $v32+$v32_b; echo 'v32 = '.$v32.' + '.$v32_b.' = <b>'.$dv_32.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_33 = $v33+$v33_b; echo 'v33 = '.$v33.' + '.$v33_b.' = <b>'.$dv_33.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_34 = $v34+$v34_b; echo 'v34 = '.$v34.' + '.$v34_b.' = <b>'.$dv_34.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_35 = $v35+$v35_b; echo 'v35 = '.$v35.' + '.$v35_b.' = <b>'.$dv_35.'</b>' ?>
    		</td>
    	</tr>
    </table>
    <br>
  <table>
    	<tr>
    		<td>
    			<? $dv_41 = $v41+$v41_b; echo 'v41 = '.$v41.' + '.$v41_b.' = <b>'.$dv_41.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_42 = $v42+$v42_b; echo 'v42 = '.$v42.' + '.$v42_b.' = <b>'.$dv_42.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_43 = $v43+$v43_b; echo 'v43 = '.$v43.' + '.$v43_b.' = <b>'.$dv_43.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_44 = $v44+$v44_b; echo 'v44 = '.$v44.' + '.$v44_b.' = <b>'.$dv_44.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_45 = $v45+$v45_b; echo 'v45 = '.$v45.' + '.$v45_b.' = <b>'.$dv_45.'</b>' ?>
    		</td>
    	</tr>
    </table>
    <br>
    <table>
    	<tr>
    		<td>
    			<? $dv_51 = $v51+$v51_b; echo 'v51 = '.$v51.' + '.$v51_b.' = <b>'.$dv_51.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_52 = $v52+$v52_b; echo 'v52 = '.$v52.' + '.$v52_b.' = <b>'.$dv_52.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_53 = $v53+$v53_b; echo 'v53 = '.$v53.' + '.$v53_b.' = <b>'.$dv_53.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_54 = $v54+$v54_b; echo 'v54 = '.$v54.' + '.$v54_b.' = <b>'.$dv_54.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_55 = $v55+$v55_b; echo 'v55 = '.$v55.' + '.$v55_b.' = <b>'.$dv_55.'</b>' ?>
    		</td>
    	</tr>
    </table>
    <br>
    <p>Bias Akhir Lapisan Input ke Lapisan tersembunyi</p>
    <p><? echo 'v0j) = v0(j) + v0(j)_baru' ?></p>
      <table>
    	<tr>
    		<td>
    			<? $dv_01 = $v01+$v01_b; echo 'v01 = '.$v01.' + '.$v01_b.' = <b>'.$dv_01.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_02 = $v02+$v02_b; echo 'v02 = '.$v02.' + '.$v02_b.' = <b>'.$dv_02.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_03 = $v03+$v03_b; echo 'v03 = '.$v03.' + '.$v03_b.' = <b>'.$dv_03.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_04 = $v04+$v04_b; echo 'v04 = '.$v04.' + '.$v04_b.' = <b>'.$dv_04.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dv_05 = $v05+$v05_b; echo 'v05 = '.$v05.' + '.$v05_b.' = <b>'.$dv_05.'</b>' ?>
    		</td>
    	</tr>
    </table>
    <br>
    <p>Bobot Akhir Lapisan Tersembunyi ke Lapisan Output</p>
    <p><? echo 'w(i) = w(i) + w(i)_baru' ?></p>
      <table>
    	<tr>
    		<td>
    			<? $dw_1 = $w1+$w1_b; echo 'w1 = '.$w1.' + '.$w1_b.' = <b>'.$dw_1.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dw_2 = $w2+$w2_b; echo 'w2 = '.$w2.' + '.$w2_b.' = <b>'.$dw_2.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dw_3 = $w3+$w3_b; echo 'w3 = '.$w3.' + '.$w3_b.' = <b>'.$dw_3.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dw_4 = $w4+$w4_b; echo 'w4 = '.$w4.' + '.$w4_b.' = <b>'.$dw_4.'</b>' ?>
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<? $dw_5 = $w5+$w5_b; echo 'w5 = '.$w5.' + '.$w5_b.' = <b>'.$dw_5.'</b>' ?>
    		</td>
    	</tr>
    </table>
    <br>
    <p>Bias Akhir Lapisan Tersembunyi ke Lapisan Output</p>
    <p><? echo 'w0 = w0 + w0_baru' ?></p>
      <table>
    	<tr>
    		<td>
    			<? $dw_0 = $w0+$w0_b; echo 'w0 = '.$w0.' + '.$w0_b.' = <b>'.$dw_0.'</b>' ?>
    		</td>
    	</tr>            	
    </table>
    <br>
    </div>
<?     //BOBOT AKHIR Iterasi Pertama Input ke Hidden
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
        $w0 = $w0+$w0_b; ?>
    <hr>
		<? } ?>
		<p id="mse">MSE = sum(jumlah kuadrat error) / (jumlah data)
		<p id="mse">MSE Epoch ke <?  $mse = $k_e/$jumlah; echo $epoch.' adalah '. $k_e.' / '.$jumlah.' = '.$mse?></p>
	</div>
	<br>
<? } ?>

<!-- CSS form result (form yang digunakan untuk menampilkan perhitungan jaringan pada menu analisis pembelajaran) -->
<style type="text/css">
	td{
		padding: 3px;
    font-size: 14px;
	}
	 #i_0{
        position: absolute;
        display: inline-block;
        width: 25%;
    }
   p{
   	font-weight: bold;
   }
   b{
   	color: blue;
   }
   #name{
   	font-weight: bold;
   }
   #mse{
   	font-size: 24px;
   }

   .maju{
    border: 1px solid green;
    padding: 10px 20px;
    border-radius: 10px;
   }
   .mundur{
    border: 1px solid blue;
    padding: 10px 20px;
    border-radius: 10px;
   }
   .update{
    border: 1px solid red;
    padding: 10px 20px;
    border-radius: 10px;
   }
</style>
<script type="text/javascript">
	//Fungsi untuk menampilkan tombol detail setelah proses perhitungan propagasi maju data pengujian yang dipilih selesai
	$('.detail').show();
</script>

<!--
Perhitungan propagasi maju yang ditampilkan dalam format tampilan HTML
berfungsi untuk menganalisa bagaimana perhitungan propagasi maju JST dalam program ini berjalan
data dilempar dari localhost/JST/peramalan/analisis_pengujian
-->
<?
	//bobot dan bias akhir hasil proses pembelajaran
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
    
	$x1=$input[$data_ke]['data1'];
    $x2=$input[$data_ke]['data2'];
    $x3=$input[$data_ke]['data3'];
    $x4=$input[$data_ke]['data4'];
    $x5=$input[$data_ke]['data5'];
    $t =$input[$data_ke]['data6']; 

    //Mencari data terbesar dan terkecil dari data asli
    $max_data6=0;
    $min_data6=0;
    foreach ($asli as $key => $valueasli) {
    	if($max_data6==0 || $max_data6<$valueasli['data6']){
    		$max_data6=$valueasli['data6'];
    	}
    	if($min_data6==0 || $min_data6>$valueasli['data6']){
    		$min_data6=$valueasli['data6'];
    	}
    }
?>
	<div id="i_1">
	<br>
	<p>Data ke - <?  echo $data_ke+1 ?></p>
	<p>Input & Bobot Akhir :</p>
	<table>
		<tr>
			<td id="name">x1</td>
			<td>:</td>
			<td><? echo $input[$data_ke]['data1'] ?></td>
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
			<td><? echo $input[$data_ke]['data2'] ?></td>
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
			<td><? echo $input[$data_ke]['data3'] ?></td>
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
			<td><? echo $input[$data_ke]['data4'] ?></td>
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
			<td><? echo $input[$data_ke]['data5'] ?></td>
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
    <p>TARGET : <? echo $input[$data_ke]['data6'] ?></p>
		<br>
		<?  
		$z_net1 = $v01+($x1*$v11)+($x2*$v21)+($x3*$v31)+($x4*$v41)+($x5*$v51);
        $z_net2 = $v02+($x1*$v12)+($x2*$v22)+($x3*$v32)+($x4*$v42)+($x5*$v52);
        $z_net3 = $v03+($x1*$v13)+($x2*$v23)+($x3*$v33)+($x4*$v43)+($x5*$v53);
        $z_net4 = $v04+($x1*$v14)+($x2*$v24)+($x3*$v34)+($x4*$v44)+($x5*$v54);
        $z_net5 = $v05+($x1*$v15)+($x2*$v25)+($x3*$v35)+($x4*$v45)+($x5*$v55); ?>
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
          		<td><? echo 'y_net = '.$w0.' + ( '.$z1.' * '.$w1.' ) + ('.$z2.' * '.$w2.' )  + ('.$z3.' * '.$w3.' ) + ('.$z4.' * '.$w4.' ) + ('.$z5.' * '.$w5.' ) = <b>'.$y_net.'</b>' ?></td>
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
          <br>
          <hr>
          <table>
          <tr>
            <td><p id="bold">Target</p></td>
            <td><p id="bold">:</p></td>
            <td><p id="bold"><b><? echo $input[$data_ke]['data6'] ?></b></p></td>
          </tr>
          <tr>
            <td><p id="bold">Keluaran JST</p></td>
            <td><p id="bold">:</p></td>
            <td><p id="bold"><b><? echo $y ?></b></p></td>
          </tr>
          <tr>
            <td><p id="bold">ERROR</p></td>
            <td><p id="bold">:</p></td>
            <td><p id="bold"><? echo $t.' - '.$y.' = <b>'.$Error.'</b>' ?></p></td>
          </tr> 
          <tr> 
            <td><p id="bold">Normalisasi Target</p></td>
            <td><p id="bold">:</p></td>
            <td><p id="bold"><?  $normalisasi_target=((($t-0.1)*($max_data6-$min_data6))/0.8)+$min_data6; echo '((('.$t.' - 0.1 ) * ( '.$max_data6.' - '.$min_data6.' )) / 0.8 ) + '.$min_data6.' = <b>'.$normalisasi_target.'</b> di bulatkan <b>'.round($normalisasi_target).'</b>' ?></p></td>
          </tr>
          <tr> 
            <td><p id="bold">Normalisasi Keluaran JST</p></td>
            <td><p id="bold">:</p></td>
            <td><p id="bold"><?  $normalisasi_jst=((($y-0.1)*($max_data6-$min_data6))/0.8)+$min_data6; echo '((('.$y.' - 0.1 ) * ( '.$max_data6.' - '.$min_data6.' )) / 0.8 ) + '.$min_data6.' = <b>'.$normalisasi_jst.'</b> di bulatkan <b>'.round($normalisasi_jst).'</b>' ?></p></td>
          </tr>
          <?
            if(round($normalisasi_target)>round($normalisasi_jst)){
             $Akurasi = number_format((round($normalisasi_jst)/round($normalisasi_target))*100,2);
            }else if($normalisasi_target<$normalisasi_jst){
             $Akurasi = number_format((round($normalisasi_jst)/round($normalisasi_target))*100,2);
            }else{
             $Akurasi = (round($normalisasi_jst)/round($normalisasi_target))*100;
            }  ?>
          </tr> 
            <td><p id="bold">Perbandingan</p></td>
            <td><p id="bold">:</p></td>
            <td><p id="bold"><? echo round($normalisasi_target).' siswa :  '.round($normalisasi_jst).' siswa </b>' ?></p></td>
          </tr>
          </tr> 
            <td><p id="bold">Persentase Keberhasilan</p></td>
            <td><p id="bold">:</p></td>
            <td><p id="bold"><? echo  '<b>'.$Akurasi.' %</b>' ?></p></td>
          </tr>
          </table>
	</div>
	<br>

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
 #bold{
 	font-size: 18px;
       }
  
</style>
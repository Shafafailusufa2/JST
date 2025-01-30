<!-- Pemanggil Javascript untuk menu simulasi data pelaihan -->
<?php include('proccess_simulasi.php'); ?>

<!-- Header dan title dari menu simulasi data pelatihan -->
<div class="header">
    <h1 class="page-title"><? echo $tittle ?></h1>
    <ul class="breadcrumb">
        <li><a class="active" href="#">Admin</a> </li>
        <li class="active"><? echo $tittle ?></li>
    </ul>
</div>

<!--
Cek kondisi apakah proses pembelajaran dan transformasi data pelatihan sudah dilakukan
data dilempar dari localhost/JST/peramalan/pelatihan
-->
<? if(!empty($learn) && !empty($norm)) {?>

<!-- 
Div yang menjadi area grafik hasil simulasi data pelatihan  
localhost/JST/pembelajaran/hasil_pelatihan 
-->
<div id="hasil_prediksi"></div>

<div id="loading"><img src="<? base_url() ?>assets/images/ajax-loader.gif"> Mohon Tunggu ..</div>
<button class="btn btn-primary mulai" onclick="peramalan()">Mulai Prediksi</button>

<!-- Hasil akurasi dari simulasi data pelatihan terhadap target -->
<p id="akurasi">Akurasi Rata - Rata : 
<? 
$akurasi =0; 
$jml = 0;
foreach ($norm as $key => $value) {
    if($value['data6']<$value['k_jst']){
        $persen = ($value['data6']/round($value['k_jst']))*100;
    }else if($value['data6']>$value['k_jst']){
        $persen = (round($value['k_jst'])/$value['data6'])*100;
    }else{
        $persen = ($value['data6']/round($value['k_jst']))*100;
    }
    $akurasi = $akurasi + $persen;
    $jml++;
}
echo number_format($rata = $akurasi/$jml,2);
?> %
</p>

<div id="data">
<!--
Tabel hasil simulasi data pelatihan, tabel ini berisi target dan hasil keluaran jaringan
data dilempar dari localhost/JST/peramalan/pelatihan
 -->
    <table id="hasil" class="table table-striped">
        <thead>
            <tr>
                <th id="th1">No</th>
                <th>Lokasi</th>
                <th>Target (2021)</th>
                <th>Keluaran JST</th>
                <th id="th2">Persentase Akurasi</th>

            </tr>
        </thead>
        <tbody>
            <? foreach ($norm as $list => $value) {
            $k_jst = round($value['k_jst']);
             ?>
            <tr>
                <td><? echo $list+1?></td>
                <td><? echo $value['nama_lokasi'] ?></td>
                <td><? echo $value['data6'] ?></td>
                <td><? echo round($value['k_jst']) ?></td>
                <td><?
                  if($k_jst>0){ 
                    if($value['data6']>$k_jst){
                        echo number_format(($k_jst/$value['data6'])*100,2);
                    }else if($value['data6']<$k_jst){
                        echo number_format(($value['data6']/$k_jst)*100,2);
                    }else{
                        echo ($value['data6']/$k_jst)*100;
                    } ?> %</td>
                <?}else{ ?>
                    <b style="color: red">~</b></td>
                <? } ?>
            </tr>
            <?}?>
        </tbody>
    </table>
</div>
<br>

<? }else{ ?>

<!-- Tampilan error jika kondisi tidak terpenuhi -->
<div class="dialog">
    <img src="<? base_url() ?>assets/images/empty.png" width="500" high="500">
</div>

<? } ?>

<script type="text/javascript">
    //Fungsi datatable hasil simulasi data pelatihan
    $(function() {
        serverSide: true,
                $('#hasil').dataTable();
    });
    $(function () {
            var chart;
            $(document).ready(function() {
                //Mengambil properti HJchart untuk ditampilkan sebagai grafik perbandingan target dan keluaran JST
                //localhost/JST/peramalan/hasil_pelatihan
                $.getJSON("<?php base_url() ?>peramalan/hasil_pelatihan/", function(json) {
                
                    chart = new Highcharts.Chart({
                        chart: {
                            renderTo: 'hasil_prediksi',
                            type: 'line'
                            
                        },
                        title: {
                            text: 'Grafik Perbandingan Target dan Keluaran JST'
                            
                        },
                        subtitle: {
                            text: ''
                        
                        },
                        credits: {
                          enabled: false
                        },
                        xAxis: {
                            categories: []
                        },
                        yAxis: {
                            title: {
                                text: 'Prediksi Wilayah Calon Siswa Baru'
                            },
                            plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                            }]
                        },
                        tooltip: {
                            formatter: function() {
                                    return '<b>'+ this.series.name +'</b><br/>'+
                                    this.x +': '+ this.y;
                            }
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'top',
                            x: -10,
                            y: 120,
                            borderWidth: 0
                        },
                        series: json
                    });
                });
            
            });
            
        });

</script>

<!-- CSS menu simulasi data pelatihan -->
<style type="text/css">
	#loading,.mulai{
		margin-left: 45%;
	}
    #hasil_prediksi{
            margin-top: 10px;
            margin-bottom: 20px;
            zoom:150%;
            width: 100%;
        }
    .active{
      font-size: 14px;
    }
    #akurasi{
        font-weight: bold;
        font-size: 24px;
        margin-left: 38%;
    }
</style>
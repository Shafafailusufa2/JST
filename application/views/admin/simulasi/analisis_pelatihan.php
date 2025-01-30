<!-- Pemanggil Javascript untuk menu analisis data pelatihan -->
<?php include('proccess_simulasi.php'); ?>

<!-- Header dan title dari menu analisis data pelatihan -->
<div class="header">
    <h1 class="page-title"><? echo $tittle ?></h1>
    <ul class="breadcrumb">
        <li><a class="active" href="#">Admin</a> </li>
        <li class="active"><? echo $tittle ?></li>
    </ul>
</div>

<!--
Cek kondisi apakah simulasi data pelatihan telah dilakukan
data yang dicek adalah data keluaran JST, data dari tabel result, data asli dari tb_pelatihan
data dilempar dari localhost/JST/peramalan/simpelanalis
 -->
<? if(!empty($asli)){ if($asli[0]['k_jst']!=0 && !empty($result)){ ?>

<!-- 
div yang digunakan menampilkan grafik perbandingan target dan keluaran jaringan dengan data yang sudah di
normalisasi ke data asli
-->
<div id="grafik"></div>
<!-- Select pilihan data perbandingan target dan keluaran JST -->
<div class="panel-body" id="parameter">
    <label style="font-weight:bold">Pilih Target & Keluaran JST</label>
    <select class="form-control" id="data">
        <?$no=1; $data_ke=0; foreach ($target as $key => $value) {?>
            <option value="<? echo $data_ke ?>">Data ke - <? echo $no.' = Target : '.$value['data6'].' || Keluaran JST = '.$k_jst[$no] ?></option>
        <? $no++; $data_ke++; }?>
    </select>
    <div id="loading"><img src="<? base_url() ?>assets/images/ajax-loader.gif"> Mohon Tunggu</div>
    <a class="btn btn-primary detail" onclick="detail()">Detail</a>
</div>

<div class="panel-body" id="panel-0">
    <!-- div yang menjadi area dimana perhitungan propagasi maju pada data yang dipilih ditampilkan -->
    <div id="isi"></div>
</div>

<script type="text/javascript">

//Fungsi untuk melempar data kepada controller yang memiliki fungsi perhitungan propagasi maju
 function detail(){
    var ajax = new XMLHttpRequest();
    if (!ajax) {
        var ajax = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var formdata = new FormData();
    var data = _("data").value;
    formdata.append("data",data);
    $(".detail").hide();
    $("#loading").show();
    setTimeout(function() {
    $('#loading').fadeOut(1000);
    ajax.open("POST", "<?php echo base_url() . 'peramalan/analisis_pelatihan/'; ?>", false);
    ajax.send(formdata);
    $("#isi").html(ajax.responseText);
     }, 1000);
 }

 $(function () {
        var chart;
        $(document).ready(function() {
            //Mengambil properti HJchart untuk ditampilkan sebagai grafik perbandingan target dan keluaran JST
            //localhost/JST/peramalan/analispel
            $.getJSON("<?php base_url() ?>peramalan/analispel/", function(json) {
            
                chart = new Highcharts.Chart({
                    chart: {
                        renderTo: 'grafik',
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

<? }else{ ?>

<!-- Tampilan error jika kondisi tidak terpenuhi -->
<div class="dialog">
    <img src="<? base_url() ?>assets/images/simulasi.png" width="500" high="500">
</div>
<? } }else{ ?>

<!-- Tampilan error jika kondisi tidak terpenuhi -->
<div class="dialog">
    <img src="<? base_url() ?>assets/images/simulasi.png" width="500" high="500">
</div>

<? } ?> 

<!-- CSS menu analisis pelatihan -->
<style type="text/css">
    #parameter{
            height: 20%;
        }
    #panel-0{
                height: 69%;
                margin-top: 15%;
                width: 98%;
        }
    #panel-bobot{
            height: 47%;
            width: 25%;
            margin-top: 13%;    
        }
    #panel-0{
            overflow-y: scroll;
            overflow: auto;
            margin-bottom: 40px;
    }
    .panel-body{
            width: 40%;
            margin-top: 20px;
            border:5px solid #ccc;
            border-radius: 10px;
            position: absolute;
            display: inline-block;
            height: 32%;
    }
    .detail{
        width: 100%;
        margin-top: 10px;
    }
    #grafik{
            margin-top: 10px;
            margin-bottom: 20px;
            zoom:150%;
            width: 100%;
    }
    .active{
      font-size: 14px;
    }
</style>
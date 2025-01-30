<!-- Pemanggil Javascript untuk proses analisis data pembelajaran -->
<?php include('proccess_pembelajaran.php'); ?>

<!-- Header dan title dari menu analisis pembelajaran-->
<div class="header">
    <h1 class="page-title"><? echo $tittle ?></h1>
    <ul class="breadcrumb">
        <li><a class="active" href="#">Admin</a> </li>
        <li class="active"><? echo $tittle ?></li>
    </ul>
</div>

<!-- 
Cek kondisi data untuk proses pembelajaran sudah lengkap
data dilempar dari localhost/JST/pembelajaran/admin/pembelajaran
 -->
<? if(!empty($cek)){ ?>
<ul class="nav nav-tabs">
    <li class="active"><a id="pointer" href="#home" data-toggle="tab"><b>Pelatihan Jaringan</b></a></li>
</ul>

<!-- Gambar struktur jaringan JST -->
<img src="<? base_url() ?>assets/images/551.jpg" width="500" high="500" id="struktur">
<div class="panel-body" id="panel-0">
    <div id="i_01">
    <label><b>Inisialisasi Bobot & Bias</b></label>

    <!-- Tabel struktur bobot dan bias jaringan -->
    <table border="1px" class="table-striped dataTable">
        <th>x1</th>
        <th>x2</th>
        <th>x3</th>
        <th>x4</th>
        <th>x5</th>
        <th>b1</th>
        <th>z1</th>
        <th>z2</th>
        <th>z3</th>
        <th>z4</th>
        <th>z5</th>
        <th>b2</th>
            <tr>
                <td id="in">v11</td>
                <td id="in">v21</td>
                <td id="in">v31</td>
                <td id="in">v41</td>
                <td id="in">v51</td>
                <td id="b1">v01</td>
                <td id="wn">w1</td>
                <td id="wn">w2</td>
                <td id="wn">w3</td>
                <td id="wn">w4</td>
                <td id="wn">w5</td>
                <td id="b2">w0</td>
            </tr>
            <tr>
                <td id="in">v12</td>
                <td id="in">v22</td>
                <td id="in">v32</td>
                <td id="in">v42</td>
                <td id="in">v52</td>
                <td id="b1">v02</td>
            </tr>
            <tr>
                <td id="in">v13</td>
                <td id="in">v23</td>
                <td id="in">v33</td>
                <td id="in">v43</td>
                <td id="in">v53</td>
                <td id="b1">v03</td>
            </tr>
            <tr>
                <td id="in">v14</td>
                <td id="in">v24</td>
                <td id="in">v34</td>
                <td id="in">v44</td>
                <td id="in">v54</td>
                <td id="b1">v04</td>
            </tr>
            <tr>
                <td id="in">v15</td>
                <td id="in">v25</td>
                <td id="in">v35</td>
                <td id="in">v45</td>
                <td id="in">v55</td>
                <td id="b1">v05</td>
            </tr>
    </table>
    </div>
    <div id="i_02">
    <label><b>Fungsi Aktivasi</b></label>
    <table>
    <tr>
        <!-- Gambar fungsi aktivasi sigmoid biner -->
        <td><img src="<? base_url() ?>assets/images/zi.png" width="50" high="50"></td>
        <td>:</td>
        <td>Sigmoid Biner</td>
    </tr>
    </table>
    <img src="<? base_url() ?>assets/images/sigmoid.png" id="sigmoid">
    <table>
    <tr>
        <!-- Gambar fungsi aktivasi identitas -->
        <td><img src="<? base_url() ?>assets/images/yi.png" width="50" high="50"></td>
        <td>:</td>
        <td>Identitas</td>
    </tr>
    </table>
    <br>
    <img src="<? base_url() ?>assets/images/identitas.png" id="iden">
    </div>
</div>

<br>
<hr>
<!-- div yang akan diisi oleh bobot_blank,bobot , bobot_nguyen 
localhost/JST/pembelajaran/bobot
localhost/JST/pembelajaran/bobot_blank
localhost/JST/pembelajaran/bobot_nguyen
-->
<div id="bobot"></div>		

<hr id="border">
<button class="btn btn-primary" id="loading">Mohon Tunggu .......</button>
<button class="btn btn-primary mulai" onclick="mulai()">Mulai Pembelajaran</button>
<button class="btn btn-primary mulai1" onclick="inisial()">Inisialisasi Bobot</button>
<button class="btn btn-primary mulai2" onclick="fill()">Isi Bobot</button>

<!-- 
Cek kondisi pelatihan sudah pernah dilakukan atau belum dengan cara mengecek nilai MSE minimum
data dilempar dari localhost/JST/admin/pembelajaran
 -->
<? if(!empty($min)){?>

<!-- localhost/JST/pembelajaran/mse -->
<div id="mygraph"></div>

<!-- localhost/JST/pembelajaran/k_jst -->
<div id="k_jst"></div>
<? } ?>
<? if(!empty($min)){ ?>

<script type="text/javascript">
    $(function () {
        var chart;
        $(document).ready(function() {
            //Mengambil propertis HJchart untuk ditampilkan sebagai diagram MSE
            //localhost/JST/pembelajaran/mse
            $.getJSON("<?php base_url() ?>pembelajaran/mse/", function(json) {
            
                chart = new Highcharts.Chart({
                    chart: {
                        renderTo: 'mygraph',
                        type: 'line'
                        
                    },
                    title: {
                        //Menampilkan nilai MSE terkecil
                        //localhost/JST/admin/pembelajaran
                        text: 'Pembelajaran terbaik adalah '+<? echo number_format($min,7) ?>
                        
                    },
                    subtitle: {
                        //Menampilkan jumlah epoch hasil pembelajaran
                        //localhost/JST/admin/pembelajaran
                        text: 'Epoch ke - '+<? echo $epo ?>
                    
                    },
                    xAxis: {
                        categories: []
                    },
                    credits: {
                          enabled: false
                    },
                    yAxis: {
                        title: {
                            text: 'Mean Square Error (MSE)'
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

 $(function () {
        var chart;
        $(document).ready(function() {
            //Mengambil propertis HJchart untuk ditampilkan sebagai diagram perbandingan target dan keluaran JST
            //localhost/JST/pembelajaran/k_jst
            $.getJSON("<?php base_url() ?>pembelajaran/k_jst/", function(json) {
            
                chart = new Highcharts.Chart({
                    chart: {
                        renderTo: 'k_jst',
                        type: 'line'
                        
                    },
                    title: {
                        text: 'Grafik Perbandingan Target dan Keluaran JST'
                        
                    },
                    subtitle: {
                        //Menampilkan epoch terakhir dari iterasi pembelajaran
                        //localhost/JST/admin/pembelajaran
                        text: 'Epoch ke '+<? echo $epo ?>+' dengan Nilai MSE = '+<? echo number_format($min,7) ?>
                    
                    },
                    xAxis: {
                        categories: []
                    },
                    credits: {
                          enabled: false
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

<? }}else{?>

<!-- Tampilan error jika kondisi tidak terpenuhi -->
<div class="dialog">
    <img src="<? base_url() ?>assets/images/empty.png" width="500" high="500">
</div>

<? } ?>

<!-- CSS menu proses pembelajaran -->
<style type="text/css">
.active{
      font-size: 14px;
    }
#sigmoid{
    margin-top: -79px;
    margin-left: 213px;
}
#iden{
    margin-top: -111px;
    margin-left: 210px;
}
#parameter{
    height: 66%;
}
#status{
    margin-top: 10px;
    width: 100%;
    height: 50%;
    border-radius: 5px;
}
#in{
    background: #99bc58;
}
#b1{
    background: #4f81bc;
}
#wn{
    background: #f79647;
}
#b2{
    background: #b14e4c;
}
td,th{
    padding: 5px;
    font-weight: bold;
}
#i_0{
    position: absolute;
    display: inline-block;
    width: 25%;
}
#i_01{
    position: absolute;
    display: inline-block;
    width: 50%;
    margin-left: 40%;
}
#i_02{
    position: absolute;
    display: inline-block;
    width: 25%;
    margin-top: 35%;
    margin-left: 40%;
}
#i_1{
    position: absolute;
    display: inline-block;
    width: 15%;
}
#i_2{
    position: absolute;
    display: inline-block;
    width: 15%;
    margin-left: 17%;
}
#i_3{
    position: absolute;
    display: inline-block;
    width: 15%;
    margin-left: 34%;
}
#i_4{
    position: absolute;
    display: inline-block;
    width: 15%;
    margin-left: 51%;
}
#i_5{
    position: absolute;
    display: inline-block;
    width: 15%;
    margin-left: 68%;
}
 #i_6{
    position: absolute;
    display: inline-block;
    width: 17%;
    margin-left: 1%;
}#i_7{
    position: absolute;
    display: inline-block;
    width: 15%;
    margin-left: 20%;
}
#i_8{
    position: absolute;
    display: inline-block;
    width: 15%;
    margin-left: 37%;
}
.panel-body{
    width: 25%;
    margin-top: 20px;
    border:5px solid #ccc;
    border-radius: 10px;
    position: absolute;
    display: inline-block;
    height: 32%;
}
#panel-0{
    margin-left: 4%;
    width: 52%;
    height: 676px;
    margin-top: 1%;
    border: none;
}
#panel-1{
    margin-left: 27%;
    width: 71%;
    border:5px solid #ccc;
}

#panel-2{
    margin-left: 27%;
    width: 71%;
    border: 5px solid #ccc;
    margin-top: 20%;
}

#struktur{
    margin-top: 20px;
    margin-left: 2%;
}
#border{
    margin-top: 41%;
}

.mulai{
    margin-left: 33%;
    margin-bottom: 50px;
    display: inline-block;
    position: absolute;
}

#loading{
    margin-left: 35%;
    margin-bottom: 50px;
    display: inline-block;
    position: absolute;
}
.mulai1{
    margin-left: 43%;
    margin-bottom: 50px;
    display: inline-block;
    position: absolute;
}
.mulai2{
    margin-left: 53%;
    margin-bottom: 50px;
}
#mygraph{
    margin-bottom: 20px;
    zoom:150%;
    border:3px solid #ccc;
    width: 100%;
    border-radius:10px;
}
#k_jst{
    margin-bottom: 20px;
    zoom:150%;
    border:3px solid #ccc;
    width: 100%;
    border-radius:10px;
}

#v11,#v12,#v13,#v14,#v15,
#v21,#v22,#v23,#v24,#v25,
#v31,#v32,#v33,#v34,#v35,
#v41,#v42,#v43,#v44,#v45,
#v51,#v52,#v53,#v54,#v55
{
    color: #99bc58;
}
#v01,#v02,#v03,#v04,#v05
{
    color: #4f81bc;
}
#w1,#w2,#w3,#w4,#w5
{
    color: #f79647;
}
#w0
{
    color: #b14e4c;
}
</style>

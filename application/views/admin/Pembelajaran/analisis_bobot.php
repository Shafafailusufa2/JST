<!-- Pemanggil Javascript untuk proses analisis inisialisasi bobot -->
<? include('proccess_pembelajaran.php') ?>

<!-- Header dan title dari menu -->
<div class="header">
    <h1 class="page-title"><? echo $tittle ?></h1>
    <ul class="breadcrumb">
        <li><a class="active" href="#">Admin</a> </li>
        <li class="active"><? echo $tittle ?></li>
    </ul>
</div>
<? if(!empty($bobot)){ ?>
<!-- Isi dari bobot & bias awal -->
<div class="panel-body" id="panel-1">
    <label><b><p>Bobot Unit Tersembunyi</p></b></label><br>
    <div id="i_1">
          <label>x1</label>
          <input type="text" class="form-control" id="v11" placeholder="v11" value="<? echo $bobot[0]['x_1'] ?>">
          <input type="text" class="form-control" id="v12" placeholder="v12" value="<? echo $bobot[1]['x_1'] ?>">
          <input type="text" class="form-control" id="v13" placeholder="v13" value="<? echo $bobot[2]['x_1'] ?>">
          <input type="text" class="form-control" id="v14" placeholder="v14" value="<? echo $bobot[3]['x_1'] ?>">
          <input type="text" class="form-control" id="v15" placeholder="v15" value="<? echo $bobot[4]['x_1'] ?>">
    </div>
    <div id="i_2">
          <label>x2</label>
          <input type="text" class="form-control" id="v21" placeholder="v21" value="<? echo $bobot[0]['x_2'] ?>">
          <input type="text" class="form-control" id="v22" placeholder="v22" value="<? echo $bobot[1]['x_2'] ?>">
          <input type="text" class="form-control" id="v23" placeholder="v23" value="<? echo $bobot[2]['x_2'] ?>">
          <input type="text" class="form-control" id="v24" placeholder="v24" value="<? echo $bobot[3]['x_2'] ?>">
          <input type="text" class="form-control" id="v25" placeholder="v25" value="<? echo $bobot[4]['x_2'] ?>">
    </div>
    <div id="i_3">
    <label>x3</label>
          <input type="text" class="form-control" id="v31" placeholder="v31" value="<? echo $bobot[0]['x_3'] ?>">
          <input type="text" class="form-control" id="v32" placeholder="v32" value="<? echo $bobot[1]['x_3'] ?>">
          <input type="text" class="form-control" id="v33" placeholder="v33" value="<? echo $bobot[2]['x_3'] ?>">
          <input type="text" class="form-control" id="v34" placeholder="v34" value="<? echo $bobot[3]['x_3'] ?>">
          <input type="text" class="form-control" id="v35" placeholder="v35" value="<? echo $bobot[4]['x_3'] ?>">
    </div>
    <div id="i_4">
    <label>x4</label>
          <input type="text" class="form-control" id="v41" placeholder="v41" value="<? echo $bobot[0]['x_4'] ?>">
          <input type="text" class="form-control" id="v42" placeholder="v42" value="<? echo $bobot[1]['x_4'] ?>">
          <input type="text" class="form-control" id="v43" placeholder="v43" value="<? echo $bobot[2]['x_4'] ?>">
          <input type="text" class="form-control" id="v44" placeholder="v44" value="<? echo $bobot[3]['x_4'] ?>">
          <input type="text" class="form-control" id="v45" placeholder="v45" value="<? echo $bobot[4]['x_4'] ?>">
    </div>
    <div id="i_5">
    <label>x5</label>
          <input type="text" class="form-control" id="v51" placeholder="v51" value="<? echo $bobot[0]['x_5'] ?>">
          <input type="text" class="form-control" id="v52" placeholder="v52" value="<? echo $bobot[1]['x_5'] ?>">
          <input type="text" class="form-control" id="v53" placeholder="v53" value="<? echo $bobot[2]['x_5'] ?>">
          <input type="text" class="form-control" id="v54" placeholder="v54" value="<? echo $bobot[3]['x_5'] ?>">
          <input type="text" class="form-control" id="v55" placeholder="v55" value="<? echo $bobot[4]['x_5'] ?>">
    </div>
    <div id="i_6">
          <label>b1</label>
          <input type="text" class="form-control" id="v01" placeholder="v01" value="<? echo $bobot[0]['b_1'] ?>">
          <input type="text" class="form-control" id="v02" placeholder="v02" value="<? echo $bobot[1]['b_1'] ?>">
          <input type="text" class="form-control" id="v03" placeholder="v03" value="<? echo $bobot[2]['b_1'] ?>">
          <input type="text" class="form-control" id="v04" placeholder="v04" value="<? echo $bobot[3]['b_1'] ?>">
          <input type="text" class="form-control" id="v05" placeholder="v05" value="<? echo $bobot[4]['b_1'] ?>">
    </div>
</div>

<!-- Isi bobot dan bias akhir hasil inisialisasi bobot nguyen widraw -->
<div class="panel-body" id="panel-2">
    <label><b><p>Bobot Unit Tersembunyi Setelah Inisialisasi Bobot</p></b></label><br>
    <div id="i_1">
          <label>x1</label>
          <input type="text" class="form-control" id="v11" placeholder="v11" value="<? echo $bobot[0]['x_1e'] ?>">
          <input type="text" class="form-control" id="v12" placeholder="v12" value="<? echo $bobot[1]['x_1e'] ?>">
          <input type="text" class="form-control" id="v13" placeholder="v13" value="<? echo $bobot[2]['x_1e'] ?>">
          <input type="text" class="form-control" id="v14" placeholder="v14" value="<? echo $bobot[3]['x_1e'] ?>">
          <input type="text" class="form-control" id="v15" placeholder="v15" value="<? echo $bobot[4]['x_1e'] ?>">
    </div>
    <div id="i_2">
          <label>x2</label>
          <input type="text" class="form-control" id="v21" placeholder="v21" value="<? echo $bobot[0]['x_2e'] ?>">
          <input type="text" class="form-control" id="v22" placeholder="v22" value="<? echo $bobot[1]['x_2e'] ?>">
          <input type="text" class="form-control" id="v23" placeholder="v23" value="<? echo $bobot[2]['x_2e'] ?>">
          <input type="text" class="form-control" id="v24" placeholder="v24" value="<? echo $bobot[3]['x_2e'] ?>">
          <input type="text" class="form-control" id="v25" placeholder="v25" value="<? echo $bobot[4]['x_2e'] ?>">
    </div>
    <div id="i_3">
    <label>x3</label>
          <input type="text" class="form-control" id="v31" placeholder="v31" value="<? echo $bobot[0]['x_3e'] ?>">
          <input type="text" class="form-control" id="v32" placeholder="v32" value="<? echo $bobot[1]['x_3e'] ?>">
          <input type="text" class="form-control" id="v33" placeholder="v33" value="<? echo $bobot[2]['x_3e'] ?>">
          <input type="text" class="form-control" id="v34" placeholder="v34" value="<? echo $bobot[3]['x_3e'] ?>">
          <input type="text" class="form-control" id="v35" placeholder="v35" value="<? echo $bobot[4]['x_3e'] ?>">
    </div>
    <div id="i_4">
    <label>x4</label>
          <input type="text" class="form-control" id="v41" placeholder="v41" value="<? echo $bobot[0]['x_4e'] ?>">
          <input type="text" class="form-control" id="v42" placeholder="v42" value="<? echo $bobot[1]['x_4e'] ?>">
          <input type="text" class="form-control" id="v43" placeholder="v43" value="<? echo $bobot[2]['x_4e'] ?>">
          <input type="text" class="form-control" id="v44" placeholder="v44" value="<? echo $bobot[3]['x_4e'] ?>">
          <input type="text" class="form-control" id="v45" placeholder="v45" value="<? echo $bobot[4]['x_4e'] ?>">
    </div>
    <div id="i_5">
    <label>x5</label>
          <input type="text" class="form-control" id="v51" placeholder="v51" value="<? echo $bobot[0]['x_5e'] ?>">
          <input type="text" class="form-control" id="v52" placeholder="v52" value="<? echo $bobot[1]['x_5e'] ?>">
          <input type="text" class="form-control" id="v53" placeholder="v53" value="<? echo $bobot[2]['x_5e'] ?>">
          <input type="text" class="form-control" id="v54" placeholder="v54" value="<? echo $bobot[3]['x_5e'] ?>">
          <input type="text" class="form-control" id="v55" placeholder="v55" value="<? echo $bobot[4]['x_5e'] ?>">
    </div>
    <div id="i_6">
          <label>b1</label>
          <input type="text" class="form-control" id="v01" placeholder="v01" value="<? echo $bobot[0]['b_1e'] ?>">
          <input type="text" class="form-control" id="v02" placeholder="v02" value="<? echo $bobot[1]['b_1e'] ?>">
          <input type="text" class="form-control" id="v03" placeholder="v03" value="<? echo $bobot[2]['b_1e'] ?>">
          <input type="text" class="form-control" id="v04" placeholder="v04" value="<? echo $bobot[3]['b_1e'] ?>">
          <input type="text" class="form-control" id="v05" placeholder="v05" value="<? echo $bobot[4]['b_1e'] ?>">
    </div>
</div>
<div id="loading"><img src="<? base_url() ?>assets/images/ajax-loader.gif"> Mohon Tunggu ..</div>
<button class="btn btn-primary mulai" onclick="analisis_inisial()">Analisis Inisialisasi</button>
<div class="panel-body" id="panel-3">

    <!-- 
    Merupakan area hasil perhitungan inisialisasi bobot ditampilkan 
    localhost/JST/pembelajaran/analisis_inisial
    -->
    <div id="inisial"></div>
</div>
<? }else{ ?>

<!-- Tampilan error jika kondisi tidak terpenuhi -->
<div class="dialog">
    <img src="<? base_url() ?>assets/images/inisialisasi.png" width="500" high="500">
</div>

<? } ?>

<!-- CSS analisis menu inisialisasi bobot -->
<style type="text/css">
    .mulai{
        margin-left: 45%;
        margin-top: 39%;
        display: inline-block;
        position: absolute;
    }

    #loading{
        margin-left: 35%;
        margin-bottom: 50px;
        display: inline-block;
        position: absolute;
    }
     #status{
        margin-top: 10px;
        width: 100%;
        height: 50%;
        border-radius: 5px;
    }
    td,th{
        padding: 5px;
    }
    #i_1{
        position: absolute;
        display: inline-block;
        width: 12%;
    }
    #i_2{
        position: absolute;
        display: inline-block;
        width: 12%;
        margin-left: 14%;
    }
    #i_3{
        position: absolute;
        display: inline-block;
        width: 12%;
        margin-left: 28%;
    }
    #i_4{
        position: absolute;
        display: inline-block;
        width: 12%;
        margin-left: 42%;
    }
    #i_5{
        position: absolute;
        display: inline-block;
        width: 12%;
        margin-left: 56%;
    }
     #i_6{
        position: absolute;
        display: inline-block;
        width: 12%;
        margin-left: 70%;
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
    #panel-1{
        width: 98%;
        border:5px solid #ccc;
    }

    #panel-2{
        width: 98%;
        border: 5px solid #ccc;
        margin-top: 20%;
    }
    #panel-3{
        width: 98%;
        border: 5px solid #ccc;
        margin-top: 42%;
        margin-bottom: 2%;
        height: 70%;
        overflow-y: scroll;
        overflow: auto;
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
    .active{
      font-size: 14px;
    }
</style>
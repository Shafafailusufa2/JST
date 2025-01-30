<!-- Header dan title menu bobot dan bias akhir -->
<div class="header">
    <h1 class="page-title"><? echo $tittle ?></h1>
    <ul class="breadcrumb">
        <li><a class="active" href="#">Admin</a> </li>
        <li class="active"><? echo $tittle ?></li>
    </ul>
</div>

<!--
Cek kondisi apakah bobot dan bias akhir hasil pelatihan sudah didapatkan
data dilempar dari localhost/JST/bobotAkhir
 -->
<? if(!empty($iw)){ ?>
<ul class="nav nav-tabs">
    <li class="active"><a id="pointer" href="#home" data-toggle="tab"><b>Bobot & Bias Awal</b></a></li>
</ul>
<br>

<!-- Bobot dan bias awal lapisan tersembunyi -->
<div class="panel-body" id="panel-1">
    <label><b><p>Lapisan Tersembunyi</p></b></label><br>
    <div id="i_1">
          <label>x1</label>
          <input type="text" class="form-control" id="v11" placeholder="v11" value="<? echo $iw[0]['x1'] ?>">
          <input type="text" class="form-control" id="v12" placeholder="v12" value="<? echo $iw[1]['x1'] ?>">
          <input type="text" class="form-control" id="v13" placeholder="v13" value="<? echo $iw[2]['x1'] ?>">
          <input type="text" class="form-control" id="v14" placeholder="v14" value="<? echo $iw[3]['x1'] ?>">
          <input type="text" class="form-control" id="v15" placeholder="v15" value="<? echo $iw[4]['x1'] ?>">
    </div>
    <div id="i_2">
          <label>x2</label>
          <input type="text" class="form-control" id="v21" placeholder="v21" value="<? echo $iw[0]['x2'] ?>">
          <input type="text" class="form-control" id="v22" placeholder="v22" value="<? echo $iw[1]['x2'] ?>">
          <input type="text" class="form-control" id="v23" placeholder="v23" value="<? echo $iw[2]['x2'] ?>">
          <input type="text" class="form-control" id="v24" placeholder="v24" value="<? echo $iw[3]['x2'] ?>">
          <input type="text" class="form-control" id="v25" placeholder="v25" value="<? echo $iw[4]['x2'] ?>">
    </div>
    <div id="i_3">
    <label>x3</label>
          <input type="text" class="form-control" id="v31" placeholder="v31" value="<? echo $iw[0]['x3'] ?>">
          <input type="text" class="form-control" id="v32" placeholder="v32" value="<? echo $iw[1]['x3'] ?>">
          <input type="text" class="form-control" id="v33" placeholder="v33" value="<? echo $iw[2]['x3'] ?>">
          <input type="text" class="form-control" id="v34" placeholder="v34" value="<? echo $iw[3]['x3'] ?>">
          <input type="text" class="form-control" id="v35" placeholder="v35" value="<? echo $iw[4]['x3'] ?>">
    </div>
    <div id="i_4">
    <label>x4</label>
          <input type="text" class="form-control" id="v41" placeholder="v41" value="<? echo $iw[0]['x4'] ?>">
          <input type="text" class="form-control" id="v42" placeholder="v42" value="<? echo $iw[1]['x4'] ?>">
          <input type="text" class="form-control" id="v43" placeholder="v43" value="<? echo $iw[2]['x4'] ?>">
          <input type="text" class="form-control" id="v44" placeholder="v44" value="<? echo $iw[3]['x4'] ?>">
          <input type="text" class="form-control" id="v45" placeholder="v45" value="<? echo $iw[4]['x4'] ?>">
    </div>
    <div id="i_5">
    <label>x5</label>
          <input type="text" class="form-control" id="v51" placeholder="v51" value="<? echo $iw[0]['x5'] ?>">
          <input type="text" class="form-control" id="v52" placeholder="v52" value="<? echo $iw[1]['x5'] ?>">
          <input type="text" class="form-control" id="v53" placeholder="v53" value="<? echo $iw[2]['x5'] ?>">
          <input type="text" class="form-control" id="v54" placeholder="v54" value="<? echo $iw[3]['x5'] ?>">
          <input type="text" class="form-control" id="v55" placeholder="v55" value="<? echo $iw[4]['x5'] ?>">
    </div>
    <div id="i_6">
          <label>b1</label>
          <input type="text" class="form-control" id="v01" placeholder="v01" value="<? echo $bi[0]['b_1'] ?>">
          <input type="text" class="form-control" id="v02" placeholder="v02" value="<? echo $bi[1]['b_1'] ?>">
          <input type="text" class="form-control" id="v03" placeholder="v03" value="<? echo $bi[2]['b_1'] ?>">
          <input type="text" class="form-control" id="v04" placeholder="v04" value="<? echo $bi[3]['b_1'] ?>">
          <input type="text" class="form-control" id="v05" placeholder="v05" value="<? echo $bi[4]['b_1'] ?>">
    </div>
    <!-- Bobot dan bias awal lapisan keluaran -->
    <div id="i_7">
    <label><b><p>Lapisan Keluaran</p></b></label><br>
    <label>z1 -z5</label>
          <input type="text" class="form-control" id="w1" placeholder="w1" value="<? echo $lw[0]['w_1'] ?>">
          <input type="text" class="form-control" id="w2" placeholder="w2" value="<? echo $lw[0]['w_2'] ?>">
          <input type="text" class="form-control" id="w3" placeholder="w3" value="<? echo $lw[0]['w_3'] ?>">
          <input type="text" class="form-control" id="w4" placeholder="w4" value="<? echo $lw[0]['w_4'] ?>">
          <input type="text" class="form-control" id="w5" placeholder="w5" value="<? echo $lw[0]['w_5'] ?>">
    </div>
    <div id="i_8">
    <label>b2</label>
          <input type="text" class="form-control" id="w0" placeholder="w0" value="<? echo $bl[0]['b_2'] ?>">
    </div>
</div>
<ul class="nav nav-tabs panel-2">
    <li class="active"><a id="pointer" href="#home" data-toggle="tab"><b>Bobot & Bias Akhir</b></a></li>
</ul>
<br>

<!-- Bobot dan bias akhir lapisan tersembunyi -->
<div class="panel-body" id="panel-2">
    <label><b><p>Lapisan Tersembunyi</p></b></label><br>
    <div id="i_1">
          <label>x1</label>
          <input type="text" class="form-control" id="v11" placeholder="v11" value="<? echo $iw[0]['x_1e'] ?>">
          <input type="text" class="form-control" id="v12" placeholder="v12" value="<? echo $iw[1]['x_1e'] ?>">
          <input type="text" class="form-control" id="v13" placeholder="v13" value="<? echo $iw[2]['x_1e'] ?>">
          <input type="text" class="form-control" id="v14" placeholder="v14" value="<? echo $iw[3]['x_1e'] ?>">
          <input type="text" class="form-control" id="v15" placeholder="v15" value="<? echo $iw[4]['x_1e'] ?>">
    </div>
    <div id="i_2">
          <label>x2</label>
          <input type="text" class="form-control" id="v21" placeholder="v21" value="<? echo $iw[0]['x_2e'] ?>">
          <input type="text" class="form-control" id="v22" placeholder="v22" value="<? echo $iw[1]['x_2e'] ?>">
          <input type="text" class="form-control" id="v23" placeholder="v23" value="<? echo $iw[2]['x_2e'] ?>">
          <input type="text" class="form-control" id="v24" placeholder="v24" value="<? echo $iw[3]['x_2e'] ?>">
          <input type="text" class="form-control" id="v25" placeholder="v25" value="<? echo $iw[4]['x_2e'] ?>">
    </div>
    <div id="i_3">
    <label>x3</label>
          <input type="text" class="form-control" id="v31" placeholder="v31" value="<? echo $iw[0]['x_3e'] ?>">
          <input type="text" class="form-control" id="v32" placeholder="v32" value="<? echo $iw[1]['x_3e'] ?>">
          <input type="text" class="form-control" id="v33" placeholder="v33" value="<? echo $iw[2]['x_3e'] ?>">
          <input type="text" class="form-control" id="v34" placeholder="v34" value="<? echo $iw[3]['x_3e'] ?>">
          <input type="text" class="form-control" id="v35" placeholder="v35" value="<? echo $iw[4]['x_3e'] ?>">
    </div>
    <div id="i_4">
    <label>x4</label>
          <input type="text" class="form-control" id="v41" placeholder="v41" value="<? echo $iw[0]['x_4e'] ?>">
          <input type="text" class="form-control" id="v42" placeholder="v42" value="<? echo $iw[1]['x_4e'] ?>">
          <input type="text" class="form-control" id="v43" placeholder="v43" value="<? echo $iw[2]['x_4e'] ?>">
          <input type="text" class="form-control" id="v44" placeholder="v44" value="<? echo $iw[3]['x_4e'] ?>">
          <input type="text" class="form-control" id="v45" placeholder="v45" value="<? echo $iw[4]['x_4e'] ?>">
    </div>
    <div id="i_5">
    <label>x5</label>
          <input type="text" class="form-control" id="v51" placeholder="v51" value="<? echo $iw[0]['x_5e'] ?>">
          <input type="text" class="form-control" id="v52" placeholder="v52" value="<? echo $iw[1]['x_5e'] ?>">
          <input type="text" class="form-control" id="v53" placeholder="v53" value="<? echo $iw[2]['x_5e'] ?>">
          <input type="text" class="form-control" id="v54" placeholder="v54" value="<? echo $iw[3]['x_5e'] ?>">
          <input type="text" class="form-control" id="v55" placeholder="v55" value="<? echo $iw[4]['x_5e'] ?>">
    </div>
    <div id="i_6">
          <label>b1</label>
          <input type="text" class="form-control" id="v01" placeholder="v01" value="<? echo $bi[0]['b_1e'] ?>">
          <input type="text" class="form-control" id="v02" placeholder="v02" value="<? echo $bi[1]['b_1e'] ?>">
          <input type="text" class="form-control" id="v03" placeholder="v03" value="<? echo $bi[2]['b_1e'] ?>">
          <input type="text" class="form-control" id="v04" placeholder="v04" value="<? echo $bi[3]['b_1e'] ?>">
          <input type="text" class="form-control" id="v05" placeholder="v05" value="<? echo $bi[4]['b_1e'] ?>">
    </div>

    <!-- Bobot dan bias akhir lapisan keluaran -->
    <div id="i_7">
    <label><b><p>Lapisan Keluaran</p></b></label><br>
    <label>z1 -z5</label>
          <input type="text" class="form-control" id="w1" placeholder="w1" value="<? echo $lw[0]['w_1e'] ?>">
          <input type="text" class="form-control" id="w2" placeholder="w2" value="<? echo $lw[0]['w_2e'] ?>">
          <input type="text" class="form-control" id="w3" placeholder="w3" value="<? echo $lw[0]['w_3e'] ?>">
          <input type="text" class="form-control" id="w4" placeholder="w4" value="<? echo $lw[0]['w_4e'] ?>">
          <input type="text" class="form-control" id="w5" placeholder="w5" value="<? echo $lw[0]['w_5e'] ?>">
    </div>
    <div id="i_8">
    <label>b2</label>
          <input type="text" class="form-control" id="w0" placeholder="w0" value="<? echo $bl[0]['b_2e'] ?>">
    </div>
</div>
<? }else{ ?>
<div class="dialog">
    <img src="<? base_url() ?>assets/images/empty.png" width="500" high="500">
</div>
<? } ?>

<!-- CSS menu bobot dan bias akhir -->
<style type="text/css">
    .active{
      font-size: 14px;
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
    #i_7{
        position: absolute;
        display: inline-block;
        width: 12%;
        margin-left: 0%;
        margin-top: 15%;
    }
    #i_8{
        position: absolute;
        display: inline-block;
        width: 12%;
        margin-left: 14%;
        margin-top: 17.4%;
    }
    .panel-body{
        width: 25%;
        margin-top: 1%;
        border:5px solid #ccc;
        border-radius: 10px;
        position: absolute;
        display: inline-block;
        height: 65%;
    }
    #panel-1{
        width: 98%;
        border:5px solid #ccc;
    }
    #panel-2{
        width: 98%;
        border:5px solid #ccc;
        margin-bottom: 2%
    }
    .panel-2{
        margin-top: 40%;
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
<!-- Pemanggil Javascript untuk proses analisis data pembelajaran -->
<?php include('proccess_pembelajaran.php'); ?>

<!-- Header dan title dari menu analisis pembelajaran -->
<div class="header">
    <h1 class="page-title"><? echo $tittle ?></h1>
    <ul class="breadcrumb">
        <li><a class="active" href="#">Admin</a> </li>
        <li class="active"><? echo $tittle ?></li>
    </ul>
</div>

<!-- 
Cek kondisi apakah pembelajaran dan data input tidak kosong
lemparan dari Controller localhost/JST/admin/analisis
 -->
<? if(!empty($learn) && !empty($input)){ ?>

<ul class="nav nav-tabs">
    <li class="active"><a id="pointer" href="#home" data-toggle="tab"><b>Tabel Input</b></a></li>
</ul>
<br>

<!-- Tabel data pelatihan yang sudah ditransformasi -->
<table id="input" class="table table-striped">
    <thead>
        <tr>
            <th id="th1">No</th>
            <th>x1</th>
            <th>x2</th>
            <th>x3</th>
            <th>x4</th>
            <th>x5</th>
            <th id="th2">Target</th>

        </tr>
    </thead>
    <tbody>
        <? foreach ($input as $list => $value) { ?>
        <tr>
            <td><? echo $list+1?></td>
            <td><? echo $value['data1'] ?></td>
            <td><? echo $value['data2'] ?></td>
            <td><? echo $value['data3'] ?></td>
            <td><? echo $value['data4'] ?></td>
            <td><? echo $value['data5'] ?></td>
            <td><? echo $value['data6'] ?></td>
        </tr>
        <?}?>
    </tbody>
</table>

<!-- Foreach nilai MSE yang ada di database result -->
<div class="panel-body" id="parameter">
	<label><b>Pilih Epoch & MSE Pembelajaran</b></label>
	   <select class="form-control" id="epoch">
			<? $no=1; foreach ($learn as $key => $value) { ?>
				<option value="<? echo $no ?>">Epoch ke - <? echo $no.' = '.$value ?></option>
			<? $no++; } ?>
                <option value="<? echo $no+1 ?>">Epoch ke - <? echo $no ?> Generalisasi Stop</option>
		</select>
    <div id="loading"><img src="<? base_url() ?>assets/images/ajax-loader.gif"> Mohon Tunggu</div>
    <a class="btn btn-primary detail" onclick="detail()">Detail</a>
</div>

<div class="panel-body" id="panel-0">

    <!-- 
    Merupakan area hasil perhitungan proses pembelajaran yang ditampilkan 
    localhost/JST/pembelajaran/analisis
    -->
    <div id="isi"></div>
</div>

<script type="text/javascript">

//Datatables tabel input data pelatihan yang sudah ditransformasi
     $(function() {
        serverSide: true,
                $('#input').dataTable();
    });

//Fungsi perhitungan analisis data pembelajaran, fungsi ini akan menampilkan hasil perhitungan
//kedalam sebuah tampilan html pada view/pembelajaran/result
     function detail(){
        var ajax = new XMLHttpRequest();
        if (!ajax) {
            var ajax = new ActiveXObject("Microsoft.XMLHTTP");
        }
        var formdata = new FormData();
        var epoch = _("epoch").value;
        formdata.append("epoch",epoch);
        $(".detail").hide();
        $("#loading").show();
        setTimeout(function() {
        $('#loading').fadeOut(1000);
        ajax.open("POST", "<?php echo base_url() . 'pembelajaran/analisis/'; ?>", false);
        ajax.send(formdata);
        $("#isi").html(ajax.responseText);
         }, 1000);
     }

</script>

<? }else{ ?>

<div class="dialog">
    <img src="<? base_url() ?>assets/images/pembelajaran.png" width="500" high="500">
</div>

<? } ?>

<!-- CSS analisis pembelajaran -->
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
            width: 25%;
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
    .active{
      font-size: 14px;
    }
</style>
<!-- Pemanggil Javascript untuk menu bobot -->
<?php include('proccess_bobot.php'); ?>

<!-- Header dan title dari menu bobot -->
<div class="header">
    <h1 class="page-title"><? echo $tittle ?></h1>
    <ul class="breadcrumb">
        <li><a class="active" href="#">Admin</a> </li>
        <li class="active"><? echo $tittle ?></li>
    </ul>
</div>

<ul class="nav nav-tabs">
    <li class="active"><a id="pointer" href="#home" data-toggle="tab"><b>Form Upload Bobot & Bias</b></a></li>
</ul>
<br>

<form method="post">
    <table>
        <tr>
            <td style="font-size: 14px; font-weight: bold;">Pilih file</td>
            <td>:</td>
            <td>
            <div class="col-sm-8">
            <input type="file" class="form-control" id="file" placeholder="Pilih File">
            </div>
            </td>             
            <td><div id="loading"><img src="<? base_url() ?>assets/images/ajax-loader.gif"> Mohon Tunggu ..</div>

            <!-- Cek kondisi tabel bobot, apakah bobot sudah di upload atau belum -->
            <? if(empty($bobot)){ ?>
            <a id="pointer" onclick="upload()" class="btn btn-primary save"><i class="fa fa-floppy-o"></i> Upload Data</a></td>
            <? }else{ ?>
            <a id="pointer" onclick="reset()" class="btn btn-primary trun"><i class="glyphicon glyphicon-refresh"></i> Reset Data</a></td>
            <? } ?>
        </tr>
    </table>
</form>
<hr>
<div></div>
<!-- Menampilkan bobot & bias awal ke dalam sebuah tabel -->
<table id="iw" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th id="th1">Parameter</th>
            <th>x1</th>
            <th>x2</th>
            <th>x3</th>
            <th>x4</th>
            <th>x5</th>
            <th>b1</th>
            <th>z1 - z5</th>
            <th id="th2">b2</th>
        </tr>
    </thead>
</table>
<br>


<script>
   
    $(document).ready(function() {
        //Fungsi untuk memanggil datatables di controller localhost/JST/tabel/datatables_bobot
        //dan ditampilkan ke dalam tabel dengan id i1
        var table = $('#iw').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('tabel/datatables_bobot'); ?>",
                "type": "POST"
            }
        });
    });
</script>

<!-- CSS menu bobot & bias -->
<style type="text/css">
	td{
		padding: 10px 20px;
	}
	.col-sm-8{
		width: 100%;
	}
  .active{
      font-size: 14px;
  }
</style>
<!-- Pemanggil Javascript untuk menu upload data pengujian -->
<?php include('proccess_pengujian.php'); ?>

<!-- Header dan title dari menu upload data pelatihan  -->
<div class="header">
    <h1 class="page-title"><? echo $tittle ?></h1>
    <ul class="breadcrumb">
        <li><a class="active" href="#">Admin</a> </li>
        <li class="active"><? echo $tittle ?></li>
    </ul>
</div>

<ul class="nav nav-tabs">
    <li class="active"><a id="pointer" href="#home" data-toggle="tab"><b>Form Upload Data Pengujian</b></a></li>
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

            <!-- Cek kondisi apakah data pelatihan sudah dipload -->            
            <td><div id="loading"><img src="<? base_url() ?>assets/images/ajax-loader.gif"> Mohon Tunggu ..</div>
            <? if(empty($peng)){ ?>
            <a id="pointer" onclick="upload()" class="btn btn-primary save"><i class="fa fa-floppy-o"></i> Upload Data</a></td>
            <? }else{ ?>
            <a id="pointer" onclick="reset()" class="btn btn-primary trun"><i class="fa fa-refresh"></i> Reset Data</a></td>
            <? } ?>
            <td><div id="loading1"><img src="<? base_url() ?>assets/images/ajax-loader.gif"> Mohon Tunggu ..</div>
            <? if(empty($norm)){?><a id="pointer" onclick="transformasi()" class="btn btn-primary normal"><i class="glyphicon glyphicon-refresh"></i> Transformasi Data Pengujian</a><? } ?></td>
        </tr>
    </table>
</form>
<hr>
<!-- Menampilkan data peltihan asli dalam bentuk tabel -->
<table id="pengujian" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th id="th1">ID Lokasi</th>
            <th>Lokasi</th>
            <th>2020</th>
            <th>2021</th>
            <th>2022</th>
            <th>2023</th>
            <th>2024</th>
            <th id="th2">Target</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th class="footer">ID Lokasi</th>
            <th class="footer">Lokasi</th>
        </tr>
    </tfoot>
</table>
<br>
<br>

<script>
    $(document).ready(function() {
        //Fungsi untuk kolom pencarian pada footer table
        $('#pengujian tfoot th').each(function() {
            var title = $(this).text();
            var inp = '<input type="text" class="form-control" placeholder="' + title + '" />';
            $(this).html(inp);
        });

        //Fungsi untuk memanggil datatables di controller localhost/JST/tabel/datatables_pengujian
        //dan ditampilkan ke dalam tabel dengan id pengujian
        var table = $('#pengujian').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('tabel/datatables_pengujian'); ?>",
                "type": "POST"
            }
        });

        //Fungsi ketika kolom pencarian terisi oleh data
        table.columns().every(function() {
            var that = this;
            $('input', this.footer()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that
                            .search(this.value)
                            .draw();
                }
            });
        });
    });
</script>


<hr>

<div id="norm">Rumus Transformasi Data : <img src="<? base_url() ?>assets/images/normalisasi.png"></div>
<label id="label1">a adalah data minimum, b adalah data maksimum, x adalah data yang akan dinormalisasi, dan x' adalah<br>
data yang telah ditransformasi. Sehingga dihasilkan data hasil normalisasi yang ditunjukkan pada tabel di bawah ini.</label>

<hr>

<div id="norm"> Data Pengujian Yang Telah Di Transformasi</div>

<!-- Menampilkan data pengujian yang sudah ditransformasikan ke dalam nilai range [0,1] bentuk tabel -->
<table id="transformasi_1" class="display" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th id="th1">ID Lokasi</th>
            <th>Lokasi</th>
            <th>x1</th>
            <th>x2</th>
            <th>x3</th>
            <th>x4</th>
            <th>x5</th>
            <th id="th2">Target</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th class="footer">ID Lokasi</th>
            <th class="footer">Lokasi</th>
        </tr>
    </tfoot>
</table>
<br>
<br>

<script>
    $(document).ready(function() {
        //Fungsi untuk kolom pencarian pada footer table
        $('#transformasi_1 tfoot th').each(function() {
            var title = $(this).text();
            var inp = '<input type="text" class="form-control" placeholder="' + title + '" />';
            $(this).html(inp);
        });

        //Fungsi untuk memanggil datatables di controller localhost/JST/tabel/datatables_transformasi_pengujian
        //dan ditampilkan ke dalam tabel dengan id transformasi_1
        var table = $('#transformasi_1').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "<?php echo base_url('tabel/datatables_transformasi_pengujian'); ?>",
                "type": "POST"
            }
        });

        //Fungsi ketika kolom pencarian terisi oleh data
        table.columns().every(function() {
            var that = this;
            $('input', this.footer()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that
                            .search(this.value)
                            .draw();
                }
            });
        });
    });
</script>
<br>

<!-- CSS menu upload data pengujian -->
<style type="text/css">
	td{
		padding: 10px 20px;
	}
	.col-sm-8{
		width: 100%;
	}
    #norm{
        padding: 10px 20px;
        margin-left: 35%;
        font-weight: bold;
        font-style: italic;
    }
    #label1{
        margin-left: 25%;
        font-weight: bold;
        font-style: italic;
    }
    .active{
      font-size: 14px;
    }
</style>